var langIdx = null;
var langLength = 0;

var param = null;

obj.value.checkList = [];
var checkList = obj.value.checkList;

$(document).ready(function(){

    param = data;

    request_lang();

	obj.elem.move_upload_btn.onclick = function() {
		var param = {
			"move_page" : data.move_page,
			"lang" : get_lang_idx(),
			"side" : 1,
		}
		move_page("upload_history", param);
	}
});

// 언어 들고 오는 함수
function request_lang() {

    var lang_list = document.getElementById("lang_list");

    lb.ajax({
		type:"JsonAjaxPost",
		list : {
			ctl:"AdminHistory",
			param1:"lang_select",
		},
		action : "index.php",
		havior : function(result){
			console.log(result);
			if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
			if(result.result == "1") {  // sucess
				lb.auto_view({
					wrap : "lang_wrap",
					copy : "lang_copy",
					attr : '["data-attr"]',
					json : result.value,
					havior : function(elem, data, name, copy_elem){ 
						if (copy_elem.getAttribute('data-copy') == "lang_copy") {
							copy_elem.setAttribute('data-copy', '');
							if(typeof param.lang_idx != "undefined"){
								if(data.idx == param.lang_idx){
									copy_elem.classList.add('lang_on');
								}
							}else{
								if(data.idx == 1){
									copy_elem.classList.add('lang_on');
								}
							}
						}
						if(name == "name") {
							elem.innerHTML = data.name;
                            elem.parentNode.setAttribute("data-value", JSON.stringify(data));
						}
					}, end : function() {
						langIdx = result.value[0].idx;
						
						if(typeof data.lang_idx != "undefined"){
							langIdx = result.value[data.lang_idx - 1];
							history_category_init(result.value[data.lang_idx - 1]);
							history_init(result.value[data.lang_idx - 1]);

						}else{
							langIdx = result.value[0];
							history_category_init(result.value[0]);
							history_init(result.value[0]);

						}

                        langLength = result.value.length;
						var li = lang_list.querySelectorAll('li');

						for(var i = 0; i<li.length; i++){
							// closer
							(function(){
								var cur_i = i;
								return li[cur_i].onclick = function() {
									for(var j = 0; j<li.length; j++){
										li[j].classList.remove('lang_on');
									}
									this.classList.add('lang_on');
									langIdx = JSON.parse(this.dataset.value);
									history_category_init(JSON.parse(this.dataset.value));
									history_init(JSON.parse(this.dataset.value));
								}
							})();

						}
					}
				});
			}
			else {
				alert(result.message);
			}
		}    
	});       
}

// 대분류 등록 모달
function main_reg_modal() {
    obj.elem.main_modal.style.opacity = 1;
    obj.elem.main_modal.style.visibility = "visible";
    obj.elem.main_modal_title.innerHTML = "대분류 등록";
    obj.elem.main_reg_btn.setAttribute('onclick', 'register_main_board()');
}

// 대분류 등록에서 취소 버튼 누르면 모달 닫기
function close_reg_modal() {

    obj.elem.main_modal.style.opacity = 0;
    obj.elem.main_modal.style.visibility = "hidden";
	obj.elem.category_name.value = "";
	// $('#modal_wrap').empty();
}

// 대분류 등록
function register_main_board() {

    var title = obj.elem.category_name;

    lb.ajax({
        type : "AjaxFormPost",
        list : {
            ctl : "AdminHistory",
            param1 : "category_insert",
            name : title.value,
			lang_idx : JSON.stringify(langIdx.idx),
            // content : elem_content.innerHTML,
        },
        elem : lb.getElem('modal_wrap'),
        action : "index.php",
        havior : function(result){
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            if(result.result == 1) {
                var param = {
                    "side" : 1,
                    "move_page" : 1,
                }
                move_page("view_history", param);
            }
			else {
				alert(result.message);
			}
        }
    });
}

// 대분류 목록 보여주는 함수
function history_category_init(lang_idx) {

	var main_no_post = obj.elem.main_no_post;
    obj.elem.main_wrap.innerHTML = ""; 
    // obj.elem.paging.innerHTML = "";
    obj.elem.main_wrap.appendChild(main_no_post);

	lb.ajax({
		type : "JsonAjaxPost",
        list : {
            ctl : "AdminHistory",
            param1 : "category_select",
            lang_idx : lang_idx["idx"],
        },
        action : "index.php",
        havior : function(result){
			console.log(result);
			if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            if(result.result == 1){
				if(result.value.length == 0) {
                    obj.elem.main_no_post.style.display = "";
                }
				else{
                    obj.elem.main_no_post.style.display = "none";
                    lb.auto_view({
                        wrap : "main_wrap",
                        copy : "main_copy",
                        attr : '["data-attr"]',
                        json : result.value,
                        havior : function(elem, data, name, copy_elem){
                            if (copy_elem.getAttribute('data-copy') == "main_copy") {
								copy_elem.setAttribute('data-copy', '');
							}
							
							if(name == "check") {
								elem.id = data.idx;
								// elem.setAttribute('check-data-category-' + data.idx, '');
								elem.classList.add('check-data-category');
							}
							if(name == "name"){
								elem.innerHTML = data.name;
							}
							if(name == "modify") {
								elem.onclick = function(){
									// location.href = "?param=adm&param1=modify_board&idx="+data.idx;
									category_modify_modal(data.idx);
								}
							}
                        }
                    });
				}
			}
		}
	});
}

// 대분류 부분 체크
function main_check(check) {

	if(check.checked == true) {
		checkList.push(check.id);
	}
	else {
		for(var i = 0; i < checkList.length; i++) {
			checkList.splice(i, 1);
			i = i -1;
		}
	}
}

// 대분류 전체 체크
function main_checkAll(obj) {
	var lang = get_lang_idx();
	var checkAll = document.querySelectorAll('.check-data-category'); 
	var checkCount = checkAll.length;
	var check = obj.checked;

	if(check == true) {
		checkList = [];
		for(var i = 0; i < checkCount; i++) {
			checkList.push(checkAll[i].id);
			checkAll[i].checked = true;
		}
	}
	else {
		for(var i = 0; i < checkCount; i++) {
			checkAll[i].checked = false;
		}
		checkList = [];
	}
}

// 대분류 삭제
function main_delete_confirm() {

	if(checkList.length == 0) {
		alert("대분류 카테고리 선택 후 삭제 가능합니다.");
	}
	else {
		var deleteCheck = confirm("해당 카테고리를 삭제하시겠습니까?");
		if(deleteCheck) {
			lb.ajax({
				type:"JsonAjaxPost",
				list : {
					ctl:"AdminHistory",
					param1:"category_delete",
					idx : JSON.stringify(checkList),
				},
				action : "index.php",
				havior : function(result){
					// console.log(result);
					if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
					if(result.result == "1") {  // sucess
						alert("선택한 카테고리가 삭제되었습니다.");
						var param = {
							"side" : 1,
							"move_page" : 1,
							"lang" : langIdx["idx"],
						}
						move_page("view_history", param);
					}
					else {
						alert(result.message);
					}
				}    
			});
		}
	}
}

// 대분류 수정 모달
function category_modify_modal(idx) {

	obj.elem.main_modal.style.opacity = 1;
    obj.elem.main_modal.style.visibility = "visible";
    obj.elem.main_modal_title.innerHTML = "대분류 수정";
	obj.elem.main_reg_btn.setAttribute('onclick', 'category_modify("' + idx + '")');
	// obj.elem.modify_btn.setAttribute('onclick', 'category_modify("' + idx + '")');

	set_datail_category(idx);
}

// 대분류 수정시 데이터 보여주는 함수
function set_datail_category(idx) {

	lb.ajax({
		type : "JsonAjaxPost",
        list : {
            ctl : "AdminHistory",
            param1 : "category_detail",
			idx : idx,
        },
		action : "index.php",
        havior : function(result){
            // console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            if(result.result == 1){
				var title = document.querySelector('#category_name');
				title.value = result.value[0].name;
			}
			else {
				alert(result.message);
			}
		}
	});
}

// 대분류 수정 후 저장
function category_modify(idx) {

	var elem_name = document.getElementById("category_name");

	lb.ajax({
		type : "AjaxFormPost",
		list : {
			ctl : "AdminHistory",
			param1 : "category_modify",
			idx : idx,
			name : elem_name.value,
		},
		elem : lb.getElem('modal_wrap'),
		action : "index.php",
		havior : function(result) {
			// console.log(result);
			if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
			if(result.result == 1) {
				var param = {
					"side" : 1,
					"move_page" : 1,
					"lang_idx" : get_lang_idx(),
				}
				move_page("view_history", param);
				// $('#modal_wrap').empty();
			}
			else {
				alert(result.message);
			}
		}
	})
}

//  연혁 목록 보여주는 함수
function history_init() {
	var lang_idx = get_lang_idx();
	
	obj.value.data = data;

	obj.page = {
		ctl: "AdminHistory",
        param1: "history_select",
		lang_idx : lang_idx,
        page_count : 5, //페이징 처리 Block 수
        page_size : 10, //한 페이지에 보여질 게시글 수
        move_page : data.move_page, //현재 페이지
        move_list : JSON.stringify(obj.value.data),
    }

	var no_post = obj.elem.no_post;
    obj.elem.wrap.innerHTML = ""; 
    obj.elem.paging.innerHTML = "";
    obj.elem.wrap.appendChild(no_post);

	obj.fn.page_list({
        page_num : {
            elem : obj.elem.paging, //페이징을 추가할 div
            page_name : "move_page",
            prev_one : '<a class="arrow prev">«</a>',
            number_active : '<a class="active" title="현위치"></a>',
            number : '<a></a>',
            next_one : '<a class="arrow next">»</a>', 
        },

        havior : function(result){

			if(result.length == 0){
				obj.elem.no_post.style.display = "";
				obj.elem.paging.style.display = "none";
			}
			else {
				obj.elem.no_post.style.display = "none";
                obj.elem.paging.style.display = "block";
				$('.loading').fadeIn();

				lb.auto_view({
					wrap : "wrap",
					copy : "copy",
					attr : '["data-attr"]',
					json : result,
					havior : function(elem, data, name, copy_elem){ 
						if (copy_elem.getAttribute('data-copy') == "copy") {
							copy_elem.setAttribute('data-copy', '');
						}
						if(name == "check") {
							elem.id = data.idx;
							elem.setAttribute('check-data-' + data["idx"], '');
							elem.setAttribute('data-check', '');
							elem.classList.add('check-data');
						}
						else if(name == "category_name"){
							if(data.category_name == null){
								elem.innerHTML = "없음";
							}else{
								elem.innerHTML = data.category_name;
							}
						}
						else if(name == "year"){
							elem.innerHTML= data.year;
						}
						else if(name == "month_wrap") {
							var content_arr = data.content_arr;
							for(var i = 0; i < content_arr.length; i++) {
								var copy = obj.elem.month_wrap_copy.cloneNode(true);
								var attr = copy.querySelectorAll('[data-attr]');
								for(var j = 0; j < attr.length; j++) {
									// if(attr[j].getAttribute('data-attr') == 'month') {
									// 	attr[j].innerHTML = month_arr[i].month;
									// }
									if(attr[j].getAttribute('data-attr') == 'content_wrap') {
										// var content_arr = month_arr[i].content_arr;
										// for(var k = 0; k < content_arr.length; k++) {
											var content = document.createElement('li');
											content.innerHTML = content_arr[i];

											attr[j].appendChild(content);
										// }
									}
								}
								elem.appendChild(copy);
							}
						}
						else if(name == "modify") {
							elem.onclick = function(){
								// location.href = "?param=adm&param1=modify_board&idx="+data.idx;
								var param = {
									"idx" : data.idx,
									"move_page" : obj.value.data.move_page,
									"lang" : data.lang_idx,
									"side" : 1,
									"year" : data.year,
								}
								move_page("modify_history", param);
							}
						}
					}
				});
				$('.loading').fadeOut();
			}           
        }
    });
}

//  연혁 전체 체크
function checkAll(obj) {
	var lang = get_lang_idx();
	var checkAll = document.querySelectorAll('[data-check]');
	var checkCount = checkAll.length;
	var check = obj.checked;

	if(check == true) {
		checkList = [];
		for(var i = 0; i < checkCount; i++) {
			checkList.push(checkAll[i].id);
			checkAll[i].checked = true;
		}
	}
	else {
		for(var i = 0; i < checkCount; i++) {
			checkAll[i].checked = false;
		}
		checkList = [];
	}
}

//  연혁 부분 체크
function check(check) {

	if(check.checked == true) {
		checkList.push(check.id);
	}
	else {
		for(var i = 0; i < checkList.length; i++) {
			checkList.splice(i, 1);
			i = i -1;
		}
	}
}

function delete_confirm() {
	var lang = get_lang_idx();

	if(checkList.length == 0) {
		alert("게시글 선택 후 삭제 가능합니다.");
	}
	else {
		var deleteCheck = confirm("게시글을 삭제하시겠습니까?");
		if(deleteCheck) {
			lb.ajax({
				type:"JsonAjaxPost",
				list : {
					ctl:"AdminHistory",
					param1:"history_delete",
					check : JSON.stringify(checkList),
				},
				action : "index.php",
				havior : function(result){
					// console.log(result);
					if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
					if(result.result == "1") {  // sucess
						alert("게시글이 삭제되었습니다.");
						var param = {
							"side" : 1,
							"move_page" : 1,
							"lang" : lang,
						}
						move_page("view_history", param);
					}
					else {
						alert(result.message);
					}
				}    
			});
		}
	}
}