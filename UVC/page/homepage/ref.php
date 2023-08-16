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

    <script type="text/javascript" src="<?php echo $this->project_name;?>/page/homepage/js/ref.js<?php echo $version;?>"></script>
    

</head>
<body>
    <div class="wrap" style="overflow:inherit;">        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <?php include_once $this->dir."page/homepage/include/ref-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>REFERENCE</h3>
            <ul class="dis-f">
              <li><a href="?param=ref" class="lang_on"><i>Reference.</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body">
            <div class="bd-lg">
                <div class="inner">
                      <div class="main_title">
                          <!-- <span class="wow fadeInUp">REFERENCE</span> -->
                          <b class="wow fadeInUp" data-wow-delay="0.3s">Reference</b>
                      </div>
                      <div class="news_con">
                        <ul class="row" data-wrap="wrap" id="wrap">
                          <!-- <li class="col-md-4 col-xs-6">
                            <div class="con_wrap" onClick="location.href='?param=ref_view'">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/news_thum.png" alt="뉴스 썸네일 예시"/></div>
                              <div class="txt_wrap">
                                <p>레퍼런스 자료 게시판입니다.</p>
                                <span>23.01.18</span>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-6">
                            <div class="con_wrap">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/news_thum.png" alt="뉴스 썸네일 예시"/></div>
                              <div class="txt_wrap">
                                <p>레퍼런스 자료 게시판입니다.</p>
                                <span>23.01.18</span>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-6">
                            <div class="con_wrap">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/news_thum.png" alt="뉴스 썸네일 예시"/></div>
                              <div class="txt_wrap">
                                <p>레퍼런스 자료 게시판입니다.</p>
                                <span>23.01.18</span>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-6">
                            <div class="con_wrap">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/news_thum.png" alt="뉴스 썸네일 예시"/></div>
                              <div class="txt_wrap">
                                <p>레퍼런스 자료 게시판입니다.</p>
                                <span>23.01.18</span>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-4 col-xs-6">
                            <div class="con_wrap">
                              <div class="img_wrap"><img src="UVC/page/homepage/img/sub/news_thum.png" alt="뉴스 썸네일 예시"/></div>
                              <div class="txt_wrap">
                                <p>레퍼런스 자료 게시판입니다.</p>
                                <span>23.01.18</span>
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
          <li class="col-md-4 col-xs-6" data-copy="copy">
            <div class="con_wrap">
              <div class="img_wrap"><img data-attr="image"/></div>
              <div class="txt_wrap">
                <p data-attr="title"></p>
                <span data-attr="reg_date"></span>
              </div>
            </div>
          </li>
        </div>
    </div>

</body>

</html>
