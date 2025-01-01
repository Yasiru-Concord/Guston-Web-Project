<?php /* Template Name: Products */ ?>
<?php get_header(); ?>

<?php if (have_rows('collections')) : ?>
    <?php
    $text = get_field('make_inquiry_title', 'option');
    $form = get_field('inquiry_form', 'option');
    $collectionID = 1;
    while (have_rows('collections')) : the_row(); ?>
        <?php if (get_sub_field('top_content')) : ?>
            <section class="products-top-content">
                <div class="container">
                    <div class="content-wrapper title-content"><?php the_sub_field('top_content'); ?></div>
                    <?php if ($text && $form) : ?>
                        <a href="#" class="theme-btn" data-bs-toggle="modal" data-bs-target="#inquiryModal"><?php echo $text; ?></a>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <section class="products-collection">
            <div class="top">
                <?php getImage(get_sub_field('collection_image'), 'full-image'); ?>
                <div class="container">
              
                    <div class="content">
                        <?php if (get_sub_field('collection_content')) : ?>
                          
                            <div class="content-wrapper collection">
                                <?php the_sub_field('collection_content'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('collection_features')) : ?>
                        <div class="features">
                            <?php while (have_rows('collection_features')) : the_row(); ?>
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
            <?php if (have_rows('collection_products')) : ?>
                <div class="bottom">
                    <div class="container">
                        <div class="inner">
                            <div class="swiper collection-products-swiper" data-collection="<?php echo $collectionID; ?>">
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('collection_products')) : the_row(); ?>
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <div class="image">
                                                    <?php getImage(get_sub_field('image'), 'full-image'); ?>
                                                </div>
                                                <h4><?php the_sub_field('title'); ?></h4>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="swiper-nav">
                                <div class="swiper-prev" id="nav-prev-<?php echo $collectionID; ?>"><i class="fa-solid fa-arrow-left"></i></div>
                                <div class="swiper-next" id="nav-next-<?php echo $collectionID; ?>"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php $collectionID++;
    endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>