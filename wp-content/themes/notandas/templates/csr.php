<?php

/**
 * Template Name: CSR Page
 */
get_header();
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
                <?php if (get_field('strip_title')): ?>
                    <li><a href="#csr"><?php echo the_field('strip_title') ?></a></li>
                <?php endif; ?>
            </ul>
            <a href="<?php echo site_url() ?>/contact-us/" class="cta">Reach out</a>
        </div>
    </div>
</section>

<!-- CSR Section -->
<section id="csr" class="pt-5 overflow-hidden">
    <div class="container">


        <?php
        if (have_rows('main_section')):
            while (have_rows('main_section')): the_row();
        ?>


                <div class="row justify-content-between align-items-center pb-5 csr_pg_inside_sec  ">
                    <div class="col-md-6 pe-lg-5" data-aos="fade-right" data-aos-delay="500" data-aos-duration="2000">
                        <div class="svgImage">
                            <?php if (get_sub_field('sec_image')): ?>
                                <img src="<?php echo the_sub_field('sec_image') ?>" alt="" class="img-fluid">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-left" data-aos-delay="500" data-aos-duration="2000">
                        <div class="headText">

                            <?php if (get_sub_field('sec_title')): ?>
                                <h2><?php echo the_sub_field('sec_title') ?></h2>
                            <?php endif; ?>

                            <?php if (get_sub_field('sec_desc')): ?>
                                <p><?php echo the_sub_field('sec_desc') ?></p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            <?php

            endwhile;
        else:
            ?>
            <h3>No Section Found!</h3>

        <?php
        endif;
        ?>


        <!-- <div class="row justify-content-between align-items-center pb-5">
            <div class="col-md-6 pe-lg-5" data-aos="fade-right" data-aos-delay="500" data-aos-duration="2000">
                <div class="svgImage">
                    <img src="images/csr-one.jpg" alt="" class="img-fluid">
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-left" data-aos-delay="500" data-aos-duration="2000">
                <div class="headText">
                    <h2>Touching Lives, Shaping Communities</h2>
                    <p>Fringilla urna porttitor rhoncus dolor puru sm uct us venenatis lectusma ilna fringilla diaerl maer cenas uleyets.mauris. Nibh tellus molestie nahn on blandit massa. Fringilla urna porttitor rhoncus dolor puru sm uct us venenatis lectusma ilna fringilla diaerl maer cenas uleyets.mauris. Nibh tellus molestie nahn on blandit massa</p>
                </div>
            </div>
        </div>


        <div class="row justify-content-between align-items-center pb-5">

            <div class="col-md-6 order-2 order-md-1 " data-aos="fade-left" data-aos-delay="500" data-aos-duration="2000">
                <div class="headText">
                    <h2>Nibh Tellus Molestie Nahn on Blandit</h2>
                    <p>Fringilla urna porttitor rhoncus dolor puru sm uct us venenatis lectusma ilna fringilla diaerl maer cenas uleyets.mauris. Nibh tellus molestie nahn on blandit massa. Fringilla urna porttitor rhoncus dolor puru sm uct us venenatis lectusma ilna fringilla diaerl maer cenas uleyets.mauris. Nibh tellus molestie nahn on blandit massa</p>
                </div>
            </div>

            <div class="col-md-6 order-1 order-md-2" data-aos="fade-right" data-aos-delay="500" data-aos-duration="2000">
                <div class="svgImage ps-lg-5">
                    <img src="images/csr-two.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div> -->


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