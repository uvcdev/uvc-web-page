<?php
    class AdminTermsModel extends gf{
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
        // 함 수 : 게시글 하나의 정보를 가져오는 함수 ( 게시글 수정시 사용 )
        // 설 명 : 게시글의 idx로 해당 게시글의 상세정보를 가져옴
        // 만든이: 조경민
        *********************************************************************/
        function detail_board(){
            $param = $this->json;
            if($this->value_check(array("category_idx"))){
                $sql = "select * from terms where category_idx = ".$param["category_idx"];
                $sql .= " order by lang_idx asc";
                $result = $this->conn->db_select($sql);
                if($result["result"] == "1"){
                    $this->result = $result;;
                    $this->result["message"] = "게시글 검색 성공";
                }else{
                    $this->result["result"] = "0";
                    $this->result["error_code"] = "301";
                    $this->result["message"] = "게시글 검색 실패";
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        /********************************************************************* 
        // 함 수 : 게시글 수정 함수
        // name : 블로그 이름
        // lang_idx : 언어 구분 idx
        // upload_img : 변경되지 않은 upload_img array 
        // 만든이: 조경민
        *********************************************************************/
        function modify_board(){
            $param = $this->json;
            if($this->value_check(array("lang_idx"))){
                //언어별 등록 or 모든 언어 등록에 따라 변수 설정해주기
                $lang_obj = array();
                if($param["all_reg"] == 0){ //각 언어별 등록
                    $length = 1;
                    array_push($lang_obj, 1);
                }else{ //모든 언어 함께 등록
                    $lang_obj = json_decode($param["lang_idx"]);
                    $length = count($lang_obj);
                }

                $sql = "select * from terms where category_idx = ".$param["category_idx"];
                $result = $this->conn->db_select($sql);

                //description 처리
                $upload_content_dir = "/_upload/terms/content/"; //description image upload 경로
                $content_array = json_decode($this->sumnote["sumnote"]); //언어별 description
                $description = array();
                for($i = 0; $i < count($content_array); $i++){
                    array_push($description, $this->convert_description_v2($this->project_name.$upload_content_dir, "/".$this->project_name.$upload_content_dir, $content_array[$i], "news"));
                }

                //이미 등록된 게시글이 있으면 해당 게시글 수정
                if(count($result["value"]) > 0){
                    $diff_content = array();
                    for($i = 0; $i < count($result["value"]); $i++){
                        $old_content = $this->get_s3_image_array($result["value"][$i]["content"], "/".$this->project_name.$upload_content_dir); //DB에 저장되어 있던 Content 내용
                        $new_content = $this->get_s3_image_array($description[$i], "/".$this->project_name.$upload_content_dir); //사용자가 수정하여 넘어온 Content 내용
                        $diff = array_diff($old_content, $new_content); //삭제할 content 파일들
                        $diff_content= array_merge($diff_content, $diff);
                    }
    
                    //게시글 insert문
                    //상품안에 들어갈 각 내용 Type의 사용여부도 함께 저장
                    for($i = 0; $i < $length; $i++){
                        $lang_idx = $lang_obj[$i];
                        $sql = "update terms set ";
                        $sql .= "content = ".$this->null_check($description[$i]).","; //내용
                        $sql .= "reg_date = now()";
                        $sql .= " where category_idx = ".$param["category_idx"];
                        $sql .= " and lang_idx = ".$lang_idx;
    
                        $update_result = $this->conn->db_update($sql);
                    }
    
                    if($update_result["result"] == "1"){
                        $this->result = $update_result;
                        $this->result["message"] = "게시글 수정 성공";
                        //변경된 description 이미지 삭제
                        if(count($diff_content) > 0){
                            $delete_array = array();
                            foreach($diff_content as $key => $val){
                                array_push($delete_array, $val);
                            }
                            $this->common_func->delete_file($delete_array, $upload_content_dir);
                        }
                    }else{
                        $this->result["result"] = "0";
                        $this->result["error_code"] = "302";
                        $this->result["message"] = "게시글 수정 실패";
                        //게시글 등록 실패시 upload된 description image 삭제
                        for($i = 0; $i < count($description); $i++){
                            $delete_file_array = $this->get_s3_image_array($description[$i], $this->project_name.$upload_content_dir);
                            $this->common_func->delete_file($delete_file_array, $upload_content_dir);
                        }
                    }   
                }else{
                    //등록된 게시글이 없으면 등록
                    $sql = "insert into terms(category_idx, content, lang_idx, reg_date) values(";
                    for($i = 0; $i < $length; $i++){
                        $lang_idx = $lang_obj[$i];
                        $sql .= $param["category_idx"].",";
                        $sql .= $this->null_check($description[$i]).",";
                        $sql .= $lang_idx.",";
                        $sql .= "now()),(";
                    }

                    $sql = substr($sql, 0, -2);
                    $result = $this->conn->db_insert($sql);
                    if($result["result"] == "1"){
                        $this->result = $result;
                        $this->result["message"] = "게시글 등록 성공";
                    }else{
                        $this->result["result"] = "0";
                        $this->result["error_code"] = "300";
                        $this->result["message"] = "게시글 등록 실패";
                        //게시글 등록 실패시 upload된 description image 삭제
                        for($i = 0; $i < count($description); $i++){
                            $delete_file_array = $this->get_s3_image_array($description[$i], $this->project_name.$upload_content_dir);
                            $this->common_func->delete_file($delete_file_array, $upload_content_dir);
                        }
                    }   
                } 
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        /********************************************************************* 
        // 함 수 : 언어별 개인정보처리방침, 이메일수집동의 정보를 가져오는 함수
        // 설 명 : 1 ---> 개인정보처리방침 , 2 ---> 이메일수집동의
        // 만든이: 조경민
        *********************************************************************/
        function select_board(){
            $param = $this->json;
            if($this->value_check(array("category_idx"))){
                $sql = "select content from terms where category_idx = ".$param["category_idx"]." and lang_idx = ".$param["lang_idx"];
                // $sql .= " and lang_idx = ".$param["lang_idx"];
                $result = $this->conn->db_select($sql);
                if($result["result"] == "1"){
                    $this->result = $result;;
                    $this->result["message"] = "게시글 검색 성공";
                }else{
                    $this->result["result"] = "0";
                    $this->result["error_code"] = "301";
                    $this->result["message"] = "게시글 검색 실패";
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
    }
?>