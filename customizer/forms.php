<?php
/**
 * @package Brainiac
 * @subpackage Forms Theme Customizations
 * @author Mauko < mauko@osen.co.ke >
 * @since 0.1.0
 */

add_action( 'customize_register', 'os_customizer_forms_settings' );
function os_customizer_forms_settings( $wp_customize ) 
{
	$wp_customize->add_section( 
		'os_forms', 
		array(
			'panel'		 => 'os_options',
			'title'      => 'Forms',
			'priority'   => 20
		) 
	);

	$wp_customize->add_setting( 
		'os_home_form', 
		array(
			'default'     => '',
			'transport'   => 'refresh'
		) 
	);

	$wp_customize->add_control( 
		'os_home_form', 
		array(
			'label' 		=> 'Home Form',
			'section' 		=> 'os_forms',
			'settings' 		=> 'os_home_form',
			'type' 			=> 'text',
	  		'description' 	=> __( 'ID of Form on Homepage' ),
			'input_attrs'	=> array(
				'name' 		=> 'os_home_form'
			)
		) 
	);

	$wp_customize->add_setting( 
		'os_contact_form', 
		array(
			'default'     => '',
			'transport'   => 'refresh'
		) 
	);

	$wp_customize->add_control( 
		'os_contact_form', 
		array(
			'label' 		=> 'Contact Form',
			'section' 		=> 'os_forms',
			'settings' 		=> 'os_contact_form',
			'type' 			=> 'text',
	  		'description' 	=> __( 'ID of Form for Contact Page' ),
			'input_attrs'	=> array(
				'name' 		=> 'os_contact_form'
			)
		) 
	);

	$wp_customize->add_setting( 
		'os_quote_form', 
		array(
			'default'     => '',
			'transport'   => 'refresh'
		) 
	);

	$wp_customize->add_control( 
		'os_quote_form', 
		array(
			'label' 		=> 'Quote Form',
			'section' 		=> 'os_forms',
			'settings' 		=> 'os_quote_form',
			'type' 			=> 'text',
	  		'description' 	=> __( 'ID of Form for Quotation' ),
			'input_attrs'	=> array(
				'name' 		=> 'os_quote_form'
			)
		) 
	);
}