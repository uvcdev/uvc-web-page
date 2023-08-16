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
              <li><a href="?param=ser06"><i>XR</i></a></li>
              <li><a class="lang_on" href="?param=ser03"><i>MES.</i></a></li>
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
                  <b class="wow fadeInUp" data-wow-delay="0.3s">MES</b>
                  <i><?php echo $this->utillLangController->lang("ser03","생산관리시스템");?></i>
              </div>
              <div class="contents">

              <div class="con main_con con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in dis-f">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("ser03","전체 생산공정의 실시간 관리를 위한 <br> 스마트 팩토리 핵심 솔루션");?></b>
                        <p><?php echo $this->utillLangController->lang("ser03","실시간 생산 데이터를 공유하여 생산효율을 최적화하였습니다.");?></p>
                      </div>
                      <div class="img_wrap">
                        <div class="swiper mySwiper">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                              <img src="UVC/page/homepage/img/sub/ser_img50.png" alt=""/>
                            </div>
                            <div class="swiper-slide">
                              <img src="UVC/page/homepage/img/sub/ser_img51.png" alt=""/>
                            </div>
                            <div class="swiper-slide">
                              <img src="UVC/page/homepage/img/sub/ser_img52.png" alt=""/>
                            </div>
                          </div>
                          <div class="swiper-pagination"></div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <div class="con con03 bg-gray">
                  <div class="bd-lg">
                  <!-- <div class="center"><img src="UVC/page/homepage/img/sub/ser_img19.png" alt=""/></div> -->
                    <div class="list_con03">
                      <ul class="row-wide dis-f justi-c list_con03_01 wow fadeInUp">
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon16.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","원자재");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon17.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","수입검사");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon18.png" alt=""/></div>
                            <p><i class="fc-g"><?php echo $this->utillLangController->lang("ser03","자재 현황 / 입출고");?></i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon19.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","생산계획");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon20.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","작업지시");?></p>
                          </div>
                        </li>
                      </ul>
                      <ul class="row-wide dis-f flex-revers-row justi-c list_con03_02 wow fadeInUp" data-wow-delay="0.3s">
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon21.png" alt=""/></div>
                            <p><i class="fc-g">POP</i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon22.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","공정 이동 및 진행");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon23.png" alt=""/></div>
                            <p><i class="fc-g">POP</i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon17.png" alt=""/></div>
                            <p><i class="fc-g"><?php echo $this->utillLangController->lang("ser03","품질검사");?></i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon24.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","출하");?></p>
                          </div>
                        </li>
                      </ul>

                      <ul class="row-wide dis-f flex-revers-row justi-c  list_con03_01 list_con03_02_02 wow fadeInUp" data-wow-delay="0.3s">
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon16.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","원자재");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon17.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","수입검사");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon18.png" alt=""/></div>
                            <p><i class="fc-g"><?php echo $this->utillLangController->lang("ser03","자재 현황 / 입출고");?></i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon19.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","생산계획");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon20.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","작업지시");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon21.png" alt=""/></div>
                            <p><i class="fc-g">POP</i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon22.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","공정 이동 및 진행");?></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon23.png" alt=""/></div>
                            <p><i class="fc-g">POP</i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon17.png" alt=""/></div>
                            <p><i class="fc-g"><?php echo $this->utillLangController->lang("ser03","품질검사");?></i></p>
                          </div>
                        </li>
                        <li class="col">
                          <div class="con_wrap">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon24.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("ser03","출하");?></p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>

                <div class="con ">
                 <div class="bd-lg">
                  <b class="sec-title"><?php echo $this->utillLangController->lang("ser01","제품특징");?></b>
                  <div class="con_in">
                    <div class="dis-f flex-wrap row">
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser03","통합관리");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser03","제품 주문에 의한 착수에서 완성품의 품질검사까지 전 생산 활동을 관리");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","생산 실적, 작업자 활동, 설비가동, 제품 품질 정보 등 다양한 현장 정보를 실시간으로 수집");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","수집된 데이터의 집계/분석/모니터링을 통한 생산공정 제어 지원");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser03","이력관리");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser03","바코드 등을 활용한 자재 입출고 관리로 원/부자재 수불 명확화");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","생산 계획부터 작업지시, 공정관리, 생산실적 등록 등을 관리 단위별 처리");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","생산 이력정보를 활용한 공정 트래킹으로 불량생산 방지 및 수율 향상");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","유무선 스캐너, PDA 등을 이용한 완제품 입출고 자동화");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","POP로 제공되는 실시간 현장정보로 작업자와 관리자의 빠른 의사결정 지원");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot col-md-6 col-xs-12 mt-3">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser03","시스템 확장");?></b>
                        <div class="txt_in bg-gray">
                          <p><?php echo $this->utillLangController->lang("ser03","PC, 태블릿, 스마트폰 등 다양한 멀티 디바이스 활용 지원");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","ERP, Vision System, POP 등 외부 정보시스템과 연계가 용이한 유연한 설계");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","공정 라인, 설비 증설 등 기업 요구와 사업 확장에 대비한 시스템 설계");?></p>
                          <p><?php echo $this->utillLangController->lang("ser03","FLEXING CPS와 EDGE를 활용하여 다양한 설비 또는 로봇 등과 손쉽게 연계");?> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="con con03 bg-gray">
                 <div class="bd-lg">
                  <b class="sec-title"><?php echo $this->utillLangController->lang("ser03","MES 특징");?></b>
                  <div class="con_in">
                    <div class="img_wrap">
                      <div class="list_con07">
                        <ul class="list list01">
                          <li>
                            <div class="txt_wrap">
                              <b><?php echo $this->utillLangController->lang("ser03",'<i class="fc-g">실시간</i> 생산 정보 수집 및 공유');?></b>
                              <p><?php echo $this->utillLangController->lang("ser03","JIT(Just In Time)기준 생산 계획 작성 바코드, PLC, POD-실시간 생산 데이터");?></p>
                            </div>
                          </li>
                          <li>
                            <div class="txt_wrap">
                              <b><?php echo $this->utillLangController->lang("ser03",'<i class="fc-g">1분</i> 내 현장파악');?></b>
                              <p><?php echo $this->utillLangController->lang("ser03","실시간 공장/공정 현황 디스플레이");?></p>
                            </div>
                          </li>
                        </ul>
                        <ul class="list list02">
                          <li>
                            <div class="txt_wrap">
                              <b><?php echo $this->utillLangController->lang("ser03",'<i class="fc-g">EPS</i> 및 <i class="fc-g">CPS</i> 연계');?></b>
                              <p><?php echo $this->utillLangController->lang("ser03","ERP 정보 및 CPS와 연계, 실시간 생산 현황 모듈 적용");?></p>
                            </div>
                          </li>
                          <li>
                            <div class="txt_wrap">
                              <b><?php echo $this->utillLangController->lang("ser03",'다양한 IoT <i class="fc-g">장비 연동</i>');?></b>
                              <p><?php echo $this->utillLangController->lang("ser03","체계적 LOT 추적 관리 시스템, 공정에 따른 바코드 관리 기능");?></p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="con_in">
                    <div class="list_con">
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon44.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser03","업무 간소화");?></b>
                                <p><?php echo $this->utillLangController->lang("ser03","생산현장에서 발생하는 모든 DATA를 실시간으로 등록/ 관리함으로써 사무실,현상 이동의 번거로움 및 문서작업의 감소");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon45.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser03","효율성 향상");?></b>
                                <p><?php echo $this->utillLangController->lang("ser03","생산계획, 작업지시를 현장 작업자가 실시간으로 확인할 수 있으므로 작업자의 업무 효율성과 생산성이 증가");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon46.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser03","정확도 향상");?></b>
                                <p><?php echo $this->utillLangController->lang("ser03","CPS 기능을 활용하여 설비로부터 직접 DATA를 송수신함으로써 보다 신뢰도 높은 자료수집 가능");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
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

    <script>
      var swiper = new Swiper(".mySwiper", {
        pagination: {
          el: ".swiper-pagination",
        },
      });
    </script>

</body>

</html>
