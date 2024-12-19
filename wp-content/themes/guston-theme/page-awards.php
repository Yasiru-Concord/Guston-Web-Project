<?php /* Template Name: Awards */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php if (get_the_content()) : ?>
	<section class="default-page-content">
		<div class="container">
			<div class="content-wrapper"><?php the_content(); ?></div>
		</div>
	</section>
<?php endif; ?>

<?php if (have_rows('awards')) : ?>
<section class="awards-section">
    <div class="container">
        <div class="row">
            <?php while(have_rows('awards')): the_row(); ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="image">
                            <?php getImage(get_sub_field('image')); ?>
                            <h3><?php the_sub_field('title'); ?></h3>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>