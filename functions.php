<?php 

// load CSS & JS
function loadStylesAndScripts()
{
	wp_enqueue_style(
			'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css'
		);
	wp_enqueue_style(
			'main-styles', get_template_directory_uri() . '/style.css'
		);
	wp_enqueue_script(
			'jquery', 'http://code.jquery.com/jquery.min.js'
		);
	wp_enqueue_script(
			'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js'
		);
}

add_action('wp_enqueue_scripts', 'loadStylesAndScripts');

// register main nav

register_nav_menus(array(
		'main-nav' => 'Main Navigation'
	));