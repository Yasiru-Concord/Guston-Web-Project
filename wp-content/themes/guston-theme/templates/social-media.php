<div class="social-media-wrapper">
    <?php if ($facebook = get_field('facebook', 'option')) : ?>
        <a target="_blank" href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
    <?php endif; ?>
    <?php if ($twitter = get_field('twitter_x', 'option')) : ?>
        <a target="_blank" href="<?php echo $twitter; ?>"><i class="fa-brands fa-x-twitter"></i></a>
    <?php endif; ?>
    <?php if ($linkedin = get_field('linkedin', 'option')) : ?>
        <a target="_blank" href="<?php echo $linkedin; ?>"><i class="fa-brands fa-linkedin"></i></a>
    <?php endif; ?>
    <?php if ($instagram = get_field('instagram', 'option')) : ?>
        <a target="_blank" href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a>
    <?php endif; ?>
    <?php if ($youtube = get_field('youtube', 'option')) : ?>
        <a target="_blank" href="<?php echo $youtube; ?>"><i class="fab fa-youtube"></i></a>
    <?php endif; ?>
    <?php if ($whatsapp = get_field('whatsapp', 'option')) : ?>
        <a target="_blank" href="<?php echo $whatsapp; ?>"><i class="fab fa-whatsapp"></i></a>
    <?php endif; ?>
</div>