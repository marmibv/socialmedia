<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_set_global' ) ) :

    function multicommerce_set_global(){
        /*Getting saved values start*/
        $multicommerce_saved_theme_options = multicommerce_get_theme_options();
        $GLOBALS['multicommerce_customizer_all_values'] = $multicommerce_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'multicommerce_action_before_head', 'multicommerce_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_doctype' ) ) :
    function multicommerce_doctype() {
        ?>
        <!DOCTYPE html>
        <html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/html">
    <?php
    }
endif;
add_action( 'multicommerce_action_before_head', 'multicommerce_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_before_wp_head' ) ) :

    function multicommerce_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11')?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;
add_action( 'multicommerce_action_before_wp_head', 'multicommerce_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_body_class' ) ) :

    function multicommerce_body_class( $multicommerce_body_classes ) {
        global $multicommerce_customizer_all_values;
        if ( 'no-image' == $multicommerce_customizer_all_values['multicommerce-blog-archive-layout'] ) {
            $multicommerce_body_classes[] = 'blog-no-image';
        }

	    if( 1 == $multicommerce_customizer_all_values['multicommerce-enable-sticky-sidebar'] ){
		    $multicommerce_body_classes[] = 'te-sticky-sidebar';
	    }
	    $multicommerce_header_logo_menu_display_position = $multicommerce_customizer_all_values['multicommerce-header-logo-ads-display-position'];
	    $multicommerce_body_classes[] = esc_attr( $multicommerce_header_logo_menu_display_position );

        $multicommerce_body_classes[] = multicommerce_sidebar_selection();

        /*feature section*/
	    $multicommerce_enable_special_menu = $multicommerce_customizer_all_values['multicommerce-enable-category-menu'];
	    $multicommerce_feature_enable_special_menu = $multicommerce_customizer_all_values['multicommerce-feature-enable-category-menu'];
	    $multicommerce_feature_content_options = $multicommerce_customizer_all_values['multicommerce-feature-content-options'];
	    $multicommerce_feature_right_content_options = $multicommerce_customizer_all_values['multicommerce-feature-right-content-options'];
	    if( is_front_page() &&
            !is_home() &&
            ('disable' != $multicommerce_feature_content_options || 'disable' != $multicommerce_feature_right_content_options ) &&
            1 == $multicommerce_enable_special_menu &&
            1 == $multicommerce_feature_enable_special_menu
        ){
		    $multicommerce_body_classes[] = 'multicommerce-feature-category-menu';
	    }

        return $multicommerce_body_classes;
    }
endif;
add_action( 'body_class', 'multicommerce_body_class', 10, 1);

/**
 * Page start
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_page_start' ) ) :

    function multicommerce_page_start() {
        ?>
        <div id="page" class="hfeed site">
    <?php
    }
endif;
add_action( 'multicommerce_action_before', 'multicommerce_page_start', 15 );

/**
 * Skip to content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_skip_to_content' ) ) :

    function multicommerce_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content" title="link"><?php esc_html_e( 'Skip to content', 'multicommerce' ); ?></a>
    <?php
    }
endif;
add_action( 'multicommerce_action_before_header', 'multicommerce_skip_to_content', 10 );

/**
 * Multicommerce Header Menu Right part
 *
 * @since MultiCommerce 1.0.2
 *
 * @param null
 * @return null
 *
 */
if(!function_exists('multicommerce_headermenu_rightpart_callback')):

    function multicommerce_headermenu_rightpart_callback(){

        global $multicommerce_customizer_all_values;
        if(!$multicommerce_customizer_all_values){
            multicommerce_set_global(); // for partial refesh (when gloabal variable not set)
        }

        $multicommerce_menu_right_text = $multicommerce_customizer_all_values['multicommerce-menu-right-text'];
        $multicommerce_menu_right_highlight_text = $multicommerce_customizer_all_values['multicommerce-menu-right-highlight-text'];
        $multicommerce_menu_right_text_link = $multicommerce_customizer_all_values['multicommerce-menu-right-text-link'];
        $multicommerce_menu_right_link_new_tab = $multicommerce_customizer_all_values['multicommerce-menu-right-link-new-tab'];
        ?>
        <div class="te-menu-right-wrapper">
            <?php
            if( !empty( $multicommerce_menu_right_text ) ){

                multicommerce_customizer_shortcut_edit('multicommerce-menu-right-text');
                if( !empty( $multicommerce_menu_right_text_link ) ){
                    ?>
                    <a class="cart-icon" href="<?php echo esc_url( $multicommerce_menu_right_text_link ); ?>" target="<?php echo ($multicommerce_menu_right_link_new_tab==1? '_blank':'')?>">
                        <?php
                    }
                    if( !empty( $multicommerce_menu_right_highlight_text ) ){
                        ?>
                        <span class="menu-right-highlight-text">
                            <?php echo esc_html( $multicommerce_menu_right_highlight_text );?>
                        </span>
                        <?php
                    }
                    ?>
                    <span class="menu-right-text">
                        <?php echo esc_html( $multicommerce_menu_right_text ); ?>
                    </span>
                    <?php
                    if( !empty( $multicommerce_menu_right_text_link ) ){
                        ?>
                    </a>
                    <?php
                }

            }
            ?>
        </div><!--.te-menu-right-wrapper-->
        <?php
    }

endif;

add_action('multicommerce_header_menu_right_part', 'multicommerce_headermenu_rightpart_callback', 10 );

if(!function_exists('multicommerce_top_header_section_callback')):

    function multicommerce_top_header_section_callback(){

        global $multicommerce_customizer_all_values;
        if(!$multicommerce_customizer_all_values){
            multicommerce_set_global(); // for partial refesh (when gloabal variable not set)
        }

        $multicommerce_enable_header_top = $multicommerce_customizer_all_values['multicommerce-enable-header-top'];
        $multicommerce_top_right_button_title = $multicommerce_customizer_all_values['multicommerce-top-right-button-title'];
        $multicommerce_top_right_button_link = $multicommerce_customizer_all_values['multicommerce-top-right-button-link'];

        if( 1 == $multicommerce_enable_header_top ){
            $multicommerce_header_top_basic_info_display_selection = $multicommerce_customizer_all_values['multicommerce-header-top-basic-info-display-selection'];
            $multicommerce_header_top_menu_display_selection = $multicommerce_customizer_all_values['multicommerce-header-top-menu-display-selection'];
            $multicommerce_header_top_social_display_selection = $multicommerce_customizer_all_values['multicommerce-header-top-social-display-selection'];
            $multicommerce_top_right_button_options = $multicommerce_customizer_all_values['multicommerce-top-right-button-options'];
            ?>
            <div class="top-header-wrapper clearfix">
                <div class="wrapper">
                    <div class="header-left">
                        <?php
                        if( 'left' == $multicommerce_header_top_basic_info_display_selection ){
                            do_action('multicommerce_action_basic_info');
                        }
                        if( 'left' == $multicommerce_header_top_menu_display_selection ){
                            do_action('multicommerce_action_top_menu');
                        }
                        if( 'left' == $multicommerce_header_top_social_display_selection ){
                            do_action('multicommerce_action_social_links');
                        }
                        ?>
                    </div>
                    <div class="header-right">
                        <?php
                        if( 'right' == $multicommerce_header_top_basic_info_display_selection ){
                            do_action('multicommerce_action_basic_info');
                        }
                        if( 'right' == $multicommerce_header_top_menu_display_selection ){
                            do_action('multicommerce_action_top_menu');
                        }
                        if( 'right' == $multicommerce_header_top_social_display_selection ){
                            do_action('multicommerce_action_social_links');
                        }
                        if( 'disable' != $multicommerce_top_right_button_options ){
                            $multicommerce_top_right_button_title = !empty( $multicommerce_top_right_button_title )? $multicommerce_top_right_button_title : '';
                            if( 'widget' == $multicommerce_top_right_button_options ){
                                ?>
                                <div class="icon-box">
                                    <?php multicommerce_customizer_shortcut_edit('multicommerce-top-right-button-title'); ?>
                                    <a id="te-modal-open" class="my-account te-modal" href="<?php echo esc_url( $multicommerce_top_right_button_link );?>">
                                        <?php echo esc_html( $multicommerce_top_right_button_title ); ?>
                                    </a>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="icon-box">
                                    <?php multicommerce_customizer_shortcut_edit('multicommerce-top-right-button-title'); ?>
                                    <a class="my-account" href="<?php echo esc_url( $multicommerce_top_right_button_link );?>">
                                        <?php echo esc_html( $multicommerce_top_right_button_title ); ?>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div><!--.header-right-->
                </div><!-- .top-header-container -->
            </div><!-- .top-header-wrapper -->
            <?php
        }

    }

endif;

add_action('multicommerce_topheader_section', 'multicommerce_top_header_section_callback', 10 );

/**
 * Main header
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_header' ) ) :

    function multicommerce_header() {

        global $multicommerce_customizer_all_values;
	    $multicommerce_header_media_position = $multicommerce_customizer_all_values['multicommerce-header-media-position'];	    
	    ?>
        <header id="masthead" class="site-header">
            <?php
            if( 'very-top' == $multicommerce_header_media_position ){
                multicommerce_header_markup();
            }
            ?>
            <div class="multicommerce-top-header-wraper">
                <?php
                /**
                 * @hook multicommerce_topheader_section
                 * @since MultiCommerce 1.0.2
                 *
                 * @hooked multicommerce_top_header_section_callback -  10
                 */
                do_action('multicommerce_topheader_section');
                ?>
            </div>
            <?php
            if( 'above-logo' == $multicommerce_header_media_position ){
                multicommerce_header_markup();
            }
            ?>
            <div class="header-wrapper clearfix">
                <div class="wrapper">
	                <?php
	                $multicommerce_display_site_logo = $multicommerce_customizer_all_values['multicommerce-display-site-logo'];
	                $multicommerce_display_site_title = $multicommerce_customizer_all_values['multicommerce-display-site-title'];
	                $multicommerce_display_site_tagline = $multicommerce_customizer_all_values['multicommerce-display-site-tagline'];
	                if( 1== $multicommerce_display_site_logo || 1 == $multicommerce_display_site_title || 1 == $multicommerce_display_site_tagline ):
		                ?>
                        <div class="site-logo">
			                <?php
			                if ( 1 == $multicommerce_display_site_logo  ):
				                if ( function_exists( 'the_custom_logo' ) ) :
					                the_custom_logo();
				                endif;
			                endif;
			                if ( 1 == $multicommerce_display_site_title || 1 == $multicommerce_display_site_tagline ){
			                    echo "<div class='site-title-tagline'>";
			                    multicommerce_customizer_shortcut_edit('blogname', false);
				                if ( 1 == $multicommerce_display_site_title  ):
					                if ( is_front_page() && is_home() ) : ?>
                                        <h1 class="site-title">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                        </h1>
					                <?php else : ?>
                                        <p class="site-title">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                        </p>
						                <?php
					                endif;
				                endif;
				                if ( 1 == $multicommerce_display_site_tagline ):
					                $description = get_bloginfo( 'description', 'display' );
					                if ( $description || is_customize_preview() ) : ?>
                                        <p class="site-description"><?php
                                        echo esc_html( $description ); 
                                        multicommerce_customizer_shortcut_edit('blogdescription', false);
                                        ?></p>
					                <?php endif;
				                endif;
				                echo "</div>";
                            }
			                ?>
                        </div><!--site-logo-->
		                <?php
	                endif;
	                $multicommerce_header_logo_menu_display_position = $multicommerce_customizer_all_values['multicommerce-header-logo-ads-display-position'];
	                if( 'center-logo-below-ads' == $multicommerce_header_logo_menu_display_position ){
	                    echo "<div class='center-wrapper'>";
                    }
                    else{
	                    echo "<div class='center-wrapper-mx-width'>";
                    }
	                $multicommerce_enable_cart_icon = $multicommerce_customizer_all_values['multicommerce-enable-cart-icon'];
	                $multicommerce_enable_wishlist_icon = $multicommerce_customizer_all_values['multicommerce-enable-wishlist-icon'];

	                if ( multicommerce_is_woocommerce_active() && ( $multicommerce_enable_cart_icon || $multicommerce_enable_wishlist_icon )) : ?>
                        <div class="cart-section">
			                <?php
			                if ( class_exists( 'YITH_WCWL' ) &&  $multicommerce_enable_wishlist_icon ) :
				                $wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
				                if ( absint( $wishlist_page_id ) > 0 ) : ?>
                                    <div class="yith-wcwl-wrapper">
                                        <a class="te-wc-icon wishlist-icon" href="<?php echo esc_url( get_permalink( $wishlist_page_id ) ); ?>">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                            <span class="wishlist-value"><?php echo absint( yith_wcwl_count_products() ); ?></span>
                                        </a>

                                    </div>
					                <?php
				                endif;
			                endif;
			                if( $multicommerce_enable_cart_icon ){
                                ?>
                            <div class="wc-cart-wrapper">
                                <div class="wc-cart-icon-wrapper">
                                    <a class="te-wc-icon cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                                        <i class="fa fa-opencart" aria-hidden="true"></i>
                                        <span class="cart-value cart-customlocation"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                                    </a>
                                </div>
                                <div class="wc-cart-widget-wrapper">
					                <?php the_widget( 'WC_Widget_Cart', '' ); ?>
                                </div>
                            </div>
                            <?php
			                }
			                ?>
                        </div> <!-- .cart-section -->
	                <?php endif; ?>
                    <div class="header-ads-adv-search float-right">
		                <?php
		                if( is_active_sidebar( 'multicommerce-header' ) ) :
                            multicommerce_customizer_shortcut_edit('sidebar-widgets-multicommerce-header', false, 'section');
			                dynamic_sidebar( 'multicommerce-header' );
		                endif;
		                ?>
                    </div>
                    <?php
                    echo "</div>";/*.center-wrapper*/
                    ?>
                </div><!--.wrapper-->
                <div class="clearfix"></div>
                <?php
	                if( 'above-menu' == $multicommerce_header_media_position ){
	                	multicommerce_header_markup();
	                }
                ?>
                <div class="navigation-wrapper">
	                <?php
	                $multicommerce_nav_class ='';
	                $multicommerce_feature_enable_special_menu = $multicommerce_customizer_all_values['multicommerce-feature-enable-category-menu'];

	                if( 1 != $multicommerce_feature_enable_special_menu && 1 == $multicommerce_customizer_all_values['multicommerce-enable-sticky-menu'] ) {
		                $multicommerce_nav_class = ' multicommerce-enable-sticky-menu ';
	                }
	                $multicommerce_enable_special_menu = $multicommerce_customizer_all_values['multicommerce-enable-category-menu'];
	                if( 1 == $multicommerce_enable_special_menu ) {
		                $multicommerce_nav_class .= ' multicommerce-enable-category-menu ';
	                }
	                ?>
                    <nav id="site-navigation" class="main-navigation <?php echo esc_attr( $multicommerce_nav_class );?> clearfix">
                        <div class="header-main-menu wrapper clearfix">
                            <?php
                            if( 1 == $multicommerce_enable_special_menu ){
	                            $multicommerce_category_menu_text = $multicommerce_customizer_all_values['multicommerce-category-menu-text'];
                                ?>
                                <ul class="menu category-menu-wrapper">
                                    <li class="menu-item menu-item-has-children">
                                    	<?php multicommerce_customizer_shortcut_edit('multicommerce-category-menu-text'); ?>
                                        <a href="javascript:void(0)" class="category-menu">
                                            <i class="fa fa-navicon toggle"></i><?php echo esc_html( $multicommerce_category_menu_text ); ?>
                                        </a>
			                            <?php
			                            if ( has_nav_menu( 'category-menu' ) ) {
				                            wp_nav_menu( array(
					                            'theme_location' => 'category-menu',
					                            'menu_class' => 'sub-menu special-sub-menu',
					                            'container' => false,
				                            ) );
			                            }
			                            ?>
                                        <div class="responsive-special-sub-menu clearfix"></div>
                                    </li>
                                </ul>
                                <?php
                            }/*special menu*/
                            ?>
                            <div class="themeegg-nav">
	                            <?php

	                            $primary_menu_args = array(
	                            	'container' => false,
	                            	'theme_location' => 'primary',
	                            	'fallback_cb' => 'multicommerce_fallback_menu',

	                            );

	                            wp_nav_menu($primary_menu_args);

                                /**
                                 * multicommerce_header_menu_right_part hook
                                 * @since MultiCommerce 1.0.2
                                 *
                                 * @hooked multicommerce_headermenu_rightpart_callback -  10
                                 */
                                do_action('multicommerce_header_menu_right_part');

	                            ?>

                            </div>

                        </div>
                        <div class="responsive-slick-menu clearfix"></div>
                    </nav>
                    <!-- #site-navigation -->
                </div>
                <!-- .header-container -->
            </div>
            <!-- header-wrapper-->
        </header>
        <?php
        if( 'below-menu' == $multicommerce_header_media_position ){
            multicommerce_header_markup();
        }
        ?>
        <!-- #masthead -->
    <?php
    }
endif;
add_action( 'multicommerce_action_header', 'multicommerce_header', 10 );

/**
 * After Header
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_after_header' ) ) :

    function multicommerce_after_header() {
	    global $multicommerce_customizer_all_values;
	    ?>
        <div class="content-wrapper clearfix">
            <div id="content" class="wrapper site-content">
        <?php
        if( 'disable' != $multicommerce_customizer_all_values['multicommerce-breadcrumb-options'] && !is_front_page()){
            multicommerce_breadcrumbs();
        }
    }
endif;
add_action( 'multicommerce_action_after_header', 'multicommerce_after_header', 10 );

/**
 * Before main content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_before_content' ) ) :

    function multicommerce_before_content() {
    	$inner_content_class = (is_front_page()) ? 'inner-content-front' : 'inner-content';
	    ?><div class="<?php echo esc_attr($inner_content_class); ?>"><?php
    }
endif;
add_action( 'multicommerce_action_before_content', 'multicommerce_before_content', 10 );