<?php

function my_scripts() {
	
	wp_enqueue_script(
		'angularjs',
		get_stylesheet_directory_uri() . '/bower_components/angular/angular.min.js'
	);

	wp_enqueue_script(
		'angularjs-route',
		get_stylesheet_directory_uri() . '/bower_components/angular-route/angular-route.min.js'
	);
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );