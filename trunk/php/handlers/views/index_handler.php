<?php
	require_once "lib/jin_webcore/WebcoreHandler.class.php";

	class IndexHandler implements WebcoreHandler {
		
		public function process(&$context) {
			?>
<html>
	<body>
		<form method="POST">
		<?php echo $context['data/message']; ?><br/><br/>
		<input type="submit" name="action/button_test/button1" value="Button 1"/>
		<input type="submit" name="action/button_test/button2" value="Button 2"/>
		<input type="submit" name="action/redirected_button_test" value="Button 3"/>
		</form>
	</body>
</html>
			<?php
		}
	}
?>