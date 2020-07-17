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

	$(".con_slide").slick({
		dots: false,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 4500,
		arrows: true,
		slidesToShow: 3,
		centerMode: true,
		auseOnHover: true,
		responsive: [
			{
			  breakpoint: 1600,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			  }
			},
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
				}
			},
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
	});
});

/*main visual*/
$('.text_wrap h3').mouseover(function(){
	$('.slide_text').css({"background":"rgba(0, 0, 0, .6)"}, 600);
	$(this).css({"opacity":"1"});
});
$('.text_wrap h3').mouseleave(function(){
	$('.slide_text').css({"background":"rgba(0, 0, 0, .3)"}, 600);
	$(this).css({"opacity":".4"});
});


/*way to come*/
$('.come').click(function(){
	$(this).toggleClass("on");
});