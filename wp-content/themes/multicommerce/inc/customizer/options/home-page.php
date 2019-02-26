<?php
/*sorting core and widget for ease of theme use*/
$multicommerce_homepage_settings = $wp_customize->get_section( 'static_front_page' );
if ( ! empty( $multicommerce_homepage_settings ) ) {
    $multicommerce_homepage_settings->panel = 'multicommerce-options';
    $multicommerce_homepage_settings->priority = 60;
}


/*Sidebar Layout*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-front-page-sidebar-layout'],
    'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_sidebar_layout();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-front-page-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Homepage Sidebar', 'multicommerce' ),
    'section'   => 'static_front_page',
    'settings'  => 'multicommerce_theme_options[multicommerce-front-page-sidebar-layout]',
    'type'	  	=> 'select'
) );

/*Show Hide Front Page Content*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-hide-front-page-content]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['multicommerce-hide-front-page-content'],
    'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );

$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-hide-front-page-content]', array(
    'label'     => esc_html__( 'Hide Blog Posts or Static Page on Front Page', 'multicommerce' ),
    'section'   => 'static_front_page',
    'settings'  => 'multicommerce_theme_options[multicommerce-hide-front-page-content]',
    'type'      => 'checkbox'
) );