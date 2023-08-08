<?php
	class UtillLangController {
		private $param;
        private $dir;
        private $version;
		function __construct($array){
			
			$this->param = $array["json"];
            $this->dir = $array["dir"];
            $this->version = $array["version"];
            $this->model = new UtillLangModel($array);
		}

		function change_lang(){
			$this->model->change_lang();
		}

		function lang_check(){
			$this->model->lang_check();
		}

		function lang($page,$str){
			$result = $this->model->lang($page,$str);
			return $result;
		}

		function print_css($page_type){
			$this->model->print_css($page_type,$this->version,$this->dir);
		}
	}
?>