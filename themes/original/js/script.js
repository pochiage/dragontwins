( function( $ ) {
jQuery( document ).ready(function() {
jQuery('#cssmenu').prepend('<div id="menu-button">Menu</div>');
	jQuery('#cssmenu #menu-button').on('click', function(){
		var menu = jQuery(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});
});
} );
