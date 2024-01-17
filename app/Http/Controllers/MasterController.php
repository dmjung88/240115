<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

use App\Models\Master;

class MasterController extends Controller
{

    public function __construct() {
        // $this->middleware('guest', [ 'except' => 'logout', ]);
        //컨트롤러에 세션 변수를 작성하고 다른 컨트롤러에서 사용할 때는 작동하지 않습니다
        //__constructor() 메서드 내에서 세션 변수에 액세스 불가
    }  

    public function getTest() {
        $result = request('result');
        if($result) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors() 
            ]);
        } else {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function wholesaleSave(Request $request) { // 도매장 저장
        $validator = Validator::make($request->all(), [ // Form_validation
            'wholeName'  => 'required|max:30|string|regex:/^[가-힣a-zA-Z0-9\s]+/',
            'wholePhone' => 'max:13',
            'wholeCeo'  => 'max:10',
            'wholeBiz'   => 'max:10',
            'wholeBizNum' => 'required|max:10|unique:t_master_wholesale,WHOLE_BIZ_NUM',
            'wholeType'  => 'max:10',

        ]);
        $response = array('response' => '', 'success'=> false);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {  
            DB::table('t_master_wholesale')->insert([
                'ICE_CODE' => $request->get('iceCode'),
                'WHOLE_CODE' => "W" . Master::wCodeSeq(),
                'WHOLE_NAME' => $request->input('wholeName'),
                'WHOLE_PHONE' => str_replace('-', '',$request->input('wholePhone')),
                'WHOLE_CEO' => $request->input('wholeCeo'),
                'WHOLE_BIZ' => $request->input('wholeBiz'),
                'WHOLE_BIZ_NUM' => $request->input('wholeBizNum'),
                'WHOLE_TYPE' => $request->input('wholeType'),
                'WHOLE_ADDRESS' => $request->addr.' '.$request->addrDetail,
                'WHOLE_ZIPCODE' => $request->input('zipCode'),
                'WHOLE_EMAIL' => $request->input('wholeEmail'),
                'WHOLE_USEYN' => $request->input('chk_status'),
                'REG_ID' => $request->get('regId'),
                'NOTE' => $request->input('note'),
                'ADD1' => $request->input('add1'),
            ]);
            $response['response'] = ["message"=> "도매장저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }
    public function storeSave(Request $request) { // 업소 저장
        @$wholeCode = DB::selectOne("SELECT WHOLE_CODE FROM t_master_wholesale WHERE WHOLE_NAME = ?", [$request->wholeName]);
        $rules = [
            'storeName'=>'required|max:30|string|regex:/^[가-힣a-zA-Z0-9\s]+/',
            'wholeName'=>'required|max:30',
            'storePhone'=>'max:13',
            'storeCeo' =>'string|regex:/^[가-힣a-zA-Z\s]+/', 
            'storeBizNum'=>'max:10|unique:t_master_store,STORE_BIZ_NUM', 
            'storeBiz'=>'max:10|regex:/^[가-힣\s]+/', 
            'storeType'=>'max:10|regex:/^[가-힣\s]+/',
            'applyDate' =>'required',
        ];
        $response = array('response' => '', 'success'=> false);
        $validator = Validator::make($request->all(), $rules); // Form_validation
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('t_master_store')->insert([
                'ICE_CODE' => $request->get('iceCode'),
                'STORE_CODE' => "S" . Master::sCodeSeq(),
                'STORE_NAME' => $request->get('storeName'),
                'WHOLE_CODE' => $wholeCode->WHOLE_CODE ?? "",
                'WHOLE_NAME' => $request->get('wholeName'),
                'STORE_PHONE' => str_replace('-', '',$request->input('storePhone')),
                'STORE_CEO' => $request->get('storeCeo'),
                'STORE_BIZ_NUM' => $request->get('storeBizNum'),
                'STORE_BIZ' => $request->get('storeBiz'),
                'STORE_TYPE' => $request->get('storeType'),
                'EMP_CODE' => $request->get('empCode'),
                'EMP_NAME' => $request->get('empName'),
                'STORE_ADDRESS' => $request->addr." ".$request->addrDetail,
                'STORE_ZIPCODE' => $request->get('zipCode'),
                'STORE_USEYN' => $request->get('chk_status'),
                'NOTE' => $request->get('note'),
                'REG_ID' => $request->get('regId'),
                'APPLY_DATE' => $request->get('applyDate'),
            ]);
            $response['response'] = ["message"=> "업소저장 성공"];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }
    public function goodsSave(Request $request) { //상품 저장
        @$wholeCode = DB::selectOne("SELECT WHOLE_CODE FROM t_master_wholesale WHERE WHOLE_NAME = ?", [$request->wholeName]);
        $validator = Validator::make($request->all(), [ // Form_validation
            'wholeName'  => 'required',
            'goodsName'  => 'required|string|regex:/^[가-힣a-zA-Z0-9\s]+/|max:20',
            'goodsMaker' => 'string|regex:/^[가-힣a-zA-Z0-9\s]+/|max:20',
            'goodsDiv'   => 'required|string|regex:/^[가-힣a-zA-Z0-9\s]+/|max:10',
            'goodsNick'  => 'required|string|regex:/^[가-힣a-zA-Z0-9\s]+/|max:20',
            'goodsVol'   => 'max:8|regex:/^[a-zA-Z0-9\s]+/',
            'goodsType'  => 'max:20|regex:/^[가-힣a-zA-Z0-9\s]+/',
            'purchCost'  => 'integer',
            'chk_status' =>'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('t_master_goods')->insert([
                'ICE_CODE' => $request->get('iceCode'),
                'GOODS_CODE' => "G" . Master::gCodeSeq(),
                'GOODS_NAME' => $request->input('goodsName'),
                'WHOLE_CODE' => $wholeCode->WHOLE_CODE ?? "",
                'WHOLE_NAME' => $request->input('wholeName'),
                'GOODS_MAKER' => $request->input('goodsMaker'),
                'GOODS_DIV' => $request->input('goodsDiv'),
                'GOODS_NICK' => $request->input('goodsNick'),
                'GOODS_VOL' => $request->input('goodsVol'),
                'GOODS_TYPE' => $request->input('goodsType'),
                'PURCH_COST' => $request->input('purchCost'),
                'GOODS_USEYN' => $request->input('chk_status'),
                'NOTE'   => $request->note,
                'REG_ID' => $request->get('regId'),
                'LAST_MODIFY' => $request->lastModify,
                'REG_DATE'     => date('Y-m-d H:i:s'),

            ]);
            $response['response'] = ["message"=> "상품 저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }
    public function fixSave(Request $request) { //수리정보 저장
        $validator = Validator::make($request->all(), [ // Form_validation
            'fixName'  => 'required|string|regex:/^[가-힣a-zA-Z0-9\s]+/|max:30',
            'purchCost' => 'integer',
            'salesCost' => 'integer',
            'marginPer' => 'integer',
            'lastModify'=> 'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('t_master_fix')->insert([
                'ICE_CODE' => $request->get('iceCode'),
                'FIX_CODE' => "F" . Master::fCodeSeq(),
                'FIX_NAME' => $request->input('fixName'),
                'PURCH_COST' => $request->input('purchCost'),
                'SALES_COST' => $request->input('salesCost'),
                'MARGIN_PER' => $request->input('marginPer'),
                'NOTE' => $request->input('note'),
                'LAST_MODIFY' => $request->input('lastModify'),
                'REG_ID' => $request->get('regId'),
            ]);
            $response['response'] = ["message"=> "수리정보 저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }

    public function employeeSave(Request $request) { //수리기사(영업) 사원 저장
        $validator = Validator::make($request->all(), [ // Form_validation
            'empCode'  => 'required|max:5|unique:t_master_emp,EMP_CODE',
            'empName'  => 'regex:/^[가-힣a-zA-Z0-9\s]+/|max:10',
            'empPassword' => 'required|regex:/^[a-zA-Z0-9\s]+/|max:16',
            'empType'  => 'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('t_master_emp')->insert([
                'ICE_CODE' => $request->get('iceCode'),
                'EMP_CODE' => $request->input('empCode'),
                'EMP_NAME' => $request->input('empName'),
                'EMP_PHONE' => str_replace('-', '',$request->input('empPhone')),
                'EMP_PASSWORD' => Hash::make($request->input('empPassword')),
                'EMP_GROUP' => "E",
                'EMP_TYPE' => $request->input('empType'),
                'NOTE' => $request->input('note'),
                'ADD1' => $request->input('add1'),
                'REG_ID' => $request->get('regId'),
            ]);
            $response['response'] = ["message"=> "수리기사 저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }
    // 도매장 update MODE
    public function wholeSaleUpdate(Request $request) {
        $validator = Validator::make($request->all(), [ // Form_validation
            'wholeCode' => 'required',
            'wholeName'  => 'required|max:30|regex:/^[가-힣\s]+/|',
            'wholePhone' => 'required|max:11',
            'wholeCeo'  => 'required|max:10',
            'wholeBiz'   => 'required|max:10',
            'wholeBizNum' => 'required',
            'wholeType'  => 'required',
            'wholeAddress' => 'required',
            'wholeZipcode' => 'required',
            'wholeEmail' => 'required',
            'wholeUseYN' => 'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('MASTER_WHOLESALE')->where('WHOLE_CODE', $request->wholeCode)->update([
                'WHOLE_NAME' => $request->input('wholeName'),
                'WHOLE_PHONE' => $request->input('wholePhone'),
                'WHOLE_CEO' => $request->input('wholeCeo'),
                'WHOLE_BIZ' => $request->input('wholeBiz'),
                'WHOLE_BIZ_NUM' => $request->input('wholeBizNum'),
                'WHOLE_TYPE' => $request->input('wholeType'),
                'WHOLE_ADDRESS' => $request->input('wholeAddress'),
                'WHOLE_ZIPCODE' => $request->input('wholeZipcode'),
                'WHOLE_EMAIL' => $request->input('wholeEmail'),
                'WHOLE_USEYN' => $request->input('wholeUseYN'),
                'NOTE' => $request->input('note'),
                'ADD1' => $request->input('add1'),
            ]);
            $response['response'] = ["message"=> "도매장 수정 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }

    // 업소 update MODE
    public function storeUpdate(Request $request) {
        $validator = Validator::make($request->all(), [ // Form_validation
            'storeName'=>'required',
            'wholeCode'=>'required',
            'storePhone'=>'required',
            'storeCeo' =>'required', 
            'storeBizNum'=>'required', 
            'storeBiz'=>'required', 
            'storeType'=>'required',
            'empCode' => 'required',
            'storeAddress' =>'required',
            'storeZipcode' =>'required',
            'storeEmail' =>'required',
            'storeUseYN' =>'required',
            'note' =>'required',
            'regId' =>'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('MASTER_STORE')->where('STORE_CODE', $request->storeCode)->update([
                'ICE_CODE' => $request->get('iceCode'),
                'STORE_CODE' => "M" . Master::sCodeSeq(),
                'STORE_NAME' => $request->get('storeName'),
                'WHOLE_CODE' => $request->get('wholeCode'),
                'STORE_PHONE' => $request->get('storePhone'),
                'STORE_CEO' => $request->get('storeCeo'),
                'STORE_BIZ_NUM' => $request->get('storeBizNum'),
                'STORE_BIZ' => $request->get('storeBiz'),
                'STORE_TYPE' => $request->get('storeType'),
                'EMP_CODE' => $request->get('empCode'),
                'STORE_ADDRESS' => $request->get('storeAddress'),
                'STORE_ZIPCODE' => $request->get('storeZipcode'),
                'STORE_EMAIL' => $request->get('storeEmail'),
                'STORE_USEYN' => $request->get('storeUseYN'),
                'NOTE' => $request->get('note'),
                'REG_ID' => $request->get('regId'),
            ]);
            $response['response'] = ["message"=> "업소 수정 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
        
    }

    // 상품 update MODE
    public function goodsUpdate(Request $request) {
        $validator = Validator::make($request->all(), [ // Form_validation
            'goodsName'  => 'required',
            'wholeCode'  => 'required',
            'goodsMaker' => 'required',
            'goodsDiv'   => 'required',
            'goodsNick'  => 'required',
            'goodsVol'   => 'required',
            'goodsType'  => 'required',
            'lastModify' => 'required',
            'purchCost'  => 'required',
            'goodsUseYN' => 'required',
            'note'       => 'required',
            'regId'      => 'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('MASTER_GOODS')->where('GOODS_CODE', $request->goodsCode)->update([
                'GOODS_NAME' => $request->input('goodsName'),
                'WHOLE_CODE' => $request->input('wholeCode'),
                'GOODS_MAKER' => $request->input('goodsMaker'),
                'GOODS_DIV' => $request->input('goodsDiv'),
                'GOODS_NICK' => $request->input('goodsNick'),
                'GOODS_VOL' => $request->input('goodsVol'),
                'GOODS_TYPE' => $request->input('goodsType'),
                'PURCH_COST' => $request->input('purchCost'),
                'GOODS_USEYN' => $request->input('goodsUseYN'),
                'NOTE'   => $request->note,
                'REG_ID' => $request->regId,
                'LAST_MODIFY' => now(),
                'UP_DATE'     => date('Y-m-d H:i:s'),
            ]);
            $response['response'] = ["message"=> "상품 수정 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }
 
    // 수리정보 update MODE
    public function fixUpdate(Request $request) {
        $validator = Validator::make($request->all(), [ // Form_validation
            'fixName'  => 'required',
            'purchCost' => 'required',
            'salesCost' => 'required',
            'marginPer'  => 'required',
            'note'       => 'required',
            'regId'      => 'required',
            'fixUseYN'   => 'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('MASTER_FIX')->where('FIX_CODE', $request->fixCode)->update([
                'PURCH_COST' => $request->input('purchCost'),
                'SALES_COST' => $request->input('salesCost'),
                'MARGIN_PER' => $request->input('marginPer'),
                'NOTE' => $request->input('note'),
                'LAST_MODIFY' => $request->input('regId'),
                'ADD1' => $request->input('fixUseYN'),
                'UP_DATE'     => date('Y-m-d H:i:s'),
                'REG_ID' => $request->regI
            ]);
            $response['response'] = ["message"=> "수리정보 수정 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }

    // 여기부터 return View
    public function wholeAddView() {
        return view('master.wholeAdd',["title" => "도매장 저장" ]);
    }
 
    public function storeAdd () {
        return view('master.storeAdd',["title" => "업소 저장" ]);
    }
     
    public function goodsAdd () {
        return view('master.goodsAdd',["title" => "상품 저장" ]);
    }
     
    public function fixAdd () {
        return view('master.fixAdd',["title" => "수리업무 저장" ]);
    }
     
    public function empAdd () {
        return view('master.empAdd',["title" => "영업사원 저장" ]);
    }
    
    // 사업자번호(도매장) 중복 체크
    public function bizNumCheck (Request $request) {
        $bizNumCheck = DB::table('t_master_wholesale')
        ->where('WHOLE_BIZ_NUM',$request->wholeBizNum)
        ->count();
        if($bizNumCheck > 0) {
            echo "fail";
        }else {
            echo "중복이 아닙니다";
        }
    }

     // 사업자번호(업소) 중복 체크
     public function storeNumCheck (Request $request) {
        $storeNumCheck = DB::table('t_master_store')
        ->where('STORE_BIZ_NUM',$request->storeBizNum)
        ->count();
        if($storeNumCheck > 0) {
            echo "fail";
        }else {
            echo "중복이 아닙니다";
        }
    }


}
