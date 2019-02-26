<?php

if(!function_exists('multicommerce_single_show_related_post')):

    function multicommerce_single_show_related_post(){

        global $multicommerce_customizer_all_values;
        if( $multicommerce_customizer_all_values['multicommerce-show-related'] ){
            return true;
        }else{
            return false;
        }

    }

endif;

/*adding sections for Single post options*/
$wp_customize->add_section( 'multicommerce-single-post', array(
    'priority'      => 100,
    'capability'    => 'edit_theme_options',
    'panel'         => 'multicommerce-options',
    'title'         => esc_html__( 'Single Post Settings', 'multicommerce' )
) );

/*single image size*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-single-img-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-single-img-size'],
    'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_get_image_sizes_options(1);
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-single-img-size]', array(
    'choices'  	=> $choices,
    'priority'      => 20,
    'label'		=> esc_html__( 'Featured image size', 'multicommerce' ),
    'section'   => 'multicommerce-single-post',
    'settings'  => 'multicommerce_theme_options[multicommerce-single-img-size]',
    'type'	  	=> 'select',
) );

/*show related posts*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-show-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-show-related'],
    'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-show-related]', array(
    'label'		=> esc_html__( 'Show Related Posts In Single Post', 'multicommerce' ),
    'section'   => 'multicommerce-single-post',
    'settings'  => 'multicommerce_theme_options[multicommerce-show-related]',
    'type'	  	=> 'checkbox',
    'priority'      => 30,
) );

/*Related title*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-related-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-related-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-related-title]', array(
	'label'		=> esc_html__( 'Related Posts title', 'multicommerce' ),
	'section'   => 'multicommerce-single-post',
	'settings'  => 'multicommerce_theme_options[multicommerce-related-title]',
	'type'	  	=> 'text',
    'priority'      => 40,
    'active_callback' => 'multicommerce_single_show_related_post',
) );

/*related post by tag or category*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-related-post-display-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-related-post-display-from'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_related_post_display_from();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-related-post-display-from]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Related Post Display From Options', 'multicommerce' ),
	'section'   => 'multicommerce-single-post',
	'settings'  => 'multicommerce_theme_options[multicommerce-related-post-display-from]',
	'type'	  	=> 'select',
    'priority'      => 50,
    'active_callback' => 'multicommerce_single_show_related_post',
) );