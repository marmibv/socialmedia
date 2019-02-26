<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
global $multicommerce_customizer_all_values;
$multicommerce_blog_no_image = 'hentry';
$multicommerce_single_image_layout = $multicommerce_customizer_all_values['multicommerce-single-img-size'];
if( !has_post_thumbnail() || 'disable' == $multicommerce_single_image_layout) {
	$multicommerce_blog_no_image .= ' blog-no-image';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $multicommerce_blog_no_image ); ?>>
	<!--post thumbnal options-->
	<?php if( has_post_thumbnail( ) && 'disable' != $multicommerce_single_image_layout ) {
		?>
		<div class="post-thumb">
			<?php
			the_post_thumbnail( $multicommerce_single_image_layout );
            ?>
		</div><!-- .post-thumb-->
	<?php
	}
	?>
	<div class="post-content">
		<header class="entry-header">
			<?php
			multicommerce_list_post_category();
			$post_format_icons = multicommerce_post_format_icons();
			the_title( '<h1 class="entry-title">'.$post_format_icons, '</h1>' );
			?>
			<div class="entry-meta">
				<?php
                if ( 'post' === get_post_type() ) :
                    multicommerce_posted_on();
				endif;
				multicommerce_entry_footer( 1 );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="entry-content clearfix">
			<?php
            the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'multicommerce' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->