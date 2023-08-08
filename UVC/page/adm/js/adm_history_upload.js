var langIdx = null;
var category_data = null;

var year_index = 1;
var month_index = 1;

obj.value.checkList = [];
var checkList = obj.value.checkList;

$(document).ready(function() {

	$('#cancel_btn').click(function() {
		var param = {
			"side" : 1,
			"move_page" : data.move_page,
			"lang" : data.lang,
		}
		move_page("view_history", param);
	});
	request_category();
	// request_lang();

});

// 대분류 목록 가져오는 함수
function request_category() {
	lb.ajax({
		type : "JsonAjaxPost",
		list : {
			ctl : "AdminHistory",
			param1 : "request_category",
			lang_idx : data.lang,
		},
		action : "index.php",
		havior : function(result) {
			console.log(result);
			if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
			if(result.result == 1) {
				category_data = result.value;
				request_lang();
			}
			else {
				alert(result.message);
			}
		}
	});
}

// 언어 들고 오는 함수
function request_lang(param) {

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
						set_form(result.value);
						// add_year(result.value);

						if(typeof data.lang_idx != "undefined"){
							langIdx = result.value[data.lang_idx - 1];
						}else{
							langIdx = result.value[0];				
						}

                        langLength = result.value;
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
									get_form(JSON.parse(this.dataset.value), li.length);
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

// view page에서 선택한 언어대로 폼 뿌리기
function set_form(value) {
	// console.log(value);
	lb.auto_view({
		wrap : "wrap",
		copy : "copy",
		attr : '["data-attr"]',
		json : value,
		havior : function(elem, data, name, copy_elem) {
			if(copy_elem.getAttribute('data-copy') == "copy") {
				copy_elem.setAttribute('data-copy', '');
				if(data.idx == 1){
                    copy_elem.style.display = "";
                }else{
                    copy_elem.style.display = "none";
                }

                copy_elem.setAttribute("wrap_" + data["idx"], '');
                copy_elem.setAttribute('data-form', '');
				// console.log(copy_elem);
			}

			if(name == "check") {
				elem.setAttribute('data-check-' + data["idx"], '');
				elem.setAttribute('data-check', '');
			}
			else if(name == "category_wrap") {
				elem.style.display = '';
			}
			else if(name == "category_select") {
				for(var i = 0; i < category_data.length; i++){
					var option = document.createElement('option');
					option.innerHTML = category_data[i].name;
					if(data["idx"] == category_data[i].lang_idx) {
						option.value = category_data[i].idx;
						elem.appendChild(option);
					}			
				}
				elem.setAttribute('data-select-' + data["idx"], '');
				// elem.setAttribute('check-select', '');
        		elem.id = "category_select_" + data["idx"];
				$(elem).selectric();
			}
			else if(name == "year") {
				elem.setAttribute('data-year-' + data["idx"], '');
				elem.setAttribute('check-year', '');
			}
			else if(name == "title") {
				elem.setAttribute('data-title-' + data["idx"], '');
				elem.setAttribute('check-title', '');
			}
			else if(name == "month_wrap") {
				elem.id = "month_wrap_" + data["idx"] + "_" + year_index;
				elem.setAttribute('data-month-' + data["idx"], '');
			}
			else if(name == "month") {
				elem.setAttribute('data-month-' + data["idx"], '');
			}
			// else if(name == "month_dl") {
			// 	elem.style.display = '';
			// }
			else if(name == "del_month") {
				elem.onclick = function() {
					elem.parentNode.querySelector('input').value = "";
				}
			}
			else if(name == "content") {
				elem.setAttribute('data-content-' + data["idx"], '');
			}
			else if(name == "add_content") {
				elem.setAttribute('onclick', 'add_content(' + data["idx"] + ',this)');
        		elem.setAttribute('data-add-btn', '');
			}
			else if(name == "del_content") {
				elem.style.display = "none";
			}
			else if(name == "add_month") {
				elem.style.display = '';
				elem.setAttribute('onclick', 'add_month(' + data["idx"] + ', ' + year_index + ')');
			}
			else if(name == "reset") {
				elem.setAttribute('onclick', 'all_reset(' + data["idx"] + ', ' + year_index + ', this)');

			}
		},end : function(){
			// for(var i = 0; i<value.length; i++){
			// 	$('[data-select-'+value[i].idx+']').selectric();
			// }
		}
	});
}

function get_form(lang_idx, length) {
	var check_elem = document.querySelectorAll('[data-check]');
	for(var i = 0; i < check_elem.length; i++){
		check_elem[i].checked = false;
	}

	obj.elem.all_check.checked = false;

	var copy = document.querySelectorAll('[data-form]');
	
	for(var i = 0; i < copy.length; i++) {
		copy[i].style.display = "none";

	}

	var wrap_elem = document.querySelectorAll('[wrap_' + lang_idx.idx + ']');
	for(var i = 0; i < wrap_elem.length; i++) {
		wrap_elem[i].style.display = "";
	}

	var a = document.querySelector('#wrap_' + lang_idx.idx);

	langIdx = lang_idx.idx;
}

//  내용 추가
function add_content(lang_idx, elem) {

	var copy = obj.elem.content_form_copy.cloneNode(true);
	var attr = copy.querySelectorAll('[data-attr]');
	for(var i = 0; i < attr.length; i++) {
		if(attr[i].getAttribute('data-attr') == "content") {
			attr[i].setAttribute('data-content-' + lang_idx, '');
		}
		else if(attr[i].getAttribute('data-attr') == "add_content") {
			attr[i].style.display = "none";
		}
		else if(attr[i].getAttribute('data-attr') == "del_content") {
			attr[i].setAttribute('onclick', 'del_content(this)');
			attr[i].style.display = "block";
		}
	}
	get_parentNode(elem, 2).appendChild(copy)

}

// 내용 삭제
function del_content(elem) {
	get_parentNode(elem, 2).removeChild(elem.parentNode);
}

// 월 추가
function add_month(lang_idx, year_index) {
	var copy = obj.elem.month_form_copy.cloneNode(true);
	copy.id = "month_form_" + month_index;
	var attr = copy.querySelectorAll('[data-attr]');

	// console.log(attr);

	for(var i = 0; i < attr.length; i++) {
		if(attr[i].getAttribute('data-attr') == "month") {
			attr[i].setAttribute('data-month-' + lang_idx, '');
		}
		else if(attr[i].getAttribute('data-attr') == "del_month") {
			attr[i].setAttribute('onclick', 'del_month(' + lang_idx + ',' + month_index + ', ' + year_index + ')');
		}
		if(attr[i].getAttribute('data-attr') == "content") {
			attr[i].setAttribute('data-content-' + lang_idx, '');
		}
		else if(attr[i].getAttribute('data-attr') == "add_content") {
			attr[i].setAttribute('onclick', 'add_content('+ lang_idx +', this)');
            attr[i].setAttribute('data-add-btn', '');
		}
		else if(attr[i].getAttribute('data-attr') == "del_content") {
			attr[i].style.display = "none";
		}
		else if(attr[i].getAttribute('data-attr') == "month_dl") {
            attr[i].style.display = "";
		}
	}
	month_index++;
    document.querySelector('#month_wrap_' + lang_idx + "_" + year_index).appendChild(copy);
}

//  월 삭제
function del_month(lang_idx, month_index, year_index) {
	var wrap = document.querySelector('#month_form_' + month_index);
	document.querySelector('#month_wrap_' + lang_idx + '_' + year_index).removeChild(wrap);
}

//  초기화
function all_reset(lang_idx, year_index, elem) {

	var form = 	get_parentNode(elem, 3)
	var attr = form.querySelectorAll('[data-attr]');
	
	for(var i = 0; i < attr.length; i++) {
		if(attr[i].getAttribute('data-attr') == "year") {
			attr[i].value = "";
		}
		else if(attr[i].getAttribute('data-attr') == "title") {
			attr[i].value = "";
		}
		else if(attr[i].getAttribute('data-attr') == "month_wrap") {
			attr[i].innerHTML = "";
			add_month(lang_idx, year_index);
		}
		else if(attr[i].getAttribute('data-attr') == "category_select") {
			attr[i].value = "0";
			$(attr[i]).selectric();
		}
	}
	
}

//  연도 추가
function add_year() {
	year_index++;

	var lang_idx = get_lang_idx();
	console.log(lang_idx)

	lb.auto_view({
		wrap : "wrap",
		copy : "copy",
		attr : '["data-attr"]',
		json : [{idx: lang_idx}],
		havior : function(elem, data, name, copy_elem) {
			if(copy_elem.getAttribute('data-copy') == "copy") {
				copy_elem.setAttribute('data-copy', '');
                copy_elem.setAttribute("wrap_" + data["idx"], '');
                copy_elem.setAttribute('data-form', '');
				// console.log(copy_elem);
			}

			if(name == "check") {
				elem.setAttribute('data-check-' + data["idx"], '');
				elem.setAttribute('data-check', '');
			}
			else if(name == "category_wrap") {
				elem.style.display = '';
			}
			else if(name == "category_select") {
		
				for(var i = 0; i < category_data.length; i++){
					var option = document.createElement('option');
					if(data["idx"] == category_data[i].lang_idx) {
						option.innerHTML = category_data[i].name;
						option.value = category_data[i].idx;
						elem.appendChild(option);
					}	
				}
				elem.setAttribute('data-select-' + data["idx"], '');
				elem.setAttribute('check-select', '');
        		elem.id = "category_select_" + data["idx"] + '_' + year_index;
				$(elem).selectric();
			}
			else if(name == "year") {
				elem.setAttribute('data-year-' + data["idx"], '');
				elem.setAttribute('check-year', '');
			}
			else if(name == "title") {
				elem.setAttribute('data-title-' + data["idx"], '');
				elem.setAttribute('check-title', '');
			}
			else if(name == "month_wrap") {
				elem.id = "month_wrap_" + data["idx"] + "_" + year_index;
				elem.setAttribute('data-month-' + data["idx"], '');
			}
			else if(name == "month") {
				elem.setAttribute('data-month-' + data["idx"], '');
			}
			// else if(name == "month_dl") {
			// 	elem.style.display = '';
			// }
			else if(name == "del_month") {
				elem.onclick = function() {
					elem.parentNode.querySelector('input').value = "";
				}
			}
			else if(name == "content") {
				elem.setAttribute('data-content-' + data["idx"], '');
			}
			else if(name == "add_content") {
				elem.setAttribute('onclick', 'add_content(' + data["idx"] + ',this)');
        		elem.setAttribute('data-add-btn', '');
			}
			else if(name == "del_content") {
				elem.style.display = "none";
			}
			else if(name == "add_month") {
				elem.style.display = '';
				elem.setAttribute('onclick', 'add_month(' + data["idx"] + ', ' + year_index + ')');
			}
			else if(name == "reset") {
				elem.setAttribute('onclick', 'all_reset(' + data["idx"] + ', ' + year_index + ', this)');

			}
		},end : function(){
			// $('#category_select_'+lang_idx+'_'+ year_index).selectric();
			// $('.select').selectric();

		}
	});	
}

//  저장될 데이터 체크
function data_check() {

	var dataCheck = [];
	for(var i = 0; i < langLength.length; i++) {
		var lang = langLength[i].idx;
		dataCheck[lang - 1] = [];
		var yearFrom = document.querySelectorAll('[wrap_' + lang + ']');

		for(var j = 0; j < yearFrom.length; j++){
			var dataset = {
				"year" : null,
				"lang_idx" : null,
				"category_idx" : null,
				"month" : [],
				"title" : null,
			}
			var yearInput = yearFrom[j].querySelector('[data-year-' + lang + ']');
			var titleInput = yearFrom[j].querySelector('[data-title-' + lang + ']');
			var category = yearFrom[j].querySelector('[data-select-' + lang + ']');

			dataset.year = yearInput.value;
			dataset.title = titleInput.value;
			dataset.category_idx = category.value;
			dataset.lang_idx = lang;
			
			if(yearInput.value != "") {
				// var monthInput = yearFrom[j].querySelectorAll('[data-month-' + lang + ']');
				// for(var k = 0; k < monthInput.length; k++) {
				// 	if(monthInput[k].value != null) {
						var monthData = {
							"month" : null,
							"content" : [],
						}
						// if(monthInput[k].value.length == 1) {
						// 	monthData.month = "0" + monthInput[k].value;
						// }
						// else {
						// 	monthData.month = monthInput[k].value;
						// }
						
						// var monthForm = get_parentNode(monthInput[k], 4);
						// console.log(monthForm);
						var contentInput = yearFrom[j].querySelectorAll('[data-content-' + lang + ']');
						for(var l = 0; l < contentInput.length; l++) {
							if(contentInput[l].value != null) {
								monthData.content.push(contentInput[l].value);
							}
						}
						// console.log(monthData);
						dataset.month.push(monthData);
				// 	}
				// }
			}
			dataCheck[lang - 1].push(dataset);
		}
	}
	
	return dataCheck;
}

// 연혁 등록
function register_board() {
	
	var data = data_check();

	var selectYear = document.querySelectorAll('[check-year]');
	var selectCheck = document.querySelectorAll('[check-select]');
	for(var i = 0; i < selectCheck.length; i++) {
		if(selectCheck[i].value == "0" && selectYear[i].value != "") {
			alert("대분류를 선택하여주세요.");
			return;
		}
	}

	for(var i = 0; i < langLength.length; i++) {
		var year = document.querySelector('[data-year-' + (i + 1) + ']');
		if(year.value == "") {
			alert("년도를 입력해주세요");
			return;
		}

		// var month = document.querySelector('[data-month-' + (i + 1) + ']');
		// if(month.value == "") {
		// 	alert("월을 입력해주세요");
		// 	return;
		// }

		var content = document.querySelector('[data-content-' + (i + 1) + ']');
		if(content.value == "") {
			alert("내용을 입력해주세요");
			return;
		}
	}

	$('.loading').fadeIn();
	lb.ajax({
		type : "JsonAjaxPost",
		list : {
			ctl : "AdminHistory",
			param1 : "history_insert",
			data : JSON.stringify(data),		
		},
		action : "index.php",
		havior : function(result) {
			console.log(result);
			if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
			if(result.result == 1) {
				alert("등록이 완료되었습니다.");
				var param = {
					"side" : 1,
					"move_page" : 1,
					"lang" : get_lang_idx(),		
				}
				move_page("view_history", param);
			}
			else {
				alert(result.message);
			}
			$('.loading').fadeOut();
		}
	});
}

//  연혁 전체 체크
function allCheck(obj) {
	var lang = get_lang_idx();
	// var lang = langIdx.idx;
	var checkAll = document.querySelectorAll('[data-check-' + lang + ']');
	// console.log(checkAll);
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

//  연혁 선택 삭제
function del_year_confirm() {
	var lang = get_lang_idx();
	var check = document.querySelectorAll('[data-check-' + lang + ']');
	if(check.length == 1) {
		alert("년도는 최소 1개 이상 입력하여야 합니다.");
		check[0].checked = false;
		obj.elem.all_check.checked = false;
		return;
	}

	var check_flag = false;
	for(var i = 0; i < check.length; i++) {
		if(check[i].checked == true) {
			check_flag = true;
		}
	}
	
	if(check_flag) {
		var confirm_data = confirm("해당 년도를 삭제하시겠습니까?");
        del_year(confirm_data);
	}
	else {
		alert("삭제할 년도를 선택하여주세요.");
	}
}

function del_year(check) {
	var lang_idx = get_lang_idx();
	var check = document.querySelectorAll('[data-check-' + lang_idx + ']');

	for(var i = 0; i < check.length; i++) {
		if(check[i].checked == true) {
			var del = get_parentNode(check[i], 3);
			obj.elem.wrap.removeChild(del);
		}
	}

	obj.elem.all_check.checked = false;
	obj.elem.confirm_modal.style.visibility = "hidden";
    obj.elem.confirm_modal.style.opacity = "0";
}