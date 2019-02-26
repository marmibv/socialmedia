<?php
/*sorting core and widget for ease of theme use*/
$multicommerce_header_sidebar_section = $wp_customize->get_section( 'sidebar-widgets-multicommerce-header' );
if ( ! empty( $multicommerce_header_sidebar_section ) ) {
    $multicommerce_header_sidebar_section->panel = 'multicommerce-header-panel';
    //$multicommerce_header_sidebar_section->title = esc_html__( 'Header Search or Ads', 'multicommerce' );
    $multicommerce_header_sidebar_section->priority = 40;
}
