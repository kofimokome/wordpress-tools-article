<?php

namespace wp_questions;
/**
 * Frontend actions
 */

defined( 'ABSPATH' ) or die( 'This script cannot be accessed directly.' );

// enqueue styles
add_action( 'wp_enqueue_scripts', 'wp_questions\enqueue_bootstrap' );
function enqueue_bootstrap(): void {
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', [], '5.3.1' );
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', [ 'jquery' ], '5.3.1', false );
}