@extends('layouts.master')
@section('content')

{{-- public3 style3 index4 --}}
<link href="{{ asset('css/style3.css') }}" rel="stylesheet" />
<link href="{{ asset('css/index4.css') }}" rel="stylesheet" />

    <div>
      <div class="page2-container">
        <div class="page2-frame">
          <img
            alt="Rectangle53244"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/1eea9a9d-8c9f-44d2-8e76-fd05a70f712c?org_if_sml=113851&amp;force_format=original"
            class="page2-rectangle5"
          />
          <img
            alt="bar13244"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/14ba0a0d-6b64-44df-8c2f-1fb6d75293e7?org_if_sml=11020&amp;force_format=original"
            class="page2-bar1"
          />
          <img
            alt="bar23244"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/397df990-8dd3-4fed-9ed6-0ca7f3824c35?org_if_sml=13493&amp;force_format=original"
            class="page2-bar2"
          />
          <div class="page2-layer1">
            <div class="page2-group1">
              <img
                alt="Vector3245"
                src="../public3/vector3245-9xym.svg"
                class="page2-vector"
              />
              <img
                alt="Vector3245"
                src="../public3/vector3245-4o7i.svg"
                class="page2-vector01"
              />
              <img
                alt="Vector3245"
                src="../public3/vector3245-04sd.svg"
                class="page2-vector02"
              />
              <img
                alt="Vector3245"
                src="../public3/vector3245-1wrf.svg"
                class="page2-vector03"
              />
              <img
                alt="Vector3245"
                src="../public3/vector3245-xud.svg"
                class="page2-vector04"
              />
              <img
                alt="Vector3245"
                src="../public3/vector3245-0a8g.svg"
                class="page2-vector05"
              />
              <img
                alt="Vector3245"
                src="../public3/vector3245-qofc.svg"
                class="page2-vector06"
              />
              <img
                alt="Vector3245"
                src="../public3/vector3245-e764.svg"
                class="page2-vector07"
              />
              <img
                alt="Vector3246"
                src="../public3/vector3246-68v9.svg"
                class="page2-vector08"
              />
              <img
                alt="Vector3246"
                src="../public3/vector3246-iq1d.svg"
                class="page2-vector09"
              />
            </div>
          </div>
        @include('include.logoutNav')
          <img
            alt="container3247"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/d59bda01-0530-434d-9471-107760ee3e26?org_if_sml=15581&amp;force_format=original"
            class="page2-container1"
          />
        <form id="goodsSaveForm" autocomplete="off">
          <span class="page2-text08"><span>상품명</span></span>
          <span class="page2-text10">*</span>
          <span class="page2-text11">*</span>
          <span class="page2-text12">*</span>
          <span class="page2-text13"><span>제조사</span></span>
          <span class="page2-text15"><span>별칭</span></span>
          <span class="page2-text17"><span>규격</span></span>
          <span class="page2-text19"><span>도매장</span></span>
          <span class="page2-text21"><span>비고</span></span>
          <span class="page2-text23"><span>매입가</span></span>
          <span class="page2-text25"><span>용량</span></span>
          <span class="page2-text27"><span>사용여부</span></span>
          <span class="page2-text29"><span>상품구분</span></span>
          <input type="text" name="goodsName" id="goodsName" placeholder="상품명을 입력해 주세요." class="page2-rectangle11886" />
          <input type="text" name="goodsMaker" id="goodsMaker" placeholder="제조사명을 입력해 주세요." class="page2-rectangle24" />
          <input type="text" name="goodsDiv" id="goodsDiv" placeholder="제품구분명을 입력해 주세요." class="page2-rectangle47" />
          <input type="text" name="goodsNick" id="goodsNick" placeholder="제품명을 입력해 주세요.." class="page2-rectangle26" />
          <input type="text" name="wholeName" id="wholeName" placeholder="도매장명을 입력해 주세요.." class="page2-rectangle11888" />
          <input type="text" name="goodsType" id="goodsType" placeholder="규격은 숫자를 입력해 주세요." class="page2-rectangle33" />
          <input type="text" name="note" id="note" placeholder="비고를 입력해 주세요." class="page2-rectangle34" />
          <input type="text" name="purchCost" id="purchCost" placeholder="매입가격을 입력해 주세요." class="page2-rectangle11887" />
          <input type="text" name="goodsVol" id="goodsVol" placeholder="용량은 숫자를 입력해주세요." class="page2-rectangle28" />
        
          <input type="hidden" name="iceCode" value="{{ Session::get('iceCode')}}">
          <input type="hidden" name="regId" value="{{ Session::get('empCode').' '.Session::get('empGroup')}}">
        
          @include('include.masterAddNav')
          <span class="page2-text59"><span>최종 단가 수정일</span></span>
          <input type="text"  name="lastModify" id="datepicker"
          class="page2-rectangle46" />
        @include('include.mainNav')
          <div class="page2-btn-off-on">
            <div class="page2-btn-off-on1">
              <span class="page2-text73"><input type="radio" name="chk_status" value="N">OFF</span>
            </div>
            <div class="page2-btn-off-on2">
              <span class="page2-text75"><input type="radio" name="chk_status" value="Y" checked>ON</span>
            </div>
          </div>
          <div class="page2-footer">
             <img
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/18563a24-ef56-455f-b6a3-158c876ea869?org_if_sml=1845&amp;force_format=original"
              class="page1-rectangle33"
            />
        @include('include.footer')
          </div>
          <img
            alt="Btnlogout4049"
            src="../public3/btnlogout4049-8ipg.svg"
            class="page2-btnlogout"
          />
          <img
            alt="BtnCalender4050"
            src="../public3/btncalender4050-x15.svg"
            class="page2-btn-calender"
          />
          <div class="page2-btn-basic-blue">
            <span class="page2-text79"><input type="submit" id="goodsSaveBtn" value="저장"></span>
          </div>
        </form>
        </div>
      </div>
    </div>

    {{-- 스크립트 --}}
<script src="../js/address_search.js"></script>
<script src="../js/form-validation3.js"></script>
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
    $('#datepicker').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //post 글작성 
    $('#goodsSaveForm').submit(function (e) {
        e.preventDefault();
          if(checkInput()) {
            $.ajax({
                data: new FormData(this),
                processData:false,
                contentType:false,
                url: "{{ route('master.goodsSave') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.info(data);
                    if(data.success == true) {
                        $('#goodsSaveForm').trigger("reset");
                        alert('저장성공');
                        location.reload();
                    }
                },
                error: function (err) {
                    console.log('Error:', err);
                }
            });
          }
    })
}); //endJQ
</script>
@endsection
