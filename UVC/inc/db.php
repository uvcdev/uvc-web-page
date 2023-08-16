<?php
	class db{
		private $conn;
		
		//생성자 db생성
		private $dataBase;
		function __construct($dataBase){
			// Create connection
			$this->dataBase = $dataBase;
			$this->conn = new \mysqli('localhost', 'root', 'opcua5497WKd', "uvc");
			// $this->conn = new \mysqli('kyungmin7306.cafe24.com', 'kyungmin7306', 'min14-73065917!', $dataBase);
      // Check connection
			if ($this->conn->connect_error) {
				die("데이터베이스 연결실패: " . $this->conn->connect_error);
			}
		}

		function get_result($sql){
			$result = $this->conn->query($sql);
			return $result;
		}

		function get_query($sql){//최종본 에러코드와 함께 전달
			$result = $this->conn->query($sql);
			$array = array(
				"error_code"=>$this->conn->error,
				"error_msg"=>$this->conn->error,
				"result"=>$result
			);
			return $array;
		}

		public function get_conn(){
			return $this->conn;
		}

		public function s_transaction(){
			$this->conn->query("start transaction");
		}

		public function commit(){
			$this->conn->query("commit");
		}

		public function begin(){
			$this->conn->query("begin");
		}

		public function rollback(){
			$this->conn->query("rollback");
		}

		public function close(){//fianl 변경 불가능
			$this->conn->close();
		}
	}
?>