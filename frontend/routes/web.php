<?php

namespace wp_questions;

use WordPressTools;

$instance = WordPressTools::getInstance( __FILE__ );


$instance->routes()->group( 'questions', function () use ( $instance ) {
	$instance->routes()->middleware( 'auth', function () use ( $instance ) {
		$instance->routes()->add( '/create', 'questions.create' )->name( 'questions.create' )->queryVars( [
			'questions',
			'create'
		] );
		$instance->routes()->add( '/:id/edit', 'questions.edit' )->name( 'questions.edit' )->queryVars( [
			'questions',
			'id',
			'edit'
		] )->regex( [ 'id' => '([0-9-]+)' ] );
	} );
	$instance->routes()->add( '/:slug', 'questions.single' )->name( 'questions.view' )->queryVars( [
		'questions',
		'slug'
	] )->regex( [ 'slug' => '([a-z-]+)' ] );
	$instance->routes()->add( '/', 'questions.index' )->name( 'questions.index' );
} );
