




//
function EFM_try_javascript_event () {
	var el = document.getElementById('echbay_fb_ms');
	console.log(el.className);
	el.className += el.className ? ' someClass' : 'someClass';
}



//
var EFM_current_window_scroll_y = 0,
	EFM_current_navigator_platform = navigator.platform || '';


//
try {
	
	if (typeof jQuery != 'function') {
		console.log('EchBay Facebook Messenger not start! jQuery function not found.');
		
		//
		if ( document.getElementById('fb-root').length == 0 ) {
			document.write( '<div id="fb-root"></div>' );
		}
	
		//
		/*
		document.getElementsByClassName('click-show-hide-box-chat').onclick = function () {
			EFM_try_javascript_event();
		};
		*/
		
		/*
		document.getElementsByClassName('click-show-hide-box-chat').addEventListener("click", function() {
			EFM_try_javascript_event();
		}, false);
		*/
		
	}
	else {
		if (jQuery('#fb-root').length == 0) {
			jQuery('body').append('<div id="fb-root"></div>');
		}
		
		//
		jQuery('#echbay_fb_ms .fb-page').attr({
			'data-width' : jQuery('#echbay_fb_ms').width() || 320
		});
		
		//
		jQuery(".click-show-hide-box-chat").click(function() {
			
			// lỗi trên thiết bị của iphone, ipad -> chỉnh lại 1 chút
			if (EFM_current_navigator_platform == 'iPad'
			|| EFM_current_navigator_platform == 'iPhone'
			|| EFM_current_navigator_platform == 'iPod'
			|| EFM_current_navigator_platform == 'Linux armv6l') {
				
				var a = jQuery('#echbay_fb_ms').attr('class') || '';
				
				// có class -> đang mở -> chuẩn bị đóng
				if ( a != '' && a.split('echbay-fbchat-active').length > 1 ) {
					window.scroll( 0, EFM_current_window_scroll_y );
				}
				// mở
				else {
					// lấy scroll hiện tại của window
					EFM_current_window_scroll_y = window.scrollY || jQuery(window).scrollTop() || 0;
					
					// chuyển scroll về cuối trang
					window.scroll( 0, jQuery(document).height() );
				}
				
			}
			
			// kích hoạt
			jQuery('#echbay_fb_ms').toggleClass('echbay-fbchat-active');
			
		});
		
		//
//		jQuery('#echbay_fb_ms.style-for-position-cr .echbay-fbchat-title').css({
//			right : ( 0 - jQuery('#echbay_fb_ms').width()/ 2 + 20 ) + 'px'
//		});
		
	}
	
} catch ( e ) {
	console.log( 'stack: ' + (e.stackTrace || e.stack) );
}
	



/*
 * load facebook plugin if not exist
 * https://developers.facebook.com/docs/plugins/page-plugin
 */
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=223644071098859";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



