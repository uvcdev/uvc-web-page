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
    <div class="wrap" >        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <?php include_once $this->dir."page/homepage/include/bs-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>BUSINESS</h3>
            <ul class="dis-f">
              <li><a href="?param=bs01"><i>DigitalTwin</i></a></li>
              <li><a href="?param=bs02"><i>Metaverse</i></a></li>
              <li><a href="?param=bs03"><i>EdgeDevice</i></a></li>
              <li><a class="lang_on" href="?param=bs04"><i>SmartFactory.</i></a></li>
              <li><a href="?param=bs05"><i>Education</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body pb-0">
          <div class="inner">
            <div class="ser_con ser_con04 bs04">
              <div class="main_title">
                  <span class="wow fadeInUp">BUSINESS</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">SmartFactory</b>
              </div>
              <div class="contents">
                <div class="con main_con txt_only con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("bs04","스마트팩토리");?></b>
                        <p>
                          <span><?php echo $this->utillLangController->lang("bs04","유비씨는 기업의 특성에 맞춰 전문 장비를 직접 구매하고,");?> </span>
                          <span><?php echo $this->utillLangController->lang("bs04","플랫폼 기반 개발로 이중비용 지출을 절감하여");?> </span>
                          <span><?php echo $this->utillLangController->lang("bs04","실질적 실시간 생산관리 시스템으로 스마트팩토리를 구축할 수 있습니다.");?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con con02 bg-gray">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs04","기초 산업데이터 데이터화, 레거시 운영 시스템 연계 구축");?></b>
                    <div class="con_in">
                      <div class="list_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs04","시스템 특성");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img style="" src="UVC/page/homepage/img/sub/ser_icon25.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs04","실시간성");?></b>
                                <p><?php echo $this->utillLangController->lang("bs04","웹과 연계된 실시간 생산 현황 모니터링");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img style="" src="UVC/page/homepage/img/sub/ser_icon26.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs03","효율성");?></b>
                                <p><?php echo $this->utillLangController->lang("bs04","기업의 생산 특성에 따른 생산관리 시스템 구축");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img style="" src="UVC/page/homepage/img/sub/ser_icon27.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs04","확장성");?></b>
                                <p><?php echo $this->utillLangController->lang("bs04","PLC, ERP, CPS와 연계된 생산 현황 모듈 적용");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="dis-f flex-wrap row">
                        <div class="txt_wrap dot col-md-6 col-xs-12 mb-4 ">
                          <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs04","생산관리");?></b>
                          <div class="txt_in bg-w">
                            <b><?php echo $this->utillLangController->lang("bs04","생산작업 진행상황모니터링");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","작업의 시작-종료-취소-보류 등과 같은 작업지시에 관한 생산 정보 제공");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","정상품/불량품, 작업자, 설비 가동/비가동 정보 수집");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","생산에 투입되는 자재의 입/출고, 이동 등 정보 제공");?></p>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12 mb-4">
                          <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs04","공정라인");?></b>
                          <div class="txt_in bg-w">
                            <b><?php echo $this->utillLangController->lang("bs04","다양한 기기에 최적화");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","작업자 모바일, 태블릿, PC, 단말기 등 다양한 기기에 최적화된 화면 제공");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","손쉬운 실시간 업무처리 가능");?></p>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs04","작업계획");?></b>
                          <div class="txt_in bg-w">
                            <b><?php echo $this->utillLangController->lang("bs04","전략적인 생산계획 수립");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","작업 우선순위, 병복자원 등 종합적인 현상황을 고려한 스케쥴링");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","차트, 캘린더를 이용한 계획 및 실시간 생산현황조회");?></p>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs04","모니터링");?></b>
                          <div class="txt_in bg-w">
                            <b><?php echo $this->utillLangController->lang("bs04","실시간 작업실적 통계 대시보드 & 데이터 분석");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","작업계획 대비 실적 현황, 가동률, 불량 등 정보에 대한 실시간 데이터 제공");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","시각화 차트 제공 및 다양한 통계 차트 표현");?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con con04">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs04","스마트팩토리 구축절차");?></b>
                    <div class="con_in">
                      <div class="info_wrap bg-gray">
                        <p><?php echo $this->utillLangController->lang("bs04","각 기업의 생산현장에 따라 일부 기능 추가/삭제 또는 커스터마이징(맞춤형) 지원");?></p>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="list_con04">
                        <ul class="row dis-f">
                          <li class="col-md-4 col-xxs-12">
                            <div class="con_wrap">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_icon28.png" alt=""/></div>
                              <div class="txt_wrap bg-gray">
                                <span>01</span>
                                <p class=""><?php echo $this->utillLangController->lang("bs04","현장 공정 및 환경 분석");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xxs-12">
                            <div class="con_wrap">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_icon29.png" alt=""/></div>
                              <div class="txt_wrap bg-gray">
                                <span>02</span>
                                <p class=""><?php echo $this->utillLangController->lang("bs04","생산라인 실무자 인터뷰를 통한 맞춤 설비/기능 설계");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xxs-12">
                            <div class="con_wrap">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_icon30.png" alt=""/></div>
                              <div class="txt_wrap bg-gray">
                                <span>03</span>
                                <p class=""><?php echo $this->utillLangController->lang("bs04","도입기업 맞춤 스마트팩토리 제시");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="list_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs04","유비씨 스마트팩토리 특징");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-gray">
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs04","실시간 생산 정보 수집 및 공유");?></b>
                                <p><?php echo $this->utillLangController->lang("bs04","JIT(Just In Time) 기준 생산계획 작성");?></p>
                                <p><?php echo $this->utillLangController->lang("bs04","바코드, PLC, POP 장비 활용");?></p>
                                <p><?php echo $this->utillLangController->lang("bs04","실시간 생산 정보 수집");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-gray">
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs04",'1분 현장 파악, "눈으로 보는 관리"');?></b>
                                <p><?php echo $this->utillLangController->lang("bs04",'실시간 공장/공정 현황 디스플레이 "눈으로 보는 관리" 실현으로 경영 혁신');?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-gray">
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs04","ERP 및 CPS 연계");?></b>
                                <p><?php echo $this->utillLangController->lang("bs04","ERP 및 CPS 연계");?></p>
                                <p><?php echo $this->utillLangController->lang("bs04","실시간 생산현황 모듈 적용");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-gray">
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("bs04","다양한 IoT장비 연동");?></b>
                                <p><?php echo $this->utillLangController->lang("bs04","체계적 LOT 추적 시스템");?></p>
                                <p><?php echo $this->utillLangController->lang("bs04","공정에 따른 바코드 관리 기능");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="con_in con_in03">
                      <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs04","구축효과");?></b>
                      <div class="dis-f flex-wrap row">
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs04","생산계획의 유연화 / 실시간 정보 공유");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","공정 투입에서 공정 운영, 제품 출하까지 전 생산과정의 통합정보 시스템 구축");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","관련 공정별 실시간으로 데이터를 공유함으로써 활용시간 절약은 물론 현장 생산성 향상");?></p>
                            <img src="UVC/page/homepage/img/sub/ser_icon31.png" alt=""/>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12 ">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs04","효율적인 공정 관리 실현");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","공정시작과 현재 공정 처리 현황을 실시간으로 모니터링");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","공정 이동과 다음 공정의 상황을 실시간 공유");?></p>
                            <img src="UVC/page/homepage/img/sub/ser_icon32.png" alt=""/>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs04","디지털 작업지시서로 업무효율성 향상");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","종이 작업지시서의 이동을 없앰");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","작업 공정에서 디지털 작업지시서 확인");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","실시간 데이터 입력으로 데이터의 실시간성과 중복 입력 방지");?></p>
                            <img src="UVC/page/homepage/img/sub/ser_icon33.png" alt=""/>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs04","파일에 산재하던 데이터의 DB화 및 실시간 데이터 연동");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","개인 PC 파일을 중앙 서버, 클라우드로 이관");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","프로세스에 의한 업무 처리 및 프로세스 체계화");?></p>
                            <img src="UVC/page/homepage/img/sub/ser_icon34.png" alt=""/>
                          </div>
                        </div>
                        <div class="txt_wrap dot col-md-6 col-xs-12">
                          <div class="txt_in h-100 bg-gray">
                            <b><?php echo $this->utillLangController->lang("bs04","상품재고 업무 효율 향상");?></b>
                            <p><?php echo $this->utillLangController->lang("bs04","상품재고 파악 힘듦으로 불용재고 산재");?></p>
                            <p><?php echo $this->utillLangController->lang("bs04","상품재고 코드 도입으로 관리 효율 증대");?></p>
                            <img src="UVC/page/homepage/img/sub/ser_icon35.png" alt=""/>
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
</body>

</html>