$(document).ready(function(){
	/*헤더에 마우스 올리면 클래스 토글*/
    $('#header').hover(function(){
		$(this).toggleClass("on");
	});
	
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
	$('.btn_menu').click(function(){
		$('.tb_menu').slideToggle(400);
	});

	slideControls = $('.slide-controls');

	$(".slider").slick({
		fade: true,
		dots: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 15000,
		arrows: false,
		pauseOnFocus: false,
		pauseOnHover: false,
		appendDots: slideControls,
		customPaging: function(slider, i) {
			var title = $(slider.$slides[i]).attr('data-title');
			return '<a class="pager__item">'+title+'</a>';
		}
	});
});

var cont = $("#content > section");
var target = $(this);
var index = target.index();
var section = cont.eq(index);
var offset = section.offset().top;

$(window).scroll(function(){
	var wScroll = $(this).scrollTop();

	if(wScroll >= cont.eq(0).offset().top - $(window).height()/2 ){
		cont.eq(0).addClass("show");
		$('#business.show .section_head').delay(n*100).animate({opacity:1}, 300);
	}
	if(wScroll >= cont.eq(1).offset().top - $(window).height()/2 ){
		cont.eq(1).addClass("show");
		$('#solution.show .section_head').delay(n*100).animate({opacity:1}, 300);
	}
	if(wScroll >= cont.eq(1).offset().top - $(window).height()/3 ){
		for (var n = 0; n < 6; n++) {
			$('#solution.show .box-container .box').eq(n).find('a').delay(n*100).animate({opacity:1}, 800);
		};
	}
	if(wScroll >= cont.eq(2).offset().top - $(window).height()/2 ){
		cont.eq(2).addClass("show");
		$('#company.show .section_head').delay(n*100).animate({opacity:1}, 300);
	}
	if(wScroll >= cont.eq(3).offset().top - $(window).height()/2 ){
		cont.eq(3).addClass("show");
		$('#about.show .section_head').delay(n*100).animate({opacity:1}, 300);
	}
});