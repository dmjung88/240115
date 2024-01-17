
/* =========  수리정보 저장 유효성 ========= */

const fixName = document.getElementById('fixName');
const purchCost = document.getElementById('purchCost');
const marginPer = document.getElementById('marginPer');
const salesCost = document.getElementById('salesCost');
const lastModify = document.getElementById('datepicker');
const note = document.getElementById('note');


var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var alphaNum = /^[a-zA-Z0-9]+$/;
var storeBizNumCheck = false;			// 사업자번호 중복 검사
var onlyNumber=/^[0-9]*$/; //only 숫자

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
    if(checkRequired([fixName , lastModify ])){
        if(checkLength(fixName, 1, 30)){
        if(checkLength(purchCost, 0, 8)) {
        if(checkLength(marginPer, 0, 3)) {
        if(checkLength(salesCost, 0, 8)) {
        // 여기부터
            if(!onlyKorNum.test(fixName.value.trim())) {
                alert("수리정보명을 정확히 입력해주세요");
                fixName.focus();
                return false;
            }else if(!onlyNumber.test(purchCost.value.trim())) {
                alert("매입가는 숫자를 입력해주세요");
                purchCost.focus();
                return false;
            }else if(!onlyNumber.test(marginPer.value.trim())) {
                alert("마진율은 숫자를 입력해주세요");
                marginPer.focus();
                return false;
            }else if(!onlyNumber.test(salesCost.value.trim())) {
                alert("매출가는 숫자를 입력해주세요");
                salesCost.focus();
                return false;
            }else {
                return true
            }          
        } // checkLength() 끝
        }
        }
        }
    }
}

$(function() {
    //수리정보 검색 오토컴플릿
    $('#fixName').autocomplete({
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/fix",
                dataType : 'json',
                data: {"search": $("#fixName").val() },
                success : function(data) {
                    //console.log(data.response.data);
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.FIX_NAME,
                                value : item.FIX_NAME
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) { //item 선택 시 이벤트
            //console.log(ui.item.label)
            $('#fixName').prop("readonly",true);
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿

    $('#fixName').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#fixName').prop("value","");
            $('#fixName').prop("readonly",false);
        }
    });
}); //end JQ

