<?php
/**
 * MultiCommerce search page primary content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_search_page_primary_content' ) ) :

	function multicommerce_search_page_primary_content() {
		?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'multicommerce' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<?php /* Start the Loop */
            while ( have_posts() ) : the_post();
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
            endwhile;
            the_posts_navigation();
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
}
endif;

add_action( 'multicommerce_action_search_page', 'multicommerce_search_page_primary_content', 10 );

/**
 * MultiCommerce Search Page Sidebars
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_search_page_sidebars' ) ) :

	function multicommerce_search_page_sidebars(){

		do_action('multicommerce_action_sidebars');

	}

endif;

add_action( 'multicommerce_action_search_page', 'multicommerce_search_page_sidebars', 20 );