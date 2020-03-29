<?php
/**
 * @package Brainiac
 * @subpackage Archive Theme Customizations
 * @author Mauko < mauko@osen.co.ke >
 * @since 0.1.0
 */

add_action( 'customize_register', 'os_customizer_archive_settings' );
function os_customizer_archive_settings( $wp_customize ) 
{
	$wp_customize->add_section( 
		'os_archive', 
		array(
			'panel'		 => 'os_options',
			'title'      => 'Archive',
			'priority'   => 20
		) 
	);

	foreach ([ 'post', 'project', 'service'] as $type) {

		$wp_customize->add_setting( 
			'os_archive_desc_'.$type, 
			array(
				'default'     => ucfirst( $type ).'s Archive',
				'transport'   => 'refresh'
			) 
		);

		$wp_customize->add_control( 
			'os_archive_desc_'.$type, 
			array(
				'label' 		=> ucfirst( $type ).'s Archive Desc',
				'section' 		=> 'os_archive',
				'settings' 		=> 'os_archive_desc_'.$type,
				'type' 			=> 'textarea',
		  		'description' 	=> __( 'Archive Description for '.ucfirst( $type ).'s' ),
				'input_attrs'	=> array(
					'name' 		=> 'os_archive_desc_'.$type
				)
			) 
		);

	}
}