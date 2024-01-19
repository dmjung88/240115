<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;

class ViewController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function workRequest() {
        return view('work.req',["title" => "업무 접수" ]);
    }
    public function workProcess() {
        return view('work.process',["title" => "업무 처리" ]);
    }
    public function reportNew() {
        return view('report.reportNew',["title" => "발행" ]);
    }
    public function bondNew() {
        return view('bond.bondNew',["title" => "채권" ]);
    }
    public function taxNew() {
        return view('tax.taxNew',["title" => "세금계산서" ]);
    }
    public function gyunjeokReport() {
        $title = "견적서";
        return view('report.gyunjeok',compact("title"));
    }
    public function aggregateReport() {
        return view('report.aggregate',["title" => "집계현황" ]);
    }
    public function mypage(Request $request) {
        $data['title'] ='마이페이지';
        //dd($request->session()->all());
        $data['userdata'] = DB::selectOne("SELECT * FROM t_master_emp WHERE EMP_CODE=?",[session()->get('empCode')]);
        return view('mypage.index',$data);
    }
    public function adminPage() {
        $title = "관리자";
        return view('mypage.adminPage',compact("title"));
    }
    //관리자 페이지 회사전체
    public function adminList(Request $request) {
        $adminList = DB::table('t_cost_history',"ch")
        ->join('t_master_ice AS mi', 'ch.ICE_CODE', 'mi.ICE_CODE')
        ->select('mi.ICE_CODE',"mi.ICE_CONAME","ICE_ADDRESS","ICE_CEONAME","ICE_PHONE"
        ,"ICE_CONNECT_EMP","ICE_STATUS","ICE_BANK_NAME","ICE_BANK_ACCOUNT","ICE_BANK_ACCOUNT_NAME"
        ,"mi.NOTE","mi.JOIN_DATE","mi.UP_DATE"
        ,"ch.IDX","ch.REG_DATE","COST_YYMM","COST_SUM","COST_BASIC","COST_MOBILE","COST_ADD")
        ->where('ICE_CONAME', 'like', '%'.$request->iceConame.'%')
        ->where('ICE_STATUS', 'like', "정상")
        ->get();
        $response = array('response' => ["message"=> "관리자페이지 회사리스트", "data"=> $adminList], 'success'=> true);
        return Response::json($response, 200);
    }
   
}
