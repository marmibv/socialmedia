<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'multicommerce-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive', 'multicommerce' ),
	'panel'          => 'woocommerce'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_sidebar_layout();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'multicommerce' ),
	'section'   => 'multicommerce-wc-shop-archive-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'multicommerce' ),
	'section'   => 'multicommerce-wc-shop-archive-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'multicommerce' ),
	'section'   => 'multicommerce-wc-shop-archive-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );