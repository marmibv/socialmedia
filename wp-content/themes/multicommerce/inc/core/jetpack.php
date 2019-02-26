<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
if ( ! function_exists( 'multicommerce_jetpack_setup' ) ) :
	function multicommerce_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'multicommerce_infinite_scroll_render',
			'footer'    => 'page',
		) );
	} // end function multicommerce_jetpack_setup
endif;
add_action( 'after_setup_theme', 'multicommerce_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
if ( ! function_exists( 'multicommerce_infinite_scroll_render' ) ) :
	function multicommerce_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	} // end function multicommerce_infinite_scroll_render
endif;