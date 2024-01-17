
/* =========  업소 저장 유효성 ========= */

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

    if(checkRequired([goodsName, goodsDiv, goodsNick,wholeName ])){
        if(checkLength(goodsName, 2, 20)){
        if(checkLength(goodsMaker, 0, 20)) {
        if(checkLength(goodsDiv, 2, 10)) {
        if(checkLength(goodsNick, 0, 20)) {
        if(checkLength(goodsVol, 0, 8)) {
        if(checkLength(goodsType, 0, 20)) {
        if(checkLength(purchCost, 0, 8)) {
        // 여기부터
            if(!onlyKorNum.test(goodsNick.value.trim())) {
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
    $('#wholeName').autocomplete({ //도매장 오토컴플릿
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
                                label : item.WHOLE_NAME,
                                value : item.WHOLE_NAME
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.label)
            $('#wholeName').prop("readonly",true);
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿

    $('#goodsName').autocomplete({ //상품명 오토컴플릿
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/goods",
                dataType : 'json',
                data: {"search": $("#goodsName").val() },
                success : function(data) {
                    //console.log(data.response.data);
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.GOODS_NAME,
                                value : item.GOODS_NAME
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.label)
            $('#goodsName').prop("readonly",true);
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿

    $('#goodsMaker').autocomplete({ //메이커(제조사) 오토컴플릿
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/maker",
                dataType : 'json',
                data: {"search": $("#goodsMaker").val() },
                success : function(data) {
                    //console.log(data.response.data);
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.GOODS_NAME,
                                value : item.GOODS_MAKER
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.label)
            $('#goodsMaker').prop("readonly",true);
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿

    $('#goodsDiv').autocomplete({ //상품 구분(디비전) 오토컴플릿
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/goodsType",
                dataType : 'json',
                data: {"search": $("#goodsDiv").val() },
                success : function(data) {
                    //console.log(data.response.data);
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.GOODS_NAME,
                                value : item.GOODS_DIV
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.label)
            $('#goodsDiv').prop("readonly",true);
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿
    
    $('#wholeName').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#wholeName').prop("value","");
            $('#wholeName').prop("readonly",false);
        }
    });
    $('#goodsName').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#goodsName').prop("value","");
            $('#goodsName').prop("readonly",false);
        }
    });
    $('#goodsMaker').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#goodsMaker').prop("value","");
            $('#goodsMaker').prop("readonly",false);
        }
    });
    $('#goodsDiv').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#goodsDiv').prop("value","");
            $('#goodsDiv').prop("readonly",false);
        }
    });
}); //end JQ
/* =========  업소 저장 유효성 ========= */




