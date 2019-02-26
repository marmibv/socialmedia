<?php

/**
 * MultiCommerce Sidebars
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_action_sidebars' ) ) :

	function multicommerce_action_sidebars() {
		
		get_sidebar( 'left' );
		get_sidebar();

	}

endif;

add_action( 'multicommerce_action_sidebars', 'multicommerce_action_sidebars', 10 );