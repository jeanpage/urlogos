<?php 

add_action( 	'wp_enqueue_scripts', 'urlogos_enqueue_styles' );

function urlogos_enqueue_styles() {
    $parent_style = 'parent-style'; 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('false'));
	}

if ( ! isset( $content_width ) ) {
$content_width = 1200; }


function my_portfolio_image_quality( $quality ) {
    return 100;
}
add_filter( 'jpeg_quality', 'my_portfolio_image_quality' );
add_filter( 'wp_editor_set_quality', 'my_portfolio_image_quality' );
