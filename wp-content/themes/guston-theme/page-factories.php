<?php /* Template Name: Factories - Old */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php if (have_rows('factories')) : ?>
    <section class="factories">
        <div class="container">

            <?php if (get_the_content()) : ?>
                <div class="content-wrapper title-content">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>

        </div>

        <?php
        $factoryKey = 0;
        while (have_rows('factories')) : the_row();
            $factoryKey++;
        ?>
            <div class="item">
                <div class="container">
                    <h2 class="name"><?php the_sub_field('name'); ?></h2>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="content-wrapper title-content">
                                <?php the_sub_field('content'); ?>
                            </div>
                            <?php
                            $icons = get_field('factory_icons', 'option');
                            if ($stats = get_sub_field('stats')) : ?>
                                <div class="stats">

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
                                            <p><?php echo $stats['monthly_capacity']; ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($stats['building_size'])) : ?>
                                        <div class="stat">
                                            <?php getImage($icons['building_size'], '', 'Building Size'); ?>
                                            <h5>Building Size</h5>
                                            <p><?php echo $stats['building_size']; ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($stats['factories'])) : ?>
                                        <div class="stat">
                                            <?php getImage($icons['factories'], '', 'Factories'); ?>
                                            <h5>No. of Factories</h5>
                                            <p><?php echo $stats['factories']; ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($stats['warehouse_capacity'])) : ?>
                                        <div class="stat">
                                            <?php getImage($icons['warehouse_capacity'], '', 'Warehouse Capacity'); ?>
                                            <h5>Warehouse Capacity</h5>
                                            <p><?php echo $stats['warehouse_capacity']; ?></p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endif; ?>

                            <?php if ($gallery = get_sub_field('gallery')) : ?>
                                <div class="gallery">
                                    <?php foreach ($gallery as $key => $image) : ?>
                                        <?php if ($key < 5) : ?>
                                            <div class="image">
                                                <?php getImage($image, 'full-image'); ?>
                                                <?php if (count($gallery) > 5 && $key == 4) : ?>
                                                    <span>+<?php echo count($gallery) - 5; ?></span>
                                                <?php endif; ?>
                                                <a data-fancybox="factory<?php echo $factoryKey; ?>" href="<?php echo wp_get_attachment_url($image); ?>" class="full-link"></a>
                                            </div>
                                        <?php else : ?>
                                            <a data-fancybox="factory<?php echo $factoryKey; ?>" href="<?php echo wp_get_attachment_url($image); ?>"></a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($certificates = get_sub_field('certificates')) : ?>
                                <div class="certificates">
                                    <?php foreach ($certificates as $certificate) : ?>
                                        <?php getImage($certificate); ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($link = get_sub_field('link')) : ?>
                                <a href="<?php echo $link['url']; ?>" class="theme-btn" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="full-image-parent">
                                <?php getImage(get_sub_field('image'), 'full-image map-image'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>