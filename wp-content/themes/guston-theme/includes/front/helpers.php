<?php

/**
 * Print attachement image.
 *
 * @param   int         $imageID        ID of the image
 * @param   string      $class          ID of the image
 * @param   string      $alt            Alternative text
 * @param   string      $lazyLoad       Lazyload
 * @return  void
 */
function getImage($imageID = '', $class = '', $alt = '', $lazyLoad = 'lazy')
{
    if (empty($imageID)) {
        return false;
    }

    $attr = array(
        'class' => $class,
        'loading' => $lazyLoad,
    );

    if ($alt) {
        $attr['alt'] = $alt;
    }

    echo wp_get_attachment_image($imageID, 'full', false, $attr);
    return;
}

/**
 * Get current page url.
 */
function getCurrentUrl()
{
    global $wp;
    return home_url(add_query_arg(NULL, NULL));
}

/**
 * Get social media links for menu as array
 */
function getSocialLinks()
{

    $socialMedia = [];

    if ($facebook = get_field('facebook', 'option')) {
        $socialMedia[] = '<a href="' . $facebook . '" target="_blank"><i class="fab fa-facebook-f"></i></a>';
    }

    if ($twitter = get_field('twitter_x', 'option')) {
        $socialMedia[] = '<a href="' . $twitter . '" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>';
    }

    if ($linkedin = get_field('linkedin', 'option')) {
        $socialMedia[] = '<a href="' . $linkedin . '" target="_blank"><i class="fab fa-linkedin"></i></a>';
    }

    if ($instagram = get_field('instagram', 'option')) {
        $socialMedia[] = '<a href="' . $instagram . '" target="_blank"><i class="fab fa-instagram"></i></a>';
    }

    if ($youtube = get_field('youtube', 'option')) {
        $socialMedia[] = '<a href="' . $youtube . '" target="_blank"><i class="fab fa-youtube"></i></a>';
    }

    if ($whatsapp = get_field('whatsapp', 'option')) {
        $socialMedia[] = '<a href="' . $whatsapp . '" target="_blank"><i class="fab fa-whatsapp"></i></a>';
    }

    return $socialMedia;
}