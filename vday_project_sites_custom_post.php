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
				'labels' => array(
			       'name' => __( 'Project Sites' ),
			       'singular_name' => __( 'Project Sites' ),
			       'add_new' => __( 'Add Project Site' ),
			       'add_new_item' => __( 'Add Project Site' ),
			       'edit_item' => __( 'Edit Project Site' ),
			       'new_item' => __( 'Add Project Site' ),
			       'view_item' => __( 'View Project Site' ),
			       'search_items' => __( 'Search Project Sites' ),
			       'not_found' => __( 'No Project Sites found' ),
			       'not_found_in_trash' => __( 'No Project Sites found in trash' )
			   ),
				'public' => true, 
				'show_ui' => true,
				'exclude_from_search' => true,
				'hierarchical' => true,
				'capability_type' => 'post',
				'menu_position' => 20,
				'has_archive' => false,
				'rewrite' => array('with_front'=>false, 'slug'=>'register'),
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'page-attributes',
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

	    flush_rewrite_rules();


	}

	add_action('init', 'vday_post_type_project_sites');



	add_filter( 'single_template', 'vday_project_site_template' );
	function vday_project_site_template($single_template) {
	     global $post;

	     if ($post->post_type == 'project-site' ) {
	          $single_template = dirname( __FILE__ ) . '/single-project-site.php';
	     }
	     return $single_template;
	  
	}
	
	
