<?php
/**
 * tinyminute functions and definitions
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$tinyminute_includes = array(
	'/setup.php',                          // Theme setup and custom theme supports.
	'/enqueue.php',                        // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                   // Custom pagination for this theme.
	'/custom-comments.php',                 // Custom Comments file.
	'/extras.php',                         // Custom functions that act independently of the theme templates.
	'/shortcodes.php',                     // Shortcodes
);

foreach ( $tinyminute_includes as $file ) {
	$filepath = locate_template( '/inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

//update_option('siteurl','http://192.168.1.24:8888/sites/tiny-minute/wordpress/');
//update_option('home','http://192.168.1.24:8888/sites/tiny-minute/');