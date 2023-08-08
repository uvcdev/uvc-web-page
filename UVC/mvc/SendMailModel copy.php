<?php
    class SendMailModel extends gf{
        private $json;
        private $dir;
        private $conn;

        function __construct($array){
            $this->json = $array["json"];
            $this->dir = $array["dir"];
            $this->conn = $array["db"];
            $this->email = $array["to_email"];
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
        // 담당자: 조경민
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
        // 함 수 : Send mail
        // 만든이: 박여진
        // 담당자: 
        *********************************************************************/
		function send_mail() {
            $param = $this->json;

            if($this->value_check(array( "name", "phone", "email", "content"))) {
                $query = "INSERT INTO inquiry(name, company, email, content, phone, lang_idx, reg_date) VALUES(";
                
                $query = $query.$this->null_check($param["name"]).",";
                $query = $query.$this->null_check($param["company"]).",";
                $query = $query.$this->null_check($param["email"]).",";
                $query = $query.$this->null_check($param["content"]).",";
                $query = $query.$this->null_check($param["phone"]).",";
                $query = $query.$this->null_check($param["lang_idx"]).",";
                $query = $query."now())";

                $result = $this->conn->db_insert($query);
                if($result["result"] == "1") {
                    $this->result = $result;
                    $this->result["message"] = "메일 내용 등록 성공";
                    
                    //DB에 메일 등록에 성공하면 메일 전송
                    // if($param["category"] != "0") {
                        $json = array();
                        $json["body"] = $this->get_mail_body(1, $param); //이메일 내용 ( 이메일 내용 바꾸기 )
                        $json["title"] = "온라인문의가 도착했습니다."; //이메일 제목 ( 이메일 제목 바꾸기 )
                        $json["to_list"] = ["kyu@dutkorea.co.kr"]; //메일 받을사람 주소 array    
                        $json["set_from"] = "datgsender@gmail.com"; //구글메일에서 변경안됨(원래 계정 메일주소로 전송됨)
                        $json["project"] = $this->project_name; //프로젝트 이름
                        $json["from_name"] = $this->project_name; //보내는사람 이름(별칭)
                        $mail_model = new MailModel();
                        $mail_model->send_mail($json);
                    // }
                    //파일 전송이 끝나면 서버에 저정한 파일 목록 삭제
                    // for($i = 0; $i < count($send_file_1_array); $i++){
                    //     unlink($send_file_1_array[$i]);
                    // }
                }
                else {
                    $this->result["result"] = "0";
                    $this->result["message"] = "Inquiry registration failed.";
                    echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
                    return;
                }
            }   
            echo json_encode($this->result,JSON_UNESCAPED_UNICODE);
        }

        function get_mail_body($type, $param){
            if($type == 1){
                return 
                '
                <div class="sub_container"style="text-align: center;">
                    <div class="boundary"style="max-width:900px; padding:24px; margin:0 auto;">						   
                        <!--border 내용시작-->
                        <div class="content"style="border:1px solid #ddd; padding:40px 0;">
                            <div class="logo"style="padding-bottom:20px; margin:0 auto;">
                                <img src="https://s3.ap-northeast-2.amazonaws.com/lbplatform/images/DUT/164539348655253.png" style="width:148px; " alt="logo">
                            </div>
                            <p style="border-top:3px solid #222; width:5%; margin:0 auto; padding-bottom:20px"></p>
                            <span class="title"style="font-weight: 600; font-size: 22px; right: -16px; display:block; padding-bottom:10px; color:#222">
                            온라인문의가 <span class="txt-r-color" style="color:#68ab5e;">도착</span>하였습니다.
                            </span>
                            <div class="content-box" style="width:80%; overflow:hidden; border:1px solid #ddd; margin:0 auto; margin-top:15px; padding:20px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="height:40px; font-size:15px; border:3px solid #fff; box-sizing:border-box;  width:100px; text-align:center; background-color:#ddd">이름</td>
                                        <td style="height:40px; font-size:15px;  border:3px solid #fff; box-sizing:border-box; text-align:left;">'.$param["name"].'</td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px; font-size:15px; border:3px solid #fff; box-sizing:border-box;  width:100px; text-align:center; background-color:#ddd">회사정보</td>
                                        <td style="height:40px; font-size:15px;  border:3px solid #fff; box-sizing:border-box; text-align:left;">'.$param["company"].'</td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px; font-size:15px; border:3px solid #fff; box-sizing:border-box;  width:100px; text-align:center; background-color:#ddd">전화번호</td>
                                        <td style="height:40px; font-size:15px;  border:3px solid #fff; box-sizing:border-box; text-align:left;">'.$param["phone"].'</td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px; font-size:15px; border:3px solid #fff; box-sizing:border-box;  width:100px; text-align:center; background-color:#ddd">이메일</td>
                                        <td style="height:40px; font-size:15px;  border:3px solid #fff; box-sizing:border-box; text-align:left;">'.$param["email"].'</td>
                                    </tr>
                        
                                    <tr>
                                        <td style="height:40px; font-size:15px; border:3px solid #fff; box-sizing:border-box;  width:100px; text-align:center; background-color:#ddd">문의내용</td>
                                        <td style="height:40px; font-size:15px;  border:3px solid #fff; box-sizing:border-box; text-align:left;">
                                            <textarea style="width: 100%; height: 200px; resize: none; padding: 10px;" readonly>'.$param["content"].'</textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
                ';
            }
        }
        
    }
?>