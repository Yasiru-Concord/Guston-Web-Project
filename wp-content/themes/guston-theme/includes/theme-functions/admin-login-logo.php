<?php

/**
 * Custom admin login logo
 */
if (function_exists('get_field') && get_field('logo', 'option')) {
    function custom_login_logo()
    {
        $logoUrl = wp_get_attachment_image_url(get_field('logo', 'option'), 'full');

        if ($logoUrl) { ?>
            <style type="text/css">
                body.login div#login h1 a {
                    background-image: url('<?php echo $logoUrl; ?>');
                    background-size: contain;
                    width: unset;
                    background-position: bottom;
                }
            </style>
<?php
        }
    }

    add_action('login_enqueue_scripts', 'custom_login_logo');
}
