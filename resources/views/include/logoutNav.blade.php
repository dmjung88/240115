<span class="logout-text-1"><span>{{ Session::get('iceConame', '회사') }}</span></span>
<span class="logout-text-1"><span id="empLogout">로그아웃</span></span>
<span class="logout-text-2"><span>{{ Session::get('empName', '비회원') }}</span></span>
<span class="logout-text-3"><span>{{ Session::get('iceConame') }}</span></span>


<script>
$(function() {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('#empLogout').click(function (e) {
        e.preventDefault();
        $.post("{{ route('logout') }}" , (rs) => {   
            window.location.href = "/";
        })
    });
}); //endJQ
</script>