$(document).ready(function(){
	/*헤더에 마우스 올리면 클래스 토글*/
    $('#header').mouseenter(function(){
		$(this).addClass("on");
	});
	$('#header').mouseleave(function(){
		$(this).removeClass("on");
	}); //hover기능은 로드가 전부 되지 않았을때 반대로 되는 경우가 있음
	
	$('#header').mouseover(function(){
		$('.logo').attr("src","asset/images/uvc_logo_nav.png");
	});

	$('#header').mouseleave(function(){
		$('.logo').attr("src","asset/images/uvc_logo_foot.png");
	})

    /*유틸메뉴 언어선택*/
    $('.lang').click(function(){
		$('.lang_util ul').slideToggle(400);
    });
    
	/*전체메뉴*/
	$('.mNav').click(function(){
		$('.gnb').slideToggle(400);
		$(this).toggleClass("on");
	});
});
    
$(window).resize(function(){
	var wWidth = $(window).width();
	if(wWidth > 1180 && $(".gnb").is(":hidden") ){
		$(".gnb").removeAttr("style");
	}
});
