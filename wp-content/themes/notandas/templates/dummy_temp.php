<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->

<!-- >>>>>>>>> Fetching Repeater -->
<?php
if (have_rows('repeater_field')):
    while (have_rows('repeater_field')): the_row();
?>
        <ul>
            <li><?php get_sub_field('sub_field') ?></li>
        </ul>

<?php
    endwhile;
endif;
?>


<!-- >>>>>>>>>>>>>>>> Fetching Post -->

<?php
$args = [
    'post_type' => 'post',
    // 'post_per_page' => 5, // for definite
    'post_per_page' => -1, // for infinite
    'order_by' => 'date',
    'order' => 'ASC'
];

$post_fetch_query = new WP_Query($args);
if ($post_fetch_query->have_posts()):
    while ($post_fetch_query->have_posts()): $post_fetch_query->the_post();
?>
        <ul>
            <li><?php echo the_title(); ?></li>
            <li><?php echo the_excerpt(); ?></li>
            <li><?php echo the_permalink(); ?></li>
            <li><?php echo the_post_thumbnail(); ?></li>
        </ul>
    <?php
    endwhile;
    wp_reset_postdata(); //important
else:
    ?>
    <h3>No Post Found!</h3>

<?php
endif; ?>

<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->








                    <!-- Swiper slides -->
                    <div class="swiper-slide">
                        <div class="d-lg-flex">
                            <div class="imageText col-lg-2 text-center">
                                <img src="<?php echo get_sub_field('client_img'); ?>" alt="" class="img-fluid mb-3">     
                                <h6><?php echo get_sub_field('client_name'); ?></h6>
                                <p><?php echo get_sub_field('client_addr'); ?></p>                  
                            </div>
                            <div class="testiBtn d-none d-lg-block mx-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="148" viewBox="0 0 42 148" fill="none">
                                <path d="M21 61L21 148" stroke="#DCA86A" stroke-dasharray="6 6"/>
                                <path d="M0 17V34H18V17H6.00003C6.00003 10.7509 11.3833 5.6667 18 5.6667V0C8.0742 0 0 7.62564 0 17Z" fill="#DCA86A"/>
                                <path d="M42 5.6667V0C32.6256 0 25 7.62564 25 17V34H42V17H30.6667C30.6667 10.7509 35.7509 5.6667 42 5.6667Z" fill="#DCA86A"/>
                                </svg>
                            </div>
                            <div class="col-lg-8 content">
                                <p><?php echo get_sub_field('testimonial_desc'); ?></p>
                            </div>
                        </div>
                    </div>


    <!-- Testimonials -->
    <section class="py-5 position-relative">
        <div class="container">
            <div class="heading text-center text-uppercase mb-lg-5 mb-md-4 mb-3">
                <h2><?php echo get_field('testimonials_sec_title') ?></h2>
            </div>
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">

                    <?php
                    if(have_rows('all_testimonials')):
                        while(have_rows('all_testimonials')): the_row();
                    ?>

                    <!-- Swiper slides -->
                    <div class="swiper-slide">
                        <div class="d-lg-flex">
                            <div class="imageText col-lg-2 text-center">
                                <img src="<?php echo get_sub_field('client_img'); ?>" alt="" class="img-fluid mb-3">     
                                <h6><?php echo get_sub_field('client_name'); ?></h6>
                                <p><?php echo get_sub_field('client_addr'); ?></p>                  
                            </div>
                            <div class="testiBtn d-none d-lg-block mx-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="148" viewBox="0 0 42 148" fill="none">
                                <path d="M21 61L21 148" stroke="#DCA86A" stroke-dasharray="6 6"/>
                                <path d="M0 17V34H18V17H6.00003C6.00003 10.7509 11.3833 5.6667 18 5.6667V0C8.0742 0 0 7.62564 0 17Z" fill="#DCA86A"/>
                                <path d="M42 5.6667V0C32.6256 0 25 7.62564 25 17V34H42V17H30.6667C30.6667 10.7509 35.7509 5.6667 42 5.6667Z" fill="#DCA86A"/>
                                </svg>
                            </div>
                            <div class="col-lg-8 content">
                                <p><?php echo get_sub_field('testimonial_desc'); ?></p>
                            </div>
                        </div>
                    </div>

                    <?php 
                        endwhile;
                    endif;
                    ?>

                </div>
            </div>
        </div>

        <!-- Navigation Buttons OUTSIDE container -->
        <div class="swiperArwGolden">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>


    <!-- Line -->
    <section>
        <div class="container">
        <div class="line"></div>
        </div>
    </section>















<!-- >>>>>>>>>>>>>>> GPTs -->
<?php if (have_rows('elevating_lifestyles_slider')): ?>
    <ul>
        <?php while (have_rows('elevating_lifestyles_slider')): the_row(); ?>
            <li>
                <?php the_sub_field('slider_text'); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else : ?>
    <p>No rows found</p>
<?php endif; ?>

