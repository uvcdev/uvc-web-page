obj.value.image_sync = 1;

obj.value.lang = null;
var langIdx = null;
var langLength = 0;

$(document).ready(function() {
    request_lang();
	$('#cancel_btn').click(function() {
        var param = {
            "side" : 1,
        }
        move_page("view_partner", param);
	});

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
						}
					}, end : function() {
                        // get_form(result.value[0]);
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
				if(data.idx == 1){
                    copy_elem.style.display = "block";
                }else{
                    copy_elem.style.display = "none";
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
                // elem.setAttribute('data-image-' + data["idx"], data["idx"]);
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

// imgae upload
function add_image_file(event, lang_idx) {
    // var image = document.getElementById('img_file_' + lang_idx).files[0];
    var image = event.files[0];

    var wrap = document.querySelector('#image_wrap_' + lang_idx);

    var imgLength = wrap.querySelectorAll('div');

    if(event.files.length > 0) {
        image.name = "img_file_" + lang_idx + "[]";
        if(imgLength.length > 0) {
            alert("파일은 1개까지 등록 가능합니다.");
            return;
        }
    }

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
  
}

// DB submit
function register_board() {
 
   
    $('.loading').fadeIn();
    lb.ajax({
        type : "AjaxFormPost",
        list : {
            ctl : "AdminPartner",
            param1 : "partner_insert",
            image_sync : obj.value.image_sync,
            lang_idx : langIdx,
            langLength : langLength,
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
                alert("등록이 성공하였습니다.");
                var param = {
                    "side" : 1,
                }
                move_page("view_partner", param);
            }
            else {
                alert(result.message);
            }
            $('.loading').fadeOut();
        }
    });
}

function delete_image(elem) {

    var img = elem.parentNode.querySelector('img');
    if(img.getAttribute('data-img') != null) {
        var deleteFile = img.getAttribute('data-img');
        if(deleteFile != null) {
            deleteCheck.push(deleteFile);
        }
    }

    document.querySelector('#image_wrap_' + langIdx).removeChild(elem.parentNode);
}

function image_radio_event(type){
    var copy = document.querySelector('#image_dl_' + langIdx);

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