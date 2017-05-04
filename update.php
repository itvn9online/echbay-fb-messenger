<?php


//print_r( $_POST );



foreach ( $_POST as $k => $v ) {
	if ( substr( $k, 0, 5 ) == '_efm_' ) {
		$key = __EB_PREFIX_OPTIONS . substr( $k, 5 );
//		echo $k . "\n";
		
		//
		delete_option( $key );
		
		//
		$v = stripslashes( stripslashes( stripslashes( $v ) ) );
		
		//
//		add_option( $key, $val, '', 'no' );
		add_option( $key, $v );
	}
}




//
die('<script type="text/javascript">
window.location = window.location.href;
</script>');



//
//wp_redirect( '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );




exit();




