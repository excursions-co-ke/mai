<?php

function os_related_posts($post_id, $related_count, $args = array())
{
	$terms = get_the_terms($post_id, 'category');

	if (empty($terms)) $terms = array();

	$term_list = wp_list_pluck($terms, 'slug');

	$related_args = array(
		'post_type' => 'post',
		'posts_per_page' => $related_count,
		'post_status' => 'publish',
		'post__not_in' => array($post_id),
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $term_list
			)
		)
	);

	return new WP_Query($related_args);
}

function os_theme_mod($key, $default = false, $before = '', $after = '')
{
	if (get_theme_mod($key) || $default !== false) {
		echo $before . get_theme_mod($key, $default) . $after;
	}
}

function os_custom_post_type_to_query($query)
{
	if ($query->is_category() || $query->is_tag()) {
		$query->set('post_type', array('post', 'project', 'service', 'os_client'));
	}
}
add_action('pre_get_posts', 'os_custom_post_type_to_query');

function os_excerpt_length($length)
{
	return 30;
}
add_filter('excerpt_length', 'os_excerpt_length', 999);

// Numbered Pagination
if (!function_exists('osen_pagination')) {

	function osen_pagination()
	{
		$prev_arrow = is_rtl() ? 'Next' : 'Previous';
		$next_arrow = is_rtl() ? 'Previous' : 'Next';

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if ($total > 1) {
			if (!$current_page = get_query_var('paged'))
				$current_page = 1;
			if (get_option('permalink_structure')) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo paginate_links(array(
				'base'			=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'		=> $format,
				'current'		=> max(1, get_query_var('paged')),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'plain',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			));
		}
	}
}