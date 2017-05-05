// JavaScript Document
(function() {
	if (typeof jQuery != 'function') {
		console.log('EchBay Facebook Messenger not start! jQuery function not found.');
		return false;
	}

	//
	if (jQuery('#fb-root').length == 0) {
		jQuery('body').append('<div id="fb-root"></div>');
	}

	//
	jQuery(".echbay-fbchat-title").click(function() {
		jQuery('#echbay_fb_ms').toggleClass('echbay-fbchat-active');
	});
}());




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