$(document).ready(function() {
    terms_init();
})

function terms_init() {
    lb.ajax({
        type: "JsonAjaxPost",
        list: {
            ctl: "AdminTerms",
            param1 : "select_board",
            category_idx : 1, // 개인정보처리방침
            lang_idx: obj.language,
        },
        action: "index.php",
        havior: function(result){
            obj.flag.double_click=true;
            console.log(result);
            if (result.charCodeAt(0) === 0xFEFF) {
                result = result.slice(1);
            }
			result = JSON.parse(result);;
            // console.log(result);
            if (result.result == 1) {
                if(result.value[0].content != null){
                    obj.elem.terms_content.innerHTML = result.value[0].content;
                }
            }
        }
    });
}