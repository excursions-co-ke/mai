<?php

// Register Custom Post Type
function os_testimonial_cpt()
{

	$labels = array(
		'name'                  => _x('Testimonials', 'Post Type General Name', 'osen'),
		'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'osen'),
		'menu_name'             => __('Testimonials', 'osen'),
		'name_admin_bar'        => __('Testimonial', 'osen'),
		'archives'              => __('Testimonial Archives', 'osen'),
		'attributes'            => __('Testimonial Attributes', 'osen'),
		'parent_item_colon'     => __('Parent Testimonial:', 'osen'),
		'all_items'             => __('All Testimonials', 'osen'),
		'add_new_item'          => __('Add New Testimonial', 'osen'),
		'add_new'               => __('Add New', 'osen'),
		'new_item'              => __('New Testimonial', 'osen'),
		'edit_item'             => __('Edit Testimonial', 'osen'),
		'update_item'           => __('Update Testimonial', 'osen'),
		'view_item'             => __('View Testimonial', 'osen'),
		'view_items'            => __('View Testimonials', 'osen'),
		'search_items'          => __('Search Testimonial', 'osen'),
		'not_found'             => __('Not found', 'osen'),
		'not_found_in_trash'    => __('Not found in Trash', 'osen'),
		'featured_image'        => __('Testimonial Avatar', 'osen'),
		'set_featured_image'    => __('Set testimonial avatar', 'osen'),
		'remove_featured_image' => __('Remove testimonial avatar', 'osen'),
		'use_featured_image'    => __('Use as testimonial avatar', 'osen'),
		'insert_into_item'      => __('Insert into testimonial', 'osen'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'osen'),
		'items_list'            => __('Testimonials list', 'osen'),
		'items_list_navigation' => __('Testimonials list navigation', 'osen'),
		'filter_items_list'     => __('Filter testimonials list', 'osen'),
	);

	$args = array(
		'label'                 => __('Testimonial', 'osen'),
		'description'           => __('Post Type Description', 'osen'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'author'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'               => true,
		'rewrite' 				=> ['slug' => 'testimonials']
	);
	register_post_type('testimonial', $args);
}
add_action('init', 'os_testimonial_cpt', 0);
