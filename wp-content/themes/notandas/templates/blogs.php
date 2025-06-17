<?php

/**
 * Template Name: Blogs Page
 */
get_header();
?>



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
                <?php if (get_field('strip_text')): ?>
                    <li><a href="#blog"><?php echo the_field('strip_text') ?></a></li>
                <?php endif; ?>
            </ul>
            <div class="d-flex">
                <div class="col-auto me-4">
                    <select class="form-select" id="sortSelect" onchange="sortItems(this.value)">
                        <option value="Filter">Filter</option>
                        <option value="name">Market Trends</option>
                        <option value="date">Home Tips</option>
                        <option value="date">News</option>
                    </select>
                </div>
                <a href="/contact-us/" class="cta">Reach out</a>
            </div>


        </div>
    </div>
</section>


<!-- Listing page -->
<section class="pt-5" id="blog">
    <div class="container">
        <div class="row">

            <?php

            $blog_posts_arr = [
                'post_type' => 'post',
                'posts_per_page' => -1,
                // 'category__in' => 'News',
                'order_by' => 'date',
                'order' =>  'ASC'
            ];

            $blog_fetch_query = new WP_Query($blog_posts_arr);

            if ($blog_fetch_query->have_posts()):
                while ($blog_fetch_query->have_posts()): $blog_fetch_query->the_post();

            ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="blogImg">

                            <!-- Featured img -->
                            <img src="<?php echo the_post_thumbnail_url() ?>" alt="" class="img-fluid">

                            <!-- Category -->
                            <span class="badge-top-right">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    foreach ($categories as $cat) {
                                        echo '<span>' . esc_html($cat->name) . '</span> ';
                                    }
                                }
                                ?>
                            </span>
                        </div>
                        <div class="blogContent">
                            <h6><?php echo get_the_date('F j, Y'); ?></h6>
                            <a href="<?php echo get_permalink() ?>">
                                <h4><?php echo the_title() ?></h4>
                            </a>
                            <p><?php echo the_excerpt() ?></p>
                        </div>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata();
            else:
                ?>

            <?php
            endif;
            ?>

        </div>
    </div>
</section>


<!-- Line -->
<section>
    <div class="container">
        <div class="line mb-0"></div>
    </div>
</section>

<!-- >>>>>>>>>>>>>>> Subscribe Sec -->
<section class="bg-pink py-5 text-center">
    <div class="container">
        <div class="row col-md-7 mx-auto blogSubscriber">

            <?php if (get_field('subs_title')): ?>
                <h2><?php echo the_field('subs_title') ?></h2>
            <?php endif; ?>

            <?php if (get_field('subs_desc')): ?>
                <p><?php echo the_field('subs_desc') ?></p>
            <?php endif; ?>

        </div>

        <!-- <div class="subscribeForm">
            <form class="subscribe" action="">
                <div class="row d-flex align-items-center justify-content-center col-lg-7 mx-auto">
                    <div class="col-md-10">
                        <input type="email" placeholder="Enter your email" />
                    </div>
                    <div class="col-md-2 text-left">
                        <button class="cta">Submit</button>
                    </div>
                </div>
            </form>
        </div> -->

        <div class="subscribeForm">
            <div class="subscribe">
                <?php echo do_shortcode('[contact-form-7 id="384f8fb" title="Newsletter Form"]') ?>
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
