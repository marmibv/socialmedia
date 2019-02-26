<?php

/*====================================================================
----------------- Full width top footer widget area -----------------
====================================================================*/

$multicommerce_full_width_top_footer_section = $wp_customize->get_section( 'sidebar-widgets-full-width-top-footer' );
if ( ! empty( $multicommerce_full_width_top_footer_section ) ) {
    $multicommerce_full_width_top_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_full_width_top_footer_section->priority = 10;
}

/*====================================================================
----------------------- Top Footer Widgets area -----------------------
====================================================================*/
/*
Top col one footer widget
*/
$multicommerce_top_col_one_footer_section = $wp_customize->get_section( 'sidebar-widgets-footer-top-col-one' );
if ( ! empty( $multicommerce_top_col_one_footer_section ) ) {
    $multicommerce_top_col_one_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_top_col_one_footer_section->priority = 10;
}

/*
Top col two footer widget
*/
$multicommerce_top_col_two_footer_section = $wp_customize->get_section( 'sidebar-widgets-footer-top-col-two' );
if ( ! empty( $multicommerce_top_col_two_footer_section ) ) {
    $multicommerce_top_col_two_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_top_col_two_footer_section->priority = 10;
}

/*
Top col three footer widget
*/
$multicommerce_top_col_three_footer_section = $wp_customize->get_section( 'sidebar-widgets-footer-top-col-three' );
if ( ! empty( $multicommerce_top_col_three_footer_section ) ) {
    $multicommerce_top_col_three_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_top_col_three_footer_section->priority = 10;
}

/*
Top col four footer widget
*/
$multicommerce_top_col_four_footer_section = $wp_customize->get_section( 'sidebar-widgets-footer-top-col-four' );
if ( ! empty( $multicommerce_top_col_four_footer_section ) ) {
    $multicommerce_top_col_four_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_top_col_four_footer_section->priority = 10;
}


/*====================================================================
--------------------- Bottom Footer Widgets area ---------------------
====================================================================*/
/*
bottom col one footer widget
*/
$multicommerce_bottom_col_one_footer_section = $wp_customize->get_section( 'sidebar-widgets-footer-bottom-col-one' );
if( ! empty( $multicommerce_bottom_col_one_footer_section ) ){
    $multicommerce_bottom_col_one_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_bottom_col_one_footer_section->priority = 10;
}

/*
bottom col two footer widget
*/
$multicommerce_bottom_col_two_footer_section = $wp_customize->get_section( 'sidebar-widgets-footer-bottom-col-two' );
if( ! empty( $multicommerce_bottom_col_two_footer_section ) ){
    $multicommerce_bottom_col_two_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_bottom_col_two_footer_section->priority = 10;
}

/*====================================================================
------------------ Bottom Left Footer Widgets Area ------------------
====================================================================*/
/*
bottom left footer widget
*/
$multicommerce_bottom_left_area_footer_section = $wp_customize->get_section( 'sidebar-widgets-footer-bottom-left-area' );
if( ! empty( $multicommerce_bottom_left_area_footer_section ) ){
    $multicommerce_bottom_left_area_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_bottom_left_area_footer_section->priority = 10;
}

/*====================================================================
---------------- Bottom Full Width Footer Widgets Area ----------------
====================================================================*/
/*
bottom full width footer widget
*/
$multicommerce_bottom_full_width_footer_section = $wp_customize->get_section( 'sidebar-widgets-full-width-bottom-footer' );
if( ! empty( $multicommerce_bottom_full_width_footer_section ) ){
    $multicommerce_bottom_full_width_footer_section->panel = 'multicommerce-footer-panel';
    $multicommerce_bottom_full_width_footer_section->priority = 10;
}

