<?php
    class CommonFunc{
        function __construct($array){
            $this->dir = $array["dir"];
        }
        
        /********************************************************************* 
        // 함 수 : create_upload_dir()
        // 설 명 : 파일 upload dir이 있는지 체크하고 없으면 생성시켜주는 함수
        // 담당자: 조경민
        *********************************************************************/
        function create_upload_dir($dir){
            if(!is_dir($this->dir.$dir)){
                umask(0);
                if(!mkdir($this->dir.$dir, 0777, true)){
                    return;
                }
            }
        }

        /********************************************************************* 
        // 함 수 : create_file_name()
        // 설 명 : 랜덤한 파일명을 생성해주는 함수
        // 파라미터 : upload 경로에 동일한 파일 이름이 존재하는지 체크하기 위한
                     dir과 file 객체
        // 담당자: 조경민
        *********************************************************************/
        function create_file_name($dir, $file){
            $upload_file_arr = array();
            $real_file_arr = array();

            for($i = 0; $i < count($file["name"]); $i++){
                if($file["error"][$i] != 4){ //빈 파일이 아닐때
                    $spl = new splFileInfo($file["name"][$i]);
                    $file_ext = $spl->getExtension(); //확장자
                    $upload_file = md5(microtime()). '.' . $file_ext; //폴더에 저장되는 파일 이름
                    $real_file = $file["name"][$i];
                    while(file_exists($this->dir.$dir.$upload_file)){ //해당 경로에 중복되는 파일이름이 있으면 새로 저장
                        $upload_file = md5(microtime()). '.' . $file_ext; 
                    }

                    array_push($upload_file_arr, $upload_file);
                    array_push($real_file_arr, $real_file);
                }else{
                    
                }
            }

            $result = array(
                "upload_file" => $upload_file_arr,
                "real_file" => $real_file_arr,
            );

            return $result;
        }

        /********************************************************************* 
        // 함 수 : upload_file()
        // 설 명 : 해당 경로에 파일 업로드 함수
        // 파라미터 : upload할 파일 이름과 upload할 파일 경로 , 파일 객체
        // 담당자: 조경민
        *********************************************************************/
        function upload_file($file_arr, $dir, $file){
            $j = 0;
            if(count($file_arr) > 0){
                for($i = 0; $i < count($file["name"]); $i++){
                    if($file["error"][$i] != 4){
                        move_uploaded_file($file["tmp_name"][$i], $this->dir.$dir.$file_arr[$j]);
                        $j++;
                    }
                }
            }
        }

        /********************************************************************* 
        // 함 수 : delete_file()
        // 설 명 : 해당 경로에 파일 삭제 함수
        // 파라미터 : delete할 파일 이름과 파일 경로
        // 담당자: 조경민
        *********************************************************************/
        function delete_file($file_arr, $dir){
            for($i = 0; $i < count($file_arr); $i++){
                $delete_file_name = $this->dir.$dir.$file_arr[$i];
                if (file_exists($delete_file_name)) {
                    unlink($delete_file_name);
                }
            }
        }
    }
?>
