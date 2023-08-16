<?php
    class AdminModel extends gf{
        private $json;
        private $dir;
        private $conn;

        function __construct($array){
            $this->json = $array["json"];
            $this->dir = $array["dir"];
            $this->conn = $array["db"];
            $this->result = array(
                "result" => null,
                "error_code" => null,
                "message" => null,
                "value" => null,
            );
        }

        /********************************************************************* 
        // 함 수 : empty 체크
        // 설 명 : array("id","pw")
        // 만든이: 안정환
        // 담당자: 
        *********************************************************************/
        function value_check($check_value_array){
            $object = array(
                "param"=>$this->json,
                "array"=>$check_value_array
            );
            $check_result = $this->empty_check($object);
            if($check_result["result"]){//param 값 체크 비어있으면 실행 안함
                if($check_result["value_empty"]){//필수 값이 비었을 경우
                    $this->result["result"]="0";
                    $this->result["error_code"]="101";
                    $this->result["message"]=$check_result["value_key"]."가 비어있습니다.";
                    return false;
                }else{
                    return true;
                }
            }else{
                $this->result["result"]="0";
                $this->result["error_code"]="100";
                $this->result["message"]=$check_result["value"]." 가 없습니다.";
                return false;
            }
        }

        /********************************************************************* 
        // 함 수 : login()
        // 설 명 : 관리자로그인
        // 담당자: 
        *********************************************************************/
        function login(){
            $param = $this->json;
            // print_r($param);
            if($this->value_check(array("id","pw"))){
                $param = $this->null_check_v3($param,array("id","pw"));
                $sql = "select * from admin where id=".$param["id"]." and pw=".$param["pw"];
                $result = $this->conn->db_select($sql);
                if($result["result"] == "1"){ //쿼리가 성공이면
                    $list = $result["value"];
                    if($list){
                        $session=new Session();
                        $session->success_admin_login($list[0]["idx"]);
                        $this->result = $result;
                        $this->result["message"] = "관리자 로그인 성공";
                    }else{
                        $this->result["result"]="0";
                        $this->result["error_code"]="500";
                        $this->result["message"]="계정이 존재하지 않습니다.";
                    }
                }else{
                    $this->result = $result;
                }
            }

            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        /********************************************************************* 
        // 함 수 : logout()
        // 설 명 : 관리자로그아웃. 세션에서 로그아웃관리
        // 담당자: 
        *********************************************************************/
        function logout(){
            $session = new Session();
            $session->admin_logout();
        }

        /********************************************************************* 
        // 함 수 : request_lang()
        // 설 명 : 프로젝트에 적용되는 언어 목록 가져오기
        // 담당자: 
        *********************************************************************/
        function request_lang(){
            $sql = "select * from lang";
            $result = $this->conn->db_select($sql);
            if($result["result"] == "1"){
                $this->result = $result;
                $this->result["message"] = "프로젝트 언어 검색 성공";
            }else{
                $this->result["result"] = "0";
                $this->result["error_code"] = "301";
                $this->result["message"] = "프로젝트 언어 검색 실패";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        
    }
?>