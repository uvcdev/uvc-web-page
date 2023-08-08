<div class="top_btn">
    <a href="#"><p>TOP</p></a>
</div>
<div class="youtube" onClick="window.open('https://www.youtube.com/@uvctube')">
    <div class="img_wrap"><img src="UVC/page/homepage/img/main/youtube_arrow.png" alt=""/></div>
    <div class="txt_wrap"><i style="color:#ed2123; font-weight:600;">Youtube</i> <br> <?php echo $this->utillLangController->lang("index","바로가기");?></div>
</div>


<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.top_btn').fadeIn();
        } else {
            $('.top_btn').fadeOut();
        }
    });
    
    $(".top_btn").click(function() {
        $('html, body').animate({
            scrollTop : 0
        }, 100);
        return false;
    });

</script>
