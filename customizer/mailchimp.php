<?php
/**
 * @package Brainiac
 * @subpackage Mailchimp Theme Customizations
 * @author Mauko < mauko@osen.co.ke >
 * @since 0.1.0
 */

add_action( 'customize_register', 'os_customizer_mc_settings' );
function os_customizer_mc_settings( $wp_customize ) 
{
	$wp_customize->add_section( 
		'os_mc', 
		array(
			'panel'		 => 'os_options',
			'title'      => 'MailChimp',
			'priority'   => 20
		) 
	);

	$wp_customize->add_setting( 
		'os_mc_key', 
		array(
			'default'     => '',
			'transport'   => 'refresh'
		) 
	);

	$wp_customize->add_control( 
		'os_mc_key', 
		array(
			'label' 		=> 'API Key',
			'section' 		=> 'os_mc',
			'settings' 		=> 'os_mc_key',
			'type' 			=> 'text',
	  		'description' 	=> __( 'MailChimp API Key' ),
			'input_attrs'	=> array(
				'name' 		=> 'os_mc_key'
			)
		) 
	);

	$wp_customize->add_setting( 
		'os_mc_list_id', 
		array(
			'default'     => '',
			'transport'   => 'refresh'
		) 
	);

	$wp_customize->add_control( 
		'os_mc_list_id', 
		array(
			'label' 		=> 'List ID',
			'section' 		=> 'os_mc',
			'settings' 		=> 'os_mc_list_id',
			'type' 			=> 'text',
	  		'description' 	=> __( 'MailChimp Mailing List ID' ),
			'input_attrs'	=> array(
				'name' 		=> 'os_mc_list_id'
			)
		) 
	);
}