<?php

/**
 * UNDERSCORES functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UNDERSCORES
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

function underscores_setup()
{

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');



	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}

add_action('after_setup_theme', 'underscores_setup');



/**
 * Enqueue scripts and styles.
 */
function underscores_scripts()
{
	/*
	wp_enqueue_style( 'underscores-style',
					   get_stylesheet_uri(), 
					   array(), 
					   _S_VERSION );
	*/

	wp_enqueue_style(
		'underscores-style',
		get_template_directory_uri() . '/style.css',
		array(),
		filemtime(get_template_directory() . '/style.css'),
		false
	);
}

add_action('wp_enqueue_scripts', 'underscores_scripts');


/* ------------------------------------------ */



function Alex_register_nav_menu()
{
	register_nav_menus(array(
		'primary_menu' => __('Primary Menu', 'text_domain'),
		'footer_menu'  => __('Footer Menu', 'text_domain'),
	));
}
add_action('after_setup_theme', 'Alex_register_nav_menu', 0);


/*  Pour filtrer chacun ddes element du menu  */
function igc31_filtre_choix_menu($obj_menu, $arg)
{

	if ($arg->menu == "aside") {
		foreach ($obj_menu as $cle => $value) {
			$value->title = substr($value->title, 7);
			$value->title = wp_trim_words($value->title, 3, "...");
		}
	}
	if ($arg->menu == "principal") {
		foreach ($obj_menu as $cle => $value) {
			$value->title = substr($value->title, 7);
			$value->title = wp_trim_words($value->title, 3, "...");
		}
	}

	return $obj_menu;
}
add_filter("wp_nav_menu_objects", "igc31_filtre_choix_menu", 10, 2);


// Widget init.  Initialisation de sidebar

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}