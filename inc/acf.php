<?php
function os_pre_get_posts($query)
{
	// do not modify queries in the admin
	if (is_admin()) {
		return $query;
	}

	// only modify queries for 'excursion' post type
	if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'excursion') {
		$query->set('orderby', '    ');
		$query->set('meta_key', 'from');
		$query->set('order', 'ASC');
	}

	return $query;
}

add_action('pre_get_posts', 'os_pre_get_posts');