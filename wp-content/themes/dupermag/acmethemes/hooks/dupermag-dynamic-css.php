<?php
/**
 * Dynamic css
 *
 * @since Dupermag 1.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'dupermag_dynamic_css' ) ) :

    function dupermag_dynamic_css() {

        global $supermag_customizer_all_values;
        /*Color options */
        $supermag_primary_color = $supermag_customizer_all_values['supermag-primary-color'];

        $custom_css = '';

        /*background*/
        $custom_css .= "
           .widget-title span,
           .widget-title span:after,
           .header-main-menu .icon-menu.search-icon-menu,
           .menu-search-inner{
                background: {$supermag_primary_color};
            }
        ";
        wp_add_inline_style( 'supermag-style', $custom_css );

    }
endif;
add_action( 'wp_enqueue_scripts', 'dupermag_dynamic_css', 199 );