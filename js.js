




//
function EFM_try_javascript_event () {
	var el = document.getElementById('echbay_fb_ms');
	console.log(el.className);
	el.className += el.className ? ' someClass' : 'someClass';
}


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
		
		jQuery(".click-show-hide-box-chat").click(function() {
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



