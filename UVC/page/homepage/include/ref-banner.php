
<div class="sub-banner">
    <div class="img_wrap ser_bg">
        <div class="img_in"></div>
        <div class="txt_wrap">
            <h2 class="ref-01">REFERENCE</h2>
        </div>
    </div>
    <div class="sub-tab">
        <div class="bd-xl">
            <div class="inner">
                <div class="navi">
                    <p class="h-btn"><a href="?param=index"><img src="UVC/page/homepage/img/sub/h_btn.svg" alt="home btn"/><span class="hidden">HOME</span></a></p>
                    <p><a href="?param=ref">REFERENCE</a></p>
                    <p class="now_page">
                        <span class="view_on ref-01" style=";"><a href="?param=ref">REFERENCE</a></span>
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

        if (document.location.href.match('ref')) {
            $('.sub-banner h2').hide();
            $('.sub-banner .ref-01').show();

        }
    });
</script>