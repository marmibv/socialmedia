<?php
/*sorting core and background Images*/
$multicommerce_home_content_area = $wp_customize->get_section( 'sidebar-widgets-multicommerce-home' );
if ( ! empty( $multicommerce_home_content_area ) ) {
    $multicommerce_home_content_area->panel = 'multicommerce-options';
    $multicommerce_home_content_area->priority = 15;
}