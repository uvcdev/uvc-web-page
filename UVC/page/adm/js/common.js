//common_js에서 mode가 2이면 console.log 전부 제거
if(mode == 2){
    var console = {};
    console.log = function(){};
}

//alert modal
//알림 title과 content를 parameter로 받음
//title 값이 빈값이면 기본값은 알림으로 설정
function open_alert(content, param, title = "알림"){
    if(param != null){
        var elem = param["elem"];
        var link = param["link"];
        var method = param["method"];
        var parameter = param["parameter"];
    }

    //modal open css
    obj.elem.alert_modal.style.visibility = "visible";
    obj.elem.alert_modal.style.opacity = "1";
    
    var attr = obj.elem.alert_modal.querySelectorAll('[data-attr]');
    for(var i = 0; i < attr.length; i++){
        if(attr[i].getAttribute('data-attr') == "title"){ //모달 제목
            if(title == null){
                title = "알림";
            }
            attr[i].innerHTML = title;
        }else if(attr[i].getAttribute('data-attr') == "content"){ //모달 내용
            attr[i].innerHTML = content;
        }else if(attr[i].getAttribute('data-attr') == "close"){ //모달 닫기 버튼
            attr[i].onclick = function(){
                close_modal(obj.elem.alert_modal); //모달창 닫기
                //modal창을 닫을때 element 객체가 있으면 focus
                if(param != null){
                    if(elem != null){
                        elem.focus();
                    }
    
                    //method parameter가 있으면 modal창을 닫을때 method 실행
                    //실행시킬 method가 있는데 link도 같이 넘어오면 method에 link를 넘겨줘서 해당 method가 끝나고 실행시켜주기
                    if(method != null){
                        if(parameter != null){
                            eval(method + "(" + JSON.stringify(parameter) + ", " + link + ");");
                        }else{
                            eval(method + "(" + link + ");");
                        }
                    }else{
                        //link parameter가 있으면 해당 link로 이동
                        if(link != null){
                            location.href = link;
                        }
                    }
                }
            }
        }
    }
}

//confirm modal
//positve_method ---> 확인 버튼 클릭시 실행시킬 method
//positve_param ---> positive_method 실행시 넘겨줄 parameter 배열
//nagative_method ---> 취소 버튼 클릭시 실행시킬 method
//nagative_param ---> nagative_method 실행시 넘겨줄 paramter 배열
function open_confirm(data, title = "알림"){
    var content = data["content"]; //confirm창 내용
    var positive_method = data["positive_method"];
    var positive_param = data["positive_param"];
    var nagative_method = data["nagative_method"];
    var nagative_param = data["nagative_param"];

    //modal open css
    obj.elem.confirm_modal.style.visibility = "visible";
    obj.elem.confirm_modal.style.opacity = "1";
    
    var attr = obj.elem.confirm_modal.querySelectorAll('[data-attr]');
    for(var i = 0; i < attr.length; i++){
        if(attr[i].getAttribute('data-attr') == "title"){ //모달 제목
            attr[i].innerHTML = title;
        }else if(attr[i].getAttribute('data-attr') == "content"){ //모달 내용
            attr[i].innerHTML = content;
        }else if(attr[i].getAttribute('data-attr') == "confirm"){ //모달 확인 버튼
            attr[i].onclick = function(){
                confirm_click(positive_method, positive_param);
            }
        }else if(attr[i].getAttribute('data-attr') == "close"){ //모달 닫기 버튼
            attr[i].onclick = function(){
                confirm_click(nagative_method, nagative_param);
            }
        }
    }
}

//confirm modal 확인 or 취소 버튼 클릭시 실행되는 함수
function confirm_click(method, param){
    if(method == null){ //확인 버튼 클릭시 실행시킬 method가 없으면 modal만 닫아주기
        close_modal(obj.elem.confirm_modal); //모달창 닫기
    }else{
        if(param == null){ //param가 없으면 파라미터 없이 실행
            eval(method + "(" + null +");")
        }else{ //param가 있으면 파라미터 넣어주고 함수 실행
            eval(method + "(" + JSON.stringify(param) + ");");
        }
    }
}

//alert or confirm modal창 닫기 함수
function close_modal(elem){
    elem.style.visibility = "hidden";
    elem.style.opacity = "0";
}

//confirm modal open시 사용할 confirm 배열 생성 함수
function create_confirm_data(content, positive_method, positive_param, nagative_method, nagative_param){
    var confirm_data = {
        "content" : content,
        "positive_method" : positive_method,
        "positive_param" : positive_param,
        "nagative_method" : nagative_method,
        "nagative_param" : nagative_param,
    }
    return confirm_data;
}

//alert modal open시 사용할 alert 배열 생성 함수
function create_alert_data(elem, link, method, param){
    var alert_data = {
        "elem" : elem,
        "link" : link,
        "method" : method,
        "parameter" : param,
    }
    return alert_data;
}

//input에 숫자만 입력하도록 하는 함수
//max_value와 min_value로 input 최솟값 , 최댓값 지정
function number_check(elem, max_value, min_value){
    $(elem).on('propertychange change keyup paste input', function(){
        $(this).val($(this).val().replace(/[^0-9]/g,""));
    });
    
    //max_value parameter를 넘겨주면 숫자를 max_value보다 큰 값을 입력하지 못하게 하기
    if(max_value != undefined){
        if(elem.value > max_value){
            elem.value = max_value * 1;
        }
    }
    if(min_value != undefined){
        //숫자를 1보다 작은 숫자로 입력하지 못하게 하기
        if(elem.value < min_value){
            elem.value = min_value;
        }
    }
}

//관리자 페이지 리스트 페이지에서 언어 변경 Tab Event
//언어 변경이 될때마다 넘겨받은 method를 실행
function change_lang_event(method = null, param = null){
    if(obj.elem.lang_list != undefined){
        var li = obj.elem.lang_list.querySelectorAll('li');
        for(var i = 0; i < li.length; i++){
            function closer(index){
                //tab 클릭시 실행
                li[index].onclick = function(){
                    //view page 언어변경시 move_page 1로 초기화
                    if(typeof obj.value.data != "undefined"){
                        obj.value.data.move_page = 1;
                    }

                    //언어 변경 Tab 클릭시 현재 선택된 Tab이 아닌 경우만 실행
                    if(li[index].className.indexOf('lang_on') == -1){
                        for(var j = 0; j < li.length; j++){
                            li[j].classList.remove('lang_on');
                        }
    
                        li[index].classList.add('lang_on');
                        //method parameter가 null이 아니라면 method 실행
                        if(method != null){
                            if(param == null){
                                eval(method + "(" + null + ", " + (index + 1) + ");");
                            }else{
                                eval(method + "(" + JSON.stringify(param) + ", " + (index + 1) + ");")
                            }
                        }
                    } 
                }
            }
            closer(i);
        }

        //page load시 실행
        if(method != null){
            if(param == null){
                eval(method + "();");
            }else{
                eval(method + "(" + JSON.stringify(param) + ");")
            }
        }
    }
}

//관리자 페이지 리스트 페이지에서 현재 선택된 언어 idx를 가져오는 함수
function get_lang_idx(){
    if(obj.elem.lang_list != undefined){
        var li = obj.elem.lang_list.querySelectorAll('li');
        for(var i = 0; i < li.length; i++){
            if(li[i].className.indexOf('lang_on') != -1){
                return i + 1;
            }
        }
    }else{
        return 1;
    }
}

//관리자 페이지 이동 함수
//param으로 넘겨 받은 값들을 전부 url에 &와 함께 붙여서 이동
function move_page(page, param){
    if(param == undefined){
        location.href = "?param=adm&param1=" + page;
    }else{
        var link = "?param=adm&param1=" + page;
        for(var key in param){
            link +="&"+key+"="+param[key];
        }

        location.href = link;
    }
}

//관리자 페이지 필수 파라미터 체크 함수
function parameter_check(array){
    var flag = false;
    //파라미터 배열중 하나라도 빈값이 있으면 flag 변수 false로 변경
    for(var i = 0; i < array.length; i++){
        if(typeof data[array[i]] == "undefined" || data[array[i]] == ""){
            flag = true;
        }
    }
    return flag;
}

//기본 파라미터들을 체크하여 파라미터 값이 없으면 기본값으로 return 해주는 함수
function empty_check_1(data){
    if(data == "" || typeof data == "undefined" || data == null){
        return 1;
    }else{
        return data;
    }
}

//현재 프로젝트에 적용된 언어 정보를 가져오는 함수
function request_lang(){
    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "Admin",
            param1 : "request_lang",
            idx : data.idx,
        },
        action : "index.php",
        havior : function(result){
            // console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            // console.log(result);
            if(result.result == 1){
                var return_array = [];
                for(var i = 0; i < result.value.length; i++){
                    return_array.push(result.value[i]);
                }
                //각 페이지의 response_lang 함수 실행
                eval("response_lang(" + JSON.stringify(return_array) + ");");
            }else{
                open_alert(result.message);
            }
        }
    });
}

//전달 받은 element의 number만캄의 부모 node를 return
function get_parentNode(elem, number){
    for(var i = 0; i < number; i++){
        elem = elem.parentNode;
    }

    return elem;
}

//썸노트 값 전송시 사용
function widthPercent(data) {
    lb.traverse(data, function (elem) {
        if (elem.nodeName == "IMG") {
            var split = elem.style.cssText.split("width");
            if (split.length > 1) {
                elem.style.height = "auto";
            }
            // 최진혁 -> style값이 랜덤으로 앞으로 가기때문에 무조건적으로 제거후 다시입력 뒤로보냄
            var style = elem.style.cssText;
            elem.removeAttribute('style');
            elem.setAttribute('style',style);
        }
    });
}

//data를 parameter로 받아 null이면 ""를 return하고 null이 아니면 data를 return 해주는 함수
function empty_check(data){
    if(data == null || data == undefined || data == "" || typeof data == "undefined"){
        return "";
    }else{
        return data;
    }
}

//날짜와 구분자를 넘겨주면 날짜에 구분자를 넣은 format으로 return
function date_format(date, sep, type){
    if(type == 1){
        var year = date.substring(0, 4); //년도
        var month = date.substring(5, 7); //월
        var day = date.substring(8, 10); //일
        return year + sep + month + sep + day;
    }else{ //나머지 형식 나중에 추가
        return 0;
    }
}

//휴대폰 번호에 - 붙여주는 함수
//타입이 0이면 전화번호 가운데 *로 가려진 형태로 출력
function phone_formatter(num, type) {
    var formatNum = '';
    if(num.length == 11){
        if(type == 0){
            formatNum = num.replace(/(\d{3})(\d{4})(\d{4})/, '$1-****-$3');
        }else{
            formatNum = num.replace(/(\d{3})(\d{4})(\d{4})/, '$1-$2-$3');
        }
    }else if(num.length == 8){
        formatNum = num.replace(/(\d{4})(\d{4})/, '$1-$2');
    }else{
        if(num.indexOf('02') == 0){
            if(type == 0){
            formatNum = num.replace(/(\d{2})(\d{4})(\d{4})/, '$1-****-$3');
            }else{
            formatNum = num.replace(/(\d{2})(\d{4})(\d{4})/, '$1-$2-$3');
            }
        }else{
            if(type == 0){
                formatNum = num.replace(/(\d{3})(\d{3})(\d{4})/, '$1-***-$3');
            }else{
                formatNum = num.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
            }
        }
    }
    return formatNum;
}