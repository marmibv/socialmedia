<?php
/**
 * DuperMag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AcmeThemes
 * @subpackage DuperMag
 */

if ( !function_exists('dupermag_setup') ) :
    function dupermag_setup(){
        load_child_theme_textdomain( 'dupermag', get_stylesheet_directory() . '/languages' );
    }
endif;

add_action( 'after_setup_theme', 'dupermag_setup' );

/**
 * Blog layout options
 *
 * @since Dupermag 1.0.1
 *
 * @param null
 * @return array $supermag_blog_layout
 *
 */
if ( !function_exists('supermag_blog_layout') ) :
    function supermag_blog_layout() {
        $supermag_blog_layout =  array(
            'left-image' => __( 'Full Image', 'dupermag' ),
            'no-image' => __( 'No Image', 'dupermag' )
        );
        return apply_filters( 'supermag_blog_layout', $supermag_blog_layout );
    }
endif;


function dupermag_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'supermag-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );

      /*theme custom js*/
    wp_enqueue_script('dupermag-custom', get_stylesheet_directory_uri() . '/assets/js/dupermag-custom.js', array('jquery'), '1.1.3', 1);

}
add_action( 'wp_enqueue_scripts', 'dupermag_enqueue_styles' );

/**
 * require int.
 */
$dupermag_file_directory_init_file_path = trailingslashit( get_stylesheet_directory() ).'acmethemes/dupermag-init.php';
require $dupermag_file_directory_init_file_path;