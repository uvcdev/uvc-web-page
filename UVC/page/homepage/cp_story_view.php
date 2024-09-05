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
    <script type="text/javascript" src="<?php echo $this->project_name;?>/page/homepage/js/notice_view.js<?php echo $version;?>"></script>

    

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
              <li><a href="?param=cp_info">About us</a></li>
              <li><a  class="lang_on" href="?param=cp_story"><i>Story.</i></a></li>
              <li><a href="?param=cp_news">News.</a></li>
              <li><a href="?param=cp_location">Contact</a></li>
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
                      <div class="news_view_con">
                        <div class="news_wrap">
                            <div class="news_top">
                                <table class="table_news">
                                    <tr>
                                        <td class="news_title"><h3 id="title"></h3></td>
                                        <td class="news_date" id="date"></td>
                                    </tr>
                                </table>
                                <div  id="file_wrap">
                                    <!-- <p class="table_add_file">
                                        <span><img src="UVC/page/homepage/img/sub/disc.png" alt="디지털트윈 첨부파일이미지"/></span>
                                        <span class="news_file">첨부파일 제목<span>
                                    </p>
                                    <p class="table_add_file">
                                        <span><img src="UVC/page/homepage/img/sub/disc.png" alt="디지털트윈 첨부파일이미지"/></span>
                                        <span class="news_file">첨부파일 제목<span>
                                    </p> -->
                                </div>
                            </div>
                            <div class="news_con">
                                <div class="new_con_text" id="content">
                                 
                                </div>
                            </div>
                        </div>
                        <div class="news_arrow">
                            <table class="table_arrow">
                                <tr class="prev">
                                    <td>PREV<span></span></td> 
                                    <td class="prev_title" id="prev_post"></td>
                                </tr>
                                <tr class="next">
                                    <td>NEXT<span></span></td> 
                                    <td class="next_title" id="next_post"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="news_list_btn">
                            <span><a href="?param=cp_story">LIST</a></span> 
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>

        <div style="display:none;">
            <p class="table_add_file" id="file_copy">
                <span><img src="UVC/page/homepage/img/sub/disc.png" alt="디지털트윈 첨부파일이미지"/></span>
                <span class="news_file" data-title><span>
            </p>
        </div>
        
    </div>
</body>

</html>