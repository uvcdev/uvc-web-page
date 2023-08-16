<?php
    class Session{
        private $project_name = "sample_";

        function start_session(){
            if(!isset($_SESSION)){
                session_cache_expire(1); //세션이 유지될 시간(분)
                session_start();
            }
        }

        /********************************************************************* 
        // 함수 설명- seesion 설정
        // $key : session의 key값
        // $value : session의 value값
        // 만든이: 안정환 만든날 : 2019-05-29
        // 수정이:
        *********************************************************************/
        function create_session($key, $value){
            $this->start_session();
            $_SESSION[$key] = $value; 
        }




        /********************************************************************* 
        // 함수 설명- admin 로그인이 되어있는지 확인
        // return true, false
        // 만든이: 안정환 만든날 : 2019-05-29
        // 수정이:
        *********************************************************************/
        function is_admin_login(){
            $this->start_session();
            if(isset($_SESSION[$this->project_name."admin_idx"])){ //$admin이 있으면 로그인중인상태
                return true;
            }else{
                $login_error = array(
                    "result"=>"0",
                    "error_code"=>"501",
                    "message"=>"관리자 로그인을 하지 않았습니다",
                    "value"=>null,
                );
                echo json_encode($login_error,JSON_UNESCAPED_UNICODE);
                return false;
            }
        }

        /********************************************************************* 
        // 함수 설명- 관리자 로그인성공
        // $idx : 관리자 idx
        // 만든이: 안정환 만든날 : 2019-05-29
        // 수정이:
        *********************************************************************/
        function success_admin_login($idx){
            // echo $this->project_name."\n";
            $this->create_session($this->project_name."admin_idx",$idx);
        }

        /********************************************************************* 
        // 함수 설명- 관리자 로그아웃, 세션 해제
        // 만든이: 안정환 만든날 : 2019-05-29
        // 수정이:
        *********************************************************************/
        function admin_logout(){
            $this->start_session();
            unset( $_SESSION[$this->project_name.'admin_idx']);
            $result = array(
                "result"=>"1",
                "error_code"=>"0",
                "message"=>"로그아웃 되었습니다.",
                "value"=>null,
            );
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }

        /********************************************************************* 
        // 함수 설명- 로그인이 되어있는지 확인(moveController에서 쓸 함수)
        // return true, false
        // 만든이: 안정환 
        // 수정이:
        *********************************************************************/
        function is_admin_login_php(){
            $this->start_session();
            if(isset($_SESSION[$this->project_name."admin_idx"])){ //$admin_idx이 있으면 로그인중인상태
                return true;
            }else{
                return false;
            }
        }


        /********************************************************************* 
        // 함수 설명- 로그인이 되어있는지 확인(model에서 사용할 함수)
        // return true, false
        // 만든이: 안정환 
        // 수정이:
        *********************************************************************/
        function is_login(){
            $this->start_session();
            if(isset($_SESSION[$this->project_name."user_idx"])){
                return true;
            }else{
                $login_error = array(
                    "result"=>"0",
                    "error_code"=>"100",
                    "message"=>"로그인을 하지 않았습니다",
                    "value"=>null,
                );
                echo json_encode($login_error,JSON_UNESCAPED_UNICODE);
                return false;
            }
        }
        /********************************************************************* 
        // 함수 설명- 로그인이 되어있는지 확인(moveController에서 쓸 함수)
        // return true, false
        // 만든이: 안정환 
        // 수정이:
        *********************************************************************/
        function is_login_php(){
            $this->start_session();
            if(isset($_SESSION[$this->project_name."user_idx"])){ //$user_idx이 있으면 로그인중인상태
                return true;
            }else{
                return false;
            }
        }
        /********************************************************************* 
        // 함수 설명- 로그인 계정의 idx 가져오기(로그인된 상태가 아니면 0 return)
        // return true, false
        // 만든이: 안정환 
        // 수정이:
        *********************************************************************/
        function get_user_idx(){
            $this->start_session();
            if(isset($_SESSION[$this->project_name."user_idx"])){ //$admin이 있으면 로그인중인상태
                return $_SESSION[$this->project_name."user_idx"];
            }else{
                return 0;
            }
        }

        /********************************************************************* 
        // 함수 설명- 사용자 로그인성공
        // $idx : 사용자 idx
        // 만든이: 안정환 
        // 수정이:
        *********************************************************************/
        function success_user_login($idx){
            // echo $this->project_name."\n";
            $this->create_session($this->project_name."user_idx",$idx);
        }

        /********************************************************************* 
        // 함수 설명- 사용자 로그아웃, 세션 해제
        // 만든이: 안정환 
        // 수정이:
        *********************************************************************/
        function user_logout(){
            $this->start_session();
            unset( $_SESSION[$this->project_name.'user_idx']);
            echo 1;
        }
    }
?>
