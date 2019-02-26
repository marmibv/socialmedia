<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'multicommerce-search', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Search', 'multicommerce' ),
    'panel'          => 'multicommerce-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-search-placeholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-search-placeholder]', array(
    'label'		=> esc_html__( 'Search Placeholder', 'multicommerce' ),
    'section'   => 'multicommerce-search',
    'settings'  => 'multicommerce_theme_options[multicommerce-search-placeholder]',
    'type'	  	=> 'text'
) );