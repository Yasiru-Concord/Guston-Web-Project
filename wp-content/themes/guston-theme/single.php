<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('templates/sub-page', 'banner'); ?>

        <?php if (get_the_content()) : ?>
            <section class="default-page-content">
                <div class="container">
                    <div class="row blog-listing">
                        <div class="col-sm-12 col-lg-3">
                            <?php get_template_part('templates/blog', 'sidebar'); ?>
                        </div>
                        <div class="col-sm-12 col-lg-9">
                            <div class="content-wrapper"><?php the_content(); ?></div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>