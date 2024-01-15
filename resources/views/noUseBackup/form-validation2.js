$(function() {
    $('#wholeName').autocomplete({
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/wholesale",
                dataType : 'json',
                data: {"search": $("#wholeName").val() },
                success : function(data) {
                    //console.log(data.response.data);
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.WHOLE_CODE,
                                value : item.WHOLE_NAME
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.label)
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿
}); //end JQ
/* =========  업소 저장 유효성 ========= */

const form = document.getElementById('storeSaveForm');
const storeName = document.getElementById('storeName');
const wholeName = document.getElementById('wholeName');
const storeBizNum = document.getElementById('storeBizNum');
const storeBiz = document.getElementById('storeBiz');
const empCode = document.getElementById('empCode');
const storeType = document.getElementById('storeType');
const storePhone = document.getElementById('storePhone');
const storeCeo = document.getElementById('storeCeo');
const note = document.getElementById('note');
const zipCode = document.getElementById('zipCode');
const addr = document.getElementById('addr');
const addrDetail = document.getElementById('addrDetail');

var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var onlyNum = /[^0123456789-]/g ;
var storeBizNumCheck = false;			// 사업자번호 중복 검사

//숫자 '-' 만 허용
const onlyNumFn =(val) => {
    if(/[^0123456789-]/g.test(val)){
      // 숫자와 하이픈이 아닌 기타 문자가 들어있는 경우
        return false;
    } else {
        return true;
    }
}

function checkRequired(inputArr) {
    let isRequired = false;
    inputArr.every(function(input) {
        if (input.value.trim() === '') {
            alert(`${getFieldName(input)} 항목은 필수 입력사항입니다.`);
            isRequired = false;
        } else {
            isRequired = true;
        }
    });
    return isRequired;
}
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function checkLength(input, min, max) {
    if (input.value.length < min) { 
        alert(`${getFieldName(input)} 항목은 최소 ${min} 글자 이상입니다.`)
        return false;
    } else if (input.value.length > max) {
        alert(`${getFieldName(input)} 항목은 최대 ${max} 글자 이하입니다.`);
        return false;
    } else {
        return true
    }
}

function checkInput() { //유효성
    if(checkRequired([storeName, wholeName, storeBizNum, storeBiz,empCode ,storeType ,storePhone ,storeCeo 
        ,note ,zipCode ,addr ,addrDetail ])){
        if(checkLength(storeName, 1, 30)){
        if(checkLength(storeBizNum, 1, 10)) {
        if(checkLength(storeBiz, 1, 10)) {
        if(checkLength(storeType, 1, 10)) {
        if(checkLength(storePhone, 8, 13)) {
        if(checkLength(storeCeo, 1, 10)) {
        // 여기부터
            if(!onlyKorNum.test(storeName.value.trim())) {
                alert("상호명을 정확히 입력해주세요");
                storeName.focus();
                return false;
            } else if(!onlyKorNum.test(storeCeo.value.trim())){
                alert("대표자명을 정확히 입력해주세요");
                storeCeo.focus();
                return false;
            } else if(!onlyKor.test(storeBiz.value.trim())) {
                alert("종목을 정확히 입력해주세요");
                storeBiz.focus();
                return false;
            } else if(!onlyKor.test(storeType.value.trim())) {
                alert("종목을 정확히 입력해주세요");
                storeType.focus();
                return false;
            } else if(onlyNumFn(zipCode.value.trim()) == false) {
                alert("우편번호는 숫자만 입력해주세요");
                zipCode.focus();
                return false;
            } else if(onlyNumFn(storePhone.value.trim()) == false) {
                alert("전화번호는 숫자만 입력해주세요");
                storePhone.focus();
                return false;
            } else if(storeBizNumCheck == false) {
                alert("사업자 중복체크 버튼을 눌러주세요.");
                return false;
            } else {
                return true ; //성공
            }

        } // checkLength() 끝
        }
        }
        }
        }
        }
    }
}


//사업자번호 중복검사
$('#storeBizNum').on("change", function(){	
    if($('#storeBizNum').val() == "") {
        alert("사업자번호를 입력해주세요.");
        return false;
    }
	$.ajax({
		type : "post",
		url : "/master/storeNumCheck",
		data : {storeBizNum : $('#storeBizNum').val()},
		success : function(result){
            console.log(result);
			if(result != 'fail'){
                alert("사업자 번호 중복이 아닙니다.");
				storeBizNumCheck = true;
			} else {
                alert("사업자 번호 중복입니다.");
				storeBizNumCheck = false;
			}	
		}// success 종료
	}); 
});// 사업자번호 중복검사 종료


