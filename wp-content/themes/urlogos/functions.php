<?php 
// Function to add child theme
add_action( 	'wp_enqueue_scripts', 'urlogos_enqueue_styles' );
// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Function add google fonts
add_action( 'wp_enqueue_scripts', 'splash_google_fonts' );


// Function to add child theme
function urlogos_enqueue_styles() {
    $parent_style = 'parent-style'; 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), false);
	}

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// Function to add splash page fonts
function splash_google_fonts() {

wp_enqueue_style( 'urlogos-google-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:400', false ); 
}
