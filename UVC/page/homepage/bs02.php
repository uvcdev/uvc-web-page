<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

	<title>UVC</title>

    <!-- FONT -->

	<!-- CSS -->
    <?php include_once $this->dir."page/homepage/include/common_css.php"; ?>
    <link rel="stylesheet" type="text/css" href="UVC/page/homepage/css/sub.css<?php echo $version;?>"/>

    <!-- SCRIPT -->
    <?php include_once $this->dir."page/homepage/include/common_js.php"; ?>

    

</head>
<body>
    <div class="wrap">        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <?php include_once $this->dir."page/homepage/include/bs-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>BUSINESS</h3>
            <ul class="dis-f">
              <li><a href="?param=bs01"><i>DigitalTwin</i></a></li>
              <li><a class="lang_on" href="?param=bs02"><i>Metaverse.</i></a></li>
              <li><a href="?param=bs03"><i>EdgeDevice</i></a></li>
              <li><a href="?param=bs04"><i>SmartFactory</i></a></li>
              <li><a href="?param=bs05"><i>Education</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body pb-0">
          <div class="inner">
            <div class="ser_con ser_con04 bs02">
              <div class="main_title">
                  <span class="wow fadeInUp">BUSINESS</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">Metaverse</b>
              </div>
              <div class="contents">
                <div class="con main_con txt_only con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("bs02","메타버스");?></b>
                        <p>
                          <span><?php echo $this->utillLangController->lang("bs02","현실 공장의 OT 기술과 가상공간의 IT 기술을 융합하여 디지털 트윈과");?></span>
                          <span><?php echo $this->utillLangController->lang("bs02","메타버스를 통해 현실의 모든 업무를 가상공장에서 처리할 수 있는");?> </span>
                          <span><?php echo $this->utillLangController->lang("bs02","제조 메타버스 서비스 플랫폼으로 메타버스 가상공장 운영");?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con bg-gray">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs02","산업 메타버스 All-In-One 솔루션");?></b>
                    <div class="img_wrap"><img src=<?php echo $this->utillLangController->lang("bs02","UVC/page/homepage/img/sub/ser_img47.png");?> alt=""/></div>
                    <!-- 아래내용은 요청에 의해 삭제 230209 -->
                    <!-- <div class="con_in">
                      <b class="sub-title-point">가상세계</b>
                      <div class="swiper pd_swipe overflow-h">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="img_wrap">
                              <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img22.png" alt=""/>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="img_wrap">
                              <img class="mb-0"  src="UVC/page/homepage/img/sub/ser_img23.png" alt=""/>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="img_wrap">
                              <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img24.png" alt=""/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="con_in">
                      <b class="sub-title-point">현실세계</b>
                      <div class="swiper pd_swipe02 overflow-h">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="img_wrap">
                              <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img25.png" alt=""/>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="img_wrap">
                              <img class="mb-0"  src="UVC/page/homepage/img/sub/ser_img26.png" alt=""/>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="img_wrap">
                              <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img27.png" alt=""/>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="img_wrap">
                              <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img28.png" alt=""/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
                <div class="con con03">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs02",'유비씨가 시장에 기여할 미션은 ＂고급 기술의 보편화＂');?></b>
                    <div class="con_in">
                      <div class="txt_wrap dot bg-gray ">
                        <div class="txt_in2">
                          <p><?php echo $this->utillLangController->lang("bs02","DT & 메타버스로 제조 엔지니어링을 지능화하고 서비스로 전환합니다.");?></p>
                          <p><?php echo $this->utillLangController->lang("bs02","OPC UA 기반의 CPS는 수많은 산업용 프로토콜에 대응하여 표준 네트워크로 연결하여 OT와 IT를 융합");?></p>
                          <p><?php echo $this->utillLangController->lang("bs02","디지털 전환을 위한 다양한 상황에 대한 검증 및 분석, 예측, 예방 등을 최소한의 위험부담으로 진행하기 위해 CPS 기반의 대규모 통합형 환경 조성");?></p>
                          <p><?php echo $this->utillLangController->lang("bs02","공장 전체의 기계, 로봇, 계기, 센서 연결하여 실시간 양방향 데이터 교환을 통해 가상공장의 기능과 제조 메타버스로 확장할 수 있는 기반 구축");?></p>
                          <p><?php echo $this->utillLangController->lang("bs02","실시간 데이터 수집, 저장으로 빅데이터 기반의 지능화 서비스 기반 제공");?></p>
                          <p><?php echo $this->utillLangController->lang("bs02","가상공장에서 장비를 제어할 수 있는 CPS 기술을 활용하여 메타버스 가상공장 환경을 구현함에 따라 실시간 모니터링 및 제어");?></p>
                        </div>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="img_wrap">
                        <img src="UVC/page/homepage/img/sub/ser_img29.png" alt=""/>
                        <img class="m_on" src="UVC/page/homepage/img/sub/ser_img30.png" alt=""/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>
    </div>
      <!-- 제품 슬라이드 -->
      <script>
      var swiper = new Swiper(".pd_swipe", {
        loop:true,
        autoplay:{
          delay: 1500,
          disableOnInteraction: false  
        },
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
            400: {
            slidesPerView:2,  //브라우저가 768보다 클 때
            spaceBetween: 10,
            },
            640: {
            slidesPerView:2,  //브라우저가 768보다 클 때
            spaceBetween: 10,
            },
            960: {
            slidesPerView:2,  //브라우저가 768보다 클 때
            spaceBetween: 30,
            },
            1024: {
            slidesPerView: 3,  //브라우저가 1024보다 클 때
            spaceBetween: 30,
            },
        },
      
      });
    </script>
    <!-- 제품 슬라이드 //-->
    <!-- 제품 슬라이드 -->
      <script>
      var swiper = new Swiper(".pd_swipe02", {
        loop:true,
        autoplay:{
          delay: 1500,
          disableOnInteraction: false  
        },
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
            400: {
            slidesPerView:2,  //브라우저가 768보다 클 때
            spaceBetween: 10,
            },
            640: {
            slidesPerView:2,  //브라우저가 768보다 클 때
            spaceBetween: 10,
            },
            960: {
            slidesPerView:2,  //브라우저가 768보다 클 때
            spaceBetween: 30,
            },
            1024: {
            slidesPerView: 3,  //브라우저가 1024보다 클 때
            spaceBetween: 30,
            },
        },
      
      });
    </script>
    <!-- 제품 슬라이드 //-->
    
</body>

</html>
