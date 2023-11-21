<script>
    var data = <?php echo $this->data; ?>;
    var no_image = "<?php echo $this->no_image; ?>";
    var upload_path = "<?php echo $this->upload_path; ?>";
</script>

<script type="text/javascript" src="UVC/page/homepage/js/jquery-3.3.1.min.js<?php echo $version;?>"></script>
<script defer type="text/javascript" src="UVC/page/homepage/js/jquery.transit.min.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/lib/swiper/swiper.min.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/lib/fullpage/jquery.fullpage.min.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/lib/slick/slick.min.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/lib/wow/custom_wow.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/lib/wow/wow.min.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/page/homepage/js/lb.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/page/homepage/js/gu.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/page/homepage/js/lang.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/page/homepage/js/tab.js<?php echo $version;?>"></script>
<script type="text/javascript" src="UVC/page/homepage/js/header.js<?php echo $version;?>"></script>

<!-- Mirae Script Ver 2.0 -->
<script async="true" src="//log1.toup.net/mirae_log_chat_common.js?adkey=srzcn" charset="UTF-8"></script>
<!-- Mirae Script END Ver 2.0 -->

<!-- WOW -->
<script>
	new WOW().init();
</script>

<!-- 서브탭 스크립트 -->
<script>
    $(document).ready(function(){
        var i=0;
        $('.mobile-con-tab').click(function(){
            if(i==0){
                $('.mobile-con-tab li span').css({
                    transform:'rotateZ(180deg)'
                });
                
                $('.mobile-con-sub-tab').stop().animate({
                    height:'250px'
                });
                i++;
            }else if(i==1){
                $('.mobile-con-tab li span').css({
                    transform:'rotateZ(0)'
                });
                $('.mobile-con-sub-tab').stop().animate({
                    height:'0'
                });
                i=0;
            }
        });
        // 햄버거 베뉴 애니메이션



        $('.dropdown_01').click(function(){
            if($('.dropdown_menu_01').css('display') == "block"){
                $('.dropdown_menu_01').stop().slideUp();
                $('.common_tab_banner .dropdown_01 a>span').css({
                    background:'url(YONGMA02/page/homepage/img/sub/plus_btn.png)no-repeat'

                });
                
            }else{
                $('.dropdown_menu_01').stop().slideDown();
                $('.common_tab_banner .dropdown_01 a>span').css({
                    background:'url(YONGMA02/page/homepage/img/sub/plus_btn4.png)no-repeat'

                });
                

            }
            $('.dropdown_menu_02').stop().slideUp();
            $('.common_tab_banner .dropdown_02 a>span').css({
                    background:'url(YONGMA02/page/homepage/img/sub/plus_btn.png)no-repeat'

                });
        });

        $('.dropdown_02').click(function(){
            if($('.dropdown_menu_02').css('display') == "block"){
                $('.dropdown_menu_02').stop().slideUp();
                $('.common_tab_banner .dropdown_02 a>span').css({
                    background:'url(YONGMA02/page/homepage/img/sub/plus_btn.png)no-repeat'

                });
                
            }else{
                $('.dropdown_menu_02').stop().slideDown();
                $('.common_tab_banner .dropdown_02 a>span').css({
                    background:'url(YONGMA02/page/homepage/img/sub/plus_btn4.png)no-repeat'

                });
                
            }
            $('.dropdown_menu_01').stop().slideUp();
            $('.common_tab_banner .dropdown_01 a>span').css({
                    background:'url(YONGMA02/page/homepage/img/sub/plus_btn.png)no-repeat'

                });
            
        });
        
        // 서브탭 메뉴 

       
    });//end
</script>

