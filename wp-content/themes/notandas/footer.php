<!-- Footer -->
<footer class="pt-5 footer">
    <div class="container">
        <div class="row">

            <!-- >>>>>>>>>>>>>>>>>>>>>>> Col 1 -->
            <div class="col-lg-3 col-md-6 col-12 footerCol pe-lg-5">
                <div class="footerLogo">
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo get_field('footer_logo', 'option'); ?>" alt="" class="img-fluid"></a>
                </div>
                <div class="hr-footer"></div>
                <div class="footerDetails">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-3"><?php echo get_field('contact_us_txt', 'option'); ?></h6>
                        <img src="<?php echo get_field('contact_us_icon', 'option'); ?>" class="img-fluid">
                    </div>
                    <p><?php echo get_field('contact_us_addr', 'option'); ?></p>
                    <a href="tel:<?php echo get_field('contact_us_num', 'option'); ?>">
                        <?php echo get_field('contact_us_num', 'option'); ?>
                    </a>
                    <a href="mailto:<?php echo get_field('contact_us_email', 'option'); ?>">
                        <p><?php echo get_field('contact_us_email', 'option'); ?></p>
                    </a>
                </div>
                <div class="mt-3">
                    <ul class="d-flex socialIcons">

                        <?php
                        $contact_us_social_icons = get_field('contact_us_social_icons', 'option');
                        // echo 'contact_us_social_icons' . $contact_us_social_icons . "<br><br>";
                        foreach ($contact_us_social_icons as $contact_us_social_icon) {
                        ?>
                            <li><a href="<?php echo $contact_us_social_icon['cont_us_link'] ?>"><img src="<?php echo $contact_us_social_icon['cont_us_icon'] ?>"></a></li>
                        <?php
                        }

                        ?>

                    </ul>

                </div>
            </div>

            <!-- >>>>>>>>>>>>>>>>>>>>>>> Col 2 -->
            <div class="col-lg-4 col-md-6 col-12 footerCol ps-lg-5">

                <?php
                $quick_links = get_field('quick_links', 'option');

                foreach ($quick_links as $quick_link) {
                ?>
                    <h5 class="mb-4"><a href="<?php echo $quick_link['ql_links'] ?>"><?php echo $quick_link['ql_text'] ?></a></h5>
                <?php
                }
                ?>

            </div>


            <!-- >>>>>>>>>>>>>>>>>>>>>>> Col 3 -->
            <div class="col-lg-2 col-md-6 col-12 footerCol pe-lg-5">
                <h5 class="mb-3"><?php echo get_field('crafted_elegance_title_text', 'option'); ?></h5>
                <ul>
                    <?php
                    $crafted_elegance_reps = get_field('crafted_elegance_rep', 'option');
                    foreach ($crafted_elegance_reps as $crafted_elegance_rep) {
                    ?>
                        <li><a href="<?php echo $crafted_elegance_rep['crafted_elegance_link'] ?> "><?php echo $crafted_elegance_rep['crafted_elegance_txt'] ?> </a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <!-- >>>>>>>>>>>>>>>>>>>>>>> Col 4 -->
            <div class="col-lg-3 col-md-6 col-12 footerCol ps-lg-5">
                <h4 class="mb-3"><?php echo get_field('lets_connect_txt', 'option') . "<br>" ?></h4>
                <!-- <form action="" class="contactForm">
                    <div class="py-2"><input type="text" placeholder="NAME" /></div>
                    <div class="py-2"><input type="email" placeholder="EMAIL" /></div>
                    <div class="py-2"><input type="number" placeholder="MOBILE" /></div>
                    <div class="py-2"><textarea name="" id="" placeholder="MESSAGE" rows="1"></textarea></div>
                    <div class="py-2"><button class="cta">Submit</button></div>
                </form> -->

                <div class="contactForm">
                    <?php echo do_shortcode('[contact-form-7 id="444f4e7" title="Contact form Footer"]') ?>
                </div>

            </div>
        </div>

        <div class="line mt-lg-5"></div>


        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start py-1 copyright">
            <p>© <script>
                    document.write(new Date().getFullYear())
                </script> Notandas Realty. All Rights Reserved.</p>
            <a href="https://kwebmaker.com/" target="_blank">Kwebmaker</a>
        </div>
    </div>
</footer>



<!-- >>>>>>>>>>>>> Script LENIS -->
<script src="https://unpkg.com/lenis@1.1.13/dist/lenis.min.js"></script>

<script src="<?php echo get_template_directory_uri() ?>/js/jquery-3.7.1.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/additional_script.js"></script>

