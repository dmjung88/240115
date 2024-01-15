<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;

class Viewcontroller extends Controller
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
   
}
