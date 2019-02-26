<?php
/**
 * Select sidebar according to the options saved
 *
 * @since SuperMag 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('supermag_sidebar_selection') ) :
	function supermag_sidebar_selection( ) {
		wp_reset_postdata();
		$supermag_customizer_all_values = supermag_get_theme_options();
		global $post;
		if(
			isset( $supermag_customizer_all_values['supermag-sidebar-layout'] ) &&
			(
				'left-sidebar' == $supermag_customizer_all_values['supermag-sidebar-layout'] ||
				'both-sidebar' == $supermag_customizer_all_values['supermag-sidebar-layout'] ||
				'middle-col' == $supermag_customizer_all_values['supermag-sidebar-layout'] ||
				'no-sidebar' == $supermag_customizer_all_values['supermag-sidebar-layout']
			)
		){
			$supermag_body_global_class = $supermag_customizer_all_values['supermag-sidebar-layout'];
		}
		else{
			$supermag_body_global_class= 'right-sidebar';
		}

		if ( supermag_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'supermag_sidebar_layout', true );
				$supermag_wc_single_product_sidebar_layout = $supermag_customizer_all_values['supermag-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$supermag_body_classes = $post_class;
					} else {
						$supermag_body_classes = $supermag_wc_single_product_sidebar_layout;
					}
				}
				else{
					$supermag_body_classes = $supermag_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $supermag_customizer_all_values['supermag-wc-shop-archive-sidebar-layout'] ) ){
					$supermag_archive_sidebar_layout = $supermag_customizer_all_values['supermag-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $supermag_archive_sidebar_layout ||
						'left-sidebar' == $supermag_archive_sidebar_layout ||
						'both-sidebar' == $supermag_archive_sidebar_layout ||
						'middle-col' == $supermag_archive_sidebar_layout ||
						'no-sidebar' == $supermag_archive_sidebar_layout
					){
						$supermag_body_classes = $supermag_archive_sidebar_layout;
					}
					else{
						$supermag_body_classes = $supermag_body_global_class;
					}
				}
				else{
					$supermag_body_classes= $supermag_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $supermag_customizer_all_values['supermag-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $supermag_customizer_all_values['supermag-front-page-sidebar-layout'] ||
					'left-sidebar' == $supermag_customizer_all_values['supermag-front-page-sidebar-layout'] ||
					'both-sidebar' == $supermag_customizer_all_values['supermag-front-page-sidebar-layout'] ||
					'middle-col' == $supermag_customizer_all_values['supermag-front-page-sidebar-layout'] ||
					'no-sidebar' == $supermag_customizer_all_values['supermag-front-page-sidebar-layout']
				){
					$supermag_body_classes = $supermag_customizer_all_values['supermag-front-page-sidebar-layout'];
				}
				else{
					$supermag_body_classes = $supermag_body_global_class;
				}
			}
			else{
				$supermag_body_classes= $supermag_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'supermag_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$supermag_body_classes = $post_class;
				} else {
					$supermag_body_classes = $supermag_body_global_class;
				}
			}
			else{
				$supermag_body_classes = $supermag_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $supermag_customizer_all_values['supermag-archive-sidebar-layout'] ) ){
				$supermag_archive_sidebar_layout = $supermag_customizer_all_values['supermag-archive-sidebar-layout'];
				if(
					'right-sidebar' == $supermag_archive_sidebar_layout ||
					'left-sidebar' == $supermag_archive_sidebar_layout ||
					'both-sidebar' == $supermag_archive_sidebar_layout ||
					'middle-col' == $supermag_archive_sidebar_layout ||
					'no-sidebar' == $supermag_archive_sidebar_layout
				){
					$supermag_body_classes = $supermag_archive_sidebar_layout;
				}
				else{
					$supermag_body_classes = $supermag_body_global_class;
				}
			}
			else{
				$supermag_body_classes= $supermag_body_global_class;
			}
		}
		else {
			$supermag_body_classes = $supermag_body_global_class;
		}
		return $supermag_body_classes;
	}
endif;