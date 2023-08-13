<?php

namespace wp_questions;

use KMRoute;

KMRoute::group( 'questions', function () {
	KMRoute::middleware( 'auth', function () {
		KMRoute::get( '/create', 'questions.create' )->name( 'questions.create' )->queryVars( [
			'questions',
			'create'
		] );
		KMRoute::get( '/:id/edit', 'questions.edit' )->name( 'questions.edit' )->queryVars( [
			'questions',
			'id',
			'edit'
		] )->regex( [ 'id' => '([0-9-]+)' ] );
	} );
	KMRoute::get( '/:slug', 'questions.single' )->name( 'questions.view' )->queryVars( [
		'questions',
		'slug'
	] )->regex( [ 'slug' => '([a-z-]+)' ] );
	KMRoute::get( '/', 'questions.index' )->name( 'questions.index' );
} );
