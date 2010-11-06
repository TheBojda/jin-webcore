<?php
	class WebcoreHandlerProcessor {
	
		public function __construct($path, $handler) {
			$this->pattern = '@' . $path . '@';
			$this->handler = $handler;
		}
		
		public function match($pathInfo) {
			if(preg_match($this->pattern, $pathInfo, $matches)) {
				return $matches;
			}
			return FALSE;
		}
		
		public function execute(&$context) {
			$this->handler->process($context);
		}
		
	}
?>