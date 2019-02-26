<?php

/**
 * SuperMag functions.
 * @package SuperMag
 * @since 2.0.0
 */

/**
 * check if WooCommerce activated
 */
function supermag_is_woocommerce_active() {
	return class_exists( 'WooCommerce' ) ? true : false;
}
add_action( 'init', 'supermag_remove_wc_breadcrumbs' );
function supermag_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}


/**
 * Woo Commerce Number of row filter Function
 */
if (!function_exists('supermag_loop_columns')) {
	function supermag_loop_columns() {
		$supermag_customizer_all_values = supermag_get_theme_options();
		$supermag_wc_product_column_number = $supermag_customizer_all_values['supermag-wc-product-column-number'];
		if ($supermag_wc_product_column_number) {
			$column_number = $supermag_wc_product_column_number;
		}
		else {
			$column_number = 3;
		}
		return $column_number;
	}
}
add_filter('loop_shop_columns', 'supermag_loop_columns');

function supermag_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$supermag_customizer_all_values = supermag_get_theme_options();
	$supermag_wc_product_total_number = $supermag_customizer_all_values['supermag-wc-shop-archive-total-product'];
	if ($supermag_wc_product_total_number) {
		$cols = $supermag_wc_product_total_number;
	}
	return $cols;
}
add_filter( 'loop_shop_per_page', 'supermag_loop_shop_per_page', 20 );