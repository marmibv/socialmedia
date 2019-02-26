<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'multicommerce-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Sidebar Settings', 'multicommerce' ),
    'panel'          => 'multicommerce-options'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-single-sidebar-layout'],
    'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_sidebar_layout();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-single-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Default Sidebar Layout', 'multicommerce' ),
    'section'   => 'multicommerce-design-sidebar-layout-option',
    'settings'  => 'multicommerce_theme_options[multicommerce-single-sidebar-layout]',
    'type'	  	=> 'select'
) );

/*sticky sidebar enable disable*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['multicommerce-enable-sticky-sidebar'],
    'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-enable-sticky-sidebar]', array(
    'label'     => esc_html__( 'Enable Sticky Sidebar', 'multicommerce' ),
    'section'   => 'multicommerce-design-sidebar-layout-option',
    'settings'  => 'multicommerce_theme_options[multicommerce-enable-sticky-sidebar]',
    'type'      => 'checkbox'
) );