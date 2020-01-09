<?php 
	require_once("class-customer-chat-for-facebook.php");
	function serp_run_facebook_messenger() {
		$plugin = new Customer_Chat();
		$plugin->run();
	}
	serp_run_facebook_messenger();

?>