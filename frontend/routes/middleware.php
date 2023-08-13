<?php

namespace wp_questions;

use KMRoute;

/**
 * Prevents a guest from accessing protected  pages
 */
function authGuard( $view ): string {

	if ( ! is_user_logged_in() ) {
		return KMRoute::renderView( 'redirect.login' );
	}

	return KMRoute::renderView( $view );
}

KMRoute::registerMiddleware( 'auth', function ( string $view ) {
	return authGuard( $view );
} );