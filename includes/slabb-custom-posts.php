<?php

function slabb_project_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'Projects', 'slabb' ),
		'singular_name' 		=> esc_html__( 'Project', 'slabb' ),
		'add_new' 				=> esc_html__( 'Add new Projects entry', 'slabb' ),
		'add_new_item' 			=> esc_html__( 'Add new Projects entry', 'slabb' ),
		'edit_item' 			=> esc_html__( 'Edit Projects entry', 'slabb' ),
		'new_item' 				=> esc_html__( 'New Projects entry', 'slabb' ),
		'all_items' 			=> esc_html__( 'All Projects entries', 'slabb' ),
		'view_items' 			=> esc_html__( 'View Projects entry', 'slabb' ),
		'search_items' 			=> esc_html__( 'Search Projects entry', 'slabb' ),
		'not found' 			=> esc_html__( 'Not Projects entries found', 'slabb' ),
		'not_found_in_trash' 	=> esc_html__( 'No Projects entries found in Trash', 'slabb' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'PROJECTS', 'slabb' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'rewrite' 				=> array( 'slug'=>'project', 'with_front'=>false ),
		'menu_icon' 			=> 'dashicons-id-alt',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_position' 		=> 108,
		'taxonomies' 			=> array( 'slabb_projects_tax' ),
		'supports' 				=> array( 'title' )
	);
	register_post_type( 'slabb_project', $data );
};


function slabb_testimonial_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'Testimonials', 'slabb' ),
		'singular_name' 		=> esc_html__( 'Testimonial', 'slabb' ),
		'add_new' 				=> esc_html__( 'Add new Testimonials entry', 'slabb' ),
		'add_new_item' 			=> esc_html__( 'Add new Testimonials entry', 'slabb' ),
		'edit_item' 			=> esc_html__( 'Edit Testimonials entry', 'slabb' ),
		'new_item' 				=> esc_html__( 'New Testimonials entry', 'slabb' ),
		'all_items' 			=> esc_html__( 'All Testimonials entries', 'slabb' ),
		'view_items' 			=> esc_html__( 'View Testimonials entry', 'slabb' ),
		'search_items' 			=> esc_html__( 'Search Testimonials entry', 'slabb' ),
		'not found' 			=> esc_html__( 'Not Testimonials entries found', 'slabb' ),
		'not_found_in_trash' 	=> esc_html__( 'No Testimonials entries found in Trash', 'slabb' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'TESTIMONIALS', 'slabb' )
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 108,
		'rewrite' 				=> array( 'slug'=>'testimonial', 'with_front'=>false ),
		'capability_type' 		=> 'post',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-id-alt',
		'supports' 				=> array( 'title', 'editor' )
	);
	register_post_type( 'slabb_testimonial', $data );
};

function slabb_package_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'Packages', 'slabb' ),
		'singular_name' 		=> esc_html__( 'Package', 'slabb' ),
		'add_new' 				=> esc_html__( 'Add new Packages entry', 'slabb' ),
		'add_new_item' 			=> esc_html__( 'Add new Packages entry', 'slabb' ),
		'edit_item' 			=> esc_html__( 'Edit Packages entry', 'slabb' ),
		'new_item' 				=> esc_html__( 'New Packages entry', 'slabb' ),
		'all_items' 			=> esc_html__( 'All Packages entries', 'slabb' ),
		'view_items' 			=> esc_html__( 'View Packages entry', 'slabb' ),
		'search_items' 			=> esc_html__( 'Search Packages entry', 'slabb' ),
		'not found' 			=> esc_html__( 'Not Packages entries found', 'slabb' ),
		'not_found_in_trash' 	=> esc_html__( 'No Packages entries found in Trash', 'slabb' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'PACKAGES', 'slabb' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'rewrite' 				=> array( 'slug'=>'packages', 'with_front'=>false ),
		'menu_icon' 			=> 'dashicons-id-alt',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_position' 		=> 108,
		//'taxonomies' 			=> array( 'slabb_tax' ),
		'supports' 				=> array( 'title' )
	);
	register_post_type( 'slabb_package', $data );
};

function slabb_service_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'Services', 'slabb' ),
		'singular_name' 		=> esc_html__( 'Service', 'slabb' ),
		'add_new' 				=> esc_html__( 'Add new Services entry', 'slabb' ),
		'add_new_item' 			=> esc_html__( 'Add new Services entry', 'slabb' ),
		'edit_item' 			=> esc_html__( 'Edit Services entry', 'slabb' ),
		'new_item' 				=> esc_html__( 'New Services entry', 'slabb' ),
		'all_items' 			=> esc_html__( 'All Services entries', 'slabb' ),
		'view_items' 			=> esc_html__( 'View Services entry', 'slabb' ),
		'search_items' 			=> esc_html__( 'Search Services entry', 'slabb' ),
		'not found' 			=> esc_html__( 'Not Services entries found', 'slabb' ),
		'not_found_in_trash' 	=> esc_html__( 'No Services entries found in Trash', 'slabb' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'SERVICES', 'slabb' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'rewrite' 				=> array( 'slug'=>'servicess', 'with_front'=>false ),
		'menu_icon' 			=> 'dashicons-id-alt',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_position' 		=> 108,
		//'taxonomies' 			=> array( 'slabb_tax' ),
		'supports' 				=> array( 'title', 'thumbnail' )
	);
	register_post_type( 'slabb_service', $data );
};


?>