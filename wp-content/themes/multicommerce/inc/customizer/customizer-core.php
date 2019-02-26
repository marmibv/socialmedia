<?php
/**
 * Header top display options of elements
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_header_top_display_selection
 *
 */
if ( !function_exists('multicommerce_header_top_display_selection') ) :
	function multicommerce_header_top_display_selection() {
		$multicommerce_header_top_display_selection =  array(
			'hide' => esc_html__( 'Hide', 'multicommerce' ),
			'left' => esc_html__( 'on Top Left', 'multicommerce' ),
			'right' => esc_html__( 'on Top Right', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_header_top_display_selection', $multicommerce_header_top_display_selection );
	}
endif;

/**
 * multicommerce_menu_right_button_link_options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_menu_right_button_link_options
 *
 */
if ( !function_exists('multicommerce_menu_right_button_link_options') ) :
	function multicommerce_menu_right_button_link_options() {
		$multicommerce_menu_right_button_link_options =  array(
			'disable' => esc_html__( 'Disable', 'multicommerce' ),
			'widget' => esc_html__( 'Widget on Popup', 'multicommerce' ),
			'link' => esc_html__( 'Normal Link', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_menu_right_button_link_options', $multicommerce_menu_right_button_link_options );
	}
endif;

/**
 * Header Basic Info number
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_header_bi_number
 *
 */
if ( !function_exists('multicommerce_header_bi_number') ) :
	function multicommerce_header_bi_number() {
		$multicommerce_header_bi_number =  array(
			1 => esc_html__( '1', 'multicommerce' ),
			2 => esc_html__( '2', 'multicommerce' ),
			3 => esc_html__( '3', 'multicommerce' ),
			4 => esc_html__( '4', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_header_bi_number', $multicommerce_header_bi_number );
	}
endif;

/**
 * Header Media Position options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_header_media_position
 *
 */
if ( !function_exists('multicommerce_header_media_position') ) :
	function multicommerce_header_media_position() {
		$multicommerce_header_media_position =  array(
			'very-top' => esc_html__( 'Very Top', 'multicommerce' ),
			'above-logo' => esc_html__( 'Above Site Identity', 'multicommerce' ),
			'above-menu' => esc_html__( 'Below Site Identity and Above Menu', 'multicommerce' ),
			'below-menu' => esc_html__( 'Below Menu', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_header_media_position', $multicommerce_header_media_position );
	}
endif;

/**
 * Header Site identity and ads display options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_header_logo_menu_display_position
 *
 */
if ( !function_exists('multicommerce_header_logo_menu_display_position') ) :
	function multicommerce_header_logo_menu_display_position() {
		$multicommerce_header_logo_menu_display_position =  array(
			'left-logo-right-ads' => esc_html__( 'Left Logo and Right Ads', 'multicommerce' ),
			'right-logo-left-ads' => esc_html__( 'Right Logo and Left Ads', 'multicommerce' ),
			'center-logo-below-ads' => esc_html__( 'Center Logo and Below Ads', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_header_logo_menu_display_position', $multicommerce_header_logo_menu_display_position );
	}
endif;

/**
 * Feature Section Options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_feature_section_content_options
 *
 */
if ( !function_exists('multicommerce_feature_section_content_options') ) :
	function multicommerce_feature_section_content_options() {
		$multicommerce_feature_section_content_options =  array(
			'disable' => esc_html__( 'Disable', 'multicommerce' ),
			'post' => esc_html__( 'Post', 'multicommerce' ),
		);
		if( multicommerce_is_woocommerce_active() ){
			$multicommerce_feature_section_content_options['product'] = esc_html__( 'Product', 'multicommerce' );
		}
		return apply_filters( 'multicommerce_feature_section_content_options', $multicommerce_feature_section_content_options );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_fs_image_display_options
 *
 */
if ( !function_exists('multicommerce_fs_image_display_options') ) :
	function multicommerce_fs_image_display_options() {
		$multicommerce_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'multicommerce' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_fs_image_display_options', $multicommerce_fs_image_display_options );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_sidebar_layout
 *
 */
if ( !function_exists('multicommerce_sidebar_layout') ) :
    function multicommerce_sidebar_layout() {
        $multicommerce_sidebar_layout =  array(
            'right-sidebar' => esc_html__( 'Right Sidebar', 'multicommerce' ),
            'left-sidebar'  => esc_html__( 'Left Sidebar' , 'multicommerce' ),
            'both-sidebar'    => esc_html__( 'Both Sidebar', 'multicommerce' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'multicommerce' ),
            'no-sidebar-center'    => esc_html__( 'No Sidebar Center', 'multicommerce' ),
        );
        return apply_filters( 'multicommerce_sidebar_layout', $multicommerce_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_blog_layout
 *
 */
if ( !function_exists('multicommerce_blog_layout') ) :
    function multicommerce_blog_layout() {
        $multicommerce_blog_layout =  array(
            'show-image' => esc_html__( 'Show Image', 'multicommerce' ),
            'no-image'   => esc_html__( 'Hide Image', 'multicommerce' )
        );
        return apply_filters( 'multicommerce_blog_layout', $multicommerce_blog_layout );
    }
endif;

/**
 * Reset Options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('multicommerce_reset_options') ) :
    function multicommerce_reset_options() {
        $multicommerce_reset_options =  array(
            '0'  => esc_html__( 'Do Not Reset', 'multicommerce' ),
            'reset-color-options'  => esc_html__( 'Reset Colors Options', 'multicommerce' ),
            'reset-all' => esc_html__( 'Reset All', 'multicommerce' )
        );
        return apply_filters( 'multicommerce_reset_options', $multicommerce_reset_options );
    }
endif;

/**
 * Breadcrumbs options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('multicommerce_breadcrumbs_options') ) :
	function multicommerce_breadcrumbs_options() {
		$multicommerce_breadcrumbs_options =  array(
			'disable'  => esc_html__( 'Disable', 'multicommerce' ),
			'default'  => esc_html__( 'Default', 'multicommerce' )
		);
		if( multicommerce_is_woocommerce_active() ){
			$multicommerce_breadcrumbs_options['wc-breadcrumb'] = esc_html__( 'WC Breadcrumb', 'multicommerce' );
		}
		return apply_filters( 'multicommerce_breadcrumbs_options', $multicommerce_breadcrumbs_options );
	}
endif;

/**
 * Blog Archive Display Options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('multicommerce_blog_archive_category_display_options') ) :
	function multicommerce_blog_archive_category_display_options() {
		$multicommerce_blog_archive_category_display_options =  array(
			'default'  => esc_html__( 'Default', 'multicommerce' ),
			'cte-color'  => esc_html__( 'Categories with Color', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_blog_archive_category_display_options', $multicommerce_blog_archive_category_display_options );
	}
endif;

/**
 * Related Post Display From Options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('multicommerce_related_post_display_from') ) :
	function multicommerce_related_post_display_from() {
		$multicommerce_related_post_display_from =  array(
			'cat'  => esc_html__( 'Related Posts From Categories', 'multicommerce' ),
			'tag'  => esc_html__( 'Related Posts From Tags', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_related_post_display_from', $multicommerce_related_post_display_from );
	}
endif;

/**
 * Image Size
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_get_image_sizes_options
 *
 */
if ( !function_exists('multicommerce_get_image_sizes_options') ) :
	function multicommerce_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'multicommerce' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'multicommerce' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'multicommerce_get_image_sizes_options', $choices );
	}
endif;

/**
 *  Default Theme layout options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $multicommerce_theme_layout
 *
 */
if ( !function_exists('multicommerce_get_default_theme_options') ) :
    function multicommerce_get_default_theme_options() {

        $default_theme_options = array(

	        /*basic info*/
	        'multicommerce-header-bi-number'  => 4,
	        'multicommerce-first-info-icon'  => 'fa-volume-control-phone',
	        'multicommerce-first-info-title'  => esc_html__('+977-01-6201490', 'multicommerce'),
	        'multicommerce-first-info-link'  => '',
	        'multicommerce-second-info-icon'  => 'fa-envelope-o',
	        'multicommerce-second-info-title'  => esc_html__('info@themeegg.com', 'multicommerce'),
	        'multicommerce-second-info-link'  => '',
	        'multicommerce-third-info-icon'  => 'fa-map-marker',
	        'multicommerce-third-info-title'  => esc_html__('Our Location', 'multicommerce'),
	        'multicommerce-third-info-link'  => '',
	        'multicommerce-forth-info-icon'  => 'fa-clock-o',
	        'multicommerce-forth-info-title'  => esc_html__('Working Hours', 'multicommerce'),
	        'multicommerce-forth-info-link'  => '',
            
            /*feature section options*/
            'multicommerce-feature-post-cat'  => 0,
            'multicommerce-feature-product-cat'  => 0,
            'multicommerce-feature-content-options'  => 'disable',
            'multicommerce-feature-post-number'  => 3,
            'multicommerce-feature-slider-display-cat'  => '',
            'multicommerce-feature-slider-display-title'  => 1,
            'multicommerce-feature-slider-display-excerpt'  => '',
            'multicommerce-feature-slider-display-arrow'  => 1,
            'multicommerce-feature-slider-enable-autoplay'  => 1,
            'multicommerce-fs-image-display-options'  => 'full-screen-bg',
            'multicommerce-feature-button-text'  => esc_html__('Shop Now', 'multicommerce'),

            /*feature-right*/
	        'multicommerce-feature-right-content-options'  => 'disable',
	        'multicommerce-feature-right-post-cat'  => 0,
	        'multicommerce-feature-right-product-cat'  => 0,
	        'multicommerce-feature-right-post-number'  => 2,
	        'multicommerce-feature-right-display-title'  => 1,
	        'multicommerce-feature-right-display-arrow'  => '',
	        'multicommerce-feature-right-enable-autoplay'  => 1,
	        'multicommerce-feature-right-image-display-options'  => 'full-screen-bg',
	        'multicommerce-feature-right-button-text'  => esc_html__('Shop Now', 'multicommerce'),

	        /*feature special menu*/
	        'multicommerce-feature-enable-category-menu'  => '',

	        /*header options*/
            'multicommerce-enable-header-top'  => '',
            'multicommerce-header-top-basic-info-display-selection'  => 'left',
            'multicommerce-header-top-menu-display-selection'  => 'hide',
            'multicommerce-header-top-social-display-selection'  => 'right',
            'multicommerce-top-right-button-options'  => 'link',
            'multicommerce-top-right-button-title'  => esc_html__('My Account', 'multicommerce'),
            'multicommerce-popup-widget-title'  => esc_html__('Popup Content', 'multicommerce'),
            'multicommerce-top-right-button-link'  => '',

	        /*header icons*/
	        'multicommerce-enable-cart-icon'  => '',
	        'multicommerce-enable-wishlist-icon'  => '',

            /*site identity*/
            'multicommerce-display-site-logo'  => 1,
            'multicommerce-display-site-title'  => 1,
            'multicommerce-display-site-tagline'  => 1,

            /*Menu Options*/
	        'multicommerce-enable-category-menu'  => '',
	        'multicommerce-category-menu-text'  => esc_html__('Category Menu', 'multicommerce'),

            'multicommerce-menu-right-text'  => '',
            'multicommerce-menu-right-highlight-text'  => '',
            'multicommerce-menu-right-text-link'  => '',
            'multicommerce-menu-right-link-new-tab'  => '',

	        'multicommerce-enable-sticky-menu'  => '',

            /*social options*/
            'multicommerce-social-data'  => '',

            /*media options*/
            'multicommerce-header-media-position'  => 'above-menu',
            'multicommerce-header-image-link'  => esc_url( home_url() ),
            'multicommerce-header-image-link-new-tab'  => '',

            /*logo and menu*/
            'multicommerce-header-logo-ads-display-position'  => 'left-logo-right-ads',

            /*footer options*/
            'multicommerce-footer-copyright'  => esc_html__( 'Copyright &copy; All Right Reserved 2018', 'multicommerce' ),
            'multicommerce-mailchimp-background'  => '',
            'multicommerce-mailchimp-form-id'  => 0,

            /*blog layout*/
            'multicommerce-blog-archive-img-size' => 'full',
            'multicommerce-blog-archive-more-text'  => esc_html__( 'Read More', 'multicommerce' ),

	        /*layout/design options*/
            'multicommerce-single-sidebar-layout'  => 'right-sidebar',
            'multicommerce-front-page-sidebar-layout'  => 'right-sidebar',
            'multicommerce-archive-sidebar-layout'  => 'right-sidebar',

            'multicommerce-enable-sticky-sidebar'  => 0,
            'multicommerce-blog-archive-layout'  => 'show-image',

            'multicommerce-primary-color'  => '#f28b00',
            'multicommerce-secondary-color'  => '#f92400',
            'multicommerce-cte-hover-color'  => '#2d2d2d',

	        /*single post options*/
            'multicommerce-show-related'  => 1,
            'multicommerce-related-title'  => esc_html__( 'Related posts', 'multicommerce' ),
            'multicommerce-related-post-display-from'  => 'cat',
            'multicommerce-single-img-size'  => 'full',

            /*woocommerce*/
	        'multicommerce-wc-shop-archive-sidebar-layout'  => 'no-sidebar',
	        'multicommerce-wc-product-column-number'  => 4,
	        'multicommerce-wc-shop-archive-total-product'  => 16,
	        'multicommerce-wc-single-product-sidebar-layout'  => 'no-sidebar',

	        /*theme options*/
            'multicommerce-search-placeholder'  => esc_html__( 'Search', 'multicommerce' ),
            'multicommerce-breadcrumb-options'  => 'default',

            'multicommerce-hide-front-page-content'  => '',

            /*Reset*/
            'multicommerce-reset-options'  => '0'
        );

        return apply_filters( 'multicommerce_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Default Theme font options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array $default_font_options
 *
 */
if ( !function_exists('multicommerce_get_default_font_options') ) :
    function multicommerce_get_default_font_options() {

        $default_font_options = array(

	        /*basic info*/
	        'multicommerce-body-font-family'	=> "Open Sans",
	        'multicommerce-title-font-family'	=> "Roboto",
	        'widget-title-font-family'			=> "Roboto",

	        /*single post content font*/
	        'enable-fonts-on-single-post'	=> 0,
	        'single-breadcrumb-font-family'	=> 'Open Sans',
	        'single-title-font-family'		=> 'Roboto',
	        'single-heading-font-family'	=> 'Roboto',
	        'single-content-font-family'	=> 'Open Sans',
	        
        );

        return apply_filters( 'multicommerce_default_font_options', $default_font_options );
    }

endif;

/**
 * Get theme options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array multicommerce_theme_options
 *
 */
if ( !function_exists('multicommerce_get_theme_options') ) :

    function multicommerce_get_theme_options() {

        $multicommerce_default_theme_options = multicommerce_get_default_theme_options();
        $multicommerce_get_theme_options = get_theme_mod( 'multicommerce_theme_options');
        if( is_array( $multicommerce_get_theme_options )){
            return array_merge( $multicommerce_default_theme_options, $multicommerce_get_theme_options );
        }
        else{
            return $multicommerce_default_theme_options;
        }
    }
    
endif;