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

// Enable support for featured images
add_theme_support('post-thumbnails');

?>
