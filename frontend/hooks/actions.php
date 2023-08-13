<?php

namespace wp_questions;

use KMValidator;

/**
 * Frontend actions
 */

defined( 'ABSPATH' ) or die( 'This script cannot be accessed directly.' );


// enqueue styles
add_action( 'wp_enqueue_scripts', 'wp_questions\enqueueBootstrap' );
function enqueueBootstrap(): void {
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', [], '5.3.1' );
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', [ 'jquery' ], '5.3.1', false );
}

add_action( 'wp_enqueue_scripts', 'wp_questions\enqueueScripts' );
function enqueueScripts(): void {
	$plugin_url = plugins_url( 'wp-questions' );
	wp_enqueue_script( 'wp-questions', $plugin_url . '/frontend/js/scripts.js', [ 'jquery' ], round( random_int( 0, 3000 ) ), true );
	wp_localize_script( 'wp-questions', 'wp_questions_ajax_object', [
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'site_url' => site_url(),
	] );
}

add_action( 'wp_ajax_wpq_create_question', 'wp_questions\createQuestion' );
function createQuestion(): void {
	$validator = KMValidator::make( [
		'title'   => 'required',
		'content' => 'required',
	], $_POST );

	if ( $validator->validate() ) {
		$title   = sanitize_text_field( $_POST['title'] );
		$content = sanitize_text_field( $_POST['content'] );

		$slug = str_replace( ' ', '-', strtolower( $title ) );
		// check if a question exists with the same slug
		$times_found = 1;
		$found       = true;
		while ( $found ) {
			$question = Question::where( 'slug', '=', $slug )->first();
			if ( $question ) {
				$slug = $slug . '-' . $times_found;
				$times_found ++;
			} else {
				$found = false;
			}
		}
		$question          = new Question();
		$question->title   = $title;
		$question->content = $content;
		$question->slug    = $slug;

		if ( $question->save() ) {
			wp_send_json_success( $question );
		} else {
			wp_send_json_error( "Could not create this question" );
		}
	}
	wp_die();
}
