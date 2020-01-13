<?php
/**
* Plugin Name: Serpwars Mobile CTA 
* Description:CONVERT MORE WEBSITE VISITORS INTO NEW CUSTOMERS
Drive more Phone Calls and Conversions from your WordPress Website in under 60 Seconds. Use WP Conversion Bar to setup effective Mobile CTAs – for free.
* Version: 1.0.34
* Author: SERPWARS
* Author URI: http://roberttalavera.cu.ma/wp/
* Text Domain: ca-mobile-elements
* License: GPLv3
*/



define( 'SERPWARS_MOBILE_ELEMENTS_FILE', __FILE__ );
define( 'SERPWARS_MOBILE_ELEMENTS_URI', plugin_dir_url( __FILE__ ) );
define( 'SERPWARS_MOBILE_ELEMENTS', plugin_dir_path( SERPWARS_MOBILE_ELEMENTS_FILE ) );
define( 'SERPWARS_MOBILE_ELEMENTS_PATH', plugin_dir_path( SERPWARS_MOBILE_ELEMENTS_FILE ) );
define( 'SERPWARS_MOBILE_ELEMENTS_ASSETS', SERPWARS_MOBILE_ELEMENTS_URI."assets" );

require('includes/libs/mobile-elements.api_settings.class.php' );
require('includes/mobile-element.class.php' );
require('includes/mobile-admin-class.php' );
require('includes/mobile-elements.php' );
require_once("frontend/frontend-helper.class.php");
require_once("frontend/main.php");
require_once("frontend/marketing-tools.php");
// require('includes/facebook-chat.php' );

// require_once("includes/libs/facebook-chat/main.php");

function hook_css() {
    ?>
        <style id="styler">
            .wp_head_example {
                background-color : #f1f1f1;
            }
        </style>
    <?php
}
add_action('admin_head', 'hook_css');
?>