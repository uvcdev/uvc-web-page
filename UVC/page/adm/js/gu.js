var obj = {
    elem : {},
    value : {},
    flag : {},
    fn : {
        init : function(){
            lb.traverse(document,function(elem){
                if(typeof(elem.id)!="undefined"){
                    if(elem.id!=""){
                        obj.elem[elem.id] = elem;
                    }
                }
            });

            if(typeof(add_lang_init)=="function"){
                add_lang_init();
            }
            if(typeof(add_tab_init)=="function"){
                add_tab_init();
            }
            if(typeof(add_init)=="function"){
                add_init();
            }
        },
        
        page_process : function(object){
            var start = parseInt((obj.page.move_page-1) / obj.page.page_count) * obj.page.page_count + 1;
            var end = parseInt((((obj.page.move_page-1)+obj.page.page_count) / obj.page.page_count)) * obj.page.page_count;//마지막까지 나타나야할 페이지수
            var page_list = parseInt((obj.page.total_count+(obj.page.page_size-1)) / obj.page.page_size);//총 나타나야할 페이지 개수
            function getElem(str){
                var div = lb.createElem("DIV");
                div.innerHTML = str;
                return div.firstChild;
            }
            
            if(start > 1){//첫페이지이동 존재
                var prev_first = getElem(object.prev_first);
                var prev_one = getElem(object.prev_one);

                prev_first.onclick = (function(){
                    var data = {page:1,name:object.page_name};
                    return function(){
                        return obj.fn.page_move(data);
                    }
                })();

                prev_one.onclick = (function(){
                    var data = {page:start-1,name:object.page_name};
                    return function(){
                        return obj.fn.page_move(data);
                    }
                })();

                object.elem.appendChild(prev_first);
                object.elem.appendChild(prev_one);
            }


            for(var i=start;i<=end;i++){
                if(obj.page.move_page==i){//현재 페이지 표시
                    var number_active = getElem(object.number_active);
                    number_active.innerHTML = i;
                    object.elem.appendChild(number_active);
                }else{
                    var number = getElem(object.number);
                    number.innerHTML = i;
                    number.onclick = (function(){
                        var data = {page:i,name:object.page_name};
                        return function(){
                            return obj.fn.page_move(data);
                        }
                    })();
                    object.elem.appendChild(number);
                }
        
                if(i>=page_list){
                    break;
                }
            }

            if(end < page_list){
                var next_last = getElem(object.next_last);
                var next_one = getElem(object.next_one);

                next_one.onclick = (function(){
                    var data = {page:end+1,name:object.page_name};
                    return function(){
                        return obj.fn.page_move(data);
                    }
                })();

                next_last.onclick = (function(){
                    var data = {page:page_list,name:object.page_name};
                    return function(){
                        return obj.fn.page_move(data);
                    }
                })();

                object.elem.appendChild(next_one);
                object.elem.appendChild(next_last);
            }
        },
        page_move : function(object){//숨겨야하는 부분은 list에 넣고, 페이지 부분은 move_page로 대체 한다.
            obj.page.move_list = JSON.parse(obj.page.move_list);
            obj.page.move_list.move_page=object.page;
            // lb.ajax({
            //     type:"post",
            //     list : obj.page.move_list,
            //     address : "/"
            // });
            
            var load = "";
            var count =0;

            // console.log(obj.page.move_list);
            for(var key in obj.page.move_list){
                if(count==0){
                    load = "?"+key+"="+obj.page.move_list[key];
                }else{
                    load = load+"&"+key+"="+obj.page.move_list[key];
                }
                count = count+1;
            }

            // console.log(load);

            location.href=load;
        },
        page_calc : function(){
            //실행 될때 내부에서 계속적으로 값을 가지고 있으면서 더해준다.
            if(typeof(obj.page.row_count)=="undefined"){
                obj.page.row_count=0;
            }else{
                obj.page.row_count = obj.page.row_count+1;
            }
            return (obj.page.total_count+obj.page.page_size) - (obj.page.move_page*obj.page.page_size)-obj.page.row_count;
        },
        page_list : function(object){
            // console.log(object);
            if(typeof(object.wrap_array)!="undefined"){
                lb.wrap_delete(object.wrap_array);
            }
            // console.log(obj.page);
            lb.ajax({
                type:"JsonAjaxPost",
                list: obj.page,
                havior:function(result){
					if (result.charCodeAt(0) === 0xFEFF) {
                        result = result.slice(1);
                    }
                    console.log(result);
                    var json = JSON.parse(result);
                    if(json.result=="1"){
                        obj.page.total_count = parseInt(json.total_count);
                        obj.page.current_count = json.value.length;
                        object.havior(json.value);
                    
                        //페이징 처리
                        obj.fn.page_process(object.page_num);
                    }
                }
            });
        },
        // 최진혁 -> havior에서 value값만 넘어와서 result전체가 넘어오도록 수정
        page_list_v2 : function(object){
            if(typeof(object.wrap_array)!="undefined"){
                lb.wrap_delete(object.wrap_array);
            }
            lb.ajax({
                type:"JsonAjaxPost",
                list: obj.page,
                havior:function(result){
					if (result.charCodeAt(0) === 0xFEFF) {
                        result = result.slice(1);
                    }
                    // console.log(result);
                    var json = JSON.parse(result); 
                    // console.log(json);
                    if(json.result=="1"){
                        obj.page.total_count = parseInt(json.total_count);
                        obj.page.current_count = json.value.length;
                        object.havior(json);
                        if(typeof(object.object)!="undefined"){
                            object.object(json);
                        }
                        //페이징 처리
                        obj.fn.page_process(object.page_num);
                    }else{
                        object.havior(json);
                        if(typeof(object.object)!="undefined"){
                            object.object(json);
                        }
                    }
                }
            });
        },
        move_page : function(list){
            // lb.ajax({
            //     type:"post",
            //     list : list,
            //     address : "/"
            // });
            var load = "";
            var count = 0;
            if(typeof(list.data)!="undefined"){
                list.data = JSON.stringify(list.data);
            }
            for(var key in list){
                if(count==0){
                    load = "?"+key+"="+list[key];
                }else{
                    load = load+"&"+key+"="+list[key];
                }
                count = count+1;
            }
            location.href=load;
        },
        file_check : function(object){            
            /*
                함수 설명 : 
                fileSize : 파일 사이즈
                maxSize : 최대 파일 사이즈
                error_code : 1 성공, 2 최대파일 사이즈초과, 3 확장자틀림
            */
            // 사이즈체크
            var maxSize  = object.max_size * 1024 * 1024;    
            var fileSize = 0;
            var file_flag = false;
            object.error_code = true;
            
            // 브라우저 확인
            var browser=navigator.appName;
            var thumbext = object.file.value; //파일을 추가한 input 박스의 값
            thumbext = thumbext.slice(thumbext.indexOf(".") + 1).toLowerCase(); //파일 확장자를 잘라내고, 비교를 위해 소문자로 만듭니다.
            
            function init(){
                if(typeof(object.name_view)!="undefined"){
                    if(object.name_view.type=="html"){
                        object.name_view.elem.innerHTML = "";
                    }else{
                        object.name_view.elem.value = "";
                    }
                    
                }
                object.file.value = "";
            }
            // 익스플로러일 경우
            if (browser=="Microsoft Internet Explorer"){
                var oas = new ActiveXObject("Scripting.FileSystemObject");
                fileSize = oas.getFile( object.file.value ).size;
            }else{
                // console.log(object.file.files[0])
                fileSize = object.file.files[0].size;
            }
            
            if(fileSize > maxSize){
                init();
                object.error_code = 2;
                object.havior(object);
            }else{
                for(var i=0;i<object.extension.length;i++){
                    if(object.extension[i]===thumbext){
                        file_flag=true;
                    }
                }
                // console.log(object.name_view);
                if(file_flag){
                    if(typeof(object.name_view)!="undefined"){
                        if(object.name_view.type=="html"){
                            object.name_view.elem.innerHTML=object.file.files[0].name;
                        }else{
                            object.name_view.elem.value=object.file.files[0].name;
                        }
                    }

                    if(typeof(object.thumnail)!="undefined"){
                        var reader = new FileReader();
                        reader.__proto__.lb = this;
                        reader.onload = function(){
                            var output = null;
                            if(typeof(object.thumnail)=="object"){
                                output = object.thumnail;
                            }else{
                                output = this.lb.getElem(object.thumnail);
                            }
                            output.src = reader.result;
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    object.havior(object);
                }else{
                    init();
                    object.error_code = 3;
                    object.havior(object);
                }
            }
        }
    }
}

$(document).ready(function(){
    obj.fn.init();
    var elem = lb.queryAll("data-lang");
    for(var i=0;i<elem.length;i++){
        var data = JSON.parse($(elem[i]).attr("data-lang"));
        if(typeof(data.type)!="undefined"){
            if(data.type=="value"){
                elem[i].value = object.lang[data.page][object.language][data.value];
            }else if(data.type=="placeholder"){
                elem[i].placeholder = object.lang[data.page][object.language][data.value];
            }else if(data.type=="src"){
                elem[i].src = object.lang[data.page][object.language][data.value];
            }
        }else{
            elem[i].innerHTML = object.lang[data.page][object.language][data.value];
        }
    }
});