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
        <?php include_once $this->dir."page/homepage/include/ser-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>PRODUCT</h3>
            <ul class="dis-f">
              <li><a href="?param=ser01"><i>CPS</i></a></li>
              <li><a class="lang_on" href="?param=ser06"><i>XR.</i></a></li>
              <li><a  href="?param=ser03"><i>MES</i></a></li>
              <li><a href="?param=ser04"><i>EDGE</i></a></li>
              <li><a href="?param=ser05"><i>EDUKIT</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body pb-0">
          <div class="inner">
            <div class="ser_con ser_con04 ser_con03">
              <div class="main_title">
                  <span class="wow fadeInUp">PRODUCT</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">XR</b>
              </div>
              <div class="contents">
                <div class="con main_con txt_only con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("ser06","확장현실");?> </b>
                        <p>
                          <span><?php echo $this->utillLangController->lang("ser06","실시간으로 양방향 통신이 가능한 CPS와 가상공장의 연결로");?> </span>
                          <span><?php echo $this->utillLangController->lang("ser06","현실공장의 상황을 가상공장에서 모니터링하고 제어할 수 있는 실시간 가상공장 구축");?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con bg-gray">
                 <div class="bd-lg">
                  <b class="sec-title"><?php echo $this->utillLangController->lang("ser04","제품특징");?></b>
                  <div class="con_in">
                    <div class="dis-f flex-wrap row">
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","콘텐츠 소개");?></b>
                        <div class="txt_in bg-w">
                          <!-- <p>제조업에서의 제품설계 도면을 VR/AR/MR로 렌더링 가상화하여 원격지의 다수의 참여자들과 동시에 설계에 참여할 수 있는 제조 XR 협업 시스템</p> -->
                          <p><?php echo $this->utillLangController->lang("ser06","디지털트윈을 통한 공장의 기계, 로봇 등을 가상공장에서 실시간 데이터를 연동");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","EdgeDivice로 다양한 이기종의 프로토콜을 국제 표준 OPC UA로 구축함으로써 향후 확장 및 외부 시스템 연동에도 표준으로 쉽게 구축");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","설계도면 파일로부터 CAD 컨버터로부터 3D 에셋으로 변환하거나 RIDAR를 통해 3D 모델을 생성하는 방식으로 가상공장 구축");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","3D 모델링을 통한 현실공장과 동일한 형태의 가상공장을 모니터링 직관적 관제 가능");?> </p>
                          <p><?php echo $this->utillLangController->lang("ser06","WebRTC를 통해 여러명의 사용자가 스트림을 통해 음성, 영상을 동기화하여 회의 할 수 있는 협업 시스템");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","다양한 참여자가 시간 및 공간적 제약에 구애받지 않고 참여");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","적용기술");?></b>
                        <div class="txt_in bg-w">
                          <p><?php echo $this->utillLangController->lang("ser06","국제 표준 프로토콜 OPC UA 를 적용한 CPS 데이터 교환 및 배포");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","5G 통신을 바탕으로 고대역폭 저지연 환경에서의 WebRTC를 이용한 원격 실시간 스트리밍");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","CAD 정보의 3D 데이터 변환 및 BOM 데이터 추출/적용");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","실제 공장 데이터의 디지털 트윈을 통한 VR 메타버스 환경 구축");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","설계로부터 유지보수까지 제품의 전 수명주기에 걸친 협업 기능 제공 및 데이터 스토리지");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","MS HoloLens2 AR을 통한 AR교육 훈련");?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="con_in">
                    <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","실제 사용 사례");?></b>
                    <div class="swiper pd_swipe overflow-h" style="height:20%">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <div class="img_wrap">
                            <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img53.png" alt="디지털트윈"/>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="img_wrap">
                            <img class="mb-0"  src="UVC/page/homepage/img/sub/ser_img54.png" alt="디지털트윈"/>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="img_wrap">
                            <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img55.png" alt="디지털트윈"/>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="img_wrap">
                            <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img56.png" alt="디지털트윈"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>

                <div class="con ">
                 <div class="bd-lg">
                  <b class="sec-title"><?php echo $this->utillLangController->lang("ser06","XR 특장점");?></b>
                  <div class="con_in">
                    <div class="dis-f flex-wrap row">
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","국내/외 설비의 통합 관제");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser06","국내 및 해외 설비를 원격으로 제어하고 데이터 분석 및 실시간 모니터링으로 대응력 향상");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","생산 효율 향상");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser06","분석모델을 통해 데이터 변화와 패턴을 검출하여 이상을 예측하고 셧다운을 방지함으로써 유지보수 비용 절감");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-3">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","설비 운영 효율성 강화");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser06","설비 데이터 기반의 직관적인 문제 진단으로 설비의 다운타임 최소화");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-3">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","현장 작업자 수준 향상");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser06","실제 환경과 매우 유사한 가상 현실 제공");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","XR 실감 교육으로 교육 효율 향상");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","단기간 내 교육 가능");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-3">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","AI 분석");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser06","시계열 데이터 기반의 AI데이터셋으로 분석 마법사를 통한 AI분석모델 제공");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-3">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","시뮬레이션 기반 인사이트");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser06","가상공간에서 사전 배치");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","가상공간에서 공정 테스트");?></p>
                          <p><?php echo $this->utillLangController->lang("ser06","시간과 비용 절감");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-3">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser06","경쟁력 향상");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser06","원격자 사업장의 현황을 디지털 트윈과 XR로 확인하여 빠른 의사결정 및 관리 비용 절감");?></p>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

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

</body>

</html>