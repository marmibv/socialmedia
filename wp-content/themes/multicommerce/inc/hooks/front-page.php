<?php
/**
 * Before main content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_featured_slider' ) ) :

	function multicommerce_featured_slider() {

		if( is_front_page() && !is_home() ) {
			
			/*Slider Feature Section*/
			/**
			 * multicommerce_featured_slider
			 * @since MultiCommerce 1.0.0
			 *
			 * @hooked multicommerce_feature_slider -  0
			 */
			do_action('multicommerce_featured_slider');

		}
		
	}

endif;

add_action( 'multicommerce_action_front_page', 'multicommerce_featured_slider', 10 );

/**
 * Front page hook for all WordPress Conditions
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_front_page' ) ) :

    function multicommerce_front_page() {

	    $multicommerce_customizer_all_values = multicommerce_get_theme_options();
	    $multicommerce_hide_front_page_content = $multicommerce_customizer_all_values['multicommerce-hide-front-page-content'];

	    /*show widget in front page, user are not force to use front page*/
	    if( is_active_sidebar( 'multicommerce-home' ) && !is_home() ){
		    dynamic_sidebar( 'multicommerce-home' );
	    }

	    if ( 'posts' == get_option( 'show_on_front' ) ) {
		    do_action('multicommerce_action_index_page');
	    }else{
		    if( 1 != $multicommerce_hide_front_page_content ){
		    	?>
		    	<div class="inner-content">
		    		<?php do_action('multicommerce_action_default_page'); ?>
		    	</div>
		    	<?php
		    }
	    }

    }
endif;

add_action( 'multicommerce_action_front_page', 'multicommerce_front_page', 20 );