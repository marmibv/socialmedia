<?php
/*sorting core and background Images*/
$multicommerce_homepage_settings = $wp_customize->get_section( 'background_image' );
if ( ! empty( $multicommerce_homepage_settings ) ) {
    $multicommerce_homepage_settings->panel = 'multicommerce-options';
    $multicommerce_homepage_settings->priority = 10;
}