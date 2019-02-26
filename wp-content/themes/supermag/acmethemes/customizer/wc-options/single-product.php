<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'supermag-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'supermag' ),
	'panel'          => 'supermag-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['supermag-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'supermag_sanitize_select'
) );
$choices = supermag_sidebar_layout();
$wp_customize->add_control( 'supermag_theme_options[supermag-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'supermag' ),
	'section'   => 'supermag-wc-single-product-options',
	'settings'  => 'supermag_theme_options[supermag-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );