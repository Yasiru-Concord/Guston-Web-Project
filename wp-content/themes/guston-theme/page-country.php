<?php /* Template Name: Country */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<section class="country-about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="left">
                    <div class="content-wrapper title-content">
                        <?php the_field('about_content'); ?>
                    </div>
                    <?php
                    $icons = get_field('factory_icons', 'option');
                    if ($stats = get_field('about_stats')) : ?>
                        <div class="stats">

                            <?php if (!empty($stats['year'])) : ?>
                                <div class="stat">
                                    <?php getImage($icons['year'], '', 'Year of Incorporation'); ?>
                                    <h5>Year of Incorporation</h5>
                                    <p><?php echo $stats['year']; ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($stats['employees'])) : ?>
                                <div class="stat">
                                    <?php getImage($icons['employees'], '', 'Employees'); ?>
                                    <h5>Employees</h5>
                                    <p><?php echo $stats['employees']; ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($stats['monthly_capacity'])) : ?>
                                <div class="stat">
                                    <?php getImage($icons['monthly_capacity'], '', 'Monthly Capacity'); ?>
                                    <h5>Monthly Capacity</h5>
                                    <p><?php echo $stats['employees']; ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($stats['factories'])) : ?>
                                <div class="stat">
                                    <?php getImage($icons['factories'], '', 'No. of Factories'); ?>
                                    <h5>No. of Factories</h5>
                                    <p><?php echo $stats['factories']; ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="full-image-parent">
                    <?php getImage(get_field('about_image'), 'full-image'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (have_rows('factories')) : ?>
    <section class="country-factories">
        <div class="container">
            <?php while (have_rows('factories')) : the_row(); ?>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="left">
                                <?php if ($gallery = get_sub_field('gallery')) : ?>
                                    <div class="swiper factory-gallery">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($gallery as $image) : ?>
                                                <div class="swiper-slide">
                                                    <?php getImage($image, 'full-image'); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($logo = get_sub_field('logo')) : ?>
                                    <div class="logo">
                                        <?php getImage($logo); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="right">
                                <?php if ($logo = get_sub_field('logo')) : ?>
                                    <div class="logo">
                                        <?php getImage($logo); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content-wrapper title-content">
                                    <?php the_sub_field('content'); ?>
                                </div>
                                <?php
                                if ($stats = get_sub_field('stats')) : ?>
                                    <div class="stats">

                                        <?php if (!empty($stats['year'])) : ?>
                                            <div class="stat">
                                                <?php getImage($icons['year'], '', 'Year of Incorporation'); ?>
                                                <h5>Year of Incorporation</h5>
                                                <p><?php echo $stats['year']; ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($stats['employees'])) : ?>
                                            <div class="stat">
                                                <?php getImage($icons['employees'], '', 'Employees'); ?>
                                                <h5>Employees</h5>
                                                <p><?php echo $stats['employees']; ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($stats['monthly_capacity'])) : ?>
                                            <div class="stat">
                                                <?php getImage($icons['monthly_capacity'], '', 'Monthly Capacity'); ?>
                                                <h5>Monthly Capacity</h5>
                                                <p><?php echo $stats['employees']; ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($stats['building_size'])) : ?>
                                            <div class="stat">
                                                <?php getImage($icons['building_size'], '', 'Building Size'); ?>
                                                <h5>Building Size</h5>
                                                <p><?php echo $stats['building_size']; ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($stats['production_lines'])) : ?>
                                            <div class="stat">
                                                <?php getImage($icons['production_lines'], '', 'Production Lines'); ?>
                                                <h5>Production Lines</h5>
                                                <p><?php echo $stats['production_lines']; ?></p>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>

                                <?php if ($certificates = get_sub_field('certificates')) : ?>
                                    <div class="certificates">
                                        <?php foreach ($certificates as $certificate) : ?>
                                            <?php getImage($certificate); ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php
$blogs = get_field('blog_posts');
if ($blogs) : ?>
    <section class="country-blog">
        <div class="container">
            <?php if (get_field('blog_title')) : ?>
                <div class="content-wrapper title-content">
                    <?php the_field('blog_title'); ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php foreach ($blogs as $post) : setup_postdata($post); ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <?php get_template_part('templates/blog', 'item'); ?>
                    </div>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>