<?php

/**
 * Add Theme Support
 */
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form']);
}
