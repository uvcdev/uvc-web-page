<?php
    class HistoryModel extends gf{
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
            
            $query = "SELECT * FROM history_category WHERE lang_idx = ".$param["lang_idx"]." ORDER BY cast(name AS signed) DESC";
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
        // 함 수 : history select
        // 만든이: 박여진
        // 담당자: 
        // 설명: 연혁 목록
        *********************************************************************/
        function history_select() {
            $param = $this->json;
        
            if($this->value_check(array("lang_idx"))){
                $sql = "select * from history_category where lang_idx = ".$param["lang_idx"]." order by cast(name AS signed) DESC";
                $result = $this->conn->db_select($sql);
               
                $sql = "select * from history_year where lang_idx = ".$param["lang_idx"]." order by year desc";
                $year_result = $this->conn->db_select($sql);
               
                if($year_result["result"] == "1") {
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
                    for($i = 0; $i < count($year_result["value"]); $i++){
                        $query = $query.$year_result["value"][$i]["idx"].",";
                    }
                    $query = substr($query, 0, -1);
                    $query = $query.")";

                    $content_result = $this->conn->db_select($query);
                   
                    for($i = 0; $i < count($year_result["value"]); $i++) {
                        // $month_index = 0;
                        // for($j = 0; $j < count($month_result["value"]); $j++) {
                        //     if($result["value"][$i]["idx"] == $month_result["value"][$j]["year_idx"]) {
                        //         $result["value"][$i]["month_arr"][$month_index]["month"] = $month_result["value"][$j]["month"];
                                $content_arr = array();
                                for($k = 0; $k < count($content_result["value"]); $k++){
                                    if($year_result["value"][$i]["idx"] == $content_result["value"][$k]["year_idx"]){
                                        array_push($content_arr, $content_result["value"][$k]["content"]);
                                    }
                                }
                                $year_result["value"][$i]["content_arr"] = $content_arr;
                        //         $month_index++;
                        //     }
                        // }
                    }

                    for($i = 0; $i < count($result["value"]); $i++){
                        for($j = 0; $j < count($year_result["value"]); $j++){
                            if($result["value"][$i]["idx"] == $year_result["value"][$j]["category_idx"]){
                                if(!isset($result["value"][$i]["history"])){
                                    $result["value"][$i]["history"] = array();
                                }
                                
                                array_push($result["value"][$i]["history"], $year_result["value"][$j]);
                            }
                        }
                    }

                    $this->result = $result;

                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "게시글 불러오는데 실패하였습니다.";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
    }
?>
