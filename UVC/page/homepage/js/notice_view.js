obj.value.no_prev_text = ["", "이전 게시글이 없습니다.", "There is no prev post.", "Предыдущих постов нет."];
obj.value.no_next_text = ["", "다음 게시글이 없습니다.", "There is no next post.", "Не найдено ни одного следующего поста:"];
obj.value.no_post = ["", "게시글이 존재하지 않습니다.", "The post does not exist.", "Статья не существует."];

$(document).ready(function() {
    if(typeof data.num == "undefined" || data.num == ""){
        alert(obj.value.no_post[obj.language]);
        location.href = "?param=cp_story";
    }
    
    page_init();
})


function page_init(){
    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "Notice",
            param1 : "detail_board",
            lang_idx : obj.language,
            idx : data.num,
        },
        action : "index.php",
        havior : function(result){
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            console.log(result);
            if(result.result == 1){
                if(result.value.length == 0){ //검색되는 결과가 없으면 게시글이 없는 경우
                    alert(obj.value.no_post[obj.language]);
                    location.href = "?param=cp_story";
                }

                obj.elem.title.innerHTML = result.value[0].title;

                if(result.value[0].date == null) {
                    obj.elem.date.innerHTML = date_format(result.value[0].reg_date);
                }
                else {
                    obj.elem.date.innerHTML = result.value[0].date;
                }

                if(result.value[0].content != null){
                    obj.elem.content.innerHTML = result.value[0].content;
                }
                
                var file = result.value[0].file;
                
                if(file != undefined) {
                    for(var i = 0; i < file.length; i++){
                        if(file[i].upload_file != null){
                            var copy = obj.elem.file_copy.cloneNode(true);
                            copy.querySelector('[data-title]').innerHTML = file[i].real_file;
                            copy.setAttribute('onclick', 'file_download("' + file[i].real_file + '", "' + file[i].upload_file + '", 0);');
                            obj.elem.file_wrap.appendChild(copy);
                        }
                    }
    
                    if(file.length == 0){
                        obj.elem.file_wrap.style.display = "none";
                    }
                }
               

                //Next post , Prev post
                neighbor_post(result.value[0].idx);
            }
        }
    });
}

//현재 게시글의 이전글과 다음글 정보를 가져오는 함수
function neighbor_post(idx){
    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "Notice",
            param1 : "neighbor_post",
            lang_idx : obj.language,
            idx : idx,
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
                var next_post = result.next; //다음글
                var prev_post = result.previous; //이전글

                if(next_post.length == 0){ //다음글이 존재하지 않으면
                    obj.elem.next_post.innerHTML = obj.value.no_next_text[obj.language];
                }else{
                    obj.elem.next_post.innerHTML = next_post[0].title;
                    obj.elem.next_post.onclick = function(){
                         location.href = "?param=cp_story_view&num=" + next_post[0].idx;
                    }
                }

                if(prev_post.length == 0){ //이전글이 존재하지 않으면
                    obj.elem.prev_post.innerHTML = obj.value.no_prev_text[obj.language];
                }else{
                    obj.elem.prev_post.innerHTML = prev_post[0].title;
                    obj.elem.prev_post.onclick = function(){
                        location.href = "?param=cp_story_view&num=" + prev_post[0].idx;
                    }
                }
            }
        }
    });
}

function date_format(date){
    var year = date.substring(0, 4);
    var month = date.substring(5, 7);
    var day = date.substring(8, 10);

    return year + "." + month + "." + day; 
}

//real_name : 파일이 다운되는 실제이름 , filename : uploads폴더에 등록된 파일명
//type : 외부파일인지 내부파일인지 구분(0 : 내부파일, 1:외부파일)
function file_download(real_name, file_name, type) {
    //업로드된 파일의 위치
    file_url =  "UVC/_upload/notice/file/" + file_name;

    lb.ajax({
        type: "post",
        list: {
            ctl: "Notice",
            param1: "file_download",
            download_type: type,
            realname: real_name,
            url: file_url
        },
        address: "index.php"
    });  
}