<?php

/**
 * Add libraries to be included
 */


add_filter( 'kmwpq_includes_filter', function ( $includes ) {
	$plugin_path = plugin_dir_path( __FILE__ );

	$files = [
		$plugin_path . 'Answer.php', //
		$plugin_path . 'Question.php', //
		$plugin_path . 'User.php', //
	];

	return array_merge( $includes, $files );
} );