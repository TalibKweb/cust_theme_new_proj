<?php get_header() ?>


<!-- innerBanner -->
<section class="homeBanner">
    <div class="container-fluid p-0">
        <div class="innerSlide">
            <img src="<?php echo get_template_directory_uri() ?>/images/stand-slider.jpg" class="img-fluid w-100" />
        </div>
    </div>
</section>

<h1 class="search_title">Search Results for: <?php echo get_search_query() ?></h1>

<?php
if (have_posts()):
    while (have_posts()): the_post();

?>

        <div class="cont">
            <div class="left">
                <a href="<?php echo get_permalink() ?>">
                    <img src="<?php echo the_post_thumbnail_url() ?>" alt="">
                </a>
            </div>
            <div class="right">
                <a href="<?php echo get_permalink() ?>">
                    <h3><?php echo the_title() ?></h3>
                    <p class="cont_desc"><?php echo the_excerpt() ?></p>
                    <p class="cont_date"><?php echo get_the_date() ?></p>
                </a>
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


<?php get_footer() ?>
