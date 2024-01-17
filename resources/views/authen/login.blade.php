<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<div class="container">
   <div class="row" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>Login</h4><hr>
           <form action="{{ route('auth.postLogin') }}" method="post">
            @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif
  
           @csrf
              <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email[0]" placeholder="Enter email address" value="{{ old('email') }}">
                 <input type="text" class="form-control" name="email[1]" placeholder="Enter email address" value="{{ old('email') }}">
                 <input type="text" class="form-control" name="email[2]" placeholder="Enter email address" value="{{ old('email') }}">
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>
              <button type="submit" class="btn btn-block btn-primary">로그인</button>
              <br>
              <a href="{{ route('auth.getRegister') }}">회원가입</a>
           </form>
      </div>
   </div>
</div>
<form id="dataForm">
   <input type="text" name="repairCode" placeholder="수리코드">
   <input type="number" name="quantity" placeholder="수량">
   <input type="text" name="salesPrice" placeholder="매출가">
   <button type="button" id="addButton">추가</button>
</form>
<form action="insert.php" method="get">
<table id="dataTable">
   <thead>
       <tr>
           <th>수리코드</th>
           <th>수량</th>
           <th>매출가</th>
       </tr>
   </thead>
   <tbody>
   </tbody>
</table>
<button type="submit" id="saveButton">Save</button>
</form>


<script>
document.getElementById('addButton').addEventListener('click', function(event) {
	   var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
	   var newRow = table.insertRow(table.rows.length);
	   let reparirCode = event.target.closest('form').querySelector('[name="repairCode"]').value;
	   let quantity = event.target.closest('form').querySelector('[name="quantity"]').value;
	   let salesPrice = event.target.closest('form').querySelector('[name="salesPrice"]').value;
	   newRow.innerHTML = `<input type='text' name="repairCode[]" value="`+ reparirCode +`" readonly><input type='text' name="quantity[]" value="`+ quantity +`" readonly><input type='text' name="salesPrice[]" value="`+ salesPrice +`" readonly>`;
});
// 실제 저장 버튼에 대한 이벤트 리스너
document.getElementById('saveButton').addEventListener('click', function() {
// 이 부분에서 폼 데이터 전송 로직을 구현하십시오.
// 예: document.getElementById('dataForm').submit();
});
</script>
</body>
</html>
