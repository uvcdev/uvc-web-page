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
    <script type="text/javascript" src="<?php echo $this->project_name;?>/page/homepage/js/privacy.js<?php echo $version;?>"></script>

    

</head>
<body>
    <div class="wrap wrap02">        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <div class="sub-body">

          <div class="inner">
              <div class="bd-lg">
                <div class="policy_con">
                    <h3><?php echo $this->utillLangController->lang("ser06","개인정보처리방침");?></h3>
                    <div class="policy_in" id="terms_content">
                    
                    </div>
                </div>
              </div>
          </div>
         
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>
    </div>
</body>

</html>
