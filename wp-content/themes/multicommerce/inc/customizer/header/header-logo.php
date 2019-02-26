<?php

$multicommerce_header_title_tagline = $wp_customize->get_section( 'title_tagline' );
$multicommerce_header_title_tagline->panel = 'multicommerce-header-panel';
$multicommerce_header_title_tagline->title = esc_html__( 'Site Identity( Logo, Title & Tagline )', 'multicommerce' );
$multicommerce_header_title_tagline->priority = 30;

/*Site Logo*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-display-site-logo]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-display-site-logo'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-display-site-logo]', array(
	'label'		=> esc_html__( 'Display Logo', 'multicommerce' ),
	'section'   => 'title_tagline',
	'settings'  => 'multicommerce_theme_options[multicommerce-display-site-logo]',
	'type'	  	=> 'checkbox'
) );

/*Site Title*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-display-site-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-display-site-title'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-display-site-title]', array(
	'label'		=> esc_html__( 'Display Site Title', 'multicommerce' ),
	'section'   => 'title_tagline',
	'settings'  => 'multicommerce_theme_options[multicommerce-display-site-title]',
	'type'	  	=> 'checkbox'
) );

/*Site Tagline*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-display-site-tagline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-display-site-tagline'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-display-site-tagline]', array(
	'label'		=> esc_html__( 'Display Site Tagline', 'multicommerce' ),
	'section'   => 'title_tagline',
	'settings'  => 'multicommerce_theme_options[multicommerce-display-site-tagline]',
	'type'	  	=> 'checkbox'
) );