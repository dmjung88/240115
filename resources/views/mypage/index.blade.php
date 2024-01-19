@extends('layouts.master')
@section('content')
{{-- style5 index11 --}}
<link href="{{ asset('css/style5.css') }}" rel="stylesheet" />
<link href="{{ asset('css/index11.css') }}" rel="stylesheet" />
    <div>

      <div class="frame7-container">
        <div class="frame7-frame">
          <img
            alt="Rectangle53328"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/b7a1334f-1185-444a-b498-073cdb8c9e30/527cc270-3661-4019-8688-603a15cbd8e6?org_if_sml=18254&amp;force_format=original"
            class="frame5-rectangle5"
          />
          <img
            alt="bar13328"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/b7a1334f-1185-444a-b498-073cdb8c9e30/6993a4e0-4b5f-47f5-9cd8-8b380c3f37c2?org_if_sml=11020&amp;force_format=original"
            class="frame5-bar1"
          />
          <div class="frame7-layer1">
            <div class="frame7-group1">
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector01" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector02" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector03" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector04" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector05" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector06" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector07" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector08" />
              <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Vector3332" class="frame7-vector09" />
            </div>
          </div>
        @include('include.logoutNav')
        @include('include.mainNav')
        <form id="mypageFrm">
          <img  src="../images/container.png" alt="container3333" class="frame7-container1" />
          <span class="frame7-text16"><span>비밀번호</span></span>
          <span class="frame7-text18"><span>비밀번호확인</span></span>
          <span class="frame7-text20"><span>전화번호</span></span>
          <span class="frame7-text22"><span>이름</span></span>
          <span class="frame7-text24"><span>사번</span></span>
          <input value="{{ session()->get('empCode')}}" name="empCode" class="frame7-rectangle35" readonly/></input>
          <input type="text" placeholder="입력해 주세요."></input>
          <input type="password" name="empPassword" id="pass" placeholder="비밀번호를 입력해 주세요." class="frame7-rectangle32" />
          <input type="password" name="empPassword_confirmation" id="pass2" placeholder="비밀번호를 다시 입력해 주세요." class="frame7-rectangle33" />
          <input type="text" name="empPhone" id="empPhone" placeholder="전화번호를 입력해 주세요." value="{{ $userdata->EMP_PHONE }}" class="frame7-rectangle25" />
          <input type="text" name="empName" id="empName" placeholder="이름을 입력해 주세요." value="{!! $userdata->EMP_NAME !!}" class="frame7-rectangle34" />
          <span class="frame7-text36"><span>마이페이지</span></span>
          <div class="frame7-btn-basic-blue">
            <span class="frame7-text40"><button id="myPageBtn">저장</button></span>
          </div>
        </form>
          <div class="frame7-footer">
            <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Rectangle33I404" class="frame7-rectangle331" />
            @include('include.footer')
          </div>
          <img src="https://play.teleporthq.io/static/svg/default-img.svg" alt="Btnlogout4049" class="frame7-btnlogout" />
          
        </div>
      </div>
    </div>

{{-- 스크립트 --}}
<script src="../js/mypage.js"></script>
@stop