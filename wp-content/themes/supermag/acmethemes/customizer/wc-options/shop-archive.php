<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'supermag-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'supermag' ),
	'panel'          => 'supermag-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['supermag-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'supermag_sanitize_select'
) );
$choices = supermag_sidebar_layout();
$wp_customize->add_control( 'supermag_theme_options[supermag-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'supermag' ),
	'section'   => 'supermag-wc-shop-archive-option',
	'settings'  => 'supermag_theme_options[supermag-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['supermag-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'supermag_theme_options[supermag-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'supermag' ),
	'section'   => 'supermag-wc-shop-archive-option',
	'settings'  => 'supermag_theme_options[supermag-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['supermag-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'supermag_theme_options[supermag-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'supermag' ),
	'section'   => 'supermag-wc-shop-archive-option',
	'settings'  => 'supermag_theme_options[supermag-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );