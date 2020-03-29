<?php

/**
 * @package Brainiac
 * @subpackage Homepage Theme Customizations
 * @author Mauko < mauko@osen.co.ke >
 * @since 0.1.0
 */

add_action('customize_register', 'os_customizer_homepage_settings');
function os_customizer_homepage_settings($wp_customize)
{
	$wp_customize->add_section(
		'os_homepage',
		array(
			'panel'		 => 'os_options',
			'title'      => 'Homepage',
			'priority'   => 20
		)
	);

	$wp_customize->add_setting(
		'os_top_image',
		array(
			'default'		=> get_stylesheet_directory_uri() . '/assets/img/bg-default.jpg',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'os_top_image',
			array(
				'settings'		=> 'os_top_image',
				'section'		=> 'os_homepage',
				'label'			=> __('Top Image', 'iter'),
				'description'	=> __('Select the image to use as homepage background', 'iter')
			)
		)
	);

	$wp_customize->add_setting(
		'os_about_image',
		array(
			'default'		=> get_stylesheet_directory_uri() . '/assets/img/items/img-sample2-square.jpg',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'os_about_image',
			array(
				'settings'		=> 'os_about_image',
				'section'		=> 'os_homepage',
				'label'			=> __('About Us Image', 'iter'),
				'description'	=> __('Select the image to be used for the about us section.', 'iter')
			)
		)
	);



	$wp_customize->add_setting(
		'os_mission_image',
		array(
			'default'		=> get_stylesheet_directory_uri() . '/assets/img/items/img-sample2-square.jpg',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'os_mission_image',
			array(
				'settings'		=> 'os_mission_image',
				'section'		=> 'os_homepage',
				'label'			=> __('More About Us Image', 'iter'),
				'description'	=> __('Select the image to be used for the more about us section.', 'iter')
			)
		)
	);

	$wp_customize->add_setting(
		'os_contact_image',
		array(
			'default'		=> get_stylesheet_directory_uri() . '/assets/img/items/img-sample2-square.jpg',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'os_contact_image',
			array(
				'settings'		=> 'os_contact_image',
				'section'		=> 'os_homepage',
				'label'			=> __('Contact Image', 'iter'),
				'description'	=> __('Select the image to be used for the contact section.', 'iter')
			)
		)
	);
}
