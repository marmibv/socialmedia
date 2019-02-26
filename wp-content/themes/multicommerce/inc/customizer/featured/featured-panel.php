<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'multicommerce-feature-panel', array(
    'priority'      => 40,
    'capability'    => 'edit_theme_options',
    'title'         => esc_html__( 'Featured Section', 'multicommerce' ),
    'description'	=> sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Main Section, Feature Right Section and  Category Menu Feature Left  .%1$s Note : Please go to %2$s Homepage Settings %3$s, Select "A static page" then "Front page" and "Posts page" to enable it', 'multicommerce' ), '<br />','<b><a class="te-customizer button button-primary" data-section="static_front_page"> ','</a></b>' ),
) );

/*
* file for feature left section
*/
require_once multicommerce_file_directory('inc/customizer/featured/featured-left-section.php');

/*
* file for feature right section
*/
require_once multicommerce_file_directory('inc/customizer/featured/featured-right-section.php');

/*
* file for special menu
*/
require_once multicommerce_file_directory('inc/customizer/featured/category-menu.php');

/*
* file for featured widget
*/
require_once multicommerce_file_directory('inc/customizer/featured/featured-widget.php');