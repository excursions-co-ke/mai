<?php

// Register Custom Post Type
function os_service_cpt()
{

	$labels = array(
		'name'                  => _x('Services', 'Post Type General Name', 'iter'),
		'singular_name'         => _x('Service', 'Post Type Singular Name', 'iter'),
		'menu_name'             => __('Services', 'iter'),
		'name_admin_bar'        => __('Service', 'iter'),
		'archives'              => __('Service Archives', 'iter'),
		'attributes'            => __('Service Attributes', 'iter'),
		'parent_item_colon'     => __('Parent Service:', 'iter'),
		'all_items'             => __('All Services', 'iter'),
		'add_new_item'          => __('Add New Service', 'iter'),
		'add_new'               => __('Add New', 'iter'),
		'new_item'              => __('New Service', 'iter'),
		'edit_item'             => __('Edit Service', 'iter'),
		'update_item'           => __('Update Service', 'iter'),
		'view_item'             => __('View Service', 'iter'),
		'view_items'            => __('View Services', 'iter'),
		'search_items'          => __('Search Service', 'iter'),
		'not_found'             => __('Not found', 'iter'),
		'not_found_in_trash'    => __('Not found in Trash', 'iter'),
		'featured_image'        => __('Featured Image', 'iter'),
		'set_featured_image'    => __('Set featured image', 'iter'),
		'remove_featured_image' => __('Remove featured image', 'iter'),
		'use_featured_image'    => __('Use as featured image', 'iter'),
		'insert_into_item'      => __('Insert into service', 'iter'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'iter'),
		'items_list'            => __('Services list', 'iter'),
		'items_list_navigation' => __('Services list navigation', 'iter'),
		'filter_items_list'     => __('Filter services list', 'iter'),
	);

	$args = array(
		'label'                 => __('Service', 'iter'),
		'description'           => __('We offer the following services.', 'iter'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'author'),
		'taxonomies'            => array('type'),
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
		'show_in_rest'               => true,
		'capability_type'       => 'page',
		'rewrite' 				=> ['slug' => 'services']
	);
	register_post_type('service', $args);
}
add_action('init', 'os_service_cpt', 0);
