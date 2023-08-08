$(document).ready(function(){
    history_category();
    certify_category();
    certify_category2();
    partner_select();
});

let div_class = 1;

function history_category(){
    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "History",
            param1 : "history_select",
            lang_idx : obj.language,
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
                if(result.value.length > 0){
                    lb.auto_view({
                        wrap : "wrap",
                        copy : "copy",
                        attr : '["data-attr"]',
                        json : result.value,
                        havior : function(elem, data, name, copy_elem){
                            if (copy_elem.getAttribute('data-copy') == "copy") {
                                copy_elem.setAttribute('data-copy', '');
                            }
                        
                            if(name == "category_name"){
                                if(data.history != undefined) {
                                    elem.innerHTML = data.name;
                                }
                            }
                            else if(name == "history"){
                                var history = data.history;
                                if(history != undefined) {
                                    for(var i = 0; i < history.length; i++){
                                        var div = document.createElement('div');
                                        div.classList.add('list_wrap');
                            
                                        var b = document.createElement('b');
                                        b.innerHTML = history[i].year;

                                        let dd2 = document.createElement('dd');
                                        dd2.className = "first";
                                        dd2.innerHTML = history[i].title;
                                        
                                        var dl = document.createElement('dl');
                                        dl.appendChild(dd2)

                                        var content_arr = history[i].content_arr;
                                        for(var j = 0; j < content_arr.length; j++){
                                            var dd = document.createElement('dd');
                                            dd.innerHTML = content_arr[j];
                            
                                            dl.appendChild(dd);
                                        }
                            
                                        div.appendChild(b);
                                        div.appendChild(dl);
                            
                                        elem.appendChild(div);
                                    }
                                }
                                
                            }
                        }
                    });
                }
            }
            
        }
    });
}

function certify_category(){

    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "Certify",
            param1 : "certify_select",
            lang_idx : obj.language,
            category : 1,
        },
        action : "index.php",
        havior : function(result){
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            if(result.result == 1){
                lb.auto_view({
                    wrap : "creti_wrap",
                    copy : "certi_copy",
                    attr : '["data-attr"]',
                    json : result.value,
                    havior : function(elem, data, name, copy_elem){
                        if (copy_elem.getAttribute('data-copy') == "certi_copy") {
                            copy_elem.setAttribute('data-copy', '');
    
                        }
                    
                        if(name == "image"){
                            if(data.upload_img == null){
                                var src = no_image;
                                elem.style.backgroundImage = "url(" + src + ")";
                            }else{
                                var src = upload_path + "certify/" + data.upload_img;
                                elem.style.backgroundImage = "url(" + src + ")";
                                
                            }
                          
                        }
                        else if(name == "title") {                         
                            elem.innerHTML = data.title + " <br> " + data.content;
                        }
                        
                    }
                });
            }
        }
    });
}


function certify_category2(){

    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "Certify",
            param1 : "certify_select",
            lang_idx : obj.language,
            category : 2,
        },
        action : "index.php",
        havior : function(result){
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            if(result.result == 1){
                lb.auto_view({
                    wrap : "creti_wrap2",
                    copy : "certi_copy",
                    attr : '["data-attr"]',
                    json : result.value,
                    havior : function(elem, data, name, copy_elem){
                        if (copy_elem.getAttribute('data-copy') == "certi_copy") {
                            copy_elem.setAttribute('data-copy', '');
    
                        }
                    
                        if(name == "image"){
                            if(data.upload_img == null){
                                var src = no_image;
                                elem.style.backgroundImage = "url(" + src + ")";
                            }else{
                                var src = upload_path + "certify/" + data.upload_img;
                                elem.style.backgroundImage = "url(" + src + ")";
                                
                            }
                          
                        }
                        else if(name == "title") {                         
                            elem.innerHTML = data.title + " <br> " + data.content;

                        }
                        
                    }
                });
            }
        }
    });
}

function partner_select(){

    lb.ajax({
        type : "JsonAjaxPost",
        list : {
            ctl : "Certify",
            param1 : "partner_select",
            lang_idx : obj.language,
        },
        action : "index.php",
        havior : function(result){
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            if(result.result == 1){
                lb.auto_view({
                    wrap : "partner_wrap",
                    copy : "partner_copy",
                    attr : '["data-attr"]',
                    json : result.value,
                    havior : function(elem, data, name, copy_elem){
                        if (copy_elem.getAttribute('data-copy') == "partner_copy") {
                            copy_elem.setAttribute('data-copy', '');
    
                        }
                    
                        if(name == "image"){
                            if(data.upload_img == null){
                                var src = no_image;
                                elem.src = src
                            }else{
                                var src = upload_path + "partner/" + data.upload_img;
                                elem.src = src
                                
                            }
                          
                        }
                       
                        
                    }
                });
            }
        }
    });
}
