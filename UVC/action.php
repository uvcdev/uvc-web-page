<?php
    $Root = $_SERVER["DOCUMENT_ROOT"]; 
    $dir = $Root.'/UVC/'; 
	include_once($dir.'vendor/autoloader_register.php');    
	$DirInc = $dir.'inc'; 
	$DirApp = $dir.'app'; 
    $MVC = $dir.'mvc'; 
    $project_name = "UVC";
    $upload_path = $project_name."/_upload/";
    $no_image = $project_name."/page/adm/img/no_image.jpg";

    $autoloader = new AutoLoaderRegister([$MVC,$DirInc,$DirApp]);//include_once에 있는 클래스
   
    /*********************************************************************  
        // 설  명 : 메일 보내는 내용이 있을 떄 사용
        // 담당자 : 
    *********************************************************************/
    $hostname=$_SERVER["HTTP_HOST"];
    $host=null;
    $split = explode(".",$hostname);
    if($hostname=="da.com" || $hostname=="lb.com" || $hostname=="192"){
        $email = "lbcontents@naver.com";
    }else{
        $email = "test@gmail.com"; //이 부분 수정
    }

    $email = "sales@uvc.co.kr";

    if(!isset($json["move_page"])){
        $json["move_page"]="1";
    }
    $db = new db("kyungmin7306");   //db사용할꺼면 주석해제 후 세팅
    $array = array(
        "json"=>$json,
        "sumnote"=>$sumnote,
        "dir"=>$dir, 
        "db"=>new AppDB($db), //db사용할꺼면 주석해제 후 세팅
        "version"=>"?v=".date("Y-m-d H:i:s"),
        "to_email"=>$email,
        "data"=>json_encode($json),
        "project_name" => $project_name,
        "no_image" => $no_image,
        "upload_path" => $upload_path,
    );
    $app = new App($array);

    
?>
