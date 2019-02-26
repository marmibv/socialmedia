<?php
add_action( 'tgmpa_register', 'multicommerce_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function multicommerce_register_required_plugins() {

	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
    // Include ThemeEgg Toolkit as recommended
    $plugins = array(

        array(
            'name'      => esc_html__('ThemeEgg ToolKit', 'multicommerce'),
            'slug'      => 'themeegg-toolkit',
            'required'  => false,
        ),

	    array(
		    'name'      => esc_html__('WooCommerce', 'multicommerce'),
		    'slug'      => 'woocommerce',
		    'required'  => false,
	    ),

	    array(
		    'name'      => esc_html__('YITH WooCommerce Wishlist', 'multicommerce'),
		    'slug'      => 'yith-woocommerce-wishlist',
		    'required'  => false,
	    ),

	    /*array(
		    'name'      => 'YITH WooCommerce Compare',
		    'slug'      => 'yith-woocommerce-compare',
		    'required'  => false,
	    ),*/

    );

	tgmpa( $plugins );

}