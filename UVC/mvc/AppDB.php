<?php
class AppDB extends gf
{
    private $conn;

    function __construct($db){
        $this->conn = $db;
        $this->result = array(
            "result" => null,
            "error_code" => null,
            "message" => null,  
            "value" => null,
        );
        $this->is_transaction = false;
    }
    
    /********************************************************************* 
    // 함수 설명- 데이터 베이스 select문을 실행함
    // 매개변수 : $select_sql
    // 만든이: 안정환
    // 수정이:
    *********************************************************************/
    function db_select($sql){
        
        $list = $this->conn->get_query($sql);
        if($list["error_code"]){
            $this->result["result"]="0";
            $this->result["error_code"]=$list["error_code"];
            $this->result["message"]=$list["error_msg"];
            $this->db_error($sql, "select");
        }else{
            $list = $this->fetchList($list["result"]);
            $this->result["result"]="1";
            $this->result["value"]=$list;
        }

        return $this->result;
    }

    /********************************************************************* 
    // 함수 설명- 데이터 베이스 update문을 실행함
    // 매개변수 : $select_sql
    // 만든이: 안정환
    // 수정이:
    *********************************************************************/
    function db_update($sql){
        $list = $this->conn->get_query($sql);
        if($list["error_code"]){
            $this->result["result"]="0";
            $this->result["error_code"]=$list["error_code"];
            $this->result["message"]=$list["error_msg"];
            $this->db_error($sql, "update");
        }else{
            //update문이기때문에 value는 필요없음
            $this->result["result"]="1";
        }
        return $this->result;
    }

    /********************************************************************* 
    // 함수 설명- 데이터 베이스 insert문을 실행함
    // 매개변수 : $select_sql
    // 만든이: 안정환
    // 수정이:
    *********************************************************************/
    function db_insert($sql){
        $list = $this->conn->get_query($sql);
        if($list["error_code"]){
            $this->result["result"]="0";
            $this->result["error_code"]=$list["error_code"];
            $this->result["message"]=$list["error_msg"];
            $this->db_error($sql, "insert");
        }else{
            $this->result["result"]="1";
            $this->result["value"] = $this->conn->get_conn()->insert_id;
        }
        return $this->result;
    }
    /********************************************************************* 
    // 함수 설명- 데이터 베이스 delete문을 실행함
    // 매개변수 : $select_sql
    // 만든이: 안정환
    // 수정이:
    *********************************************************************/
    function db_delete($sql){
        $list = $this->conn->get_query($sql);
        if($list["error_code"]){
            $this->result["result"]="0";
            $this->result["error_code"]=$list["error_code"];
            $this->result["message"]=$list["error_msg"];
            $this->db_error($sql,"delete");
        }else{
            $this->result["result"]="1";
        }
        return $this->result;
    }

    function db_error($sql, $kind){
        if($this->is_transaction){ //트랜잭션이라면 rollback하고 에러 출력
            $this->rollback();
        }
        $this->result["message"] = "오류가 발생하였습니다.\n계속될 경우 관리자에게 문의주세요.";
        echo $this->jsonEncode($this->result);


        //에러 테이블이 있는지 확인후 없으면 만들기
        $table_check_sql = "SELECT EXISTS (
        SELECT 1 FROM Information_schema.tables 
        WHERE table_schema = 'teachers' 
        AND table_name = 'error_log' 
        ) AS flag;";
        

        $list = $this->conn->get_query($table_check_sql);
        if($list["error_code"]){
            $this->result["result"]="0";
            $this->result["error_code"]=$list["error_code"];
            $this->result["message"]=$list["error_msg"];
        }else{
            $list = $this->fetchList($list["result"]);
            if($list[0]["flag"] == "0"){ //테이블이 없으면 create
                $create_sql = "CREATE TABLE `error_logs` (
                    `idx` int(11) NOT NULL AUTO_INCREMENT,
                    `data` text COMMENT '에러 로그',
                    `error_kind` text,
                    `datetime` datetime DEFAULT NULL,
                    PRIMARY KEY (`idx`)
                  ) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;";
                
                $this->conn->get_query($create_sql);
            }
        }


        //에러로그 db에 넣기
        $error_model = new Error_log($this->conn);
        $error_model->error_add(json_encode($sql),$kind);
        exit;
    }

    public function s_transaction(){
        $this->is_transaction = true;
        $this->conn->s_transaction();
    }

    public function commit(){
        $this->conn->commit();
    }

    public function begin(){
        $this->conn->begin();
    }

    public function rollback(){
        $this->conn->rollback();
        $this->is_transaction = false;
    }

    public function close(){//fianl 변경 불가능
        $this->conn->close();
    }
}
?>