<?php
/**
 * MultiCommerce Theme Customizer.
 *
 * @since MultiCommerce 1.0.0
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function multicommerce_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = multicommerce_get_theme_options();

    /*defaults options*/
    $defaults = multicommerce_get_default_theme_options();

    do_action( 'multicommerce_customize_register_start', $wp_customize, $options, $defaults );

    /*
    * file for customizer custom controls classes
    */
    require_once multicommerce_file_directory('inc/customizer/custom-controls.php');
	require_once multicommerce_file_directory('inc/customizer/repeater/customizer-control-repeater.php');

    /*
     * file for feature panel of home page
     */
	require_once multicommerce_file_directory('inc/customizer/featured/featured-panel.php');

	/*
	* file for options
	*/
	require_once multicommerce_file_directory('inc/customizer/header/header-panel.php');

	/*
    * file for menu settings panel
    */
	require_once multicommerce_file_directory('inc/customizer/menu/navigation-menu-panel.php');

    /*
    * file for customizer footer panel
    */
	require_once multicommerce_file_directory('inc/customizer/footer/footer-panel.php');


    /*
     * file for options panel
     */
	require_once multicommerce_file_directory('inc/customizer/options/options-panel.php');

    /*
  * file for options reset
  */
	require_once multicommerce_file_directory('inc/customizer/options/options-reset.php');

	/*
  * file for options reset
  */
	require_once multicommerce_file_directory('inc/customizer/sidebar/sidebar-panel.php');

	/*woocommerce options*/
	if ( multicommerce_is_woocommerce_active() ) :
		require_once multicommerce_file_directory('inc/customizer/wc-settings/wc-panel.php');
	endif;
	
	do_action( 'multicommerce_customize_register_end', $wp_customize, $options, $defaults );

}
add_action( 'customize_register', 'multicommerce_customize_register' );

/**
 * Add Customizer Javascript
 */
function multicommerce_customizer_scripts() {
    wp_enqueue_script( 'multicommerce-customizer', get_template_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), '1.0.3', true );
}
add_action('customize_controls_enqueue_scripts', 'multicommerce_customizer_scripts');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function multicommerce_customize_preview_js() {
    wp_enqueue_script( 'multicommerce-userexperience', get_template_directory_uri() . '/assets/js/user-experience.min.js', array( 'customize-preview' ), '1.0.3', true );
}
add_action( 'customize_preview_init', 'multicommerce_customize_preview_js' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function multicommerce_customize_controls_scripts() {
	/*Font-Awesome-master*/
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );
}
add_action( 'customize_controls_enqueue_scripts', 'multicommerce_customize_controls_scripts' );