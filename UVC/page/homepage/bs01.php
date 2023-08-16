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
              <li><a class="lang_on" href="?param=bs01"><i>DigitalTwin.</i></a></li>
              <li><a href="?param=bs02"><i>Metaverse</i></a></li>
              <li><a href="?param=bs03"><i>EdgeDevice</i></a></li>
              <li><a href="?param=bs04"><i>SmartFactory</i></a></li>
              <li><a href="?param=bs05"><i>Education</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body pb-0">
          <div class="inner">
            <div class="ser_con ser_con04 bs01">
              <div class="main_title">
                  <span class="wow fadeInUp">BUSINESS</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">DigitalTwin</b>
              </div>
              <div class="contents">
                <div class="con main_con txt_only con01 pt-0">
                  <div class="bd-md">
                    <div class="con_in">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("bs01","디지털트윈");?></b>
                        <p>
                          <span><?php echo $this->utillLangController->lang("bs01","UVC는 아시아 최초 3개 OPC UA국제 인증 기술기업으로 IT x OT 융합");?></span>
                          <span><?php echo $this->utillLangController->lang("bs01","클라우드 SaaS로 빠르고 합리적으로 도입 가능");?></span>
                        </p>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="list_con06">
                        <ul class="dis-f justi-c">
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap">
                              <div class="top">
                                <b><?php echo $this->utillLangController->lang("bs01","자사역량");?></b>
                              </div>
                              <div class="mid">
                                <p><?php echo $this->utillLangController->lang("bs01","아시아최초 3개의 OPC UA 국제 인증");?>
                                  <span><?php echo $this->utillLangController->lang("bs01","IT x  OT 융합 원천기술 확보");?></span>
                                </p>
                                <p><?php echo $this->utillLangController->lang("bs01","기계, 로봇, 플랜트 산업 현장의 니즈와 OT의 높은 이해");?></p>
                                <p><?php echo $this->utillLangController->lang("bs01","AR/ VR/ XR 기술 확보 및 제품 라인업");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap">
                              <div class="top">
                                <b><?php echo $this->utillLangController->lang("bs01","IT x OT 융합");?></b>
                              </div>
                              <div class="mid">
                                <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_img40.png" alt="휴먼트윈 이미지"/></div>
                                <p><?php echo $this->utillLangController->lang("bs01",'기계 로봇 제어 노하우의 <i class="fc-g">지능화 AI');?></i></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap">
                              <div class="top">
                                <b>PRODUCT</b>
                              </div>
                              <div class="mid">
                                <p><?php echo $this->utillLangController->lang("bs01","설비의 운전제어");?>
                                  <span><?php echo $this->utillLangController->lang("bs01","(디지털 트윈)");?></span>
                                </p>
                                <p>
                                  <?php echo $this->utillLangController->lang("bs01","업무시스템 처리");?>
                                  <span><?php echo $this->utillLangController->lang("bs01","(시스템트윈)");?></span>
                                </p>
                                <p><?php echo $this->utillLangController->lang("bs01","협업(회의, 교육, 미팅)");?>
                                  <span>(<?php echo $this->utillLangController->lang("bs01","휴먼 트윈");?>)</span>
                                </p>
                                <p><?php echo $this->utillLangController->lang("bs01","플랫폼화로 저렴하게 서비스 제공");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con con02  bg-gray">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs01","FLEXING CPS의 경쟁성");?></b>
                    <div class="con_in">
                      <div class="list_con">
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-4 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap "><img src="UVC/page/homepage/img/main/icon07.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs01","데이터 통합과 상호연동");?></b>
                                <p><?php echo $this->utillLangController->lang("bs01","다양한 메이커 로봇, 설비 혼재 등으로 데이터 통합과 상호연동 문제 해결");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap "><img src="UVC/page/homepage/img/main/icon08.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs01","비용 감소");?></b>
                                <p><?php echo $this->utillLangController->lang("bs01","과다한 스마트팩토리 구축 비용에 대한 부담이 감소");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap "><img src="UVC/page/homepage/img/main/icon09.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs01","전문 기술 보유");?></b>
                                <p><?php echo $this->utillLangController->lang("bs01","불확실성과 전문성 부족으로 인한 도입 의사결정 문제 해결");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="con_in con_in02">
                      <div class="txt_wrap bg-w">
                        <p><?php echo $this->utillLangController->lang("bs01","기계/ 로봇을 연결하여 디지털트윈을 쉽고 빠르게 만드는 플랫폼");?></p>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="dis-f flex-wrap row">
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <b class="sub-title-point">FLEXING CPS Basic Service</b>
                          <div class="txt_in bg-w">
                            <p><?php echo $this->utillLangController->lang("bs01","플러그인 플레이 방식의 손쉬운 연결을 지원하는 FLEXING EDGE");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","수집된 데이터를 체계적으로 관리하고 자유로운 커스텀이 가능한 대시보드와 그래픽 기반 모델링을 지원하는 FLEXING CONNECT");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","데이터를 분석하고 실시간 이상 감지를 지원하는 FLEXING INSIGHT");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","FLEXING CPS를 손쉽게 설정하고 플러그인 시스템을 통한 확장 관리를 위한 FLEXING PORTAL");?></p>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <b class="sub-title-point">FLEXING CPS Plug-In Service</b>
                          <div class="txt_in bg-w">
                            <p><?php echo $this->utillLangController->lang("bs01","설비를 제어하고 비즈니스 프로세스 자동화 지원 및 web 기반의  HMI를 제공하는 FLEXING CONTROL");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","사용자가 원하는 가상공간을 만들어 자유로운 협업을 할 수 있고 수집된 데이터를 통한 3D 대시보드를 제공하는 FLEXING METAVERSE");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","공정 데이터를 활용한 설비 관리, 생산 관리가 가능한 FLEXING 생산 관리");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","수집된 데이터의 공유 및 판매 서비스를 제공하는 FLEXING DATA MARKET");?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con con03">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs01","유비씨 FLEXING 플랫폼을 적용한 Digital Twin 산업분야");?></b>
                    <div class="con_in">
                      <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs01","제조산업");?></b>
                      <div class="dis-f flex-wrap row">
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs01","H사 메타버스 가상공장");?></b>
                            <p><?php echo $this->utillLangController->lang("bs01","공장 건물, 설비, 라인에 대한 통합 관리");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","다양한 FLEXING 플랫폼과 연계를 통한 제어, 실시간 모니터링");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","생산설비 및 창고관리, 생산장비 조건 변경 등 시뮬레이션 결과 산출");?></p>
                          </div>
                        </div>
                        <div class="txt_wrap dot  col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs01","H사 산업용 로봇 실시간 제어");?></b>
                            <p><?php echo $this->utillLangController->lang("bs01","실물 로봇 센싱 데이터 시차 10m/s 이내");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","실물 로봇 위치 데이터 오차 5mm 이내");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","중앙 집중식 로봇 데이터 관리");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","이기종 로봇의 OPC UA 기반 표준화 연계");?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="con_in">
                      <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs01","에너지/ 플랜트");?></b>
                      <div class="dis-f flex-wrap row">
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs01","K사 Full 3D 디지털 트윈");?></b>
                            <p><?php echo $this->utillLangController->lang("bs01","각종 플랜트, 설비 및 IoT 기기와 실시간 연계를 통함 모니터링");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","대형 플랜트에 대한 3D 종합 시각화");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","시공간 정보 제공 및 현장 안전관리");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","플랜트 운영 시물레이션 및 가시화");?></p>
                          </div>
                        </div>
                        <div class="txt_wrap dot  col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs01","G사 5G 기반 디지털 트윈");?></b>
                            <p><?php echo $this->utillLangController->lang("bs01","5G 기반 원격검침시스템 디지털 트윈 Web 시각화");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","IIoT와 GIS의 연계를 통한 디지털 트윈 기반의 실시간 운영, 유지보수 체계 및 정보 관리");?></p>
                            <p><?php echo $this->utillLangController->lang("bs01","FLEXING 플랫폼과 레거시 시스템의 통합 및 연동지원");?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="con_in">
                      <b class="sub-title-point">Cloud SaaS</b>
                      <div class="dis-f flex-wrap row">
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs01","모니터링/ 제어/ 데이터분석");?></b>
                            <img class="" src="UVC/page/homepage/img/sub/ser_img44.png" alt=""/>
                          </div>
                        </div>
                        <div class="txt_wrap dot  col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs01","OPC UA 웹 모델러/ 프로파일 메이커");?></b>
                            <img class="" src="UVC/page/homepage/img/sub/ser_img45.png" alt=""/>
                          </div>
                        </div>
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