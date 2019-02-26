<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */

get_header(); 

/**
 * multicommerce_action_index_page hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_index_page -  10
 */
do_action('multicommerce_action_index_page');

get_footer();