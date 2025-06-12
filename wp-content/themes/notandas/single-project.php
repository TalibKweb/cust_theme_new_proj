<?php
get_header();
?>

<div class="container">

    <h2 class="hello" style="margin-top: 70px;">Project Detail Page:</h2>

    <?php

    if (have_posts()):
        while (have_posts()): the_post();

    ?>
            <h3>Banner Image</h3>
            <?php
            if (get_field('banner_image')):
            ?>
                <img width="70%" src="<?php echo the_field('banner_image') ?>" alt="">
            <?php
            else:
            ?>
                <h4>No Banner image found!</h4>

            <?php
            endif;
            ?>


            <?php if (get_field('h3_title')): ?>
                <h2>h3_title: <?php echo the_field('h3_title') ?> </h2>
            <?php endif; ?>


            <h3>Featured Image</h3>
            <img width="70%" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
            <div class="my-5"></div>
            <h2> <?php echo the_title() ?> </h2>

            <h3>Not Needed:</h3>
            <?php if (get_field('card_excerpt')): ?>
                <h2> <?php echo the_field('card_excerpt') ?> </h2>
            <?php endif; ?>

        <?php
        endwhile;
    else:
        ?>
        <h3>No Post Found</h3>

    <?php
    endif;
    ?>


</div>
<?php
get_footer();
?>
