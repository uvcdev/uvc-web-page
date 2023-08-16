
<div class="sub-banner">
    <div class="img_wrap cp_bg">
        <div class="img_in"></div>
        <div class="txt_wrap">
            <h2 class="cp-info">About Us</h2>
            <h2 class="cp-story">Story</h2>
            <h2 class="cp-news">News</h2>
            <h2 class="cp-location"><?php echo $this->utillLangController->lang("location","오시는길");?></h2>
        </div>
    </div>
    <div class="sub-tab">
        <div class="bd-xl">
            <div class="inner">
                <div class="navi">
                    <p class="h-btn"><a href="?param=index"><img src="UVC/page/homepage/img/sub/h_btn.svg" alt="home btn"/><span class="hidden">Home</span></a></p>
                    <p><a href="?param=cp_info">COMPANY</a></p>
                    <p class="now_page">
                        <span class="view_on cp-info" style=";"><a href="?param=cp_info">About Us</a></span>
                        <span class="cp-story" style=";"><a href="?param=cp_story">Story</a></span>
                        <span class="cp-news" style=";"><a href="?param=cp_news">News</a></span>
                        <span class="cp-location" style=";"><a href="?param=cp_location">Contact</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // 현재 보여지는 페이지 네비게이션에 on 클래스 추가 이벤트
    $(document).ready(function(){
        $('.sub-banner .sub-tab .navi p.now_page span').hide();
        $('.sub-banner h2').hide();

        if (document.location.href.match('cp_info')) {
            $('.sub-banner h2').hide();
            $('.sub-banner .cp-info').show();

        }else if (document.location.href.match('cp_story')) {
            $('.sub-banner .cp-story').show();
        }
        else if (document.location.href.match('cp_news')) {
            $('.sub-banner .cp-news').show();
        }
        else if (document.location.href.match('cp_location')) {
            $('.sub-banner .cp-location').show();
        }
    });
</script>