<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */

/**
 * multicommerce_action_before_head hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_set_global -  0
 * @hooked multicommerce_doctype -  10
 */
do_action( 'multicommerce_action_before_head' );?>

	<head>

		<?php
		/**
		 * multicommerce_action_before_wp_head hook
		 * @since Multi Commerce 1.0.0
		 *
		 * @hooked multicommerce_before_wp_head -  10
		 */
		do_action( 'multicommerce_action_before_wp_head' );

		wp_head();

		?>

	</head>
<body <?php body_class();
/**
 * multicommerce_action_body_attr hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_body_attr- 10
 */
do_action( 'multicommerce_action_body_attr' );?>>

<?php
/**
 * multicommerce_action_before hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_page_start - 10
 * @hooked multicommerce_page_start - 15
 */
do_action( 'multicommerce_action_before' );

/**
 * multicommerce_action_before_header hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_skip_to_content - 10
 */
do_action( 'multicommerce_action_before_header' );

/**
 * multicommerce_action_header hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_after_header - 10
 */
do_action( 'multicommerce_action_header' );

/**
 * multicommerce_action_after_header hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked null
 */
do_action( 'multicommerce_action_after_header' );

/**
 * multicommerce_action_before_content hook
 * @since Multi Commerce 1.0.0
 *
 * @hooked multicommerce_before_content - 10
 */
do_action( 'multicommerce_action_before_content' );