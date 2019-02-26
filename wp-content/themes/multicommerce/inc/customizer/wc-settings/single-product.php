<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'multicommerce-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'multicommerce' ),
	'panel'          => 'woocommerce'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_sidebar_layout();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'multicommerce' ),
	'section'   => 'multicommerce-wc-single-product-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );