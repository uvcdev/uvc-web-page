$(document).ready(function(){

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
		$('#business.show .section_head').animate({opacity:1}, 600);
		$('#business.show .box-container').animate({opacity:1}, 800);
		$('#business.show .box-container .box').animate({opacity:1}, 1000);
	}
	if(wScroll >= cont.eq(1).offset().top - $(window).height()/2 ){
		cont.eq(1).addClass("show");
		$('#solution.show .section_head').animate({opacity:1}, 600);
		$('#solution.show .box-container').delay(1000).animate({opacity:1}, 1000);
	}
	if(wScroll >= cont.eq(1).offset().top - $(window).height()/3 ){
		for (var n = 0; n < 6; n++) {
			$('#solution.show .box-container .box').eq(n).find('div').delay(n*300).animate({opacity:1}, 800);
			$('#solution.show .box-container .box').eq(n).find('p').delay(n*300).animate({opacity:1}, 1000);
		};
	}
	if(wScroll >= cont.eq(3).offset().top - $(window).height()/2 ){
		cont.eq(3).addClass("show");
		$('#about.show .section_head').animate({opacity:1}, 600);
		$('#about.show .box-container').animate({opacity:1}, 1000);
	}
});

/*main visual*/
$('.text_wrap h3').mouseover(function(){
	$('.slide_text').css({"background":"rgba(0, 0, 0, .4)"}, 600);
	$(this).css({"opacity":"1"});
});
$('.text_wrap h3').mouseleave(function(){
	$('.slide_text').css({"background":"rgba(0, 0, 0, .1)"}, 600);
	$(this).css({"opacity":".4"});
});


/*way to come*/
$('.come').click(function(){
	$(this).toggleClass("on");
});

/**/
$('#business').particleground({
	dotColor: '#16aff0',
    lineColor: '#16aff02c'
});