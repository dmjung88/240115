
$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#goodsName').autocomplete({ //메이커(제조사) 오토컴플릿
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
                                value : item.GOODS_NAME,
                                goodsDiv : item.GOODS_DIV
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.label)
            $('#goodsName').prop("readonly",true);
            $('#goodsDiv').prop("value",ui.item.goodsDiv);
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿

    //오토컴플릿 업소 도매장
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
                            console.log(data.response.data)
                            return {
                                label : item.STORE_NAME,
                                value : item.STORE_NAME,
                                wholeName : item.WHOLE_NAME,
                                wholeCode :item.WHOLE_CODE,
                                storePhone : item.STORE_PHONE,
                                storeAddress :item.STORE_ADDRESS
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.wholeName)
            $("#wholeName").val(ui.item.wholeName);
            $("#newStoreName").val(ui.item.value);
            $('#storeName').prop("readonly",true);
            $('#newStoreName').prop("readonly",true);
            $('#wholeName').prop("readonly",true);
            $('#storeAddress').empty();
            $('#storeAddress').append(" [ " + ui.item.storeAddress + " , " + ui.item.storePhone + " ] ");
            isStoreName = true;
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label  + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿

    $('#empCode').autocomplete({ //사번 오토컴플릿 검색
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/emp/empNameSearch",
                dataType : 'json',
                data: {"search": $("#empCode").val() },
                success : function(data) {
                    //console.log(data.response.data);
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.EMP_CODE,
                                value : item.EMP_CODE ,
                                empName : item.EMP_NAME 
                            }
                        })
                    );
                }
            });
        },select: function (event, ui) {
            //console.log(ui.item.label)
            $('#empCode').prop("readonly",true);
            $('#empName').val(ui.item.empName);
        }
    }).autocomplete('instance')._renderItem = function(ul, item) { // UI 변경 부
        return $('<li>') //기본 tag가 li
        .append('<div>' + item.label + ' | ' + item.value + '</div>') // 원하는 모양의 HTML 만들면 됨
        .appendTo(ul);
    };//end 오토컴플릿

    $('input[name=fixCode]').autocomplete({ //수리코드 오토컴플릿 검색
        source : function(reuqest, response) {
            $.ajax({
                type : 'post',
                url: "/api/common/search/fix",
                dataType : 'json',
                data: {"search": $("[name=fixCode]").val() },
                success : function(data) {
                    console.log(data.response.data);
                    response(
                        $.map(data.response.data, function(item) {
                            return {
                                label : item.FIX_NAME,
                                value : item.FIX_CODE ,
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

    $('#storeName').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#storeName').prop("value","");
            $('#storeName').prop("readonly",false);
            $('#newStoreName').prop("readonly",false);
        }
    });
    $('#goodsName').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#goodsName').prop("value","");
            $('#goodsName').prop("readonly",false);
            $('#goodsDiv').prop("readonly",false);
        }
    });
    $('#empCode').on('keydown', function (event) {
        if (event.keyCode === 8) { // Tab
            event.preventDefault();
            $('#empCode').prop("value","");
            $('#empCode').prop("readonly",false);
            $('#empName').prop("readonly",false);
        }
    });

    // 파랑 그리드 테이블
    $('#workCode').change(function (e) {
        e.preventDefault();
        $.ajax({
            data: {storeName: $("#storeName").val(), empGroup : $("[name= empSessionCode]").val() },
            url: "/api/work/workProBlueTable",
            type: "get",
            dataType: 'json',
            success : function(rs) {
                //console.log(rs.response.data)
                $("#tableData").html(rs.response.data);
            },
            error: function (err) {
                console.log('Error:', err);
            }
        });
    })

    // 상세 업무처리 모달
    $(document).on('click','.detailWork',function(e){
        e.preventDefault();  
        alert($(this).attr("href"))
        $("#moveForm").append("<input type='hidden' name='fixCostIdx' value='"+ $(this).attr("href")+ "'>")
        .attr("action", "/api/work/workProModal").submit();
    });

    // 합계 자동계산
    $('.salesCostTotal').on("propertychange change keyup paste input", function(){
        var total = $("[name=amount]").val() * $("[name=salesCost]").val();
        if (isNaN(total)) { // 값이 없어서 NaN값이 나올 경우
            $("#total").empty();
            $("#total").append("<span>"+ '숫자만입력' + "<span>")
        } else {
            $("#total").empty();
            $("#total").append("<span>"+ total + "<span>")
            $("#totalData").val(total);
        }
    })

    // tbody tr 추가
    if ($("[name=fixCode]").val() === "") {
        $(window).keydown(function(event){
            const formData = { 
                fixCode: $('[name= fixCode]').val(),
                amount : $('[name= amount]').val(),
                salesCost : $('[name= salesCost]').val(),
                totalData : $('#totalData').val()
            }
            const $o = $('#workProFrm tr').last(); //선택자 마지막 번째 요소
            if(event.keyCode == 13) {
                event.preventDefault();
                $.get("/api/work/fixSalseData", formData , (rs) => {         
                    var $output = "";
                    $output +=`
                    <tr>
                    <td class='frame-text120'><input type='text' name='ajaxAmount_[${$o.index() + 1}]' class="ajaxAmount" value='${formData.amount}'></td>
                    <td class='frame-text121'><input type='text' name='ajaxSalesCost_[${$o.index() + 1}]' class="ajaxSalesCost" value='${rs.response.data.SALES_COST}'></td>
                    <td class='frame-text123'><input type='text' name='ajaxFixName_[${$o.index() + 1}]' class="ajaxFixName" value='${rs.response.data.FIX_NAME}'></td>
                    <td class='frame-text125'><input type='text' name='ajaxFixCode_[${$o.index() + 1}]' class="ajaxFixCode" value='${rs.response.data.FIX_CODE}'></td>
                    <td class='frame-text127'><input type='text' name='ajaxTotalData_[${$o.index() + 1}]' class="ajaxTotalData" value='${formData.totalData}'></td>
                    </tr>
                    `; 
                    $('.fixDataTable').append($output);
                    $('[name= fixCode]').val(""),
                    $('[name= amount]').val(""),
                    $('[name= salesCost]').val(""),
                    $('#totalData').val("")
                })
            }
                // return false;
        });
    }

}); //endJQ

/* =========  업무접수 저장 유효성 ========= */

var onlyKor = /^[가-힣]+$/;
var onlyKorNum = /^[가-힣a-zA-Z0-9]+$/;
var alphaNum = /^[a-zA-Z0-9]+$/;
var onlyNum = /[^0123456789-]/g ;
var isStoreName = false; //초기값

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

    const storeName = document.getElementById('storeName');
    const goodsName = document.getElementById('goodsName');
    const newStoreName = document.getElementById('newStoreName');
    const storePhone = document.getElementById('storePhone');
    const wholeName = document.getElementById('wholeName');
    const workCode = document.getElementById('workCode');
    const workManage = document.getElementById('workManage');
    const workTxt = document.getElementById('workTxt');
    const goodsDiv = document.getElementById('goodsDiv');
    const empCode = document.getElementById('empCode');
    const empName = document.getElementById('empName');
    const addr = document.getElementById('addr');
    const addrDetail = document.getElementById('addrDetail');
    const zipCode = document.getElementById('zipCode');
    const note = document.getElementById('note');

    if(checkRequired([storeName, goodsName ,newStoreName, workCode, wholeName, goodsDiv])){
        if(checkLength(storeName, 1, 30)){
        if(checkLength(newStoreName, 1, 30)) {
        if(checkLength(storePhone, 8, 13)) {
        if(checkLength(note, 0, 30)) {     
        // 여기부터  
            if(!onlyKorNum.test(storeName.value.trim())) {
                alert("업소명을 정확히 입력해주세요.");
                storeName.focus();
                return false;
            }else if(!onlyKorNum.test(newStoreName.value.trim())) {
                alert("설치업소명을 정확히 입력해주세요.");
                newStoreName.focus();
                return false;
            } else if(onlyNumFn(storePhone.value.trim()) == false) {
                alert("전화번호는 숫자를 입력해주세요.");
                storePhone.focus();
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

