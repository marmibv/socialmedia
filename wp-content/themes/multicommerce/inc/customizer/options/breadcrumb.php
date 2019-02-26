<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'multicommerce-breadcrumb-options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Breadcrumbs', 'multicommerce' ),
    'panel'          => 'multicommerce-options'
) );

/*Breadcrumb Options*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-breadcrumb-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-breadcrumb-options'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );

$choices = multicommerce_breadcrumbs_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-breadcrumb-options]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Breadcrumb Options', 'multicommerce' ),
	'section'   => 'multicommerce-breadcrumb-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-breadcrumb-options]',
	'type'	  	=> 'select'
) );