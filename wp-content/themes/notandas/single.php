

<?php
get_header();
?>

<div class="container">

    <h2 class="hello" style="margin-top: 70px;">Blog Posts:</h2>

    <?php

    if (have_posts()):
        while (have_posts()): the_post();

    ?>

            <img width="70%" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
            <div class="my-5"></div>
            <h2> <?php echo the_title() ?> </h2>

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

