<?php
/**
 * Adds MultiCommerce Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
function multicommerce_widgets($widgets) {
    $theme_widgets = array(
        'multicommerce_services',
        'multicommerce_posts_col',
        'multicommerce_featured_page',
        'multicommerce_advanced_image_logo',
        'multicommerce_social',
        'multicommerce_wc_feature_cats',
        'multicommerce_wc_cats_tabs',
        'multicommerce_wc_products',
        'multicommerce_advanced_search'
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('multicommerce');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'multicommerce_widgets' );

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
function multicommerce_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('MultiCommerce Widgets', 'multicommerce'),
        'filter' => array(
            'groups' => array('multicommerce')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'multicommerce_widgets_tab', 20 );