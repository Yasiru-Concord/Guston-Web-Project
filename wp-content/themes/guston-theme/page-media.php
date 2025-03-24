<?php /* Template Name: Media */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php
$galleries = getAllGalleries();
if ($galleries->have_posts()) : ?>
    <section class="galleries-listing">
        <div class="container">
            <div class="row">
                <?php while ($galleries->have_posts()) : $galleries->the_post() ?>
                    <div class="col-sm-12 col-lg-4">
                        <div class="item">
                            <div class="image"><?php the_post_thumbnail('full', ['class' => 'full-image']); ?></div>
                            <h3><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>" class="theme-btn">Read More</a>
                            <a href="<?php the_permalink(); ?>" class="full-link"></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata(); ?>

<?php get_footer(); ?>