$(document).ready(function() {
    page_init();
});

function page_init() {
    obj.value.data = data;

	obj.page = {
		ctl: "Notice",
        param1: "notice_select",
		lang_idx : obj.language,
        page_count : 3, //페이징 처리 Block 수
        page_size : 4, //한 페이지에 보여질 게시글 수
        move_page : data.move_page, //현재 페이지
        move_list : JSON.stringify(obj.value.data),
    }

	// let no_post = obj.elem.no_post;
    obj.elem.wrap.innerHTML = ""; 
    obj.elem.paging.innerHTML = "";
    // obj.elem.wrap.appendChild(no_post);
    obj.fn.page_list({
        page_num : {
            elem : obj.elem.paging, //페이징을 추가할 div
            page_name : "move_page",
            prev_first : ' <li><div class="navi"><img src="UVC/page/homepage/img/arrow_prev.png" alt=""/></div></li>',
            prev_one : '<li><div class="navi"><img src="UVC/page/homepage/img/arrow_prev2.png" alt=""/></div></li>',
            number_active : '<li><p class="page_on">1</p></li>',
            number : '<li><p>2</p></li>',
            next_one : '<li><div class="navi"><img src="UVC/page/homepage/img/arrow_next2.png" alt=""/></div></li>', 
            next_last : '<li><div class="navi"><img src="UVC/page/homepage/img/arrow_next.png" alt=""/></div></li>'
        },

        havior : function(result){
			console.log(result);
			if(result.length == 0){
				// obj.elem.no_post.style.display = "";
				obj.elem.paging.style.display = "none";
			}
			else {
				// obj.elem.no_post.style.display = "none";
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
                            copy_elem.onclick = function() {
                                location.href = "?param=cp_story_view&num=" + data.idx;
                            }
						}

					    if(name == "title"){
							elem.innerHTML= data.title;
						}
                        else if(name == "content") {
                            elem.innerHTML = data.content.replace(/(<([^>]+)>)/ig,"");
                        }
						else if(name == "reg_date") {
                            if(data.date == null) {
                                elem.innerHTML = date_format(data.reg_date, "-", 1);
                            }
                            else {
                                elem.innerHTML = data.date;
                            }
						}
                        else if(name == "image") {
                            // // if(data.upload_img == null) {
                            //     elem.style.backgroundImage = "url(DUT/page/hompage/img/sub/news_thum.png)";
                            // // }
                            // // else {
                                elem.style.backgroundImage = "url(" + upload_path + "notice/image/" + data.upload_img + ")";
                            // }
                        }
					}
				});
			}
            
        }
    });
}

function date_format(date){
    let year = date.substring(0, 4);
    let month = date.substring(5, 7);
    let day = date.substring(8, 10);

    return year + "-" + month + "-" + day;
}