<?php /* Template Name: Careers */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>

<?php if (have_rows('careers')) :
    $formID = get_field('inquiry_form');
    $jobKey = 1;
?>
    <section class="careers">
        <div class="container">
            <div class="row">
                <?php while (have_rows('careers')) : the_row(); ?>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="item">
                            <div>
                                <h2><?php the_sub_field('title'); ?></h2>
                                <?php if (get_sub_field('short_description')) : ?>
                                    <p><?php the_sub_field('short_description'); ?></p>
                                <?php endif; ?>
                            </div>
                            <button type="button" class="theme-btn career-apply-btn" data-bs-toggle="modal" data-bs-target="#careerInquiryModal<?php echo $jobKey; ?>" data-title="<?php the_sub_field('title'); ?>">Apply Now</button>
                        </div>

                        <?php if ($formID) : ?>
                            <div class="modal theme-modal fade career-inquiry-modal" id="careerInquiryModal<?php echo $jobKey; ?>" tabindex="-1" aria-labelledby="careerInquiryModal<?php echo $jobKey; ?>Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="left">
                                                        <?php if ($image = get_sub_field('image')) : ?>
                                                            <?php getImage($image); ?>
                                                        <?php elseif (get_sub_field('content')) : ?>
                                                            <div class="content-wrapper"><?php the_sub_field('content'); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="content-wrapper">
                                                        <h3>Apply Now</h3>
                                                    </div>
                                                    <?php echo do_shortcode('[forminator_form id="' . $formID . '"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $jobKey++;
                endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>