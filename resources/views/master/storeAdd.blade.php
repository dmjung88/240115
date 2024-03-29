@extends('layouts.master')
@section('content')

<link href="{{ asset('css/style2.css') }}" rel="stylesheet" />
<link href="{{ asset('css/index2.css') }}" rel="stylesheet" />
    <div>
      <div class="frame3-container">
        <div class="frame3-frame">
          <img
            alt="Rectangle52833"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/ec04dd1d-2aa3-4617-b0c5-7c4b8797bb82?org_if_sml=114034&amp;force_format=original"
            class="frame3-rectangle5"
          />
          <img
            alt="bar12833"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/64dc9c79-5023-482b-a364-27f94023d4c8?org_if_sml=11020&amp;force_format=original"
            class="frame3-bar1"
          />
          <img
            alt="Btnlogout4049"
            src="../public2/btnlogout4049-rni.svg"
            class="frame3-btnlogout"
          />
          <img
            alt="bar22833"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/320e356b-60a1-4bf5-b9f4-c87181481b21?org_if_sml=13493&amp;force_format=original"
            class="frame3-bar2"
          />
          <div class="frame3-layer1">
            <div class="frame3-group1">
              <img
                alt="Vector2833"
                src="../public2/vector2833-myal.svg"
                class="frame3-vector"
              />
              <img
                alt="Vector2833"
                src="../public2/vector2833-5dap.svg"
                class="frame3-vector01"
              />
              <img
                alt="Vector2833"
                src="../public2/vector2833-s77a.svg"
                class="frame3-vector02"
              />
              <img
                alt="Vector2833"
                src="../public2/vector2833-pfg6.svg"
                class="frame3-vector03"
              />
              <img
                alt="Vector2834"
                src="../public2/vector2834-37r0l.svg"
                class="frame3-vector04"
              />
              <img
                alt="Vector2834"
                src="../public2/vector2834-8wb.svg"
                class="frame3-vector05"
              />
              <img
                alt="Vector2834"
                src="../public2/vector2834-enqe.svg"
                class="frame3-vector06"
              />
              <img
                alt="Vector2834"
                src="../public2/vector2834-8zun.svg"
                class="frame3-vector07"
              />
              <img
                alt="Vector2834"
                src="../public2/vector2834-vu2e.svg"
                class="frame3-vector08"
              />
              <img
                alt="Vector2834"
                src="../public2/vector2834-9f0o.svg"
                class="frame3-vector09"
              />
            </div>
          </div>
        @include('include.logoutNav')
          <img
            alt="container2836"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/e494d28e-8b4d-41c7-99b9-91caad453339?org_if_sml=16431&amp;force_format=original"
            class="frame3-container1"
          />
          <span class="frame3-text08"><span>적용일자</span></span>
          <span class="frame3-text10">*</span>
          <span class="frame3-text11"><span>상호</span></span>
          <span class="frame3-text13"><span>사업자번호</span></span>
          <span class="frame3-text15"><span>업태</span></span>
          <span class="frame3-text17"><span>영업사원</span></span>
          <span class="frame3-text19"><span>종목</span></span>
          <span class="frame3-text21"><span>전화번호</span></span>
          <span class="frame3-text23"><span>대표자명</span></span>
          <span class="frame3-text25"><span>비고</span></span>
          <span class="frame3-text27"><span>사용여부</span></span>
          <span class="frame3-text29"><span>우편번호</span></span>
          <span class="frame3-text31"><span>도매장</span></span>
          <span class="frame3-text33"><span>주소</span></span>
          <span class="frame3-text35"><span>상세주소</span></span>
          
          <form id="storeSaveForm" autocomplete="off">
            <input type="text" name="storeName" id="storeName" placeholder="업소명을 입력해 주세요." alt="상호" class="frame3-rectangle24" />
            <input type="text" name="wholeName" id="wholeName" placeholder="도매장명을 입력해 주세요." alt="도매장" class="frame3-rectangle47" />
            <input type="text" name="storeBizNum" id="storeBizNum" placeholder="사업자번호를 입력해 주세요." alt="사업자번호" class="frame3-rectangle26" />
            <input type="text" name="storeBiz" id="storeBiz" placeholder="업태를 입력해 주세요." alt="업태" class="frame3-rectangle33" />
            <input type="text" name="empCode" id="empCode" placeholder="사원코드" alt="영업사원" class="frame3-rectangle27" />
            <input type="text" name="empName" id="empName"placeholder="성명" class="frame3-rectangle11884" />
            <input type="text" name="storeType" id="storeType" placeholder="종목을 입력해 주세요." alt="종목" class="frame3-rectangle34" />
            <input type="text" name="storePhone" id="storePhone" placeholder="전화번호를 입력해 주세요." alt="전화번호" class="frame3-rectangle11885" />
            <input type="text" name="storeCeo" id="storeCeo" placeholder="대표자명을 입력해 주세요." alt="대표자명" class="frame3-rectangle28" />
            <input type="text" name="note" id="note" placeholder="비고를 입력해 주세요." alt="비고" class="frame3-rectangle32" />
            <input type="text" name="zipCode" id="zipCode" placeholder="우편번호를 입력해 주세요." alt="우편번호" class="frame3-rectangle31" readonly />
            <input type="text" name="addr" id="addr" placeholder="주소를 입력해 주세요." alt="주소" class="frame3-rectangle29" readonly/>
            <input type="text" name="addrDetail" id="addrDetail" placeholder="상세주소를 입력해 주세요." alt="상세주소" class="frame3-rectangle30" />
       
            <input type="hidden" name="iceCode" value="{{ Session::get('iceCode')}}">
            <input type="hidden" name="regId" value="{{ Session::get('empCode').' '.Session::get('empGroup')}}">
            @include('include.masterAddNav')
        <input type="text"
        name="applyDate" id="datepicker"
        class="frame3-rectangle46"
      />
          <img
            alt="iconamoonarrowup23243"
            src="../public2/iconamoonarrowup23243-bnss.svg"
            class="frame3-iconamoonarrowup2"
          />
        @include('include.mainNav')
          <div class="frame3-btn-off-on">
            <div class="frame3-btn-off-on1">
              <span class="frame3-text83"><input type="radio" name="chk_status" value="N">OFF</span>
            </div>
            <div class="frame3-btn-off-on2">
              <span class="frame3-text85"><input type="radio" name="chk_status" value="Y" checked>ON</span>
            </div>
          </div>
          <div class="frame3-footer">
            <img
              alt="Rectangle33I404"
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/f750d9c9-b2d2-41b3-a7e6-4467ee425c57?org_if_sml=1845&amp;force_format=original"
              class="frame3-rectangle331"
            />
          @include('include.footer')
          </div>
          <div class="frame3-btn-check">
            <span class="frame3-text89"><span onclick="execution_daum_address()">주소검색</span></span>
          </div>
          <img
            alt="BtnCalender4050"
            src="../public2/btncalender4050-g9lo.svg"
            class="frame3-btn-calender"
          />
          <div class="frame3-btn-basic-blue">
            <span class="frame3-text91"><button id="storeSaveBtn">저장</button></span>
          </div>
          </form>
        </div>
      </div>
    </div>

{{-- 스크립트 --}}
<script src="../js/address_search.js"></script>
<script src="../js/form-validation2.js"></script>
<script type="text/javascript">
$(function () {

    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd' //달력 날짜 형태
        ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
        ,showMonthAfterYear:true // 월- 년 순서가아닌 년도 - 월 순서
        ,changeYear: true //option값 년 선택 가능
        ,changeMonth: true //option값  월 선택 가능                
        ,showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
        ,buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif" //버튼 이미지 경로
        ,buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
        ,buttonText: "선택" //버튼 호버 텍스트              
        ,yearSuffix: "년" //달력의 년도 부분 뒤 텍스트
        ,monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] //달력의 월 부분 텍스트
        ,monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] //달력의 월 부분 Tooltip
        ,dayNamesMin: ['일','월','화','수','목','금','토'] //달력의 요일 텍스트
        ,dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'] //달력의 요일 Tooltip
        ,minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
        ,maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
    });                    
       
    //초기값을 오늘 날짜로 설정해줘야 합니다.
    $('#datepicker').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //post 글작성
    $('#storeSaveBtn').click(function (e) {
        e.preventDefault();
        if(checkInput()) {
            $.ajax({
                data: $('#storeSaveForm').serialize(),
                url: "{{ route('master.storeSave') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.info(data);
                    if(data.success == true) {
                        $('#storeSaveForm').trigger("reset");
                        alert('저장성공');
                        location.reload();
                    }
                },
                error: function (err) {
                    console.log('Error:', err);
                }
            });
        } //endCheckInput()
    })
}); //endJQ
</script>
@endsection