<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$json = array();
	$json = $_REQUEST;
	$sumnote = $json;
	$json = param_replace($json);
	
	include_once "UVC/action.php";

	function param_replace($array){
		$json_array = $array;
		if(is_array($json_array) || is_object($json_array)){
			$result = array();
			foreach($json_array as $key => $value){
				$result[$key] = xss_data($value);
			}
			return $result;
		}
		return $json_array;
	}

	function xss_data($data){
		// fix&entity\n;

		// $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;&gt'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u','$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		// $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

		// "on"또는 xmlns로 시작하는 모든 속성 제거
		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

		// javascript : 및 vbscript : 프로토콜 제거
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

		// IE에서만 작동합니다 : <span style = "width : expression (alert ('Ping! '));"> </ span>
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?bsehaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

		// 네임 스페이스 요소 제거 (필요하지 않음)
		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
		do
		{
			// 원치 않는 태그 제거
			$old_data = $data;
			$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		}
		while ($old_data !== $data);

		return $data;
	}

?>