<?php
/*
Template Name: Glossy Stylo
*/

// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	

// New custom-background function since Wordpress 3.4
$args = array(
	'default-color' => '000000',
	'default-image' => get_template_directory_uri() . '/images/bg.jpg',
);
add_theme_support( 'custom-background', $args );

// filter function for wp_title
function glossy_stylo_filter_wp_title( $old_title, $sep, $sep_location ){

	
// add padding to the sep
$ssep = ' ' . $sep . ' ';
 
// find the type of index page this is
if( is_category() ) $insert = $ssep . 'Category';
elseif( is_tag() ) $insert = $ssep . 'Tag';
elseif( is_author() ) $insert = $ssep . 'Author';
elseif( is_year() || is_month() || is_day() ) $insert = $ssep . 'Archives';
else $insert = NULL;
 
// get the page number we're on (index)
if( get_query_var( 'paged' ) )
$num = $ssep . 'page ' . get_query_var( 'paged' );
 
// get the page number we're on (multipage post)
elseif( get_query_var( 'page' ) )
$num = $ssep . 'page ' . get_query_var( 'page' );
 
// else 
else $num = NULL;
 
// concoct and return new title
return get_bloginfo( 'name' ) . $insert . $old_title . $num;
}
// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'glossy_stylo_filter_wp_title', 10, 3 );
	
 
/**
 * Load the style.css
*/ 
 
add_action('wp_enqueue_scripts', 'mythemeprefix_styles');

function mythemeprefix_styles(){
	wp_enqueue_style( 'css', get_template_directory_uri() . '/style.css' );
}


// Make theme available for translation 
// Translations can be filed in the /languages/ directory 
load_theme_textdomain( 'glossy_stylo', get_template_directory() . '/languages' );
	
 
	
	// This theme uses wp_nav_menu() in one location.
 if ( function_exists( 'register_nav_menu' ) )
    register_nav_menu( 'menu', 'Menu' );

	
	
/* Set the content width based on the theme's design and stylesheet.  */
if ( ! isset( $content_width ) )
	$content_width = 695;

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
} 
?>