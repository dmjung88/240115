@extends('layouts.master')
@section('content')

<link href="{{ asset('css/login.css') }}" rel="stylesheet" />

        <div class="v26_813">
            <div class="v26_814"></div>
        <div class="v26_815">
            
        </div>
    </div>
<span class="v26_827">daSoori.com</span>
<span class="v26_828">Copyright © 2023 릴랩. all rights reserved</span>
<form class="emp_form">
    <span class="v26_829">사업자번호</span>
    <span class="v26_830">전화번호</span>
    <span class="v26_831">비밀번호</span>
    <input type="text" name="empIceBizNum" id="empIceBizNum" class="v26_832" />
    <input type="text" name="empPhone" id="empPhone" class="v26_833" />
    <input type="text" name="empPassword" id="empPassword" class="v26_834" />
</form>
<form class="company_form">
    <span class="v26_830">사업자번호</span>
    <span class="v26_831">비밀번호</span>
    <input type="text" name="iceBizNum" id="iceBizNum" class="v26_833" />
    <input type="text" name="password" id="password" class="v26_834" />
</form>
<div class="v26_835 emp_form" >
    <span class="v26_836"><button id="empFormBtn">로그인</button></span>
</div>
<div class="v26_835 company_form" >
    <span class="v26_836"><button id="company_form">로그인</button></span>
</div>  
<div class="frame1-frame17">
    <div class="frame1-tab-login">
      <span class="frame1-text12"><input type="radio" name="chk_emp" id="emp" checked>수리기사님</span>
    </div>
    <div class="frame1-tab-login1">
      <span class="frame1-text14"><input type="radio" name="chk_emp" id="company">회사관리자</span>
    </div>
  </div>
</div>
<script src="../js/form-validation6.js"></script>
<script>
$(document).ready(function(){
    $('.emp_form').show();
    $('.company_form').hide();

    $("[name=chk_emp]").change(function(){
        if($("#emp").is(":checked")){
            $('.emp_form').show();
            $('.company_form').hide();
        }else if($("#company").is(":checked")){
            $('.emp_form').hide();
            $('.company_form').show();
        }
    });

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $("#empFormBtn").on("click",function(e) { // 수리기사님
        e.preventDefault();
        if(checkInputEmp()) {
            $.ajax({
                data: $('.emp_form').serializeArray(),
                url: "{{ route('personalLogin') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.info(data);
                    if(data.success == true) {
                        $('#empFormBtn').trigger("reset");
                        alert('수리기사 로그인 성공!');
                        location.href= "{{ url('master/wholeAdd') }}";
                    }
                },
                error: function (err) {
                    console.log('Error:', err);
                }
            });
        }
    });
    $("#company_form").on("click",function(e) { // 회사관리자
        e.preventDefault();
        if(checkInputIce()) {
            $.ajax({
                data: $('.company_form').serializeArray(),
                url: "{{ route('companyLogin') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.info(data);
                    if(data.success == true) {
                        $('#company_form').trigger("reset");
                        alert('회사관리자 로그인 성공');
                        location.href= "{{ url('master/wholeAdd') }}";
                    }
                },
                error: function (err) {
                    console.log('Error:', err);
                }
            });
        }
    });
}); //endJQ
</script>

@endsection