<?php
	require_once "lib/jin_webcore/WebcoreHandler.class.php";

	class ButtonHandler implements WebcoreHandler {
		
		public function process(&$context) 
		{
			$context['data/message'] = 'You are pushed: ' . $context['request/parameters']['name'];
		}
	
	}
?>