
/* ========= 마스터 도매장 저장 유효성 ========= */

var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var alphaNum = /^[a-zA-Z0-9]+$/;
var onlyNumber=/^[0-9]*$/; //only 숫자
var empNumCheck = false;			// 사업자번호 중복 검사

function checkInput() {
    const form = document.getElementById("empSaveForm");
    const empCode = document.getElementById("empCode");
    const empName = document.getElementById("empName");
    const empPhone = document.getElementById("empPhone");
    const empPassword = document.getElementById("empPassword");

    /* ========= Value = trim(value) ========= */
    const empCodeValue = empCode.value.trim();
    const empNameValue = empName.value.trim();
    const empPhoneValue = empPhone.value.trim();
    const empPasswordValue = empPassword.value.trim();

    if (empCodeValue === "") { // 사번
        alert("사원번호 미입력");
        empCode.focus();
        return false;
    } else if(!alphaNum.test(empCodeValue)){
        alert("사원번호를 정확히 입력해주세요.");
        empCode.focus();
        return false;
    } else if (empCodeValue.length < 1 || empCodeValue.length > 5) {
        alert("사원번호는 5글자 이하로 입력해주세요.");
        empCode.focus();
        return false;
    } else if(empPhoneValue === "") { //전화번호
        alert("전화번호 미입력");
        empPhone.focus();
        return false;
    } else if(empPhoneValue.length < 0 || empPhoneValue.length > 13) {
        alert("전화번호를 다시한번 확인해주세요");
        empPhone.focus();
        return false;
    } else if(onlyNumFn(empPhoneValue) == false) {
        alert("숫자와 '-' 만입력 가능합니다");
        empPhone.focus();
    } else if(empPasswordValue === "") { // 사원비밀번호
        alert("비밀번호 미입력");
        empPassword.focus();
        return false;
    } else if(empPasswordValue.length < 1 || empPasswordValue.length > 16) {
        alert("비밀번호를 다시한번 확인해주세요");
        empPassword.focus();
        return false;
    } else if(!alphaNum.test(empPasswordValue)) {
        alert("비밀번호를 다시한번 확인해주세요");
        empPassword.focus();
        return false;
    } else if(empNameValue.length < 0 || empNameValue.length > 10) {
        alert("이름을 다시한번 확인해주세요");
        empName.focus();
        return false;
    } else if(!onlyKorNum.test(empNameValue)) {
        alert("이름을 다시한번 확인해주세요");
        empName.focus();
        return false;
    } else if(empNumCheck == false){
        alert("사원번호 중복입니다. 다른 사원번호를 입력해주세요.");
        empCode.focus();
        return false;
    } else if(empNumCheck == true){
        return true;
    }
}
//  이메일 검증
function isValidateEmail(email) {
  const result = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return result.test(email);
} 


// function isValidateEmail(email){
//     var result = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
//     return result.test(email);
// }

//숫자 '-' 만 허용
const onlyNumFn =(val) => {
    if(/[^0123456789-]/g.test(val)){
      // 숫자와 하이픈이 아닌 기타 문자가 들어있는 경우
        return false;
    } else {
        return true;
    }
}

//사업자번호 중복검사
$('#empCode').on("change blur", function(){	
    if($(this).val() == "") {
        alert("사원번호를 입력해주세요.");
        return false;
    }
	$.ajax({
		type : "post",
		url : "/api/common/emp/codeCheck",
		data : {empCode : $('#empCode').val()},
		success : function(result){
			if(result != 'fail'){
                alert("사원번호 중복이 아닙니다.");
				empNumCheck = true;
			} else {
                alert("사원번호 중복입니다. 다른 사원번호를 입력해주세요.");
				empNumCheck = false;
			}	
		}// success 종료
	}); 
});// 사업자번호 중복검사 종료
