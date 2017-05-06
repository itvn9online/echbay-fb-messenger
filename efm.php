<?php
/**
 * Plugin Name: EchBay Facebook Messenger
 * Description: Add Facebook messenger box to your website.
 * Plugin URI: https://github.com/itvn9online/echbay-fb-messenger
 * Author: Dao Quoc Dai
 * Author URI: https://www.facebook.com/ech.bay/
 * Version: 1.0.0
 * Text Domain: echbayefm
 * Domain Path: /languages/
 * License: GPLv2 or later
 */

// Exit if accessed directly
if (! defined ( 'ABSPATH' )) {
	exit ();
}

// define( 'EFM_DF_MAIN_FILE', __FILE__ );
// echo EFM_DF_MAIN_FILE . "\n";

define ( 'EFM_DF_DIR', dirname ( __FILE__ ) . '/' );
// echo EFM_DF_DIR . "\n";

define ( 'EFM_DF_VERSION', '1.0.0' );
// echo EFM_DF_VERSION . "\n";

// define( 'EFM_DF_TEXT_DOMAIN', 'echbayefm' );
// echo EFM_DF_TEXT_DOMAIN . "\n";

//define ( 'EFM_DF_ROOT_DIR', basename ( EFM_DF_DIR ) );
// echo EFM_DF_ROOT_DIR . "\n";

//define ( 'EFM_DF_NONCE', EFM_DF_ROOT_DIR . EFM_DF_VERSION );
// echo EFM_DF_NONCE . "\n";

//define ( 'EFM_DF_URL', plugins_url () . '/' . EFM_DF_ROOT_DIR . '/' );
// echo EFM_DF_URL . "\n";

//define ( 'EFM_DF_PREFIX_OPTIONS', '___efm___' );
// echo EFM_DF_PREFIX_OPTIONS . "\n";

//
require_once EFM_DF_DIR . 'class.php';

//
$EFM_func = new EFM_Actions_Module ();

// load custom value in database
$EFM_func->load ();

// check and call function for admin
if (is_admin ()) {
	add_action ( 'admin_menu', 'EFM_add_menu_setting_to_admin_menu' );
}
// or guest (public in theme)
else {
	add_action ( 'wp_footer', 'EFM_show_facebook_messenger_box_in_site' );
}




