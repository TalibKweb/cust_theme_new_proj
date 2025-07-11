<?php
get_header();
?>





<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Backup code of previous project page (when fetched data as per Tabs) -->

<!-- innerBanner -->
<section class="homeBanner">
    <div class="container-fluid p-0">
        <div class="innerSlide">
            <img src="<?php echo get_template_directory_uri(); ?>/images/project-listing.jpg" class="img-fluid w-100" />
        </div>
    </div>
</section>

<!-- Anchorlink Section -->
<!-- <section class="linkSection d-none d-lg-block">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center links">
            <ul class="d-flex align-items-center mb-0 ps-0">
                <li><a href="#">All</a></li>
                <li><a href="#">RESIDENTIAL</a></li>
                <li><a href="#">COMMERCIAL</a></li>
            </ul>
            <div class="d-flex">
                <a href="contact.html" class="cta">Reach out</a>
            </div>
        </div>
    </div>
</section> -->


<!-- Anchorlink Section -->
<section class="linkSection d-none d-lg-block">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center links">
            <!-- Nav tabs -->
            <ul class="d-flex align-items-center mb-0 ps-0" id="myTab" role="tablist">
                <li role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#all" type="button" role="tab" aria-controls="home" aria-selected="true">
                        All
                    </button>
                </li>
                <li role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#residential" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Residential
                    </button>
                </li>
                <li role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                        data-bs-target="#commercial" type="button" role="tab" aria-controls="contact" aria-selected="false">
                        Commercial
                    </button>
                </li>
            </ul>
            <div class="d-flex">
                <a href="contact.html" class="cta">Reach out</a>
            </div>
        </div>
    </div>
</section>


<!-- Listing page -->
<section class="py-5 projects overflow-hidden">
    <div class="container">

        <!-- Tab panes -->
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active p-3" id="all" role="tabpanel" aria-labelledby="home-tab">

                <?php
                $project_post = [
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC'
                ];

                $proj_fetch_query = new WP_Query($project_post);

                if ($proj_fetch_query->have_posts()):
                    while ($proj_fetch_query->have_posts()): $proj_fetch_query->the_post();
                ?>
                        <div class="row align-items-center py-3 projectRows">
                            <div class="col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1000">
                                <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" class="w-100">
                            </div>
                            <div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1000">
                                <div class="projectDetails text-center px-lg-4 px-0">

                                    <h5><?php echo the_title(); ?></h5>
                                    <?php if (get_field('overview_title')): ?>
                                        <h3><?php echo the_field('overview_title'); ?></h3>
                                    <?php endif; ?>
                                    <?php if (get_field('card_excerpt')): ?>
                                        <p><?php echo the_field('card_excerpt'); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php echo get_permalink(); ?>" class="cta"><?php echo get_field('card_btn_txt'); ?></a>

                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    ?>

                    <h2>No Projects Found!</h2>

                <?php
                endif;
                ?>

            </div>


            <div class="tab-pane fade p-3" id="residential" role="tabpanel" aria-labelledby="profile-tab">

                <?php
                $project_post = [
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'category_name' => 'residential',
                ];

                $proj_fetch_query = new WP_Query($project_post);

                if ($proj_fetch_query->have_posts()):
                    while ($proj_fetch_query->have_posts()): $proj_fetch_query->the_post();
                ?>

                        <div class="row align-items-center py-3 projectRows">
                            <div class="col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1000">
                                <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" class="w-100">
                            </div>
                            <div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1000">
                                <div class="projectDetails text-center px-lg-4 px-0">

                                    <h5><?php echo the_title(); ?></h5>
                                    <?php if (get_field('overview_title')): ?>
                                        <h3><?php echo the_field('overview_title'); ?></h3>
                                    <?php endif; ?>
                                    <?php if (get_field('card_excerpt')): ?>
                                        <p><?php echo the_field('card_excerpt'); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php echo get_permalink(); ?>" class="cta"><?php echo get_field('card_btn_txt'); ?></a>

                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    ?>

                    <h2>No Projects Found!</h2>

                <?php
                endif;
                ?>

            </div>


            <div class="tab-pane fade p-3" id="commercial" role="tabpanel" aria-labelledby="contact-tab">

                <?php
                $project_post = [
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'category_name' => 'commercial',
                ];

                $proj_fetch_query = new WP_Query($project_post);

                if ($proj_fetch_query->have_posts()):
                    while ($proj_fetch_query->have_posts()): $proj_fetch_query->the_post();
                ?>
                        <div class="row align-items-center py-3 projectRows">
                            <div class="col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1000">
                                <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" class="w-100">
                            </div>
                            <div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1000">
                                <div class="projectDetails text-center px-lg-4 px-0">

                                    <h5><?php echo the_title(); ?></h5>
                                    <?php if (get_field('overview_title')): ?>
                                        <h3><?php echo the_field('overview_title'); ?></h3>
                                    <?php endif; ?>
                                    <?php if (get_field('card_excerpt')): ?>
                                        <p><?php echo the_field('card_excerpt'); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php echo get_permalink(); ?>" class="cta"><?php echo get_field('card_btn_txt'); ?></a>

                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    ?>

                    <h2>No Projects Found!</h2>

                <?php
                endif;
                ?>

            </div>

        </div>

    </div>
</section>

<?php
get_footer();
?>