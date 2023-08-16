<?php
    class NoticeModel extends gf{
        private $json;
        private $dir;
        private $conn;

        function __construct($array){
            $this->json = $array["json"];
            $this->dir = $array["dir"];
            $this->conn = $array["db"];
            $this->sumnote = $array["sumnote"];
            $this->project_name = $array["project_name"];
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
        // 함 수 : main notice Select
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function main_notice_select() {
            $param = $this->json;

            $query = "SELECT * FROM notice where lang_idx = ".$param["lang_idx"]." LIMIT 0, 3";
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
        // 함 수 : notice Select
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function notice_select() {
            $param = $this->json;
            if($this->value_check(array("page_size", "move_page"))){
            
                $page_size = (int)$param["page_size"];
                $move_page = (int)$param["move_page"];
                $query = "SELECT * FROM notice WHERE lang_idx = ".$param["lang_idx"]." ORDER BY date desc LIMIT ".$page_size * ($move_page - 1).", ".$page_size;
                $result = $this->conn->db_select($query);

                if($result["result"] == "1") {
                    $this->result = $result;
                    $query = "SELECT COUNT(idx) AS total_count FROM notice WHERE lang_idx = ".$param["lang_idx"];
                    $total_result = $this->conn->db_select($query);
                    $this->result["total_count"] = $total_result["value"][0]["total_count"];
                } 
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "글 목록을 불러오는데 실패하였습니다.";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        function notice_select1() {
            $param = $this->json;
            // if($this->value_check(array("page_size", "move_page"))){
            
              
                $query = "SELECT * FROM notice WHERE lang_idx = ".$param["lang_idx"]." ORDER BY date asc";
                $result = $this->conn->db_select($query);

                if($result["result"] == "1") {
                    $this->result = $result;
                    $query = "SELECT COUNT(idx) AS total_count FROM notice WHERE lang_idx = ".$param["lang_idx"];
                    $total_result = $this->conn->db_select($query);
                    $this->result["total_count"] = $total_result["value"][0]["total_count"];
                } 
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "글 목록을 불러오는데 실패하였습니다.";
                }
            // }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : detail_board
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function detail_board() {
            $param = $this->json;
     
            $query = "SELECT * FROM notice WHERE idx = ".$this->null_check($param["idx"])." and lang_idx = ".$param["lang_idx"];
            $result = $this->conn->db_select($query);
            
            if($result["result"] == "1"){
                $this->result = $result;
                $query = "SELECT * FROM notice_file WHERE key_code = ".$this->null_check($result["value"][0]["key_code"])." and lang_idx = ".$param["lang_idx"];
                $file_result = $this->conn->db_select($query);
            
                for($i = 0; $i < count($result["value"]); $i++) {
                    for($j = 0; $j < count($file_result["value"]); $j++) {
                        if($result["value"][$i]["key_code"] == $file_result["value"][$j]["key_code"]){
                            if(!isset($this->result["value"][$i]["file"])){
                                $this->result["value"][$i]["file"] = array();
                            }
                            array_push($this->result["value"][$i]["file"], $file_result["value"][$j]);
                        }
                    }
                }
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "글 정보를 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : near by notice
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function neighbor_post() {
            $param = $this->json;
     
            $query = "SELECT idx, title FROM notice ";
            $query = $query."WHERE lang_idx = ".$param["lang_idx"];
            $query = $query." AND idx < ".$this->null_check($param["idx"])." ORDER BY date DESC LIMIT 1";
            $previous_result = $this->conn->db_select($query);

            $query = "SELECT idx, title FROM notice ";
            $query = $query."WHERE lang_idx = ".$param["lang_idx"];
            $query = $query." AND idx > ".$this->null_check($param["idx"])." ORDER BY date ASC LIMIT 1";
            $next_result = $this->conn->db_select($query);

            if($previous_result["result"] == "1" && $next_result["result"] == "1") {
                $this->result = $next_result;
                $this->result["message"] = "게시글 검색 성공";
                $this->result["previous"] = $previous_result["value"];
                $this->result["next"] = $next_result["value"];
            }
            else {
                $this->result["result"] = "0";
                $this->result["error_code"] = "301";
                $this->result["message"] = "게시글 검색 실패";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : 상세보기 파일 다운로드 함수
        // 설 명 : 
        // 만든이: 조경민
        *********************************************************************/
        function file_download(){
            $param = $this->json;
            $orign = $param;
            $column = array('realname', 'url');
            $check_parameter = $this->column_check($orign, $column);
            if ($check_parameter) {
                include_once($this->dir . "lib/download/Download.php");
                if (new Download($param["download_type"], $param["url"], $param["realname"], $this->dir)) {
                    // $this->result["result"] = "0";
                    // $this->result["error_code"] = "1";
                    // $this->result["message"] = "DB오류 관리자에게 문의해주세요";
                    // echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $this->result["result"] = "0";
                $this->result["error_code"] = "1";
                $this->result["message"] = "DB오류 관리자에게 문의해주세요";
                echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
            }
            echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
        }
    }
?>