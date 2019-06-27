<?php
	/*
	Plugin Name: VDay Project Site Custom Post Type
	Plugin URI: http://volunteerday.ucla.edu/project-sites
	Description: Adds the "Project Site" custom post type
	Author: Kevin Liu
	Version: 0.1
	Author URI: http://kevinliu.io
	*/
	function vday_post_type_project_sites () {
	
		register_post_type(
			'project-site', 
			array(
				'label' => __('Project Sites'), 
				'public' => true, 
				'show_ui' => true,
				'exclude_from_search' => false,
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'custom-fields'
				)
			) 
		);

		register_taxonomy(
	        'project-site-categories',
	        'project-site',
	        array(
	            'label' => __( 'Project Site Categories' ),
	            'rewrite' => array( 'slug' => 'project-site-categories' ),
	            'hierarchical' => true,
	        )
	    );


	}
	
	add_action('init', 'vday_post_type_project_sites');
