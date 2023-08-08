$(document).ready(function() {

    page_init();
});


function page_init() {

    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "News",
            param1 : "main_news_select",
            lang_idx : obj.language,
        },
        action : "index.php",
        havior : function(result){
            // console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
			result.value.sort((a,b)=>b.idx-a.idx)
            // console.log(result);
            if(result.result == 1){
                lb.auto_view({
                    wrap : "wrap",
                    copy : "copy",
                    attr : '["data-attr"]',
                    json : result.value,
                    havior : function(elem, data, name, copy_elem){ 
                        if (copy_elem.getAttribute('data-copy') == "copy") {
                            copy_elem.setAttribute('data-copy', '');
                            // if(lang_idx != undefined){
                            // 	copy_elem.style.display = "block";
                            // }else{
                            // 	copy_elem.style.display = "none";
                            // }
                            copy_elem.onclick = function() {
                                location.href = "?param=cp_news_view&num=" + data.idx;
                            }
                        }
            
                        if(name == "title"){
                            elem.innerHTML= data.title;
                        }
                       
                        else if(name == "reg_date") {
                            elem.innerHTML = date_format(data.reg_date, "-", 1);
                        }
                        else if(name == "image") {
                            elem.src = upload_path + "news/image/" + data.upload_img;
                        }
                    }, end : function() {
                        var swiper = new Swiper(".main_news", {
                            loop:true,
                            autoplay:{
                              delay: 1500,
                              disableOnInteraction: false  
                            },
                            slidesPerView: 2,
                            spaceBetween: 10,
                            breakpoints: {
                                400: {
                                slidesPerView:2,  //브라우저가 768보다 클 때
                                spaceBetween: 10,
                                },
                                640: {
                                slidesPerView:2,  //브라우저가 768보다 클 때
                                spaceBetween: 10,
                                },
                                960: {
                                slidesPerView:2,  //브라우저가 768보다 클 때
                                spaceBetween: 30,
                                },
                                1024: {
                                slidesPerView: 3,  //브라우저가 1024보다 클 때
                                spaceBetween: 30,
                                },
                            },
                          });
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

    return year + "." + month + "." + day;
}