<?php
require_once get_template_directory().'/inc/post-types/include.php';

require_once get_template_directory().'/inc/menus/include.php';


function p($var) {
    echo "<pre>"
        . print_r($var, true)
        . "</pre>";
}

add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

function change_default_jquery( ){
    wp_dequeue_script( 'jquery-ui');
    wp_deregister_script( 'jquery-ui');

    wp_dequeue_script( 'touch-punch');
    wp_deregister_script( 'touch-punch');

    wp_dequeue_script( 'imagify-admin-bar');
    wp_deregister_script( 'imagify-admin-bar');

    wp_dequeue_script( 'toc-front');
    wp_deregister_script( 'toc-front');

    wp_dequeue_style( 'jquery-ui-style');
    wp_deregister_style( 'jquery-ui-style');

    wp_dequeue_style( 'wp-block-library');
    wp_deregister_style( 'wp-block-library');

    wp_dequeue_style( 'classic-theme-styles');
    wp_deregister_style( 'classic-theme-styles');

    wp_dequeue_style( 'global-styles');
    wp_deregister_style( 'global-styles');

    wp_dequeue_style( 'toc-screen');
    wp_deregister_style( 'toc-screen');

    wp_dequeue_style( 'dnd-upload-cf7');
    wp_deregister_style( 'dnd-upload-cf7');

    wp_dequeue_style( 'contact-form-7');
    wp_deregister_style( 'contact-form-7');

    wp_dequeue_style( 'rank-math');
    wp_deregister_style( 'rank-math');

    wp_dequeue_style( 'range-slider-style');
    wp_deregister_style( 'range-slider-style');

    wp_dequeue_style( 'imagify-admin-bar');
    wp_deregister_style( 'imagify-admin-bar');
}

function print_scripts_styles() {

    $result = [];
    $result['scripts'] = [];
    $result['styles'] = [];

    // Print all loaded Scripts
    global $wp_scripts;
    foreach( $wp_scripts->queue as $script ) :
        $result['scripts'][] =  $wp_scripts->registered[$script]->handle . ";";
    endforeach;

    // Print all loaded Styles (CSS)
    global $wp_styles;
    foreach( $wp_styles->queue as $style ) {
        $result['styles'][] = $wp_styles->registered[$style]->handle . ";";
    }

    return $result;
}

/* Uploading full size images to media library */
add_filter( 'big_image_size_threshold', '__return_false' );

// Remove images sizes
function zgwd1010_filter_image_sizes( $sizes) {
    unset( $sizes['1536x1536']); // disable 2x medium-large size
    unset( $sizes['2048x2048']); // disable 2x large size
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'zgwd1010_filter_image_sizes');

add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));

function projects_archive_title( $title ) {

    if(is_post_type_archive('projects')){
        return 'Our work';
    }
    return $title;
}
add_filter( 'wp_title', 'projects_archive_title', 900);
add_filter( 'get_the_archive_title', 'projects_archive_title', 900);