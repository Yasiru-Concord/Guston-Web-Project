<?php /* Template Name: About */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php if (get_field('vision_content')) : ?>
    <section class="about-vision">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <?php getImage(get_field('vision_image')); ?>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="content-wrapper"><?php the_field('vision_content'); ?></div>
                </div>
            </div>
    </section>
<?php endif; ?>

<?php if (have_rows('features')) : ?>
    <section class="about-features">
        <div class="container">
            <?php if (get_field('features_title')) : ?>
                <div class="content-wrapper title-content"><?php the_field('features_title'); ?></div>
            <?php endif; ?>
            <div class="features">
                <?php while (have_rows('features')) : the_row(); ?>
                    <div class="item">
                        <?php getImage(get_sub_field('icon'), '', get_sub_field('title')); ?>
                        <h5><?php the_sub_field('title'); ?></h5>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('timeline')) : ?>
    <?php if (get_field('timeline_title')) : ?>
        <section class="about-timeline-title">
            <div class="container">
                <div class="content-wrapper title-content"><?php the_field('timeline_title'); ?></div>
            </div>
        </section>
    <?php endif; ?>
    <section class="about-timeline">
        <div class="images">
            <div class="swiper" id="timelineBGSwiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('timeline')) : the_row(); ?>
                        <div class="swiper-slide">
                            <?php getImage(get_sub_field('background_image'), 'full-image'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="right">
                <div class="timeline-side">
                    <div class="timeline-pagination"></div>
                </div>
                <div class="timeline">
                    <div class="swiper" id="timelineSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('timeline')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <?php getImage(get_sub_field('image'), '', get_sub_field('title')); ?>
                                        <h5><?php the_sub_field('year'); ?></h5>
                                        <h3><?php the_sub_field('title'); ?></h3>
                                        <?php if (get_sub_field('description')) : ?>
                                            <p><?php the_sub_field('description'); ?></p>
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

<?php get_footer(); ?>