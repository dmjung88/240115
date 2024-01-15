
/* ========= 마스터 도매장 저장 유효성 ========= */

var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var onlyNum = /[^0123456789-]/g ;
var wholeBizNumCheck = false;			// 사업자번호 중복 검사

// !add event listener
// form.addEventListener("submit", (e) => {
//   e.preventDefault();
//   checkInput();
// });

function checkInput() {
    const form = document.getElementById("wholeSaveForm");
    const wholeName = document.getElementById("wholeName");
    const wholePhone = document.getElementById("wholePhone");
    const wholeCeo = document.getElementById("wholeCeo");
    const wholeBiz = document.getElementById("wholeBiz");
    const wholeType = document.getElementById("wholeType");
    const wholeEmail = document.getElementById("wholeEmail");
    const wholeZipcode = document.getElementById("zipCode");
    const wholeBizNum = document.getElementById("wholeBizNum");
    const addr = document.getElementById("addr");
    const addrDetail = document.getElementById("addrDetail");
    const submit = document.getElementById("wholeSaveBtn");

    /* ========= Value = trim(value) ========= */
    const wholeNameValue = wholeName.value.trim();
    const wholePhoneValue = wholePhone.value.trim();
    const wholeCeoValue = wholeCeo.value.trim();
    const wholeBizValue = wholeBiz.value.trim();
    const wholeTypeValue = wholeType.value.trim();
    const wholeEmailValue = wholeEmail.value.trim();
    const wholeZipcodeValue = wholeZipcode.value.trim();
    const wholeBizNumValue = wholeBizNum.value.trim();
    const addrValue = addr.value.trim();
    const addrDetailValue = addrDetail.value.trim();

    if (wholeNameValue === "") { // 도매장명
        alert("도매장명 미입력");
        wholeName.focus();
        return false;
    } else if(!onlyKorNum.test(wholeNameValue)){
        alert("도매장명을 정확히 입력해주세요");
        wholeName.focus();
        return false;
    } else if (wholeNameValue.length < 2 || wholeNameValue.length > 30) {
        alert("도매장명을 정확히 입력해주세요");
        wholeName.focus();
        return false;
    } else if(wholePhoneValue === "") { //전화번호
        alert("전화번호 미입력");
        wholePhone.focus();
        return false;
    } else if(wholePhoneValue.length < 8 || wholePhoneValue.length > 13) {
        alert("전화번호를 다시한번 확인해주세요");
        wholePhone.focus();
        return false;
    } else if(onlyNumFn(wholePhoneValue) == false) {
        alert("숫자와 '-' 만입력 가능합니다");
        wholePhone.focus();
    } else if(wholeBizNumValue == "") { //사업자
        alert("사업자번호 미입력");
        wholeBizNum.focus();
        return false;
    } else if(onlyNumFn(wholeBizNumValue) == false) {
        alert("숫자와 '-' 만입력 가능합니다");
        wholeBizNum.focus();
    } else if(wholeBizNumValue.length < 8 || wholeBizNumValue.length > 10) {
        alert("사업자번호를 다시한번 확인해주세요");
        wholeBizNum.focus();
        return false;
    } else if(wholeBizNumCheck == false) {
        alert("사업자 중복체크 버튼을 눌러주세요.");
        return false;
    } else if(wholeCeoValue == "") { //대표자명
        alert("대표자명 미입력");
        wholeCeo.focus();
        return false;
    } else if(!onlyKorNum.test(wholeCeoValue)) {
        alert("대표자명을 정확히 입력해주세요");
        wholeCeo.focus();
        return false;
    } else if(wholeCeoValue.length < 2 || wholeCeoValue.length > 10) {
        alert("대표자명을 다시한번 확인해주세요");
        wholeCeo.focus();
        return false;
    } else if (wholeBizValue === "") { //업태
        alert("업태 미입력");
        wholeBiz.focus();
        return false;
    } else if (wholeBizValue.length < 2 || wholeBizValue.length > 10) {
        alert("업태를 정확히 입력해주세요");
        wholeBiz.focus();
        return false;
    } else if(!onlyKor.test(wholeBizValue)) {
        alert("업태를 정확히 입력해주세요");
        wholeBiz.focus();
        return false;
    } else if (wholeTypeValue === "") { //종목
        alert("종목 미입력");
        wholeType.focus();
        return false;
    } else if (wholeTypeValue.length < 2 || wholeTypeValue.length > 10) {
        alert("종목을 정확히 입력해주세요");
        wholeType.focus();
        return false;
    } else if(!onlyKor.test(wholeTypeValue)) {
        alert("종목을 정확히 입력해주세요");
        wholeType.focus();
        return false;
    } else if(addrValue === "") { //주소
        alert("주소 미입력");
        addr.focus();
        return false;
    } else if(addrDetailValue === "") { //상세 주소
        alert("상세주소 미입력");
        addrDetail.focus();
        return false;
    } else if(wholeZipcodeValue === "") { //우편번호
        alert("우편번호 미입력 미입력");
        wholeZipcode.focus();
        return false;
    } else if (wholeZipcodeValue.length < 5 || wholeZipcodeValue.length > 7) {
        alert("우편번호를 정확헤 입력해주세요");
        wholeZipcode.focus();
        return false;
    } else if (onlyNumFn(wholeZipcodeValue) == false) {
        alert("우편번호는 숫자만 입력해주세요");
        wholeZipcode.focus();
        return false;
    } else if(wholeEmailValue == "") { //이메일
        alert("이메일 미입력");
        wholeEmail.focus();
        return false;
    } else if(!isValidateEmail(wholeEmailValue)) {
        alert("이메일을 형식에 맞게 입력해주세요.");
        wholeEmail.focus();
        return false;
    } else if(wholeBizNumCheck = true) {
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
$('#wholeCheckBtn').on("click", function(){	
    if($('#wholeBizNum').val() == "") {
        alert("사업자번호를 입력해주세요.");
        return false;
    }
	$.ajax({
		type : "post",
		url : "/master/bizNumCheck",
		data : {wholeBizNum : $('#wholeBizNum').val()},
		success : function(result){
			if(result != 'fail'){
                alert("사업자 번호 중복이 아닙니다.");
				wholeBizNumCheck = true;
			} else {
                alert("사업자 번호 중복입니다.");
				wholeBizNumCheck = false;
			}	
		}// success 종료
	}); 
});// 사업자번호 중복검사 종료
