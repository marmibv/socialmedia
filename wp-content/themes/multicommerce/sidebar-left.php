<?php
/**
 * The left sidebar containing the main widget area.
 */
$multicommerce_left_sidebar = 'multicommerce-left-sidebar';
if(multicommerce_is_woocommerce_active()){
	if(is_woocommerce() || is_cart() || is_checkout() ){
		$multicommerce_left_sidebar = 'multicommerce-product-left-sidebar';
	}
}

if ( ! is_active_sidebar( $multicommerce_left_sidebar ) ) {
    return;
}
$sidebar_layout = multicommerce_sidebar_selection();
if( $sidebar_layout == "left-sidebar" || $sidebar_layout == "both-sidebar"): 
	?>
    <div id="secondary-left" class="widget-area sidebar secondary-sidebar sidebar-left" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
            <?php 
            multicommerce_customizer_shortcut_edit('sidebar-widgets-'.$multicommerce_left_sidebar);
            dynamic_sidebar( $multicommerce_left_sidebar );
            ?>
        </div>
    </div>
	<?php
endif;