<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'multicommerce-design-blog-layout-option', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Blog Settings', 'multicommerce' ),
    'panel'          => 'multicommerce-options'
) );

/*blog layout*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-blog-archive-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-blog-archive-layout'],
    'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_blog_layout();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-blog-archive-layout]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Default Blog/Archive Layout', 'multicommerce' ),
    'description'=> esc_html__( 'Image display options', 'multicommerce' ),
    'section'   => 'multicommerce-design-blog-layout-option',
    'settings'  => 'multicommerce_theme_options[multicommerce-blog-archive-layout]',
    'type'	  	=> 'select'
) );

/*blog image size*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-blog-archive-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-blog-archive-img-size'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_get_image_sizes_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-blog-archive-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Image Layout Options', 'multicommerce' ),
	'section'   => 'multicommerce-design-blog-layout-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-blog-archive-img-size]',
	'type'	  	=> 'select',
) );

/*Read More Text*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-blog-archive-more-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-blog-archive-more-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-blog-archive-more-text]', array(
	'label'		=> esc_html__( 'Read More Text', 'multicommerce' ),
	'section'   => 'multicommerce-design-blog-layout-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-blog-archive-more-text]',
	'type'	  	=> 'text'
) );