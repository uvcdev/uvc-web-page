<?php
	include_once($dir.'/vendor/autoloader.php');
	class AutoLoaderRegister{
		function __construct($folder){
			for($i=0;$i<count($folder);$i++){
				new auto_loader($folder[$i]);
			}
		}
	}
?>