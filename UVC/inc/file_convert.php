<?php
	class file_convert{
        /********************************************************************* 
        // 함수명: get_s3_image_array($a,$b,$c) 
        // 함수 설명 : description 내용에 있는 s3 LINK인 파일의 이름을 배열로 리턴
        // $description: description 내용
        // $s3Link: s3 이미지 링크 ex: https://s3.ap-northeast-2.amazonaws.com/lbplatform/files/life_in/boardImage
        // 만든이: 과장 만든날 : 2019-05-15
        *********************************************************************/
        function get_s3_image_array($description, $s3Link){
            $array = array();

            $img_startString = '<img src="'.$s3Link;
            $img_pos = strpos($description, $img_startString);
            while($img_pos !== false){
                $description = substr($description, $img_pos);// base64StartString앞부분을 제거후 뒷부분만 가져옴

                $img_endString = '">';
                $img_end_pos = strpos($description, $img_endString);
                $img_tag = substr($description, 0, $img_end_pos+2); //img tag 원문                


                //파일이름 빼내기
                $link_startString = $s3Link;
                $link_endString = 'style=';
                $link_pos = strpos($description, $link_startString);
                $link_end = strpos($description, $link_endString);
                $link = substr($description, $link_pos, $link_end-$link_pos); 

                

                $file_name_array = explode( '/', $link);
                $file_name = $file_name_array[count($file_name_array)-1];
                $file_name = str_replace(" ","",$file_name);
                $file_name = str_replace('"',"",$file_name);
                
                

                $array[] = $file_name;
                
                $description = str_replace($img_tag,"",$description);
                
                $img_pos = strpos($description, $img_startString);
            }
            return $array;
        }
        

        function convert_description($s3Path,$s3Link,$description,$type){

            $folder_list = explode("/",$s3Link);
            $dir = "";
            for($i=0;$i<count($folder_list);$i++){
                if($folder_list[$i]!=""){
                    $dir = $dir.$folder_list[$i]."/";
                    if(!is_dir($dir)){
                        mkdir($dir);
                    }
                }
            }
            
            // print_r('aa');
            $description_array = [];
            // echo $description;
            //data-filename 삭제하기 끝

            //base64 찾는 string
            $base64StartString = '<img src="data:image/';
            $base64EndString = '" data-filename=';
            //image파일 시작지점 찾기
            $pos = strpos($description, $base64StartString);
            $end = strpos($description, $base64EndString);

            

            while($pos !== false){

                //확장자 가져오기
                $extensionStartString = 'data:image/';
                $extensionEndString = ';base64';

                $extensionStartpos = strpos($description, $extensionStartString);
                $extensionEnd = strpos($description, $extensionEndString);
                $extension = substr($description, $extensionStartpos+11, ($extensionEnd-$extensionStartpos)-11);
                
                // print_r($extension);    

                if($extension=="jpeg"){
                    $extension="jpg";
                }
                //확장자 가져오기 끝

                $pos = $pos + 10;  //searchString 글자수만큼+
                //base64파일이 있음


                //파일이름 및 확장자
                $fileName = $this->rand_name(); //파일명은 랜덤으로 만듬
                // print_r($fileName);
                // $fileName = $this->rand_check($s3Path, $fileName);
                $fileName = $this->rand_check2($s3Path, $fileName, $extension);

                // print_r($fileName);
                // $fileName = $fileName.".".$extension; //랜덤으로 만든 파일이름과 확장자를 합쳐줌
                
                // print_r($fileName);
                
                //base64 String가져오기
                $base64FileString = substr($description,$pos,$end-$pos); //base64형식의 파일 string
                
                
                //내부 저장일 경우 s3에서 -> 내부 저장 변경

                // print_r($s3Path.$fileName);
                $this->base64_to_image($base64FileString,$s3Path."content_img/".$type."/".$fileName);
                // move_uploaded_file($this->base64_to_image($base64FileString,$s3Path."img/".$fileName),$s3Path.$fileName);
                // $s3Manage->insertFile($s3Path.$fileName ,$this->base64_to_image($base64FileString,"temp/".$fileName));
                // unlink("temp/".$fileName);//업로드가 완료되면 temp파일삭제


                //링크 대체하기전 0부터 base64해당 부분까지 string 짜르기
                $description_front = substr($description,0,$end);
                $description_array[] = str_replace($base64FileString,$s3Link.$fileName,$description_front); //짜른 부분 링크대체후 array push
                //앞에 자른부분은 필요없으니 원본 description은 짜른 이후 부분만 넣어줌
                $description = substr($description, $end);
                //data-filename 삭제하기 
                //*다음파일 찾을때 방해됨
                $filenameStartString = 'data-filename="';
                $filenameEndString = '" style=';
                $end = strpos($description, $base64EndString);
                $filename_pos = strpos($description, $filenameStartString, $end);
                $filename_end = strpos($description, $filenameEndString, $filename_pos+15);
                $fileName = substr($description, $filename_pos, ($filename_end - $filename_pos)+1);

                //data-filename 삭제하기전 해당 부분까지 string 짜르기
                $filename_front = substr($description,0,$filename_end+1);
                $description_array[] = str_replace($fileName,"",$filename_front);
                //앞에 자른부분은 필요없으니 원본 description은 짜른 이후 부분만 넣어줌
                $description = substr($description, $filename_end+1);
                //data-filename 삭제하기 끝

                $pos = strpos($description, $base64StartString);
                $end = strpos($description, $base64EndString);
            }

            
            $complete_description = "";
            //array description 합치기
            for($i=0; $i<count($description_array); $i++){
                $complete_description = $complete_description.$description_array[$i];
            }
            $complete_description = $complete_description.$description; //나머지 뒷부분 description 합치기
            // echo $complete_description."\n";
            return $complete_description;
        }

        //원본 과 기존 description 비교 후 지워진 이미지만 뽑아냄
        function check_description_diff_array($table_name, $table_idx, $project_name, $type, $new_description){
            $delete_file = array();
            $origin_description = "";
            $new_description = $this->get_s3_image_array($new_description, "/" . $project_name . "/content_files/content_img/" . $type);
            $description_sql = "select * from " . $table_name . " where ".$table_name.".idx = " . $table_idx . "";
            $description_list = $this->conn->get_result($description_sql);
            $description_list = $this->fetchList($description_list);
            if ($description_list) {
                $origin_description = $description_list[0]["description"];
                $origin_description = $this->get_s3_image_array($origin_description, "/" . $project_name . "/content_files/content_img/" . $type);
                if ($origin_description) {
                    $delete_file = array_diff($origin_description, $new_description);
                }
            }
            return $delete_file;
        }


        //로컬파일 랜덤 체크
        function rand_check2($dir, $filename, $extension){

            // print_r('aafasdfsdafadsfdsafasdfasdfa');

            $target_dir = $dir;
            $target_filename = $filename.".".$extension;
            $handle = openDir($target_dir);

            $files = array();

            while(false !== ($dir_filename = readdir($handle))){
                if($dir_filename == "." || $dir_filename == ".."){
                    continue;
                }

                if(is_file($target_dir."/".$dir_filename)){
                    $files[] = $dir_filename;
                }
            }

            closedir($handle);
            sort($files);

            // print_r($target_filename);

            if(count($files)!=0){
                $check = true;
                while($check){
                    for($i = 0; $i<count($files); $i++){
                        if($filename == $files[$i]){
                            
                            $check = true;
                            break;
                        }else{
                            $check = false;
                        }
                    }
                    $target_filename = $this->rand_name().".".$extension;
                }
            }
            

            return $target_filename;
            
        }


        //temp폴더에 파일 임시 생성
        function base64_to_image($base64_string, $output_file) {
            // open the output file for writing
            $ifp = fopen($output_file, 'w' ); //root폴더의 temp폴더에 임시 생성
            // split the string on commas
            // $data[ 0 ] == "data:image/png;base64"
            // $data[ 1 ] == <actual base64 string>
            $data = explode( ',', $base64_string );
            // we could add validation here with ensuring count( $data ) > 1
            fwrite( $ifp, base64_decode( $data[ 1 ] ) );
            // clean up the file resource
            fclose( $ifp ); 
            return $output_file; 
        }

        function uuidgen4() {
            return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
               mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
               mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000,
               mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
             );
         }

         

        function convert_description_v2($s3Path,$s3Link,$description){

            $folder_list = explode("/",$s3Link);
            $dir = "";
            for($i=0;$i<count($folder_list);$i++){
                if($folder_list[$i]!=""){
                    $dir = $dir.$folder_list[$i]."/";
                    if(!is_dir($dir)){
                        mkdir($dir);
                    }
                }
            }
            
            // print_r('aa');
            $description_array = [];
            // echo $description;
            //data-filename 삭제하기 끝

            //base64 찾는 string
            $base64StartString = '<img src="data:image/';
            $base64EndString = '" data-filename=';
            //image파일 시작지점 찾기
            $pos = strpos($description, $base64StartString);
            $end = strpos($description, $base64EndString);

            

            while($pos !== false){

                //확장자 가져오기
                $extensionStartString = 'data:image/';
                $extensionEndString = ';base64';

                $extensionStartpos = strpos($description, $extensionStartString);
                $extensionEnd = strpos($description, $extensionEndString);
                $extension = substr($description, $extensionStartpos+11, ($extensionEnd-$extensionStartpos)-11);
                
                // print_r($extension);    

                if($extension=="jpeg"){
                    $extension="jpg";
                }
                //확장자 가져오기 끝

                $pos = $pos + 10;  //searchString 글자수만큼+
                //base64파일이 있음


                //파일이름 및 확장자
                $fileName = $this->rand_name(); //파일명은 랜덤으로 만듬
                // print_r($fileName);
                // $fileName = $this->rand_check($s3Path, $fileName);
                $fileName = $this->rand_check2($s3Path, $fileName, $extension);

                // print_r($fileName);
                // $fileName = $fileName.".".$extension; //랜덤으로 만든 파일이름과 확장자를 합쳐줌
                
                // print_r($fileName);
                
                //base64 String가져오기
                $base64FileString = substr($description,$pos,$end-$pos); //base64형식의 파일 string
                
                
                //내부 저장일 경우 s3에서 -> 내부 저장 변경

                // print_r($s3Path.$fileName);
                $this->base64_to_image($base64FileString,$s3Path.$fileName);
                // move_uploaded_file($this->base64_to_image($base64FileString,$s3Path."img/".$fileName),$s3Path.$fileName);
                // $s3Manage->insertFile($s3Path.$fileName ,$this->base64_to_image($base64FileString,"temp/".$fileName));
                // unlink("temp/".$fileName);//업로드가 완료되면 temp파일삭제


                //링크 대체하기전 0부터 base64해당 부분까지 string 짜르기
                $description_front = substr($description,0,$end);
                $description_array[] = str_replace($base64FileString,$s3Link.$fileName,$description_front); //짜른 부분 링크대체후 array push
                //앞에 자른부분은 필요없으니 원본 description은 짜른 이후 부분만 넣어줌
                $description = substr($description, $end);
                //data-filename 삭제하기 
                //*다음파일 찾을때 방해됨
                $filenameStartString = 'data-filename="';
                $filenameEndString = '" style=';
                $end = strpos($description, $base64EndString);
                $filename_pos = strpos($description, $filenameStartString, $end);
                $filename_end = strpos($description, $filenameEndString, $filename_pos+15);
                $fileName = substr($description, $filename_pos, ($filename_end - $filename_pos)+1);

                //data-filename 삭제하기전 해당 부분까지 string 짜르기
                $filename_front = substr($description,0,$filename_end+1);
                $description_array[] = str_replace($fileName,"",$filename_front);
                //앞에 자른부분은 필요없으니 원본 description은 짜른 이후 부분만 넣어줌
                $description = substr($description, $filename_end+1);
                //data-filename 삭제하기 끝

                $pos = strpos($description, $base64StartString);
                $end = strpos($description, $base64EndString);
            }

            
            $complete_description = "";
            //array description 합치기
            for($i=0; $i<count($description_array); $i++){
                $complete_description = $complete_description.$description_array[$i];
            }
            $complete_description = $complete_description.$description; //나머지 뒷부분 description 합치기
            // echo $complete_description."\n";
            return $complete_description;
        }
    }
?>