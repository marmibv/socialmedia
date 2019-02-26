<?php
/*customizing default colors section and adding new controls-setting too*/
$wp_customize->add_section( 'colors', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Color Settings', 'multicommerce' ),
    'panel'          => 'multicommerce-options'
) );

/*Primary color*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-primary-color]',
		array(
			'label'		=> esc_html__( 'Primary Color', 'multicommerce' ),
			'section'   => 'colors',
			'settings'  => 'multicommerce_theme_options[multicommerce-primary-color]',
			'type'	  	=> 'color'
		)
	)
);

/*Secondary color*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-secondary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-secondary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-secondary-color]',
		array(
			'label'		=> esc_html__( 'Secondary Color', 'multicommerce' ),
			'section'   => 'colors',
			'settings'  => 'multicommerce_theme_options[multicommerce-secondary-color]',
			'type'	  	=> 'color'
		)
	)
);