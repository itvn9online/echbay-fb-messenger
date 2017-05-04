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

//define( '__EB_EFM_FILE', __FILE__ );
//echo __EB_EFM_FILE;

define( '__EB_EFM_DIR', dirname( __FILE__ ) . '/' );
//echo __EB_EFM_DIR . "\n";

define( '__EB_EFM_VERSION', '0.0.1' );
//echo __EB_EFM_VERSION;

//define( '__EB_TEXT_DOMAIN', 'echbayefm' );
//echo __EB_TEXT_DOMAIN;

define( '__EB_EFM_URL', plugins_url() . '/' . basename( __EB_EFM_DIR ) . '/' );
//echo __EB_EFM_URL;

define( '__EB_PREFIX_OPTIONS', '___efm___' );
//echo __EB_PREFIX_OPTIONS;




// default value for this plugin
$___cf_default_efm_options = array(
	// Minimized Width
	'widget_width' => '320',
	
	// Header Background
	'header_bg' => '#669900',
	
	// Header Text
	'header_text' => '#FFFFFF',
	
	// Position
	'widget_position' => 'br',
	
	// Facebook Link send mesenger to
	'fb_link' => 'https://www.facebook.com/webgiare.org/',
	
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
	
	// Bubble Backgroun Colors
	'bubble_bg_colors' => '#669900',
	
	// Bubble Colors
	'bubble_colors' => '#ffffff',
	
	// Bubble Content
	'bubble_content' => 'Chat live with an agent now!',
);

// Minimized Height
$___cf_default_efm_options['widget_height'] = $___cf_default_efm_options['widget_width'];




//
function ___get_efm_option_setting () {
	
	global $wpdb;
	
	$option_efm_name = __EB_PREFIX_OPTIONS;
	
	$sql = $wpdb->get_results( "SELECT option_name, option_value
	FROM
		`" . $wpdb->options . "`
	WHERE
		option_name LIKE '{$option_efm_name}%'", OBJECT );
	
	$arr = array();
	foreach ( $sql as $v ) {
		$arr[ str_replace( __EB_PREFIX_OPTIONS, '', $v->option_name ) ] = $v->option_value;
	}
//	print_r( $arr ); exit();
	
	return $arr;
	
}



// set default value if not exist or NULL
//$___cf_efm_options = array();
$___cf_efm_options = ___get_efm_option_setting();
foreach ( $___cf_default_efm_options as $k => $v ) {
	if ( ! isset( $___cf_efm_options[$k] ) || $___cf_efm_options[$k] == '' ) {
		$___cf_efm_options[$k] = $v;
	}
}




function ___eb_add_fb_mes_to_site () {
	
	
	global $___cf_efm_options;
	
	
	
	// style auto create
	$efm_custom_css = trim( '
#echbay_fb_ms {
	width: ' . $___cf_efm_options['widget_width'] . 'px;
}
#echbay_fb_ms .echbay-fbchat-title {
	background-color: ' . $___cf_efm_options['header_bg'] . ';
	color: ' . $___cf_efm_options['header_text'] . ';
}
#echbay_fb_ms.echbay-fbchat-active .echbay-fbchat-content {
	height: ' . $___cf_efm_options['widget_height'] . 'px;
}
	' )
	// style by custom
	. trim( $___cf_efm_options['custom_style'] );
	
	
	
?>
<style type="text/css">
#echbay_fb_ms {
	font-family: Helvetica, Arial, sans-serif, Gotham, "Helvetica Neue";
	position: fixed;
	bottom: 0px;
	right: 10px;
	width: 320px;
	border-radius: 8px 8px 0 0;
	z-index: 8888;
	height: auto;
	overflow: hidden;
}
#echbay_fb_ms .echbay-fbchat-title {
	background-color: #690;
	font-size: 17px;
	color: #fff;
	line-height: 38px;
	position: relative;
	cursor: pointer;
	text-shadow: 0 1px 0 rgba(0,0,0,0.1);
	-webkit-box-shadow: rgba(0,0,0,0.0980392) 0 0 1px 2px;
	-moz-box-shadow: rgba(0,0,0,0.0980392) 0 0 1px 2px;
	box-shadow: rgba(0,0,0,0.0980392) 0 0 1px 2px;
}
#echbay_fb_ms .echbay-fbchat-title-text { padding: 0 10px; }
#echbay_fb_ms .echbay-fbchat-icon {
	position: absolute;
	top: 0;
	right: 18px;
	font-size: 25px;
}
#echbay_fb_ms .echbay-fbchat-icon1 {
	transform: rotate(-90deg);
	-webkit-transform: rotate(-90deg);
	-ms-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
}
#echbay_fb_ms .echbay-fbchat-icon2 {
	display: none;
	transform: rotate(-45deg);
	-webkit-transform: rotate(-45deg);
	-ms-transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
}
#echbay_fb_ms .echbay-fbchat-content {
	background-color: #fff;
	height: 1px;
	margin-bottom: -1px;
	overflow: hidden;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	transition: all 0.5s ease;
}
#echbay_fb_ms.echbay-fbchat-active .echbay-fbchat-content {
	height: 320px;
	margin-bottom: 0;
}
#echbay_fb_ms.echbay-fbchat-active .echbay-fbchat-icon1 { display: none; }
#echbay_fb_ms.echbay-fbchat-active .echbay-fbchat-icon2 { display: block; }
<?php echo $efm_custom_css;
?>
</style>
<div id="echbay_fb_ms">
	<div class="echbay-fbchat-title">
		<div class="echbay-fbchat-title-text"><i class="fa fa-facebook-square"></i> <?php echo $___cf_efm_options['widget_title']; ?></div>
		<div class="echbay-fbchat-icon">
			<div class="echbay-fbchat-icon1">&rsaquo;</div>
			<div class="echbay-fbchat-icon2">+</div>
		</div>
	</div>
	<div class="echbay-fbchat-content">
		<div class="fb-page" data-href="<?php echo $___cf_efm_options['fb_link']; ?>" data-tabs="messages" data-width="<?php echo $___cf_efm_options['widget_width']; ?>" data-height="<?php echo $___cf_efm_options['widget_height']; ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
			<blockquote cite="<?php echo $___cf_efm_options['fb_link']; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $___cf_efm_options['fb_link']; ?>">dochanh.net</a></blockquote>
		</div>
	</div>
</div>
<script type="text/javascript" async>
(function () {
	if ( typeof jQuery != 'function' ) {
		console.log('EchBay Facebook Messenger not start! jQuery function not found.');
		return false;
	}
	
	//
	if ( jQuery('#fb-root').length == 0 ) {
		jQuery('body').append('<div id="fb-root"></div>');
	}
	
	//
	jQuery(".echbay-fbchat-title").click(function() {
		jQuery('#echbay_fb_ms').toggleClass('echbay-fbchat-active');
	});
}());




/*
* load facebook plugin
* https://developers.facebook.com/docs/plugins/page-plugin
*/
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=223644071098859";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php



}






// plugin setting menu
function ___echbay_fb_mes_in_admin_menu_content () {
	
	global $___cf_default_efm_options;
	global $___cf_efm_options;
	
	include __EB_EFM_DIR . 'setting.php';
	
}

function ___echbay_fb_mes_in_admin_menu() {
	
	$parent_slug = 'efm-setting';
	
	/*
	* EchBay menu -> mọi người đều có thể nhìn thấy menu này
	*/
	add_menu_page( 'Danh sách đơn hàng', 'FB Messenger', 'manage_options', $parent_slug, '___echbay_fb_mes_in_admin_menu_content', NULL, 99 );
	
}





function ___eb_efm_checked_or_selected ( $v1, $v2, $e = ' selected="selected"' ) {
	if ( $v1 == $v2 ) {
		return $e;
	}
	return '';
}




//
if ( is_admin() ) {
	add_action('admin_menu', '___echbay_fb_mes_in_admin_menu');
}
else {
	add_action( 'wp_footer', '___eb_add_fb_mes_to_site' );
}




