obj.value.checkList = [];
var checkList = obj.value.checkList;
obj.value.initCheck = [];
var initCheck = obj.value.initCheck;

var langIdx = null;
var langLength = 0;

$(document).ready(function(){
    obj.elem.move_upload_btn.onclick = function() {
		var param = {
			"side" : 1,
		}
		move_page("upload_news", param);
	}

	if(data.category_idx == "" || typeof data.category_idx == "undefined"){
		data.category_idx = 0;
	}
    request_lang();
});

function request_lang() {

    var lang_list = document.getElementById("lang_list");

    lb.ajax({
		type:"JsonAjaxPost",
		list : {
			ctl:"AdminNews",
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
							if(data.idx == 1){
								copy_elem.classList.add('lang_on');
							}
						}
						if(name == "name") {
							elem.innerHTML = data.name;
                            elem.parentNode.setAttribute("data-value", JSON.stringify(data));
							for(var i = 0; i < data.length; i++) {
								
							}
						}
					}, end : function() {
						langIdx = result.value[0].idx;
					
						if(typeof data.lang_idx != "undefined"){
							news_view(result.value[data.lang_idx - 1]);
						}else{
							news_view(result.value[0]);
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
									news_view(JSON.parse(this.dataset.value));
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

function news_view(lang_idx) {	
	obj.value.data = data;

	obj.page = {
		ctl: "AdminNews",
        param1: "news_select",
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
			console.log(result);
			if(result.length == 0){
				obj.elem.no_post.style.display = "";
				obj.elem.paging.style.display = "none";
			}
			else {
				obj.elem.no_post.style.display = "none";
                obj.elem.paging.style.display = "block";
				lb.auto_view({
					wrap : "wrap",
					copy : "copy",
					attr : '["data-attr"]',
					json : result,
					havior : function(elem, data, name, copy_elem){ 
						if (copy_elem.getAttribute('data-copy') == "copy") {
							copy_elem.setAttribute('data-copy', '');
							// if(lang_idx != undefined){
							// 	copy_elem.style.display = "block";
							// }else{
							// 	copy_elem.style.display = "none";
							// }
						}

						if(name == "check") {
							elem.id = data.key_code;
							elem.classList.add('check-data');
						}
						else if(name == "img") {
							if(data.upload_img == null){
								elem.src = no_image;
							}
							else{
							elem.src = upload_path + "news/image/" + data['upload_img'];
							}
						}
						else if(name == "title"){
							elem.innerHTML= data.title;
						}
						else if(name == "reg_date"){
							elem.innerHTML= data.date;
						}
						else if(name == "modify") {
							elem.onclick = function(){
								var param = {
									"key_code" : data.key_code,
									"move_page" : obj.value.data.move_page,
									"lang" : data.lang_idx,
									"side" : 1,
								}
								move_page("modify_news", param);
							}
						}
					}
				});
			}
            
        }
    });
}

function check(check, lang_idx) {
	console.log(check)
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
	// console.log(data.lang_idx);
	// return;
	if(checkList.length == 0) {
		alert("게시글 선택 후 삭제 가능합니다.");
	}
	else {
		var deleteCheck = confirm("게시글을 삭제하시겠습니까?");
		if(deleteCheck) {
			lb.ajax({
				type:"JsonAjaxPost",
				list : {
					ctl:"AdminNews",
					param1:"news_delete",
					key_code : JSON.stringify(checkList),
					
				},
				action : "index.php",
				havior : function(result){
					console.log(result);
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
						move_page("view_news", param);
					}
					else {
						alert(result.message);
					}
				}    
			});
		}
	}

}