<?php

/**
 * Add libraries to be included
 */


add_filter( 'kmwpq_requires_filter', function ( $includes ) {
	$plugin_path = plugin_dir_path( __FILE__ );

	$files = [
		$plugin_path . 'wordpress_tools/KMMenuPage.php', //
		$plugin_path . 'wordpress_tools/KMSubMenuPage.php', //
		$plugin_path . 'wordpress_tools/KMSetting.php', //
		$plugin_path . 'wordpress_tools/KMEnv.php', //
		$plugin_path . 'wordpress_tools/KMColumn.php', //
		$plugin_path . 'wordpress_tools/KMMigration.php', //
		$plugin_path . 'wordpress_tools/KMModel.php', //
		$plugin_path . 'wordpress_tools/KMRoute.php', //
		$plugin_path . 'wordpress_tools/KMValidator.php', //
		$plugin_path . 'wordpress_tools/lib/plural/Plural.php', //
	];

	return array_merge( $includes, $files );
} );