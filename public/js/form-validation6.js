
/* ========= 로그인  유효성 ========= */

var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var onlyNum = /[^0123456789-]/g ;

function checkInputEmp() { //수리기사 경우

    const empIceBizNum = document.getElementById("empIceBizNum");
    const empPhone = document.getElementById("empPhone");
    const empPassword = document.getElementById("empPassword");

    /* ========= Value = trim(value) ========= */
    const empIceBizNumValue = empIceBizNum.value.trim();
    const empPhoneValue = empPhone.value.trim();
    const empPasswordValue = empPassword.value.trim();

    if (empIceBizNumValue === "") { // 사업자번호
        alert("사업자번호 미입력");
        empIceBizNum.focus();
        return false;
    } else if(onlyNumFn(empIceBizNumValue) == false){
        alert("사업자번호를 정확히 입력해주세요");
        empIceBizNum.focus();
        return false;
    } else if(empPhoneValue === "") { // 전화번호
        alert("전화번호 미입력");
        empPhone.focus();
        return false;
    } else if(onlyNumFn(empPhoneValue) == false){
        alert("전화번호를 정확히 입력해주세요");
        empPhone.focus();
        return false;
    } else if(empPasswordValue === "") { // 비밀번호
        alert("비밀번호 미입력");
        empPassword.focus();
        return false;
    } else if(!onlyKorNum.test(empPasswordValue)){
        alert("비밀번호를 정확히 입력해주세요");
        empPassword.focus();
        return false;
    } else {
        return true;
    }
}

function checkInputIce() { //회사관리자 경우

    const iceBizNum = document.getElementById("iceBizNum");
    const password = document.getElementById("password");

    /* ========= Value = trim(value) ========= */
    const iceBizNumValue = iceBizNum.value.trim();
    const passwordValue = password.value.trim();

    if (iceBizNumValue === "") { // 사업자번호
        alert("사업자번호 미입력");
        iceBizNum.focus();
        return false;
    } else if(onlyNumFn(iceBizNumValue) == false){
        alert("사업자번호를 정확히 입력해주세요");
        iceBizNum.focus();
        return false;
    } else if(passwordValue === "") { // 비밀번호
        alert("비밀번호 미입력");
        password.focus();
        return false;
    } else if(!onlyKorNum.test(passwordValue)){
        alert("비밀번호를 정확히 입력해주세요");
        password.focus();
        return false;
    } else {
        return true;
    }

}

//숫자 '-' 만 허용
const onlyNumFn =(val) => {
    if(/[^0123456789-]/g.test(val)){
      // 숫자와 하이픈이 아닌 기타 문자가 들어있는 경우
        return false;
    } else {
        return true;
    }
}
