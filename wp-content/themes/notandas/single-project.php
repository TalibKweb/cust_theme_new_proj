<?php
get_header();
?>


<!-- >>>>>>>>>>>>>>>>>>>>>> Fetching Custom post Type as for (its Detail Page) -->



<?php
if (have_posts()):
    while (have_posts()): the_post();
?>

        <!-- innerBanner -->
        <section class="homeBanner">
            <div class="container-fluid p-0">
                <div class="innerSlide">
                    <?php if (get_field('banner_image')): ?>
                        <img src="<?php echo the_field('banner_image') ?>" class="img-fluid w-100" />
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Anchorlink Section -->
        <section class="linkSection d-none d-lg-block">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center links">
                    <ul class="d-flex align-items-center mb-0 ps-0">
                        <li><a href="#overview">Overview</a></li>
                        <li><a href="#video">Video</a></li>
                        <li><a href="#">GAllery</a></li>
                        <li><a href="#location">Location</a></li>
                        <li><a href="#amenities">Amenities</a></li>
                        <li><a href="#craftsmanship">Crafmanship</a></li>
                        <li><a href="#rera-details">RERA details</a></li>
                    </ul>
                    <a href="#" class="cta">Reach out</a>
                </div>
            </div>
        </section>

        <!-- Overview -->
        <section id="overview" class="py-lg-5 pb-4 projects overflow-hidden">
            <div class="container">
                <div class="row align-items-center py-3 projectRows">
                    <div class="col-lg-6 col-md-6 order-2 order-lg-1 order-md-1" data-aos="fade-right" data-aos-duration="1000">
                        <img src="<?php echo the_post_thumbnail_url() ?>" class="img-fluid">
                    </div>
                    <div class="col-lg-6 col-md-6 order-1 order-lg-2 order-md-2" data-aos="fade-left" data-aos-duration="1000">
                        <div class="projectDetails px-lg-4 px-0">
                            <h5> <?php the_title(); ?> </h5>

                            <?php if (get_field('overview_title')): ?>
                                <h3><?php echo the_field('overview_title') ?></h3>
                            <?php endif; ?>

                            <?php if (get_field('overview_desc')): ?>
                                <p><?php echo the_field('overview_desc') ?></p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Line -->
        <section>
            <div class="container">
                <div class="line mt-0"></div>
            </div>
        </section>


        <!-- Video -->
        <section id="video" class="py-4 video">
            <div class="container">
                <div class="Detailpagehead text-center col-lg-8 mx-auto">

                    <?php if (get_field('visuals_title')): ?>
                        <h2><?php echo the_field('visuals_title') ?></h2>
                    <?php endif; ?>

                    <?php if (get_field('visuals_desc')): ?>
                        <p><?php echo the_field('visuals_desc') ?></p>
                    <?php endif; ?>

                </div>
            </div>

            <?php if (get_field('visuals_video_file')): ?>
                <div class="ratio ratio-21x9">
                    <video autoplay muted loop class="w-100 h-100 object-fit-cover">
                        <source src="<?php echo the_field('visuals_video_file') ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php endif; ?>
        </section>


        <!-- Amenities Slider -->
        <section class="pt-5" id="amenities">
            <div class="swiper projectSwiper">
                <div class="swiper-wrapper">



                    <?php
                    if (have_rows('gallery_slider')):
                        while (have_rows('gallery_slider')): the_row();
                    ?>


                            <?php
                            if (get_sub_field('gallery_img')):
                            ?>

                                <!-- Swiper slide -->
                                <div class="swiper-slide">
                                    <div class="position-relative projectImg">
                                        <img src="<?php echo the_sub_field('gallery_img') ?>" alt="Prime location" class="img-fluid mb-3">
                                    </div>
                                </div>

                            <?php
                            endif;
                            ?>




                        <?php
                        endwhile;
                    else:
                        ?>

                        <h3>No Slider Found!</h3>


                    <?php
                    endif;
                    ?>






                </div>

                <!-- Navigation Buttons -->
                <div class="swiperArw">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>


        <!-- Line -->
        <section>
            <div class="container">
                <div class="line"></div>
            </div>
        </section>


        <!-- Location -->
        <section class="py-4" id="location">
            <div class="container">

                <div class="Detailpagehead text-center col-lg-8 mx-auto">

                    <?php if (get_field('location_title')): ?>
                        <h2><?php echo the_field('location_title') ?></h2>
                    <?php endif; ?>

                    <?php if (get_field('location_desc')): ?>
                        <p><?php echo the_field('location_desc') ?></p>
                    <?php endif; ?>

                </div>

                <div class="location">
                    <div class="map w-100 mb-4">
                        <?php if (get_field('location_sec_map_link')): ?>
                            <iframe src="<?php echo the_field('location_sec_map_link') ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <?php endif; ?>
                    </div>






                    <div class="swiper wantToBeSwiper">
                        <div class="swiper-wrapper">


                            <?php
                            if (have_rows('location_features_cards')):
                                while (have_rows('location_features_cards')): the_row();
                            ?>

                                    <!-- Swiper slide -->
                                    <div class="swiper-slide">
                                        <div class="wantToBeContent">
                                            <?php
                                            if (get_sub_field('features_card_content')):
                                                echo the_sub_field('features_card_content');
                                            endif;
                                            ?>
                                        </div>
                                    </div>

                                <?php
                                endwhile;
                            else:
                                ?>
                                <h3>No Cards Found!</h3>

                            <?php
                            endif;
                            ?>



                        </div>

                        <!-- Navigation Buttons -->
                        <div class="swiperArwGolden wantToArw py-4">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>





                </div>
            </div>
        </section>


        <!-- Comfort -->
        <section class="py-lg-4 pt-4 overflow-hidden" id="craftsmanship">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="Detailpagehead col-md-6 pe-lg-5" data-aos="fade-right" data-aos-duration="2000">

                        <?php if (get_field('amenities_title')): ?>
                            <h2><?php echo the_field('amenities_title') ?></h2>
                        <?php endif; ?>

                        <?php if (get_field('amenities_desc')): ?>
                            <p><?php echo the_field('amenities_desc') ?></p>
                        <?php endif; ?>

                    </div>

                    <div class="col-md-6 iconText" data-aos="fade-left" data-aos-duration="2000">
                        <div class="row">


                            <?php
                            if (have_rows('amenities_feat_cards')):
                                while (have_rows('amenities_feat_cards')): the_row();
                            ?>
                                    <div class="col-md-4 col-6 mb-3 text-center">

                                        <?php if (get_sub_field('feat_card_icon')): ?>
                                            <img src="<?php echo the_sub_field('feat_card_icon') ?>" class="img-fluid mb-3" alt="Hall">
                                        <?php endif; ?>

                                        <?php if (get_sub_field('feat_card_txt')): ?>
                                            <p><?php echo the_sub_field('feat_card_txt') ?></p>
                                        <?php endif; ?>

                                    </div>
                                <?php
                                endwhile;
                            else:
                                ?>
                                <h4>No Cards Found!</h4>

                            <?php
                            endif;
                            ?>


                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- Line -->
        <section>
            <div class="container">
                <div class="line"></div>
            </div>
        </section>


        <!-- RERA Details -->
        <section id="rera-details" class="py-4">
            <div class="container">
                <div class="Detailpagehead text-center col-lg-8 mx-auto" data-aos="fade-up" data-aos-duration="2000">

                    <?php if (get_field('rera_title')): ?>
                        <h2><?php echo the_field('rera_title') ?></h2>
                    <?php endif; ?>

                    <?php if (get_field('rera_desc')): ?>
                        <p><?php echo the_field('rera_desc') ?></p>
                    <?php endif; ?>

                </div>
            </div>
        </section>


        <!-- Line -->
        <section>
            <div class="container">
                <div class="line"></div>
            </div>
        </section>


    <?php
    endwhile;
else:
    ?>
    <h3>No Post Found!</h3>

<?php
endif;
?>


<?php
get_footer();
?>