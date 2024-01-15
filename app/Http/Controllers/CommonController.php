<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\Master;

class CommonController extends Controller
{

    public function __construct() {
        //$this->middleware('',);
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());
    }
    // 1  도매장검색
    public function wholeSaleSearch(Request $request)   {
        $wholeCode = str_replace('-', '', $request->search);
        $wholeSale = DB::table('t_master_wholesale')
        ->select("WHOLE_NAME")
        ->where('WHOLE_CODE', 'like', '%'.$wholeCode.'%')
        ->orwhere('WHOLE_NAME', 'like', '%'.$wholeCode.'%')
        ->get();
        $response = array('response' => ["message"=> "도매장검색", "data"=> $wholeSale], 'success'=> true);
        return Response::json($response, 200);
    }
    // 2  도매장 사업자번호로 검색
    public function wholesaleBizNumSearch(Request $request) {
        $wholeBizNum = str_replace('-', '', $request->search);
        $wholesaleBizNum = DB::table('t_master_wholesale')
        ->where('WHOLE_BIZ_NUM', 'like', '%'.$wholeBizNum.'%')
        ->get(); 
        $response = array('response' => ["message"=> "도매장 사업자번호로 검색", "data"=> $wholesaleBizNum], 'success'=> true);
        return Response::json($response, 200);

    }

    // 5 업소명 코드 또는 이름 검색
    public function storeSearch(Request $request) {
        $storeSearch = str_replace('-', '', $request->search);
        $storeResult = DB::table('t_master_store AS ms')
        ->select("ms.STORE_NAME","mw.WHOLE_NAME","ms.STORE_CODE","mw.WHOLE_CODE","ms.STORE_PHONE","ms.STORE_ADDRESS")
        ->join('t_master_wholesale AS mw', 'mw.WHOLE_CODE', 'ms.WHOLE_CODE')
        ->where('ms.STORE_CODE', 'like', '%'.$storeSearch.'%')
        ->orwhere('ms.STORE_NAME', 'like', '%'.$storeSearch.'%')
        ->get();
        $response = array('response' => ["message"=> "업소명 검색", "data"=> $storeResult], 'success'=> true);
        return Response::json($response, 200);
    }

    // 6 상품명 코드 또는 이름 검색
    public function goodsSearch(Request $request) {
        $goodsSearch = str_replace('-', '', $request->search);
        $goodsResult = DB::table('t_master_goods')
        ->where('GOODS_CODE', 'like', '%'.$goodsSearch.'%')
        ->orwhere('GOODS_NAME', 'like', '%'.$goodsSearch.'%')
        ->get();
        $response = array('response' => ["message"=> "상품 검색", "data"=> $goodsResult], 'success'=> true);
        return Response::json($response, 200);
    }

    // 7 제조사명 검색
    public function makerSearch(Request $request) {
        $makerSearch = str_replace('-', '', $request->search);
        $makerResult = DB::table('t_master_goods')
        ->select("GOODS_MAKER","GOODS_CODE")
        ->where('GOODS_MAKER', 'like', '%'.$makerSearch.'%')
        ->get();
        $response = array('response' => ["message"=> "제조사명 검색", "data"=> $makerResult], 'success'=> true);
        return Response::json($response, 200);
    }

    // 8 GOODS_DIV 로 검색
    public function goodsType(Request $request) {
        $sql = "SELECT GOODS_DIV,GOODS_NAME FROM `t_master_goods` WHERE GOODS_DIV LIKE ? ";
        $goodsType = DB::select($sql ,['%'.$request->search.'%']);
        $response = array('response' => ["message"=> "상품구분(GOODS_DIV)로 검색", "data"=> $goodsType], 'success'=> true);
        return Response::json($response, 200);
    }


    // 10 도매장 이메일 체크
    public function wholesaleEmailCheck (Request $request) {
        $emailCheck = DB::table('t_master_wholesale')
        ->where('WHOLE_EMAIL',$request->email)
        ->count();
        if($emailCheck > 0) {
            $response = array('response' => ["message"=> "이메일 중복입니다."], 'success'=> false);
            return Response::json($response, 200);
        }else {
            $response = array('response' => ["message"=> "사용 가능한 이메일입니다."], 'success'=> true);
            return Response::json($response, 200);
        }
    }

    // 11 수리코드 검색
    public function fixDataSearch(Request $request) {
        $fixResult = DB::table('t_master_fix')
        ->selectRaw("FIX_NAME,FIX_CODE")
        ->where('FIX_CODE', 'like', '%'.$request->search.'%')
        ->orwhere('FIX_NAME', 'like', '%'.$request->search.'%')
        ->get();
        $response = array('response' => ["message"=> "수리정보 검색", "data"=> $fixResult], 'success'=> true);
        return Response::json($response, 200);
    }

    // 12 마이페이지 조회
    public function myPage() {
        $sql = "SELECT * FROM t_master_emp WHERE EMP_CODE = :id";
        $userinfo = DB::selectOne($sql, ['id' => session()->has('loginId')]);
        $response = array('response' => ["message"=> "EMP 개인정보", "data"=> $userinfo], 'success'=> true);
        return Response::json($response, 200);
    }

    // 13 영업(수리기사) 정보 저장
    public function empSave(Request $request) {
        $validator = Validator::make($request->all(), [ // Form_validation
            'empName'  => 'required',
            'empPhone' => 'required',
            'empPassword' => 'required',
            'empType'     => 'required',
        ]);
        $response = array('response' => '', 'success'=> false);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('t_master_emp')->insert([
                'ICE_CODE' => 'C0001',
                'EMP_CODE' => 'E'.Master::eCodeSeq(),
                'EMP_NAME' => $request->input('empName'),
                'EMP_PHONE' => $request->input('empPhone'),
                'EMP_PASSWORD' => Hash::make($request->input('empPassword')),
                'EMP_TYPE' => $request->input('empType'),
                'NOTE' => $request->input('note'),
                'REG_DATE' => now(),
                'REG_ID' => '등록자',
                'ADD1' => '예비',         
            ]);
            $response['response'] = ["message"=> "도매장저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }
    // 14 사원번호 검색
    public function empNumCheck(Request $request) {
        $empNumCheck = DB::table('t_master_emp')
        ->where('EMP_CODE', $request->empCode)
        ->count();
        if($empNumCheck > 0) {
            echo "fail";
        }else {
            echo "중복이 아닙니다";
        }
    }

    // 15 영업사원 검색
    public function empNameSearch(Request $request) {
        $empCodeSearch = DB::table('t_master_emp')
        ->select("EMP_CODE","EMP_NAME")
        ->where('EMP_CODE', 'like', '%'.$request->empCode.'%')
        ->get();
        $response = array('response' => ["message"=> "영업사원 검색", "data"=> $empCodeSearch], 'success'=> true);
        return Response::json($response, 200);
    }
    
}
