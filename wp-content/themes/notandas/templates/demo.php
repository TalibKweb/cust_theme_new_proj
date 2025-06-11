Medical Tips:

<?php
/*Template name: Medical tips*/

get_header();
?>

<style>
    .filter_form_medical_Tips label.form-label {
        font-family: 'Poppins';
        font-size: 18px;
        font-weight: 400;
        line-height: 24px;
    }

    .filter_form_medical_Tips select#sort_order {
        max-width: 145px;
        padding: 12px 15px;
    }

    .filter_form_medical_Tips select#sort_order:focus {
        box-shadow: none;
    }
</style>

<section class="banner-domain "
    style="background-image: linear-gradient(#150081cc, #150081cc), url(<?php the_field('banner_image'); ?>);">
    <div class="container ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-3 m-0 text-white">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Doctor Domain</a></li>
                <li class="breadcrumb-item active fw-bold text-white" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
        <h2 class="my-5 text-white squareBox">
            <?php the_title(); ?>
        </h2>
        <div class="pt-5"></div>
    </div>
</section>

<section class="my-5 " >
    <div class="container">
        <!-- <div class="row justify-content-between align-items-center domain-form mx-auto g-2">
            <div class="col-lg-3 col-md-5 d-flex gap-2 align-items-center ">
               <label for="entriesSelect" class="  pe-0 form-label mb-0 mw-90">Show Entries</label>
               <select id="entriesSelect" class="py-2 form-select rounded-pill" aria-label="Show entries">
                  <option selected="">Select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
               </select>
            </div>

            <div class="col-lg-3 col-md-5 d-flex align-items-center gap-2">
               <label for="searchInput" class="form-label mb-0  mw-90">Search</label>
               <input type="search" class="py-2 form-control" id="searchInput" placeholder="Type here">
            </div>
         </div> -->
        <div class="mb-5 pe-4 ">
            <!-- <h3>Main Filter DropDown:</h3> -->
            <form method="GET" class="filter_form_medical_Tips row mb-4 d-flex justify-content-end  " >
                <div class=" w-100 col-md-4 d-flex justify-content-end align-items-center gap-3 ">
                    <label for="sort_order" class="form-label m-0 ">Sort By:</label>
                    <select name="sort_order" id="sort_order" class="form-select" onchange="this.form.submit()" >
                        <option value="DESC" <?php if ($_GET['sort_order'] === 'DESC') echo 'selected="selected"' ?>>Latest</option>
                        <option value="ASC" <?php if ($_GET['sort_order'] === 'ASC') echo 'selected="selected"' ?>>Oldest</option>
                    </select>
                </div>

            </form>
        </div>

        <div class="mt-4 imagic-img">
            <div class="row g-md-5 g-3 mw-100 mx-auto">

                <?php

                // Get the current page, defaulting to 1 if not present
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                // Get the selected sort order (default to DESC)
                $sort_order = isset($_GET['sort_order']) ? sanitize_text_field($_GET['sort_order']) : 'DESC';

                $args = array(
                    'post_type' => 'medical-tip',
                    'posts_per_page' => 9,
                    'paged' => $paged,
                    'order' => $sort_order,
                    // 'order' => 'DESC',
                    'orderby' => 'date',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                ?>

                        <div class="col-md-6 col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body card-insight p-0">

                                    <?php
                                    // Get the post's featured image
                                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the full-size image URL

                                    // Check if the featured image exists
                                    if ($featured_image) {
                                        // If featured image exists, display it
                                        echo '<img src="' . esc_url($featured_image) . '" alt="Featured Image" class="p-2 border">';
                                    } else {
                                        // If featured image doesn't exist, display a fallback image
                                        echo '<img src="' . get_template_directory_uri() . '/images/pdf.png" alt="Fallback Image" class="p-2 border">';
                                    }
                                    ?>

                                    <div class="bg-secondary medicaltitleBox rounded-bottom p-3">
                                        <!-- Card Title -->
                                        <p class="mb-2"><?php the_title(); ?></p>
                                        <a href="<?php the_field('pdf_file'); ?>" class=" " target="_blank">
                                            <span>View</span>
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                    <!-- Download Button -->
                                </div>
                            </div>
                        </div>

                <?php
                    }
                    wp_reset_postdata();
                } else {
                    // No posts found
                }
                ?>

            </div>
            <!-- Pagination -->
            <div class="pagination mt-5">
                <?php
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                    'format' => '?paged=%#%',
                    'add_args' => array(
                        'sort_order' => $sort_order,
                    ),
                    'prev_text' => __('« Previous'),
                    'next_text' => __('Next »'),
                ));
                ?>
            </div>
        </div>

</section>
<div id="footer">


    <?php
    get_footer();
    ?>

Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, aspernatur. Et sed quae at maiores optio consequatur omnis impedit excepturi culpa soluta ipsam eligendi atque earum illo ad deserunt provident id, nobis voluptatem! Quasi amet minima voluptate quidem earum quae cupiditate enim, corrupti deserunt id consequatur laboriosam aut reiciendis, repudiandae alias ducimus ea? Facere quaerat at nesciunt id distinctio voluptates, eos doloremque ipsum laudantium, pariatur neque perferendis dignissimos odio nulla, ad necessitatibus voluptatem! Iure velit sit quae minus? Suscipit nihil totam laudantium tenetur expedita, animi unde accusamus vel ipsum esse sed. Autem quos dolor, minima culpa vitae odit eius dicta deserunt beatae, sit porro explicabo, hic corrupti! Quisquam doloribus suscipit autem perspiciatis, deleniti aliquid dolor porro facere illum hic dignissimos a eum tempore reprehenderit, voluptate impedit ullam fugit. Illum, cum perferendis. Unde praesentium repudiandae ut consequuntur perspiciatis voluptatum beatae commodi, numquam fuga sit veniam quam similique impedit accusamus optio iste, ab quibusdam! Minus, perspiciatis eum. Facilis illo dolores porro repellendus amet ratione, ipsum necessitatibus ducimus perspiciatis accusamus, ut provident officiis eum voluptas commodi! A qui nesciunt perferendis accusamus sapiente, consectetur suscipit aut corrupti accusantium reprehenderit necessitatibus nam voluptatibus, tempore nobis debitis molestias nulla quam in doloribus ratione cupiditate. Quas voluptatibus sequi quibusdam perspiciatis, eum qui esse consequuntur, vero unde assumenda reprehenderit inventore dolore obcaecati vel laudantium. Repudiandae, ratione suscipit sequi repellat, laboriosam quia voluptatibus, doloremque provident maiores quasi deserunt. Natus mollitia cumque culpa libero, aut, quam voluptatem harum beatae tenetur molestias a dolores eligendi quaerat! Assumenda, adipisci voluptate, maiores exercitationem, labore porro rerum ut blanditiis doloribus fugiat laboriosam ea. Nesciunt nostrum deserunt nulla harum eos aperiam dolorum quae ducimus. Rerum molestiae repudiandae nisi nemo, unde nostrum quas nulla sapiente eaque. Eos, laudantium corporis! Neque soluta provident nesciunt recusandae, ducimus perferendis deserunt labore animi in! Natus commodi ea sit laboriosam magni nemo quia quidem, officiis quibusdam temporibus blanditiis! Laboriosam, magnam animi voluptas quis maiores illo quibusdam, expedita explicabo, iure et repellat veritatis id ut facere iusto soluta? Rem odit accusantium, debitis delectus quam deserunt ducimus, tempore natus sit in impedit, maxime eos neque incidunt pariatur porro! Ratione vero quasi quisquam, quod voluptas quo ducimus maxime nisi deleniti, ullam, nobis delectus debitis exercitationem excepturi tenetur aut? Voluptatum, tempora debitis nisi ratione enim tempore dolorum dolor praesentium quasi facere quisquam suscipit ea ipsa iusto, unde cupiditate in repellat itaque hic blanditiis? Earum repellat distinctio rem voluptatibus ipsam molestias tempora eum eveniet excepturi temporibus.

