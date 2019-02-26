<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
get_header(); 

/**
 * multicommerce_action_archive_page hook
 * @since MultiCommerce 1.0.0
 *
 * @hooked multicommerce_archive_page -  10
 */
do_action( 'multicommerce_action_archive_page' );

get_footer();