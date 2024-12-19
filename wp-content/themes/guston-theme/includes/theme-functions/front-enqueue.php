<?php

/**
 * Enqueue scripts.
 *
 * @see https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts
 */
function theme_front_scripts()
{
	wp_enqueue_script('jquery');

    if (is_front_page()) {
        wp_enqueue_script('wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array('jquery'), '1.1.2', true);
    }

    if (is_singular('gallery') || is_singular('csr') || is_page_template('page-factories-new.php') || is_page_template('page-sustainability.php')) {
        wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array('jquery'), '5.0', true);
    }

	wp_enqueue_script('custom-js', THEME_JS . 'custom.min.js', array('jquery'), '1.0', true);

	$customParams = array(
		'ADMIN_AJAX_URL' => admin_url('admin-ajax.php'),
		'SOCIAL_MEDIA' => getSocialLinks()
	);
	wp_localize_script('custom-js', 'THEME_PARAMS', $customParams);

	wp_dequeue_script('comment-reply');
	wp_dequeue_script('wp-embed');
}
add_action('wp_enqueue_scripts', 'theme_front_scripts');

/**
 * Enqueue styles.
 *
 * @see https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts
 */
function theme_front_styles()
{
	global $wp_styles;
	wp_enqueue_style('theme-styles', THEME_THEMEROOT . '/style.css', array(), '1.0', 'screen');
	wp_enqueue_style('master-styles', THEME_CSS . 'master.min.css', array(), '1.0', 'screen');

    if(is_front_page()){
        wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1', 'screen');
    }

    if (is_singular('gallery') || is_singular('csr') || is_page_template('page-factories-new.php') || is_page_template('page-sustainability.php')) {
        wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), '5.0', 'screen');
    }

	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style');
}
add_action('wp_print_styles', 'theme_front_styles');
