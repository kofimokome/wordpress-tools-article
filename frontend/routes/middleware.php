<?php

namespace wp_questions;

use WordPressTools;

/**
 * Prevents a guest from accessing protected  pages
 */
$instance = WordPressTools::getInstance( __FILE__ );

function authGuard( $view ): string {
	global $instance;
	if ( ! is_user_logged_in() ) {
		return $instance->renderView( 'redirect.login' );
	}

	return $instance->renderView( $view );
}

$instance->route_manager->registerMiddleware( 'auth', function ( string $view ) {
	return authGuard( $view );
} );