hotkeys( 'ctrl+;', function () {
	var $link = jQuery( 'link[rel=edit-form]' );
	if ( $link.length > 0 )
		location.href = $link.attr( 'href' );
} );
