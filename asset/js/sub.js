$(document).ready(function(){
	/*헤더에 마우스 올리면 클래스 토글*/

    /*유틸메뉴 언어선택*/
    $('.lang').click(function(){
		$('.lang_util ul').slideToggle(400);
    });

    $(".main_visual > ul").slick({
      fade: true,
      dots: false,
      infinite: true,
      autoplay: false,
      arrows: true
  });
});