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
              <li><a class="lang_on" href="?param=ser01"><i>CPS.</i></a></li>
              <!-- <li><a href="?param=ser02"><i>CPS</i><span> (CONTROL/METAVERSE/생산관리/데이터관리)</span></a></li> -->
              <li><a href="?param=ser06"><i>XR</i></a></li>
              <li><a href="?param=ser03"><i>MES</i></a></li>
              <li><a href="?param=ser04"><i>EDGE</i></a></li>
              <li><a href="?param=ser05"><i>EDUKIT</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body pb-0">
          <div class="inner">
            <div class="ser_con ser_con04 ser_con01">
              <div class="main_title">
                  <span class="wow fadeInUp">PRODUCT</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">CPS</b>
              </div>
              <div class="contents">
                <div class="con main_con txt_only con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("ser01","현실과 가상을 동기화하는 CPS");?></b>
                        <p>
                          <span><?php echo $this->utillLangController->lang("ser01","스마트팩토리 구축의 핵심은 FLEXING CPS");?>.</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="con con03 pt-0">
                  <div class="bd-lg">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_img21_2.png" alt="디지털트윈"/></div>
                  </div>
                </div>

                <div class="con con02 bg-gray">
                 <div class="bd-lg">
                  <b class="sec-title"><?php echo $this->utillLangController->lang("ser01","제품특징");?></b>
                  <div class="con_in">
                    <div class="dis-f flex-wrap row">
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <div class="txt_in h-100 bg-w">
                          <p><?php echo $this->utillLangController->lang("ser01","SaaS(서비스형 소프트웨어)로 원하는 기능만 저렴한 비용으로 도입 가능합니다");?>.</p>
                          <p><?php echo $this->utillLangController->lang("ser01","사이버 세계의 디지털 모델을 중심으로 기계 연결 > 데이터 수집 > 데이터 저장 > 처리 > 분석 > 제어까지 실제 연결을 통해 다양한 데이터와 정보를 체계적으로 처리 교환합니다.");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","MSA 구조로 손쉽고 유연한 시스템 확장 관리가 가능합니다.");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <div class="txt_in h-100 bg-w">
                          <b><?php echo $this->utillLangController->lang("ser01","그래픽 기반 모델링");?></b>
                          <p><?php echo $this->utillLangController->lang("ser01","표준 정보모델링으로 OPC UA 모델링 설계");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","실시간 Address Space 추가 변경 삭제/ NodsetXML 파일생성");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","그래픽 기반의 드래그 방식으로 손쉬운 모델링 작성 지원");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","모델링 가져오기 및 수정으로 쉬운 모델 생성 기능 제공");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-4">
                        <div class="txt_in h-100 bg-w">
                          <b>Centralized Address Space</b>
                          <p><?php echo $this->utillLangController->lang("ser01","표준 OPC UA Address Space 스펙");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","공장의 통합된 하나의 Address Space로 관리");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","공장 필드의 여러 개의 OPC UA Server를 계층적 구조로 하나로 통합");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","수평적 데이터 교환 시 외부 시스템은 중앙 Address Space만 필요");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-4">
                        <div class="txt_in h-100 bg-w">
                          <b><?php echo $this->utillLangController->lang("ser01","실시간 데이터 수집 및 데이터 분석");?></b>
                          <p><?php echo $this->utillLangController->lang("ser01","실시간 데이터 EDA 처리 및 관리");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","수집 데이터를 활용하여 다양한 알고리즘의 모델 생성 기능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","실시간 이상 감지 및 Alarm");?></p>
                          <p><?php echo $this->utillLangController->lang("ser01","판단 모델 Edge 전송 및 CPS 반영");?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="con con03">
                  <div class="bd-lg">
                    <b class="sec-title">FLEXING CPS</b>
                    <div class="img_wrap"><img src=<?php echo $this->utillLangController->lang("bs02","UVC/page/homepage/img/sub/ser_img46.png");?> alt="디지털트윈"/></div>
                  </div>
                </div>
                <div class="con">
                  <div class="bd-lg">
                    <b class="sec-title"> CPS <span>(CONTROL/METAVERSE/<?php echo $this->utillLangController->lang("ser01","생산관리/데이터관리");?>)</span></b>
                    <div class="img_wrap"><img style="width:1172px; max-width:100%; margin:0 auto;" src=<?php echo $this->utillLangController->lang("bs02","UVC/page/homepage/img/sub/ser_img20.png");?> alt="디지털트윈"/></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>
    </div>
</body>

</html>