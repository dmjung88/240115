@extends('layouts.master')
@section('content')

{{-- public3 style3 index5 --}}
<link href="{{ asset('css/style3.css') }}" rel="stylesheet" />
<link href="{{ asset('css/index5.css') }}" rel="stylesheet" />
    <div>
      <div class="page3-container">
        <div class="page3-frame">
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/b9ee2943-6f83-4adc-9587-acd69bf899f5?org_if_sml=19794&amp;force_format=original"
            alt="Rectangle53265"
            class="page3-rectangle5"
          />
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/5cbb0e10-55f5-4185-bcd9-9d890655f969?org_if_sml=11020&amp;force_format=original"
            alt="bar13265"
            class="page3-bar1"
          />
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/4340ae10-5a88-47d1-882f-c9fb4d4bbf3a?org_if_sml=13493&amp;force_format=original"
            alt="bar23265"
            class="page3-bar2"
          />
          <div class="page3-layer1">
            <div class="page3-group1">
              <img
                src="../public3/vector3265-qzlx.svg"
                alt="Vector3265"
                class="page3-vector"
              />
              <img
                src="../public3/vector3265-crha.svg"
                alt="Vector3265"
                class="page3-vector01"
              />
              <img
                src="../public3/vector3266-exe.svg"
                alt="Vector3266"
                class="page3-vector02"
              />
              <img
                src="../public3/vector3266-pbh.svg"
                alt="Vector3266"
                class="page3-vector03"
              />
              <img
                src="../public3/vector3266-4xe.svg"
                alt="Vector3266"
                class="page3-vector04"
              />
              <img
                src="../public3/vector3266-jn14.svg"
                alt="Vector3266"
                class="page3-vector05"
              />
              <img
                src="../public3/vector3266-178.svg"
                alt="Vector3266"
                class="page3-vector06"
              />
              <img
                src="../public3/vector3266-khfs.svg"
                alt="Vector3266"
                class="page3-vector07"
              />
              <img
                src="../public3/vector3266-8ber.svg"
                alt="Vector3266"
                class="page3-vector08"
              />
              <img
                src="../public3/vector3266-nvg.svg"
                alt="Vector3266"
                class="page3-vector09"
              />
            </div>
          </div>
        @include('include.logoutNav')
          <img
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/8411c55c-9571-4326-83f2-45e226c8c12d?org_if_sml=13480&amp;force_format=original"
            alt="container3268"
            class="page3-container1"
          />
        {{-- 폼시작 --}}
        <form id="empSaveForm" autocomplete="off">
          <span class="page3-text08"><span>사번</span></span>
          <span class="page3-text10">*</span>
          <span class="page3-text11">*</span>
          <span class="page3-text12"><span>이름</span></span>
          <span class="page3-text14"><span>전화번호</span></span>
          <span class="page3-text16"><span>비밀번호</span></span>
          <span class="page3-text18"><span>구분</span></span>
          <span class="page3-text26"><span>내부</span></span>
          <span class="page3-text28"><span>외부</span></span>

          <input type="hidden" name="iceCode" value="{{ Session::get('iceCode')}}">
          <input type="hidden" name="regId" value="{{ Session::get('empCode').' '.Session::get('empGroup')}}">

          <input type="text" name="empName" id="empName" placeholder="기사명을 입력해 주세요." 
            class="page3-rectangle24"
          />
          <input type="text" name="empPhone" id="empPhone"placeholder="전화번호를 입력해 주세요." 
            class="page3-rectangle11887"
          />
          <input type="text" name="empPassword" id="empPassword" placeholder="비밀번호를 입력해 주세요." 
            class="page3-rectangle11888"
          />
          <input type="text" 
          name="empCode" id="empCode" placeholder="사번을 입력해 주세요." 
            class="page3-rectangle11886"
          />
        @include('include.masterAddNav')
          <span class="page3-text42"><span>사용여부</span></span>
        @include('include.mainNav')
        
          <div class="page3-btn-off-on">
            <div class="page3-btn-off-on1">
              <span class="page3-text54"><input type="radio" name="chk_status" value="N">OFF</span>
            </div>
            <div class="page3-btn-off-on2">
              <span class="page3-text56"><input type="radio" name="chk_status" value="Y" checked>ON</span>
            </div>
          </div>
          <div class="page3-footer">
            <img
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/18563a24-ef56-455f-b6a3-158c876ea869?org_if_sml=1845&amp;force_format=original"
              class="page1-rectangle33"
            />
        @include('include.footer')
          </div>
          <img
            src="../public3/btnlogout4049-sdkh.svg"
            alt="Btnlogout4049"
            class="page3-btnlogout"
          />
          <div class="page3-component72">
            <input type="radio" name="empType" value="O" class="page3-ellipse5"/>
          </div>
          <div class="page3-component73">
            <img
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/ab21b1f3-758c-4b69-9d1b-1e82e3a97c4e?org_if_sml=1123&amp;force_format=original"
              alt="Ellipse5I405"
              class="page3-ellipse51"
            />
            <input type="radio" name="empType" value="I" class="page3-ellipse6"/>
          </div>
          <div class="page3-btn-basic-blue">
            <span class="page3-text60"><button id="empSaveBtn">저장</button></span>
          </div>
        </form>
        
        </div>
      </div>
    </div>
<script src="../js/address_search.js"></script>
<script src="../js/form-validation5.js"></script>
<script type="text/javascript">
$(function () {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

    //post 글작성 
  $('#empSaveBtn').click(function (e) {
    e.preventDefault();
      if(checkInput()) {
        $.ajax({
            data: $('#empSaveForm').serializeArray(),
            url: "{{ route('master.empSave') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                console.info(data);
                if(data.success == true) {
                    $('#empSaveForm').trigger("reset");
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
