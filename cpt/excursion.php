<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */


// Register Destination Taxonomy
function excursion_destination()
{

    $labels = array(
        'name'                       => _x('Destinations', 'Taxonomy General Name', 'iter'),
        'singular_name'              => _x('Destination', 'Taxonomy Singular Name', 'iter'),
        'menu_name'                  => __('Destinations', 'iter'),
        'all_items'                  => __('All destinations', 'iter'),
        'parent_item'                => __('Parent destination', 'iter'),
        'parent_item_colon'          => __('Parent destination:', 'iter'),
        'new_item_name'              => __('New destination Name', 'iter'),
        'add_new_item'               => __('Add New destination', 'iter'),
        'edit_item'                  => __('Edit destination', 'iter'),
        'update_item'                => __('Update destination', 'iter'),
        'view_item'                  => __('View destination', 'iter'),
        'separate_items_with_commas' => __('Separate destinations with commas', 'iter'),
        'add_or_remove_items'        => __('Add or remove destinations', 'iter'),
        'choose_from_most_used'      => __('Choose from the most used', 'iter'),
        'popular_items'              => __('Popular destinations', 'iter'),
        'search_items'               => __('Search destinations', 'iter'),
        'not_found'                  => __('Not Found', 'iter'),
        'no_terms'                   => __('No destinations', 'iter'),
        'items_list'                 => __('Items list', 'iter'),
        'items_list_navigation'      => __('Items list navigation', 'iter'),
    );
    $rewrite = array(
        'slug'                       => 'destinations',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
        'show_in_rest'               => true,
        'rest_base'                  => 'destinations',
    );
    register_taxonomy('destination', array('excursion'), $args);
}
add_action('init', 'excursion_destination', 0);


// Register Type Taxonomy
function excursion_type()
{

    $labels = array(
        'name'                       => _x('Types', 'Taxonomy General Name', 'iter'),
        'singular_name'              => _x('Type', 'Taxonomy Singular Name', 'iter'),
        'menu_name'                  => __('Types', 'iter'),
        'all_items'                  => __('All types', 'iter'),
        'parent_item'                => __('Parent type', 'iter'),
        'parent_item_colon'          => __('Parent type:', 'iter'),
        'new_item_name'              => __('New type Name', 'iter'),
        'add_new_item'               => __('Add New type', 'iter'),
        'edit_item'                  => __('Edit type', 'iter'),
        'update_item'                => __('Update type', 'iter'),
        'view_item'                  => __('View type', 'iter'),
        'separate_items_with_commas' => __('Separate types with commas', 'iter'),
        'add_or_remove_items'        => __('Add or remove types', 'iter'),
        'choose_from_most_used'      => __('Choose from the most used', 'iter'),
        'popular_items'              => __('Popular types', 'iter'),
        'search_items'               => __('Search types', 'iter'),
        'not_found'                  => __('Not Found', 'iter'),
        'no_terms'                   => __('No types', 'iter'),
        'items_list'                 => __('Items list', 'iter'),
        'items_list_navigation'      => __('Items list navigation', 'iter'),
    );
    $rewrite = array(
        'slug'                       => 'types',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
        'show_in_rest'               => true,
        'rest_base'                  => 'types',
    );
    register_taxonomy('type', array('excursion'), $args);
}
add_action('init', 'excursion_type', 0);

// Register Custom Post Type
function excursion_post_type()
{

    $labels = array(
        'name' => _x('Excursions', 'Post Type General Name', 'iter'),
        'singular_name' => _x('Excursion', 'Post Type Singular Name', 'iter'),
        'menu_name' => __('Excursions', 'iter'),
        'name_admin_bar' => __('Excursion', 'iter'),
        'archives' => __('Item Archives', 'iter'),
        'attributes' => __('Item Attributes', 'iter'),
        'parent_item_colon' => __('Parent excursion:', 'iter'),
        'all_items' => __('All excursions', 'iter'),
        'add_new_item' => __('Add New excursion', 'iter'),
        'add_new' => __('Add New', 'iter'),
        'new_item' => __('New excursion', 'iter'),
        'edit_item' => __('Edit excursion', 'iter'),
        'update_item' => __('Update excursion', 'iter'),
        'view_item' => __('View excursion', 'iter'),
        'view_items' => __('View excursions', 'iter'),
        'search_items' => __('Search excursion', 'iter'),
        'not_found' => __('Not found', 'iter'),
        'not_found_in_trash' => __('Not found in Trash', 'iter'),
        'featured_image' => __('Featured Image', 'iter'),
        'set_featured_image' => __('Set featured image', 'iter'),
        'remove_featured_image' => __('Remove featured image', 'iter'),
        'use_featured_image' => __('Use as featured image', 'iter'),
        'insert_into_item' => __('Insert into excursion', 'iter'),
        'uploaded_to_this_item' => __('Uploaded to this excursion', 'iter'),
        'items_list' => __('Items list', 'iter'),
        'items_list_navigation' => __('Items list navigation', 'iter'),
        'filter_items_list' => __('Filter excursions list', 'iter'),
    );

    $args = array(
        'label' => __('Excursion', 'iter'),
        'description' => __('Excursion, travel', 'iter'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'author'),
        'taxonomies' => array('excursion_destination', 'excursion_type'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'excursion',
        'map_meta_cap'        => true,
        'capabilities' => array(
            'read_post'            => 'read_excursion',
            'upload_files' => 'upload_files',
            'read_private_posts'         => 'read_private_excursions',
            'edit_post'            => 'edit_excursion',
            'edit_posts'            => 'edit_excursions',
            'edit_others_posts'        => 'edit_others_excursions',
            'edit_published_posts'        => 'edit_published_excursions',
            'edit_private_posts'        => 'edit_private_excursions',
            'delete_post'            => 'delete_excursion',
            'delete_posts'            => 'delete_excursions',
            'delete_others_posts'        => 'delete_others_excursions',
            'delete_published_posts'    => 'delete_published_excursions',
            'delete_private_posts'        => 'delete_private_excursions',
            'publish_posts'            => 'publish_excursions',
            'moderate_comments'        => 'moderate_excursion_comments'
        ),
        'show_in_rest' => true,
        'rewrite'                 => ['slug' => 'diary']
    );
    register_post_type('excursion', $args);
}
add_action('init', 'excursion_post_type', 0);
