@extends('layouts.master')
@section('content')

{{-- public4 style4 index6 --}}
<link href="{{ asset('css/style4.css') }}" rel="stylesheet" />
<link href="{{ asset('css/index6.css') }}" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
    <div>

      <div class="frame1-container">
        <div class="frame1-frame">
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/b7a1334f-1185-444a-b498-073cdb8c9e30/29a603a1-59ec-4dfc-b752-b40785ccaf1d?org_if_sml=111064&amp;force_format=original"
            alt="Rectangle53275"
            class="frame1-rectangle5"
          />
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/b7a1334f-1185-444a-b498-073cdb8c9e30/4d76f4f6-6e54-4315-a6b3-c9ded05466c9?org_if_sml=11020&amp;force_format=original"
            alt="bar13275"
            class="frame1-bar1"
          />
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/b7a1334f-1185-444a-b498-073cdb8c9e30/39421cee-5162-467a-8792-c0b1d843bada?org_if_sml=13493&amp;force_format=original"
            alt="bar23275"
            class="frame1-bar2"
          />
          <div class="frame1-layer1">
            <div class="frame1-group1">
              <img
                src="../public4/external/vector3276-zkyg.svg"
                alt="Vector3276"
                class="frame1-vector"
              />
              <img
                src="../public4/external/vector3276-19ut.svg"
                alt="Vector3276"
                class="frame1-vector01"
              />
              <img
                src="../public4/external/vector3276-32kt.svg"
                alt="Vector3276"
                class="frame1-vector02"
              />
              <img
                src="../public4/external/vector3276-4av8.svg"
                alt="Vector3276"
                class="frame1-vector03"
              />
              <img
                src="../public4/external/vector3276-v9et.svg"
                alt="Vector3276"
                class="frame1-vector04"
              />
              <img
                src="../public4/external/vector3276-9vx9.svg"
                alt="Vector3276"
                class="frame1-vector05"
              />
              <img
                src="../public4/external/vector3276-1t8c.svg"
                alt="Vector3276"
                class="frame1-vector06"
              />
              <img
                src="../public4/external/vector3276-4jm.svg"
                alt="Vector3276"
                class="frame1-vector07"
              />
              <img
                src="../public4/external/vector3276-20si.svg"
                alt="Vector3276"
                class="frame1-vector08"
              />
              <img
                src="../public4/external/vector3276-7yrj.svg"
                alt="Vector3276"
                class="frame1-vector09"
              />
            </div>
          </div>
        @include('include.logoutNav')
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/b7a1334f-1185-444a-b498-073cdb8c9e30/f095bc8c-b62b-427b-be51-81941cde5067?org_if_sml=14140&amp;force_format=original"
            alt="container3278"
            class="frame1-container1"
          />
        <form id="workReqForm">
          <span class="frame1-text08"><span>접수일자</span></span>
          <span class="frame1-text10">*</span>
          <span class="frame1-text11">*</span>
          <span class="frame1-text12"><span>설치업소명</span></span>
          <span class="frame1-text14"><span>접수구분</span></span>
          <span class="frame1-text16"><span>접수내용</span></span>
          <span class="frame1-text18"><span>우편번호</span></span>
          <span class="frame1-text20"><span>전화번호</span></span>
          <span class="frame1-text22"><span>주소</span></span>
          <span class="frame1-text24"><span>상세주소</span></span>
          <input type="text" name="workType" id="workType" placeholder="접수구분을 입력해 주세요." class="frame1-rectangle32" />
          <input type="text" name="workTitle" id="workTitle" placeholder="접수내용을 입력해 주세요." class="frame1-rectangle33" />
          <input type="text" name="zipCode" id="zipCode" placeholder="우편번호를 입력해 주세요." class="frame1-rectangle31" />
          <input type="text" name="workPhone" id="workPhone" placeholder="숫자만 입력해 주세요." class="frame1-rectangle25" />
          <input type="text" name="storeName" id="storeName" placeholder="업소명을 입력해 주세요." class="frame1-rectangle47" />
          <input type="text" name="wholeName" id="wholeName" placeholder="도매장명" class="frame1-rectangle48" readonly/>
          <input type="text" name="addr" id="addr" placeholder="주소를 입력해 주세요." class="frame1-rectangle29" />
          <input type="text" name="addrDetail" id="addrDetail" placeholder="상세주소를 입력해 주세요." class="frame1-rectangle30" />
          <span class="frame1-text40"><span><!--도매장명--></span></span>
          <div class="frame1-frame14">
            <div class="frame1-frame1">
              <span class="frame1-text42"><a href="{{ route('view.workRequest')}}">접수</a></span>
            </div>
            <div class="frame1-frame2">
              <span class="frame1-text44"><a href="{{ route('view.workProcess')}}">업무처리</a></span>
            </div>
          </div>

          <input type="hidden" name="iceCode" value="{{ Session::get('iceCode')}}">        

          @include('include.mainNav')
          <input type="text" name="workDate" id="datepicker" class="frame1-rectangle46" />
          <div class="frame1-footer">
            <img
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/b7a1334f-1185-444a-b498-073cdb8c9e30/d5cdc5aa-7f8d-4aaf-8866-51184b366e47?org_if_sml=1845&amp;force_format=original"
              alt="Rectangle33I404"
              class="frame1-rectangle331"
            />
            @include('include.footer')
          </div>
          <div class="frame1-btn-check">
            <span class="frame1-text60"><span  onclick="execution_daum_address()">주소검색</span></span>
          </div>
          <img
            src="../public4/external/btnlogout4049-bsly.svg"
            alt="Btnlogout4049"
            class="frame1-btnlogout"
          />
          <img
            src="../public4/external/btncalender4050-ta6.svg"
            alt="BtnCalender4050"
            class="frame1-btn-calender"
          />
          <div class="frame1-btn-basic-blue">
            <span class="frame1-text62"><button id="workReqBtn">저장</button></span>
          </div>
        </form>

        </div>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>

{{-- 스크립트 --}}
<script src="../js/address_search.js"></script>
<script src="../js/form-validation7.js"></script>
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
    $('#workReqBtn').click(function (e) {
        e.preventDefault();
        if(checkInput()) {
            $.ajax({
                data: $('#workReqForm').serializeArray(),
                url: "{{ route('work.receiveSave') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.info(data);
                    if(data.success == true) {
                        $('#workReqForm').trigger("reset");
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