let visible = false;

const mb = '1181';

function resizeHandler() {
	const size = document.body.getBoundingClientRect().width	
	if(size < mb) {
		$('.gnb').css({'display': 'none'})
	} else {
		$('.gnb').css({'display': 'flex'})
	}
}

window.addEventListener('resize', resizeHandler)

$('#header').mouseenter(function(){
	if(window.innerWidth > 1180) {
		$(this).addClass("on");
		$('h1 a img.color').addClass("active");
	}
});
$('#header').mouseleave(function(){
	if(window.innerWidth > 1180) {
		$(this).removeClass("on");
		$('h1 a img.color').removeClass("active");
	}
});

var navLi = $('#header .headerWrap .inner #nav .gnb > li a span');
$(navLi).mouseenter(function(){
	$(this).addClass("active");
	$('#header').addClass('on');
})
$(navLi).mouseleave(function(){
	$(this).removeClass("active");
})

$('.gnb > .sol').mouseenter(function(){
	if(window.innerWidth > 1180){
		$('.nav_dim').css({"height":"68px", "visibility":"visible", "opacity":"1"});
		$('.gnb > .sol > ul').css({"visibility":"visible", "opacity":"1"});
		$(this).addClass("active");
	}
});
$('.gnb > .sol').mouseleave(function(){
	if(window.innerWidth > 1180){
		$('.nav_dim').css({"height":"0", "visibility":"hidden", "opacity":"0"});
		$('.gnb > .sol > ul').css({"visibility":"hidden", "opacity":"0"});
		$(this).removeClass("active");
	}
});

$('.gnb > .com').mouseenter(function(){
	if(window.innerWidth > 1180){
		$('.nav_dim').css({"height":"68px", "visibility":"visible", "opacity":"1"});
		$('.gnb > .com > ul').css({"visibility":"visible", "opacity":"1"});
		$(this).addClass("active");
	}
});
$('.gnb > .com').mouseleave(function(){
	if(window.innerWidth > 1180){
		$('.nav_dim').css({"height":"0", "visibility":"hidden", "opacity":"0"});
		$('.gnb > .com > ul').css({"visibility":"hidden", "opacity":"0"});
		$(this).removeClass("active");
	}
});


/*유틸메뉴 언어선택*/
$('.lang').click(function(){
	$('.lang_util ul').slideToggle(400);
});

/*전체메뉴*/
$('.mNav').click(function(){
	const mNav = $(this);
	const isOn = mNav.attr('name')
	if (isOn === 'on') {
		$('.gnb').slideUp(400);
		$(this).toggleClass("on");
		mNav.attr('name', 'off')
	} else { 
		$('.gnb').slideDown(400);
		$(this).toggleClass("on");
		mNav.attr('name', 'on')
	}
	$('.gnb > li').click(function(){
		$('.gnb').slideUp(400)
		mNav.attr('name', 'off')
		$('.mNav').removeClass("on");
	});
});