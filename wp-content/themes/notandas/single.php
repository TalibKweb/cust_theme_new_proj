<?php
get_header();
?>


<!-- >>>>>>>>>>>>>>>>>>>>>> Fetching Default posts as for Blogs (its Detail Page) -->


<?php
if (have_posts()):
    while (have_posts()): the_post();
?>
        <!-- innerBanner -->
        <section class="homeBanner">
            <div class="container-fluid p-0">
                <div class="innerSlide">
                    <img src="<?php echo get_template_directory_uri() ?>/images/blog-detail.jpg" class="img-fluid w-100" />
                </div>
            </div>
        </section>

        <!-- Anchorlink Section -->
        <section class="linkSection d-none d-lg-block">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center links">
                    <ul class="d-flex align-items-center mb-0 ps-0">
                        <li><a href="#">Blogs</a></li>
                    </ul>
                    <div class="d-flex">
                        <a href="contact.html" class="cta">Reach out</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog content -->
        <section class="pt-4">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="blogContent">
                            <!-- <h6 class="mb-0">October 5, 2023</h6> -->
                            <h6 class="mb-0"><?php echo get_the_date('F j, Y') ?></h6>
                        </div>
                        <div class="share">
                            <button>Share</button>
                        </div>
                    </div>
                </div>


                <div class="row col-lg-12 mb-5">
                    <div class="blogContent">

                        <h3><?php echo the_title() ?></h3>

                        <?php echo the_content() ?>
                        <!-- 
                        <h3>What Is The Best Time To Buy A Home?</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae condimentum massa. Nunc pretium justo tortor, id commodo justo maximus nec. Proin vitae massa et libero mollis viverra. Nulla id enim eu orci tincidunt fermentum. Mauris eget varius elit, id euismod ligula. Suspendisse a viverra tellus, aliquet hendrerit dolor. Aliquam pellentesque odio quis lacus ultricies, eu sagittis elit vehicula. Duis tempor libero id turpis condimentum, vitae rhoncus nisl rutrum. Praesent aliquam tempor enim, in lacinia dolor. Sed ut risus ac nisl blandit dignissim. Ut a nisi justo. Donec quis ullamcorper eros, at placerat lorem.</p>
                        <h3>Dolor magna eget est lorem ipsum dolor sit amet consectetur.</h3>
                        <ol>
                            <li>Enim facilisis gravida neque convallis a cras semper</li>
                            <li>Tortor at auctor urna nunc</li>
                            <li>Massa sed elementum tempus venenatis</li>
                            <li>Dignissim suspendisse in est ante in nibh mauris cursus mattis</li>
                        </ol>
                        -->

                    </div>

                    <div class="blogContent">
                        <?php if (get_field('blockquote_text')): ?>
                            <blockquote><?php echo the_field('blockquote_text')  ?></blockquote>
                        <?php endif; ?>

                        <?php if (get_field('below_bq_image')): ?>
                            <div class="imgCaption">
                                <img src="<?php echo the_field('below_bq_image')  ?>" class="img-fluid w-100 mt-3" alt="">
                            </div>
                        <?php endif; ?>


                    </div>
                </div>

            </div>
        </section>


    <?php
    endwhile;
    wp_reset_postdata();
else:
    ?>
    <h4>No Post Found!</h4>

<?php
endif;
?>



<!-- Line -->
<section>
    <div class="container">
        <div class="line"></div>
    </div>
</section>


<!-- Related BLogs -->
<section class="pt-3">
    <div class="container">
        <div class="headText text-center mb-4">
            <h2>Related Blogs</h2>
        </div>

        <div class="row">
            <?php

            $current_post_id = get_the_ID();
            $more_post_categories = wp_get_post_categories($current_post_id);

            $more_blogs = [
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => [$current_post_id],
                'order_by' => 'date',
                // 'category__in'   => $more_post_categories,
                'order' => 'DESC'
            ];

            $more_blogs_fetch_query = new WP_Query($more_blogs);

            if ($more_blogs_fetch_query->have_posts()):
                while ($more_blogs_fetch_query->have_posts()): $more_blogs_fetch_query->the_post();

            ?>

                    <div class="col-md-4 mb-4">
                        <div class="blogImg">
                            <img src="<?php echo the_post_thumbnail_url() ?>" alt="" class="img-fluid">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)):
                                foreach ($categories as $cat):
                            ?>
                                    <span class="badge-top-right"><?php echo esc_html($cat->name) ?></span>
                            <?php
                                endforeach;
                            endif;
                            ?>

                        </div>

                        <div class="blogContent">
                            <h6><?php echo get_the_date('F j, Y') ?></h6>
                            <a href="<?php echo get_permalink() ?>" >
                                <h4><?php echo the_title() ?></h4>
                            </a>
                            <p><?php echo the_excerpt() ?></p>
                            <!-- <p>
                                <?php
                                //  echo "Current Post ID: " . $current_post_id; 
                                ?>
                            </p> -->
                            <p>
                                <?php
                                //  echo "more_post Categories: " . $more_post_categories;
                                //  foreach($more_post_categories as $more_post_category ) {
                                //     echo "<br>more_post_category $more_post_category <br>";
                                //  }
                                //  var_dump($more_post_categories)
                                ?>
                            </p>

                        </div>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata();
            else:
                ?>
                <h4>No More Blogs Found!</h4>


            <?php
            endif
            ?>
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
get_footer();
?>