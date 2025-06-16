
<?php get_header(); ?>

<main>
    <div class="container mt-5 ">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_title('<h1>', '</h1>');
            endwhile;
        ?>


            <p style="background-color: grey;">
                <?php echo the_content() ?>
            </p>

        <?php
        endif;
        ?>
    </div>

</main>

<?php get_footer(); ?>
