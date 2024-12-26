<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php
$bannerType = get_field('banner_type');
$bannerImage = get_field('banner_image');
?>
<script>
// document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('.content-wrapper.top_fact').forEach(item => {
//         item.addEventListener('mouseenter', event => {
//             console.log('ddddddd')
//             const infoGraphics = item.nextElementSibling; // Selects the associated info-graphics
//             infoGraphics.classList.add('active'); // Add the active class
//             item.style.opacity = '0'; // Fade out top_fact
//             item.style.transform = 'translateY(-20px)'; // Move up
//         });

//         item.addEventListener('mouseleave', event => {
//             console.log('eeeee')
//             const infoGraphics = item.nextElementSibling; // Selects the associated info-graphics
//             infoGraphics.classList.remove('active'); // Remove the active class
//             item.style.opacity = '1'; // Fade in top_fact
//             item.style.transform = 'translateY(0)'; // Reset position
//         });
//     });

//     // Optional: Close the info-graphics when mouse leaves it
//     document.querySelectorAll('.content-wrapper.info-graphics').forEach(infoGraphics => {
//         infoGraphics.addEventListener('mouseleave', () => {
//             console.log('ffffff')
//             infoGraphics.classList.remove('active'); // Remove active class
//             const topFact = infoGraphics.previousElementSibling;
//             topFact.style.opacity = '1'; // Fade in top_fact
//             topFact.style.transform = 'translateY(0)'; // Reset position
//         });
//     });
// });

//    document.addEventListener('DOMContentLoaded', function () {
//     // Get all top_fact elements
//     const topElements = document.querySelectorAll('.top_fact');

//     topElements.forEach((topElement) => {
//         // Get the unique ID of the current topElement
//         const uniqueId = topElement.getAttribute('data-id');

//         // Find the corresponding info-graphics element based on the unique ID
//         const infoGraphics = document.querySelector(`#info_graphics_${uniqueId}`);

//         // Ensure both elements exist
//         if (topElement && infoGraphics) {
//             // Show info-graphics when hovering over the top_fact
//             topElement.addEventListener('mouseenter', function () {
                
//                 infoGraphics.style.display = 'flex'; // Show the info-graphics
//                 topElement.style.display = 'none'; // Hide the topElement
//             });

//             // Hide info-graphics and show topElement when mouse leaves the info-graphics
//             infoGraphics.addEventListener('mouseleave', function () {
//                 infoGraphics.style.display = 'none'; // Hide the info-graphics
//                 topElement.style.display = 'block'; // Show the topElement
//             });
//         }
//     });
// });
document.addEventListener('DOMContentLoaded', function () {
    // Get all top_fact elements
    const topElements = document.querySelectorAll('.top_fact');

    topElements.forEach((topElement) => {
        // Get the unique ID of the current topElement
        const uniqueId = topElement.getAttribute('data-id');

        // Find the corresponding info-graphics element based on the unique ID
        const infoGraphics = document.querySelector(`#info_graphics_${uniqueId}`);

        // Ensure both elements exist
        if (topElement && infoGraphics) {
            // Initialize the info-graphics to be hidden
            infoGraphics.style.opacity = '0'; // Set initial opacity
            infoGraphics.style.transition = 'opacity 0.3s ease'; // Transition effect
            infoGraphics.style.pointerEvents = 'none'; // Prevent interaction when hidden

            // Show info-graphics when hovering over the top_fact
            topElement.addEventListener('mouseenter', function () {
                infoGraphics.style.opacity = '1'; // Fade in the info-graphics
                infoGraphics.style.pointerEvents = 'auto'; // Allow interaction
                topElement.style.opacity = '0'; // Fade out the topElement
            });

            // Hide info-graphics and show topElement when mouse leaves the info-graphics
            infoGraphics.addEventListener('mouseleave', function () {
                infoGraphics.style.opacity = '0'; // Fade out the info-graphics
                infoGraphics.style.pointerEvents = 'none'; // Prevent interaction
                topElement.style.opacity = '1'; // Fade in the topElement
            });
        }
    });
});
</script>
<section class="banner-section <?php echo ($bannerType == 1) ? 'default' : 'slider'; ?>">
    <?php if ($bannerType == 1) : // Default Banner
    ?>
        <?php if ($video = get_field('banner_video')) : ?>
            <video src="<?php echo $video; ?>" class="full-image" autoplay muted playsinline loop poster="<?php echo wp_get_attachment_url($bannerImage); ?>"></video>
        <?php else : ?>
            <?php getImage($bannerImage, 'full-image no-lazyload', '', false); ?>
        <?php endif; ?>
        <div class="container">
            <div class="content-wrapper">
                <?php the_field('banner_content'); ?>
                <?php if ($title = get_field('banner_scroll_text')) : ?>
                    <button type="button" class="theme-btn white scroll-to" data-target="#welcome"><i class="fa-solid fa-arrow-down"></i> <?php echo $title; ?></button>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif (have_rows('banner_sliders')) : // Swiper
    ?>
        <div class="swiper" id="bannerSwiper">
            <div class="swiper-wrapper">
                <?php while (have_rows('banner_sliders')) : the_row();
                    $image = get_sub_field('image');
                ?>
                    <div class="swiper-slide">
                        <div class="item">
                            <?php if ($video = get_sub_field('video')): ?>
                                <video src="<?php echo $video; ?>" class="full-image" autoplay muted playsinline loop poster="<?php echo wp_get_attachment_url($image); ?>"></video>
                            <?php else: ?>
                                <?php getImage($image, 'full-image no-lazyload', '', false); ?>
                            <?php endif; ?>
                            <div class="container">
                                <div class="content-wrapper">
                                    <?php the_sub_field('content'); ?>
                                    <?php if ($link = get_sub_field('link')) : ?>
                                        <a href="<?php echo $link['url']; ?>" class="theme-btn white" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="swiper-nav">
            <div class="banner-prev"><i class="fa-solid fa-chevron-left"></i></div>
            <div class="banner-next"><i class="fa-solid fa-chevron-right"></i></div>
        </div>
        <div class="banner-pagination swiper-pagination"></div>
    <?php endif; ?>
</section>

<?php if (get_field('welcome_content')) : ?>
    <section class="home-welcome" id="welcome">
        <div class="container">
            <div class="inner">
                <?php getImage(get_field('welcome_image'), 'full-image'); ?>
                <div class="content-wrapper title-content wow animate__animated animate__fadeIn" data-wow-offset="100">
                    <?php the_field('welcome_content'); ?>

                    <?php if ($logos = get_field('welcome_logos')) : ?>
                        <div class="logos">
                            <?php foreach ($logos as $certificate) : ?>
                                <?php getImage($certificate); ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('commitment_content')) : ?>
    <section class="home-commitment">
        <?php getImage(get_field('commitment_image'), 'full-image'); ?>
        <div class="container">
            <div class="content-wrapper title-content">
                <?php the_field('commitment_content'); ?>
                <?php if ($link = get_field('commitment_link')) : ?>
                    <a href="<?php echo $link['url']; ?>" class="theme-btn" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('about_stats')) : ?>
    <section class="home-about">
        <div class="container">
            <div class="inner">
                <div class="left">
                    <?php if (get_field('about_stats_title')) : ?>
                        <div class="content-wrapper">
                            <?php the_field('about_stats_title'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="swiper" id="homeStatsNavSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('about_stats')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="stat">
                                        <?php getImage(get_sub_field('icon'), '', get_sub_field('title')); ?>
                                        <h5><?php the_sub_field('title'); ?></h5>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="swiper" id="homeStatsSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('about_stats')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <?php getImage(get_sub_field('image'), 'full-image'); ?>
                                        <div class="content-wrapper title-content">
                                            <?php getImage(get_sub_field('icon'), 'icon', get_sub_field('title')); ?>
                                            <?php the_sub_field('content'); ?>
                                            <?php if ($link = get_sub_field('link')) : ?>
                                                <a href="<?php echo $link['url']; ?>" class="theme-btn" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('factories')) : ?>
    <section class="home-factories">
        <div class="container">
            <div class="inner">
                <div class="title">
                    <?php getImage(get_field('factories_image'), 'full-image'); ?>
                    <div class="content-wrapper"><?php the_field('factories_title'); ?></div>
                    <div class="swiper" id="homeFactoriesNavSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('factories')) : the_row();
                                $title = get_sub_field('title'); ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <?php if ($icon = get_sub_field('icon')) : ?>
                                            <?php getImage($icon, 'icon', $title); ?>
                                        <?php else : ?>
                                            <?php echo $title; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="swiper" id="homeFactoriesSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('factories')) : the_row(); ?>
                                <?php $uniqueId = uniqid(); // Generate a unique ID for each factory 
                                ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <?php if (get_sub_field('top_content')) : ?>
                                            <div class="content-wrapper top_fact" data-id="<?php echo $uniqueId; ?>" id="factory_top_map_<?php echo $uniqueId; ?>">
                                                <img src="<?php the_sub_field('countryImg'); ?>" alt="Country Map">
                                            </div>
                                        <?php endif; ?>

                                        <div class="content-wrapper info-graphics" data-id="<?php echo $uniqueId; ?>" id="info_graphics_<?php echo $uniqueId; ?>">
                                            <?php if (have_rows('factory_content')) : ?>
                                                <ul class="slides info-ul">
                                                    <?php while (have_rows('factory_content')) : the_row(); ?>
                                                        <?php
                                                        $image = get_sub_field('icon');
                                                        $stats = get_sub_field('stats');
                                                        $title = get_sub_field('title');
                                                        $stat = get_sub_field('stat');
                                                        ?>
                                                        <li class="hover-container">
                                                            <?php if ($stat) : ?>
                                                                <span><?php echo acf_esc_html($stat); ?></span>
                                                            <?php endif; ?>
                                                            <img src="<?php echo esc_url($image); ?>" alt="Factory Icon">
                                                            <p><?php echo acf_esc_html($title); ?></p>
                                                        </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/*
$linkText = get_field('products_more_link');
$inquiryForm = get_field('product_inquiry_form', 'option');
if (have_rows('products')) :
?>
    <section class="home-products">
        <div class="container">
            <div class="inner">
                <div class="swiper" id="productsSwiper">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('products')) : the_row(); ?>
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="image"><?php getImage(get_sub_field('image'), 'product-image'); ?></div>
                                    <div class="content">
                                        <?php if (have_rows('products_stats')) : ?>
                                            <div class="stats">
                                                <?php while (have_rows('products_stats')) : the_row(); ?>
                                                    <div class="stat">
                                                        <p><?php the_sub_field('value'); ?></p>
                                                        <h6><?php the_sub_field('title'); ?></h6>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="actions">
                                            <?php if ($linkText && ($link = get_sub_field('link'))) : ?>
                                                <a href="<?php echo $link; ?>" class="theme-btn outline"><?php echo $linkText; ?></a>
                                            <?php endif; ?>
                                            <?php if ($inquiryForm) : ?>
                                                <a href="#" class="theme-btn product-inquiry-btn" data-title="<?php the_sub_field('title'); ?>" data-bs-toggle="modal" data-bs-target="#productInquiryModal">Inquire Now</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="top">
                    <?php if ($title = get_field('products_title')) : ?>
                        <h3 class="wow animate__animated animate__fadeInUp" data-wow-offset="50"><?php echo nl2br($title); ?></h3>
                    <?php endif; ?>
                    <?php if (have_rows('products')) : ?>
                        <div class="swiper" id="productsThumbSwiper">
                            <div class="swiper-wrapper">
                                <?php while (have_rows('products')) : the_row(); ?>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p><?php the_sub_field('title'); ?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if ($inquiryForm) : ?>
            <div class="modal theme-modal fade" id="productInquiryModal" tabindex="-1" aria-labelledby="productInquiryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php if (get_field('make_inquiry_title', 'option')) : ?>
                                <div class="content-wrapper">
                                    <h3><?php the_field('make_inquiry_title', 'option'); ?></h3>
                                </div>
                            <?php endif; ?>
                            <?php echo do_shortcode('[forminator_form id="' . $inquiryForm . '"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </section>
<?php endif; */ ?>

<?php /* if (get_field('logistics_content')) : ?>
    <section class="home-logistics">
        <div class="container">
            <div class="inner">
                <?php getImage(get_field('logistics_bg_image'), 'full-image'); ?>
                <div class="content-wrapper title-content">
                    <?php the_field('logistics_content'); ?>
                </div>
                <div class="image">
                    <?php getImage(get_field('logistics_image'), 'side-image'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;  */ ?>

<?php /*if (get_field('awards_content')) : ?>
    <section class="home-awards">
        <div class="container">
            <div class="inner">
                <?php getImage(get_field('awards_image'), 'full-image'); ?>
                <div class="content wow animate__animated animate__fadeIn" data-wow-offset="100">
                    <div class="content-wrapper title-content"><?php the_field('awards_content'); ?></div>
                    <?php if (have_rows('awards')) : ?>
                        <div class="awards">
                            <?php while (have_rows('awards')) : the_row(); ?>
                                <div class="item"><?php the_sub_field('title'); ?></div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; */ ?>

<?php /*if (get_field('company_left_content')) : ?>
    <section class="home-company">
        <div class="container">
            <?php if (have_rows('company_countries')) : ?>
                <div class="countries">
                    <div class="side-nav">
                        <ul class="nav flex-column" role="tablist">
                            <?php
                            $key = 1;
                            while (have_rows('company_countries')) : the_row(); ?>
                                <li>
                                    <h2 class="title"><?php the_sub_field('title'); ?></h2>
                                </li>
                                <?php if (have_rows('facilities')) : ?>
                                    <?php while (have_rows('facilities')) : the_row(); ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo ($key == 1) ? 'active' : ''; ?>" id="tab-<?php echo $key; ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo $key; ?>-pane" type="button" role="tab" aria-controls="tab-<?php echo $key; ?>-pane" aria-selected="true"><?php the_sub_field('title'); ?></button>
                                        </li>
                                    <?php $key++;
                                    endwhile; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <?php
                        $key = 1;
                        while (have_rows('company_countries')) : the_row();
                            if (have_rows('facilities')) :
                                while (have_rows('facilities')) : the_row(); ?>
                                    <div class="tab-pane fade <?php echo ($key == 1) ? 'show active' : ''; ?>" id="tab-<?php echo $key; ?>-pane" role="tabpanel" aria-labelledby="tab-<?php echo $key; ?>" tabindex="0">
                                        <div class="inner">
                                            <?php if ($image = get_sub_field('image')) : ?>
                                                <div class="full-image-parent">
                                                    <?php getImage(get_sub_field('logo'), 'logo'); ?>
                                                    <?php getImage($image, 'full-image'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="content-wrapper">
                                                <?php the_sub_field('description'); ?>

                                                <?php if ($certificates = get_sub_field('certificates')) : ?>
                                                    <div class="certificates">
                                                        <?php foreach ($certificates as $certificate) : ?>
                                                            <?php getImage($certificate); ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                        <?php $key++;
                                endwhile;
                            endif;
                        endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; */ ?>

<?php
$blog = getLatestBlogPosts(4);
if ($blog->have_posts()) : ?>
    <section class="home-blog">
        <div class="container">
            <?php if (get_field('blog_title')) : ?>
                <div class="content-wrapper title-content">
                    <?php the_field('blog_title'); ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php while ($blog->have_posts()) : $blog->the_post(); ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <?php get_template_part('templates/blog', 'item'); ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer();
