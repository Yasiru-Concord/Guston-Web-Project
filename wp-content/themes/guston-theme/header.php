<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo get_field('tag_header_script', 'option'); ?>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if (get_field('favicon', 'option')) : ?>
        <link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" />
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php echo get_field('tag_body_script', 'option'); ?>
    <div id="page">
        <header class="main-header">
            <div class="container">
                <div class="logo-wrapper">
                    <?php if ($logo = get_field('logo', 'option')) : ?>
                        <a href="<?php echo site_url(); ?>" class="full-link"></a>
                        <?php getImage($logo, 'logo no-lazyload', get_bloginfo('name'), ''); ?>
                        <script>
                            const SITE_LOGO = '<?php echo wp_get_attachment_url($logo); ?>';
                        </script>
                    <?php endif; ?>
                </div>
                <div class="right">
                    <div class="menu-wrapper">
                        <nav class="navbar navbar-expand-md p-0" id="menu">
                            <div id="navbarCollapse">
                                <?php
                                $defaults = array(
                                    'menu'            => get_field('main_menu', 'option'),
                                    'container'       => false,
                                    'menu_class'      => 'menu',
                                    'echo'            => true,
                                    'fallback_cb'     => '',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                    'depth'           => 0
                                );
                                wp_nav_menu($defaults);
                                ?>
                            </div>
                        </nav>
                        <div class="menu-icon">
                            <a href="#navbarCollapse"><i class="fa-solid fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>