<?php
/**
 * MultiCommerce archive Page Primary Content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_archive_page_primary_content' ) ) :

	function multicommerce_archive_page_primary_content() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
				if ( have_posts() ) : ?>
					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<?php /* Start the Loop */
					while ( have_posts() ) : the_post();
		                /*
		                 * Include the Post-Formte-specific template for the content.
		                 * If you want to override this in a child theme, then include a file
		                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		                 */
		                get_template_part( 'template-parts/content', get_post_format() );
		            endwhile;
		            the_posts_navigation();
		        else :
		        	get_template_part( 'template-parts/content', 'none' );
		        endif;
		        ?>
		    </main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
endif;

add_action( 'multicommerce_action_archive_page', 'multicommerce_archive_page_primary_content', 10 );



/**
 * MultiCommerce Archive Page Sidebars
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_archive_page_sidebars' ) ) :

	function multicommerce_archive_page_sidebars(){

		do_action('multicommerce_action_sidebars');

	}

endif;

add_action( 'multicommerce_action_archive_page', 'multicommerce_archive_page_sidebars', 20 );