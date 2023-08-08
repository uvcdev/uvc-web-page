obj.flag.double_click = true;

function login(){
    if(obj.flag.double_click){
        obj.flag.double_click = false;
        lb.ajax({
            type: "JsonAjaxPost",
            list: {
                ctl: "Admin",
                param1: "login",
                id : obj.elem.id.value,
                pw : obj.elem.pw.value
            },
            elem: obj.elem.test,
            action: "index.php",
            havior: function (result) {
                // console.log(result);
                if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
                obj.flag.double_click = true;
                if(result["result"]==1){
                    location.href = "?param=adm&param1=view_history";
                }else{
                    alert("계정정보가 일치하지 않습니다.");
                }
            }
        });
    }
    
}

function Enter_Check() {
    if (event.keyCode == 13) {
        login();
    }
}

function logout(){
    if(obj.flag.double_click){
        obj.flag.double_click = false;
        lb.ajax({
            type: "JsonAjaxPost",
            list: {
                ctl: "Admin",
                param1: "logout",
            },
            action: "index.php",
            havior: function () {
                location.href = "?param=adm";
            }
        });
    }
}