<?php
update_option( 'siteurl', 'https://laurengibbons.com' );
update_option( 'home', 'https://laurengibbons.com' );
/**
 * theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Lauren 2024
 * @since theme 1.0
 */

if ( ! function_exists( 'theme_setup' ) ) :
/**
 * theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since theme 1.0
 */
function theme_setup() {

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form', 'gallery', 'caption'
	) );
}
endif; // esc_setup
add_action( 'after_setup_theme', 'theme_setup' );

// register navigation menus
register_nav_menus( array( 'menu'=>__('Menu') ) );

/// add home link to menu
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/* Remove toolbar */
show_admin_bar(false);

// menu fallback
function default_menu() {
	require_once (get_template_directory() . '/includes/default-menu.php');
}

//Remove Emoji Icons
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function update_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'update_jquery');

//Enqueue Theme Styles & Scripts
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.css', array(), '20240815' );
	wp_enqueue_script( 'anime', get_template_directory_uri() . '/js/anime.min.js', array( 'jquery' ), '20170605', true );
	wp_enqueue_script( 'smoothstate', get_template_directory_uri() . '/js/jquery.smoothState.min.js', array( 'jquery' ), '20170605', true );
	wp_enqueue_script( 'player', get_template_directory_uri() . '/js/player.min.js', array( 'jquery' ), '20170605', true );
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '20240810', true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

function remove_menus(){
	remove_menu_page( 'edit.php' ); //Posts
	remove_menu_page( 'edit-comments.php' ); //Posts
}

add_action( 'admin_menu', 'remove_menus' );
add_theme_support('post-thumbnails');
add_image_size( 'header', 1280, 360, true );
add_image_size( 'third', 400, 240, true );
add_image_size( 'half', 500, 284, true );
add_image_size( 'full', 1280, 720, false );

add_filter('twentynineteen_can_show_post_thumbnail', function() {
     return ! is_attachment() && has_post_thumbnail();
});

remove_filter( 'the_content', 'wpautop' );

add_filter( 'jpeg_quality', function() {
    return 100;
} );