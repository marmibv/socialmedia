<?php
/**
 * Excerpt length 90 return
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('multicommerce_alter_excerpt') ) :
    function multicommerce_alter_excerpt( $length ){
		if( is_admin() ){
			return $length;
		}
        return 90;
    }
endif;

add_filter('excerpt_length', 'multicommerce_alter_excerpt');

/**
 * Add ... for more view
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('multicommerce_excerpt_more') ) :
    function multicommerce_excerpt_more( $more ) {
		if( is_admin() ){
			return $more;
		}
        return '&hellip;';
    }
endif;
add_filter('excerpt_more', 'multicommerce_excerpt_more');

//Disable Images Src Set
add_filter( 'wp_calculate_image_sizes', '__return_false');
// Override the calculated image sources
add_filter( 'wp_calculate_image_srcset', '__return_false');