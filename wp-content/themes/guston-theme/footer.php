</main>

<?php if ($whatsapp = get_field('whatsapp', 'option')) : ?>
    <a target="_blank" href="<?php echo $whatsapp; ?>" class="floating-wa-btn"><i class="fab fa-whatsapp"></i></a>
<?php endif; ?>

</div>

<?php if (get_field('cta_content', 'option') && !is_page_template('page-contact.php')) : ?>
    <section class="footer-cta">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper title-content">
                    <?php the_field('cta_content', 'option'); ?>
                    <div class="actions">
                        <?php if (get_field('inquiry_form', 'option')) : ?>
                            <a href="#" class="theme-btn white" data-bs-toggle="modal" data-bs-target="#inquiryModal">Send Us A Message</a>
                        <?php endif; ?>
                        <?php if ($link = get_field('cta_whatsapp_link', 'option')) : ?>
                            <a href="<?php echo $link['url']; ?>" class="theme-btn white whatsapp" target="<?php echo $link['target']; ?>">
                                <i class="fa-brands fa-whatsapp"></i>
                                <?php echo $link['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($formID = get_field('inquiry_form', 'option')) : ?>
    <div class="modal theme-modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (get_field('make_inquiry_title', 'option')) : ?>
                        <div class="content-wrapper">
                            <h2><?php the_field('make_inquiry_title', 'option'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php echo do_shortcode('[forminator_form id="' . $formID . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<footer class="main-footer">
    <div class="container">
        <div class="top">
            <?php if ($logo = get_field('logo', 'option')) : ?>
                <div class="logo">
                    <?php getImage($logo, 'logo', get_bloginfo('name'), ''); ?>
                </div>
            <?php endif; ?>

            <?php get_template_part('templates/social', 'media'); ?>
        </div>

        <div class="copyrights">
            <p class="copyrights-text"><?php echo str_replace('[year]', date('Y'), get_field('copyrights_text', 'option')); ?></p>
            <p class="maya-wrapper"><a href="https://mayahive.com/" target="_blank">Crafted By <span>Maya</span><span>Hive</span></a></p>
        </div>

    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>