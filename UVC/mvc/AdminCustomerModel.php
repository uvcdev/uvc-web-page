<?php
    class AdminCustomerModel extends gf{
        private $json;
        private $dir;
        private $conn;

        function __construct($array){
            $this->json = $array["json"];
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
        // 함 수 : lang select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 언어 가져옴
        *********************************************************************/
        function lang_select() {
            $param = $this->json;

            $query = "SELECT * FROM lang";
            $result = $this->conn->db_select($query);

            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "언어 목록을 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /*********************************************************************  
        // 함 수 : Qna insert
        // 만든이: 박여진
        // 담당자: 
        // 설명: 문의 등록
        *********************************************************************/
        function inquiry_insert() {
            $param = $this->json;

            if(isset($param["password"])) {
                $query = "INSERT INTO inquiry(name, title, content, pw, lang_idx, reg_date) VALUES(";
                $query = $query.$this->null_check($param["name"]).", ";
                $query = $query.$this->null_check($param["title"]).", ";
                $query = $query.$this->null_check($param["content"]).", ";   
                $query = $query.$this->null_check($param["password"]).", ";
                $query = $query.$this->null_check($param["lang_idx"]).", ";
                $query = $query."now())";

                $result = $this->conn->db_insert($query);
            }
            else {
                $query = "INSERT INTO inquiry(name, title, content, lang_idx, reg_date) VALUES(";
                $query = $query.$this->null_check($param["name"]).", ";
                $query = $query.$this->null_check($param["title"]).", ";
                $query = $query.$this->null_check($param["content"]).", ";   
                $query = $query.$this->null_check($param["lang_idx"]).", ";
                $query = $query."now())";

                $result = $this->conn->db_insert($query);
            }
            
            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "문의 저장에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : Qna select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 문의 목록
        *********************************************************************/
        function inquiry_select() {
            $param = $this->json;
            if($this->value_check(array("page_size", "move_page"))){
            
                $page_size = (int)$param["page_size"];
                $move_page = (int)$param["move_page"];
                $query = "SELECT * FROM inquiry ORDER BY idx ASC, reg_date DESC LIMIT ".$page_size * ($move_page - 1).", ".$page_size;
                $result = $this->conn->db_select($query);

                if($result["result"] == "1") {
                    $this->result = $result;
                    $query = "SELECT COUNT(idx) AS total_count FROM inquiry";
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
        /********************************************************************* 
        // 함 수 : Qna select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 문의 목록
        *********************************************************************/
        function inquiry_detail() {
            $param = $this->json;
      
            $query = "SELECT * FROM inquiry WHERE idx = ".$this->null_check($param["idx"]);
            $result = $this->conn->db_select($query);

            if($result["result"] == "1") {
                $this->result = $result;
                // $query = "SELECT COUNT(idx) AS total_count FROM inquiry";
                // $total_result = $this->conn->db_select($query);
                // $this->result["total_count"] = $total_result["value"][0]["total_count"];
            } 
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "글 목록을 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : answer insert
        // 만든이: 박여진
        // 담당자: 
        // 설명: 답변 등록
        *********************************************************************/
        function modify_answer() {
            $param = $this->json;
          
            if($this->value_check(array("idx"))){
                $query = "UPDATE inquiry SET answer = '".$param["answer"]."', answer_date = now() WHERE idx = ".$param["idx"];
                $result = $this->conn->db_update($query);

                if($result["result"] == "1") {
                    $this->result = $result;
                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "답변 등록이 실패하였습니다.";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : inquiry Delete
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function inquiry_delete() {
            $param = $this->json;
            $idx = json_decode($param["idx"]);

            $query = "SELECT * FROM inquiry WHERE idx = ";
            for($i = 0; $i < count($idx); $i++) {
                if($i == 0) {
                    $query = $query.$idx[$i];
                }
                else {
                    $query = $query." or idx = ".$idx[$i];
                }
            }

            $result = $this->conn->db_select($query);

            if($result["result"] == "1") {
                $this->result = $result;

                $query = "SELECT * FROM inquiry_file WHERE inquiry_idx = ";
                for($i = 0; $i < count($idx); $i++) {
                    if($i == 0) {
                        $query = $query.$idx[$i];
                    }
                    else {
                        $query = $query." or idx = ".$idx[$i];
                    }
                }
    
                $result = $this->conn->db_select($query);

                if($result["result"] == "1") {
                    $query = "DELETE FROM inquiry WHERE idx = ";
                    for($i = 0; $i < count($idx); $i++) {
                        if($i == 0) {
                            $query = $query.$idx[$i];
                        }
                        else {
                            $query = $query." or idx = ".$idx[$i];
                        }
                    }
                    $result = $this->conn->db_delete($query);

                    $query = "DELETE FROM inquiry_file WHERE inquiry_idx = ";
                    for($i = 0; $i < count($idx); $i++) {
                        if($i == 0) {
                            $query = $query.$idx[$i];
                        }
                        else {
                            $query = $query." or idx = ".$idx[$i];
                        }
                    }
                    $result = $this->conn->db_delete($query);
                    
                }               
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "게시글 삭제에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : inquiry select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 사용자 페이지 게시판 목록
        *********************************************************************/
        function select_inquiry() {
            $param = $this->json;
   
            if($this->value_check(array("page_size", "move_page"))){
                $page_size =(int)$param["page_size"];
                $move_page = (int)$param["move_page"];
                $query = "SELECT * FROM inquiry ";
                $query = $query."WHERE lang_idx = ".$param["lang_idx"];
                if($param["search"] != "undefined" && isset($param["search"])){
                    if($param["search_kind"] == "all"){
                        $query = $query." and (title like '%".$param["search"]."%' or content like '%".$param["search"]."%')";
                    }else if($param["search_kind"] == "title"){
                        $query = $query." and title like '%".$param["search"]."%' ";
                    }else if($param["search_kind"] == "content"){
                        $query = $query." and content like '%".$param["search"]."%' ";
                    }
                }
                $query = $query." ORDER BY seq ASC, reg_date DESC LIMIT ".$page_size * ($move_page - 1).", ".$page_size;
                
                $result = $this->conn->db_select($query);
                if($result["result"] == "1"){
                    $this->result = $result;
                    $this->result["message"] = "게시글 검색 성공";
                    $query = "SELECT COUNT(idx) AS total_count FROM inquiry ";
                    $query = $query."WHERE lang_idx = ".$param["lang_idx"];
                    if($param["search"] != "undefined" && isset($param["search"])){
                        if($param["search_kind"] == "all"){
                            $query = $query." and (title like '%".$param["search"]."%' or content like '%".$param["search"]."%')";
                        }else if($param["search_kind"] == "title"){
                            $query = $query." and title like '%".$param["search"]."%' ";
                        }else if($param["search_kind"] == "content"){
                            $query = $query." and content like '%".$param["search"]."%' ";
                        }
                    }
                    $total_result = $this->conn->db_select($query);
                    $this->result["total_count"] = $total_result["value"][0]["total_count"]; 
                }else{
                    $this->result["result"] = "0";
                    $this->result["error_code"] = "301";
                    $this->result["message"] = "게시글 검색 실패";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
    }
?>