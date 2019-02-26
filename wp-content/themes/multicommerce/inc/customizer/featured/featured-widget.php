<?php
/*sorting core and widget for ease of theme use*/
$multicommerce_before_featured_section = $wp_customize->get_section( 'sidebar-widgets-multicommerce-before-feature' );
if ( ! empty( $multicommerce_before_featured_section ) ) {
    $multicommerce_before_featured_section->panel = 'multicommerce-feature-panel';
    $multicommerce_before_featured_section->priority = 10;
}
