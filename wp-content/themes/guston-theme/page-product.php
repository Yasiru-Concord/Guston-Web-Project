<?php /* Template Name: Product */ ?>
<?php get_header(); ?>

<?php if (get_field('top_content')) : ?>
    <section class="product-top">
        <div class="container">
            <div class="content-wrapper title-content"><?php the_field('top_content'); ?></div>
            <?php if (($text = get_field('make_inquiry_title', 'option')) && get_field('inquiry_form', 'option')) : ?>
                <a href="#" class="theme-btn" data-bs-toggle="modal" data-bs-target="#inquiryModal"><?php echo $text; ?></a>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php /* if (get_field('product_content')) : ?>
    <section class="product-about">
        <?php getImage(get_field('product_bg_image'), 'full-image'); ?>
        <div class="container">
            <div class="content-wrapper title-content">
                <?php the_field('product_content'); ?>
                <?php if (get_field('product_link_text')) : ?>
                    <button type="button" class="theme-btn scroll-to" data-target="#products"><?php the_field('product_link_text'); ?></button>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; */ ?>

<?php
if (have_rows('collections')) : ?>
    <section class="product-collections" id="products">
        <div class="container">
            <?php
            $collectionKey = 1;
            while (have_rows('collections')) : the_row(); ?>
                <div class="collection" id="collection<?php echo $collectionKey; ?>">
                    <?php if (get_sub_field('title')) : ?>
                        <div class="content-wrapper title-content"><?php the_sub_field('title'); ?></div>
                    <?php endif; ?>

                    <?php
                    $productsCount = count(get_sub_field('products'));
                    $showProductCount = 7;
                    $productKey = 1;
                    if (have_rows('products')) : ?>
                        <div class="row">
                            <?php while (have_rows('products')) : the_row();
                                $title = get_sub_field('title');
                            ?>
                                <div class="col-sm-12 col-md-6 col-lg-3 <?php echo ($productKey > $showProductCount) ? 'hide' : ''; ?>">
                                    <div class="item">
                                        <div class="image"><?php getImage(get_sub_field('image'), 'full-image', $title); ?></div>
                                        <h4><?php echo $title; ?></h4>
                                    </div>
                                </div>
                            <?php $productKey++;
                            endwhile; ?>

                            <?php if ($productsCount > $showProductCount) : ?>
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="item action">
                                        <p>
                                            <span><?php echo $productsCount - $showProductCount; ?>+</span>
                                            More Designs
                                        </p>
                                        <button type="button" class="theme-btn white collection-trigger">View All</button>
                                        <button type="button" class="full-link collection-trigger"></button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php $collectionKey++;
            endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('standards_content')) : ?>
    <section class="product-standards">
        <?php getImage(get_field('standards_image'), 'full-image'); ?>
        <div class="container">
            <div class="content-wrapper title-content">
                <?php the_field('standards_content'); ?>
                <?php if (($text = get_field('make_inquiry_title', 'option')) && get_field('inquiry_form', 'option')) : ?>
                    <a href="#" class="theme-btn" data-bs-toggle="modal" data-bs-target="#inquiryModal"><?php echo $text; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>