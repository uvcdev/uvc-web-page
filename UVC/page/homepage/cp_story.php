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
    <script type="text/javascript" src="<?php echo $this->project_name;?>/page/homepage/js/notice.js<?php echo $version;?>"></script>

    

</head>
<body>
    <div class="wrap">        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <?php include_once $this->dir."page/homepage/include/cp-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>COMPANY</h3>
            <ul class="dis-f">
              <li><a href="?param=cp_info"><i>About us</i></a></li>
              <li><a class="lang_on" href="?param=cp_story"><i>Story.</i></a></li>
              <li><a href="?param=cp_news"><i>News</i></a></li>
              <li><a href="?param=cp_location"><i>Contact</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body">
            <div class="bd-lg">
                <div class="inner">
                  <div class="main_title">
                      <span class="wow fadeInUp">Company</span>
                      <b class="wow fadeInUp" data-wow-delay="0.3s">Story</b>
                  </div>
                  <div class="notice_con">
                      <ul data-wrap="wrap" id="wrap">
                          <!-- <li onClick="location.href='?param=cp_story_view'">
                              <div class="con_wrap">
                                  <div class="img_wrap"><div class="img_in"></div></div>
                                  <div class="txt_wrap">
                                      <b class="title">홈페이지 스토리 제목 삽입 영역입니다.</b>
                                      <p>새로운 모습으로 새단장한 유비씨입니다. 앞으로도 많은 관심과 성원 부탁드립니다.</p>
                                      <span>2023.01.25</span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="con_wrap">
                                  <div class="img_wrap"><div class="img_in"></div></div>
                                  <div class="txt_wrap">
                                      <b class="title">홈페이지 스토리 제목 삽입 영역입니다.</b>
                                      <p>새로운 모습으로 새단장한 유비씨입니다. 앞으로도 많은 관심과 성원 부탁드립니다.</p>
                                      <span>2023.01.12</span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="con_wrap">
                                  <div class="img_wrap"><div class="img_in"></div></div>
                                  <div class="txt_wrap">
                                      <b class="title">홈페이지 스토리 제목 삽입 영역입니다.</b>
                                      <p>새로운 모습으로 새단장한 유비씨입니다. 앞으로도 많은 관심과 성원 부탁드립니다.</p>
                                      <span>2022.12.30</span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="con_wrap">
                                  <div class="img_wrap"><div class="img_in"></div></div>
                                  <div class="txt_wrap">
                                      <b class="title">홈페이지 스토리 제목 삽입 영역입니다.</b>
                                      <p>새로운 모습으로 새단장한 유비씨입니다. 앞으로도 많은 관심과 성원 부탁드립니다.</p>
                                      <span>2022.08.30</span>
                                  </div>
                              </div>
                          </li> -->
                      </ul>
                      <div class="pagination">
                          <div class="page">
                              <ul id="paging" style="display:none;">
                                  <!-- <li><div class="navi"><img src="UVC/page/homepage/img/arrow_prev.png" alt=""/></div></li>
                                  <li><div class="navi"><img src="UVC/page/homepage/img/arrow_prev2.png" alt=""/></div></li>
                                  <li><p class="page_on">1</p></li>
                                  <li><p>2</p></li>
                                  <li><p>3</p></li>
                                  <li><div class="navi"><img src="UVC/page/homepage/img/arrow_next2.png" alt=""/></div></li>
                                  <li><div class="navi"><img src="UVC/page/homepage/img/arrow_next.png" alt=""/></div></li> -->
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>

        <div style="display:none;">
            <li data-copy="copy">
                <div class="con_wrap">
                    <div class="img_wrap"><div class="img_in" data-attr="image"></div></div>
                    <div class="txt_wrap">
                        <b class="title" data-attr="title"></b>
                        <p data-attr="content"></p>
                        <span data-attr="reg_date"></span>
                    </div>
                </div>
            </li>
        </div>
    </div>
</body>

</html>
