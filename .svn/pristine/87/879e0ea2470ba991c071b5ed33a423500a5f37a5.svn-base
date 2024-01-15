@extends('layouts.master')
@section('content')

<span class="frame3-text08"><span>적용일자</span></span>
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
    <input type="text" name="empName" placeholder="성명" class="frame3-rectangle11884" />
    <input type="text" name="storeType" id="storeType" placeholder="종목을 입력해 주세요." alt="종목" class="frame3-rectangle34" />
    <input type="text" name="storePhone" id="storePhone" placeholder="전화번호를 입력해 주세요." alt="전화번호" class="frame3-rectangle11885" />
    <input type="text" name="storeCeo" id="storeCeo" placeholder="대표자명을 입력해 주세요." alt="대표자명" class="frame3-rectangle28" />
    <input type="text" name="note" id="note" placeholder="비고를 입력해 주세요." alt="비고" class="frame3-rectangle32" />
    <input type="text" name="zipCode" id="zipCode" placeholder="우편번호를 입력해 주세요." alt="우편번호" class="frame3-rectangle31" readonly />
    <input type="text" name="addr" id="addr" placeholder="주소를 입력해 주세요." alt="주소" class="frame3-rectangle29" readonly/>
    <input type="text" name="addrDetail" id="addrDetail" placeholder="상세주소를 입력해 주세요." alt="상세주소" class="frame3-rectangle30" />
    @include('include.nav1')
    <div class="frame3-btn-check">
      <span class="frame3-text89"><span onclick="execution_daum_address()">주소검색</span></span>
    </div>
    <img
      alt="BtnCalender4050"
      src="../public2/btncalender4050-g9lo.svg"
      class="frame3-btn-calender"
    />
    <div class="frame3-btn-basic-blue">
      <span class="frame3-text91"><span><button id="storeSaveBtn">저장</button></span></span>
    </div>
</form>
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

    //post 글작성 + 수정
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