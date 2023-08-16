<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

	<title>UVC 관리자페이지</title>
  
	<!-- CSS -->
    <?php include_once $this->dir."page/adm/include/common_css.php"; ?>

    <!-- SCRIPT -->
    <?php include_once $this->dir."page/adm/include/common_js.php"; ?>
    <script src="<?php echo $this->project_name;?>/page/adm/js/index.js<?php echo $version; ?>"></script>

    

</head>
<body>
    <div class="wrap">        
        <!-- 관리자 로그인 -->
        <div class="admin_bg bg-pale">
            <div class="admin_loginBox clf">
                <div class="admin_loginCon ">
                    <h3><a><img src="UVC/page/homepage/img/logo-color.png"></a></h3>
                    <p>UVC 관리자페이지입니다.</p>
                </div>
                <div class="admin_loginForm">
                    <p class="logintext">ADMIN LOGIN</p>
                    <div class="admin_loginInputform">
                        <input type="text" placeholder="아이디 입력" id="id">
                        <input type="password" placeholder="비밀번호 입력" id="pw" onkeydown="Enter_Check();">
                        <button onclick="login();">로그인 하기</button>
                    </div>
                </div>
            </h3>
        </div>

    </div>
</body>
</html>
