<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'supermag-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'supermag' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'supermag' )
) );

/*
* file for front page
*/
require_once supermag_file_directory('acmethemes/customizer/options/front-page.php');

/*
* file for header breadcrumb options
*/
require_once supermag_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require_once supermag_file_directory('acmethemes/customizer/options/search.php');