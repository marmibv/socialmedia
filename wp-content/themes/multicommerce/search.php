<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
get_header();

/**
 * multicommerce_action_search_page hook
 * @since MultiCommerce 1.0.0
 *
 * @hooked multicommerce_search_page -  10
 */
do_action( 'multicommerce_action_search_page' );
 
get_footer();