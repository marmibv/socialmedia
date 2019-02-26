<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since MultiCommerce 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */

if( !function_exists('multicommerce_file_directory') ){

    function multicommerce_file_directory( $file_path ){
        $child_theme_path = wp_normalize_path(trailingslashit( get_stylesheet_directory() ) . $file_path);
    	$parent_theme_path = wp_normalize_path(trailingslashit( get_template_directory() ) . $file_path);
        if( file_exists( $child_theme_path ) ){
            return $child_theme_path;
        }else{
            return $parent_theme_path;
        }
    }
}

/**
 * Check empty or null
 *
 * @since MultiCommerce 1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('multicommerce_is_null_or_empty') ){
	function multicommerce_is_null_or_empty( $str ){
		return ( !isset($str) || trim($str)==='' );
	}
}

/*file for library*/
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
	require_once multicommerce_file_directory('inc/library/tgm/class-tgm-plugin-activation.php');
}

/*
* file for customizer core functions
*/
require_once multicommerce_file_directory('inc/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require_once multicommerce_file_directory('inc/customizer/sanitize-functions.php');

if ( is_customize_preview() ) {
    /*
    * file for customizer theme options
    */
    require_once multicommerce_file_directory('inc/customizer/customizer.php');
}
/*
* file for additional functions files
*/
require_once multicommerce_file_directory('inc/functions.php');

require_once multicommerce_file_directory('inc/functions/header.php');

/*woocommerce*/
require_once multicommerce_file_directory('inc/woocommerce/functions-woocommerce.php');

require_once multicommerce_file_directory('inc/woocommerce/class-woocommerce.php');

/**
 * create hooks-init file and include all hooks related file there
 * @since 1.0.2
**/
require_once multicommerce_file_directory('inc/hooks/hooks-init.php');


require_once multicommerce_file_directory('inc/widgets/sidebar.php');

/*
* file for core functions imported from functions.php while downloading Underscores
*/
require_once multicommerce_file_directory('inc/core.php');

/**
 * Implement Custom Metaboxes
 */
require_once multicommerce_file_directory('inc/metabox/metabox.php');
