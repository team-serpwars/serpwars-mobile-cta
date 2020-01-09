<?php
namespace CA_Mobile_Elements;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Autoloader {

	private static function load_class( $relative_class_name ) {
		if ( isset( self::$classes_map[ $relative_class_name ] ) ) {
			$filename = CA_MOBILE_ELEMENTS_PATH . '/' . self::$classes_map[ $relative_class_name ];
		} else {
			$filename = strtolower(
				preg_replace(
					[ '/([a-z])([A-Z])/', '/_/', '/\\\/' ],
					[ '$1-$2', '-', DIRECTORY_SEPARATOR ],
					$relative_class_name
				)
			);

			$filename = CA_MOBILE_ELEMENTS_PATH . $filename . '.php';
		}

		if ( is_readable( $filename ) ) {
			require $filename;
		}
	}
	
	private static function autoload( $class ) {
		if ( 0 !== strpos( $class, __NAMESPACE__ . '\\' ) ) {
			return;
		}

		$relative_class_name = preg_replace( '/^' . __NAMESPACE__ . '\\\/', '', $class );

		$has_class_alias = isset( self::$classes_aliases[ $relative_class_name ] );

		// Backward Compatibility: Save old class name for set an alias after the new class is loaded
		if ( $has_class_alias ) {
			$relative_class_name = self::$classes_aliases[ $relative_class_name ];
		}

		$final_class_name = __NAMESPACE__ . '\\' . $relative_class_name;

		if ( ! class_exists( $final_class_name ) ) {
			self::load_class( $relative_class_name );
		}

		if ( $has_class_alias ) {
			class_alias( $final_class_name, $class );
		}
	}

	public static function run() {
		spl_autoload_register( [ __CLASS__, 'autoload' ] );
	}	
}
?>