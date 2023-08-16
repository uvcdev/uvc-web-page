<?php
    class AdminCertifyModel extends gf{
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
        // 함 수 : lang select
        // 만든이: 박여진
        // 담당자: 
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
        // 함 수 : certify Insert
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function certify_insert() {
            $param = $this->json;
            $lang_idx = json_decode($param["lang_idx"], true);

            if($this->value_check(array("image_sync"))){ //필수값 체크하기

                // 해당 폴더가 없으면 생성
                if(!is_dir($this->dir."_upload/certify")){
                    umask(0);
                    if(!mkdir($this->dir."_upload/certify", 0777, true)){
                        return;
                    }
                }

                $file_dirs = array();  // 실패했을경우 저장된 파일 삭제를 위해 경로 저장
                $file_idxs = array();  // 실패했을경우 query delete를 위해 저장
                for($i = 1; $i <= $param["langLength"]; $i++) {

                    $lang_idx = $i;
                    
                    $fileCount = count($_FILES["img_file_".$lang_idx]["error"]);
                    $tempFile = $_FILES["img_file_".$lang_idx]["name"][0]; // 임시로 저장된 정보(name)

                    if($_FILES["img_file_".$lang_idx]["error"][0] != 4) {
                        $errorFlag = false;
                        $fileTypeExt = explode('.', $tempFile);

                        $rename = md5(uniqid($tempFile)) .round(microtime(true)).'.'.$fileTypeExt[1];
                    
                        while(file_exists($this->dir."_upload/certify/".$rename)){

                            $rename = md5(uniqid($tempFile)) .round(microtime(true)).'.'.$fileTypeExt[1];
                        }
                        $fileSave = $this->dir."_upload/certify/".$rename;
                        
                        array_push($file_idxs, $rename);                       
                    }
                    
                    move_uploaded_file($_FILES["img_file_".$lang_idx]["tmp_name"][0], $fileSave);
                }
                $key_code = $this->key_code_check("certify");

                $query = "INSERT INTO certify(title, content, category, real_img, upload_img, image_sync, lang_idx, key_code, reg_date) VALUES(";
                for($i = 1; $i <= $param["langLength"]; $i++) {
                    $query = $query.$this->null_check($param["title_".$i]).", ";
                    $query = $query.$this->null_check($param["content_".$i]).", ";
                    $query = $query.$this->null_check($param["category"]).", ";
                    
                    if($file_idxs != null) {
                        if($param["image_sync"] == "1") {
                            $query = $query.$this->null_check($_FILES["img_file_1"]["name"][0]).", ";
                            $query = $query.$this->null_check($file_idxs[0]).", ";
                        }
                        else {
                            $query = $query.$this->null_check($_FILES["img_file_".$i]["name"][0]).", ";
                            $query = $query.$this->null_check($file_idxs[$i - 1]).", ";
                        }
                    }

                    $query = $query.$this->null_check($param["image_sync"]).",";
                    $query = $query.$this->null_check($i).", ";
                    $query = $query.$this->null_check($key_code).",";
                    $query = $query." now()), (";
                    
                }
                
                $query = substr($query, 0, -3);
                $result = $this->conn->db_insert($query);
                $this->result = $result;

                array_push($file_dirs, $fileSave);
                // array_push($file_idxs, $result["value"]);

                if($result["error_code"] != null) {
                    $query = "DELETE FROM certify WHERE idx = ".$result["value"];
                    $result = $this->conn->db_delete($query);

                    for($i = 0; $i < count($file_dirs); $i++) {
                        unlink($file_dirs[$i]);
                    }
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                    return;
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : certify Select
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function certify_select() {
            $param = $this->json;
            if($this->value_check(array("page_size", "move_page"))){
            
                $page_size = (int)$param["page_size"];
                $move_page = (int)$param["move_page"];
                $query = "SELECT * FROM certify WHERE lang_idx = ".$param["lang_idx"]." ORDER BY seq ASC, reg_date DESC LIMIT ".$page_size * ($move_page - 1).", ".$page_size;
                $result = $this->conn->db_select($query);

                if($result["result"] == "1") {
                    $this->result = $result;
                    $query = "SELECT COUNT(idx) AS total_count FROM certify WHERE lang_idx = ".$param["lang_idx"];
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
        // 함 수 : certify Delete
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function certify_delete() {
            $param = $this->json;
            $key_code = json_decode($param["key_code"]);

            $query = "SELECT upload_img FROM certify WHERE key_code = ";
            for($i = 0; $i < count($key_code); $i++) {
                if($i == 0) {
                    $query = $query.$this->null_check($key_code[$i]);
                }
                else {
                    $query = $query." or key_code = ".$this->null_check($key_code[$i]);
                }
            }
            
            $result = $this->conn->db_select($query);
            
            if($result["result"] == "1") {
                $this->result = $result;
                $delete_file_dirs = array();  // 서버 파일 배열

                if($result["value"] != null) {
                    for($i = 0; $i < count($result["value"]); $i++) {
                        if($result["value"][$i]["upload_img"] != null) {
                            array_push($delete_file_dirs, $result["value"][$i]["upload_img"]);
                        }
                    }
                }
                $image_unique = array_unique($delete_file_dirs);

                $query = "DELETE FROM certify WHERE key_code = ";
                for($i = 0; $i < count($key_code); $i++) {
                    if($i == 0) {
                        $query = $query.$this->null_check($key_code[$i]);
                    }
                    else {
                        $query = $query." or key_code = ".$this->null_check($key_code[$i]);
                    }
                }

                $result = $this->conn->db_delete($query);
                if($result["result"] == "1") {
                    if($image_unique != null) {
                        for($j = 0; $j < count($image_unique); $j++) {
                           
                            unlink($this->project_name."/_upload/certify/".$image_unique[$j]);

                        }
                    }
                }
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "게시글 삭제에 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : modify detail
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function modify_detail() {
            $param = $this->json;
     
            $query = "SELECT * FROM certify WHERE key_code = ".$this->null_check($param["key_code"]);
            $result = $this->conn->db_select($query);
            
            if($result["result"] == "1"){
                $this->result = $result;
            }
            else {
                $this->result["result"] = "0";
                $this->result["message"] = "글 정보를 불러오는데 실패하였습니다.";
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }
        /********************************************************************* 
        // 함 수 : modify update
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function modify_update() {
            $param = $this->json;

            if($this->value_check(array("key_code"))){
                $query = "SELECT upload_img, real_img, image_sync, lang_idx FROM certify WHERE key_code = ".$this->null_check($param["key_code"]);
                $result = $this->conn->db_select($query);
    
                if($result["result"] == "1") {
                    $this->result = $result;
                   
                    // 해당 폴더가 없으면 생성
                    if(!is_dir($this->dir."_upload/certify")) {
                        umask(0);
                        if(!mkdir($this->dir."_upload/certify", 0777, true)){
                            return;
                        }
                    }
                    
                    $file_idxs = array();  // 실패했을경우 query delete를 위해 저장
                    $file_dirs = array();  // 실패했을경우 저장된 파일 삭제를 위해 경로 저장
                    $delImg = json_decode($param["delImg"]);  // x버튼으로 삭제 될 파일
                    $fileSave = null;
                    $fileName = array();
                    $fileReal = array();

                    $del_sync_image = array();
                    // 비동기화 -> 동기화
                    for($i = 0; $i < count($result["value"]); $i++) {
                        if($param["image_sync"] == 1) {
                            if($result["value"][$i]["lang_idx"] != 1 && $result["value"][$i]["image_sync"] == 0 && $result["value"][$i]["upload_img"] != null) {
                                array_push($del_sync_image, $result["value"][$i]["upload_img"]);
                            }
                        }
                    }

                    if(count($del_sync_image) > 0) {
                        for($i = 0; $i < count($del_sync_image); $i++) {
                            unlink($this->project_name."/_upload/certify/".$del_sync_image[$i]);
                        }
                    }

                    if($delImg != null) {
                        $image = json_decode($param["image"]);
                        $diff_image = array_intersect($image, $delImg);
                  
                        for($j = 1; $j <= $param["langLength"]; $j++) {
                            for($i = 0; $i < count($diff_image); $i++) {
                                if($diff_image[$i] == $delImg){
                                    
                                    $query = "UPDATE certify SET upload_img = null, real_img = null WHERE real_img = ".$this->null_check($delImg);
        
                                    $result = $this->conn->db_update($query);
                                }
                            }     
                        }                                    
                    }
           
                    if($delImg != null) {

                        for($i = 1; $i <= $param["langLength"]; $i++) {

                            $lang_idx = $i;
                            
                            $fileCount = count($_FILES["img_file_".$lang_idx]["error"]);
                            $tempFile = $_FILES["img_file_".$lang_idx]["name"][0]; // 임시로 저장된 정보(name)
                            $fileTypeExt = explode('.', $tempFile);
                            if($_FILES["img_file_".$lang_idx]["error"][0] != 4) {
                                $errorFlag = false;
                                // $fileName = $tempFile;
                                $rename = md5(uniqid($tempFile)) .round(microtime(true)).'.'.$fileTypeExt[1];
                            
                                while(file_exists($this->dir."_upload/certify/".$rename)) {
        
                                    $rename = md5(uniqid($tempFile)) .round(microtime(true)).'.'.$fileTypeExt[1];
                                }
                                $fileSave = $this->dir."_upload/certify/".$rename;
                                
                                array_push($fileReal, $_FILES["img_file_".$lang_idx]["name"][0]);
                                array_push($fileName, $rename);
                                array_push($file_idxs, $rename);
                                    
                            }
                            else {
                            
                                array_push($fileName, $result["value"][$i - 1]["upload_img"]);
                                array_push($fileReal, $result["value"][$i - 1]["real_img"]);
                                array_push($file_idxs, "");
                            
                            }
                            
                            if($fileSave != null){
                                move_uploaded_file($_FILES["img_file_".$lang_idx]["tmp_name"][0], $fileSave);
                            }
                        }
                    }
                   
                    $key_code = uniqid();
                    
                    for($i = 1; $i <= $param["langLength"]; $i++) {
                        $query = "UPDATE certify SET ";
                        $query = $query."title = ".$this->null_check($param["title_".$i]).", ";
                        $query = $query."content = ".$this->null_check($param["content_".$i]).", ";
                        $query = $query."category = ".$this->null_check($param["category"]).", ";
                        $query = $query."image_sync = ".$this->null_check($param["image_sync"]).", ";
                        
                        if($file_idxs != null) {
                            if($param["image_sync"] == "1") {
                                $query = $query."upload_img = ".$this->null_check($fileName[0]).", ";
                                $query = $query."real_img = ".$this->null_check($fileReal[0]).", ";
                            }
                            else {
                                $query = $query."upload_img = ".$this->null_check($fileName[$i - 1]).", ";
                                $query = $query."real_img = ".$this->null_check($fileReal[$i - 1]).", ";
                            }
                        }
                        
                        $query = $query."image_sync = ".$this->null_check($param["image_sync"]).", ";
                        $query = $query."lang_idx = ".$this->null_check($i).", ";
                        $query = $query."modify_date = now() ";
                        $query = $query."WHERE key_code = ".$this->null_check($param["key_code"])." ";
                        $query = $query."and lang_idx = ".$i;
                        $result = $this->conn->db_update($query);
                    }
                    // $query = substr($query, 0, -3);
                    $this->result = $result;

                    // for($i = 0; $i < count($delImg); $i++) {
                    //     unlink($this->project_name."/_upload/certify/".$delImg[$i]);
                    // }
                    
                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "게시글 수정 실패";  
                }
               
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        /********************************************************************* 
        // 함 수 : 게시글 순서 변경 함수
        // 설 명 : 
        // 만든이: 조경민
        *********************************************************************/
        function change_seq(){
            $param = $this->json;
            if($this->value_check(array("idx_array"))){
                $relation_array = json_decode($param["idx_array"]);
                for($i = 0; $i < count($relation_array); $i++){
                    $sql = "update certify set seq = ".($i + 1);
                    $sql .= " where key_code = ".$this->null_check($relation_array[$i]);
                    $result = $this->conn->db_update($sql);
                };
                if($result["result"] == "1"){
                    $this->result = $result;
                    $this->result["message"] = "게시글 순서 변경 성공";
                }else{
                    $this->result["result"] = "0";
                    $this->result["error_code"] = "302";
                    $this->result["message"] = "게시글 순서 변경 실패";
                }
            }
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        //랜덤한 n 자리 문자열을 return해주는 함수
        function rand_generateRandomString($leng){
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $char_length = strlen($char);
            $randomString = "";

            for($i = 0; $i < $leng; $i++){
                $randomString = $randomString.$char[rand(0, $char_length -1)];
            }

            return $randomString;
        }

        //key 코드 중복 체크
        function key_code_check($table){
            $today = date("Ymd");
            $randomString = $today.$this->rand_generateRandomString(6);
            $select_id = "select count(*) as total from $table where key_code = ".$this->null_check($randomString);
            $list_result = $this->conn->db_select($select_id);
            $list = $list_result["value"];

            if($list[0]["total"] == 0){
                return $randomString;
            }else{
                return key_code_check();
            }
        }
    }
?>