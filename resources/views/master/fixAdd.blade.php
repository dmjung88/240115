{{-- 마스터 레이아웃 --}}
@extends('layouts.master')
@section('content')

<link href="{{ asset('css/style3.css') }}" rel="stylesheet" />
<link href="{{ asset('css/index3.css') }}" rel="stylesheet" />
<div>
  <div class="page-container">
    <div class="page-frame">
      <img
        alt="Rectangle53256"
        src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/ac888a10-d25c-4cb4-a469-17b20c9c4045?org_if_sml=110102&amp;force_format=original"
        class="page-rectangle5"
      />
      <img
        alt="bar13256"
        src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/6f2ef60a-fd47-450b-a928-04d8f1bfa767?org_if_sml=11020&amp;force_format=original"
        class="page-bar1"
      />
      <img
        alt="bar23256"
        src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/a72d90d0-e766-40b8-923c-554ba1c88c54?org_if_sml=13493&amp;force_format=original"
        class="page-bar2"
      />
      <div class="page-layer1">
        <div class="page-group1">
          <img
            alt="Vector3256"
            src="../public3/vector3256-e93g7.svg"
            class="page-vector"
          />
          <img
            alt="Vector3256"
            src="../public3/vector3256-hwl.svg"
            class="page-vector01"
          />
          <img
            alt="Vector3256"
            src="../public3/vector3256-574.svg"
            class="page-vector02"
          />
          <img
            alt="Vector3256"
            src="../public3/vector3256-j7xe.svg"
            class="page-vector03"
          />
          <img
            alt="Vector3257"
            src="../public3/vector3257-h1z.svg"
            class="page-vector04"
          />
          <img
            alt="Vector3257"
            src="../public3/vector3257-6qrk.svg"
            class="page-vector05"
          />
          <img
            alt="Vector3257"
            src="../public3/vector3257-2m9n.svg"
            class="page-vector06"
          />
          <img
            alt="Vector3257"
            src="../public3/vector3257-mnrn.svg"
            class="page-vector07"
          />
          <img
            alt="Vector3257"
            src="../public3/vector3257-g8bg.svg"
            class="page-vector08"
          />
          <img
            alt="Vector3257"
            src="../public3/vector3257-qvnp.svg"
            class="page-vector09"
          />
        </div>
      </div>
      @include('include.logoutNav')
      <img
        alt="container3258"
        src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/5f409703-9b2b-45b1-b34a-b382ecf1e907?org_if_sml=13640&amp;force_format=original"
        class="page-container1"
      />
    {{-- 폼시작 --}}
    <form id="fixSaveForm" autocomplete="off">
      <span class="page-text08"><span>수리정보명</span></span>
      <span class="page-text10">*</span>
      <span class="page-text11"><span>비고</span></span>
      <span class="page-text13"><span>매입가</span></span>
      <span class="page-text15"><span>마진율</span></span>
      <span class="page-text17"><span>매출가</span></span>
      <input type="text" name="note" id="note" placeholder="비고를 입력해 주세요." alt="Rectangle243261" class="page-rectangle24" />
      <input type="text" name="fixName" id="fixName" placeholder="수리명을 입력해 주세요." alt="Rectangle118863261" class="page-rectangle11886" />
      <input type="text" name="purchCost" id="purchCost" placeholder="매입가를 입력해 주세요." alt="Rectangle118873261" class="page-rectangle11887" />
      <input type="text" name="marginPer" id="marginPer" placeholder="마진율을 입력해 주세요." alt="Rectangle118883264" class="page-rectangle11888" />
      <span class="page-text29"><span>최종 단가 수정일</span></span>
      <input type="text" name="salesCost" id="salesCost" placeholder="매출가를 입력해 주세요." class="page-rectangle11889" />
    
      <input type="hidden" name="iceCode" value="{{ Session::get('iceCode')}}">
      <input type="hidden" name="regId" value="{{ Session::get('empCode').' '.Session::get('empGroup')}}">

      @include('include.masterAddNav')

      <input type="text" name="lastModify" id="datepicker" class="page-rectangle46" />
     
      @include('include.mainNav')
      <div class="page-footer">
        <img alt="Rectangle33I404" src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/18563a24-ef56-455f-b6a3-158c876ea869?org_if_sml=1845&amp;force_format=original" class="page-rectangle33" />
        <span class="page-text53">
          @include('include.footer')
        </span>
      </div>
      <div class="page-footer">
        <img alt="Rectangle33I404" src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/18563a24-ef56-455f-b6a3-158c876ea869?org_if_sml=1845&amp;force_format=original" class="page-rectangle33" />
        @include('include.footer')
      </div>
      <img
        alt="Btnlogout4049"
        src="../public3/btnlogout4049-qqgr.svg"
        class="page-btnlogout"
      />
      <div class="page-btn-basic-blue">
        <span class="page-text55"><input type="submit" value="저장"></span>
      </div>
    </form>

    </div>
  </div>
</div>

<script src="../js/address_search.js"></script>
<script src="../js/form-validation4.js"></script>
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
    $('#fixSaveForm').submit(function (e) {
      e.preventDefault();
        if(checkInput()) {
          $.ajax({
              data: new FormData(this),
              processData:false,
              contentType:false,
              url: "{{ route('master.fixSave') }}",
              type: "POST",
              dataType: 'json',
              success: function (data) {
                  console.info(data);
                  if(data.success == true) {
                      $('#fixSaveForm').trigger("reset");
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
{{-- 끝 --}}
@endsection