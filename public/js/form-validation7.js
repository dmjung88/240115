$(function() {
    // 설치업소 선택시 도매장명 들어가게
    $('#storeName').autocomplete({
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/store",
                dataType : 'json',
                data: {"search": $("#storeName").val() },
                success : function(data) {
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.STORE_NAME,
                                value : item.STORE_NAME,
                                wholeName : item.WHOLE_NAME,
                                wholeCode :item.WHOLE_CODE,
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.wholeName)
            $("#wholeName").val(ui.item.wholeName);
            $('#storeName').prop("readonly",true);

        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿
    $('#storeName').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#storeName').prop("value","");
            $('#storeName').prop("readonly",false);
        }
    });
}); //end JQ



/* =========  업무접수 저장 유효성 ========= */

var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var alphaNum = /^[a-zA-Z0-9]+$/;
var onlyNum = /[^0123456789-]/g ;

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

    const workType = document.getElementById('workType');
    const workTitle = document.getElementById('workTitle');
    const zipCode = document.getElementById('zipCode');
    const workPhone = document.getElementById('workPhone');
    const storeName = document.getElementById('storeName');
    const wholeName = document.getElementById('wholeName');
    const addr = document.getElementById('addr');
    const addrDetail = document.getElementById('addrDetail');

    if(checkRequired([storeName, wholeName ,workPhone, addr ,addrDetail, workType
        , zipCode, workTitle ])){
        if(checkLength(workType, 1, 30)){
        if(checkLength(workTitle, 1, 30)) {
        if(checkLength(workPhone, 8, 13)) {
        if(checkLength(storeName, 1, 20)) {     
        // 여기부터 
            if(!onlyKorNum.test(storeName.value.trim())) {
                alert("설치업소명을 정확히 입력해주세요.");
                storeName.focus();
                return false;
            }else if(onlyNumFn(workPhone.value.trim()) == false) {
                alert("전화번호는 숫자를 입력해주세요.");
                workPhone.focus();
                return false;
            }else if(!onlyKorNum.test(workType.value.trim())) {
                alert("접수구분을 정확히 입력해주세요.");
                workType.focus();
                return false;
            }else if(!onlyKorNum.test(workTitle.value.trim())) {
                alert("접수내용을 정확히 입력해주세요.");
                workTitle.focus();
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

