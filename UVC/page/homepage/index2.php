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
    <link rel="stylesheet" type="text/css" href="UVC/page/homepage/css/index.css<?php echo $version;?>"/>

    <!-- SCRIPT -->
    <?php include_once $this->dir."page/homepage/include/common_js.php"; ?>
    <script type="text/javascript" src="<?php echo $this->project_name;?>/page/homepage/js/index2.js<?php echo $version;?>"></script>

    

</head>
<body>
    <div class="wrap">        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <section class="sec01 section">
          <div id="cookiePopup" class="cookie-popup">
            <p>이 사이트는 쿠키를 사용합니다. 쿠키 설정을 변경하시겠습니까?</p>
            <button id="allowCookie" class="allow-cookie">쿠키 허용</button>
            <button id="rejectCookie" class="reject-cookie">쿠키 거부</button>
            <div class="cookie-options" style="display:none;" id="cookieOption">
              <input type="checkbox" id="analytics" name="analytics" checked>
              <label for="analytics">분석 쿠키 허용</label>
              <input type="checkbox" id="marketing" name="marketing">
              <label for="marketing">마케팅 쿠키 허용</label>
              <button id="saveCookie" class="save-cookie">저장</button>
            <button id="cancelCookie" class="cancel-cookie">취소</button>
            </div>
            
          </div>
          <div class="swiper main_slide">
              <div class="swiper-wrapper">
                  <div class="swiper-slide slide01">
                    <video controls width="250" type="video/mp4" autoplay="" data-keepplaying="" muted="" loop="" alt="" >
                          <source src="UVC/page/homepage/img/main_video02.mp4" >
                      </video>
                      <div class="txt_wrap">
                        <div class="bd-lg">
                          <b class=" wow fadeInUp"><?php echo $this->utillLangController->lang("index","유비씨는 사람과 기술을 연결합니다.");?></b>
                          <p class=" wow fadeInUp" data-wow-delay="0.3s"><?php echo $this->utillLangController->lang("index","디지털 트윈으로 새로운 가치를 발견하고, <br> 메타버스로 놀라운 경험을 선사합니다.");?></p>
                        </div>
                      </div>
                  </div>
                  <div class="swiper-slide slide02">
                      <div class="img_wrap"></div>
                      <div class="txt_wrap">
                        <div class="bd-lg">
                          <b><?php echo $this->utillLangController->lang("index","유비씨는 사람과 기술을 연결합니다.");?></b>
                          <p><?php echo $this->utillLangController->lang("index","디지털 트윈으로 새로운 가치를 발견하고, <br> 메타버스로 놀라운 경험을 선사합니다.");?></p>
                        </div>
                      </div>
                  </div>
                  <div class="swiper-slide slide03">
                      <div class="img_wrap"></div>
                      <div class="txt_wrap">
                        <div class="bd-lg">
                          <b><?php echo $this->utillLangController->lang("index","유비씨는 사람과 기술을 연결합니다.");?></b>
                          <p><?php echo $this->utillLangController->lang("index","디지털 트윈으로 새로운 가치를 발견하고, <br> 메타버스로 놀라운 경험을 선사합니다.");?></p>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="swiper-button-next" style="display:none"></div>
              <div class="swiper-button-prev" style="display:none"></div>
          </div>
          <div class="main_slide_arrow">
            <ul>
              <li class="left main_arrow_left">
                <img src="UVC/page/homepage/img/main/left_arrow.png" alt="left arrow"/>
              </li>
              <li class="right main_arrow_right">
                <img src="UVC/page/homepage/img/main/right_arrow.png" alt="right arrow"/>
              </li>
            </ul>
          </div>
        </section>
        <section class="sec02 section pt-0 pb-0">
          <div class="bd-lg">
            <div class="main_title">
                <div>
                    <span class="sub-title wow fadeInUp"  data-wow-delay="0.5s">UVC Main Business.</span>
                    <h2 class="wow fadeInUp" data-wow-delay="0.8s">
                      <span><?php echo $this->utillLangController->lang("index","차세대 산업을 유연하게 디지털 융합하는 방법");?></span>
                    </h2>
                </div>
                <div class="btn_wrap"><a href="?param=bs01">VIEW MORE</a></div>
            </div>
            <div class="inner ">
              <div class="img_wrap wow fadeInUp"  data-wow-delay="0.3s">
                <img src="UVC/page/homepage/img/main/sec01.svg" alt="디지털 융합 방법 이미지"/>
                <p><?php echo $this->utillLangController->lang("index","디지털 트윈 기반의 인더스트리 메타버스 구축");?></p>
              </div>
            </div>
            <div class="txt_wrap">
              <p>
                <span><?php echo $this->utillLangController->lang("index","FLEXING 플랫폼은 국제 표준 기술인 OPC UA를 기반으로 개발되어");?> </span>
                <span><?php echo $this->utillLangController->lang("index","다양한 분야의 IIoT를 유연하게 연결하여 쉽고 빠르게 데이터를 수집 및 분석하고");?></span>
                <span> <?php echo $this->utillLangController->lang("index","디지털 트윈과 메타버스 기반의 직관적인 정보로 고객에게 새로운 가치와 기회를 제공합니다.");?></span>
              </p>
            </div>
            <div class="img_wrap img_wrap02 wow fadeInUp"  data-wow-delay="0.6s">
              <img src=<?php echo $this->utillLangController->lang("bs02","UVC/page/homepage/img/main/sec02_2.png");?> alt=""/>
            </div>
          </div>

        </section>
        <section class="sec04 sec05 section">
          <div class="bd-lg">
            <div class="main_title">
                <div>
                    <span class="sub-title wow fadeInUp">UVC Business.</span>
                    <h2 class="wow fadeInUp" data-wow-delay="0.3s">
                      <span><?php echo $this->utillLangController->lang("index","스마트팩토리 부분의 CPS 플랫폼을");?> </span>
                      <span><?php echo $this->utillLangController->lang("index","개발하는 기술 중심의 기업입니다.");?></span>
                    </h2>
                    <p class="wow fadeInUp" data-wow-delay="0.6s">
                      <span><?php echo $this->utillLangController->lang("index","유비씨는 OPC UA Foundation Member로서 국내 최초로 국제 인증 3건을 획득하였습니다.");?></span>
                    </p>
                </div>
                <div class="btn_wrap"><a href="?param=bs01">VIEW MORE</a></div>
            </div>
            <div class="inner wow fadeInUp" data-wow-delay="0.9s">
              <ul class="row">
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/icon02.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b><?php echo $this->utillLangController->lang("index","디지털트윈 <span>DigitalTwin</span>");?></b>
                      <p><?php echo $this->utillLangController->lang("index","IT X OT융합 클라우드 Saas로 빠르고 합리적으로 도입가능합니다.");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=bs01">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/icon03.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b><?php echo $this->utillLangController->lang("index","메타버스 <span>Metaverse</span>");?></b>
                      <p><?php echo $this->utillLangController->lang("index","DT & 메타버스로 제조 엔지니어링을 지능화 하고 서비스로 전환합니다.");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=bs02">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/icon04.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b><?php echo $this->utillLangController->lang("index","엣지 디바이스 <span>EdgeDevice</span>");?></b>
                      <p><?php echo $this->utillLangController->lang("index","엣지디바이스를 통해 쉽고 빠르게 DT & 메타버스 구착화하고 지능화합니다.");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=bs03">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/icon05.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b><?php echo $this->utillLangController->lang("index","스마트팩토리 <span>SmartFactory</span>");?></b>
                      <p><?php echo $this->utillLangController->lang("index","전문 장비를 직접 구매하고, 플랫폼 기반 개발로 이중비용 지출을 절감합니다.");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=bs04">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/icon06.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b><?php echo $this->utillLangController->lang("index","교육사업 <span>Education</span>");?></b>
                      <p><?php echo $this->utillLangController->lang("index","UVC 교구를 이용해서 보다 실용적인 커리큘럼을 구성하고 있습니다.");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=bs05">VIEW MORE</a></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>


        </section>
        <section class="sec07 section">
          <div class="txt_wrap">
            <div class="bd-lg">
                <b class="wow fadeInUp">REFERENCE</b>
                <p  class="wow fadeInUp" data-wow-delay="0.3s"><?php echo $this->utillLangController->lang("index","유비씨의 기술력으로 만들어진 결과물을 만나보세요.");?></p>
                <div class="btn_wrap wow fadeInUp" data-wow-delay="0.6s">
                  <a href="?param=ref"><?php echo $this->utillLangController->lang("index","바로가기");?> <img src="UVC/page/homepage/img/sub/go_arrow.svg" alt="더보기 화살표"/></a>
                </div>
            </div>
          </div>
          
        </section>

        <section class="sec05 section">
          <div class="bd-lg">
            <div class="main_title">
                <div>
                    <span class="sub-title wow fadeInUp">UVC FLEXING Product.</span>
                    <h2 class="wow fadeInUp" data-wow-delay="0.3s">
                      <span><?php echo $this->utillLangController->lang("index","IIoT로 유연하게 연결하여 스마트팩토리부터");?> </span>
                      <span><?php echo $this->utillLangController->lang("index","디지털트윈 그리고 메타버스까지 쉽고 빠르게 구축합니다.");?></span>
                    </h2>
                </div>
                <div class="btn_wrap"><a href="?param=ser01">VIEW MORE</a></div>
            </div>
            <div class="inner wow fadeInUp" data-wow-delay="0.6s">
              <ul class="row">
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/sec02_img06.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b>CPS</b>
                      <p><?php echo $this->utillLangController->lang("index","SaaS(서비스형 소프트웨어)로 원하는 기능만 저렴한 비용으로 도입");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=ser01">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/sec02_img07.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b> XR</b>
                      <p><?php echo $this->utillLangController->lang("index","현실 공장의 OT 기술과 가상공간의 IT 기술을 융합한 제조 메타버스 서비스");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=ser06">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/sec02_img08.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b>MES</b>
                      <p><?php echo $this->utillLangController->lang("index","제품 주문에 의한 착수에서 완성품의 품질검사까지 전 생산 활동을 관리");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=ser03">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap"><img src="UVC/page/homepage/img/main/sec02_img09.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b>EDGE</b>
                      <p><?php echo $this->utillLangController->lang("index","다양한 디바이스 및 타 시스템과의 연계 기능");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=ser04">VIEW MORE</a></div>
                  </div>
                </li>
                <li class="col">
                  <div class="con_wrap">
                    <div class="img_wrap bg-gray" ><img src="UVC/page/homepage/img/main/sec02_img10.png" alt=""/></div>
                    <div class="txt_wrap">
                      <b>EDUKIT</b>
                      <p><?php echo $this->utillLangController->lang("index","산업프로토콜 표준인 OPC UA 기반에 UVC 교구를 이용");?></p>
                    </div>
                    <div class="btn_wrap"><a href="?param=ser05">VIEW MORE</a></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </section>
        <section class="sec06 section bg-gray">
          <div class="bd-lg">
            <div class="main_title">
              <div>
                  <span class="sub-title wow fadeInUp">UVC STORY & NEWS.</span>
                  <h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo $this->utillLangController->lang("index","새로운 소식을 알려드립니다.");?></h2>
                  <p class="wow fadeInUp" data-wow-delay="0.6s">
                    <span><?php echo $this->utillLangController->lang("index","유비씨는 끊임없는 기술 성장을 통해 구성원의 가치를 성장시켜 나가며 회사구성원의 행복이 고객만족과 직결된다는 일념으로");?></span>
                    <span> <?php echo $this->utillLangController->lang("index",'모두가 행복한 삶을 누리기 위해 "HAPPY WORK PLACE"의 가치 아래 일과 생활의 균형을 실현하고자 합니다.');?></span>
                  </p>
              </div>
              <div class="btn_wrap"><a href="?param=cp_news">VIEW MORE</a></div>
            </div>
            <div class="swiper main_news wow fadeInUp" data-wow-delay="0.9s">
                <div class="swiper-wrapper" data-wrap="wrap" id="wrap">
                    <!-- <div class="swiper-slide slide01">
                        <a href="">       
                          <div class="img_wrap"><img src="UVC/page/homepage/img/main/news_img.png" alt=""/></div>                   
                          <div class="txt_wrap">
                            <b>NOTICE</b>
                            <p>새로운 신묘년 해를 맞이하여 홈페이지가 새롭게 리뉴얼되었습니다. </p>
                            <span>2022.01.16</span>
                          </div>
                        </a>
                    </div>
                    <div class="swiper-slide slide01">
                        <a href="">       
                          <div class="img_wrap"><img src="UVC/page/homepage/img/main/news_img.png" alt=""/></div>                   
                          <div class="txt_wrap">
                            <b>NOTICE</b>
                            <p>새로운 신묘년 해를 맞이하여 홈페이지가 새롭게 리뉴얼되었습니다. </p>
                            <span>2022.01.16</span>
                          </div>
                        </a>
                    </div>
                    <div class="swiper-slide slide01">
                        <a href="">       
                          <div class="img_wrap"><img src="UVC/page/homepage/img/main/news_img.png" alt=""/></div>                   
                          <div class="txt_wrap">
                            <b>NOTICE</b>
                            <p>새로운 신묘년 해를 맞이하여 홈페이지가 새롭게 리뉴얼되었습니다. </p>
                            <span>2022.01.16</span>
                          </div>
                        </a>
                    </div>
                    <div class="swiper-slide slide01">
                        <a href="">       
                          <div class="img_wrap"><img src="UVC/page/homepage/img/main/news_img.png" alt=""/></div>                   
                          <div class="txt_wrap">
                            <b>NOTICE</b>
                            <p>새로운 신묘년 해를 맞이하여 홈페이지가 새롭게 리뉴얼되었습니다. </p>
                            <span>2022.01.16</span>
                          </div>
                        </a>
                    </div> -->
                </div>

            </div>
          </div>
        </section>

      <div style="display:none;">
    
        <div class="swiper-slide slide01" data-copy="copy">
            <a>       
              <div class="img_wrap"><img  data-attr="image"/></div>                   
              <div class="txt_wrap">
                <b>NOTICE</b>
                <p data-attr="title"> </p>
                <span  data-attr="reg_date"></span>
              </div>
            </a>
        </div>
      </div>
      
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>
    </div>

    <!-- 메인슬라이드 -->
    <script>
      // var swiper = new Swiper(".main_slide", {
      //   loop:true,
      //   navigation: {
      //     nextEl: ".main_arrow_right",
      //     prevEl: ".main_arrow_left",
      //   },
      // });
    </script>
    <!-- 메인슬라이드 //-->
    <!-- 메인뉴스 -->
    <script>
      // var swiper = new Swiper(".main_news", {
      //   loop:true,
      //   autoplay:{
      //     delay: 1500,
      //     disableOnInteraction: false  
      //   },
      //   slidesPerView: 3,
      //   spaceBetween: 30,
      //   breakpoints: {
      //       400: {
      //       slidesPerView:2,  //브라우저가 768보다 클 때
      //       spaceBetween: 10,
      //       },
      //       640: {
      //       slidesPerView:2,  //브라우저가 768보다 클 때
      //       spaceBetween: 10,
      //       },
      //       960: {
      //       slidesPerView:2,  //브라우저가 768보다 클 때
      //       spaceBetween: 30,
      //       },
      //       1024: {
      //       slidesPerView: 3,  //브라우저가 1024보다 클 때
      //       spaceBetween: 30,
      //       },
      //   },
      // });
    </script>
    <!-- 메인뉴스 //-->
</body>

</html>
