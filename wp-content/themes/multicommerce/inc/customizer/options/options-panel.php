<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'multicommerce-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Theme Options', 'multicommerce' ),
    'description'    => esc_html__( 'Customize your awesome site with theme options ', 'multicommerce' )
) );

/*
* file for Homepage Settings
*/
require_once multicommerce_file_directory('inc/customizer/options/home-page.php');

/*
* file for social options
*/
require_once multicommerce_file_directory('inc/customizer/options/social-options.php');

/*
* file for header breadcrumb options
*/
require_once multicommerce_file_directory('inc/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require_once multicommerce_file_directory('inc/customizer/options/search.php');

/*
* file for sidebar layout
*/
require_once multicommerce_file_directory('inc/customizer/options/sidebar-layout.php');


/*
* file for front archive sidebar layout options
*/
require_once multicommerce_file_directory('inc/customizer/options/archive-sidebar-layout.php');

/*
* Category color options
*/
require_once multicommerce_file_directory('inc/customizer/options/colors-cats.php');

/*
* file for blog layout
*/
require_once multicommerce_file_directory('inc/customizer/options/blog-layout.php');

/*
* file for color options
*/
require_once multicommerce_file_directory('inc/customizer/options/colors-options.php');

/*
* file for single Page
*/
require_once multicommerce_file_directory('inc/customizer/options/single-post.php');

/*
* file for Bacground Image
*/
require_once multicommerce_file_directory('inc/customizer/options/background-image.php');

/*
* file for Bacground Image
*/
require_once multicommerce_file_directory('inc/customizer/options/homecontent-area.php');