<?php
    class AdminNoticeModel extends gf{
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
        // 함 수 : notice Insert
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function notice_insert() {
            $param = $this->json;
           
            $lang_idx = json_decode($param["lang_idx"], true);
            $content = json_decode($this->sumnote["content"]);

            if($this->value_check(array("lang_idx"))){ //필수값 체크하기

                if(!is_dir($this->dir."_upload/notice/file/")){
                    umask(0);
                    if(!mkdir($this->dir."_upload/notice/file/", 0777, true)){
                        return;
                    }
                }

                if(!is_dir($this->dir."_upload/notice/image/")){
                    umask(0);
                    if(!mkdir($this->dir."_upload/notice/image/", 0777, true)){
                        return;
                    }
                }

                $file_idxs = array(
                    array(),
                    array(),
                );  // 실패했을경우 query delete를 위해 저장

                $image_idxs = array(
                    array(),
                    array(),
                );

                $imageSave = null;
                $fileSave = null;

                // image        
                if($_FILES["img_file_1"]["name"][0] != null) {
                    // $lang_idx = $i;
                    $imageCount = count($_FILES["img_file_1"]["error"]);
                    $tempFile = $_FILES["img_file_1"]["name"]; // 임시로 저장된 정보(name)

                    for($i = 0; $i < $imageCount; $i++) {
                        if($_FILES["img_file_1"]["error"][$i] != 4) {
                            // $errorFlag = false;
                            $fileTypeExt = explode('.', $tempFile[$i]);
    
                            $rename = md5(uniqid($tempFile[$i])) .round(microtime(true)).'.'.$fileTypeExt[1];
                        
                            while(file_exists($this->dir."_upload/notice/image/".$rename)){
    
                                $rename = md5(uniqid($tempFile[$i])) .round(microtime(true)).'.'.$fileTypeExt[1];
                            }
                            $imageSave = $this->dir."_upload/notice/image/".$rename;
                            
                            array_push($image_idxs[0], $rename);                       
                        }
                        if($imageSave != null){
                            move_uploaded_file($_FILES["img_file_1"]["tmp_name"][$i], $imageSave);
                        }
                    }
                }  

                if($_FILES["img_file_2"]["name"][0] != null) {
                    // $lang_idx = $i;
                    $imageCount = count($_FILES["img_file_2"]["error"]);
                    $tempFile = $_FILES["img_file_2"]["name"]; // 임시로 저장된 정보(name)

                    for($i = 0; $i < $imageCount; $i++) {
                        if($_FILES["img_file_2"]["error"][$i] != 4) {
                            // $errorFlag = false;
                            $fileTypeExt = explode('.', $tempFile[$i]);
    
                            $rename = md5(uniqid($tempFile[$i])) .round(microtime(true)).'.'.$fileTypeExt[1];
                        
                            while(file_exists($this->dir."_upload/notice/image/".$rename)){
    
                                $rename = md5(uniqid($tempFile[$i])) .round(microtime(true)).'.'.$fileTypeExt[1];
                            }
                            $imageSave = $this->dir."_upload/notice/image/".$rename;
                            
                            array_push($image_idxs[1], $rename);                       
                        }
                        if($imageSave != null){
                            move_uploaded_file($_FILES["img_file_2"]["tmp_name"][$i], $imageSave);
                        }
                    }
                }  

                if($_FILES["file_1"]["name"][0] != null) {
                    $fileKor = count($_FILES["file_1"]["error"]);
                    $korFile = $_FILES["file_1"]["name"]; // 임시로 저장된 정보(name)
    
                    for($j = 0; $j < $fileKor; $j++) {
                        if($_FILES["file_1"]["error"][$j] != 4) {
                        
                            $fileTypeExt = explode('.', $korFile[$j]);
                            
                            $rename = md5(uniqid($korFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                            
                            while(file_exists($this->dir."_upload/notice/file/".$rename)){
    
                                $rename = md5(uniqid($korFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                            }
                            $fileSave = $this->dir."_upload/notice/file/".$rename;
                        
                            array_push($file_idxs[0], $rename);
                                        
                        } 
                        if($fileSave != null){
                            move_uploaded_file($_FILES["file_1"]["tmp_name"][$j], $fileSave);
                        }
                    }
                }

                if($_FILES["file_2"]["name"][0] != null) {
                    $fileEng = count($_FILES["file_2"]["error"]);
                    $engFile = $_FILES["file_2"]["name"]; // 임시로 저장된 정보(name)
    
                    for($j = 0; $j < $fileEng; $j++) {
                        if($_FILES["file_2"]["error"][$j] != 4) {
                    
                            $fileTypeExt = explode('.', $engFile[$j]);
            
                            $rename = md5(uniqid($engFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                        
                            while(file_exists($this->dir."_upload/notice/file/".$rename)){
    
                                $rename = md5(uniqid($engFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                            }
                            $fileSave = $this->dir."_upload/notice/file/".$rename;
                            
                            array_push($file_idxs[1], $rename);                       
                        }
                        else {
                            array_push($file_idxs[1], "");
                        }
                        if($fileSave != null){
                            move_uploaded_file($_FILES["file_2"]["tmp_name"][$j], $fileSave);
                        }
                    }
                }

                $key_code = $this->key_code_check("notice");

                $query = "INSERT INTO notice(title, content, date, file_sync, image_sync, real_img, upload_img, lang_idx, key_code, reg_date) VALUES(";
                for($i = 1; $i <= $param["langLength"]; $i++) {

                    $query = $query.$this->null_check($param["title_".$i]).", ";
                    $query = $query.$this->null_check($content[$i - 1]).", ";
                    $query = $query.$this->null_check($param["date"]).", ";
                    $query = $query.$this->null_check($param["file_sync"]).", ";
                    $query = $query.$this->null_check($param["image_sync"]).", ";
                    if($image_idxs[0] != null) {
                        if($param["image_sync"] == "1") {
                            $query = $query.$this->null_check($_FILES["img_file_1"]["name"][0]).", ";
                            $query = $query.$this->null_check($image_idxs[0][0]).", ";
                        }
                        else {
                            $query = $query.$this->null_check($_FILES["img_file_".$i]["name"][0]).", ";
                            $query = $query.$this->null_check($image_idxs[$i-1][0]).", ";
                        }
                    }
                    else { 
                        $query = $query."null, ";
                        $query = $query."null, ";
                    }
                    $query = $query.$this->null_check($i).", ";
                    $query = $query.$this->null_check($key_code).", ";
                    $query = $query." now()), (";              
                }
                
                $query = substr($query, 0, -3);
                $result = $this->conn->db_insert($query);


                if($result["result"] == "1") {
                    if($file_idxs != null) {
                        $insertFlag = false;
                        $query = "INSERT INTO notice_file(key_code, real_file, upload_file, lang_idx) VALUES(";
                        for($i = 1; $i <= $param["langLength"]; $i++) {

                            if($param["file_sync"] == "1") {
                                $fileCount = count($file_idxs[0]);
                            }
                            else{
                                $fileCount = count($file_idxs[$i - 1]);
                            }
                           
                            if($fileCount > 0){
                                $insertFlag = true;
                                for($j = 0; $j < $fileCount; $j++) {
                                    $query = $query.$this->null_check($key_code).", ";

                                    if($param["file_sync"] == "1") {
                                        $query = $query.$this->null_check($_FILES["file_1"]["name"][$j]).", ";
                                        $query = $query.$this->null_check($file_idxs[0][$j]).", ";
                                    }
                                    else {
                                        $query = $query.$this->null_check($_FILES["file_".$i]["name"][$j]).", ";
                                        $query = $query.$this->null_check($file_idxs[$i -1][$j]).", ";
                                    }

                                    $query = $query.$this->null_check($i)."), (";
                                }
                            }
                        }
                        if($insertFlag){
                            $query = substr($query, 0, -3);
                            $result = $this->conn->db_insert($query);
                            $this->result = $result;
                        }
                    }
                    $this->result = $result;
                    $this->result["message"] = "게시글 등록 성공";
                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "글 저장에 실패하였습니다.";
                }

                if($result["error_code"] != null) {
                    $query = "DELETE FROM notice WHERE key_code = ".$key_code;
                    $result = $this->conn->db_delete($query);

                    $query = "DELETE FROM notice_file WHERE key_code = ".$key_code;
                    $result = $this->conn->db_delete($query);
                }
                else {
                    $sumnote_img = json_decode($param["sumnote_img"]);
                        if(count($sumnote_img) > 0){
                            $query = "UPDATE sumnote_img SET state = 1 WHERE file_name = ";
                            for($i = 0; $i < count($sumnote_img); $i++) {
                                if($i == 0) {
                                    $query = $query.$this->null_check($sumnote_img[$i]);
                                }
                                else {
                                    $query = $query." or file_name = ".$this->null_check($sumnote_img[$i]);
                                }
                            }
                            $result = $this->conn->db_update($query);
                        }
                }
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
                $query = "SELECT * FROM notice WHERE lang_idx = ".$param["lang_idx"]." ORDER BY date DESC LIMIT ".$page_size * ($move_page - 1).", ".$page_size;
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
        /********************************************************************* 
        // 함 수 : notice Delete
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function notice_delete() {
            $param = $this->json;
        
            $key_code = json_decode($param["key_code"]);

            $query = "SELECT upload_img, image_sync, file_sync FROM notice WHERE key_code = ";
            for($i = 0; $i < count($key_code); $i++) {
                if($i == 0) {
                    $query = $query.$this->null_check($key_code[$i]);
                }
                else {
                    $query = $query." or key_code = ".$this->null_check($key_code[$i]);
                }
            }
            
            $checkResult = $this->conn->db_select($query);
    
            if($checkResult["result"] == "1") {
                // $this->result = $result;
                $delete_image_dirs = array();  // 서버 파일 배열
                if($checkResult["value"] != null) {
                   
                    for($i = 0; $i < count($checkResult["value"]); $i++) {
                        if($checkResult["value"][$i]["upload_img"] != null) {
                            array_push($delete_image_dirs, $checkResult["value"][$i]["upload_img"]);
                          
                        }
                    }
                }
                $image_unique = array_unique($delete_image_dirs);
                $image_unique = array_values($image_unique);

                $query = "SELECT upload_file FROM notice_file WHERE key_code = ";
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
                    $delete_file_dirs = array();  // 서버 파일 배열
    
                    if($result["value"] != null) {
                        for($i = 0; $i < count($result["value"]); $i++) {
                            if($result["value"][$i]["upload_file"] != null) {
                                array_push($delete_file_dirs, $result["value"][$i]["upload_file"]);
                            }
                        }
                    }
                    $file_unique = array_unique($delete_file_dirs);
                    $file_unique = array_values($file_unique);

                    $query = "DELETE FROM notice WHERE key_code = ";
                    for($i = 0; $i < count($key_code); $i++) {
                        if($i == 0) {
                            $query = $query.$this->null_check($key_code[$i]);
                        }
                        else {
                            $query = $query." or key_code = ".$this->null_check($key_code[$i]);
                        }
                    }

                    $result = $this->conn->db_delete($query);

                    $query = "DELETE FROM notice_file WHERE key_code = ";
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
                        $this->result = $result;
                        
                        if($image_unique != null) {
                            for($j = 0; $j < count($image_unique); $j++) {
                               
                                unlink($this->project_name."/_upload/notice/image/".$image_unique[$j]);

                            }
                        }

                        if($file_unique != null) {
                            for($j = 0; $j < count($file_unique); $j++) {                               
                                unlink($this->project_name."/_upload/notice/file/".$file_unique[$j]);
                            }
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
        function notice_detail() {
            $param = $this->json;
            
            $query = "SELECT * FROM notice WHERE key_code = ".$this->null_check($param["key_code"]);
            $result = $this->conn->db_select($query);

            if($result["result"] == "1") {
                $this->result = $result;

                $query = "SELECT * FROM notice_file WHERE key_code = ".$this->null_check($param["key_code"]);
                $file_result = $this->conn->db_select($query);

                for($i = 0; $i < count($result["value"]); $i++) {
                    for($j = 0; $j < count($file_result["value"]); $j++) {
                        if($result["value"][$i]["key_code"] == $file_result["value"][$j]["key_code"]) {
                            if(!isset($this->result["value"][$i]["file"])) {
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
        // 함 수 : modify update
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
        function modify_update() {
            $param = $this->json;
          
            $key_code = $param["key_code"];
            $content = json_decode($this->sumnote["content"]);

            if($this->value_check(array("key_code"))){
                $query = "SELECT * FROM notice WHERE key_code = ".$this->null_check($param["key_code"]);
                $result = $this->conn->db_select($query);
    
                if($result["result"] == "1") {
                    $this->result = $result;

                    if(!is_dir($this->dir."_upload/notice/file/")){
                        umask(0);
                        if(!mkdir($this->dir."_upload/notice/file/", 0777, true)){
                            return;
                        }
                    }
    
                    if(!is_dir($this->dir."_upload/notice/image/")){
                        umask(0);
                        if(!mkdir($this->dir."_upload/notice/image/", 0777, true)){
                            return;
                        }
                    }

                    //저장된 싱크랑 넘어온 싱크가 다를때
                    //첫번째 언어를 제외한 나머지 언어의 notice_file 데이터 제거
                    if($result["value"][0]["file_sync"] != $param["file_sync"]) {
                        $query = "DELETE FROM notice_file WHERE key_code = ".$this->null_check($param["key_code"])." AND lang_idx != 1";
                        $this->conn->db_delete($query);
                    }

                    $file_idxs = array(
                        array(),
                        array(),
                    );  // 실패했을경우 query delete를 위해 저장
    
                    $image_idxs = array();
                    $imgSave = null;
                    $fileSave = null;
                    $imgName = array();
                    $imgReal = array();
                    $del_sync_image = array();
                    
                    $deleteCheck = json_decode($param["deleteCheck"]);  // x버튼으로 삭제 될 파일
                    $delImg = json_decode($param["delImg"]); //  x버튼으로 삭제 될 이미지
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
                            unlink($this->project_name."/_upload/notice/image/".$del_sync_image[$i]);
                        }
                        $query = "update notice set upload_img = ".$this->null_check($result["value"][0]["upload_img"]).", real_img = ".$this->null_check($result["value"][0]["real_img"])." where key_code = ".$this->null_check($param["key_code"])." and lang_idx != '1'";
                        $this->conn->db_update($query);
                    }
                    if($delImg != null) {
                        $image = json_decode($param["image"]);
                        $diff_image = array_intersect($delImg, $image);
                    
                        // for($j = 1; $j <= $param["langLength"]; $j++) {
                            for($i = 0; $i < count($diff_image); $i++) {
                                if($diff_image[$i] == $delImg){
                                    
                                    $query = "UPDATE notice SET upload_img = null, real_img = null WHERE upload_img = ".$this->null_check($delImg)." ands key_code = ".$this->null_check($param["key_code"]);
        
                                    $result = $this->conn->db_update($query);
                                }
                            }     
                        // }                                    
                    }
                    // if($delImg != null) {
                        // image        
                        for($i = 1; $i <= $param["langLength"]; $i++) {

                            $lang_idx = $i;
                            
                            $fileCount = count($_FILES["img_file_".$lang_idx]["error"]);
                            $tempFile = $_FILES["img_file_".$lang_idx]["name"][0]; // 임시로 저장된 정보(name)
                            $fileTypeExt = explode('.', $tempFile);
                            if($_FILES["img_file_".$lang_idx]["error"][0] != 4) {
                                $errorFlag = false;
                                // $fileName = $tempFile;
                                $rename = md5(uniqid($tempFile)) .round(microtime(true)).'.'.$fileTypeExt[1];
                            
                                while(file_exists($this->dir."_upload/notice/image/".$rename)) {
        
                                    $rename = md5(uniqid($tempFile)) .round(microtime(true)).'.'.$fileTypeExt[1];
                                }
                                $imgSave = $this->dir."_upload/notice/image/".$rename;
                                
                                array_push($imgName, $_FILES["img_file_".$lang_idx]["name"][0]);
                                array_push($imgReal, $rename);
                                array_push($image_idxs, $rename);
                                    
                            }
                            else {
                            
                                array_push($imgName, $result["value"][$i - 1]["real_img"]);
                                array_push($imgReal, $result["value"][$i - 1]["upload_img"]);
                                array_push($image_idxs, "");
                            
                            }
                            
                            if($imgSave != null){
                                move_uploaded_file($_FILES["img_file_".$lang_idx]["tmp_name"][0], $imgSave);
                            }
                        }
                    // }

                    if($_FILES["file_1"]["name"][0] != null) {
                        $fileKor = count($_FILES["file_1"]["error"]);
                        $korFile = $_FILES["file_1"]["name"]; // 임시로 저장된 정보(name)
        
                        for($j = 0; $j < $fileKor; $j++) {
                            if($_FILES["file_1"]["error"][$j] != 4) {
                            
                                $fileTypeExt = explode('.', $korFile[$j]);
                                
                                $rename = md5(uniqid($korFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                                
                                while(file_exists($this->dir."_upload/notice/file/".$rename)){
        
                                    $rename = md5(uniqid($korFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                                }
                                $fileSave = $this->dir."_upload/notice/file/".$rename;
                            
                                array_push($file_idxs[0], $rename);
                                            
                            } 
                            if($fileSave != null){
                                move_uploaded_file($_FILES["file_1"]["tmp_name"][$j], $fileSave);
                            }
                        }
                    }
    
                    if($_FILES["file_2"]["name"][0] != null) {
                        $fileEng = count($_FILES["file_2"]["error"]);
                        $engFile = $_FILES["file_2"]["name"]; // 임시로 저장된 정보(name)
        
                        for($j = 0; $j < $fileEng; $j++) {
                            if($_FILES["file_2"]["error"][$j] != 4) {
                        
                                $fileTypeExt = explode('.', $engFile[$j]);
                
                                $rename = md5(uniqid($engFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                            
                                while(file_exists($this->dir."_upload/notice/file/".$rename)){
        
                                    $rename = md5(uniqid($engFile[$j])) .round(microtime(true)).'.'.$fileTypeExt[1];
                                }
                                $fileSave = $this->dir."_upload/notice/file/".$rename;
                                
                                array_push($file_idxs[1], $rename);                       
                            }
                            else {
                                array_push($file_idxs[1], "");
                            }
                            if($fileSave != null){
                                move_uploaded_file($_FILES["file_2"]["tmp_name"][$j], $fileSave);
                            }
                        }
                    }
                    
                    if($deleteCheck != null) {  // db에서 해당 file 삭제 서버에도 삭제
                        for($i = 0; $i < count($deleteCheck); $i++) {
                            $query = "DELETE FROM notice_file WHERE upload_file = ".$this->null_check($deleteCheck[$i])." AND key_code = ".$this->null_check($param["key_code"]);
                            $result = $this->conn->db_delete($query);
                            $this->result = $result;
                        }
                    }

                    for($i = 1; $i <= $param["langLength"]; $i++) {
                        $query = "UPDATE notice SET ";
                        $query = $query."title = ".$this->null_check($param["title_".$i]).", ";
                        $query = $query."content = ".$this->null_check($content[$i - 1]).", ";
                        $query = $query."date = ".$this->null_check($param["date"]).", ";
                        $query = $query."image_sync = ".$this->null_check($param["image_sync"]).", ";
                        $query = $query."file_sync = ".$this->null_check($param["file_sync"]).", ";

                        // if($image_idxs[0] != null) {
                        //     if($param["image_sync"] == "1") {
                        //         $query = $query."real_img = ".$this->null_check($_FILES["img_file_1"]["name"][0]).", ";
                        //         $query = $query."upload_img = ".$this->null_check($image_idxs[0][0]).", ";
                        //     }
                        //     else {
                        //         $query = $query."real_img = ".$this->null_check($_FILES["img_file_".$i][0]).", ";
                        //         $query = $query."upload_img = ".$this->null_check($image_idxs[$i][0]).", ";
                        //     }
                        // }
                        if($image_idxs != null) {
                            if($param["image_sync"] == "1") {
                                $query = $query."real_img = ".$this->null_check($imgName[0]).", ";
                                $query = $query."upload_img = ".$this->null_check($imgReal[0]).", ";
                            }
                            else {
                                $query = $query."real_img = ".$this->null_check($imgName[$i - 1]).", ";
                                $query = $query."upload_img = ".$this->null_check($imgReal[$i - 1]).", ";
                            }
                        }
                        $query = $query." modify_date = now()";
                        $query = $query." WHERE lang_idx = ".$this->null_check($i)." AND ";
                        $query = $query."key_code = ".$this->null_check($param["key_code"])."";
                        $result = $this->conn->db_update($query);
                    }            
            
                    if($result["result"] == "1") {
                        if($file_idxs != null) {
                            $insertFlag = false;
                            $query = "INSERT INTO notice_file(key_code, real_file, upload_file, lang_idx) VALUES(";
                            for($i = 1; $i <= $param["langLength"]; $i++) {
    
                                if($param["file_sync"] == "1") {
                                    $fileCount = count($file_idxs[0]);
                                }
                                else{
                                    $fileCount = count($file_idxs[$i - 1]);
                                }
                               
                                if($fileCount > 0){
                                    $insertFlag = true;
                                    for($j = 0; $j < $fileCount; $j++) {
                                        $query = $query.$this->null_check($key_code).", ";

                                        if($param["file_sync"] == "1") {
                                            $query = $query.$this->null_check($_FILES["file_1"]["name"][$j]).", ";
                                            $query = $query.$this->null_check($file_idxs[0][$j]).", ";
                                        }
                                        else {
                                            $query = $query.$this->null_check($_FILES["file_".$i]["name"][$j]).", ";
                                            $query = $query.$this->null_check($file_idxs[$i -1][$j]).", ";
                                        }
    
                                        $query = $query.$this->null_check($i)."), (";
                                    }
                                }
                            }
                            if($insertFlag){
                                $query = substr($query, 0, -3);
                                $result = $this->conn->db_insert($query);
                                $this->result = $result;
                            }
                        }
                        $this->result = $result;
                        $this->result["message"] = "게시글 등록 성공";
                    }
                    else {
                        $this->result["result"] = "0";
                        $this->result["message"] = "글 저장에 실패하였습니다.";  
                    }
                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "글 정보를 불러오는데 실패하였습니다.";  
                }

                if($result["error_code"] != null) {
                    $query = "DELETE FROM notice WHERE key_code = ".$key_code;
                    $result = $this->conn->db_delete($query);

                    $query = "DELETE FROM notice_file WHERE key_code = ".$key_code;
                    $result = $this->conn->db_delete($query);

                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                    return;
                }
                else {
                    $sumnote_img = json_decode($param["sumnote_img"]);
                        if(count($sumnote_img) > 0){
                            $query = "UPDATE sumnote_img SET state = 1 WHERE file_name = ";
                            for($i = 0; $i < count($sumnote_img); $i++) {
                                if($i == 0) {
                                    $query = $query.$this->null_check($sumnote_img[$i]);
                                }
                                else {
                                    $query = $query." or file_name = ".$this->null_check($sumnote_img[$i]);
                                }
                            }
                            $result = $this->conn->db_update($query);
                        }
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
                    $sql = "update notice set seq = ".($i + 1);
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
        /********************************************************************* 
        // 함 수 : sumnote img 테이블 데이터 삭제 함수
        // 설 명 : 현재 시간 기준으로 24시간이 지난 데이터를 가져와서 삭제
        // 만든이: 조경민
        *********************************************************************/
        function delete_sumnote_img(){
            $sql = "select file_name, path from sumnote_img where regdate < date_add(now(), interval -24 hour) and state = 0";
            $result = $this->conn->db_select($sql);
            if($result["result"] == "1"){
                //삭제할 파일이 있는 경우만 실행
                if(count($result["value"]) > 0){
                    $delete_file_array = array(); //서버에서 삭제할 파일 배열
                    $sql = "delete from sumnote_img where file_name = ";
                    for($i = 0; $i < count($result["value"]); $i++){
                        if($i == 0){
                            $sql .= $this->null_check($result["value"][$i]["file_name"]);
                        }else{
                            $sql .= " or file_name = ".$this->null_check($result["value"][$i]["file_name"]);
                        }
    
                        array_push($delete_file_array, $result["value"][$i]["file_name"]);
                    }
                    $delete_result = $this->conn->db_delete($sql);
                    if($result["result"] == "1"){
                        //DB 삭제에 성공했으면 서버에 저장된 파일들도 삭제
                        for($i = 0; $i < count($result["value"]); $i++){
                            $delete_file_arr = array();
                            $upload_content_dir = null;
                            array_push($delete_file_arr, $result["value"][$i]["file_name"]);
                            $upload_content_dir = $result["value"][$i]["path"]; //description 이밎 업로드 경로
                            $this->common_func->delete_file($delete_file_arr, $upload_content_dir);
                        }

                    }
                }
            }
            echo $this->jsonEncode($this->result);
        }
        /********************************************************************* 
        // 함 수 : request_image_url
        // 설 명 : sumnote에서 등록한 이미지를 서버에 등록하고 등록된 파일이름을 return해주는 함수
        // 만든이: 조경민
        *********************************************************************/
        function request_image_url(){
            $param = $this->json;
            //첨부 파일 처리
            $file = $_FILES["file"];
            $upload_image_dir = "_upload/".$param["path"]; //업로드 경로
            $this->common_func->create_upload_dir($upload_image_dir); //해당 폴더가 있는지 없는지 체크후 없으면 생성
            $create_file_result = $this->common_func->create_file_name($upload_image_dir, $file); //서버로 넘어온 파일로 업로드할 파일명 생성
            $this->common_func->upload_file($create_file_result["upload_file"], $upload_image_dir, $file);

            //sumnote_img 테이블에 업로드 이미지 데이터 insert
            if(count($create_file_result["upload_file"]) > 0){
                $sql = "insert into sumnote_img(file_name, origin_file_name, path, regdate) values(";
                for($i = 0; $i < count($create_file_result["upload_file"]); $i++){
                    $sql .= $this->null_check($create_file_result["upload_file"][$i]).",";
                    $sql .= $this->null_check($create_file_result["real_file"][$i]).",";
                    $sql .= $this->null_check($upload_image_dir).",";
                    $sql .= "now()),(";
                }

                $sql = substr($sql, 0, -2);
                $result = $this->conn->db_insert($sql);
                if($result["result"] == "1"){
                    $this->result = $result;
                    $this->result["value"] = $create_file_result["upload_file"];
                    $this->result["path"] = $param["path"];
                }else{
                    $this->result = $result;
                }
            }

            echo $this->jsonEncode($this->result);
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