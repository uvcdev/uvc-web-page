$(document).ready(function(){

	//메인비주얼
	$('#mainVisual .mainvisual_txt').animate( { marginLeft : 0, opacity:1 }, 800 );
	$('#mainVisual .slide-controls').delay(400).animate( { marginLeft : 0, opacity:1 }, 800 );

	
	$(window).resize(function(){
		var winW = $(window).width();
			winH = $(window).height();
			headerH = $('#header').height();

		if (winW < 1025){
			$('#mainVisual .VideoArea').height(winH);
		} else {
			$('#mainVisual .VideoArea').height(1000);
		}
	}).resize();

	var slideWrapper = $(".mainSlide");
		slideControls   = $('#mainVisual .slide-controls');

	var ImagePauses = [15000, 10000, 10000, 10000, 10000];
	slideWrapper.slick({
		fade: true,
		dots: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed:ImagePauses[0],
		arrows: false,
		pauseOnFocus: false,
		pauseOnHover: false,
        appendDots: slideControls,
		customPaging: function(slider,i) {
			var title = $(slider.$slides[i]).attr('data-title');
			return '<a class="pager__item"> '+title+' </a>';
		}
	});

	// Sliding settings
	slideWrapper.on('afterChange', function(event, slick, currentSlide) {
		// Update autoplay speed according to slide index
		slideWrapper.slick('slickSetOption', 'autoplaySpeed', ImagePauses[currentSlide], true);
	  });

	// When the slide is changing
	function playPauseVideo(slick, control){
		var currentSlide, video;
		currentSlide = slick.find(".slick-current");
		video = currentSlide.find("video")[0];
		if (video != null) {
		  if (control === "play"){
			video.play();
		  } else {
			video.pause();
		  }
		}
	}

	slideWrapper.on("init", function(slick){
		slick = $(slick.currentTarget);
		setTimeout(function(){
		  playPauseVideo(slick,"play");
		}, 1000);
	});
	slideWrapper.on("beforeChange", function(event, slick) {
		slick = $(slick.$slider);
		playPauseVideo(slick,"pause");
	});
	slideWrapper.on("afterChange", function(event, slick) {
		slick = $(slick.$slider);
		playPauseVideo(slick,"play");
	});


	//사업분야
	$('#business .factory_slide').slick({
		fade: true,
		dots: true,
		infinite: true,
		autoplay: false,
		//autoplaySpeed:10000,
		arrows: false,
        appendDots: $('#business .business_factory .slide-controls'),
		customPaging: function(slider,i) {
			var title = $(slider.$slides[i]).find('.TxtArea strong').text();
			return '<a class="pager__item"> '+title+' </a>';
		}
	});
	$('#business .life_slide').slick({
		fade: true,
		dots: true,
		infinite: true,
		autoplay: false,
		//autoplaySpeed:10000,
		arrows: false,
        appendDots: $('#business .business_life .slide-controls'),
		customPaging: function(slider,i) {
			var title = $(slider.$slides[i]).find('.TxtArea strong').text();
			return '<a class="pager__item"> '+title+' </a>';
		}
	});

	
	$(window).on('load resize scroll',function(){
		for (var n = 0; n < 6; n++) {
			$('#solution.active .box-container li').eq(n).find('a').delay(n*100).animate({opacity:1}, 300);
		}
	})
})