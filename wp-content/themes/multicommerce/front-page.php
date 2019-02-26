<?php

/**
 * The front-page template file.
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since MultiCommerce 1.0.0
 */
get_header();
/**
 * multicommerce_action_front_page hook
 * @since MultiCommerce 1.0.0
 *
 * @hooked multicommerce_front_page -  10
 */
do_action( 'multicommerce_action_front_page' );

get_footer();