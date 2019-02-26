<?php
/**
 * MultiCommerce Index Page Primary Content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_post_single_primary_content' ) ) :

	function multicommerce_post_single_primary_content() {
		?>
		<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'single' );
            echo "<div class='clearfix'></div>";
			the_post_navigation();

			if( is_active_sidebar( 'single-after-content' ) ) :
				?><div class="single-sidebar-wrapper"><?php
				dynamic_sidebar( 'single-after-content' );
				?></div><?php
			endif;
			/**
			 * multicommerce_related_posts hook
			 * @since Multi Commerce 1.0.0
			 *
			 * @hooked multicommerce_related_posts_belo -  10
			 */
			do_action( 'multicommerce_related_posts', get_the_ID() );
			// If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
}
endif;

add_action( 'multicommerce_action_post_single', 'multicommerce_post_single_primary_content', 10 );



/**
 * MultiCommerce Default Page Sidebars
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_post_single_sidebars' ) ) :

	function multicommerce_post_single_sidebars(){

		do_action('multicommerce_action_sidebars');

	}

endif;

add_action( 'multicommerce_action_post_single', 'multicommerce_post_single_sidebars', 20 );