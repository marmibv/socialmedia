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
if ( ! function_exists( 'multicommerce_default_page_primary_content' ) ) :

	function multicommerce_default_page_primary_content() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
				while ( have_posts() ) : 
					the_post();
					get_template_part( 'template-parts/content', 'page' );
                	// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ):
						comments_template();
				endif;
			endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
}
endif;

add_action( 'multicommerce_action_default_page', 'multicommerce_default_page_primary_content', 10 );

/**
 * MultiCommerce Default Page Sidebars
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_default_page_sidebars' ) ) :

	function multicommerce_default_page_sidebars(){

		do_action('multicommerce_action_sidebars');

	}

endif;

add_action( 'multicommerce_action_default_page', 'multicommerce_default_page_sidebars', 20 );