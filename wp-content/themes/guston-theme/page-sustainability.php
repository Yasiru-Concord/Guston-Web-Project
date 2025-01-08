<?php /* Template Name: Sustainability */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php if (have_rows('banners')) : ?>
    <section class="sustain-banner">
        <div class="swiper" id="sustainBannerSwiper">
            <div class="swiper-wrapper">
                <?php while (have_rows('banners')) : the_row(); ?>
                    <div class="swiper-slide">
                        <div class="item">
                            <?php getImage(get_sub_field('image'), 'd-block'); ?>
                            <div class="container">
                                <?php /* if($content = get_sub_field('content')): ?>
                                    <div class="content-wrapper"><?php echo $content; ?></div>
                                <?php endif; */ ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="swiper-nav">
            <div class="banner-prev"><i class="fa-solid fa-chevron-left"></i></div>
            <div class="banner-next"><i class="fa-solid fa-chevron-right"></i></div>
        </div>
        <div class="banner-pagination">
            <div class="container">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('certifications')) : ?>
    <section class="sustain-certifications">
        <div class="container">
            <div class="row">
                <?php while (have_rows('certifications')) : the_row(); ?>
                    <div class="col-sm-12 col-lg-6">
                        <div class="item">
                            <div class="left">
                                <?php the_sub_field('left_content'); ?>
                            </div>
                            <div class="right">
                                <div class="content-wrapper"><?php the_sub_field('content'); ?></div>
                                <?php getImage(get_sub_field('logo'), 'logo'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('strategy_content')) :
    $statsTitle = get_field('strategy_stats_title');
?>
    <section class="sustain-strategy">
        <div class="container">
            <div class="inner">
                <?php getImage(get_field('strategy_image'), 'full-image'); ?>
                <div class="content-wrapper title-content">
                    <?php the_field('strategy_content'); ?>
                    <?php
                    $strategy_bottom_image = get_field('strategy_bottom_image');
                    ?>
                    <img class="bottom-image" src="<?php echo esc_url($strategy_bottom_image); ?>" alt="Stratergy certs" />

                    <?php if ($link = get_field('about_link')) : ?>
                        <a href="<?php echo $link['url']; ?>" class="theme-btn" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    <?php endif; ?>

                    <?php if (have_rows('strategy_stats')) : ?>
                        <div class="stats">
                            <?php if ($statsTitle) : ?>
                                <?php echo $statsTitle; ?>
                            <?php endif; ?>
                            <?php while (have_rows('strategy_stats')) : the_row(); ?>
                                <div class="stat">
                                    <?php getImage(get_sub_field('icon'), '', get_sub_field('title')); ?>
                                    <h5><?php the_sub_field('title'); ?></h5>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('pillars_content')) :
    $gallery = 1; ?>
    <section class="sustain-pillars">
        <div class="container">

            <?php if (get_field('pillars_title')) : ?>
                <div class="content-wrapper title-content"><?php the_field('pillars_title'); ?></div>
            <?php endif; ?>

            <div class="swiper" id="pillarsNavSwiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('pillars_content')) : the_row(); ?>
                        <div class="swiper-slide">
                            <div class="item">
                                <?php getImage(get_sub_field('icon'), 'icon'); ?>
                                <h5><?php the_sub_field('title'); ?></h5>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="swiper" id="pillarsSwiper">
                <div class="swiper-wrapper">
                    <?php
                    while (have_rows('pillars_content')) : the_row(); ?>
                        <div class="swiper-slide">
                            <div class="pillar-content">
                                <?php if (get_sub_field('description')) : ?>
                                    <div class="content-wrapper description"><?php the_sub_field('description'); ?></div>
                                <?php endif; ?>

                                <?php if (have_rows('content')) : ?>
                                    <div class="row">
                                        <?php while (have_rows('content')) : the_row(); ?>
                                            <div class="col-sm-12 col-md-6 col-lg-3">
                                                <div class="pillar-box-item">
                                                    <div class="slideshow">
                                                        <?php if ($images = get_sub_field('slideshow')) : ?>
                                                            <div class="swiper pillar-slideshow" id="pillar-swiper-<?php echo $gallery; ?>" data-gallery="<?php echo $gallery; ?>">
                                                                <div class="swiper-wrapper">
                                                                    <?php foreach ($images as $image) : ?>
                                                                        <div class="swiper-slide">
                                                                            <div class="image"><?php getImage($image, 'full-image'); ?></div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="swiper-nav">
                                                                    <div class="swiper-button-next"><i class="fa-solid fa-arrow-left"></i></div>
                                                                    <div class="swiper-button-prev"><i class="fa-solid fa-arrow-right"></i></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <h3><?php the_sub_field('title'); ?></h3>
                                                    <div class="content-wrapper"><?php the_sub_field('sub_content'); ?></div>
                                                </div>
                                            </div>
                                        <?php $gallery++;
                                        endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="accordion theme-accordion accordion-pillars" id="accordionPillars">
                <?php
                $key = 1;
                while (have_rows('pillars_content')) : the_row(); ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?php echo ($key != 1) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#pillar-<?php echo $key; ?>" aria-expanded="false" aria-controls="pillar-<?php echo $key; ?>">
                                <div><?php getImage(get_sub_field('icon'), 'icon'); ?>
                                    <h5><?php the_sub_field('title'); ?></h5>
                                </div>
                            </button>
                        </h2>
                        <div id="pillar-<?php echo $key; ?>" class="accordion-collapse collapse <?php echo ($key == 1) ? 'show' : ''; ?>" data-bs-parent="#accordionPillars">
                            <div class="accordion-body">
                                <div class="pillar-content">
                                    <?php if (get_sub_field('description')) : ?>
                                        <div class="content-wrapper description"><?php the_sub_field('description'); ?></div>
                                    <?php endif; ?>
                                    <?php if (have_rows('content')) : ?>
                                        <div class="row">
                                            <?php while (have_rows('content')) : the_row(); ?>
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="pillar-box-item">
                                                        <h3><?php the_sub_field('title'); ?></h3>

                                                        <?php if ($images = get_sub_field('slideshow')) : ?>
                                                            <div class="swiper pillar-slideshow" data-gallery="<?php echo $gallery; ?>">
                                                                <div class="swiper-wrapper">
                                                                    <?php foreach ($images as $image) : ?>
                                                                        <div class="swiper-slide">
                                                                            <div class="image"><?php getImage($image, 'full-image'); ?></div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="swiper-nav">
                                                                    <div id="nav-prev-<?php echo $gallery; ?>"><i class="fa-solid fa-arrow-left"></i></div>
                                                                    <div id="nav-next-<?php echo $gallery; ?>"><i class="fa-solid fa-arrow-right"></i></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="content-wrapper"><?php the_sub_field('sub_content'); ?></div>
                                                    </div>
                                                </div>
                                            <?php $gallery++;
                                            endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $key++;
                endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('commitment_content')) : ?>
    <section class="sustain-commitment">
        <div class="container">
            <div class="content-wrapper"><?php the_field('commitment_content'); ?></div>

            <?php if (have_rows('commitment_certifications')) : ?>
                <div class="inner">
                    <div class="swiper" id="commitmentCertificationsSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('commitment_certifications')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="image">
                                            <?php getImage(get_sub_field('image'), 'full-image'); ?>
                                        </div>
                                        <?php if ($title = get_sub_field('title')) : ?>
                                            <p><?php echo $title; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div id="commitment-prev"><i class="fa-solid fa-arrow-left"></i></div>
                        <div id="commitment-next"><i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('unsdg_content')) : ?>
    <section class="sustain-unsdg">
        <div class="container">
            <div class="content-wrapper title-content">
                <?php the_field('unsdg_content'); ?>
            </div>

            <?php if ($logos = get_field('unsdg_logos')) : ?>
                <div class="logos">
                    <?php foreach ($logos as $logo) : ?>
                        <?php getImage($logo); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('road_map')) : ?>
    <?php if (get_field('road_map_title')) : ?>
        <section class="sustain-road-map-title">
            <div class="container">
                <div class="content-wrapper title-content"><?php the_field('road_map_title'); ?></div>
            </div>
        </section>
    <?php endif; ?>

    <section class="sustain-road-map">
        <div class="images">
            <div class="swiper" id="roadMapBGSwiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('road_map')) : the_row(); ?>
                        <div class="swiper-slide">
                            <?php getImage(get_sub_field('bg_image'), 'full-image'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="road-map-side">
                <div class="road-map-pagination"></div>
            </div>
            <div class="right">
                <div class="road-map">
                    <div class="swiper" id="roadMapSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('road_map')) : the_row();
                                $image = get_sub_field('image'); ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <h5><?php the_sub_field('year'); ?></h5>
                                        <?php getImage($image, 'd-block'); ?>
                                        <?php if (have_rows('content')) : ?>
                                            <div class="content">
                                                <?php while (have_rows('content')) : the_row(); ?>
                                                    <div>
                                                        <?php if (get_sub_field('description')) : ?>
                                                            <p><?php the_sub_field('description'); ?></p>
                                                        <?php endif; ?>
                                                        <h4><?php the_sub_field('title'); ?></h4>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('reports')) : ?>
    <section class="sustain-commitment-features">
        <div class="container">

            <?php if ($content = get_field('reports_content')) : ?>
                <div class="content-wrapper title-content">
                    <?php echo $content; ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php while (have_rows('reports')) : the_row(); ?>
                    <div class="col-sm-12 col-lg-6">
                        <div class="feature">
                            <?php getImage(get_sub_field('icon'), '', get_sub_field('title')); ?>
                            <h4><?php the_sub_field('title'); ?></h4>
                            <?php if ($file = get_sub_field('file')) : ?>
                                <a href="<?php echo $file; ?>" download class="theme-btn">Download</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('stakeholder_reports')) : ?>
    <section class="sustain-stakeholder-reports">
        <div class="container">

            <?php if ($content = get_field('stakeholder_report_content')) : ?>
                <div class="content-wrapper title-content">
                    <?php echo $content; ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php while (have_rows('stakeholder_reports')) : the_row(); ?>
                    <div class="col-sm-12 col-lg-5">
                        <div class="feature">
                            <?php getImage(get_sub_field('icon'), '', get_sub_field('title')); ?>
                            <h4><?php the_sub_field('title'); ?></h4>
                            <?php if ($file = get_sub_field('file')) : ?>
                                <a href="<?php echo $file; ?>" download class="theme-btn">Download</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </section>
<?php endif; ?>

<?php /* if (get_field('stakeholder_content')) : ?>
    <section class="sustain-stakeholder">
        <div class="container">
            <div class="inner">
                <?php getImage(get_field('stakeholder_image'), 'full-image'); ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="content-wrapper">
                            <?php the_field('stakeholder_content'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; */ ?>

<?php /* if (have_rows('featured_awards')) : ?>
    <section class="sustain-featured-awards">
        <div class="container">
            <div class="row">
                <?php while (have_rows('featured_awards')) : the_row(); ?>
                    <div class="col-sm-12 col-lg-6">
                        <div class="item">
                            <div class="content-wrapper title-content">
                                <?php getImage(get_sub_field('image'), 'award'); ?>
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; */ ?>

<?php /* if (get_field('strategy_content')) : ?>
    <section class="sustain-strategy">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="content-wrapper title-content"><?php the_field('strategy_content'); ?></div>

                    <?php if (have_rows('strategy_stats')) : ?>
                        <div class="stats">
                            <?php while (have_rows('strategy_stats')) : the_row(); ?>
                                <div class="item">
                                    <?php getImage(get_sub_field('icon')); ?>
                                    <div class="content">
                                        <h5><?php the_sub_field('value'); ?></h5>
                                        <p><?php the_sub_field('title'); ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('strategy_awards')) : ?>
                        <div class="awards">
                            <?php while (have_rows('strategy_awards')) : the_row(); ?>
                                <div class="item">
                                    <?php getImage(get_sub_field('image'), 'award'); ?>
                                    <h4><?php the_sub_field('title'); ?></h4>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($logos = get_field('strategy_unsdg_logos')) : ?>
                        <div class="logos">
                            <?php foreach ($logos as $logo) : ?>
                                <?php getImage($logo); ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
                <?php if ($image = get_field('strategy_image')) : ?>
                    <div class="col-sm-12 col-lg-6">
                        <div class="full-image-parent">
                            <?php getImage($image, 'full-image'); ?>
                            <?php if (get_field('strategy_video')) : ?>
                                <a class="full-link" href="<?php the_field('strategy_video'); ?>" data-fancybox="video"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif;  */ ?>

<?php /*if (get_field('unsdg_content')) : ?>
    <section class="sustain-unsdg">
        <div class="container">
            <div class="content-wrapper title-content">
                <?php the_field('unsdg_content'); ?>
            </div>

            <?php if ($logos = get_field('unsdg_logos')) : ?>
                <div class="logos">
                    <?php foreach ($logos as $logo) : ?>
                        <?php getImage($logo); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; */ ?>

<?php /* if (have_rows('pillars_top_content')) : ?>
    <section class="sustain-pillars-top">
        <div class="container">

            <?php if (get_field('pillars_top_title')) : ?>
                <div class="content-wrapper title-content">
                    <?php the_field('pillars_top_title'); ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php while (have_rows('pillars_top_content')) : the_row(); ?>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="item">
                            <div class="image">
                                <?php getImage(get_sub_field('icon'), 'full-image'); ?>
                            </div>
                            <h4><?php the_sub_field('title'); ?></h4>
                            <p><?php the_sub_field('description'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif;  */ ?>

<?php /*if (get_field('top_left_content')) : ?>
    <section class="sustain-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="content-wrapper title-content"><?php the_field('top_left_content'); ?></div>
                    <?php if (have_rows('top_stats')) : ?>
                        <div class="stats">
                            <?php while (have_rows('top_stats')) : the_row(); ?>
                                <div class="item">
                                    <?php getImage(get_sub_field('icon')); ?>
                                    <div class="content">
                                        <h5><?php the_sub_field('value'); ?></h5>
                                        <p><?php the_sub_field('title'); ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="full-image-parent">
                        <?php getImage(get_field('top_image'), 'full-image'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; */ ?>

<?php /* if (have_rows('features')) : ?>
    <section class="sustain-features">
        <?php getImage(get_field('features_bg_image'), 'full-image'); ?>
        <div class="container">
            <div class="inner">
                <?php if (get_field('features_content')) : ?>
                    <div class="content-wrapper title-content">
                        <?php the_field('features_content'); ?>
                    </div>
                <?php endif; ?>
                <div class="features">
                    <?php
                    $key = 1;
                    while (have_rows('features')) : the_row(); ?>
                        <div class="feature" style="background-color: <?php the_sub_field('color'); ?>;">
                            <?php if ($value = get_sub_field('value')) :
                                $degree = ($value / 100) * 180;
                            ?>
                                <div class="icon">
                                    <div class="circle-wrap circle-<?php echo $key; ?>">
                                        <div class="circle">
                                            <div class="mask full-<?php echo $key; ?>">
                                                <div class="fill fill-<?php echo $key; ?>"></div>
                                            </div>
                                            <div class="mask half">
                                                <div class="fill fill-<?php echo $key; ?>"></div>
                                            </div>
                                            <div class="inside-circle"><?php echo intval($value); ?>%</div>
                                        </div>
                                    </div>
                                    <style>
                                        @keyframes fill-<?php echo $key; ?> {
                                            0% {
                                                transform: rotate(0deg);
                                            }

                                            100% {
                                                transform: rotate(<?php echo $degree ?>deg);
                                            }
                                        }

                                        .circle-<?php echo $key; ?>.active .mask.full-<?php echo $key; ?>,
                                        .circle-<?php echo $key; ?>.active .fill-<?php echo $key; ?> {
                                            animation: fill-<?php echo $key; ?> ease-in-out 3s;
                                            transform: rotate(<?php echo $degree ?>deg);
                                        }
                                    </style>
                                    <?php getImage(get_sub_field('image'), '', get_sub_field('title')); ?>
                                </div>
                            <?php endif; ?>
                            <h4><?php the_sub_field('title'); ?></h4>
                            <?php if (get_sub_field('content')) : ?>
                                <p><?php the_sub_field('content'); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php $key++;
                    endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; */ ?>

<?php /* if (have_rows('pillars_content')) : ?>
    <?php while (have_rows('pillars_content')) : the_row(); ?>
        <section class="sustain-features">
            <?php getImage(get_sub_field('bg_image'), 'full-image'); ?>
            <div class="container">
                <div class="inner">

                    <?php if (get_sub_field('content')) : ?>
                        <div class="content-wrapper title-content">
                            <?php the_sub_field('content'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="features">
                        <?php
                        $key = 1;
                        while (have_rows('features')) : the_row(); ?>
                            <div class="feature" style="background-color: <?php the_sub_field('color'); ?>;">
                                <div class="icon">
                                    <?php getImage(get_sub_field('image'), '', get_sub_field('title')); ?>
                                </div>
                                <h4><?php the_sub_field('title'); ?></h4>
                                <?php if (get_sub_field('content')) : ?>
                                    <p><?php the_sub_field('content'); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php $key++;
                        endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; */ ?>

<?php /*
<section class="sustain-commitment">
    <div class="container">
        <?php if (get_field('commitment_content')) : ?>
            <div class="content-wrapper title-content"><?php the_field('commitment_content'); ?></div>
        <?php endif; ?>

        <?php if (have_rows('commitment_countries')) : ?>
            <div class="countries">
                <?php while (have_rows('commitment_countries')) : the_row(); ?>
                    <div class="item">
                        <?php getImage(get_sub_field('image'), 'full-image'); ?>
                        <div class="content">
                            <h3><?php the_sub_field('title'); ?></h3>
                            <?php if (have_rows('stats')) : ?>
                                <div class="stats">
                                    <?php while (have_rows('stats')) : the_row(); ?>
                                        <div class="stat">
                                            <?php getImage(get_sub_field('icon')); ?>
                                            <div><?php the_sub_field('content'); ?></div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('commitment_certifications')) : ?>
            <div class="certifications">
                <?php while (have_rows('commitment_certifications')) : the_row(); ?>
                    <div class="item">
                        <?php getImage(get_sub_field('image'), 'award'); ?>
                        <h4><?php the_sub_field('description'); ?></h4>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
*/ ?>

<?php get_footer(); ?>