<?php
/*Category Menu Section*/
$wp_customize->add_section( 'multicommerce-category-menu', array(
	'priority'       => 80,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Category Menu Options', 'multicommerce' ),
	'panel'          => 'multicommerce-header-panel',
) );

/*special menu*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-enable-category-menu]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-enable-category-menu'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$description = sprintf( esc_html__( 'This menu display vertically at the left side of Primary Menu. Add Category Menu from %1$s here%2$s ', 'multicommerce' ), '<a class="te-customizer" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-enable-category-menu]', array(
	'label'		=> esc_html__( 'Enable Category Menu', 'multicommerce' ),
	'description'=> $description,
	'section'   => 'multicommerce-category-menu',
	'settings'  => 'multicommerce_theme_options[multicommerce-enable-category-menu]',
	'type'	  	=> 'checkbox',
) );

/*Category Menu Text*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-category-menu-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-category-menu-text'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-category-menu-text]', array(
	'label'		=> esc_html__( 'Category Menu Text', 'multicommerce' ),
	'section'   => 'multicommerce-category-menu',
	'settings'  => 'multicommerce_theme_options[multicommerce-category-menu-text]',
	'type'	  	=> 'text'
) );