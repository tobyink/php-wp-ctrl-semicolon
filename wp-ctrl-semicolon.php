<?php

/**
 * Plugin Name:        Ctrl+;
 * Plugin URI:         https://github.com/tobyink/php-wp-ctrl-semicolon
 * Description:        Adds Ctrl+; keyboard shortcut to edit a page. 
 * Version:            1.0
 * Requires at least:  5.3
 * Requires PHP:       7.2
 * Author:             Toby Inkster
 * Author URI:         http://toby.ink/
 * License:            GPLv2
 * License URI:        https://www.gnu.org/licenses/gpl-2.0.html
 */

add_action( 'wp_head', function () {
	global $post;
	if ( $post && current_user_can( 'edit_post', $post->ID ) ) {
		$id = $post->ID;
		if ( $id ) {
			$link = get_edit_post_link( $id );
			if ( $link ) {
				echo "<link rel='edit-form' href='$link'>";
			}
		}
		if ( is_home() ) {
			$link = admin_url( 'post-new.php' );
			echo "<link rel='create-form' href='$link'>";
		}
	}
} );

add_action( 'wp_enqueue_scripts', function () {
	$plugin = plugin_dir_url( __FILE__ ) . 'js/';
	wp_enqueue_script( 'hotkeys', $plugin . 'hotkeys.min.js', [], '3.8.1', true );
	wp_enqueue_script( 'ctrl-semicolon', $plugin . 'site.js', ['jquery', 'hotkeys'], '1.0', true );
} );
