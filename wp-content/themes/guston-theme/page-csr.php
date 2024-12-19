<?php /* Template Name: CSR */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php
$topContent = get_field('top_content');
$bottomContent = get_field('bottom_content');
if (have_rows('certificates')) : ?>
    <section class="csr-certificates">
        <div class="container">
            <?php if ($topContent) : ?>
                <div class="content-wrapper title-content top"><?php echo $topContent; ?></div>
            <?php endif; ?>

            <div class="certificates">
                <?php while (have_rows('certificates')) : the_row(); ?>
                    <div class="certificate">
                        <div class="image">
                            <?php getImage(get_sub_field('logo'), 'full-image'); ?>
                        </div>
                        <?php the_sub_field('description'); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php if ($bottomContent) : ?>
                <div class="content-wrapper title-content bottom"><?php echo $bottomContent; ?></div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
$csr = getAllCSR();
if ($csr->have_posts()) : ?>
    <section class="csr-listing">
        <div class="container">
            <div class="row">
                <?php while ($csr->have_posts()) : $csr->the_post() ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="item">
                            <?php the_post_thumbnail('full', ['class' => 'full-image']); ?>
                            <div class="content">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="theme-btn outline">Read More</a>
                            </div>
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