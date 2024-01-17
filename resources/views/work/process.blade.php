@extends('layouts.master')
@section('content')


{{-- public4 style4 index7 --}}
<link href="{{ asset('css/style4.css') }}" rel="stylesheet" />
<link href="{{ asset('css/index7.css') }}" rel="stylesheet" />
      <link
        rel="stylesheet"
        href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
      />
      <div>
        
      <div class="frame-container">
        <div class="frame-frame">
          <img src="." alt="Rectangle53397" class="frame-rectangle5" />
          <img src="." alt="bar13397" class="frame-bar1" />
          <img src="." alt="bar23397" class="frame-bar2" />
          <div class="frame-layer1">
            <div class="frame-group1">
              <img
                src="../public4/external/vector3397-i2y.svg"
                alt="Vector3397"
                class="frame-vector"
              />
              <img
                src="../public4/external/vector3397-kesp.svg"
                alt="Vector3397"
                class="frame-vector01"
              />
              <img
                src="../public4/external/vector3397-ntx9.svg"
                alt="Vector3397"
                class="frame-vector02"
              />
              <img
                src="../public4/external/vector3397-20g9.svg"
                alt="Vector3397"
                class="frame-vector03"
              />
              <img
                src="../public4/external/vector3397-ept.svg"
                alt="Vector3397"
                class="frame-vector04"
              />
              <img
                src="../public4/external/vector3398-7tww.svg"
                alt="Vector3398"
                class="frame-vector05"
              />
              <img
                src="../public4/external/vector3398-t6c.svg"
                alt="Vector3398"
                class="frame-vector06"
              />
              <img
                src="../public4/external/vector3398-2jydh.svg"
                alt="Vector3398"
                class="frame-vector07"
              />
              <img
                src="../public4/external/vector3398-tqex.svg"
                alt="Vector3398"
                class="frame-vector08"
              />
              <img
                src="../public4/external/vector3398-j9i8.svg"
                alt="Vector3398"
                class="frame-vector09"
              />
            </div>
          </div>
     @include('include.logoutNav')

          <img src="../public4/images/container.png" alt="container3399" class="frame-container1" />
      <form id="workProFrm">
          <span class="frame-text008"><span>업소검색 *</span></span>
          <span class="frame-text010"><span>제품명</span></span>
          <span class="frame-text012"><span>업무관리번호</span></span>
          <span class="frame-text014"><span>처리내용</span></span>
          <span class="frame-text016"> </span>
          <span class="frame-text017">*</span>
          <span class="frame-text018">*</span>
          <span class="frame-text019"><span>처리일자</span></span>
          <span class="frame-text021"><span>비고</span></span>
          <span class="frame-text023"><span>영업사원</span></span>
          <span class="frame-text025"><span>업무처리</span></span>
          <span class="frame-text027"><span>매출내용</span></span>
          <span class="frame-text029"><span>우편번호</span></span>
          <span class="frame-text031"><span>설치업소명</span></span>
          <span class="frame-text033"><span>전화번호</span></span>
          <span class="frame-text035"><span>주소</span></span>
          <span class="frame-text037"><span>상세주소</span></span>
          <input type="text" name="note" id="note" placeholder="비고를 입력해 주세요." alt="Rectangle323310" class="frame-rectangle32" />
          <input type="text" name="zipCode" id="zipCode" placeholder="우편번호" alt="Rectangle313310" class="frame-rectangle31" />
          <input type="text" name="newStoreName" id="newStoreName" placeholder="업소명을 입력해 주세요." alt="Rectangle253310" class="frame-rectangle25" />
          <input type="text" name="storePhone" id="storePhone" placeholder="전화번호흫 입력해 주세요." alt="Rectangle118913310" class="frame-rectangle11891" />
          <input type="text" name="workManage" id="workManage" placeholder="업무관리번호" alt="Rectangle118943317" class="frame-rectangle11894" />
          <input type="text" name="workTxt" id="workTxt" placeholder="처리내용" alt="Rectangle118953317" class="frame-rectangle11895" />
          <input type="text" name="addr" id="addr" placeholder="주소를 입력해 주세요." alt="Rectangle293310" class="frame-rectangle29" readonly/>
          <input type="text" name="addrDetail" id="addrDetail" placeholder="상세 주소를 입력해 주세요." alt="Rectangle303310" class="frame-rectangle30" />
          <div class="frame-frame14">
            <div class="frame-frame1">
              <span class="frame-text055"><a href="{{ route('view.workRequest')}}">접수</a></span>
            </div>
            <div class="frame-frame2">
              <span class="frame-text057"><a href="{{ route('view.workProcess')}}">업무처리</a></span>
            </div>
          </div>
        @include('include.mainNav')
          <input type="text" name="workDate" id="datepicker" class="frame-rectangle46" />
          <span class="frame-text071"><span>황소곱창</span></span>
          <span class="frame-text073"><span>냉장고B</span></span>
          <span class="frame-text075">
          <span id="storeAddress">[주소 , 전화번호]</span>    
          </span>
          <input type="text" name="storeName" id="storeName" placeholder="업소명" alt="Rectangle473310" class="frame-rectangle47" />
          <input type="text" name="goodsName" id="goodsName" placeholder="제품명" class="frame-rectangle11892" />
          <input type="text" name="wholeName" id="wholeName" placeholder="도매장명" alt="Rectangle483310" class="frame-rectangle48" />
          <input type="text" name="goodsDiv" id="goodsDiv" placeholder="제품구분" alt="Rectangle118933317" class="frame-rectangle11893" readonly />
          <input type="text" name="empCode" id="empCode" placeholder="사원코드" alt="사원코드" class="frame-rectangle27" />
          <select id="workCode" name="workCode" class="frame-rectangle11885" required>
            <option value="none">=== 업무처리 ===</option>
            <option value="00">판매</option>
            <option value="10">입고</option>
            <option value="20">수리대기</option>
            <option value="21">수리완료</option>
            <option value="29">수리불가</option>
            <option value="30">출고</option>
            <option value="40">현장수리</option>
            <option value="41">외주수탁수리</option>
            <option value="90">폐기</option>
          </select>
          <input type="text" name="empName" id="empName" placeholder="사원명" alt="" class="frame-rectangle11884" readonly />
       
        <img
          src="../public4/external/iconamoonarrowup23310-lz3.svg"
          alt="iconamoonarrowup23310"
          class="frame-iconamoonarrowup2"
        />

          <img src="../public4/images/Rectangle_11890.png" alt="Rectangle118903310" class="frame-rectangle11890" />
          <img src="." alt="container3316" class="frame-container2" />
          <img src="" alt="container3317" class="frame-container3" />
          <img src="" alt="container3318" class="frame-container4" />
          <img src="../public4/images/table_header.png" class="frame-image" />
          <img src="../public4/images/table_header.png" class="frame-image1" />
          <img src="../public4/images/table_header.png" class="frame-image2" />
       
          <span class="frame-text091"><span>수리코드</span></span>
          <span class="frame-text097"><span>수량</span></span>
          <span class="frame-text103"><span>매출가</span></span>
          <span class="frame-text107"><span>합계</span></span>
          {{-- <span class="frame-text093"><span>수리코드2</span></span>
          <span class="frame-text099"><span>수량2</span></span>
          <span class="frame-text087"><span>코드2</span></span>
          <span class="frame-text105"><span>매출가2</span></span>
          <span class="frame-text109"><span>소계2</span></span> --}}

          <span class="frame-text085"><span>제품명</span></span>
          <span class="frame-text089"><span>업무처리</span></span>
          <span class="frame-text095"><span>날짜</span></span>
          <span class="frame-text101"><span>이력</span></span>
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle353316" class="frame-rectangle35" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle119013318" class="frame-rectangle11901" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle363316" class="frame-rectangle36" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle118983317" class="frame-rectangle11898" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle119023318" class="frame-rectangle11902" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle373316" class="frame-rectangle37" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle118993317" class="frame-rectangle11899" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle119033318" class="frame-rectangle11903" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle119003318" class="frame-rectangle11900" />
          <img src="../public4/images/Rectangle_36.png" alt="Rectangle119043318" class="frame-rectangle11904" />
       {{-- 테이블시작 --}}
            <div class="frame-component1" id="tableData">
              {{-- <span alt="Rectangle118923316" class="frame-rectangle118921" />
              <span class="frame-text111"><span>2020-08-04</span></span>
              <span class="frame-text113"><span>냉장고A</span></span>
              <span class="frame-text115"><span>입고</span></span>
              <div class="frame-btn-tablein">
                <span class="frame-text117"><span>이력</span></span>
              </div>
              <img src="." alt="Rectangle119003318" class="frame-rectangle119001" /> --}}
            </div>
          {{-- <div class="frame-component2">
            <span class="frame-rectangle118923" />
            <span class="frame-text147"><span>2020-08-04</span></span>
            <span class="frame-text149"><span>냉장고A</span></span>
            <span class="frame-text151"><span>수리완료</span></span>
            <div class="frame-btn-tablein1">
              <span class="frame-text153"><span>이력</span></span>
            </div>
            <img src="." alt="Rectangle11900I331" class="frame-rectangle119002" />
          </div> --}}

      {{-- <div>
        <table border="1">
          <thead>
              <tr>
                  <th class="frame-text085">제품명</th>
                  <th class="frame-text089">업무처리</th>
                  <th class="frame-text095">날짜</th>
                  <th class="frame-text101">이력</th>
              </tr>
          </thead>

          <div class="frame-component1">
            <tbody>
              <tr class="frame-rectangle118921" >
                  <td class="frame-text111">월급</td>
                  <td class="frame-text113">100원</td>
                  <td class="frame-text115">200원</td>
                  <div class="frame-btn-tablein">
                    <td class="frame-text117">이력</td>
                  </div>
                  <img src="." alt="Rectangle119003318" class="frame-rectangle119001" />
              </tr>
            </tbody>
          <div>
      </table>
    </div>
      --}}

        {{-- 테이블끝 --}}
        <span class="frame-text119" id="total">0</span>
        {{-- 테이블끝 --}}
          <table class="frame-component8">
            <thead>
              <tr class="frame-component8">
                <th class="frame-text087">코드</th>
                <th class="frame-text093">수리코드</th>
                <th class="frame-text099">수량</th>
                <th class="frame-text105">매출가</th>
                <th class="frame-text109">소계</th>
              </tr>
            </thead>
            <tbody class="frame-rectangle11905 fixDataTable">
              <tr>
                  <td class="frame-text120"></td>
                  <td class="frame-text121"></td>
                  <td class="frame-text123"></td>
                  <td class="frame-text125"></td>
                  <td class="frame-text127"></td>
              </tr>
            </tbody>
          </table>
          {{-- </div> --}}
          <div class="frame-component9">
            <span class="frame-rectangle119051" />
            <span class="frame-text129"></span>
            <span class="frame-text130"><span></span></span>
            <span class="frame-text132"><span></span></span>
            <span class="frame-text134"><span></span></span>
            <span class="frame-text136"><span></span></span>
          </div>
          <div class="frame-component10">
            <span class="frame-rectangle119052" />
            <span class="frame-text138"></span>
            <span class="frame-text139"><span></span></span>
            <span class="frame-text141"><span></span></span>
            <span class="frame-text143"><span></span></span>
            <span class="frame-text145"><span></span></span>
          </div>
     {{-- 테이블끝 --}}
          <input type="text" name="fixCode" placeholder="수리코드" class="frame-rectangle11906 fixCode" />
          <input type="text" name="amount" placeholder="수량" class="frame-rectangle11907 salesCostTotal amount" />
          <input type="text" name="salesCost" placeholder="매출가" class="frame-rectangle11908 salesCostTotal salesCost" />
          <input type="hidden" id="totalData" name="totalData" class="totalData "readonly>
          <div class="frame-footer">
            <img src="." alt="Rectangle33I404" class="frame-rectangle33" />
        @include('include.footer')
          </div>
          <div class="frame-btn-check">
            <span class="frame-text157" onclick="execution_daum_address()">주소검색</span>
          </div>
          <img src="../public4/external/btnlogout4049-k3lm.svg" alt="Btnlogout4049" class="frame-btnlogout" />
          <img src="../public4/external/btncalender4050-q5.svg" alt="BtnCalender4050" class="frame-btn-calender" />
          <input type="hidden" name="iceCode" value="{{ Session::get('iceCode')}}">  
          <input type="hidden" name="regId" value="{{ Session::get('empCode').' '.Session::get('empGroup')}}">
          <input type="hidden" name="empSessionCode" value="{{ Session::get('empGroup') }}">
          <div class="frame-btn-basic-blue">
            <span class="frame-text158"><button type="submit">저장</button></span>
          </div>
      </form>
        </div>
      </div>
    </div>
  {{-- 임시 폼 --}}
  <form id="moveForm" method="get">	</form>

 {{-- 스크립트 --}}
 <script src="../js/address_search.js"></script>
 <script src="../js/form-validation8.js"></script>
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

     //post 
    $('#workProFrm').submit(function (e) {
        e.preventDefault();
        if(checkInput() === true) {
          $.ajax({
              data: new FormData(this),
              processData:false,
              contentType:false,
              url: "{{ route('work.workProSave') }}",
              type: "POST",
              dataType: 'json',
              success: function (data) { 
                  if(data.success == true) {         
                      $('#workProFrm').trigger("reset");
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
    // 현장수리 OR 외주위탁수리시 업무관리번호 비활성화
    $('#workCode').change(function (e) {
      var workCode = $(this).val();
      if(workCode == 40 || workCode == 41) {
        $("#workManage").attr("disabled", true); //비활성화
      } else {
        $("#workManage").attr("disabled", false); //비활성화
      }
    })

 }); //endJQ
 </script>
 @endsection
 