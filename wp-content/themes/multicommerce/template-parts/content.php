<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
$multicommerce_customizer_all_values = multicommerce_get_theme_options();
$multicommerce_blog_no_image = 'hentry';
if( !has_post_thumbnail() || 'no-image' == $multicommerce_customizer_all_values['multicommerce-blog-archive-layout'] ) {
	$multicommerce_blog_no_image .= ' blog-no-image';
}

$multicommerce_get_image_sizes_options = $multicommerce_customizer_all_values['multicommerce-blog-archive-img-size'];
$multicommerce_blog_archive_read_more = $multicommerce_customizer_all_values['multicommerce-blog-archive-more-text'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $multicommerce_blog_no_image ); ?>>
	<?php
	if( has_post_thumbnail() && 'show-image' == $multicommerce_customizer_all_values['multicommerce-blog-archive-layout'] ) {
		?>
		<!--post thumbnal options-->
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( $multicommerce_get_image_sizes_options );?>
			</a>
		</div><!-- .post-thumb-->
	<?php
	}
	?>
	<div class="post-content">
		<header class="entry-header">
			<?php
			multicommerce_list_post_category();
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<div class="entry-meta">
				<?php
                if ( 'post' === get_post_type() ) :
                    multicommerce_posted_on();
				endif;
				multicommerce_entry_footer();
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			the_excerpt();
			if( !empty( $multicommerce_blog_archive_read_more ) ){
				?>
                <a class="read-more" href="<?php the_permalink(); ?>">
					<?php echo esc_html( $multicommerce_blog_archive_read_more ); ?>
                </a>
				<?php
			}
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->