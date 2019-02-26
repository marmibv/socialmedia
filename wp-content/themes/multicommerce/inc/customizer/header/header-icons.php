<?php
/*adding sections for header options*/
$wp_customize->add_section( 'multicommerce-header-icons', array(
	'priority'       => 70,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Header Icons', 'multicommerce' ),
	'panel'          => 'multicommerce-header-panel'
) );

/*header icons*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-enable-cart-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-enable-cart-icon'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-enable-cart-icon]', array(
	'label'		=> esc_html__( 'Enable Cart', 'multicommerce' ),
	'section'   => 'multicommerce-header-icons',
	'settings'  => 'multicommerce_theme_options[multicommerce-enable-cart-icon]',
	'type'	  	=> 'checkbox'
) );

if ( class_exists( 'YITH_WCWL' ) ){
	$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-enable-wishlist-icon]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['multicommerce-enable-wishlist-icon'],
		'sanitize_callback' => 'multicommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-enable-wishlist-icon]', array(
		'label'		=> esc_html__( 'Enable Wishlist', 'multicommerce' ),
		'section'   => 'multicommerce-header-icons',
		'settings'  => 'multicommerce_theme_options[multicommerce-enable-wishlist-icon]',
		'type'	  	=> 'checkbox'
	) );
}