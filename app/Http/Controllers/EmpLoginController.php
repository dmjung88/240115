<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use DB;

class EmpLoginController extends Controller
{
    public function getLogin(){
        // $credentials = $request->only('id','password') :array
        // if(Auth::attempt($credentials))
        // return redirect()->intended(route(''));

        return view('emp.login');
    }

    public function getLoginSoori(){
        $title = "로그인";
        return view('login.login',compact('title'));
    }

    public function personalLogin(Request $request){
        //$request->validate([
        $validator = Validator::make($request->all(), [ 
            'empIceBizNum'=>'required',
            'empPhone'=>'required',
            'empPassword'=>'required|min:3|max:16'
        ]);

        $response = array('response' => '', 'success'=> false);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
            $response['success'] = 'noValidation';
        } else {
            $empIceBizNum = str_replace('-', '', $request->empIceBizNum);
            $empPhone = str_replace('-', '', $request->empPhone);
            $userInfo = DB::table('t_master_ice AS mi')
            ->join('t_master_emp AS me', 'mi.ICE_CODE','=','me.ICE_CODE')->where([
                ['EMP_GROUP', '=', 'E'],
                ['EMP_PHONE', '=', $empPhone],
                ['ICE_BIZNUM', '=',  $empIceBizNum],
            ])->first();

            if(!$userInfo){
                $response['response'] = ["message"=> "유저정보 정확하지않음" ];
                $response['success'] = false;
                return Response::json($response);
            } else {
                if(Hash::check($request->empPassword, $userInfo->EMP_PASSWORD)){
                    $request->session()->put('iceCode', $userInfo->ICE_CODE);
                    Session::put('iceConame', $userInfo->ICE_CONAME);
                    Session::put('empPhone', $userInfo->EMP_PHONE);
                    Session::put('empGroup', $userInfo->EMP_GROUP); 
                    Session::put('empCode', $userInfo->EMP_CODE); 
                    Session::put('empType', $userInfo->EMP_TYPE); 
                    Session::put('empName', $userInfo->EMP_NAME); 
                    Session::save();
                    $response['response'] = ["message"=> "수리기사 로그인 성공" ];
                    $response['success'] = true;
                } else {
                    $response['response'] = ["message"=> "비밀번호 불일치" ];
                    $response['success'] = false;
                }
            }
        }
        //Response 도우미에 헤더를 세 번째 매개변수로 전달
        return Response::json($response, 201,
        [
            'iceCode' =>@$userInfo->ICE_CODE ,
            'empGroup'=> @$userInfo->EMP_GROUP,
            'empCode' => @$userInfo->EMP_CODE,
            'empType' => @$userInfo->EMP_TYPE,
        ]
        );
    }

    public function companyLogin(Request $request){
        //$request->validate([
        $validator = Validator::make($request->all(), [ 
            'iceBizNum'=>'required',
            'password'=>'required|min:3|max:13'
        ]);
        $response = array('response' => '', 'success'=> false);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
            $response['success'] = "noValidation";
        } else {
            $bizNum = str_replace('-', '', $request->iceBizNum);
            $userInfo = DB::table('t_master_ice AS mi')
            ->join('t_master_emp AS me', 'mi.ICE_CODE','=','me.ICE_CODE')->where([
                ['EMP_GROUP', '=', 'C'],
                ['ICE_BIZNUM', '=',  $bizNum],
            ])->first();
    
            if(!$userInfo){
                $response['response'] = ["message"=> "유저정보 정확하지않음" ];
                $response['success'] = false;
            } else {
                if(Hash::check($request->password, $userInfo->EMP_PASSWORD)){
                    $request->session()->put('iceCode', $userInfo->ICE_CODE);
                    Session::put('iceConame', $userInfo->ICE_CONAME);
                    Session::put('empGroup', $userInfo->EMP_GROUP); 
                    Session::put('empCode', $userInfo->EMP_CODE); 
                    Session::put('empPhone', $userInfo->EMP_PHONE);
                    Session::put('empName', $userInfo->EMP_NAME); 
                    Session::save();
                    $response['response'] = ["message"=> "회사관리자 로그인 성공" ];
                    $response['success'] = true;
                } else {
                    $response['response'] = ["message"=> "비밀번호 불일치" ];
                    $response['success'] = false;
                }
            }
        }
        // 네트워크-헤더 확인
        return Response::json($response, 201,
        [
            'iceCode' =>@$userInfo->ICE_CODE ,
            'empGroup'=>@$userInfo->EMP_GROUP,
            'empCode' =>@$userInfo->EMP_CODE,
            'empType' =>@$userInfo->EMP_TYPE,
        ]);
    }
    public function dashboard() {
        if(Session::has('LoggedUserId')) {
            $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUserId'))->first()];
            return view('emp.dashboard', $data);
        }
    }

    public function logout() {
        if(session()->has('iceCode')){
            session()->pull('iceCode');
            //Session::forget('LoggedUserName');
            Session::flush();
            //Auth::logout();
            $response = array('response' => '', 'success'=> true);
            $response['response'] = ["message"=> "로그아웃 성공" ];
            return response()->json($response);
        }
    }
}
