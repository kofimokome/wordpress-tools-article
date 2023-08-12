<?php

/**
 * Add libraries to be included
 */


add_filter( 'kmwpq_includes_filter', function ( $includes ) {
	$plugin_path = plugin_dir_path( __FILE__ );

	$files = [
		$plugin_path . 'hooks/actions.php', //
		$plugin_path . 'routes/web.php', //
		$plugin_path . 'routes/middleware.php', //
		$plugin_path . 'functions.php', //
	];

	return array_merge( $includes, $files );
} );