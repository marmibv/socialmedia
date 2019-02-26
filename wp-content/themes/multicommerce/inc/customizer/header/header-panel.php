<?php
/*adding header options panel*/
$wp_customize->add_panel( 'multicommerce-header-panel', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Header Settings', 'multicommerce' ),
) );
/*
* file for header top options
*/
require_once multicommerce_file_directory('inc/customizer/header/header-top.php');

/*
* file for basic info
*/
require_once multicommerce_file_directory('inc/customizer/header/basic-info.php');


/*
* file for header logo options
*/
require_once multicommerce_file_directory('inc/customizer/header/header-logo.php');

/*
* file for site identity options
*/
require_once multicommerce_file_directory('inc/customizer/header/site-identity-placement.php');

/*
* file for header media display option
*/
require_once multicommerce_file_directory('inc/customizer/header/header-media.php');

/*
* file for header main
*/
require_once multicommerce_file_directory('inc/customizer/header/header-main.php');

/*
* file for header icons
*/
if( multicommerce_is_woocommerce_active() ){
	require_once multicommerce_file_directory('inc/customizer/header/header-icons.php');
}

/*
* Category Menu
*/
require_once multicommerce_file_directory('inc/customizer/header/category-menu.php');

/*
* Sticky Menu
*/
require_once multicommerce_file_directory('inc/customizer/header/sticky-menu.php');

/*
* Menu Right
*/
require_once multicommerce_file_directory('inc/customizer/header/menu-right.php');