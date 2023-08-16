
<div class="sub-banner">
    <div class="img_wrap ser_bg">
        <div class="img_in"></div>
        <div class="txt_wrap">
            <h2 class="ser-01">CPS</h2>
            <h2 class="ser-02">CPS</h2>
            <h2 class="ser-03">MES</h2>
            <h2 class="ser-04">EDGE</h2>
            <h2 class="ser-05">EDUKIT</h2>
        </div>
    </div>
    <div class="sub-tab">
        <div class="bd-xl">
            <div class="inner">
                <div class="navi">
                    <p class="h-btn"><a href="?param=index"><img src="UVC/page/homepage/img/sub/h_btn.svg" alt="home btn"/><span class="hidden">HOME</span></a></p>
                    <p><a href="?param=ser01">FLEXING</a></p>
                    <p class="now_page">
                        <span class="view_on ser-01" style=";"><a href="?param=ser01">CPS</a></span>
                        <span class="ser-02" style=";"><a href="?param=ser02">CPS</a></span>
                        <span class="ser-03" style=";"><a href="?param=ser03">MES</a></span>
                        <span class="ser-04" style=";"><a href="?param=ser04">EDGE</a></span>
                        <span class="ser-05" style=";"><a href="?param=ser05">EDUKIT</a></span>
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

        if (document.location.href.match('ser01')) {
            $('.sub-banner h2').hide();
            $('.sub-banner .ser-01').show();

        }else if (document.location.href.match('ser02')) {
            $('.sub-banner .ser-02').show();
        }
        else if (document.location.href.match('ser03')) {
            $('.sub-banner .ser-03').show();
        }
        else if (document.location.href.match('ser04')) {
            $('.sub-banner .ser-04').show();
        }
        else if (document.location.href.match('ser05')) {
            $('.sub-banner .ser-05').show();
        }
    });
</script>
