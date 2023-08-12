<?php

namespace wp_questions;

use KMRoute;

KMRoute::group( 'questions', function () {
	KMRoute::middleware( 'auth', function () {
		KMRoute::get( '/create', 'questions.create' )->name( 'questions.create' )->queryVars( [
			'questions',
			'create'
		] );
	} );
	KMRoute::get( '/', 'questions.index' )->name( 'questions.index' );
} );
