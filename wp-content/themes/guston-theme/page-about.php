<?php /* Template Name: About */ ?>
<?php get_header(); ?>

<?php get_template_part('templates/sub-page', 'banner'); ?>
<script>
    const countDown = () => {
        const startYear = 1937;

        // Get the current year
        const currentYear = new Date().getFullYear();

        // Calculate the total years
        const totalYears = currentYear - startYear;

        // Convert years into months, days, hours, and minutes
        const totalMonths = totalYears * 12;
        const totalDays = totalYears * 365.25; // Accounting for leap years
        const totalHours = totalDays * 24;
        const totalMinutes = totalHours * 60;

        document.querySelector('.year').textContent = totalYears;
        document.querySelector('.month').textContent = totalMonths;
        document.querySelector('.day').textContent = totalDays;
        document.querySelector('.hour').textContent = totalHours;
        document.querySelector('.minute').textContent = totalMinutes;
    };

    setInterval(countDown, 1000);
</script>
<?php if (get_field('vision_content')) : ?>
    <section class="about-vision">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-9 d-flex justify-content-center align-items-center">
                    <?php getImage(get_field('vision_image')); ?>
                    <div class="elapsed-container">
                        <div class="col-sm-12 col-lg-6 title-container">
                            <h1>A Legacy of Excellence</h1>
                        </div>
                        <div class="col-sm-12 col-lg-6 countdown-container">
                            <div class="countdown">
                                <div class="count">
                                    <div class="title">
                                        <h2 class="year"></h2>
                                        <p>years</p>
                                    </div>
                                </div>
                                <div class="count">
                                    <div class="title">
                                        <h2 class="month"></h2>
                                        <p>months</p>
                                    </div>
                                </div>
                                <div class="count">
                                    <div class="title">
                                        <h2 class="day"></h2>
                                        <p>days</p>
                                    </div>
                                </div>
                                <div class="count">
                                    <div class="title">
                                        <h2 class="hour"></h2>
                                        <p>hours</p>
                                    </div>
                                </div>
                                <div class="count">
                                    <div class="title">
                                        <h2 class="minute"></h2>
                                        <p>minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <?php getImage(get_field('vision_image')); ?>
                    <div class="content-wrapper"><?php the_field('vision_content'); ?></div>
                </div>
            </div>
    </section>
<?php endif; ?>

<?php if (have_rows('features')) : ?>
    <section class="about-features">
        <div class="container">
            <?php if (get_field('features_title')) : ?>
                <div class="content-wrapper title-content"><?php the_field('features_title'); ?></div>
            <?php endif; ?>
            <div class="features">
                <?php while (have_rows('features')) : the_row(); ?>
                    <div class="item">
                        <?php getImage(get_sub_field('icon'), '', get_sub_field('title')); ?>
                        <h5><?php the_sub_field('title'); ?></h5>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('timeline')) : ?>
    <?php if (get_field('timeline_title')) : ?>
        <section class="about-timeline-title">
            <div class="container">
                <div class="content-wrapper title-content"><?php the_field('timeline_title'); ?></div>
            </div>
        </section>
    <?php endif; ?>
    <section class="about-timeline">
        <div class="images">
            <div class="swiper" id="timelineBGSwiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('timeline')) : the_row(); ?>
                        <div class="swiper-slide">
                            <?php getImage(get_sub_field('background_image'), 'full-image'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="right">
                <div class="timeline-side">
                    <div class="timeline-pagination"></div>
                </div>
                <div class="timeline">
                    <div class="swiper" id="timelineSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('timeline')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <?php getImage(get_sub_field('image'), '', get_sub_field('title')); ?>
                                        <h5><?php the_sub_field('year'); ?></h5>
                                        <h3><?php the_sub_field('title'); ?></h3>
                                        <?php if (get_sub_field('description')) : ?>
                                            <p><?php the_sub_field('description'); ?></p>
                                        <?php endif; ?>
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

<?php get_footer(); ?>