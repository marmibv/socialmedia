<?php
/**
 * MultiCommerce functions.
 * @package MultiCommerce
 * @since 1.0.0
 */

/**
 * check if WooCommerce activated
 */
function multicommerce_is_woocommerce_active() {
	return class_exists( 'WooCommerce' ) ? true : false;
}

/**
 * Checks if the current page is a product archive
 * @return boolean
 */
function multicommerce_is_product_archive() {
	if ( multicommerce_is_woocommerce_active() ) {
		if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

add_action( 'init', 'multicommerce_remove_wc_breadcrumbs' );
function multicommerce_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}

/**
 * Woo Commerce Number of row filter Function
 */
if (!function_exists('multicommerce_loop_columns')) {
	function multicommerce_loop_columns() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		$multicommerce_wc_product_column_number = $multicommerce_customizer_all_values['multicommerce-wc-product-column-number'];
		if ($multicommerce_wc_product_column_number) {
			$column_number = $multicommerce_wc_product_column_number;
		}
		else {
			$column_number = 3;
		}
		return $column_number;
	}
}
add_filter('loop_shop_columns', 'multicommerce_loop_columns');

if (!function_exists('multicommerce_wc_body_class')) {
	function multicommerce_wc_body_class($class) {
		$class[] = 'columns-' . esc_attr( multicommerce_loop_columns() );
		return $class;
	}
}
add_action('body_class', 'multicommerce_wc_body_class');

function multicommerce_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$multicommerce_customizer_all_values = multicommerce_get_theme_options();
	$multicommerce_wc_product_total_number = $multicommerce_customizer_all_values['multicommerce-wc-shop-archive-total-product'];
	if ($multicommerce_wc_product_total_number) {
		$cols = $multicommerce_wc_product_total_number;
	}
	return $cols;
}
add_filter( 'multicommerce_filter_products_per_page', 'multicommerce_loop_shop_per_page', 20 );

/*Related
https://docs.woocommerce.com/document/change-number-of-related-products-output/*/
function multicommerce_related_products_args( $args ) {
	$number= multicommerce_loop_columns();
	$args['posts_per_page'] = $number; // 4 related products
	$args['columns'] = $number; // arranged in 2 columns
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'multicommerce_related_products_args' );

/*https://gist.github.com/mikejolley/2044109*/
add_filter( 'woocommerce_add_to_cart_fragments', 'multicommerce_header_add_to_cart_fragment' );
function multicommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="cart-value cart-customlocation"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
	<?php
	$fragments['span.cart-customlocation'] = ob_get_clean();
	return $fragments;
}