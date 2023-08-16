<?php
    class MoveController{
        private $param;
        private $dir;
        private $version;

        function __construct($array){
            $this->param = $array["json"];
            $this->dir = $array["dir"];
            $this->version = $array["version"];
            $this->data = $array["data"];
            $this->project_name = $array["project_name"];
            $this->no_image = $array["no_image"];
            $this->upload_path = $array["upload_path"];
            $this->utillLangController = new UtillLangController($array);

            /*********************************************************************
            // 설 명 : 일반페이지와 관리자페이지 이동 구분
            // 담당자 :   
            *********************************************************************/
            if(isset($this->param["param"])){
                if($this->param["param"] == "adm"){
                    // $this->session = new Session();
                    $this->move_adm();
                }else{
                    $this->move();//예외처리:param이 adm이 아니라면 일반페이지로 이동
                }
            }else{
                $this->move();
            }
        }

        /********************************************************************* 
        // 함 수 : move()
        // 설 명 : 페이지이동(사용자)
        // 담당자 :   
        *********************************************************************/
        function move(){
            $dir = $this->dir;
            $version = $this->version; //페이지 안의 css's version사용

            $tab = null;
            if(isset($this->param["tab"])){
                $tab = $this->param["tab"];
            }
            $param = null;
            if(isset($this->param["param"])){
                $param = $this->param["param"];
                $file_isset = $dir . "page/homepage/".$param.".php";
                if(is_file($file_isset)){
                    include_once $file_isset;
                }else{
                    include_once $dir."page/homepage/index.php";
                }
            }else{
                
                include_once $dir."page/homepage/index.php";
            }
        }

        /********************************************************************* 
        // 함 수 : move_adm()
        // 설 명 : 페이지이동(관리자)
        // 담당자 : 조경민  
        *********************************************************************/
        function move_adm(){
            $dir = $this->dir;
            $version = $this->version;
            /********************************************************************* 
            // $browser 익스플로러인지 확인 후, 크롬사용권유 (관리자로그인페이지)
            *********************************************************************/
            $browser = null;
            $param = null;
            if(isset($this->param["browser"])) {
                $browser = $this->param["browser"];
            }
            
            $userAgent = $_SERVER["HTTP_USER_AGENT"];
            if(preg_match("/MSIE*/", $userAgent)){
                $browser = "Explorer";                              
            }elseif(preg_match("/Trident*/", $userAgent) &&  preg_match("/rv:11.0*/", $userAgent) &&  preg_match("/Gecko*/", $userAgent)){
                $browser = "Explorer";
            }else{
                $browser = "no_ie";
            }
            /********************************************************************* 
            // 관리자페이지
            *********************************************************************/
            if(isset($this->param["param1"])){
                $session = new Session();
                if($session->is_admin_login_php()){
                    $param1 = $this->param["param1"];
                    $file_isset = $dir."page/adm/adm_".$param1.".php";
                    if(is_file($file_isset)){
                        include_once $file_isset;
                    }else{
                        include_once $dir."page/adm/index.php";
                    }
                }else{
                    include_once $dir."page/adm/index.php";
                }
            }else{
                include_once $dir."page/adm/index.php";
            }
        }
    }
?>
