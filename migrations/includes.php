<?php

/**
 * Add libraries to be included
 */


add_filter( 'kmwpq_includes_filter', function ( $includes ) {
	$plugin_path = plugin_dir_path( __FILE__ );

	$files = [
		$plugin_path . 'questions.php', //
		$plugin_path . 'answers.php', //
	];

	return array_merge( $includes, $files );
} );