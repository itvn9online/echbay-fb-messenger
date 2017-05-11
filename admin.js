



try {
	
	
	(function () {
		
		if ( typeof $ != 'function' ) {
			$ = jQuery;
		}
		
		
		
		$('.btn-restore-default').click(function () {
			var a = $(this).attr('data-set') || '';
		//	console.log(a);
			
			var b = 'input[id="' + a + '"]';
			
			$(b).val( $(b).attr('placeholder') || '' );
		});
		
		
		
		
		$('input[name="_efm_time_show"]').change(function () {
		//	console.log( $(this).val() );
			if ( $(this).val() == 'time' ) {
				$('.option-time-out').fadeIn();
			} else {
				$('.option-time-out').hide();
			}
		});
		
		//
		//console.log( $('input[name="_efm_time_show"]:checked').val() );
		if ( $('input[name="_efm_time_show"]:checked').val() == 'time' ) {
			$('.option-time-out').fadeIn();
		}
		
		
		
		// real change
		$('#header_bg').change(function () {
			$('.efm-admin-full-exemple, .efm-mobile-full-exemple').css({
				'background-color' : $(this).val()
			});
		});
		
		$('#header_text').change(function () {
			$('.efm-admin-full-exemple, .efm-mobile-full-exemple').css({
				'color' : $(this).val()
			});
		});
		
		$('#widget_width').change(function () {
			$('.efm-admin-full-exemple, .efm-mobile-full-exemple').animate({
				'max-width' : $(this).val() + 'px'
			});
		}).change();
		
		
		
	}());
	
	
} catch ( e ) {
	console.log( 'stack: ' + (e.stackTrace || e.stack) );
}



