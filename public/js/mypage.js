$(function() {
  //mypage update
  $('#myPageBtn').click(function (e) {
    e.preventDefault();
      if(checkInput()) {
        $.ajax({
            data: $('#mypageFrm').serializeArray(),
            url: "/api/common/mypageSave",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                console.info(data);
                if(data.success == true) {
                    $('#mypageFrm').trigger("reset");
                    alert('마이페이지 수정완료!');
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

/* ========= mypage update 유효성 ========= */

function checkRequired(inputArr) {
    let isRequired = false;
    inputArr.every(function(input) {
        if (input.value.trim() === '') {
            alert(`${getFieldName(input)} 항목은 필수 입력사항입니다.`);
            isRequired = false;
            return false;
        } else {
            isRequired = true;
            return true;
        }
    });
    return isRequired;
}
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function checkInput() {
    const pass = document.getElementById("pass");
    const pass2 = document.getElementById("pass2");
    const empPhone = document.getElementById("empPhone");
    const empName = document.getElementById("empName");

    if(checkRequired([pass, pass2 ,empPhone, empName])){
        if(pass.value.trim() != pass2.value.trim()) {
            alert('비밀번호 확인이 일치하지않습니다.');
            return false;
        } else{
            return true;
        }
    }
}