<?php
// >>>>>>>>>>>>>>>>>>>>> Embed the SVG type media in the backend
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// >>>>>>>>>>>>>>>>>>>>> Register Menus
function notandas_register_menus() {
    register_nav_menu('primary', 'Primary Menu');
}
add_action('after_setup_theme', 'notandas_register_menus');


// >>>>>>>>>>>>>>>>>>>>> Disable Default Custom Styling of CF7
add_filter( 'wpcf7_load_css', '__return_false' );


// >>>>>>>>>>>>>>>>>>>>> Enable support for featured images
add_theme_support('post-thumbnails');


// >>>>>>>>>>>>>>>>>>>>> Add a new Custom Post Type 'Projects'
function register_projects_custom_post_type() {
    $labels = [
        'name'                  => 'Projects', 'Post type general name', 'textdomain',
        'singular_name'         => 'Project', 'Post type singular name', 'textdomain',
        'menu_name'             => 'Projects', 'Admin Menu text', 'textdomain',
        'name_admin_bar'        => 'Project', 'Add New on Toolbar', 'textdomain',
        'add_new'               => 'Add New', 'textdomain',
        'add_new_item'          => 'Add New Project', 'textdomain',
        'new_item'              => 'New Project', 'textdomain',
        'edit_item'             => 'Edit Project', 'textdomain',
        'view_item'             => 'View Project', 'textdomain',
        'all_items'             => 'All Projects', 'textdomain',
        'search_items'          => 'Search Projects', 'textdomain',
        'not_found'             => 'No projects found!', 'textdomain',
        'not_found_in_trash'    => 'No projects found in Trash.', 'textdomain',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'projects'],
        'show_in_rest'       => true, // enable Gutenberg editor and REST API
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        // 'taxonomies'         => ['category'],
    ];

    register_post_type('project', $args);
}
add_action('init', 'register_projects_custom_post_type');


// >>>>> Shorthand of Register Post Type (can be try Next Time):
// >>>>> Also we can customize it as per our need

// function register_book_post_type() {
//     register_post_type('book', [
//         'labels' => [
//             'name' => 'Books',
//             'singular_name' => 'Book',
//         ],
//         'public' => true,
//         'has_archive' => true,
//         'supports' => ['title', 'editor', 'thumbnail'],
//         'rewrite' => ['slug' => 'books'],
//         'show_in_rest' => true,
//     ]);
// }
// add_action('init', 'register_book_post_type');

// >>>>>>>>>>>>>>>>>>>>> ENDS Add a new Custom Post Type 'Projects'






















?>





