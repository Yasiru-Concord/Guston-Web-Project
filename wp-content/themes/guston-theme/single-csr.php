<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php if (get_the_content()) : ?>
    <section class="default-page-content">
        <div class="container">
            <div class="content-wrapper"><?php the_content(); ?></div>
        </div>
    </section>
<?php endif; ?>

<?php if ($images = get_field('gallery')) : ?>
    <section class="media-gallery">
        <div class="container">
            <div class="content-wrapper">
                <h2>Photo Gallery</h2>
            </div>
            <div class="inner">
                <?php foreach ($images as $image) : ?>
                    <div class="item gallery-thumb">
                        <?php getImage($image, 'full-image'); ?>
                        <a data-fancybox="gallery" class="full-link" href="<?php echo wp_get_attachment_url($image); ?>" class="d-none"></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('videos')) : ?>
    <section class="media-videos">
        <div class="container">
            <div class="content-wrapper">
                <h2>Video Gallery</h2>
            </div>
            <div class="row">
                <?php while (have_rows('videos')) : the_row(); ?>
                    <div class="col-sm-12 col-lg-4">
                        <div class="item">
                            <?php if (get_sub_field('type') == 1) : // Youtube
                                $videoID = get_sub_field('youtube_video_id');
                            ?>
                                <img src="https://img.youtube.com/vi/<?php echo $videoID; ?>/hqdefault.jpg" class="full-image">
                                <a data-fancybox="gallery" href="https://www.youtube.com/watch?v=<?php echo $videoID; ?>" class="full-link"></a>
                            <?php elseif ($video = get_sub_field('video')) : ?>
                                <?php getImage(get_sub_field('thumbnail'), 'full-image'); ?>
                                <a data-fancybox="gallery" href="<?php echo $video; ?>" class="full-link"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>