<?php

/**
 * Template Name: Awards Page
 */
get_header();
?>



<style>
    .timeline-item:nth-child(odd) {
        text-align: left !important;
    }

    .timeline-item:nth-child(odd)>div {
        flex-direction: row-reverse !important;
    }

    .timeline-item:nth-child(even) {
        text-align: right !important;
    }

    .timeline-item:nth-child(even)>div {
        flex-direction: row !important;
    }
</style>





<!-- innerBanner -->
<section class="homeBanner">
    <div class="container-fluid p-0">
        <div class="innerSlide">
            <?php if (get_field('banner_img')): ?>
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
                <li><a href="#awards">Awards</a></li>
            </ul>
            <a href="/contact-us/" class="cta">Reach out</a>
        </div>
    </div>
</section>



<!-- Timeline -->
<section id="awards" class="pt-5">
    <div class="container">

        <div class="col-lg-8 mx-auto text-center awardText mb-5">

            <?php if (get_field('sec_title')): ?>
                <h5><?php echo the_field('sec_title') ?></h5>
            <?php endif; ?>

            <?php if (get_field('sec_desc')): ?>
                <p><?php echo the_field('sec_desc') ?></p>
            <?php endif; ?>

        </div>

        <div class="timeline">

            <div class="timeline-progress"></div>


            <?php
            if (have_rows('timeline_rep')):
                while (have_rows('timeline_rep')): the_row();
            ?>

                    <div class="timeline-item py-lg-5 py-4 ">
                        <div class="d-flex justify-content-between">
                            <div class="timeline-dot">
                                <div class="dot"></div>
                            </div>

                            <?php if (get_sub_field('year')): ?>
                                <h4 class="timeline-year"><?php echo the_sub_field('year') ?></h4>
                            <?php endif; ?>

                            <div class="timeline-content">
                                <div class="d-flex">
                                    <div class="imageBox col-md-4">

                                        <?php if (get_sub_field('brand_img')): ?>
                                            <img src="<?php echo the_sub_field('brand_img') ?>" alt="" class="img-fluid">
                                        <?php endif; ?>

                                    </div>

                                    <div class="col-md-8 awardContent">

                                        <?php if (get_sub_field('brand_title')): ?>
                                            <h5><?php echo the_sub_field('brand_title') ?></h5>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('brand_desc')): ?>
                                            <p><?php echo the_sub_field('brand_desc') ?></p>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('brnd_title_two')): ?>
                                            <h5><?php echo the_sub_field('brnd_title_two') ?></h5>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('brnd_desc_two')): ?>
                                            <p><?php echo the_sub_field('brnd_desc_two') ?></p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php
                endwhile;
            else:
                ?>
                <h4>No Data Found!</h4>

            <?php
            endif;
            ?>









            <!-- <div class="timeline-item py-lg-5 py-4 text-end">
                <div class="d-flex justify-content-between">
                    <div class="timeline-dot">
                        <div class="dot"></div>
                    </div>
                    <h4 class="timeline-year">2011</h4>
                    <div class="timeline-content">
                        <div class="d-flex">
                            <div class="imageBox col-md-4">
                                <img src="images/design.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 awardContent">
                                <h5>SOCIETY INTERIORS</h5>
                                <p>Award won in Commercial Category:
                                    On November 2011, by Society
                                    Interiors for Notan Heights at Mumbai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="timeline-item py-lg-5 py-4 text-start">
                <div class="d-flex justify-content-between">
                    <div class="timeline-dot">
                        <div class="dot"></div>
                    </div>
                    <h4 class="timeline-year">2014</h4>
                    <div class="timeline-content">
                        <div class="d-flex">
                            <div class="imageBox col-md-4">
                                <img src="images/Durian.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 awardContent">
                                <h5>DURIAN AWARD</h5>
                                <p>On 14th February 2014, was
                                    felicitated at the Durian Awards
                                    for Design Excellence in
                                    Architecture and Interior Design</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="timeline-item py-lg-5 py-4 text-end">
                <div class="d-flex justify-content-between">
                    <div class="timeline-dot">
                        <div class="dot"></div>
                    </div>
                    <h4 class="timeline-year">2016</h4>
                    <div class="timeline-content">
                        <div class="d-flex">
                            <div class="imageBox col-md-4">
                                <img src="images/ace.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 awardContent">
                                <h5>ACE ALPHA AWARDS</h5>
                                <p>Award won under the Residential (Multi-
                                    Unit Project) Category for 16th Avenue
                                    #39 at The Ace tech Alpha Awards 2016.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="timeline-item py-lg-5 py-4 text-start">
                <div class="d-flex justify-content-between">
                    <div class="timeline-dot">
                        <div class="dot"></div>
                    </div>
                    <h4 class="timeline-year">2017</h4>
                    <div class="timeline-content">
                        <div class="d-flex">
                            <div class="imageBox col-md-4">
                                <img src="images/icons.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 awardContent">
                                <h5>I.P.C.P. AWARDS</h5>
                                <p>Award won for Project of the Year –
                                    Pali Palms in 2017 at BERG Icons of
                                    Spaces Awards 2017, Singapore.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="timeline-item py-lg-5 py-4 text-end">
                <div class="d-flex justify-content-between">
                    <div class="timeline-dot">
                        <div class="dot"></div>
                    </div>
                    <h4 class="timeline-year">2019</h4>
                    <div class="timeline-content">
                        <div class="d-flex">
                            <div class="imageBox col-md-4">
                                <img src="images/forbes.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 awardContent">
                                <h5>FORBES DESIGN</h5>
                                <p>Award won for the Category - Group
                                    Housing Scheme at Forbes India Design
                                    Awards 2019 for Pali Palms at Mumbai.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="timeline-item py-lg-5 py-4 text-start">
                <div class="d-flex justify-content-between">
                    <div class="timeline-dot">
                        <div class="dot"></div>
                    </div>
                    <h4 class="timeline-year">2020</h4>
                    <div class="timeline-content">
                        <div class="d-flex">
                            <div class="imageBox col-md-4">
                                <img src="images/realty.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 awardContent">
                                <h5>CONCLAVE EXCELLENCE
                                    AWARDS - REALTY+</h5>
                                <p>Emerging Developer of the Year</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          
            <div class="timeline-item py-lg-5 py-4 text-end">
                <div class="d-flex justify-content-between">
                    <div class="timeline-dot">
                        <div class="dot"></div>
                    </div>
                    <h4 class="timeline-year">2023</h4>
                    <div class="timeline-content">
                        <div class="d-flex">
                            <div class="imageBox col-md-4">
                                <img src="images/forbes.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 awardContent">
                                <h5>conclave excellence awards - realty</h5>
                                <p>Emerging developer of the year</p>
                                <h5>40 Under 40</h5>
                                <p>Young Tycoons of indian Realty, Harsh M Jagwani - Realty+</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   -->

            <!-- Bottom triangle -->
            <div class="timeline-end"></div>

        </div>

    </div>
</section>





<?php
get_footer();
?>