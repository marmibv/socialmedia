
<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
get_header(); 

/**
 * multicommerce_action_404_page hook
 * @since MultiCommerce 1.0.0
 *
 * @hooked multicommerce_404_page -  10
 */
do_action( 'multicommerce_action_404_page' );

get_footer();