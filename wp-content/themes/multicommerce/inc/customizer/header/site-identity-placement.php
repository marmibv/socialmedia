<?php



/*adding sections for site identity */
$wp_customize->add_section( 'multicommerce-site-identity-placement', array(
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Placement', 'multicommerce' ),
    'panel'          => 'multicommerce-header-panel'
) );

/*header site identity position*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-logo-ads-display-position]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-header-logo-ads-display-position'],
    'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_header_logo_menu_display_position();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-logo-ads-display-position]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Logo and Advertisement Position', 'multicommerce' ),
    'section'   => 'multicommerce-site-identity-placement',
    'settings'  => 'multicommerce_theme_options[multicommerce-header-logo-ads-display-position]',
    'type'	  	=> 'select'
) );