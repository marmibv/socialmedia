<?php
$multicommerce_sidebar_panel = $wp_customize->get_panel( 'widgets' );
if ( ! empty( $multicommerce_sidebar_panel ) ) {
    $multicommerce_sidebar_panel->title = esc_html__( 'Sidebar area', 'multicommerce' );
    $multicommerce_sidebar_panel->priority = 40;
}