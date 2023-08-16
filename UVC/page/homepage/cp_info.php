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
    <script type="text/javascript" src="<?php echo $this->project_name;?>/page/homepage/js/history.js<?php echo $version;?>"></script> 

    

</head>
<body>
    <div class="wrap">   
        <!-- 인증서 확대 팝업 -->
        <div class="certi_popup" style="display:none;" id="certi_popup">
            <div class="img_wrap">
                <img id="popup_img" alt=""/>
                <p onclick="close_popup();">X</p>
            </div>
        </div>   
        <!-- 인증서 확대 팝업 //-->  
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <?php include_once $this->dir."page/homepage/include/cp-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>COMPANY</h3>
            <ul class="dis-f">
              <li><a class="lang_on" href="?param=cp_info"><i>About us.</i></a></li>
              <li><a href="?param=cp_story"><i>Story</i></a></li>
              <li><a href="?param=cp_news"><i>News</i></a></li>
              <li><a href="?param=cp_location"><i>Contact</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body pb-0">
            <div class="inner">
                <div class="main_title">
                    <span class="wow fadeInUp">Company</span>
                    <b class="wow fadeInUp" data-wow-delay="0.3s">About us</b>
                </div>
                <div class="info_con">
                    <div class="con con01 pt-0">
                      <div class="bd-lg dis-f">
                            <div class="left">
                               <img src="UVC/page/homepage/img/logo-color.svg"  alt=""/>
                            </div>
                            <div class="right">
                              <div class="txt_wrap">
                                <b><?php echo $this->utillLangController->lang("cp_info","안녕하세요");?>.</b>
                                <p><?php echo $this->utillLangController->lang("cp_info",'세상의 모든 가치를 연결하는 기업, 주식회사 <i class="fc-g">유비씨</i>입니다.');?></p>
                                <p><?php echo $this->utillLangController->lang("cp_info",'<i class="fc-g">유비씨</i>는 국제 산업 표준(OPC UA)을 적용한 실시간 디지털 트윈 기반의 산업 메타버스로 다수의 공장, 변전소 등을 중앙에서 효율적으로 운영 및 관리하고, XR(AR/VR) 협업을 통해 즉각적인 장애 대처, 현장 작업자 교육, 유지 보수 등으로 운영 효율 상승과 품질 향상 및 비용 절감을 가능하게 하는 산업 메타버스 플랫폼을 개발하고 있습니다.');?></p>
                                <p><?php echo $this->utillLangController->lang("cp_info","디지털 트윈과 메타버스 실현을 위한 데이터 수집, 분석, 가상화까지 통합 플랫폼을 제공하여 고객의 디지털 전환을 빠르고 더 쉽게 접할 수 있는 환경을 만들어가고자 합니다.");?> </p>
                              </div>
                              <div class="txt_wrap02 bg-gray">
                                <p>'22 <?php echo $this->utillLangController->lang("cp_info","DXcon(덱스콘) 산업통상자원부 장관상 수상");?></p>
                                <p>’22 <?php echo $this->utillLangController->lang("cp_info","Grand Cloud Conference 과학기술정보통신부 장관상 수상");?></p>
                                <p>’22 <?php echo $this->utillLangController->lang("cp_info","KoVAC META Connect 2023 정보통신산업진흥원장상 수상");?></p>
                                <p>‘21 <?php echo $this->utillLangController->lang("cp_info","디지털 트윈 부문 국가대표 혁신기업 선정");?></p>
                                <p>‘20 <?php echo $this->utillLangController->lang("cp_info","디지털 트윈 플랫폼 '기술혁신대상' 수상");?></p>
                                <p>‘20 <?php echo $this->utillLangController->lang("cp_info","COMEUP STARS 제조 분야 국내 기업 중 유일 선정");?></p>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="con con03 bg-gray">
                        <div class="bd-lg">
                            <div class="sub-title2">
                                <b><?php echo $this->utillLangController->lang("cp_info","연혁");?></b>
                            </div>
                            <div class="history_con" >
                                <div class="bottom">
                                    <ul data-wrap="wrap" id="wrap">
                                        <!-- <li>
                                            <div class="left">
                                                <b>2020 ~ ing</b>
                                            </div>
                                            <div class="right">
                                                <div class="list_wrap">
                                                    <b>2022</b>
                                                    <dl>
                                                        <dd class="first">다양한 분야로 적용 및 확대</dd>
                                                        <dd>한국전력공사 Full 3D 디지털 트윈 구축 사업 주관</dd>
                                                        <dd>현대자동차 싱가포르 메타팩토리 구축 사업 참여</dd>
                                                        <dd>조달청 혁신 제품 선정 디지털 트윈 솔루션 FLEXING CPS</dd>
                                                        <dd>기업 DX 혁신과제 선정 메타버스 가상공장</dd>
                                                        <dd>현대자동차 실시간 디지털 트윈 제어 검증</dd>
                                                    </dl>
                                                </div>
                                                <div class="list_wrap">
                                                    <b>2021</b>
                                                    <dl>
                                                        <dd class="first">디지털 트윈 국가대표 기업으로 도약</dd>
                                                        <dd>디지털 트윈 부문 혁신기업 국가대표 선정</dd>
                                                        <dd>디지털 트윈 플랫폼 '기술혁신대상' 수상</dd>
                                                        <dd>GS파워, GS 에너지 디지털 트윈 구축</dd>
                                                        <dd>디지털 트윈 IT 개발자 교육 운영 시작</dd>
                                                        <dd>FLEXING EDUKIT 혁신제품 선정</dd>
                                                    </dl>
                                                </div>
                                                <div class="list_wrap">
                                                    <b>2020</b>
                                                    <dl>
                                                        <dd class="first">혁신기업을 위한 발판 마련</dd>
                                                        <dd>디지털 트윈 소프트웨어 GS 인증 1등급 획득</dd>
                                                        <dd>글로벌 COMEUP 국내 유일 스마트 제조 부문 수상</dd>
                                                        <dd>산업 메타버스 및 XR 사업 확장</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <b>2019 ~ 2010</b>
                                            </div>
                                            <div class="right">
                                                <div class="list_wrap">
                                                    <b>2019</b>
                                                    <dl>
                                                        <dd class="first">국제 표준 인증을 통한 경쟁력 강화</dd>
                                                        <dd>국제 산업 표준 OPC 인증 3건 획득</dd>
                                                        <dd>국제 산업 표준 특허 등록 및 출원</dd>
                                                    </dl>
                                                </div>
                                                <div class="list_wrap">
                                                    <b>2018 & 17</b>
                                                    <dl>
                                                        <dd class="first">디지털 트윈 시장 진출</dd>
                                                        <dd>FLEXING CPS, FLEXING Edge 개발</dd>
                                                        <dd>다수의 스마트팩토리 구축</dd>
                                                    </dl>
                                                </div>
                                                <div class="list_wrap">
                                                    <b>2016</b>
                                                    <dl>
                                                        <dd class="first">스마트팩토리 전문 기업으로 전환</dd>
                                                        <dd>기업부설연구소 설립</dd>
                                                        <dd>FLEXING MES, FLEXING ERP개발</dd>
                                                    </dl>
                                                </div>
                                                <div class="list_wrap">
                                                    <b>2010</b>
                                                    <dl>
                                                        <dd class="first">(주)유비씨 설립</dd>
                                                        <dd>3D 기반 관제시스템 전문기업</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="certi_con con con02 ">
                        <div class="bd-lg">
                            <div class="sub-title2">
                                <b><?php echo $this->utillLangController->lang("cp_info","특허 및 인증서");?></b>
                            </div>
                            <div>
                                <div class="sub-title3">
                                    <b><?php echo $this->utillLangController->lang("cp_info","디지털 트윈 / XR 원천기술 보유");?></b>
                                </div>
                                <ul class="certi_inner" data-wrap="creti_wrap" id="creti_wrap">
                                    <!-- <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:url(UVC/page/homepage/img/sub/certi_img01.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>FLEXING CPS <br> 특허 4건</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:#fff url(UVC/page/homepage/img/sub/certi_img02.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>FLEXING CPS <br>국제표준 OPC 인증 2건 </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:#fff url(UVC/page/homepage/img/sub/certi_img03.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>FLEXING Edge <br> 국제 표준 OPC 인증서</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:url(UVC/page/homepage/img/sub/certi_img04.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>국제 표준 <br> OPC 확인증</p>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                            <div>
                                <div class="sub-title3">
                                    <b><?php echo $this->utillLangController->lang("cp_info","OPC UA 국제표준기술 국내 최초 사용화");?></b>
                                </div>
                                <ul class="certi_inner certi_inner02" data-wrap="creti_wrap2" id="creti_wrap2">
                                    <!-- <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:url(UVC/page/homepage/img/sub/certi_img05.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>FLEXING CPS <br> 혁신제품 지정 인증서 </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:#fff url(UVC/page/homepage/img/sub/certi_img06.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>FLEXING CPS <br> GS 인증 1등급</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:url(UVC/page/homepage/img/sub/certi_img07.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>FLEXING CPS <br> 저작권 등록증</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:url(UVC/page/homepage/img/sub/certi_img08.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>FLEXING Edge <br> 저작권 등록증</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_wrap">
                                            <div class="img_in" style="background:url(UVC/page/homepage/img/sub/certi_img09.png)no-repeat; background-size:cover; background-position:center;"></div>
                                            <p>GS 인증서</p>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="con con04 bg-gray">
                        <div class="sub-title2">
                            <b><?php echo $this->utillLangController->lang("cp_info","파트너사");?></b>
                        </div>
                        <div class="bd-lg">
                            <ul class="row dis-f flex-wrap" data-wrap="partner_wrap" id="partner_wrap">
                                <!-- <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img01.png" alt="kepco 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img02.png" alt="hyundai 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img03.png" alt="kia 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img04.png" alt="삼성물산 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img05.png" alt="mando 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img06.png" alt="hyunai autoever 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img07.png" alt="gs power 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img08.png" alt="gs energy 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img09.png" alt="sgc energy 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img10.png" alt="naver 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img11.png" alt="lg u+ 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img12.png" alt="adt caps 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img13.png" alt="산업통상자원부 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img14.png" alt="과학기술정보통신부 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img15.png" alt="중소벤처기업부 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img16.png" alt="한국산업지능화협회 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img17.png" alt="매타버스 얼라이언스 로고"/></div>
                                </li>
                                <li class="col-md-2 col-sm-3 col-xxs-4">
                                    <div class="img_wrap"><img src="UVC/page/homepage/img/sub/partner_img18.png" alt="한국메타버스산엽회 로고"/></div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>

        <div style="display: none;">
            <li data-copy="copy">
                <div class="left">
                    <b data-attr="category_name"></b>
                </div>
                <div class="right" data-attr="history">
                    
                </div>
            </li>

            <li data-copy="certi_copy">
                <div class="img_wrap">
                    <div class="img_in" style="no-repeat; background-size:cover; background-position:center;" data-attr="image"></div>
                    <!-- <p>FLEXING Edge <br> 저작권 등록증</p> -->
                    <p data-attr="title"></p>
                </div>
            </li>

            <li class="col-md-2 col-sm-3 col-xxs-4" data-copy="partner_copy">
                <div class="img_wrap"><img data-attr="image"/></div>
            </li>
        </div>
    </div>
</body>

</html>
