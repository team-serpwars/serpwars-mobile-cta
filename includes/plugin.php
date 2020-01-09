<?php
namespace CA_Mobile_Elements;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {
	
	private function register_autoloader() {
		require CA_MOBILE_ELEMENTS_PATH . '/includes/autoloader.php';

		Autoloader::run();
	}

	private function __construct() {
		$this->register_autoloader();

		Compatibility::register_actions();

		add_action( 'init', [ $this, 'init' ], 0 );
	}
};


?>