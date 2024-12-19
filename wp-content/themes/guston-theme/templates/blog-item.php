<div class="blog-item">
    <div class="image">
        <?php the_post_thumbnail('full', array('class' => 'full-image')); ?>
    </div>
    <?php
    $categories = get_the_category(get_the_ID());
    if ($categories && !empty($categories[0])) : ?>
        <p><?php echo $categories[0]->name; ?></p>
    <?php endif; ?>
    <h3><?php the_title(); ?></h3>
    <a href="<?php the_permalink(); ?>" class="read-more">Read more <i class="fa-solid fa-arrow-right"></i></a>
    <a href="<?php the_permalink(); ?>" class="full-link"></a>
</div>