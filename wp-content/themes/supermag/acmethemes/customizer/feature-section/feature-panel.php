<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'supermag-feature-panel', array(
    'priority'       => 70,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Section Options', 'supermag' ),
    'description'    => __( 'Customize your awesome site feature section ', 'supermag' )
) );

/*
* file for feature slider category
*/
require_once supermag_file_directory('acmethemes/customizer/feature-section/feature-category.php');

/*
* file for feature side
*/
require_once supermag_file_directory('acmethemes/customizer/feature-section/feature-side.php');

/*
* file for feature section enable
*/
require_once supermag_file_directory('acmethemes/customizer/feature-section/feature-enable.php');