<?php

function _create_projects() {

	register_post_type( 'projects',
		[
			'labels' => array(
				'name' => __( 'Projects' ),
				'singular_name' => __( 'Project' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'projects'),
			'show_in_rest' => true,
		]
	);
}

add_action('init', '_create_projects');
