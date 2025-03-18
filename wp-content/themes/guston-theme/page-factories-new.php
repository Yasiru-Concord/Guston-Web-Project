<?php /* Template Name: Factories */ ?>
<?php get_header(); ?>

<?php if (get_field('top_content')) : ?>
    <section class="factories-top-content">
        <div class="container">
            <div class="content-wrapper title-content"><?php the_field('top_content'); ?></div>
            <?php if (($text = get_field('make_inquiry_title', 'option')) && get_field('inquiry_form', 'option')) : ?>
                <a href="#" class="theme-btn" data-bs-toggle="modal" data-bs-target="#inquiryModal"><?php echo $text; ?></a>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php if (have_rows('factories')) : ?>
    <?php
    $factoryID = 1;
    while (have_rows('factories')) : the_row(); ?>
        <section class="factory-section">
            <div class="top">
                <?php getImage(get_sub_field('factory_image'), 'full-image'); ?>
                <div class="container">
                    <div class="content">
                        <div class="content-wrapper">
                            <?php the_sub_field('factory_content'); ?>
                        </div>
                        <?php if (have_rows('factory_features')) : ?>
                            <div class="features">
                                <?php while (have_rows('factory_features')) : the_row(); ?>
                                    <div class="feature">
                                        <?php getImage(get_sub_field('icon'), 'icon'); ?>
                                        <div>
                                            <h5><?php the_sub_field('title'); ?></h5>
                                            <?php if ($description = get_sub_field('description')) : ?>
                                                <p><?php echo $description; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($gallery = get_sub_field('gallery')) :
    $factory_names = get_sub_field('factory_list'); // Get factory names
?>
    <div class="bottom">
        <div class="container">
            <div class="inner">
                <div class="swiper factory-gallery" data-factory="<?php echo esc_attr($factoryID); ?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($gallery as $index => $image) :  ?>
                            <div class="swiper-slide">
                                <div class="item">
                                    <?php getImage($image, 'full-image'); ?>
                                    <a data-fancybox="factory<?php echo esc_attr($factoryID); ?>" href="<?php echo esc_url(wp_get_attachment_url($image)); ?>" class="full-link"></a>
                                </div>

                                <?php 
                                if (!empty($factory_names) && is_array($factory_names)) : 
                                    // Extract the correct factory name
                                    $factory_name = isset($factory_names[$index]['item']) ? $factory_names[$index]['item'] : '';
                                ?>
                                    <h4 class="factory_name"><?php echo esc_html($factory_name); ?></h4>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-nav">
                    <div class="swiper-prev" id="nav-prev-<?php echo esc_attr($factoryID); ?>">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <div class="swiper-next" id="nav-next-<?php echo esc_attr($factoryID); ?>">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

        </section>
    <?php $factoryID++;
    endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>