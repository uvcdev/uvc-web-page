
<div class="sub-banner">
    <div class="img_wrap bs_bg">
        <div class="img_in"></div>
        <div class="txt_wrap">
            <h2 class="bs-01">DigitalTwin</h2>
            <h2 class="bs-02">Metaverse</h2>
            <h2 class="bs-03">EdgeDevice</h2>
            <h2 class="bs-04">SmartFactory</h2>
            <h2 class="bs-05">Education</h2>
        </div>
    </div>
    <div class="sub-tab">
        <div class="bd-xl">
            <div class="inner">
                <div class="navi">
                    <p class="h-btn"><a href="?param=index"><img src="UVC/page/homepage/img/sub/h_btn.svg" alt="home btn"/><span class="hidden">홈버튼</span></a></p>
                    <p><a href="?param=cp_info">BUSINESS</a></p>
                    <p class="now_page">
                        <span class="view_on bs-01" style=";"><a href="?param=bs01">DigitalTwin</a></span>
                        <span class="bs-02" style=";"><a href="?param=bs02">Metaverse</a></span>
                        <span class="bs-03" style=";"><a href="?param=bs03">EdgeDevice</a></span>
                        <span class="bs-04" style=";"><a href="?param=bs04">SmartFactory</a></span>
                        <span class="bs-05" style=";"><a href="?param=bs05">Education</a></span>
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

        if (document.location.href.match('bs01')) {
            $('.sub-banner h2').hide();
            $('.sub-banner .bs-01').show();

        }else if (document.location.href.match('bs02')) {
            $('.sub-banner .bs-02').show();
        }
        else if (document.location.href.match('bs03')) {
            $('.sub-banner .bs-03').show();
        }
        else if (document.location.href.match('bs04')) {
            $('.sub-banner .bs-04').show();
        }
        else if (document.location.href.match('bs05')) {
            $('.sub-banner .bs-05').show();
        }
    });
</script>