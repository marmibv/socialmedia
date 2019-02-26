<?php
/**
 * Dynamic css
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_dynamic_css' ) ) :

    function multicommerce_dynamic_css() {

        global $multicommerce_customizer_all_values;
        /*Color options */
        $multicommerce_primary_color = esc_attr( $multicommerce_customizer_all_values['multicommerce-primary-color'] );
        $multicommerce_secondary_color = esc_attr( $multicommerce_customizer_all_values['multicommerce-secondary-color'] );
        /*===============================================================================
        ---------------------------------- Primary Color --------------------------------
        ================================================================================*/

        $custom_css = '';
        /*background*/
        $custom_css .= "
            .primary,
            .no-image-widgets,
            .cte-links a:hover,
            .slider-buttons a::before,
            .cart-section .cart-value, 
            .cart-section .wishlist-value,
            .advance-product-search .searchsubmit,
            .single-item .icon,
            .woocommerce ul.products li.product:hover .onsale,
            .wc-cte-feature .cte-title span,
            .featured-social .icon-box:hover,
            .woocommerce #respond input#submit.alt:hover, 
            .woocommerce .cart .button:hover, 
            .woocommerce .cart input.button:hover, 
            .woocommerce .widget_shopping_cart_content .buttons a.button:hover, 
            .woocommerce a.added_to_cart:hover, 
            .woocommerce a.button.add_to_cart_button:hover, 
            .woocommerce a.button.alt:hover, 
            .woocommerce a.button.product_type_external:hover, 
            .woocommerce a.button.product_type_grouped:hover, 
            .woocommerce button.button.alt:hover, 
            .woocommerce input.button.alt:hover,
            .comment-form .form-submit input,
            .select2-container--default .select2-results__option[aria-selected=\"true\"],
            .select2-container--default .select2-results__option--highlighted[aria-selected],
            .read-more::after,
            .woocommerce #respond input#submit.alt::before, 
            .woocommerce a.button.alt::before, 
            .woocommerce button.button.alt::before, 
            .woocommerce input.button.alt::before,
            .woocommerce ul.products li.product .add_to_cart_button::before, 
            .woocommerce ul.products li.product .added_to_cart::before, 
            .woocommerce ul.products li.product .product_type_external::before, 
            .woocommerce ul.products li.product .product_type_grouped::before{
                color:#fff;
                background-color: {$multicommerce_primary_color};
            }


        ";

        /*color*/
        $custom_css.="
            a:active,
            a:hover,
            .main-navigation ul.menu li.current-menu-item > .angle-down, 
            .main-navigation ul.menu li.current-menu-item > a, 
            .main-navigation ul.menu li.current-menu-parent > .angle-down, 
            .main-navigation ul.menu li.current-menu-parent > a, 
            .main-navigation ul.menu li:hover > .angle-down, 
            .main-navigation ul.menu li:hover > a,
            .wc-cart-wrapper:hover i, 
            .yith-wcwl-wrapper:hover i,
            .featured-social .icon-box a,
            .woocommerce ul.products li.product .woocommerce-loop-category__title:hover,
            .woocommerce ul.products li.product .woocommerce-loop-product__title:hover, 
            .woocommerce ul.products li.product h3:hover,
            .nav-links .nav-next a:hover, 
            .nav-links .nav-previous a:hover{
                color:{$multicommerce_primary_color};
            }
        ";

        /*border-color*/
        $custom_css .= "
            .cte-links a:hover,
            .wc-cart-wrapper:hover, 
            .yith-wcwl-wrapper:hover,
            .advance-product-search,
            .advance-product-search .select_products,
            .featured-social .icon-box,
            .comment-form .form-submit input,
            .nav-links .nav-next a:hover,
            .nav-links .nav-previous a:hover,
            .comments-area .comment-list .reply a:hover,
            .select2-container--default .select2-search--dropdown .select2-search__field,
            .advance-product-search .select2-container .select2-selection--single{
                border-color:{$multicommerce_primary_color};
            }
        ";

        /*===============================================================================
        --------------------------------- Secondary Color -------------------------------
        ================================================================================*/
        
        $custom_css .= "
            .secondary,
            .wc-cart-wrapper:hover span.cart-value, 
            .wc-cart-wrapper:hover span.wishlist-value, 
            .yith-wcwl-wrapper:hover span.cart-value, 
            .yith-wcwl-wrapper:hover span.wishlist-value,
            .woocommerce #respond input#submit, 
            .woocommerce #respond input#submit.disabled, 
            .woocommerce #respond input#submit:disabled, 
            .woocommerce #respond input#submit:disabled[disabled], 
            .woocommerce a.button, .woocommerce a.button.disabled, 
            .woocommerce a.button:disabled, 
            .woocommerce a.button:disabled[disabled], 
            .woocommerce button.button, 
            .woocommerce button.button.disabled, 
            .woocommerce button.button:disabled, 
            .woocommerce button.button:disabled[disabled], 
            .woocommerce input.button, 
            .wc-cte-feature .cte-title,
            .woocommerce span.onsale,
            .woocommerce input.button.disabled, 
            .woocommerce input.button:disabled, 
            .woocommerce input.button:disabled[disabled],
            .single-item .icon:hover,
            .woocommerce .cart .button, 
            .woocommerce .cart input.button, 
            .woocommerce a.added_to_cart,
            .woocommerce a.button.add_to_cart_button, 
            .woocommerce a.button.product_type_external, 
            .woocommerce a.button.product_type_grouped,
            
            .comment-form .form-submit input:hover,
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt,
            .woocommerce #respond input#submit.alt:hover, 
            .woocommerce .cart .button:hover, 
            .woocommerce .cart input.button:hover, 
            .woocommerce .widget_shopping_cart_content .buttons a.button:hover, 
            .woocommerce a.added_to_cart:hover, 
            .woocommerce a.button.add_to_cart_button:hover, 
            .woocommerce a.button.alt:hover, 
            .woocommerce a.button.product_type_external:hover, 
            .woocommerce a.button.product_type_grouped:hover, 
            .woocommerce button.button.alt:hover, 
            .woocommerce input.button.alt:hover{
                background-color: {$multicommerce_secondary_color};
            }
        ";

        $custom_css .= "
            .woocommerce ul.products li.product .price{
                color: {$multicommerce_secondary_color};
            }
        ";

        $custom_css .= "
            .comment-form .form-submit input:hover{
                border-color: {$multicommerce_secondary_color};
            }
        ";

	    /*category color*/
	    /*category color options*/
	    $args = array(
		    'orderby' => 'id',
		    'hide_empty' => 0
	    );
	    $categories = get_categories( $args );
	    $wp_category_list = array();
	    $i = 1;
	    foreach ($categories as $category_list ) {

	    	$cat_id = esc_attr($category_list->cat_ID);
		    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;
		    $cat_color = 'cte-'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) );
		    $cat_hover_color = 'cte-hover-'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) );

		    if( isset( $multicommerce_customizer_all_values[$cat_color] )){
			    $cat_color = esc_attr( $multicommerce_customizer_all_values[$cat_color] );
			    if( !empty( $cat_color )){
				    $custom_css .= "
                    .cte-links .te-cte-item-{$cat_id}{
                        color:#fff;
                        background-color: {$cat_color};
                        border-color: {$cat_color};
                    }
                    ";
			    }
		    }
		    if( isset( $multicommerce_customizer_all_values[$cat_hover_color] )){
			    $cat_hover_color = esc_attr( $multicommerce_customizer_all_values[$cat_hover_color] );
			    if( !empty( $cat_hover_color )){
				    $custom_css .= "
                    .cte-links .te-cte-item-{$cat_id}:hover{
                        color:#fff;
                        border-color: {$cat_hover_color};
                        background-color: {$cat_hover_color};
                    }
                    ";
			    }
		    }
		    $i++;
	    }
	    /*category color end*/
       wp_add_inline_style( 'multicommerce-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'multicommerce_dynamic_css', 99 );