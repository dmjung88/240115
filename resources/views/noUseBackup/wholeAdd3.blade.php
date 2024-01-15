@extends('layouts.master')
@section('content')
<form id="wholeSaveForm" autocomplete="off">
    <input type="text" id="wholeName" name="wholeName" placeholder="도매장명을 입력해 주세요." class="frame-rectangle23" />
    <input type="text" id="wholePhone" name="wholePhone" placeholder="숫자만 입력해 주세요." class="frame-rectangle24" />
    <input type="text" id="wholeCeo" name="wholeCeo" placeholder="이름을 입력해 주세요." class="frame-rectangle26" />
    <input type="text" id="wholeBiz" name="wholeBiz" placeholder="업태를 입력해 주세요." class="frame-rectangle27" />
    <input type="text" id="wholeType" name="wholeType" placeholder="종목을 입력해 주세요." class="frame-rectangle28" />
    <input type="text" id="wholeEmail" name="wholeEmail" placeholder="이메일을 입력해 주세요." class="frame-rectangle32" />
    <input type="text" id="wholeZipcode" name="wholeZipcode" placeholder="우편번호를 입력해 주세요." class="frame-rectangle31" readonly="readonly" />
    <input type="text" id="wholeBizNum" name="wholeBizNum" placeholder="사업자번호를 입력해 주세요." class="frame-rectangle25" />
    <input type="text" id="addr" name="addr" placeholder="주소를 입력해주세요." class="frame-rectangle29" readonly="readonly"/>
    <input type="text" id="addrDetail" name="addrDetail" placeholder="상세주소를 입력해 주세요." class="frame-rectangle30" readonly="readonly"/>
    <img alt="Btnlogout4049" scr="{{ asset('public1/btnlogout4049-xedg.svg') }}" class="frame-btnlogout" />
    @include('include.nav1')
         
    <div class="frame-btn-check">
        <span class="frame-text78"><button type="button" id="wholeCheckBtn">체크</button></span>
    </div>
    <div class="frame-btn-check1">
        <span class="frame-text79"><button type="button" onclick="execution_daum_address()">주소검색</button></span>
    </div>
    <div class="frame-btn-basic-blue">
        <input type="button" id="wholeSaveBtn" class="frame-text80" value="저장">
    </div>
  </form>
<script>

</script>
@endsection