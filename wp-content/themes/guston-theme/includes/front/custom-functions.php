<?php

/**
 * Get latest blog posts
 *
 * @param   int     $limit      Posts limit
 * @return  WP_Query
 */
function getLatestBlogPosts($limit = 3)
{

	return new WP_Query(array(
		'post_type' => 'post',
		'order_by'  => 'date',
		'order'     => 'DESC',
		'posts_per_page' => $limit
	));
}

/**
 * Remove site title if rank math plugin exists
 */
function checkSiteTitle($title, $sep, $seplocation)
{
    // rank math exists
    if (class_exists('RankMath')) {
        return $title;
    } else {
        return $title . get_bloginfo('name');
    }
}
add_filter('wp_title', 'checkSiteTitle', 10, 3);

/**
 * Get all galleries
 *
 * @param   int     $limit      Posts limit
 * @return  WP_Query
 */
function getAllGalleries($limit = -1)
{

	return new WP_Query(array(
		'post_type' => 'gallery',
		'order_by'  => 'date',
		'order'     => 'DESC',
		'posts_per_page' => $limit
	));
}

/**
 * Get all csr
 *
 * @param   int     $limit      Posts limit
 * @return  WP_Query
 */
function getAllCSR($limit = -1)
{

	return new WP_Query(array(
		'post_type' => 'csr',
		'order_by'  => 'date',
		'order'     => 'DESC',
		'posts_per_page' => $limit
	));
}