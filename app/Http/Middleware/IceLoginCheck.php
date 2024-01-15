<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IceLoginCheck
{
    /**
     * kernel 등록
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('iceCode') && ($request->path() !='/' )){
            //로그인 X 이거나 로그인 또는 회원가입 페이지가아니면
            return redirect('/')->with('fail','로그인해야 페이지를 이용할수있습니다.');
            //로그인 페이지로 리디렉트       
        }
        if(session()->has('iceCode') && ($request->path() == '/' ) ) {
            //로그인 중이면서 로그인 페이지 또는 회원가입 페이지로 이동하면
            return back();
        }
        //FORWARD
        return $next($request);
    }
}
