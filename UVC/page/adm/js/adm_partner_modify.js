obj.value.image_sync = 1;

obj.value.lang = null;
var langIdx = null;
var langLength = 0;
obj.value.data = null;
var delImg = [];
var deleteCheck = [];
var Img = [];
var imgName = [];
var delImgName = [];

var file_index = 1;
var totalFile = 1;

$(document).ready(function() {
    request_lang();
    $('.select').selectric();
});

function request_lang(){
	var lang_list = document.getElementById("lang_list");

	lb.ajax({
		type:"JsonAjaxPost",
		list : {
			ctl:"AdminPartner",
			param1:"lang_select",
		},
		action : "index.php",
		havior : function(result){
			// console.log(result);
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
						}
					}, end : function() {
                        langIdx = result.value[0].idx;
                        langLength = result.value.length;
        
                        set_form(result.value);
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

                                    get_form(JSON.parse(this.dataset.value), li.length);
                                    // langIdx = JSON.parse(this.dataset.value);
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

function set_form(value) {
    lb.auto_view({
		wrap : "wrap",
		copy : "copy",
		attr : '["data-attr"]',
		json : value,
		havior : function(elem, data, name, copy_elem) {
			if(copy_elem.getAttribute('data-copy') == "copy") {
				copy_elem.setAttribute('data-copy', '');
				if(data.idx != 1){
                    copy_elem.style.display = "none";
                }
                else{
                    copy_elem.style.display = "block";
                }

                copy_elem.id = "wrap_" + data["idx"];
                copy_elem.setAttribute('data-form', '');
			}

			if(name == "image_dl") {
                if(obj.value.image_sync == 1){
                    if(data["idx"] != 1){
                        elem.style.display = "none";
                    }
                }
                elem.id = "image_dl_" + data["idx"];
            }
            else if(name == "file_input_wrap") {
                elem.id = "file_input_wrap_" + data["idx"];
            }
            else if(name == "img_file") {
                elem.id = "img_file_" + data["idx"];
                elem.setAttribute('name', 'img_file_' + data["idx"] + "[]");
                elem.setAttribute('onchange', 'add_image_file(this, '+data["idx"] + ')');
            }
            else if(name == "image_wrap") {
                elem.id = "image_wrap_" + data["idx"];
            }
            else if(name == "img_label") {
                elem.id = "img_label_" + data["idx"];
                elem.setAttribute('for', "img_file_" + data["idx"]);
            }
        }, end : function() {
            catalog_detail();
        }
	});
}

function get_form(lang, length) {
    var copy = document.querySelectorAll('[data-form]');

    for(var i = 0; i < length; i++) {
        copy[i].style.display = "none";
    }

    document.querySelector('#wrap_' + lang.idx).style.display = "block";
    langIdx = lang.idx;

    if(obj.elem.sync_img.checked == true) {
        obj.value.image_sync = 1;
        if(langIdx != 1){
            document.querySelector("#image_dl_" + langIdx).style.display = "none";
        }
    }
    else {
        obj.value.image_sync = 0;
        document.querySelector("#image_dl_" + langIdx).style.display = "block";
    }
}

function catalog_detail() {

    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "AdminPartner",
            param1 : "modify_detail",
            key_code : data.key_code,
        },
        action : "index.php",
        havior : function(result){
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            console.log(result);
            if(result.result == 1) {
                if(result["value"].length > 0){
                    obj.value.data = result.value;
                    init_view();
                }               
                else{
                    //not data
                    alert("데이터가 없습니다");
                }
            }
            else {
                alert(result.message);
            }
        }
    });
}

function init_view(){
    var data = obj.value.data;
    file_index++;
    for(var i = 0; i < data.length; i++) {
        if(data[i].image_sync == 1) {
            obj.elem.sync_img.checked = true;
            obj.elem.unsync_img.checked = false;
            obj.value.image_sync = 1;
        }
        else {
            obj.elem.unsync_img.checked = true;
            obj.elem.sync_img.checked = false;
            obj.value.image_sync = 0;
        }
      
        var image_wrap = document.querySelector('#image_wrap_' + data[i].lang_idx);
        var clone = document.querySelector('#img_upload_copy').cloneNode(true);
        // clone.id = "";
        if(data[i].upload_img != null) {
            image_wrap.value = data[i].real_img;
            var img = clone.querySelector('img');
            img.setAttribute('src', upload_path + "partner/" + data[i].upload_img);
            img.setAttribute('data-img', data[i].upload_img);
            img.setAttribute('img-name', data[i].real_img);
            image_wrap.appendChild(clone);

            if(clone.querySelector('img').getAttribute('data-img') != null) {
                Img.push(clone.querySelector('img').getAttribute('data-img'));     //  db에 저장되어있는 랜덤 이름
            }
            if(clone.querySelector('img').getAttribute('img-name') != null) {
                imgName.push(clone.querySelector('img').getAttribute('img-name'));     //  db에 저장되어있는 실제 이름
            }
        }
    }
}

// imgae upload
function add_image_file(event, lang_idx) {

    var wrap = document.querySelector('#image_wrap_' + lang_idx);
    var imgLength = wrap.querySelectorAll('div');
    var copy = document.querySelector('#img_upload_copy');
    if(imgLength.length == totalFile) {
        alert("파일은 1개까지 등록 가능합니다.");
    }
    else {
        var image = event.files[0];

        var reader = new FileReader();
    
        if(event.files[0] != undefined) {
            reader.onload = function(event) {
                var clone = document.querySelector('#img_upload_copy').cloneNode(true);
                var img = clone.querySelector('img');
                img.setAttribute('src', event.target.result);
        
                document.querySelector('#image_wrap_' + lang_idx).appendChild(clone);
            }
            reader.readAsDataURL(event.files[0]);
        }
       
       
        if(event.files.length > 0) {
            image.name = "img_file_" + lang_idx + "[]";
            imgLength.value = image.name;
        }
    }
}

// DB modify
function register_board() {
 
    
    
    lb.ajax({
        type : "AjaxFormPost",
        list : {
            ctl : "AdminPartner",
            param1 : "modify_update",
            image_sync : obj.value.image_sync,
            key_code : data.key_code,
            lang_idx : langIdx,
            langLength : langLength,
            // change_file : JSON.stringify(delImg),
            // deleteCheck : JSON.stringify(deleteCheck),
            image : JSON.stringify(Img),
            img_name : JSON.stringify(imgName),
            delImgName : JSON.stringify(delImgName),
            delImg : JSON.stringify(delImg),
           
        },
        elem : document.querySelector('#form'),
        action : "index.php",
        havior : function(result){
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            if(result.result == "1") {  // sucess
                alert("글이 수정되었습니다.");
                var param = {
                    "side" : 1,
                }
                move_page("view_partner", param);
            }
            else {
                alert(result.message);
            }
        }
    });
}

function delete_image(elem) {

    var img = elem.parentNode.querySelector('img');
    if(img.getAttribute('data-img') != null) {
        var deleteFile = img.getAttribute('data-img');
        var deleteImg = img.getAttribute('img-name');

        if(deleteFile != null) {
            delImg.push(deleteFile);
        }
        if(deleteImg != null) {
            delImgName.push(deleteImg);
        }
    }

    document.querySelector('#image_wrap_' + langIdx).removeChild(elem.parentNode);
    // console.log(document.getElementById('img_upload_copy'));
    file_index--;
}

function image_radio_event(type) {

    var copy = document.querySelector('#image_dl_' + langIdx);
    var img = copy.querySelector('img');

    if(type == 1){
        if(langIdx != 1){
            copy.style.display = "none";
        }
        obj.value.image_sync = 1;
    }
    else{
        if(langIdx != 1){
            copy.style.display = "block";
        }
        obj.value.image_sync = 0;
    }
}