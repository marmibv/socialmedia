<?php
/*adding header options panel*/
$wp_customize->add_panel( 'multicommerce-footer-panel', array(
	'priority'       => 80,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Footer Settings', 'multicommerce' ),
) );
/*
* file for footer widgets
*/
require_once multicommerce_file_directory('inc/customizer/footer/footer-widgets.php');

/*
* file for footer bottom
*/
require_once multicommerce_file_directory('inc/customizer/footer/footer-bottom.php');