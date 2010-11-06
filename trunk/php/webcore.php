<?php
	require_once "lib/jin_webcore/WebcoreSingleton.class.php";

	$context = array();
	include "init.php";

	$context['request/method'] = $_SERVER["REQUEST_METHOD"];
	$context['view_url'] = $_SERVER["PATH_INFO"];
	$request = array_merge($_POST, $_GET);

	$handlers = WebcoreSingleton::getInstance()->getHandlers();
	foreach($request as $name => $value) {
		if(strpos($name,'action/') === 0) {
			$action = substr($name, 7);
			foreach($handlers as $handler) {
				$action_params = $handler->match($action);
				if($action_params) {
					$context['request/parameters'] = array_merge($request, $action_params);
					$handler->execute($context);
				}
			}
		}
	}
	
	$view_url = $context['view_url'];
	if($view_url)
	{
		foreach($handlers as $handler) {
			$url_params = $handler->match($view_url);
			if($url_params) {
				$context['request/parameters'] = array_merge($request, $url_params);;
				$handler->execute($context);
			}
		}
	}
?>