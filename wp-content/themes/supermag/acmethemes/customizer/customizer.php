<?php
/**
 * SuperMag Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage SuperMag
 */

/*
* file for upgrade to pro
*/
require_once supermag_file_directory('acmethemes/customizer/customizer-pro/class-customize.php');

/*
* file for customizer core functions
*/
require_once supermag_file_directory('acmethemes/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require_once supermag_file_directory('acmethemes/customizer/sanitize-functions.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function supermag_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = supermag_get_theme_options();

    /*defaults options*/
    $defaults = supermag_get_default_theme_options();

    /*
    * file for customizer custom controls classes
    */
	require_once supermag_file_directory('acmethemes/customizer/custom-controls.php');

    /*
     * file for feature panel of home page
     */
	require_once supermag_file_directory('acmethemes/customizer/feature-section/feature-panel.php');

    /*
    * file for header panel
    */
	require_once supermag_file_directory('acmethemes/customizer/header-options/header-panel.php');

    /*
    * file for customizer footer section
    */
	require_once supermag_file_directory('acmethemes/customizer/footer-section/footer-section.php');

    /*
    * file for design/layout panel
    */
	require_once supermag_file_directory('acmethemes/customizer/design-options/design-panel.php');

    /*
    * file for single post sections
    */
	require_once supermag_file_directory('acmethemes/customizer/single-posts/single-post-section.php');

	/*
   * file for design/layout panel
   */
	require_once supermag_file_directory('acmethemes/customizer/wc-options/wc-panel.php');

    /*
     * file for options panel
     */
	require_once supermag_file_directory('acmethemes/customizer/options/options-panel.php');

    /*
  * file for options reset
  */
	require_once supermag_file_directory('acmethemes/customizer/options/options-reset.php');

    /*removing*/
    $wp_customize->remove_panel('header_image');
    $wp_customize->remove_control('header_textcolor');

	/*sorting core and widget for ease of theme use*/
	$supermag_home_section = $wp_customize->get_section( 'sidebar-widgets-supermag-home' );
	if ( ! empty( $supermag_home_section ) ) {
		$supermag_home_section->panel = '';
		$supermag_home_section->title = __( 'Home Main Content Area ', 'supermag' );
		$supermag_home_section->priority = 80;
	}
}
add_action( 'customize_register', 'supermag_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function supermag_customize_preview_js() {
    wp_enqueue_script( 'supermag-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_preview_init', 'supermag_customize_preview_js' );

/**
 * Theme Update Script
 *
 * For backward compatibility
 */
function supermag_update_check() {

    global $wp_version;
    // Return if wp version less than 4.5
    if ( version_compare( $wp_version, '4.5', '<' ) ) {
        return;
    }
    $supermag_saved_theme_options = supermag_get_theme_options();
    $site_logo = '';
    if( isset( $supermag_saved_theme_options['supermag-header-logo'] )){
        $site_logo = esc_url( $supermag_saved_theme_options['supermag-header-logo'] );
    }
    if ( empty( $site_logo ) ) {
        return;
    }
    /*converting url into attachment ID*/
    $logo = attachment_url_to_postid( $site_logo );
    if ( is_int( $logo ) ) {
        set_theme_mod( 'custom_logo', attachment_url_to_postid( $site_logo ) );
        $supermag_saved_theme_options['supermag-header-logo'] = '';
        set_theme_mod( 'supermag_theme_options', $supermag_saved_theme_options );
    }
}
add_action( 'after_setup_theme', 'supermag_update_check' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function supermag_customize_controls_scripts() {
	wp_enqueue_script( 'supermag-customizer-controls', get_template_directory_uri() . '/acmethemes/core/js/customizer-controls.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'supermag_customize_controls_scripts' );