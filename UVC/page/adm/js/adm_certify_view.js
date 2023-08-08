obj.value.checkList = [];
var checkList = obj.value.checkList;
obj.value.initCheck = [];
var initCheck = obj.value.initCheck;
var param = null;
var sync_mode = null;

$(document).ready(function() {
	param = data;
    request_lang();

	if(data.idx == "" || typeof data.idx == "undefined"){
		data.idx = 0;
	}
});

function request_lang(){
	var lang_list = document.getElementById("lang_list");

	lb.ajax({
		type:"JsonAjaxPost",
		list : {
			ctl:"AdminCertify",
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
							// if(data.idx == 1){
							// 	copy_elem.classList.add('lang_on');
							// }

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
                        langLength = result.value.length;
                        
						if(typeof data.lang_idx != "undefined") {
							notice_view(result.value[data.lang_idx - 1]);
						}
						else {
							notice_view(result.value[0]);
						}

                        var li = lang_list.querySelectorAll('li');
						for(var i = 0; i < li.length; i++) {
							// closer
							(function(){
								var cur_i = i;
								return li[cur_i].onclick = function() {
									for(var j = 0; j < li.length; j++){
										li[j].classList.remove('lang_on');
									}
									this.classList.add('lang_on');
									notice_view(JSON.parse(this.dataset.value));
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

function notice_view(lang_idx) {	
	obj.value.data = data;

	obj.page = {
		ctl: "AdminCertify",
        param1: "certify_select",
		lang_idx : lang_idx["idx"],
		catalog_idx : data.catalog_idx,
        page_count : 5, //페이징 처리 Block 수
        page_size : 10, //한 페이지에 보여질 게시글 수
        move_page : data.move_page, //현재 페이지
        move_list : JSON.stringify(obj.value.data),
    }

	// console.log(lang_idx);
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
			// console.log(result);
			if(result.length == 0){
				obj.elem.no_post.style.display = "";
				obj.elem.paging.style.display = "none";
			}
			else {
				// obj.elem.no_post.style.display = "none";
                // obj.elem.paging.style.display = "block";
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
							elem.id = data.key_code;
							elem.classList.add('check-data');
							elem.setAttribute('data-sync-' + data.image_sync, '');
						}
						if(name == "img"){
							elem.src = upload_path + "/certify/" + data['upload_img'];
						}
						else if(name == "title"){
							elem.innerHTML= data.title;
						}
						else if(name == "category"){
							if(data.category == 1) {
								elem.innerHTML= "디지털 트윈 / XR 원천기술 보유"
							}
							else {
								elem.innerHTML= "OPC UA 국제표준기술 국내 최초 사용화"
							}
						}
						else if(name == "modify") {
							elem.onclick = function(){
								var param = {
									"key_code" : data.key_code,
									"move_page" : obj.value.data.move_page,
									"side" : 1,
								}
								move_page("modify_certify", param);
							}
						}
					},end : function() {
						$('.loading').fadeOut();
					}
				});
			}
            
        }
    });
}

function check(check, lang_idx) {

	if(check.checked == true) {
		// console.log(check);
		checkList.push(check.id);	
	}
	else {
		for(var i = 0; i < checkList.length; i++) {
			checkList.splice(i, 1);
			i = i -1;
		}
	}
}

function checkAll(obj) {
	var checkAll = document.querySelectorAll('.check-data'); 
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

function delete_confirm() {

	if(checkList.length == 0) {
		alert("게시글 선택 후 삭제 가능합니다.");
	}
	else {
		var deleteCheck = confirm("게시글을 삭제하시겠습니까?");
		if(deleteCheck) {
			lb.ajax({
				type:"JsonAjaxPost",
				list : {
					ctl:"AdminCertify",
					param1:"certify_delete",
					key_code : JSON.stringify(checkList),				
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
							"lang" : get_lang_idx(),
						}
						move_page("view_certify", param);
					}
					else {
						alert(result.message);
					}
				}    
			});
		}
	}

}

var elem_select = null;
function selectCheck() {
	if(checkList.length == 0) {
		alert("변경할 게시글을 선택해주세요.");
		return;
	}
	else if (checkList.length > 1) {
		alert("게시글 이동은 하나씩 가능합니다.");
		return;
	}

	elem_select = lb.getElem(checkList[0]);
	elem_select = get_parentNode(elem_select, 3);
	return true;
}

function btn_up() {
	var moveCount = lb.getElem("move_count").value;
	if(moveCount == "") {
		moveCount = 1;
		lb.getElem("move_count").vaule = 1;
	}
	if(selectCheck()) {
		for(var i = 0; i < moveCount; i++) {
			var tr = $(elem_select).closest('tr');
			tr.prev().before(tr);
		}
	}
}

function btn_down() {
	var moveCount = lb.getElem("move_count").value;
	if(moveCount == "") {
		moveCount = 1;
		lb.getElem("move_count").vaule = 1;
	}
	if(selectCheck()) {
		for(var i = 0; i < moveCount; i++) {
			var tr = $(elem_select).closest('tr');
			tr.next().after(tr);
		}
	}
}

function btn_top() {
	if(selectCheck()) {
		var tr = $(elem_select).closest('tr');
		tr.closest('tbody').find('tr:first').before(tr);
	}
}

function btn_end() {
	if(selectCheck()) {
		var tr = $(elem_select).closest('tr');
		tr.closest('tbody').find('tr:last').after(tr);
	}
}

function btn_save() {
	var idx_list = [];
    var check_list = document.querySelectorAll('.check-data');
	
	if(checkList.length == 0) {
		alert("변경할 게시글을 선택해주세요.");
		return;
	}
	
    for(var i = 0; i < check_list.length; i++){
        idx_list.push(check_list[i].id);
    }
	if(JSON.stringify(initCheck) == JSON.stringify(idx_list)) {
		alert("순서 변경이 되지 않았습니다.");
		return;
	}
	else {
		lb.ajax({
			type : "JsonAjaxPost",
			list : {
				ctl : "AdminCertify",
				param1 : "change_seq",
				idx_array : JSON.stringify(idx_list),
			},
			action : "index.php",
			havior : function(result){
				console.log(result);
				if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
				if(result.result == 1){
					alert("게시글 순서가 변경되었습니다.");
					location.reload();
				}else{
					alert(result.message);
				}
			}
		});
	}
}

function btn_init() {
	location.reload();
}