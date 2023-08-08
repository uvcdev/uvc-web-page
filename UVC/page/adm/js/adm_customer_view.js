obj.value.checkList = [];
var checkList = obj.value.checkList;

$(document).ready(function() {

    certify_view();
});

function certify_view() {

	obj.value.data = data;
	
	obj.page = {
		ctl: "AdminCustomer",
        param1: "inquiry_select",
        page_count : 5, //페이징 처리 Block 수
        page_size : 10, //한 페이지에 보여질 게시글 수
        move_page : data.move_page, //현재 페이지
        move_list : JSON.stringify(obj.value.data),
    }

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
						elem.id = data['idx'];
                        elem.setAttribute('check-data', '');
						elem.classList.add('check-data');
					}
					else if(name == "no"){
						elem.innerHTML= obj.fn.page_calc();
					}
                    else if(name == "reg_date"){
						elem.innerHTML= date_format(data["reg_date"], "-", 1);
					}
                   
                    else if(name == "name"){
						elem.innerHTML= data['name'];
					}
                    else if(name == "contact"){
						elem.innerHTML= data['phone'];
					}
                    else if(name == "email"){
						elem.innerHTML= data['email'];
					}
                    else if(name == "detail") {
                        elem.onclick = function() {
                            obj.elem.modal.style.display = "block";
                            obj.elem.modal.style.visibility = "visible";
                            obj.elem.modal.style.opacity = 1;

							obj.elem.writer.value = data.name;
							obj.elem.company.value = data.company;
							obj.elem.phone.value = data.phone;
							obj.elem.email.value = data.email;
                            obj.elem.content.value = data.content;
                        }
                    }
					else if(name == "answer") {
                        elem.onclick = function() {
							open_answer(data.idx, data.answer);
                        }
                    }
				}
			});
        }
    });
}

function close_detail_modal() {
    obj.elem.modal.style.display = "none";
    obj.elem.modal.style.visibility = "hidden";
	obj.elem.modal.style.opacity = 0;

	obj.elem.writer.value = "";
	obj.elem.phone.value = "";
	obj.elem.email.value = "";
	obj.elem.content.value = "";
	obj.elem.company.value = "";
}

function close_answer_modal() {
    obj.elem.answer_modal.style.display = "none";
    obj.elem.answer_input.innerHTML = "";
}

function open_answer(idx, answer) {
	obj.elem.answer_modal.style.display = "block";

	if(answer != null) {
		obj.elem.answer_input.value = answer;
	}

	obj.elem.reg_answer_btn.onclick = function() {
		if(obj.elem.answer_input.value == null) {
			alert("답변을 입력해주세요.");
			return;
		}
		else {
			lb.ajax({
				type : "JsonAjaxPost",
				list : {
					ctl : "AdminCustomer",
					param1 : "modify_answer",
					idx : idx,
					answer : obj.elem.answer_input.value,
				},
				action : "index.php",
				havior : function(result){
					// console.log(result);
					if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
					if(result.result == 1){
						alert("답변이 등록되었습니다.");
						location.reload();
					}
					else{
						alert(result.message);
					}
				}
			});
		}
	}
}

function check(check) {
	if(check.checked == true) {
		checkList.push(check.id);
	}
	else {
		for(var i = 0; i < checkList.length; i++) {
			if(checkList[i] == check.id) {
				checkList.splice(i, 1);
				i = i -1;
			}
		}
	}
}

function checkAll(obj) {
	// var checkAll = document.getElementById("check");
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
					ctl:"AdminCustomer",
					param1:"inquiry_delete",
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
						alert("삭제가 완료되었습니다.");
                        location.reload();
					}
					else {
						alert(result.message);
					}
				}    
			});
		}
	}

}