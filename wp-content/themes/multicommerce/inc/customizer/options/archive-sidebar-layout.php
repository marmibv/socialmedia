<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'multicommerce-archive-sidebar-layout', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Archive Settings', 'multicommerce' ),
    'panel'          => 'multicommerce-options'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-archive-sidebar-layout'],
    'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_sidebar_layout();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-archive-sidebar-layout]', array(
    'choices'  	    => $choices,
    'label'		    => esc_html__( 'Category/Archive Sidebar Layout', 'multicommerce' ),
    'description'   => esc_html__( 'Sidebar Layout for listing pages like category, author etc', 'multicommerce' ),
    'section'       => 'multicommerce-archive-sidebar-layout',
    'settings'      => 'multicommerce_theme_options[multicommerce-archive-sidebar-layout]',
    'type'	  	    => 'select'
) );