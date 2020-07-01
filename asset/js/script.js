$(document).ready(function(){
    /*헤더에 마우스 올리면 클래스 토글*/
    $('#header').hover(function(){
        $(this).toggleClass("on");
    });

    /*유틸메뉴 언어선택*/
    $('.lang').click(function(){
		$('.lang_util ul').slideToggle(300);
    });
    
    /*전체메뉴*/
    function allmenuClose(){
		$(window).resize(function(){
			var winW  = $(window).width();
				winH  = $(window).height();
				
			if (winW > 1024){
				$('.allmenu_wrap').animate({right:'-550px'}, 500, function(){
					$('.allmenu_wrap').hide();
				});
			} else {
				$('.allmenu_wrap').animate({right:'-100%'}, 500, function(){
					$('.allmenu_wrap').hide();
				});
			}
		}).resize();
	}

    $('#header .btn_menu').click(function(){
		$('body').addClass('fixed');
		$('html').css({overflow:'hidden'});
		$('.allmenu_wrap').show().animate({right:0}, 500);
	});
	$('#allmenu .btn__close_menu, .allmenu_bg').click(function(){
		$('body').removeClass('fixed');
		$('html').css({'overflow':''});
		allmenuClose();
	});
})