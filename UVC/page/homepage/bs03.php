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
              <li><a href="?param=bs02"><i>Metaverse</i></a></li>
              <li><a class="lang_on" href="?param=bs03"><i>EdgeDevice.</i></a></li>
              <li><a href="?param=bs04"><i>SmartFactory</i></a></li>
              <li><a href="?param=bs05"><i>Education</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body pb-0">
          <div class="inner">
            <div class="ser_con ser_con04 bs03">
              <div class="main_title">
                  <span class="wow fadeInUp">BUSINESS</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">EdgeDevice</b>
              </div>
              <div class="contents">
                <div class="con main_con txt_only con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("bs03","엣지디바이스");?></b>
                        <p>
                          <span><?php echo $this->utillLangController->lang("bs03","공장 전체의 기계, 설비, 로봇, 센서 연결하고");?> </span>
                          <span><?php echo $this->utillLangController->lang("bs03","실시간 양방향 데이터 교환과 수많은 산업용 프로토콜에 대응");?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con bg-gray">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs03","국제 표준 기술(OPC UA)를 적용한 엣지디바이스");?></b>
                    <div class="con_in">
                      <div class="list_con05">
                        <ul class="dis-f flex-wrap justi-s-b">
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap">
                              <div class="img_wrap">
                                <p><?php echo $this->utillLangController->lang("bs03","<span>A사</span> 기계");?></p>
                                <p><?php echo $this->utillLangController->lang("bs03","<span>B사</span> 기계");?></p>
                                <p><?php echo $this->utillLangController->lang("bs03","<span>C사</span> 로봇");?></p>
                                <p><?php echo $this->utillLangController->lang("bs03","<span>D사</span> 센서");?></p>
                              </div>
                            </div>
                            <div class="txt_wrap">
                              <p><?php echo $this->utillLangController->lang("bs03","플러그 꽂기만 해도 연동<span>(Plug & Play)</span>");?></p>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-12">
                            <div class="con_wrap">
                              <div class="txt_wrap">
                                <span><?php echo $this->utillLangController->lang("bs03","국내유일");?></span>
                                <b><?php echo $this->utillLangController->lang("bs03","국제 표준 엣지디바이스");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","디지털트윈 초연결을 위해 <br> 국제 표준으로 모두 연결");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con con02">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs03","디지털트윈 구축과정");?></b>
                    <div class="con_in">
                      <div class="info_wrap bg-gray">
                        <p><?php echo $this->utillLangController->lang("bs03","글로벌 기계/ 로봇을 OPC UA 기반 엣지디바이스를 통해 쉽고 빠르게 DT & 메타버스 구축하고 지능화");?></p>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="list_con">
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="txt_wrap mt-0">
                                <b><?php echo $this->utillLangController->lang("bs03","현실세계 기계/ 로봇/ 설비");?></b>
                              </div>
                              <div class="swiper pd_swipe overflow-h">
                                <div class="swiper-wrapper">
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img25.png" alt=""/>
                                    </div>
                                  </div>
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0"  src="UVC/page/homepage/img/sub/ser_img31.png" alt=""/>
                                    </div>
                                  </div>
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img32.png" alt=""/>
                                    </div>
                                  </div>
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0"  src="UVC/page/homepage/img/sub/ser_img33.png" alt=""/>
                                    </div>
                                  </div>
                                </div>
                                <div class="swiper-pagination"></div>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="txt_wrap mt-0">
                                <b>FLEXING EDGE</b>
                              </div>
                              <div class="swiper pd_swipe2 overflow-h">
                                <div class="swiper-wrapper">
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0" src="UVC/page/homepage/img/sub/bs_img01.png" alt=""/>
                                    </div>
                                  </div>
                                </div>
                                <div class="swiper-pagination"></div>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="txt_wrap mt-0">
                                <b>Digital Twin & Metaverse</b>
                              </div>
                              <div class="swiper pd_swipe overflow-h">
                                <div class="swiper-wrapper">
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img34.png" alt=""/>
                                    </div>
                                  </div>
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0"  src="UVC/page/homepage/img/sub/ser_img35.png" alt=""/>
                                    </div>
                                  </div>
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0" src="UVC/page/homepage/img/sub/ser_img36.png" alt=""/>
                                    </div>
                                  </div>
                                  <div class="swiper-slide">
                                    <div class="img_wrap">
                                      <img class="mb-0"  src="UVC/page/homepage/img/sub/ser_img37.png" alt=""/>
                                    </div>
                                  </div>
                                </div>
                                <div class="swiper-pagination"></div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="con con03 bg-gray">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("bs03","엣지 디바이스 특성");?></b>
                    <div class="con_in">
                      <div class="txt_wrap dot bg-w">
                        <div class="txt_in3">
                          <p><?php echo $this->utillLangController->lang("bs03","모든 기계 로봇 연결 No Coding 방식으로 SI제거");?></p>
                          <p><?php echo $this->utillLangController->lang("bs03","프로파일 누적, 더많은 기계 한번에 연결 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("bs03","클라우드와 엣지로 원격에서 한번에 연결");?></p>
                          <p><?php echo $this->utillLangController->lang("bs03","일반 엔지니어리를 통한 더 많은 기계 한번에 연결 가능");?></p>
                        </div>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="img_list">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs03","관련 화면");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-6 col-xs-6">
                            <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_img38.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("bs03","OPC UA 웹 모델러");?></p>
                          </li>
                          <li class="col-md-6 col-xs-6">
                            <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_img39.png" alt=""/></div>
                            <p><?php echo $this->utillLangController->lang("bs03","프로파일 메이커");?></p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="list_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs03","장점");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon36.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","표준화");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","상호연동성");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon37.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","독립성");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","특정 OS 의존성 없음");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon38.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","보안성");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","높은 보안기술");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon39.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","사용자 정의");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","합리적 가격");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="list_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs03","장점");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon40.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","효율성");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","No Coding 원격");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon41.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","무정지");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","엣지 클러스터링");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon42.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","보안성");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","분산 제어");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap bg-w">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon43.png" alt=""/></div>
                              <div class="txt_wrap mt-0">
                                <b class="fc-g"><?php echo $this->utillLangController->lang("bs03","지능화");?></b>
                                <p><?php echo $this->utillLangController->lang("bs03","학습 모듈 탑재");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="list_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("bs03","작업과정");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-w">
                              <div class="icon_wrap"><img style="width:auto; object-fit:contain; height:190px;  max-width:100%; " src="UVC/page/homepage/img/sub/ser_img04.gif" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">1</i></b>
                                <p><?php echo $this->utillLangController->lang("bs03","전원 넣는다.");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-w">
                              <div class="icon_wrap"><img style="width:auto; object-fit:contain; height:190px;  max-width:100%; " src="UVC/page/homepage/img/sub/ser_img05.gif" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">2</i></b>
                                <p><?php echo $this->utillLangController->lang("bs03","LAN 선을 꽂는다.");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-w">
                              <div class="icon_wrap"><img style="width:auto; object-fit:contain; height:190px;  max-width:100%; " src="UVC/page/homepage/img/sub/ser_img06.gif" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">3</i></b>
                                <p><?php echo $this->utillLangController->lang("bs03","전원 버튼을 누른다.");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-w">
                              <div class="icon_wrap"><img  style="width:auto; object-fit:contain; height:190px;  max-width:100%; "src="UVC/page/homepage/img/sub/ser_img07.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">4</i></b>
                                <p><?php echo $this->utillLangController->lang("bs03","PROCESS 자동로드");?></p>
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
      <!-- 제품 슬라이드 -->
      <script>
      var swiper = new Swiper(".pd_swipe", {
        loop:true,
        autoplay:{
          delay: 1500,
          disableOnInteraction: false  
        },
        slidesPerView:1,
        pagination: {
          el: ".swiper-pagination",
        },
      });
    </script>
    
    
</body>

</html>
