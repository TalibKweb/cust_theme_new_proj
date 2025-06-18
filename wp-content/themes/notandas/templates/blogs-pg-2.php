<?php

/**
 * Template Name: Blogs Two Page
 */
get_header();
?>



<style>
    .pagination {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    ul.page-numbers {
        display: flex;
        align-items: center;
        gap: 18px;
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
                <li><a href="#blog">Blogs</a></li>
            </ul>
            <div class="d-flex">
                <div class="col-auto me-4">
                    <form action="" method="GET">
                        <select name="select-categories" class="form-select" id="sortSelect" onchange="this.form.submit()">
                            <option value="">Filter</option>

                            <?php
                            $categories_for_filter = get_categories();
                            foreach ($categories_for_filter as $category):
                            ?>
                                <option value="<?php echo $category->term_id; ?>" <?php if ($_GET['select-categories'] == $category->term_id) echo 'selected="selected"';  ?>><?php echo $category->cat_name; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </form>
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

            $blogs_args = [
                'post_type' => 'post',
                'posts_per_page' => 3,
                'order_by' => 'date',
                'order' => 'ASC',
                'paged' => $paged,
                // 'category__in' => [11]
            ];

            if ($_GET['select-categories']) {
                $blogs_args['category__in'] = [$_GET['select-categories']];
            }

            $blog_fetch_query = new WP_Query($blogs_args);

            if ($blog_fetch_query->have_posts()):
                while ($blog_fetch_query->have_posts()): $blog_fetch_query->the_post();
            ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="blogImg">
                            <!-- Feat Img -->
                            <img src="<?php echo the_post_thumbnail_url() ?>" alt="" class="img-fluid">

                            <!-- Get the Category Name -->
                            <span class="badge-top-right">
                                <?php
                                $get_the_categories = get_the_category();
                                if (!empty($get_the_categories)):
                                    foreach ($get_the_categories as $get_category):

                                        echo esc_html($get_category->name);

                                    endforeach;
                                endif;
                                ?>
                            </span>
                        </div>
                        <div class="blogContent">
                            <h6><?php echo get_the_date() ?></h6>
                            <a href="<?php echo the_permalink() ?>">
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
                <h3>No posts Found!</h3>

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
                    'prev_text' => 'Prev',
                    'next_text' => 'Next',
                    'type' => 'list',
                    // 'add_args' => ['select-categories' => $_GET['select-categories'] ?? null], // Not Working
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


<section class="bg-pink py-5 text-center">
    <div class="container">
        <div class="row col-md-7 mx-auto blogSubscriber">

            <?php if (get_field('subscribe_title')): ?>
                <h2><?php echo the_field('subscribe_title') ?></h2>
            <?php endif; ?>

            <?php if (get_field('subscribe_desc')): ?>
                <p><?php echo the_field('subscribe_desc') ?></p>
            <?php endif; ?>

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
get_footer()
?>
