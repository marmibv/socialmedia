<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */

/**
 * multicommerce_action_after_content hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_after_content - 10
 */
do_action( 'multicommerce_action_after_content' );

/**
 * multicommerce_action_before_footer hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked null
 */
do_action( 'multicommerce_action_before_footer' );

/**
 * multicommerce_action_footer hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_footer - 10
 */
do_action( 'multicommerce_action_footer' );

/**
 * multicommerce_action_after_footer hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked null
 */
do_action( 'multicommerce_action_after_footer' );

/**
 * multicommerce_action_after hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_page_end - 10
 */
do_action( 'multicommerce_action_after' );

wp_footer(); 

?>
</body>
</html>