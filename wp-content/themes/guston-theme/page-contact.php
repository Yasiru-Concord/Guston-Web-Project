<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php if ($map = get_field('google_map')) : ?>
    <section class="contact-map">
        <div class="container">
            <?php echo $map; ?>
        </div>
    </section>
<?php endif; ?>

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="contact-left-wrapper">
                    <?php if (get_the_content()) : ?>
                        <div class="content-wrapper title-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="contact-details">
                        <?php if ($telephone = get_field('telephone', 'option')) : ?>
                            <div class="contact-row">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h3>Phone</h3>
                                    <?php
                                    $telephone = explode(',', $telephone);
                                    if (is_array($telephone)) : ?>
                                        <?php foreach ($telephone as $number) : ?>
                                            <a href="tel:<?php echo $number; ?>"><?php echo $number; ?></a><br>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($email = get_field('email', 'option')) : ?>
                            <div class="contact-row">
                                <i class="fas fa-at"></i>
                                <div>
                                    <h3>Email</h3>
                                    <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($address = get_field('address', 'option')) : ?>
                            <div class="contact-row">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p><?php echo nl2br($address); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (get_field('contact_form')) : ?>
                <div class="col-sm-12 col-lg-6">
                    <div class="contact-right">
                        <div class="form-wrapper">
                            <?php echo do_shortcode('[forminator_form id="' . get_field('contact_form') . '"]'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>