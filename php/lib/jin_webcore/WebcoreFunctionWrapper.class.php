<?php
	require_once "WebcoreHandler.class.php";
	
	class WebcoreFunctionWrapper implements WebcoreHandler {
	
		public function __construct($function_name) {
			$this->function_name = $function_name;
		}
	
		public function process(&$context) {
			call_user_func($this->function_name, $context);
		}
		
	}
?>