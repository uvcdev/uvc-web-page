obj.value.image_sync = 1;
obj.value.file_sync = 1;

obj.value.lang = null;
var langIdx = null;
var langLength = 0;

var file_index = 1;
var img_index  = 1;

var fileTotal = 3;
var imgTotal = 1;

var add_sumnote_img_array = []; //sumnote img중 저장되는 이미지를 담는 배열
var del_sumnote_img_array = []; //sumnote img중 사용자가 삭제시킨 이미지를 담는 배열 ( 수정시 사용 )

//summer note
var sum_note_value = {}; //description 초기화 객체

$(document).ready(function(){
    obj.elem.cancel_btn.onclick = function() {
		var param = {
			"side" : 1,
		}
		move_page("view_notice", param);
	}
    request_lang();
});

function request_lang(){
	var lang_list = document.getElementById("lang_list");

	lb.ajax({
		type:"JsonAjaxPost",
		list : {
			ctl:"AdminNotice",
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

			if(name == "title") {
                elem.id = "title_" + data["idx"];
				elem.setAttribute('name', 'title_' + data["idx"]);
            }
            else if(name == "image_dl") {
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
			else if(name == "file_dl") {
				if(obj.value.file_sync == 1){
                    if(data["idx"] != 1){
                        elem.style.display = "none";
                    }
                }
                elem.id = "file_dl_" + data["idx"];
			}
			else if(name == "file_wrap") {
				elem.id = "file_wrap_" + data["idx"];
			}
			else if(name == "file_name") {
				elem.id = "file_name_" + data["idx"] + "_" + file_index;
			}
			else if(name == "file") {
                elem.id = "file_" + data["idx"] + "_" + file_index;
                elem.setAttribute('name', 'file_' + data["idx"] + "[]");
                elem.setAttribute('onchange', 'add_file(this, '+data["idx"]+', '+file_index+')');
            }
            else if(name == "file_label") {
                elem.id = "file_label_" + data["idx"];
                elem.setAttribute('for', "file_" + data["idx"] + "_" + file_index);
            }
			else if(name == "del_file_btn") {
                elem.id = "fileDel_" + data["idx"];
                elem.setAttribute('onclick', 'delete_file(this, '+data["idx"]+', '+file_index+')');
            }
            else if(name == "add_file_btn") {
                elem.id = "plus_" + data["idx"];
                elem.setAttribute('onclick', 'plus('+data["idx"]+')');
            }
			else if(name == "sumnote") {
                elem.id = "sumnote_" + data["idx"]; 
            }
        }, end : function() {
			file_index++;

            $('.summernote').summernote({
                placeholder: '',
                tabsize:2,
                height: 600,
                lang:'ko-KR',
                disableResizeEditor: true,
        
                callbacks: {
                    onImageUpload: function(files) {
                        for(var i = 0; i < files.length; i++){
                            request_image_url(files[i], this);
                        }
                    },
        
                    //파일 삭제시 add_sumnote_img_array에서 제거하여 저장할 파일만 배열에 남겨두기
                    //파일 삭제시 del_sumnote_img_array에 저장하여 파일 수정시 삭제된 파일들을 DB에서 제거하고 서버에서도 삭제
                    onMediaDelete : function(target){
                        var src = target[0].src;
                        var src_array = src.split('/');
                        var del_src = src_array[src_array.length - 1]; //가장 마지막 데이터가 파일이름
                        del_sumnote_img_array.push(del_src); //삭제시킨 이미지 이름 저장
                        if(add_sumnote_img_array.indexOf(del_src) != -1){
                            var index = add_sumnote_img_array.indexOf(del_src);
                            add_sumnote_img_array.splice(index, 1);
                        }
                    }
                },
                popover: {
                    image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageAttributes']],
                    ],
                },
                imageAttributes:{
                    icon:'<i class="note-icon-link"/>',
                    removeEmpty:false, // true = remove attributes | false = leave empty if present
                    disableUpload: false // true = don't display Upload Options | Display Upload Options
                },
                displayFields:{
                    imageBasic:true,  // show/hide Title, Source, Alt fields
                    imageExtra:false, // show/hide Alt, Class, Style, Role fields
                    linkBasic:true,   // show/hide URL and Target fields for link
                    linkExtra:false   // show/hide Class, Rel, Role fields for link
                }
            });
            
            for(var i = 0; i < value.length; i++){
                var id = "sumnote_" + value[i].idx;
                var sum_obj = lb.getElem(id).nextSibling.children[2].children[2];
                sum_note_value[id] = sum_obj;
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

	if(obj.elem.sync_file.checked == true) {
        obj.value.file_sync = 1;
        if(langIdx != 1){
            document.querySelector("#file_dl_" + langIdx).style.display = "none";
        }
    }
    else {
        obj.value.file_sync = 0;
        document.querySelector("#file_dl_" + langIdx).style.display = "block";
    }
}

// imgae upload
function add_image_file(event, lang_idx) {

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

    reader.onload = function(event) {
        var clone = document.querySelector('#img_upload_copy').cloneNode(true);
        var img = clone.querySelector('img');
        img.setAttribute('src', event.target.result);

        document.querySelector('#image_wrap_' + lang_idx).appendChild(clone);
    }
    reader.readAsDataURL(event.files[0]);
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

function plus(lang_idx) {
    var wrap = document.querySelector('#file_wrap_' + lang_idx);
    var fileLength = wrap.querySelectorAll('div').length;

    if(fileLength == fileTotal) { 
        alert('파일은 최대 ' +  fileTotal + '개까지 등록할 수 있습니다.');
    }
    else {
        var copy = document.querySelector('#file_copy').cloneNode(true);
        copy.id = "file_div_" + file_index;
        copy.querySelector('[data-file-name]').id = "file_name_" + lang_idx + "_" +  file_index;
        copy.querySelector('[data-file-input]').id = "file_" + lang_idx + "_" +  file_index;
        copy.querySelector('[data-file-label]').id = "filePlus_" + lang_idx + "_" +  file_index;
        copy.querySelector('[data-file-label]').setAttribute('for', "file_" + lang_idx + "_" +  file_index);
        copy.querySelector('[data-file-del]').id = "fileDel_" + lang_idx + "_" +  file_index;
        copy.querySelector('[data-file-input]').setAttribute('onchange', 'add_file(this, '+lang_idx+', '+file_index+')');
        copy.querySelector('[data-file-del]').setAttribute('onclick', 'delete_file(this, '+lang_idx+', '+file_index+')');

        wrap.appendChild(copy);
        file_index++;
    }
}

// file upload
function add_file(test, lang_idx, index) {
   
    var file_elem = document.getElementById('file_' + lang_idx + "_" + index);
    var file = file_elem.files[0];
    var filename = document.getElementById('file_name_' + lang_idx + "_" + index);

    if(test.files.length > 0){
        file_elem.name="file_" + lang_idx + "[]";
        filename.value = file.name; 
    }
    else{
        filename.value = "";
    }
}

function delete_file(test, lang_idx, index) {

    var wrap = document.querySelector('#file_wrap_' + lang_idx);
    fileCount = wrap.querySelectorAll('div').length;
    var wrap_div = wrap.querySelector('#file_name_' + lang_idx + "_" + index);
    var div_wrap = wrap.querySelector('#file_div_' + index);
    console.log(div_wrap)
	if (fileCount == 1) {
        wrap_div.value = "";
    }
    else {
        wrap.removeChild(div_wrap);
        fileCount--;
    }
}

// DB submit
function register_notice() {
 
	var sumnote_arr = [];
    for(var i = 0; i < langLength; i++) {
        var elem_content = sum_note_value["sumnote_" + (i + 1)];
        sumnote_arr.push(elem_content.innerHTML);

        var elem_title = document.querySelector("#title_" + (i + 1));
        if(elem_title.value == "") {
            alert("제목을 입력해주세요.");
            return;
        }
    }
	
	var elem_date = document.querySelector("#date");
    if(elem_date.value == "") {
        alert("날짜를 입력해주세요.");
        return;
    }

    $('.loading').fadeIn();

    lb.ajax({
        type : "AjaxFormPost",
        list : {
            ctl : "AdminNotice",
            param1 : "notice_insert",
			content : JSON.stringify(sumnote_arr),
            sumnote_img : JSON.stringify(add_sumnote_img_array),
            lang_idx : langIdx,
            langLength : langLength,
            image_sync : obj.value.image_sync,
			file_sync : obj.value.file_sync,
			date : obj.elem.date.value,
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
                move_page("view_notice", param);
            }
            else {
                alert(result.message);
            }
            $('.loading').fadeOut();
        }
    });
}

//sumnote 등록시 용량 문제로 제대로 저장되지 않는 경우가 많아
//이미지를 첨부할때마다 서버에 이미지를 업로드하고
//업로드한 이미지 url을 db에 그대로 저장하기 위해
//image url을 가져오는 함수
function request_image_url(file, elem){
    $(".loading").fadeIn();

    lb.ajax({
        type:"AjaxFormPost",
        list : {
            ctl:"AdminNotice",
            param1:"request_image_url",
            "file[]" : file,
            path : "notice/content/", //업로드 경로
        },
        elem : lb.getElem('form'),
        action : "index.php",
        response_method : "reponse_image_url", //앱일경우 호출될 메소드
        havior : function(result){
            //웹일 경우 호출될 메소드
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            reponse_image_url(result, elem);
        }    
    });
}

function reponse_image_url(result, elem){
    // console.log(result);
    for(var i = 0; i < result.value.length; i++){
        var image_name = upload_path + result.path + result.value[i];
        add_sumnote_img_array.push(result.value[i]); //게시글 등록시 사용       
        $(elem).summernote('editor.insertImage', image_name);
    }
    $(".loading").fadeOut();
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

function file_radio_event(type){
    var copy = document.querySelector('#file_dl_' + langIdx);

    if(type == 1){
        if(langIdx != 1){
            copy.style.display = "none";
        }
        obj.value.file_sync = 1;
    }
    else{
        if(langIdx != 1){
            copy.style.display = "block";
        }
        obj.value.file_sync = 0;
    }
}