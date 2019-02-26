<?php
/**
 * MultiCommerce 404 Page Primary Content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_404_page_primary_content' ) ) :

	function multicommerce_404_page_primary_content() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><span class="large-title"><?php esc_html_e( '404', 'multicommerce' ) ?></span><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'multicommerce' ); ?></h1>
					</header><!-- .page-header -->
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'multicommerce' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php 
	}
endif;
add_action( 'multicommerce_action_404_page', 'multicommerce_404_page_primary_content', 10 );