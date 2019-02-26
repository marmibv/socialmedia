<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
get_header();

global $multicommerce_customizer_all_values;

/**
 * multicommerce_action_post_single hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_post_single -  10
 */
do_action('multicommerce_action_post_single');

get_footer();