<?php
/*adding sections for social options */
$wp_customize->add_section( 'multicommerce-social-options', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Social Options', 'multicommerce' ),
    'panel'          => 'multicommerce-options'
) );

/*repeater social data*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-social-data]', array(
	'sanitize_callback' => 'multicommerce_sanitize_social_data',
	'default' => $defaults['multicommerce-social-data']
) );
$wp_customize->add_control(
	new Multicommerce_Repeater_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-social-data]',
		array(
			'label'   => esc_html__('Social Options Selection','multicommerce'),
			'description'=> esc_html__('Select Social Icons and enter link','multicommerce'),
			'section' => 'multicommerce-social-options',
			'settings' => 'multicommerce_theme_options[multicommerce-social-data]',
			'repeater_main_label' => esc_html__('Social Icon','multicommerce'),
			'repeater_add_control_field' => esc_html__('Add New Icon','multicommerce')
		),
		array(
			'icon' => array(
				'type'        => 'icons',
				'default'		  => 'fa-facebook',
				'label'       => esc_html__( 'Select Icon', 'multicommerce' ),
			),
			'link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Enter Link', 'multicommerce' ),
			),
			'select' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Social icon type', 'multicommerce' ),
				'default'	  => 'rounded',
				'options'	  => array(
					'rounded'	=> esc_html__('Rounded', 'multicommerce'),
					'square'	=> esc_html__('Square', 'multicommerce'),
				),
			),
			'checkbox' => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Window', 'multicommerce' ),
			),
			
			
		)
	)
);