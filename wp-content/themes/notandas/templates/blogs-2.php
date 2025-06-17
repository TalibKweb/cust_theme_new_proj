<?php

/**
 * Template Name: Blogs Two Page Temp
 */
get_header();
?>


<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination .page-numbers {
        display: flex;
        gap: 16px;
        align-items: center;
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
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $blog_args = [
                'post_type' => 'post',
                'posts_per_page' => 3,
                // 'posts_per_page' => -1,
                'order_by' => 'date',
                'order' => 'ASC',
                // 'paged' => 1,
                'paged' => $paged
            ];

            $blog_fetch_query = new WP_Query($blog_args);

            if ($blog_fetch_query->have_posts()):
                while ($blog_fetch_query->have_posts()): $blog_fetch_query->the_post();

            ?>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="blogImg">
                            <!-- >>>>>>>>>> Feat Image -->
                            <img src="<?php echo the_post_thumbnail_url() ?>" alt="" class="img-fluid">

                            <!-- >>>>>>>>>> Category Name -->
                            <span class="badge-top-right">
                                <?php
                                $blog_categories = get_the_category();
                                if (!empty($blog_categories)):
                                    foreach ($blog_categories as $blog_category):
                                        echo esc_html($blog_category->name);
                                    endforeach;
                                endif;
                                ?>
                            </span>
                        </div>

                        <div class="blogContent">
                            <h6><?php echo get_the_date() ?></h6>
                            <a href="<?php echo get_permalink() ?>">
                                <h4><?php echo the_title() ?></h4>
                            </a>
                            <p><?php echo the_excerpt() ?></p>
                        </div>
                    </div>

                <?php
                endwhile;
            else:
                ?>

                <h4>No Posts Found!</h4>

            <?php
            endif;
            ?>

        </div>

        <?php if ($blog_fetch_query->max_num_pages > 1): ?>

            <div class="pagination">
                <?php
                echo paginate_links([
                    'total' => $blog_fetch_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                    'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                    'type' => 'list'
                ])
                ?>
            </div>

        <?php endif; ?>

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
            <h2>Subscribe for a Shortcut to Fresh News</h2>
            <p>By signing up I want to hear about new updates and masterpieces of NOTANDAS</p>
        </div>

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