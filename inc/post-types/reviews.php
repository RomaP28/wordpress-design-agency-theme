<?php

function _create_reviews() {

    register_post_type( 'reviews',
        [
            'labels' => array(
                'name' => __( 'Reviews' ),
                'singular_name' => __( 'Review' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'reviews'),
            'show_in_rest' => true
        ]
    );
}

add_action('init', '_create_reviews');
