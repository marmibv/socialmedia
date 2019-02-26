<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
$multicommerce_right_sidebar = 'multicommerce-sidebar';
if(multicommerce_is_woocommerce_active()){
	if(is_woocommerce() || is_cart() || is_checkout() ){
		$multicommerce_right_sidebar = 'multicommerce-product-right-sidebar';
	}
}
if ( ! is_active_sidebar( $multicommerce_right_sidebar ) ) {
	return;
}
$sidebar_layout = multicommerce_sidebar_selection();
if( $sidebar_layout == "right-sidebar" || empty( $sidebar_layout ) || $sidebar_layout == "both-sidebar" ) : ?>
	<div id="secondary-right" class="widget-area sidebar secondary-sidebar sidebar-right" role="complementary">
		<div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php 
			multicommerce_customizer_shortcut_edit( 'sidebar-widgets-'.$multicommerce_right_sidebar, false, 'section' );
			dynamic_sidebar( $multicommerce_right_sidebar );
			?>
		</div>
	</div>
	<?php 
endif;