<!-- >>>>>>>>> Fetching Repeater -->
<?php
if (have_rows('repeater_field')):
    while (have_rows('repeater_field')): the_row();
?>
        <ul>
            <li><?php get_sub_field('sub_field') ?></li>
        </ul>

<?php
    endwhile;
endif;
?>


<!-- >>>>>>>>>>>>>>>> Fetching Post -->

<?php
$args = [
    'post_type' => 'post',
    // 'post_per_page' => 5, // for definite
    'post_per_page' => -1, // for infinite
    'order_by' => 'date',
    'order' => 'ASC'
];

$post_fetch_query = new WP_Query($args);
if ($post_fetch_query->have_posts()):
    while ($post_fetch_query->have_posts()): $post_fetch_query->the_post();
?>
        <ul>
            <li><?php echo the_title(); ?></li>
            <li><?php echo the_excerpt(); ?></li>
            <li><?php echo the_permalink(); ?></li>
            <li><?php echo the_post_thumbnail(); ?></li>
        </ul>
    <?php
    endwhile;
    wp_reset_postdata(); //important
else:
    ?>
    <h3>No Post Found!</h3>

<?php
endif; ?>



























<!-- >>>>>>>>>>>>>>> GPTs -->
<?php if (have_rows('elevating_lifestyles_slider')): ?>
    <ul>
        <?php while (have_rows('elevating_lifestyles_slider')): the_row(); ?>
            <li>
                <?php the_sub_field('slider_text'); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else : ?>
    <p>No rows found</p>
<?php endif; ?>