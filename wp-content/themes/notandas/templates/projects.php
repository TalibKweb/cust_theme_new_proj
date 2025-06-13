<?php

/**
 * Template Name: Projects Page
 */
get_header();
?>



















<!-- innerBanner -->
<section class="homeBanner">
    <div class="container-fluid p-0">
        <div class="innerSlide">
            <img src="<?php echo get_template_directory_uri(); ?>/images/project-listing.jpg" class="img-fluid w-100" />
        </div>
    </div>
</section>

<!-- Anchorlink Section -->
<section class="linkSection d-none d-lg-block">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center links">
            <ul class="d-flex align-items-center mb-0 ps-0">
                <li><a class="fw-bold" href="<?php echo site_url() ?>/projects-page">All</a></li>
                <li><a href="<?php echo site_url() ?>/project-category/residential/">RESIDENTIAL</a></li>
                <li><a href="<?php echo site_url() ?>/project-category/commercial/">COMMERCIAL</a></li>
            </ul>
            <div class="d-flex">
                <a href="<?php echo site_url() ?>/contact-us/" class="cta">Reach out</a>
            </div>
        </div>
    </div>
</section>


<!-- Listing page -->
<section class="py-5 projects overflow-hidden">
    <div class="container">

        <?php

        $project_cust_post = [
            'post_type' => 'project',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
            // 'tax_query' => [
            //     [
            //         'taxonomy' => 'project-category',
            //         'field'    => 'slug',
            //         'terms'    => 'residential',
            //     ],
            // ],

        ];

        // taxonomy-project-category-commercial

        $fetch_query = new WP_Query($project_cust_post);

        if ($fetch_query->have_posts()):
            while ($fetch_query->have_posts()): $fetch_query->the_post();
        ?>
                <div class="row align-items-center py-3 projectRows">
                    <div class="col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1000">
                        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" class="w-100">
                    </div>
                    <div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="projectDetails text-center px-lg-4 px-0">
                            <h5><?php echo the_title() ?></h5>

                            <?php if (get_field('overview_title')): ?>
                                <h3><?php echo the_field('overview_title') ?></h3>
                            <?php endif; ?>

                            <?php if (get_field('card_excerpt')): ?>
                                <p><?php echo the_field('card_excerpt') ?></p>
                            <?php endif; ?>

                            <?php if (get_field('card_btn_txt')): ?>
                                <a href="<?php echo get_permalink() ?>" class="cta"> <?php the_field('card_btn_txt') ?></a>
                            <?php else:  ?>
                                <a href="<?php echo get_permalink() ?>" class="cta">Explore More</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
        else:
            ?>

            <h3>No Projects Found!</h3>

        <?php
        endif;
        ?>



    </div>
</section>




















<?php
get_footer();
?>