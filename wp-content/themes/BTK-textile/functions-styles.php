<?php
add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts()
{
	$ver = '1.0.4';
	wp_enqueue_style('googleapis', '//fonts.googleapis.com/css?family=Ubuntu:300,700,800%7COswald:300,400,500', array(), '1.0.2');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/app.min.css', array(), $ver);
	wp_enqueue_style('dop-style', get_template_directory_uri() . '/style.css', array(), $ver);

	wp_deregister_script('wp-embed');
	wp_deregister_style('wp-block-library');

	// wp_enqueue_script( 'reacaptcha_js', 'https://www.google.com/recaptcha/api.js?render=6LfdrnwaAAAAABDn2Il7mXGDJuqnRIwyXsGV-3YS', '', '', true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/app.min.js', array(), $ver, true);
}
