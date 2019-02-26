<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'supermag-feature-side-category', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Slider Right Section', 'dupermag' ),
    'panel'          => 'supermag-feature-panel'
) );

/* feature cat selection */
$wp_customize->add_setting( 'supermag_theme_options[supermag-feature-side-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supermag-feature-side-cat'],
    'sanitize_callback' => 'supermag_sanitize_number'
) );

$wp_customize->add_control(
    new Supermag_Customize_Category_Dropdown_Control(
        $wp_customize,
        'supermag_theme_options[supermag-feature-side-cat]',
        array(
            'label'		=> __( 'Select Category', 'dupermag' ),
            'description'=> __( 'The four recent posts from the selected category will display', 'dupermag' ),
            'section'   => 'supermag-feature-side-category',
            'settings'  => 'supermag_theme_options[supermag-feature-side-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 5,
        )
    )
);
