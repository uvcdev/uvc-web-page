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
              <li><a href="?param=ser03"><i>MES</i></a></li>
              <li><a href="?param=ser04"><i>EDGE</i></a></li>
              <li><a class="lang_on" href="?param=ser05"><i>EDUKIT.</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body">
          <div class="inner">
            <div class="ser_con ser_con05">
              <div class="main_title">
                  <span class="wow fadeInUp">PRODUCT</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">EDUKIT</b>
              </div>
              <div class="contents">
                <div class="con main_con con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in dis-f">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("ser05","스마트 팩토리 교육용 키트");?></b>
                        <p><?php echo $this->utillLangController->lang("ser05","산업프로토콜 표준인 OPC UA 기반에 UVC 교구를 이용해서 <br> 보다 실용적인 커리큘럼을 구성하고 있습니다.");?></p>
                      </div>
                      <div class="img_wrap">
                        <img src="UVC/page/homepage/img/sub/ser_img01.png" alt=""/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="con con02 bg-gray">
                 <div class="bd-lg">
                  <b class="sec-title"><?php echo $this->utillLangController->lang("ser05","FLEXING EDUKIT 도입해야 하는 이유");?></b>
                  <div class="con_in">
                    <div class="list_con">
                      <ul class="row dis-f flex-wrap">
                        <li class="col-md-4 col-sm-12">
                          <div class="con_wrap bg-w">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon01.png" alt=""/></div>
                            <div class="txt_wrap">
                              <b><?php echo $this->utillLangController->lang("ser05","실무에 강한 커리큘럼");?></b>
                              <p><?php echo $this->utillLangController->lang("ser05","스마트팩토리의 전문 교육 과정 <br>기반으로 하여  커리큘럼을 구성");?></p>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-4 col-sm-12">
                          <div class="con_wrap bg-w">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon02.png" alt=""/></div>
                            <div class="txt_wrap">
                              <b><?php echo $this->utillLangController->lang("ser05","현장과 유사한 실습 환경");?></b>
                              <p><?php echo $this->utillLangController->lang("ser05","공정 모델링과 시뮬레이션이 가능한 실습 환경과 실제 시스템 구축과 동일한 임베디드 디바이스, 액션 모듈, 대시보드 등을 통한 실습 가능");?></p>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-4 col-sm-12">
                          <div class="con_wrap bg-w">
                            <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon03.png" alt=""/></div>
                            <div class="txt_wrap">
                              <b><?php echo $this->utillLangController->lang("ser05","스마트팩토리 통신 플랫폼의 완벽한 이해");?></b>
                              <p><?php echo $this->utillLangController->lang("ser05","실무자 및 학생들이 개별적인 복수의 OPC UA 임베디드 디바이스를 사용하여 표준 통신 플랫폼에 대해 이해할 수 있음");?></p>
                            </div>
                           
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="con_in">
                    <div class="list_con02">
                      <ul class="">
                        <li class="">
                          <div class="con_wrap border-dashed">
                            <div class="top dis-f flex-wrap align-i-c">
                              <div class="left">
                                <div class="img_wrap row dis-f flex-wrap">
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img02.png" alt=""/>
                                    <p><?php echo $this->utillLangController->lang("ser05","1호기 반출공정");?></p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img11.png" alt=""/>
                                    <p><?php echo $this->utillLangController->lang("ser05","2호기 가공공정");?></p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img12.png" alt=""/>
                                    <p><?php echo $this->utillLangController->lang("ser05","3호기 분류공정");?></p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img13.png" alt=""/>
                                    <p><?php echo $this->utillLangController->lang("ser05","컨베이어 벨트");?></p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img14.png" alt=""/>
                                    <p><?php echo $this->utillLangController->lang("ser05","컬러 센서");?></p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img15.png" alt=""/>
                                    <p><?php echo $this->utillLangController->lang("ser05","Vision 센서");?></p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img16.png" alt=""/>
                                    <p><?php echo $this->utillLangController->lang("ser05","제어용 PLC");?></p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img17.png" alt=""/>
                                    <p>HMI</p>
                                  </div>
                                  <div class="img col width-20">
                                    <img src="UVC/page/homepage/img/sub/ser_img18.png" alt=""/>
                                    <p>Edge PC</p>
                                  </div>
                                </div>
                              </div>
                              <div class="right">
                                <div class="txt_wrap02">
                                  <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser05","제품구성");?></b>
                                  <p class="bg-w"><?php echo $this->utillLangController->lang("ser05","FLEXING EDUKIT 장비, FLEXING EDUKIT 매뉴얼, OT 교육용 교안, IT 교육용 교안");?></p>
                                </div>
                                <div class="txt_wrap02">
                                  <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser05","장비구성");?></b>
                                  <p class="bg-w"><?php echo $this->utillLangController->lang("ser05","1호기 반출 공정, 2호기 가공 공정, 3호기 분류 공정, 컨베이어 벨트, 컬러센서, Vision 센서, 제어용 PLC, HMI, Edge pc");?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="con_wrap">
                            <div class="img_wrap" style="width:450px; max-width:100%; margin:32px auto 64px auto;"><img src="UVC/page/homepage/img/sub/ser_img01.png" alt=""/></div>
                          </div>
                        </li>
                        <li class="">
                          <div class="con_wrap border-dashed">
                            <div class="top">
                              <div class="left">
                                <div class="img_wrap row dis-f flex-wrap">
                                  <img class="mb-0 col col-md-12 " src="UVC/page/homepage/img/sub/ser_img03.png" alt=""/>
                                </div>
                              </div>
                              <div class="right">
                                <div class="txt_wrap02 mt-4">
                                  <b class="sub-title-point">EduKit Portal</b>
                                  <div class="swiper pd_swipe">
                                    <div class="swiper-wrapper" style="height: 50%;">
                                      <div class="swiper-slide">
                                        <div class="img_wrap">
                                          <img class="mb-0" src="UVC/page/homepage/img/sub/edu_con_2.png" alt=""/>
                                          <p><?php echo $this->utillLangController->lang("ser05","장비 데이터 확인, 장비 제어, 알람 세팅, 알람 확인");?></p>
                                        </div>
                                      </div>
                                      <div class="swiper-slide">
                                        <div class="img_wrap">
                                          <img class="mb-0"  src="UVC/page/homepage/img/sub/edu_model.png" alt=""/>
                                          <p><?php echo $this->utillLangController->lang("ser05","EDUKiT 모듈 OPC UA 모델링");?></p>
                                        </div>
                                      </div>
                                      <div class="swiper-slide">
                                        <div class="img_wrap">
                                          <img class="mb-0" src="UVC/page/homepage/img/sub/edu_dash.png" alt=""/>
                                          <p><?php echo $this->utillLangController->lang("ser05","Edukit Dashboard 모니터링");?></p>
                                        </div>
                                      </div>
                                      <div class="swiper-slide">
                                        <div class="img_wrap">
                                          <img class="mb-0"  src="UVC/page/homepage/img/sub/edu_tag.png" alt=""/>
                                          <p>Modeler Tag Setting</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="con con03 pb-0">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("ser05","FLEXING EDUKIT을 다양하게 활용하는 방법");?></b>
                    <div class="con_in">
                      <div class="list_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser05","OT 활용방안");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon04.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","공장 구성");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","키트 조립, 선 연결을 통한 공장 구성 학습");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon05.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","PLC 제어 구성");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","PLC 메모리 맵 프로토콜 문서 제공");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon06.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","레더 프로그래밍");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","PLC 조작 및 레더 프로그래밍");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon07.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","센서 및 모터 제어");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","Edge를 통한 센서 데이터 수집, 장비 제어");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon08.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","HMI 운전 실습");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","실제 공장에서 사용하는 HMI 운전 실습");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon09.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","HMI 제작");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","HMI 화면 구성 및 운전");?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="con_in">
                      <div class="list_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser05","IT 활용방안");?></b>
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon10.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","비전 영상 인식 실습");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","Python 코드를 활용한 비전 영상 인식 실습");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon11.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","OPC UA 모델링 실습");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","OPC UA 표준 서버 모델링");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon12.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","OPC UA 프로토콜 연동");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","TAG 값 연동");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon13.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","생산 효율 제어");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","장비 속도와 수요 향상 관계 학습");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon14.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","Dashboard 구성");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","교육키트 Dashboard 구성");?></p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-sm-12">
                            <div class="con_wrap bg-gray">
                              <div class="icon_wrap"><img src="UVC/page/homepage/img/sub/ser_icon15.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("ser05","데이터 분석");?></b>
                                <p><?php echo $this->utillLangController->lang("ser05","교육키트 데이터 분석");?></p>
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
