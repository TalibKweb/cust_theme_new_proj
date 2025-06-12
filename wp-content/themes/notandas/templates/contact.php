<?php

/**
 * Template Name: Contact Us Page
 */
get_header();
?>


<!-- innerBanner -->
<section class="homeBanner">
    <div class="container-fluid p-0">
        <div class="innerSlide">
            <?php if(get_field('banner_img')): ?>
                <img src="<?php echo the_field('banner_img') ?>" class="img-fluid w-100" />
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- Anchorlink Section -->
<section class="linkSection d-none d-lg-block">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center links">
            <ul class="d-flex align-items-center mb-0 ps-0">

                <?php if(get_field('contact_details_txt')): ?>
                    <li><a href="#contact-details"><?php echo the_field('contact_details_txt') ?></a></li>
                <?php endif; ?>

                <?php if(get_field('google_map_txt')): ?>
                    <li><a href="#google-map"><?php echo the_field('google_map_txt') ?></a></li>
                <?php endif; ?>

            </ul>
            <a href="contact.html" class="cta">Reach out</a>
        </div>
    </div>
</section>

<!-- Contact Details -->
<section id="contact-details" class="py-5">
    <div class="container">
        <div class="row justify-content-between text-center" data-aos="fade-up" data-aos-duration="2000">

            <?php 
            if(have_rows('icon_box')):
                while(have_rows('icon_box')): the_row();
            ?>

                <div class="col-md-4">
                    <div class="contact">
                        <div class="iconContact">

                            <?php if(get_sub_field('box_icon')): ?>
                                <img src="<?php echo the_sub_field('box_icon') ?>" alt="" class="mb-3">
                            <?php endif; ?>

                        </div>

                        <?php if(get_sub_field('box_titile')): ?>
                            <h5><?php echo the_sub_field('box_titile') ?></h5>
                        <?php endif; ?>

                        <?php if(get_sub_field('box_desc')): ?>
                            <p><?php echo the_sub_field('box_desc') ?></p>
                        <?php endif; ?>

                        
                        <!-- <p>898, Notan Plaza, Turner Road,<br> Bandra (W), Mumbai 400050</p> -->
                    </div>
                </div>

            <?php
                endwhile;
            else:
            ?>

            <h3>No Box Found!</h3>

            <?php
            endif;
            ?>

        </div>
    </div>
</section>


<!-- Line -->
<section>
    <div class="container">
        <div class="line mt-0"></div>
    </div>
</section>



<!-- Map & conatct form -->
<section id="google-map" class="py-5 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-6 iframeDiv pb-5 pb-lg-0 pb-md-0" data-aos="fade-right" data-aos-duration="2000">

                <?php if(get_field('map_link')): ?>
                    <iframe src="<?php echo the_field('map_link') ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <?php endif; ?>

            </div>

            <div class="col-md-6 px-lg-5" data-aos="fade-left" data-aos-duration="2000">
                <div class="headText">
                    <?php if(get_field('lets_connect_title')): ?>
                        <h2><b><?php echo the_field('lets_connect_title') ?></b></h2>
                    <?php endif; ?>
                </div>

                <!-- <form action="" class="contactForm">
                    <div class="py-3"><input type="text" placeholder="NAME" /></div>
                    <div class="py-3"><input type="email" placeholder="EMAIL" /></div>
                    <div class="py-3"><input type="number" placeholder="MOBILE" /></div>
                    <div class="py-3"><textarea name="" id="" placeholder="MESSAGE" rows="4"></textarea></div>
                    <div class="py-3"><button class="cta">Submit</button></div>
                </form> -->

                <?php if(get_field('contact_form_shortcode')): ?>
                    <?php echo the_field('contact_form_shortcode') ?>
                <?php endif; ?>

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


<?php
get_footer();
?>
