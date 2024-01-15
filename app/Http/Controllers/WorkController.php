<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Master;

class WorkController extends Controller
{
    // 19 접수 저장
    public function receiveSave(Request $request) {
        $wholeCode = DB::selectOne("SELECT WHOLE_CODE FROM t_master_wholesale WHERE WHOLE_NAME = ?", [$request->wholeName]);
        $storeCode = DB::selectOne("SELECT STORE_CODE FROM t_master_store WHERE STORE_NAME = ?", [$request->storeName]);
        $validator = Validator::make($request->all(), [ // Form_validation
            'workDate'  => 'required|date', //'2020-01-01 00:00:00'
            'workType'  => 'required|regex:/^[ㄱ-ㅎ가-힣a-zA-Z0-9\s]+/|max:30',
            'workTitle' => 'required|regex:/^[ㄱ-ㅎ가-힣a-zA-Z0-9\s]+/|max:30',
            'storeName' => 'required|regex:/^[ㄱ-ㅎ가-힣a-zA-Z0-9\s]+/|max:30',
            'wholeName' => 'required|regex:/^[ㄱ-ㅎ가-힣a-zA-Z0-9\s]+/|max:30',
            'workPhone' => 'required|max:13',
            'zipCode' => 'required',
            'addr' => 'required',
            'addrDetail' => 'required',
        ]);
        $response = array('response' => '', 'success'=> false);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('t_work_request')->insert([
                'ICE_CODE' => $request->input('iceCode'),
                'WORK_DATE' => $request->input('workDate'),
                'WORK_TYPE' => $request->input('workType'),
                'WORK_TITLE' => $request->input('workTitle'),
                'WORK_PHONE' =>  str_replace('-', '',$request->workPhone),
                'REG_DATE'  => now(),
                'STORE_CODE' => $storeCode->STORE_CODE,
                'WHOLE_CODE' => $wholeCode->WHOLE_CODE,
            ]);
            $response['response'] = ["message"=> "업무접수 저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }

    //20 업무코드별 데이터 조회
    public function codeSearch(Request $request) {
        $sql = "SELECT * FROM `t_work_request` WHERE WORK_CODE LIKE ? OR idx = ? ";
        $reqSearch = DB::selectOne($sql ,["%{$request->storeCode}%",$request->id]);
        $response = array('response' => ["message"=> "업무접수아이디 또는 업소코드로 검색", "data"=> $reqSearch], 'success'=> true);
        return Response::json($response, 200);
    }
    //21 매출내용 등록
    public function salesSave (Request $request) {
        $validator = Validator::make($request->all(), [ 
            ''  => 'required',
            ''  => 'required|date', //'2020-01-01 00:00:00'
            ''  => 'required|regex:/^[ㄱ-ㅎ가-힣a-zA-Z0-9\s]+/|max:30',
        ]);
        $response = array('response' => '', 'success'=> false);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('')->insert([
               
            ]);
            $response['response'] = ["message"=> "매출내용 저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }

    //22 해당업무 저장
    public function workProSave(Request $request) {
        
        @$wholeCode = DB::selectOne("SELECT WHOLE_CODE FROM t_master_wholesale WHERE WHOLE_NAME = ?", [$request->wholeName]);
        @$storeCode = DB::selectOne("SELECT STORE_CODE FROM t_master_store WHERE STORE_NAME = ?", [$request->storeName]);
        @$goodsCode = DB::select("SELECT GOODS_CODE FROM t_master_goods WHERE GOODS_NAME = ?", [$request->goodsName]);
        
        if(!$storeCode) { // 업무처리시 업소 검색 안될때 업소 입력부터
            $rules = [
                'newStoreName'=>'required|max:30|string|regex:/^[가-힣a-zA-Z0-9\s]+/',
                'wholeName'=>'required|max:30',
                'storePhone'=>'required|max:13|min:8',
            ];
            $response = array('response' => '', 'success'=> false);
            $validator = Validator::make($request->all(), $rules); // Form_validation
            if ($validator->fails()) {
                $response['response'] = $validator->messages();
                return response()->json($response);
            } else {
                DB::table('t_master_store')->insert([
                    'ICE_CODE' => $request->get('iceCode'),
                    'STORE_CODE' => "S" . Master::sCodeSeq(),
                    'STORE_NAME' => $request->get('newStoreName'),
                    'STORE_PHONE' => str_replace('-', '',$request->input('storePhone')),
                    'REG_ID' => $request->get('regId'),
                    'APPLY_DATE' => now(),
                ]);
            }
        }     
        $validator = Validator::make($request->all(), [ 
            'storeName' => 'required|regex:/^[ㄱ-ㅎ가-힣a-zA-Z0-9\s]+/|max:30', 
            'workDate'  => 'required|date', //'2020-01-01 00:00:00'
            'empCode' => 'required|max:30', 
            'empName' => 'required|max:30', 
            'workCode'  => 'required', 
            'goodsName'  => 'required', 
            'note' => 'required',  
            'zipCode' => 'required',  
            'storePhone' => 'required|max:13', 
            'workTxt' => 'required', 
            'addr' => 'required', 
            'addrDetail' => 'required', 
            "fixCode"   => 'required', 
            "amount"    => 'required|integer', 
            "salesCost" => 'required|integer', 
        ]);

        $response = array('response' => '', 'success'=> false);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            $idx = DB::table('t_work_complete')->insertGetId([
                'ICE_CODE' => $request->input('iceCode'),
                'STORE_CODE' => $storeCode->STORE_CODE ?? "",
                'WHOLE_CODE' => $wholeCode->WHOLE_CODE ?? "",
                'GOODS_CODE' => $goodsCode[0]->GOODS_CODE,
                'STORE_NAME' => $request->input('storeName'),
                'GOODS_NAME' => $request->input('goodsName'),
                'EMP_CODE' => $request->input('empCode'),
                'EMP_NAME' => $request->input('empName'),
                'WORK_DATE' => $request->input('workDate'),
                'WORK_MANAGE' => $request->input('workManage'),
                'WORK_TXT' => $request->input('workTxt'),
                'WORK_CODE' => $request->input('workCode'),
                'REG_DATE' => now(),
            ]);
            @$fixData = DB::select("SELECT FIX_NAME, MARGIN_PER, PURCH_COST FROM t_master_fix WHERE FIX_CODE = ?", [$request->fixCode]);
         
            DB::table('t_fix_cost')->insert([
                'FIX_COST_IDX' => $idx,
                'FIX_CODE' => $request->fixCode,
                'FIX_NAME' => $fixData[0]->FIX_NAME ?? "",
                'FIX_CNT' => $request->amount,
                'SALES_COST' => $request->input('totalData'),
                'PURCH_COST' => $fixData[0]->PURCH_COST ?? "0",
                'MARGIN_PER' => $fixData[0]->MARGIN_PER ?? "0",
                'REG_ID' => $request->regId,
                'REG_DATE' => now(),
            ]);
            
            $response['response'] = ["message"=> "해당업무 저장 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);     
    }
    //23 업소수정 (항목별) 업무처리 수정모드
    public function workModify(Request $request) {
        $validator = Validator::make($request->all(), [ // Form_validation
            'id' => 'required',
            'storeCode' => 'required',
            'wholeCode' => 'required',
            'workDate'  => 'required|date', //'2020-01-01 00:00:00'
            'empCode' => 'required',
            'workCode'  => 'required',
            'goodsCode'  => 'required',
            'goodsName'  => 'required',
            'fixCostIdx' => 'required',
        ]);
        $response = ['response' => '', 'success'=> false];
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            DB::table('T_WORK_COMPLETE')->where('IDX', $request->id)->update([
                'STORE_CODE' => $request->get('storeCode'),
                'WORK_DATE' => $request->get('workDate'),
                'WORK_MANAGE' => $request->get('workManage'),
                'WORK_TXT' => $request->get('workTxt'),
            ]);
            $response['response'] = ["message"=> "업무처리 수정모드 성공" ];
            $response['success'] = true;
        }
        return Response::json($response, 201);
    }

     // ppt 10 업무처리 파랑 그리드
     public function workProBlueTable(Request $request) {
        $storeName = $request->storeName ?? '';
        $blueTable  = DB::table('t_fix_cost','fc')
        ->join('t_work_complete AS wc', 'wc.FIX_COST_IDX','=','fc.FIX_COST_IDX')
        ->join('t_master_store as ms', 'wc.STORE_CODE', '=', 'ms.STORE_CODE')
        ->join('t_master_goods as mg', 'wc.GOODS_CODE', '=', 'mg.GOODS_CODE')
        ->select("mg.GOODS_NAME","wc.WORK_CODE","fc.REG_DATE","fc.IDX","wc.FIX_COST_IDX"
        ,"wc.WORK_MANAGE","fc.FIX_NAME","fc.SALES_COST","wc.WORK_DATE" )
        ->selectRaw("(CASE wc.WORK_CODE 
        WHEN 00 THEN '판매' WHEN 10 THEN '입고' WHEN 20 THEN '수리대기' WHEN 21 THEN '수리완료' WHEN 90 THEN '폐기'
        WHEN 29 THEN '수리불가' WHEN 30 THEN '출고' WHEN 40 THEN '현장수리' WHEN 41 THEN '외주위탁수리'
        ELSE '합계' END) AS WORK_CODE")
        ->where("ms.STORE_NAME",'=',$storeName)
        ->orderBy('fc.IDX', 'asc')
        ->get();
        $output = "";
        foreach ($blueTable as $row) {
            $workDate = date('y-m-d' , strtotime($row->WORK_DATE));
            $output .="
            <span alt='Rectangle118923316' class='frame-rectangle118921' />
            <span class='frame-text111'><span>$row->GOODS_NAME</span></span>
            <span class='frame-text113'><span>$row->WORK_CODE</span></span>
            <span class='frame-text115'><span>$workDate</span></span>
            <div class='frame-btn-tablein'>
              <span class='frame-text117'><span><a class='detailWork' href='{$row->FIX_COST_IDX}'>이력</span></span>
            </div>
            <img src="." alt='Rectangle119003318' class='frame-rectangle119001' />
            "; }

        $response = array('response' => ["message"=> "파랑그리드 테이블데이타 검색", "data"=>$output], 'success'=> true);
        return Response::json($response, 200);
    }

    // ppt 10 업무처리 상세 팝업(모달)
    public function workProModal(Request $request) {
        $workDetail  = DB::table('t_fix_cost','fc')
        ->join('t_work_complete AS wc', 'wc.FIX_COST_IDX','=','fc.FIX_COST_IDX')
        ->join('t_master_fix AS mf', 'mf.FIX_CODE','fc.FIX_CODE')
        ->select("wc.WORK_DATE","fc.IDX","mf.NOTE")
        ->selectRaw("(CASE wc.WORK_CODE 
        WHEN 00 THEN '판매' WHEN 10 THEN '입고' WHEN 20 THEN '수리대기' WHEN 21 THEN '수리완료' WHEN 90 THEN '폐기'
        WHEN 29 THEN '수리불가' WHEN 30 THEN '출고' WHEN 40 THEN '현장수리' WHEN 41 THEN '외주위탁수리'
        ELSE '합계' END) AS WORK_CODE")
        ->where("wc.FIX_COST_IDX",'=',request()->fixCostIdx)
        ->orderBy('fc.IDX', 'asc')
        ->get();
        print_r($workDetail);die();
        $output = "";
        foreach ($blueTable as $row) {
            $workDate = date('y-m-d' , strtotime($row->WOKR_DATE));
            $output .="
            <span alt='Rectangle118923316' class='frame-rectangle118921' />
            <span class='frame-text111'><span>$row->GOODS_NAME</span></span>
            <span class='frame-text113'><span>$row->WORK_CODE</span></span>
            <span class='frame-text115'><span>$workDate</span></span>
            <div class='frame-btn-tablein'>
              <span class='frame-text117'><span><a id='detailWork' href='{$row->IDX}'></span></span>
            </div>
            <img src="." alt='Rectangle119003318' class='frame-rectangle119001' />
            "; }

        $response = array('response' => ["message"=> "파랑그리드 테이블데이타 모달", "data"=>$output], 'success'=> true);
        return Response::json($response, 200);
    }

    // ppt 11 수리 수량 * 매출가 정보 
    public function fixSalseData(Request $request) {
        $workDetail  = DB::table('t_master_fix')
        ->select("FIX_CODE","FIX_NAME","PURCH_COST","SALES_COST","MARGIN_PER")
        ->where("FIX_CODE",$request->fixCode)
        ->first();
        $output = "";
        $output .="
        <tr>
        <td class='frame-text120'><input type='text' name='ajaxAmount' value='{$request->amount}'></td>
        <td class='frame-text121'><input type='text' name='ajaxSalesCost' value='{$workDetail->SALES_COST}'></td>
        <td class='frame-text123'><input type='text' name='ajaxFixName' value='{$workDetail->FIX_NAME}'></td>
        <td class='frame-text125'><input type='text' name='ajaxFixCode' value='{$workDetail->FIX_CODE}'></td>
        <td class='frame-text127'><input type='text' name='ajaxTotalData' value='{$request->totalData}'></td>
        </tr>
        "; 

        $response = array('response' => ["message"=> "수리,수량,매출가", "data"=>$output], 'success'=> true);
        return Response::json($response, 200);
    }
}
