<?php
    class AdminHistoryModel extends gf{
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
        // 함 수 : category insert
        // 만든이: 박여진
        // 담당자: 
        // 설명: 대분류 카테고리 등록
        *********************************************************************/
        function category_insert() {
            $param = $this->json;
            $lang_idx = json_decode($param["lang_idx"]);

            $query = "INSERT INTO history_category(name, lang_idx, reg_date) VALUES(";
            $query = $query.$this->null_check($param["name"]).", ";      
            $query = $query.$this->null_check($lang_idx).", ";
            $query = $query."now())";

            $result = $this->conn->db_insert($query);

            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "저장에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : category select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 대분류 카테고리 목록 가져옴
        *********************************************************************/
        function category_select() {
            $param = $this->json;
            
            $query = "SELECT * FROM history_category WHERE lang_idx = ".$param["lang_idx"]." order by idx desc";
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
        // 함 수 : category delete
        // 만든이: 박여진
        // 담당자: 
        // 설명: 대분류 카테고리 삭제
        *********************************************************************/
        function category_delete() {
            $param = $this->json;
            $idx = json_decode($param["idx"]);
       
            $query = "DELETE FROM history_category WHERE idx = ";
            for($i = 0; $i < count($idx); $i++) {
               
                if($i == 0) {
                    $query = $query.$idx[$i];
                }
                else {
                    $query = $query." or idx = ".$idx[$i];
                }
            }
            $result = $this->conn->db_delete($query);

            if($result["result"] == 1) {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "대분류 삭제에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : category detail
        // 만든이: 박여진
        // 담당자: 
        // 설명: 대분류 카테고리 수정 시 데이터 들고옴
        *********************************************************************/
        function category_detail() {
            $param = $this->json;

            $query = "SELECT * FROM history_category WHERE idx = ".$param["idx"];
            $result = $this->conn->db_select($query);

            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "글 정보를 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : category modify
        // 만든이: 박여진
        // 담당자: 
        // 설명: 대분류 카테고리 수정
        *********************************************************************/
        function category_modify() {
            $param = $this->json;

            $query = "UPDATE history_category SET name = '".$param["name"]."', modify_date = now() WHERE idx = ".$param["idx"];
            $result = $this->conn->db_update($query);

            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "대분류 수정에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : request category
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 등록에서 대분류 목록 가져오기
        *********************************************************************/  
        function request_category() {
            $query = "SELECT idx, name, lang_idx FROM history_category ORDER BY seq ASC, reg_date DESC";
            $result = $this->conn->db_select($query);
            
            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "게시글을 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : history insert
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 등록
        *********************************************************************/  
        function history_insert() {
            $param = $this->json;
          
            $history = json_decode($param["data"], true);
            for($i = 0; $i < count($history); $i++) {
                for($l = 0; $l < count($history[$i]); $l++){
                    $history_data = $history[$i][$l];
                    if($history_data["year"] != "") {
                        $check_query = "SELECT year, idx FROM history_year WHERE year = ".$this->null_check($history_data["year"])." AND lang_idx = ".$history_data["lang_idx"];
                        $check_result = $this->conn->db_select($check_query);
                        if(count($check_result["value"]) == 0) {
                            $year_query = "INSERT INTO history_year(category_idx, year, title, lang_idx, reg_date) VALUES(";
                            $year_query = $year_query.$history_data["category_idx"].", ";
                            $year_query = $year_query.$this->null_check($history_data["year"]).", ";
                            $year_query = $year_query.$this->null_check($history_data["title"]).", ";
                            $year_query = $year_query.$history_data["lang_idx"].", ";
                            $year_query = $year_query."now())";
        
                            $year_result = $this->conn->db_insert($year_query);
                        }
                        else {
                            $year_result["value"] = $check_result["value"][0]["idx"];
                            $query = "UPDATE history_year SET year = ".$history_data["year"];
                            $query = $query." WHERE idx = ".$year_result["value"];
                            $this->conn->db_update($query);
                        }
        
                        $month_arr = $history_data["month"];
                        
                        for($j = 0; $j < count($month_arr); $j++) {
                            // $check_query = "SELECT idx, year_idx, month FROM history_month";
                            // $check_query = $check_query." WHERE year_idx = ".$year_result["value"];
                            // $check_query = $check_query." AND month = ".$this->null_check($month_arr[$j]["month"]);
        
                            // $check_result = $this->conn->db_select($check_query);
                            // if(count($check_result["value"]) == 0) {
                            //     $month_query = "INSERT INTO history_month(year_idx, month) VALUES(";
                            //     $month_query = $month_query.$year_result["value"].", ";
                            //     $month_query = $month_query.$this->null_check($month_arr[$j]["month"]).")";
        
                            //     $month_result = $this->conn->db_insert($month_query);
                            // }
                            // else {
                            //     $month_result["value"] = $check_result["value"][0]["idx"];
                            // }
        
                            $content_arr = $month_arr[$j]["content"];
                            if(count($content_arr) != null) {
                                $content_query = "INSERT INTO history_content(year_idx, content, lang_idx) VALUES(";
                                for($k = 0; $k < count($content_arr); $k++) {
                                    // $content_query = $content_query.$month_result["value"].", ";
                                    $content_query = $content_query.$year_result["value"].", ";
                                    $content_query = $content_query.$this->null_check($content_arr[$k]).", ";
                                    $content_query = $content_query.$history_data["lang_idx"]."),(";
                                }
                            }
                            $content_query = substr($content_query, 0, -2);
                            $content_result = $this->conn->db_insert($content_query);
                        }
                    }
                    else {
                        $this->result["result"] = "0";
                        $this->result["message"] = "년도를 입력해주세요.";
                    }  
                }  
            }
            if($content_result["result"] == "1") {
                $this->result = $content_result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "게시글 저장에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : history select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 목록 가져오기
        *********************************************************************/
        function history_select() {
            $param = $this->json;

            if($this->value_check(array("page_size", "move_page", "lang_idx"))){
                $page_size =(int)$param["page_size"];
                $move_page = (int)$param["move_page"];

                $query = "SELECT * FROM history_year";
                $query = $query." WHERE lang_idx = ".$param["lang_idx"];
                $query = $query." ORDER BY year DESC LIMIT ".$page_size * ($move_page - 1).",".$page_size;
                
                $result = $this->conn->db_select($query);

                if($result["result"] == "1") {
                    $this->result = $result;
                   
                    if(count($result["value"]) > 0) {
                        // month
                        // $query = "SELECT * FROM history_month";
                        // $query = $query." WHERE year_idx in(";
                        // for($i = 0; $i < count($result["value"]); $i++) {
                        //     $query = $query.$result["value"][$i]["idx"].",";
                        // }
                        // $query = substr($query, 0, -1);
                        // $query = $query.") ";
                        // $query = $query."ORDER BY cast(month AS signed) DESC";
    
                        // $month_result = $this->conn->db_select($query);

                        // content 
                        $query = "SELECT * FROM history_content";
                        $query = $query." WHERE year_idx in(";
                        for($i = 0; $i < count($result["value"]); $i++){
                            $query = $query.$result["value"][$i]["idx"].",";
                        }
                        $query = substr($query, 0, -1);
                        $query = $query.")";
                        $content_result = $this->conn->db_select($query);

                        // category
                        $query = "SELECT * FROM history_category";
                        $query = $query." WHERE idx in(";
                        for($i = 0; $i < count($result["value"]); $i++){
                            $query = $query.$result["value"][$i]["category_idx"].",";
                        }
                        $query = substr($query, 0, -1);
                        $query = $query.")";
                        $category_result = $this->conn->db_select($query);

                        for($i = 0; $i < count($result["value"]); $i++) {
                            // $month_index = 0;

                            // for($j = 0; $j < count($month_result["value"]); $j++) {
                            //     if($result["value"][$i]["idx"] == $month_result["value"][$j]["year_idx"]) {
                            //         $this->result["value"][$i]["month_arr"][$month_index]["month"] = $month_result["value"][$j]["month"];
                                    $content_arr = array();
                                    for($k = 0; $k < count($content_result["value"]); $k++){
                                        if($result["value"][$i]["idx"] == $content_result["value"][$k]["year_idx"]){
                                            array_push($content_arr, $content_result["value"][$k]["content"]);
                                        }
                                    }
                                    $this->result["value"][$i]["content_arr"] = $content_arr;
                            //         $month_index++;
                            //     }
                            // }
                            for($j = 0; $j < count($category_result["value"]); $j++) {
                                if($result["value"][$i]["category_idx"] == $category_result["value"][$j]["idx"]) {
                                    
                                    if(!isset($this->result["value"][$i]["category_name"])){
                                        $this->result["value"][$i]["category_name"] = null;
                                    }
                                
                                    $this->result["value"][$i]["category_name"] = $category_result["value"][$j]["name"];
                                }
                            }
                        }

                        $query = "SELECT count(*) as total_count FROM history_year WHERE lang_idx = ".$param["lang_idx"];
                        $result = $this->conn->db_select($query);
                        $this->result["total_count"] = $result["value"][0]["total_count"];
                    }
                    else {
                        $this->result["total_count"] = 0;
                        $this->result["value"] = array();
                    }
                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "게시글 불러오는데 실패하였습니다.";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : history detail
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 수정 시 게시글 정보
        *********************************************************************/
        function history_detail() {
            $param = $this->json;
           
            if($this->value_check(array("year"))){
                $query = "SELECT * FROM history_year";
                $query = $query." WHERE year = ".$this->null_check($param["year"]);
                $query = $query." ORDER BY lang_idx ASC";

                $result = $this->conn->db_select($query);

                if($result["result"] == "1") {
                    $this->result = $result;

                    if(count($result["value"]) > 0) {
                        // $query = "SELECT * FROM history_month";
                        // $query = $query." WHERE year_idx in(";
                        // for($i = 0; $i < count($result["value"]); $i++) {
                        //     $query = $query.$result["value"][$i]["idx"].",";
                        // }
                        // $query = substr($query, 0, -1);
                        // $query = $query.") ORDER BY CAST(month AS unsigned) DESC";
                        // $month_result = $this->conn->db_select($query);

                        $query = "SELECT * FROM history_content";
                        $query = $query." WHERE year_idx in(";
                        for($i = 0; $i < count($result["value"]); $i++){
                            $query = $query.$result["value"][$i]["idx"].",";
                        }
                        $query = substr($query, 0, -1);
                        $query = $query.")";
                        $content_result = $this->conn->db_select($query);

                        for($i = 0; $i < count($result["value"]); $i++){
                        //     $month_index = 0;
                        //     for($j = 0; $j < count($month_result["value"]); $j++){
                        //         if($result["value"][$i]["idx"] == $month_result["value"][$j]["year_idx"]){
                        //             $this->result["value"][$i]["month_arr"][$month_index]["month"] = $month_result["value"][$j]["month"];
                                    $content_arr = array();
                                    for($k = 0; $k < count($content_result["value"]); $k++){
                                        if($result["value"][$i]["idx"] == $content_result["value"][$k]["year_idx"]){
                                            array_push($content_arr, $content_result["value"][$k]["content"]);
                                        }
                                    }
                                    $this->result["value"][$i]["content_arr"] = $content_arr;
                                //     $month_index++;
                                // }
                        //     }
                        }
                        $result = $this->result;
                    }
                    else {
                        $this->result["total_count"] = 0;
                        $this->result["value"] = array();
                    }
                }
                else {
                    $this->result["result"] = 0;
                    $this->result["message"] = "게시글 정보를 가져오는데 실패하였습니다.";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : history category
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 수정 시 대분류 데이터
        *********************************************************************/
        function history_category() {
            $query = "SELECT idx, name, lang_idx FROM history_category ORDER BY seq ASC, reg_date DESC";
            $result = $this->conn->db_select($query);
            if($result["result"] == "1") {
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "게시글 검색 실패";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : history delete
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 삭제
        *********************************************************************/
        function history_delete() {
            $param = $this->json;
            
            if($this->value_check(array("check"))) {
                $check = json_decode($param["check"]);
                
                $query = "DELETE FROM history_year WHERE idx =";
                for($i = 0; $i < count($check); $i++) {
                    if($i == 0) {
                        $query = $query.$check[$i];
                    }
                    else {
                        $query = $query." OR idx = ".$check[$i];
                    }
                }
                $result = $this->conn->db_delete($query);

                if($result["result"] == "1") {
                    $this->result = $result;

                    // $query = "DELETE FROM history_month WHERE year_idx = ";
                    // for($i = 0; $i < count($check); $i++) {
                    //     if($i == 0) {
                    //         $query = $query.$check[$i];
                    //     }
                    //     else {
                    //         $query = $query." OR idx = ".$check[$i];
                    //     }
                    // }
                    // $result = $this->conn->db_delete($query);

                    // if($result["result"] == "1") {
                        $this->result = $result;

                        $query = "DELETE FROM history_content WHERE year_idx = ";
                        for($i = 0; $i < count($check); $i++) {
                            if($i == 0) {
                                $query = $query.$check[$i];
                            }
                            else {
                                $query = $query." OR idx = ".$check[$i];
                            }
                        }
                        $result = $this->conn->db_delete($query);
                        if($result["result"] == "1") {
                            $this->result = $result;
                            $this->result["message"] = "내용 삭제 성공";
                        }
                        else {
                            $this->result = $result;
                            $this->result["message"] = "내용 삭제 실패";
                        }
                    // }
                    // else {
                    //     $this->result = $result;
                    //     $this->result["message"] = "월 삭제 실패";
                    // }
                }
                else {
                    $this->result = $result;
                    $this->result["message"] = "연도 삭제 실패";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : history update
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 수정
        *********************************************************************/
        function history_update() {
            $param = $this->json;
          
            if($this->value_check(array("data", "year"))) {
                $modify = json_decode($param["data"], true);
    
                $error_flag = false;
                $query = "SELECT idx FROM history_year WHERE year = ".$this->null_check($param["year"]);
                $result = $this->conn->db_select($query);
                
                if($result["result"] == "1") {
                    $this->result = $result;
                    $this->conn->s_transaction();
                    $query = "DELETE FROM history_content WHERE year_idx = ";
                    for($i = 0; $i < count($result["value"]); $i++) {
                        if($i == 0) {
                            $query = $query.$result["value"][$i]["idx"];
                        }
                        else {
                            $query = $query." OR year_idx = ".$result["value"][$i]["idx"];
                        }
                    }
                    $result = $this->conn->db_delete($query);
                    if($result["result"] == "1") {
                        $this->result = $result;
                        // $query = "DELETE FROM history_month WHERE year_idx = ";
                        // for($i = 0; $i < count($result["value"]); $i++) {
                        //     if($i == 0) {
                        //         $query = $query.$result["value"][$i]["idx"];
                        //     }
                        //     else {
                        //         $query = $query." OR year_idx = ".$result["value"][$i]["idx"];
                        //     }
                        // }
                        // $result = $this->conn->db_delete($query);
                        // if($result["result"] == "1") {
                            // $this->result = $result;
                            $query = "DELETE FROM history_year WHERE idx = ";
                            for($i = 0; $i < count($result["value"]); $i++) {
                                if($i == 0) {
                                    $query = $query.$result["value"][$i]["idx"];
                                }
                                else {
                                    $query = $query." OR idx = ".$result["value"][$i]["idx"];
                                }
                            }
                            $this->conn->db_delete($query);
                            if($result["result"] == "1") {
                                $this->result = $result;
                                $this->result["message"] = "삭제 성공";
                                $this->conn->commit();
                                $error_flag = true;
                            }
                        // }
                    }
                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "데이터 가져오는데 실패하였습니다.";
                }

                if($error_flag) {
                    for($i = 0; $i < count($modify); $i++) {
                        for($l = 0; $l < count($modify[$i]); $l++) {
                            $modify_data = $modify[$i][$l];
                            $check_query = "SELECT idx, year FROM history_year WHERE year = ".$this->null_check($modify_data["year"]);
                            $check_query = $check_query." AND lang_idx = ".$modify_data["lang_idx"];
                            $check_result = $this->conn->db_select($check_query);
    
                            if(count($check_result["value"]) == 0) {
                                if($modify_data["year"] != ""){
                                    $year_query = "INSERT INTO history_year(category_idx, year, title, lang_idx, reg_date) VALUES(";
                                    $year_query = $year_query.$modify_data["category_idx"].",";
                                    $year_query = $year_query.$this->null_check($modify_data["year"]).",";
                                    $year_query = $year_query.$this->null_check($modify_data["title"]).",";
                                    $year_query = $year_query.$modify_data["lang_idx"].",";
                                    $year_query = $year_query."now())";
        
                                    $year_result = $this->conn->db_insert($year_query);
                                }
                            }
                            else {
                                $year_result["value"] = $check_result["value"][0]["idx"];
                                $query = "UPDATE histroy_year SET year = ".$modify_data["year"];
                                $query = $query." WHERE idx = ".$year_result["value"];
                                $this->conn->db_update($query);
                            }
    
                            $month_arr = $modify_data["month"];
                            for($j = 0; $j < count($month_arr); $j++) {
                                // $check_query = "SELECT idx, year_idx, month FROM history_month";
                                // $check_query = $check_query." WHERE year_idx = ".$year_result["value"];
                                // $check_query = $check_query." AND month = ".$this->null_check($month_arr[$j]["month"]);
    
                                // $check_result = $this->conn->db_select($check_query);
    
                                // if(count($check_result["value"]) == 0) {
                                //     $month_query = "INSERT INTO history_month(year_idx, month) VALUES(";
                                //     $month_query = $month_query.$year_result["value"].", ";
                                //     $month_query = $month_query.$this->null_check($month_arr[$j]["month"]).")";
            
                                //     $month_result = $this->conn->db_insert($month_query);
                                // }
                                // else {
                                //     $month_result["value"] = $check_result["value"][0]["idx"];
                                // }
    
                                $content_arr = $month_arr[$j]["content"];
                                $content_query = "";
    
                                for($k = 0; $k < count($content_arr); $k++) {
                                    if($content_query == "") {
                                        $content_query = "INSERT INTO history_content(year_idx, content, lang_idx) VALUES(";
                                    }
                                    // $content_query = $content_query.$month_result["value"].", ";
                                    $content_query = $content_query.$year_result["value"].", ";
                                    $content_query = $content_query.$this->null_check($content_arr[$k]).", ";
                                    $content_query = $content_query.$modify_data["lang_idx"]."),(";
                                }
                                $content_query = substr($content_query, 0, -2);
                                $content_result = $this->conn->db_insert($content_query);
                        
                            }
                        }
                    }
                }
            }
            if($content_result["result"] == "1") {
                $this->result = $content_result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "게시글 수정에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
    }
?>