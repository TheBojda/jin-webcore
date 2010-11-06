<?php
	require_once "lib/jin_webcore/WebcoreFunctionWrapper.class.php";

	require_once "handlers/views/index_handler.php";
	require_once "handlers/actions/button_handler.php";
	
	$context['data/message'] = "Hello WebCore!";

	function test_handler(&$context) {
		var_dump($context);
	}

	function redirected_button_handler(&$context) {
		header("Location: http://localhost/jin-webcore-php/test/1234");
		$context['view_url'] = FALSE;
	}

	WebcoreSingleton::getInstance()->registerHandler("^/$", new IndexHandler);
	WebcoreSingleton::getInstance()->registerHandler("^/test/(?P<id>\d+)$", new WebcoreFunctionWrapper("test_handler"));
	WebcoreSingleton::getInstance()->registerHandler("^button_test/(?P<name>\w+)$", new ButtonHandler);
	WebcoreSingleton::getInstance()->registerHandler("^redirected_button_test$", new WebcoreFunctionWrapper("redirected_button_handler"));
?>