<?php

/**
 * Template Name: About Us Page
 */
get_header();
?>


<!-- innerBanner -->
<section class="homeBanner">
    <div class="container-fluid p-0">
        <div class="innerSlide">
            <img src="<?php echo get_field('banner_image') ?>" class="img-fluid w-100" />
        </div>
    </div>
</section>



<!-- Anchorlink Section -->
<section class="linkSection d-none d-lg-block">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center links">
            <ul class="d-flex align-items-center mb-0 ps-0">

                <?php if(get_field('who_we_are_title')): ?>
                    <li><a href="#who-we-are"><?php echo the_field('who_we_are_title') ?></a></li>
                <?php endif; ?>

                <?php if(get_field('what_we_stand_sec_title')): ?>
                    <li><a href="#what-we-stand-for"><?php echo the_field('what_we_stand_sec_title') ?></a></li>
                <?php endif; ?>

                <?php if(get_field('testament_sec_title')): ?>
                    <li><a href="#a-testament-to-trust"><?php echo the_field('testament_sec_title') ?></a></li>
                <?php endif; ?>

                <?php if(get_field('excellence_sec_title')): ?>
                    <li><a href="#excellence-in-action"><?php echo the_field('excellence_sec_title') ?></a></li>
                <?php endif; ?>

                <?php if(get_field('construction_timeline_title')): ?>
                    <li><a href="#construction-timeline"><?php echo the_field('construction_timeline_title') ?></a></li>
                <?php endif; ?>

            </ul>
            <a href="<?php echo get_field('strip_sec_btn_link') ?>" class="cta"><?php echo get_field('strip_sec_btn_txt') ?></a>
        </div>
    </div>
</section>


<!-- Who we are -->
<section class="py-5 overflow-hidden" id="who-we-are">
    <div class="container">
        <div class="row">
            <div class="col-lg-3" data-aos="fade-right" data-aos-delay="1000" data-aos-duration="2000">
                <div class="headText">

                    <?php if(get_field('who_we_are_title')): ?>
                        <h2 ><?php echo the_field('who_we_are_title') ?></h2>
                    <?php endif; ?>

                    <?php if(get_field('who_we_are_desc')): ?>
                        <p><?php echo the_field('who_we_are_desc') ?></p>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-6 px-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="svgImage">
                    <img src="<?php echo get_field('who_we_are_sec_img') ?>" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-lg-3 align-self-end pt-lg-0 pt-4" data-aos="fade-left" data-aos-delay="1000" data-aos-duration="2000">
                <div class="headText">
                    <h2><?php echo get_field('our_philosophy_title') ?></h2>
                    <p><?php echo get_field('our_philosophy_desc') ?></p>
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


<!-- What We Stand For -->
<section class="py-5" id="what-we-stand-for">
    <div class="headText text-center pb-4">
        <h2><?php echo get_field('what_we_stand_sec_title') ?></h2>
    </div>
    <div class="swiper standSwiper">
        <div class="swiper-wrapper">

        <?php
        if(have_rows('what_we_stand_slider')):
            while(have_rows('what_we_stand_slider')): the_row();
        ?>

            <!-- Slider ~ -->
            <div class="swiper-slide">
                <div class="image-wrapper">
                    <img src="<?php echo get_sub_field('slider_img') ?>" alt="">
                </div>
                <div class="caption">
                    <div class="headText col-lg-4 col-md-8 text-center mx-auto mb-4">
                        <h5><?php echo get_sub_field('slider_title') ?></h5>
                        <p><?php echo get_sub_field('slider_desc') ?></p>
                    </div>
                </div>
            </div>

        <?php
            endwhile;
        else:

        ?>
        <h4>No Silder Found!</h4>

        <?php
        endif;
        ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>

</section>

<!-- A Testament to Trust -->
<section class="pt-5 overflow-hidden" id="a-testament-to-trust">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 col-md-10 mx-auto text-center">
                <div class="headText">
                    <h2><?php echo get_field('testament_sec_title') ?></h2>
                    <p><?php echo get_field('testament_sec_desc') ?></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center italicText">
            <div class="col-lg-5 pe-lg-5 text-center" data-aos="fade-right" data-aos-delay="1000" data-aos-duration="2000">
                <div class="headText">
                    <img src="<?php echo get_template_directory_uri() ?>/images/blockqoute.svg" alt="" class="blockqouteIcon">
                    <h2><?php echo get_field('testament_vision_title') ?></h2>
                    <p><?php echo get_field('testament_vision_desc') ?></p>
                </div>
            </div>

            <div class="col-lg-2" data-aos="fade-up" data-aos-duration="3000">
                <div class="svgImage p-lg-0 p-5 text-center">
                    <img src="<?php echo get_field('testament_sec_img') ?>" alt="" class="img-fluid">
                </div>
            </div>

            <div class="col-lg-5 text-center" data-aos="fade-left" data-aos-delay="1000" data-aos-duration="2000">
                <div class="headText">
                    <img src="<?php echo get_template_directory_uri() ?>/images/blockqoute.svg" alt="" class="blockqouteIcon">
                    <h2><?php echo get_field('testament_mission_title') ?></h2>
                    <p><?php echo get_field('testament_mission_desc') ?></p>
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

<!-- Excellence in Action -->
<section class="pb-5 pt-5" id="excellence-in-action">
    <div class="container">
        <div class="headText text-center">
            <h2><?php echo get_field('excellence_sec_title') ?></h2>
        </div>
    </div>

    <div class="swiper excellenceSwiper pt-4 pb-5 pb-lg-0">
        <div class="swiper-wrapper">

        <?php 
        if(have_rows('excellence_slider')):
            while(have_rows('excellence_slider')): the_row();
        ?>
            <!-- Swiper slide -->
            <div class="swiper-slide">
                <div class="position-relative excellence text-center">
                    <img src="<?php echo get_sub_field('slider_img') ?>" alt="" class="img-fluid mb-3 w-100">
                    <h6><?php echo get_sub_field('slider_title') ?></h6>
                    <p><?php echo get_sub_field('slider_desc') ?></p>
                </div>
            </div>
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
        <div class="swiperArwGolden excellenceArw">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>


</section>

<!-- Line -->
<section>
    <div class="container">
        <div class="line m-0"></div>
    </div>
</section>

<!-- Construction Timeline -->
<section id="construction-timeline" class="py-5 construction position-relative">
    <div class="container">
        <div class="headText text-center mb-5">
            <h2 class="mb-2"><?php echo get_field('construction_timeline_title') ?></h2>
            <p><?php echo get_field('construction_timeline_slug') ?></p>
        </div>

        <div class="swiper timelineSwiper text-center">
            <div class="timeline-line"></div>
            <div class="swiper-wrapper align-items-start">

                <?php                
                if(have_rows('construction_timeline_slider')):
                    while(have_rows('construction_timeline_slider')): the_row();
                ?>
                    <!-- Slide 1 -->
                    <div class="swiper-slide timelineSlide">
                        <h6><?php echo get_sub_field('const_year') ?></h6>
                        <h5><?php echo get_sub_field('const_sq_ft') ?></h5>
                        <p><?php echo get_sub_field('const_desc') ?></p>
                    </div>

                <?php
                    endwhile;
                endif;
                ?>

            </div>

        </div>

    </div>

    <!-- Navigation Buttons -->
    <div class="swiperArwGolden timelineArw">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</section>

<!-- Line -->
<section>
    <div class="container">
        <div class="line mt-0"></div>
    </div>
</section>


<?php
get_footer();
?>
