
/* =========  업소 저장 유효성 ========= */

const form = document.getElementById('goodsSaveForm');
const goodsName = document.getElementById('goodsName');
const goodsMaker = document.getElementById('goodsMaker');
const goodsDiv = document.getElementById('goodsDiv');
const goodsNick = document.getElementById('goodsNick');
const wholeName = document.getElementById('wholeName');
const goodsType = document.getElementById('goodsType');
const purchCost = document.getElementById('purchCost');
const goodsVol = document.getElementById('goodsVol');
const note = document.getElementById('note');

var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var alphaNum = /^[a-zA-Z0-9]+$/;
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
    inputArr.forEach(function(input) {
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
    if(checkRequired([goodsName, goodsMaker, goodsDiv, goodsNick,wholeName ,goodsType 
        ,purchCost ,goodsVol ,note ])){
        if(checkLength(goodsName, 1, 20)){
        if(checkLength(goodsMaker, 1, 20)) {
        if(checkLength(goodsDiv, 1, 10)) {
        if(checkLength(goodsNick, 1, 20)) {
        if(checkLength(goodsVol, 1, 8)) {
        if(checkLength(goodsType, 1, 20)) {
        if(checkLength(purchCost, 1, 8)) {
        // 여기부터
            if(!onlyKorNum.test(goodsName.value.trim())) {
                alert("상품명을 정확히 입력해주세요");
                goodsName.focus();
                return false;
            }else if(!onlyKorNum.test(goodsMaker.value.trim())) {
                alert("제조사명을 입력해주세요");
                goodsMaker.focus();
                return false;
            }else if(!onlyKorNum.test(goodsDiv.value.trim())) {
                alert("상품구분을 정확히 입력해주세요");
                goodsDiv.focus();
                return false;
            }else if(!onlyKorNum.test(goodsNick.value.trim())) {
                alert("별칭을 정확히 입력해주세요");
                goodsNick.focus();
                return false;
            }else if(!alphaNum.test(goodsVol.value.trim())) {
                alert("용량은 영문 + 숫자만 입력가능합니다.");
                goodsVol.focus();
                return false;
            }else if(!onlyKorNum.test(goodsType.value.trim())) {
                alert("규격을 정확히 입력해주세요");
                goodsType.focus();
                return false;
            } else {
                return true;
            }
            

        } // checkLength() 끝
        }
        }
        }
        }
        }
        }
    }
}

$(function() {
    $('#wholeName').autocomplete({
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/wholesale",
                dataType : 'json',
                data: {"search": $("#wholeName").val() },
                success : function(data) {
                    console.log(data.response.data);
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




