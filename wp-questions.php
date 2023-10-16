<?php

namespace wp_questions;

use WordPressTools;

defined( 'ABSPATH' ) or die( 'Giving To Cesar What Belongs To Caesar' );

/**
 * @link              www.example.org
 * @since             1.0.0
 * @package           wp_questions
 *
 * @wordpress-plugin
 * Plugin Name: WP Questions
 * Plugin URI: https://some-url.com
 * Description: <<Add Description>>.
 * Version: 1.0.0
 * Author: Kofi Mokome
 * Author URI: https://github.com/kofimokome
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wp-questions
 * Domain Path: /languages
 */

/**
 * Shows an error message on the admin dashboard
 * @since 1.0.0
 * @author kofimokome
 */

const WPQ_TEXT_DOMAIN = 'wp-questions';

function ErrorNotice( $message = '' ): void {
	if ( trim( $message ) != '' ):
		?>
        <div class="error notice is-dismissible">
            <p><strong>WP Questions: </strong><?php echo esc_attr( $message ) ?></p>
        </div>
	<?php
	endif;
}

add_action( 'admin_notices', 'wp_questions\\ErrorNotice', 10, 1 );

/***
 * loads classes / files
 * @since 1.0.0
 * @author kofimokome
 ***/
function Loader(): bool {
	$error = false;

	// scan directories for requires.php files
	foreach ( scandir( __DIR__ ) as $dir ) {
		if ( strpos( $dir, '.' ) === false && is_dir( __DIR__ . '/' . $dir ) && is_file( __DIR__ . '/' . $dir . '/requires.php' ) ) {
			require_once __DIR__ . '/' . $dir . '/requires.php';
		}
	}

	$requires = apply_filters( 'kmwpq_requires_filter', [] );

	foreach ( $requires as $file ) {
		if ( ! $filepath = file_exists( $file ) ) {
			ErrorNotice( sprintf( __( 'Error locating <b>%s</b> for inclusion', WPQ_TEXT_DOMAIN ), $file ) );
			$error = true;
		} else {
			require_once $file;
		}
	}


	// scan directories for includes.php files
	foreach ( scandir( __DIR__ ) as $dir ) {
		if ( strpos( $dir, '.' ) === false && is_dir( __DIR__ . '/' . $dir ) && is_file( __DIR__ . '/' . $dir . '/includes.php' ) ) {
			require_once __DIR__ . '/' . $dir . '/includes.php';
		}
	}

	$includes = apply_filters( 'kmwpq_includes_filter', [] );

	foreach ( $includes as $file ) {
		if ( ! $filepath = file_exists( $file ) ) {
			ErrorNotice( sprintf( __( 'Error locating <b>%s</b> for inclusion', WPQ_TEXT_DOMAIN ), $file ) );
			$error = true;
		} else {
			include_once $file;
		}
	}

	return $error;
}

if ( ! Loader() ) {
	$wordpress_tools = new WordPressTools( __FILE__ );
	$wordpress_tools->migration_manager->runMigrations();
}

// remove options upon deactivation

register_deactivation_hook( __FILE__, 'wp_questions\\OnDeactivation' );

/**
 * Set of actions to be performed on deactivation
 * @since 1.0.0
 * @author kofimokome
 */
function OnDeactivation(): void {
	// set options to remove here
}


register_uninstall_hook( __FILE__, 'wp_questions\\OnUninstall' );

/**
 * Set of actions to be performed on uninstallation
 * @since 1.0.0
 * @author kofimokome
 */
function OnUninstall(): void {
	// some code here
}

register_activation_hook( __FILE__, 'wp_questions\\OnActivation' );

/**
 * Set of actions to be performed on activation
 * @since 1.0.0
 * @author kofimokome
 */
function OnActivation(): void {
	// some code here
}

// todo: for future use
load_plugin_textdomain( WPQ_TEXT_DOMAIN, false, basename( dirname( __FILE__ ) ) . '/languages' );