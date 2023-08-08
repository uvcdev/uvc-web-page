//관리자 페이지 페이지 접근시 페이지에 맞는 사이드 메뉴 active
$(document).ready(function(){
    var side_menu = obj.elem.side_menu;
    if(side_menu != null) {
        var side_list = side_menu.querySelectorAll('[data-menu]');

        //사용자가 임의로 side paramter를 지우면 데이터를 첫번째 side menu open
        if(typeof data.side == "undefined" || data.side == ""){
            data.side = 1;
        }
        var side_index = data.side;
    
        for(var i = 0; i < side_list.length; i++){
            side_list[side_index - 1].classList.add('active');
            side_list[side_index - 1].querySelector('.arrow').classList.add('rotate');
            $(side_list[side_index - 1].querySelector('.adm_side_depth02')).stop().slideDown();
        }
    }
});