<?php
/*adding sections for header news options*/
$multicommerce_header_image = $wp_customize->get_section( 'header_image' );
$multicommerce_header_image->panel = 'multicommerce-header-panel';
$multicommerce_header_image->priority = 60;

/*header media position options*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-media-position]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-header-media-position'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_header_media_position();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-media-position]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Header Media Position', 'multicommerce' ),
	'section'   => 'header_image',
	'settings'  => 'multicommerce_theme_options[multicommerce-header-media-position]',
	'type'	  	=> 'radio'
) );

/*header ad img link*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-image-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-header-image-link'],
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-image-link]', array(
	'label'		=> esc_html__( 'Header Image Link', 'multicommerce' ),
	'description'=> esc_html__( 'Left empty for no link', 'multicommerce' ),
	'section'   => 'header_image',
	'settings'  => 'multicommerce_theme_options[multicommerce-header-image-link]',
	'type'	  	=> 'url'
) );

/*header image in new tab*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-image-link-new-tab]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-header-image-link-new-tab'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-image-link-new-tab]', array(
	'label'		=> esc_html__( 'Check to Open New Tab Header Image Link', 'multicommerce' ),
	'section'   => 'header_image',
	'settings'  => 'multicommerce_theme_options[multicommerce-header-image-link-new-tab]',
	'type'	  	=> 'checkbox'
) );