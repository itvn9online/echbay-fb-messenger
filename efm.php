<?php
/**
 * Plugin Name: EchBay Facebook Messenger
 * Description: Add Facebook messenger box to your website. Easily custom your style for chat box.
 * Plugin URI: https://www.facebook.com/webgiare.org/
 * Author: Dao Quoc Dai
 * Author URI: https://www.facebook.com/ech.bay/
 * Version: 1.0.2
 * Text Domain: echbayefm
 * Domain Path: /languages/
 * License: GPLv2 or later
 */

// Exit if accessed directly
if (! defined ( 'ABSPATH' )) {
	exit ();
}

define ( 'EFM_DF_VERSION', '1.0.2' );
// echo EFM_DF_VERSION . "\n";

// define( 'EFM_DF_MAIN_FILE', __FILE__ );
// echo EFM_DF_MAIN_FILE . "\n";

define ( 'EFM_DF_DIR', dirname ( __FILE__ ) . '/' );
// echo EFM_DF_DIR . "\n";

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









/*
* class.php
*/
// check class exist
if (! class_exists ( 'EFM_Actions_Module' )) {
	
	// my class
	class EFM_Actions_Module {
		
		/*
		* config
		*/
		var $default_setting = array (
				// License -> donate or buy pro version
				'license' => '',
				
				// Hide Powered by ( 0 -> show, 1 -> hide. This is trial version -> default hide )
				'hide_powered' => 1,
				
				// Minimized Width
				'widget_width' => 320,
				
				// Header Background
				'header_bg' => '#0084FF',
				
				// Header Text
				'header_text' => '#FFFFFF',
				
				// Position
				'widget_position' => 'br',
				
				// Facebook Link send mesenger to
//				'fb_link' => 'https://www.facebook.com/webgiare.org/',
				'fb_link' => '',
				
				// Header Title
				'widget_title' => 'Support Online',
				
				// Custom style
				'custom_style' => '/* Custom CSS */',
				
				// Desktop widget
				'desktop_theme' => 'full',
				
				// Mobile widget
				'mobile_theme' => 'full',
				
				// Show Bubble
				'show_bubble' => 'no',
				
				// Bubble Background Colors
				'bubble_bg_colors' => '#669900',
				
				// Bubble Colors
				'bubble_colors' => '#FFFFFF',
				
				// Bubble Content
				'bubble_content' => 'Chat live with an agent now!',
				
				// Time for show plugin
				'time_show' => 'box',
				
				// Form after timeout show plugi
				'time_out' => 'show',
				
				// time for days
				'mon_time_am' => '',
				'mon_time_am' => '',
				'tue_time_am' => '',
				'tue_time_pm' => '',
				'wed_time_am' => '',
				'wed_time_pm' => '',
				'thu_time_am' => '',
				'thu_time_pm' => '',
				'fri_time_am' => '',
				'fri_time_pm' => '',
				'sat_time_am' => '',
				'sat_time_pm' => '',
				'sun_time_am' => '',
				'sun_time_pm' => '',
				
				// HTML form -> default using facebook messenger
				'fbchat_content' => 'facebook'
		);
		
		var $custom_setting = array ();
		
		var $media_version = EFM_DF_VERSION;
		
		var $prefix_option = '___efm___';
		
		var $root_dir = '';
		
		var $efm_url = '';
		
		var $ebnonce = '';
		
		
		/*
		* begin
		*/
		function load() {
			
			/*
			* test in localhost
			*/
			/*
			if ( $_SERVER['HTTP_HOST'] == 'localhost:8888' ) {
				$this->media_version = time();
			}
			*/
			
			
			/*
			* Check and set config value
			*/
			// root dir
			$this->root_dir = basename ( EFM_DF_DIR );
			
			// Get version by time file modife
			$this->media_version = filemtime( EFM_DF_DIR . 'style.css' );
			
			// URL to this plugin
//			$this->efm_url = plugins_url () . '/' . EFM_DF_ROOT_DIR . '/';
			$this->efm_url = plugins_url () . '/' . $this->root_dir . '/';
			
			// nonce for echbay plugin
//			$this->ebnonce = EFM_DF_ROOT_DIR . EFM_DF_VERSION;
			$this->ebnonce = $this->root_dir . EFM_DF_VERSION;
			
			// Minimized Height -> same same to width
			$this->default_setting ['widget_height'] = $this->default_setting ['widget_width'];
			
			
			/*
			* Load custom value
			*/
			$this->get_op ();
		}
		
		// get options
		function get_op() {
			global $wpdb;
			
			//
			$pref = $this->prefix_option;
			
			$sql = $wpdb->get_results ( "SELECT option_name, option_value
			FROM
				`" . $wpdb->options . "`
			WHERE
				option_name LIKE '{$pref}%'
			ORDER BY
				option_id", OBJECT );
			
			foreach ( $sql as $v ) {
				$this->custom_setting [str_replace ( $this->prefix_option, '', $v->option_name )] = $v->option_value;
			}
			// print_r( $this->custom_setting ); exit();
			
			
			/*
			* https://codex.wordpress.org/Validating_Sanitizing_and_Escaping_User_Data
			*/
			// set default value if not exist or NULL
			foreach ( $this->default_setting as $k => $v ) {
				if (! isset ( $this->custom_setting [$k] )
				|| $this->custom_setting [$k] == ''
//				|| $this->custom_setting [$k] == 0
				|| $this->custom_setting [$k] == '0') {
					$this->custom_setting [$k] = $v;
				}
			}
			
			// esc_ custom value
			foreach ( $this->custom_setting as $k => $v ) {
				if ( $k == 'custom_style' ) {
					$v = esc_textarea( $v );
				}
				else if ( $k == 'fb_link' ) {
					$v = esc_url( $v );
				}
				else {
					$v = esc_html( $v );
				}
				$this->custom_setting [$k] = $v;
			}
			
			// set HTML form
			if ( $this->custom_setting['fb_link'] == '' ) {
//				$this->custom_setting['fbchat_content'] = 'quick_contact';
			}
			
//			print_r( $this->custom_setting ); exit();
		}
		
		// add checked or selected to input
		function ck($v1, $v2, $e = ' checked') {
			if ($v1 == $v2) {
				return $e;
			}
			return '';
		}
		
		// update custom setting
		function update() {
			if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset( $_POST['_ebnonce'] )) {
				
				// check nonce
				if( ! wp_verify_nonce( $_POST['_ebnonce'], $this->ebnonce ) ) {
					wp_die('404 not found!');
				}

				
				// print_r( $_POST );
				
				//
				foreach ( $_POST as $k => $v ) {
					// only update field by efm
					if (substr ( $k, 0, 5 ) == '_efm_') {
						
						// add prefix key to option key
						$key = $this->prefix_option . substr ( $k, 5 );
						// echo $k . "\n";
						
						//
						delete_option ( $key );
						
						// ensure it's an int() before update
						if ( $k == '_efm_widget_width'
						|| $k == '_efm_widget_height' ) {
							$v = (int) $v;
						}
						// text value
						else {
							$v = stripslashes ( stripslashes ( stripslashes ( $v ) ) );
							
							// remove all HTML tag, HTML code is not support in this plugin
							$v = strip_tags( $v );
							
							//
							$v = sanitize_text_field( $v );
						}
						
						//
						add_option( $key, $v, '', 'no' );
//						add_option ( $key, $v );
					}
				}
				
				//
				die ( '<script type="text/javascript">
// window.location = window.location.href;
alert("Update done!");
</script>' );
				
				//
				// wp_redirect( '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
				
				//
				// exit();
			} // end if POST
		}
		
		// form admin
		function admin() {
			$arr_position = array (
					"tr" => 'Top Right',
					"tl" => 'Top Left',
//					"cr" => 'Center Right',
//					"cl" => 'Center Left',
					"br" => 'Bottom Right',
					"bl" => 'Bottom Left' 
			);
			$str_position = '';
			foreach ( $arr_position as $k => $v ) {
				$str_position .= '<option value="' . $k . '"' . $this->ck ( $this->custom_setting ['widget_position'], $k, ' selected' ) . '>' . $v . '</option>';
			}
			
			// admin -> used real time version
			$this->media_version = time();
			
			//
			$main = file_get_contents ( EFM_DF_DIR . 'admin.html', 1 );
			
			$main = $this->template ( $main, $this->custom_setting + array (
				'_ebnonce' => wp_create_nonce( $this->ebnonce ),
				
				'str_position' => $str_position,
				
				'min_desktop_widget' => $this->ck ( $this->custom_setting ['desktop_theme'], 'min' ),
				'full_desktop_widget' => $this->ck ( $this->custom_setting ['desktop_theme'], 'full' ),
				
				'min_mobile_widget' => $this->ck ( $this->custom_setting ['mobile_theme'], 'min' ),
				'full_mobile_widget' => $this->ck ( $this->custom_setting ['mobile_theme'], 'full' ),
				
				'check_show_bubble' => $this->ck ( $this->custom_setting ['show_bubble'], 'no' ),
				
				'box_time_show' => $this->ck ( $this->custom_setting ['time_show'], 'box' ),
				'time_time_show' => $this->ck ( $this->custom_setting ['time_show'], 'time' ),
				'form_time_show' => $this->ck ( $this->custom_setting ['time_show'], 'form' ),
				
				'show_time_out' => $this->ck ( $this->custom_setting ['time_out'], 'show' ),
				'hide_time_out' => $this->ck ( $this->custom_setting ['time_out'], 'hide' ),
				
				'efm_plugin_url' => $this->efm_url,
				'efm_plugin_version' => $this->media_version,
			) );
			
			$main = $this->template ( $main, $this->default_setting, 'aaa' );
			
			echo $main;
		}
		
		// get html for theme
		function guest() {
			
			// style auto create
			$efm_custom_css = trim ( '
#echbay_fb_ms,
#echbay_fb_ms .echbay-fbchat-2title {
	max-width: ' . $this->custom_setting ['widget_width'] . 'px;
}
#echbay_fb_ms .echbay-fbchat-text-title,
#echbay_fb_ms .echbay-fbchat-mobile-title {
	background-color: ' . $this->custom_setting ['header_bg'] . ';
	color: ' . $this->custom_setting ['header_text'] . ';
}
#echbay_fb_ms .eb-facebook-square,
#echbay_fb_ms .eb-chat-square {
	color: ' . $this->custom_setting ['header_bg'] . ';
	background-color: ' . $this->custom_setting ['header_text'] . ';
}
#echbay_fb_ms.echbay-fbchat-active .echbay-fbchat-content {
	height: ' . $this->custom_setting ['widget_height'] . 'px;
}
			' ) . 
			// style by custom
			trim ( $this->custom_setting ['custom_style'] );
			
			$main = file_get_contents ( EFM_DF_DIR . 'guest.html', 1 );
			
			
			// get html form
			$form = file_get_contents ( EFM_DF_DIR . $this->custom_setting['fbchat_content'] . '.html', 1 );
			
			$main = $this->template ( $main, array (
					'html_fbchat_content' => $form,
			) );
			
			
			// another value
			$main = $this->template ( $main, $this->custom_setting + array (
					'bloginfo_name' => get_bloginfo( 'name' ),
					'efm_custom_css' => '<style type="text/css">' . $efm_custom_css . '</style>',
					'efm_plugin_url' => $this->efm_url,
					'efm_plugin_version' => $this->media_version,
			) );
			
			echo $main;
		}
		
		// add value to template file
		function template($temp, $val = array(), $tmp = 'tmp') {
			foreach ( $val as $k => $v ) {
				$temp = str_replace ( '{' . $tmp . '.' . $k . '}', $v, $temp );
			}
			
			return $temp;
		}
	} // end my class
} // end check class exist




/*
 * Show in admin
 */
function EFM_show_setting_form_in_admin() {
	global $EFM_func;
	
	$EFM_func->update ();
	
	$EFM_func->admin ();
}

function EFM_add_menu_setting_to_admin_menu() {
	// only show menu if administrator login
	if ( current_user_can('manage_options') )  {
		add_menu_page ( 'Facebook Messenger Setting', 'FB Messenger (EB)', 'manage_options', 'efm-custom-setting', 'EFM_show_setting_form_in_admin', NULL, 99 );
	}
}



/*
 * Show in theme
 */
function EFM_show_facebook_messenger_box_in_site() {
	global $EFM_func;
	
	$EFM_func->guest ();
}


// end class.php














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




