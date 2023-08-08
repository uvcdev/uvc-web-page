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

    <script type="text/javascript" src="<?php echo $this->project_name;?>/page/homepage/js/location.js<?php echo $version;?>"></script>
    

</head>
<body>
    <div class="wrap" style="overflow:inherit;">        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <?php include_once $this->dir."page/homepage/include/cp-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>COMPANY</h3>
            <ul class="dis-f">
              <li><a href="?param=cp_info"><i>About us</i></a></li>
              <li><a href="?param=cp_story"><i>Story</i></a></li>
              <li><a href="?param=cp_news"><i>News</i></a></li>
              <li><a class="lang_on" href="?param=cp_location"><i>Contact.</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body">
            <div class="bd-lg">
                <div class="inner">
                    <div class="location_con">
                        <div class="main_title">
                            <span class="wow fadeInUp">Company</span>
                            <b class="wow fadeInUp" data-wow-delay="0.3s"><?php echo $this->utillLangController->lang("location","오시는길");?></b>
                        </div>
                        <div class="contents">
                          <div class="side_navi">
                            <ul id="sidebar">
                              <li onclick="change_tab(this, 1);"><a class="on"><?php echo $this->utillLangController->lang("location","본사 <span>(안양 사무실)</span>");?></a></li>
                              <li onclick="change_tab(this, 2);"><a><?php echo $this->utillLangController->lang("location","강남지사 <span>(강남 사무실)</span>");?></a></li>
                            </ul>
                          </div>
                          <div class="right">
                            <ul>
                              <li id="sec1" >
                                <h3><?php echo $this->utillLangController->lang("location","본사 <span>(안양 사무실)</span>");?></h3>
                                  <div class="map_wrap">
                                    <!-- * 카카오맵 - 지도퍼가기 -->
                                    <!-- 1. 지도 노드 -->
                                      <div id="daumRoughmapContainer1674015843612" class="root_daum_roughmap root_daum_roughmap_landing"></div>

                                      <!--
                                        2. 설치 스크립트
                                        * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
                                      -->
                                      <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

                                      <!-- 3. 실행 스크립트 -->
                                      <script charset="UTF-8">
                                        new daum.roughmap.Lander({
                                          "timestamp" : "1674015843612",
                                          "key" : "2dgpz",
                                          //"mapWidth" : "640",
                                          //"mapHeight" : "360"
                                        }).render();
                                      </script>
                                  </div>
                                  <div class="txt_wrap">
                                    <p><span>ADD.</span> <span><?php echo $this->utillLangController->lang("location","경기도 안양시 동안구 시민대로 248번길 25, 404호, 601-2호");?></span></p>
                                    <p><span>TEL.</span> <span><?php echo $this->utillLangController->lang("location","031.346.5497");?>(<?php echo $this->utillLangController->lang("ser06","대표번호");?>) / <?php echo $this->utillLangController->lang("location","031.346.3366");?>(<?php echo $this->utillLangController->lang("ser06","제품 및 견적 문의");?>)</span></p>
                                    <p><span>FAX.</span> <span>070.4759.5500</span></p>
                                    <p><span>EMAIL.</span>
                                       <span>
                                        <i><a href="mailto:contact@uvc.co.kr">contact@uvc.co.kr</a> (<?php echo $this->utillLangController->lang("location","문의");?>)</i>
                                        <i><a href="mailto:recruit@uvc.co.kr">recruit@uvc.co.kr</a> (<?php echo $this->utillLangController->lang("location","채용");?>)</i>
                                        <i><a href="mailto:edu@uvc.co.kr">edu@uvc.co.kr</a> (<?php echo $this->utillLangController->lang("location","교육");?>)</i>
                                        <i><a href="mailto:sales@uvc.co.kr">sales@uvc.co.kr</a> (<?php echo $this->utillLangController->lang("location","대표메일");?>)</i>
                                      </span>
                                    </p>
                                  </div>

                              </li>
                              <li id="sec2" >
                                <h3><?php echo $this->utillLangController->lang("location","강남지사 <span>(강남 사무실)</span>");?></h3>
                                  <div class="map_wrap">
                                    <!-- * 카카오맵 - 지도퍼가기 -->
                                    <!-- 1. 지도 노드 -->
                                    <div id="daumRoughmapContainer1674018803982" class="root_daum_roughmap root_daum_roughmap_landing"></div>

                                    <!--
                                      2. 설치 스크립트
                                      * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
                                    -->
                                    <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

                                    <!-- 3. 실행 스크립트 -->
                                    <script charset="UTF-8">
                                      new daum.roughmap.Lander({
                                        "timestamp" : "1674018803982",
                                        "key" : "2dgq6",
                                        //"mapWidth" : "640",
                                        //"mapHeight" : "360"
                                      }).render();
                                    </script>
                                  </div>
                                <div class="txt_wrap">
                                  <p><span>ADD.</span> <span><?php echo $this->utillLangController->lang("location","서울시 강남구 테헤란로 4길 38-5, 4층");?></span></p>

                                </div>

                                </div>
                              </li>
                            </ul>
                            
                        </div>

                    </div>
                        
                 </div>
            </div>
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>
    </div>
</body>

</html>