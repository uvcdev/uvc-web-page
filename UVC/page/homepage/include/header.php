<header id="header" class="header ">
    <div class="">
        <nav class="main_nav">
            <h1 class="logo"><a href="?param=index" title="디지털트윈">UVC</a></h1>
            <!-- 언어 선택 메뉴 -->
              <div class="language">
                <ul id="current_lang">
                    <li onclick="lang_change(1);"><a class="lang_on">KOR</a></li><!-- 현재 클릭된 언어에 .lang_on클래스 추가 -->
                    <li onclick="lang_change(2);"><a>ENG</a></li>
                </ul>
            </div>
            <!-- 언어 선택 메뉴 //-->
            <!-- PC 메뉴 -->
            <div class="nav_inner cf">
                <div class="header_bg"></div>
                <ul class="gnb" id="gnb">
                    <li>
                        <a href="?param=bs01" data-page="bs">BUSINESS<span></span></a>
                        <div class="sub_deph">
                            <ul>
                                <li><a href="?param=bs01">DigitalTwin</a></li> 
                                <li><a href="?param=bs02">Metaverse</a></li> 
                                <li><a href="?param=bs03">EdgeDevice</a></li> 
                                <li><a href="?param=bs04">SmartFactory</a></li> 
                                <li><a href="?param=bs05">Education</a></li> 
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="?param=ser01"  data-page="ser">PRODUCT<span></span></a>
                        <div class="sub_deph">
                            <ul>
                                <li><a href="?param=ser01">CPS</a></li>
                                <!-- <li><a href="?param=ser02">CPS Plugin Service</a></li> -->
                                <li><a href="?param=ser06">XR</a></li>
                                <li><a href="?param=ser03">MES</a></li>
                                <li><a href="?param=ser04">EDGE</a></li>
                                <li><a href="?param=ser05">EDUKIT</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="?param=ref"  data-page="ref">REFERENCE<span></span></a>
                        <div class="sub_deph">
                            <ul>
                                <li><a href="?param=ref">REFERENCE</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="?param=cp_info"  data-page="cp">COMPANY<span></span></a>
                        <div class="sub_deph">
                            <ul>
                                <li><a href="?param=cp_info">About Us</a></li>
                                <li><a href="?param=cp_story">Story</a></li>
                                <li><a href="?param=cp_news">News</a></li>
                                <li><a href="?param=cp_location">Contact</a></li>
                            </ul>
                        </div>
                    </li>
                    <!--<li>
                        <a href="" >Recruit<span></span></a>
                        <div class="sub_deph">
                            <ul>
                                <li><a target="_blank" href="https://uvc.notion.site/515236a82ef94485a17feb5a6f348ab4">We're Hiring<img src="UVC/page/homepage/img/sub/link.svg" alt="link svg"/></a></li>
                                <li><a target="_blank" href="https://uvc.notion.site/03bf15b41bae4207822eb07ab1a43426">Our Welfare <img src="UVC/page/homepage/img/sub/link.svg" alt="link svg"/></a></li>
                            </ul>
                        </div>
                    </li>-->
                </ul>
            </div>
            <!-- PC 메뉴 //  -->
            <!-- 헤더 contact us -->
            <div class="h_contact">
               <!-- <p>C/S CENTER</p>  -->
                <img src="UVC/page/homepage/img/main/icon01.png" alt="디지털트윈 상담 아이콘"/>
                <div>
                    <span><?php echo $this->utillLangController->lang("ser06","제품 및 견적 문의");?></span>
                    <a href="tel:031.346.3366"><?php echo $this->utillLangController->lang("location","031.346.3366");?></a>
                    <a href="mailto:sales@uvc.co.kr">sales@uvc.co.kr</a>
                </div>

            </div>

           <!-- 헤더 contact us //-->
            <!-- 모바일 메뉴 버튼 -->
            <div class="mo_btn">
                <div class="menu">
                    <span class="menu-global menu-top"></span>
                    <span class="menu-global menu-middle"></span>
                    <span class="menu-global menu-bottom"></span>
                </div>
            </div>
              <!-- 모바일 메뉴 버튼 // -->
        </nav>
    </div>
        
        
</header>

<script>
    $(document).ready(function(){
        var Menu = {
        
        el: {
            ham: $('.menu'),
            menuTop: $('.menu-top'),
            menuMiddle: $('.menu-middle'),
            menuBottom: $('.menu-bottom')
        },
        
        init: function() {
            Menu.bindUIactions();
        },
        
        bindUIactions: function() {
            Menu.el.ham
                .on(
                'click',
                function(event) {
                Menu.activateMenu(event);
                event.preventDefault();
            }
            );
        },
        
        activateMenu: function() {
            Menu.el.menuTop.toggleClass('menu-top-click');
            Menu.el.menuMiddle.toggleClass('menu-middle-click');
            Menu.el.menuBottom.toggleClass('menu-bottom-click'); 
        }
        };

        Menu.init();

        //햄버거 메뉴 슬라이드 이벤트 시작
        var flag=0;
        $('.mo_btn .menu').click(function(){
            if(flag==0){
                $('.header .nav_inner').stop().transition({
                    transform:'translateX(0%)'
                  
                });
                flag++;
            }else if(flag==1){
                $('.header .nav_inner').stop().transition({
                    transform:'translateX(150%)'
                    
                });
                flag=0;
            }
        });

        //모바일 메뉴 클릭 이벤트
        var gnb = document.querySelector('#gnb');
        //모바일 메뉴 리스트
        var li = $('#gnb>li');
        for(var i = 0; i < $(li).length; i++){
            function closer(index){
                //gnb 하위의 li 클릭시 이벤트 발생
                $(li[index]).click(function(){
                    //현재 li의 하위메뉴가 block이면 현재 li slideUp
                    if($(li[index]).children('.sub_deph').css('display') == "block"){
                        $(li[index]).children('.sub_deph').stop().slideUp();
                    }else{
                        //현재 li의 하위메뉴가 none이면 현재 li slideDown, 나머지 li slideUp
                        for(var j = 0; j < $(li).length; j++){
                        $(li[j]).children('.sub_deph').stop().slideUp();
                    }
                        $(li[index]).children('.sub_deph').stop().slideDown();
                    }
                });
            }
            closer(i);
        }

       
        
        //햄버거 메뉴 슬라이드 이벤트 끝


        
        $(window).scroll(function() {
	        var scroll = $(window).scrollTop();
	        if (scroll >= 50) {
                $(".header").addClass("h_event");
                $(".wrap .header .logo").addClass("h_event4");
                $(".header .nav_inner>ul>li>a").addClass("h_event3");
                $(".header .language ul li a").addClass("h_event3");
                $(".menu-global").addClass("h_event6");
                
	        } else {
                $(".header").removeClass("h_event");
                $(".wrap .header .logo").removeClass("h_event4");
                $(".header .nav_inner>ul>li>a").removeClass("h_event3");
                $(".header .language ul li a").removeClass("h_event3");
                $(".menu-global").removeClass("h_event6");

	        }
        });


    });//end


</script>
