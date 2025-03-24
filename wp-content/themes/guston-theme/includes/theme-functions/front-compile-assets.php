<?php

/**
 * Compile Less CSS To CSS.
 */
function compile_less_to_css()
{

	$less = new lessc;

	$less->compileFile(THEME_THEMEROOT_PATH . '/assets/css/less/master.less', THEME_THEMEROOT_PATH . '/assets/css/master.css');
}

use MatthiasMullie\Minify;

/**
 * Minify CSS.
 */
function minify_css_func()
{

	$minifier = new Minify\CSS(get_theme_file_path('assets/css/bootstrap.min.css'));

	$minifier->add(get_theme_file_path('assets/css/fontawesome.all.min.css'));

	$minifier->add(get_theme_file_path('assets/mmenu/mmenu.css'));

	$minifier->add(get_theme_file_path('assets/css/master.css'));

	// save minified file to disk
	$minifier->minify(get_theme_file_path('assets/css/master.min.css'));
}

/**
 * Minify Javascript.
 */
function minify_js_func()
{

	$minifier = new Minify\JS(get_theme_file_path('assets/js/bootstrap.bundle.min.js'));

	$minifier->add(get_theme_file_path('assets/swiper/swiper-bundle.min.js'));

	$minifier->add(get_theme_file_path('assets/mmenu/mmenu.js'));

	$minifier->add(get_theme_file_path('assets/js/custom.js'));

	// save minified file to disk
	$minifier->minify(get_theme_file_path('assets/js/custom.min.js'));
}

if (function_exists('get_field')) {
	define("COMPILE_ASSETS", (get_field('compile_assets', 'option')) ?? FALSE);

	if (COMPILE_ASSETS) {
		add_action('init', 'compile_less_to_css');
		add_action('init', 'minify_css_func');
		add_action('init', 'minify_js_func');
	}
}
