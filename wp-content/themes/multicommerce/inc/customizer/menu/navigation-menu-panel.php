<?php
/*Menu Panel*/

/*sorting core and widget for ease of theme useChange Navigation Menu Label*/
$navigation_menus = $wp_customize->get_panel( 'nav_menus' );
if ( ! empty( $navigation_menus ) ) {
    $navigation_menus->title = esc_html__( 'All Menus', 'multicommerce' );
    $navigation_menus->priority = 10;
}