<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
      
    </style>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/index2.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style3.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/index3.css') }}" rel="stylesheet" />
    {{-- 제이쿼리 + UI 시작 --}}
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>
  <body>
 
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
          <span class="frame3-text"><span>최강 수리업체</span></span>
          <span class="frame3-text02"><span>로그아웃</span></span>
          <span class="frame3-text04"><span>홍길동</span></span>
          <span class="frame3-text06"><span>마스터</span></span>
          <img
            alt="container2836"
            src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/a2371726-1231-4933-980c-61c0c76da7a0/e494d28e-8b4d-41c7-99b9-91caad453339?org_if_sml=16431&amp;force_format=original"
            class="frame3-container1"
          />

          @yield('content')

        </div>
      </div>
    </div>
  </body>
</html>