<?php
	require_once "WebcoreHAndlerProcessor.class.php";

	class WebcoreSingleton {
		
		private static $instance;
		
		public static function getInstance() {
			if (!isset(self::$instance)) {
				$c = __CLASS__;
				self::$instance = new $c;
			}
			return self::$instance;		
		}
		
		private function __construct() {
			$this->handlers = array();
		}
		
		public function getHandlers() {
			return $this->handlers;
		}
				
		public function registerHandler($path, $handler) {
			$this->handlers[] = new WebcoreHandlerProcessor($path, $handler);
		}
				
	}
?>