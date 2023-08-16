<?php
    class CertifyModel extends gf{
        private $json;
        private $dir;
        private $conn;

        function __construct($array){
            $this->json = $array["json"];
            $this->sumnote = $array["sumnote"];
            $this->dir = $array["dir"];
            $this->project_name = $array["project_name"];
            $this->conn = $array["db"];
            $this->result = array(
                "result" => null,
                "error_code" => null,
                "message" => null,
                "value" => null,
            );

            $this->common_func = new CommonFunc($array);
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
        // 함 수 : category select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 대분류 카테고리 목록 가져옴
        *********************************************************************/
        function category_select() {
            $param = $this->json;
            
            $query = "SELECT * FROM category WHERE lang_idx = ".$param["lang_idx"]." and category= ".$this->null_check($param["category"])." ORDER BY cast(name AS signed) DESC";
            $result = $this->conn->db_select($query);

            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "목록을 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : certify Select
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function certify_select(){
            $param = $this->json;
            $query = "SELECT * FROM certify WHERE lang_idx = ".$param["lang_idx"]."  and category= ".$this->null_check($param["category"])." ORDER BY seq ASC, reg_date DESC";
            $result = $this->conn->db_select($query);
            
            if($result["result"] == "1") {
                $this->result = $result;
            } 
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "글 목록을 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        /********************************************************************* 
        // 함 수 : partner Select
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function partner_select(){
            $param = $this->json;
            $query = "SELECT * FROM partner WHERE lang_idx = ".$param["lang_idx"]." ORDER BY seq ASC, reg_date DESC";
            $result = $this->conn->db_select($query);
            
            if($result["result"] == "1") {
                $this->result = $result;
            } 
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "글 목록을 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
    }
?>
