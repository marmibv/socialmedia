<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
get_header();

/**
 * multicommerce_action_default_page hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_default_page -  10
 */
do_action('multicommerce_action_default_page');

get_footer();