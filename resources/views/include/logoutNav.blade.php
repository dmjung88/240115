<span class="logout-text-1"><span>{{ Session::get('iceConame', '회사') }}</span></span>
<span class="logout-text-1"><span onclick="location.href='{{ route('logout') }}'">로그아웃</span></span>
<span class="logout-text-2"><span>{{ Session::get('empName', '비회원') }}</span></span>
<span class="logout-text-3"><span>{{ Session::get('iceConame') }}</span></span>


