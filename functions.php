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
function igc31w_filtre_choix_menu($obj_menu)
{
	//var_dump($obj_menu);
	foreach ($obj_menu as $cle => $value) {
		// print_r($value);
		//$value->title = substr($value->title,0,7);
		$value->title = wp_trim_words($value->title, 3, "...");
		// echo $value->title . '<br>';

	}
	return $obj_menu;
}
add_filter("wp_nav_menu_objects", "igc31w_filtre_choix_menu");



// function igc31w_filtre_choix_menu($obj_menu, $arg)
// {
	//echo "/////////////////  obj_menu";
	// var_dump($obj_menu);
	//  echo "/////////////////  arg";
	//  var_dump($arg);

	// if ($arg->menu == "sidebar") {
	// 	foreach ($obj_menu as $cle => $value) {
	// 		print_r($value);
	// 		$value->title = substr($value->title, 7);
	// 		$value->title = wp_trim_words($value->title, 3, "...");
			//echo $value->title . '<br>';
	// 	}
	// }
	//die();
	// return $obj_menu;
// }

// add_filter("wp_nav_menu_objects", "igc31w_filtre_choix_menu", 10, 2);
