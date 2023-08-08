obj.flag.double_click = true; //중복클릭 체크 함수
obj.value.lang_obj = null; //현재 프로젝트에 적용되는 언어 obj
obj.value.current_lang = 1; //현재 선택중인 언어 idx ( 모든 언어 등록모드에서만 사용하고 언어별 등록은 get_lang_idx 함수 사용해야 함 )

obj.value.detail_data = []; //해당하는 게시글 데이터를 담는 변수

//summer note
var sum_note_value = {}; //description 초기화 객체

$(document).ready(function(){
    if(mode != 0){ //디자이너 작업시 스크립트 오류 방지를 위해 mode가 0이 아닐때만 스크립트 실행
        obj.value.param = data;
        obj.value.category_idx = category_idx; // 1 : 개인정보처리방침 , 2 : 이메일수집거부
        page_init();
    }
});

//해당 idx로 등록되어 있는 게시글 정보를 가져오는 함수
function page_init(){
    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "AdminTerms",
            param1 : "detail_board",
            category_idx : obj.value.category_idx,
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
                obj.flag.double_click = true;
    
                obj.value.detail_data = result.value;
                request_lang(); //현재 프로젝트에 적용된 언어를 가져옴
            }else{
                obj.flag.double_click = true;
                open_alert(result.message);
            }
        }
    });
}

//현재 프로젝트에 적용되는 언어 목록을 가져옴
function response_lang(param){
    obj.value.lang_obj = param;

    var lang_wrap = obj.elem.lang_list;
    for(var i = 0; i < obj.value.lang_obj.length; i++){
        var li = document.createElement('li');
        var span = document.createElement('span');
        span.innerHTML = obj.value.lang_obj[i]["name"].toUpperCase();

        li.appendChild(span);
        lang_wrap.appendChild(li);

        //lang parameter가 있으면 lang parameter와 일치하는 언어 btn에 class를 추가하고 ( lang parameter는 게시글 등록시 뷰 페이지로 함께 넘어옴 )
        //lang parameter가 없으면 첫번째 언어 btn에 class를 추가
        if(i == 0){
            li.classList.add('lang_on');
        }
    }

    //게시글 등록 모드에 따라 from 생성
    change_lang_event("create_reg_form", param);
}

//해당 게시글 상태에 따라 form을 생성해주는 함수
function create_reg_form(param, lang_idx){
    if(lang_idx == null){
        lang_idx = 1;
    }
    obj.value.current_lang = lang_idx; //현재 적용된 언어

    create_summernote(param); //각 언어별 summernote 생성
}

//각 언어별 summert note 생성 함수
var create_sum_flag = true;
function create_summernote(param){
    if(create_sum_flag){
        //모든 언어 게시글 동시 등록시 언어 수만큼 form 생성
        for(var i = 0; i < param.length; i++){
            var value = [];
            value.push(param[i]);
            lb.auto_view({
                wrap : "sumnote_wrap",
                copy : "sumnote_copy",
                attr : '["data-attr"]',
                json : value,
                havior : function(elem, data, name, copy_elem){
                    create_sumnote_view(elem, data, name, copy_elem, i);
                }
            });
        }

        $('.summernote').summernote({
            placeholder: '',
            tabsize:2,
            height: 600,
            lang:'ko-KR',
            disableResizeEditor: true
        });

        //summer note 객체 push하기
        for(var i = 0; i< param.length; i++){
            var id = "sum_note_" + param[i].idx;
            var sum_obj = lb.getElem(id).nextSibling.children[2].children[2];
            if(typeof obj.value.detail_data[i] != "undefined"){
                sum_obj.innerHTML = obj.value.detail_data[i].content;
            }
            sum_note_value[id] = sum_obj; 
        }
    }else{
        //언어별 form none block
        var copy = obj.elem.sumnote_wrap.querySelectorAll('[data-copy]');
        for(var i = 0; i < copy.length; i++){
            copy[i].style.display = "none";
        }
        copy[obj.value.current_lang - 1].style.display = "block";
    }
}

//sumnote form auto view
function create_sumnote_view(elem, data, name, copy_elem, index){
    if (copy_elem.getAttribute('data-copy') == "sumnote_copy") {
        copy_elem.setAttribute('data-copy', '');
        if(index != undefined){
            if(index != 0){
                copy_elem.style.display = "none";
            }
        }

        copy_elem.id = "sumnote_elem_" + data["idx"];
        create_sum_flag = false;
    }

    if(name == "sumnote_wrap"){ //sumnote wrap
        elem.id = "sum_note_" + data["idx"];
        elem.src = project_name + "/lib/summernote-0.8.9-dist/dist/index.php";
    }
}

//수정 함수
function modify_board(){
    if(obj.flag.double_click){
        obj.flag.double_click = false;

        //언어 등록 상태값에 따라 lang_idx 변경
        var lang_idx = null;
        var lang_idx = [];
            for(var i = 0; i < obj.value.lang_obj.length; i++){
                lang_idx.push(obj.value.lang_obj[i].idx);
            }
            lang_idx = JSON.stringify(lang_idx);

        //description 가져오기
        var sumnote_array = []; //sumnote의 글 내용을 담는 배열
        for(var i = 0; i< obj.value.lang_obj.length; i++){ //언어 갯수에 따라 for문을 돌려서 lang_idx에 맞는 description값 가져오기
            var sum_note = sum_note_value["sum_note_" + obj.value.lang_obj[i].idx];
            widthPercent(sum_note);
            sumnote_array.push(sum_note.innerHTML); //sum_note값 push
        }

        //상품 등록 API 실행
        $('.loading').fadeIn();
        lb.ajax({
            type : "AjaxFormPost",
            list : {
                ctl : "AdminTerms",
                param1 : "modify_board",
                lang_idx : lang_idx, //언어 구분 idx
                all_reg : 1, //언어별 등록 or 모든 언어 동시 등록 구분 상태값
                sumnote : JSON.stringify(sumnote_array), //언어별 sumnote 값을 담은 배열
                category_idx : obj.value.category_idx,
            },
            elem : lb.getElem('form'),
            action : "index.php",
            havior : function(result){
                obj.flag.double_click = true;
                console.log(result);
                if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
                if(result.result == 1){
                    location.reload();
                }else{
                    obj.flag.double_click = true;
                    open_alert(result.message);
                    $('.loading').fadeOut();
                }
            }
        });
    }
}