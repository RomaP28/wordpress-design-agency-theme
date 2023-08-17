<?php

function _create_services() {

    register_post_type( 'services',
        [
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Service' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
            'show_in_rest' => true,
        ]
    );
}

add_action('init', '_create_services');
