<?php

/**
 * @package Osen Concepts
 * @subpackage Custom Body Classes
 * @author Mauko < mauko@osen.co.ke >
 * @since 0.1.0
 */

function os_custom_body_class($classes)
{
	if (is_front_page() || is_home() || is_page('home')) {
		// if ( ( $key = array_search( 'page', $classes ) ) !== false ) {
		// 	unset( $classes[$key] );
		// }
		// if ( ( $key = array_search( 'home', $classes ) ) !== false ) {
		// 	unset( $classes[$key] );
		// }
		$classes[] = 'home blog';
	} else {
		$classes[] = '';
	}

	return $classes;
}
add_filter('body_class', 'os_custom_body_class');
