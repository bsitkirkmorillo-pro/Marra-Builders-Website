<?php
/**
 * Marra Builders theme bootstrap.
 */
defined( 'ABSPATH' ) || exit;

define( 'MARRA_VERSION', '1.0.1' );
define( 'MARRA_DIR', trailingslashit( get_template_directory() ) );
define( 'MARRA_ASSETS', trailingslashit( get_template_directory_uri() ) . 'assets/' );

require_once MARRA_DIR . 'inc/helpers.php';
require_once MARRA_DIR . 'inc/post-types.php';
require_once MARRA_DIR . 'inc/cards.php';
require_once MARRA_DIR . 'inc/meta-boxes.php';
require_once MARRA_DIR . 'inc/content-settings.php';
require_once MARRA_DIR . 'inc/contact.php';
require_once MARRA_DIR . 'inc/seo.php';
require_once MARRA_DIR . 'inc/importer.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
} );

// The original design brings its own CSS, so keep WordPress' block/emoji styles off the public site.
add_action( 'wp_enqueue_scripts', function () {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}, 100 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );

// Make sure the pretty URLs (/projects/, /articles/) work right after activation.
add_action( 'after_switch_theme', function () {
	marra_register_post_types();
	flush_rewrite_rules();
} );
add_action( 'switch_theme', function () {
	flush_rewrite_rules();
} );
