<?php
/**
 * Display related posts from same category
 *
 * @since MultiCommerce 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('multicommerce_related_post_below') ) :

    function multicommerce_related_post_below( $post_id ) {

        global $multicommerce_customizer_all_values;
	    if( 0 == $multicommerce_customizer_all_values['multicommerce-show-related'] ){
		    return;
	    }
	    $multicommerce_cat_post_args = array(
		    'post__not_in' => array($post_id),
		    'post_type' => 'post',
		    'posts_per_page'      => 3,
		    'post_status'         => 'publish',
		    'ignore_sticky_posts' => true
	    );
	    $multicommerce_related_post_display_from = $multicommerce_customizer_all_values['multicommerce-related-post-display-from'];

	    if( 'tag' == $multicommerce_related_post_display_from ){

		    $tags = get_post_meta( $post_id, 'related-posts', true );
		    if ( !$tags ) {
			    $tags = wp_get_post_tags( $post_id, array('fields'=>'ids' ) );
			    $multicommerce_cat_post_args['tag__in'] = $tags;
		    }
		    else {
			    $multicommerce_cat_post_args['tag_slug__in'] = explode(',', $tags);
		    }
	    }
	    else{

		    $cats = get_post_meta( $post_id, 'related-posts', true );
		    if ( !$cats ) {
			    $cats = wp_get_post_categories( $post_id, array('fields'=>'ids' ) );
			    $multicommerce_cat_post_args['category__in'] = $cats;
		    }
		    else {
			    $multicommerce_cat_post_args['cat'] = $cats;
		    }

	    }
	    $multicommerce_featured_query = new WP_Query( $multicommerce_cat_post_args );
	    if( $multicommerce_featured_query->have_posts() ){
	    	?>
	    	<section class="multicommerce-related-post">
		    	<?php
			    $multicommerce_related_title = $multicommerce_customizer_all_values['multicommerce-related-title'];
			    if( !empty( $multicommerce_related_title ) ){
				    ?>
	                <div class="te-title-action-wrapper">
	                    <h2 class="widget-title"><?php echo esc_html( $multicommerce_related_title ); ?></h2>
	                </div>
				    <?php
			    }
			    ?>
	            <div class="featured-entries-col column">
				    <?php
				    $multicommerce_featured_index = 1;
				    while ( $multicommerce_featured_query->have_posts() ) :$multicommerce_featured_query->the_post();
					    $thumb = 'large';
					    $multicommerce_list_classes = 'single-list teg-col-3';
					    $multicommerce_words = 21;
					    ?>
	                    <div class="<?php echo esc_attr( $multicommerce_list_classes ); ?>">
	                        <div class="post-container">
	                            <div class="post-thumb">
	                                <a href="<?php the_permalink(); ?>">
									    <?php
									    if( has_post_thumbnail() ):
										    the_post_thumbnail( $thumb );
									    else:
										    ?>
	                                        <div class="no-image-widgets">
											    <?php
											    the_title( sprintf( '<h2 class="caption-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
											    if( !get_the_title() ){
												    the_date( '', sprintf( '<h2 class="caption-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
											    }
											    ?>
	                                        </div>
										    <?php
									    endif;
									    ?>
	                                </a>
	                            </div><!-- .post-thumb-->
	                            <div class="post-content">
	                                <div class="entry-header">
									    <?php
									    multicommerce_list_post_category();
									    the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	                                </div><!-- .entry-header -->
	                                <div class="entry-content clearfix">
									    <?php
									    $excerpt = multicommerce_excerpt_words_count( absint( $multicommerce_words ) );
									    echo '<div class="details">'.wp_kses_post( wpautop( $excerpt ) ).'</div>';
									    ?>
	                                </div><!-- .entry-content -->
	                            </div><!--.post-content-->
	                        </div><!--.post-container-->
	                    </div><!--dynamic css-->
					    <?php
					    $multicommerce_featured_index++;
				    endwhile;
				    ?>
	            </div><!--featured entries-col-->
	        </section>
            <?php
        }
	    wp_reset_postdata();
    }
endif;
add_action( 'multicommerce_related_posts', 'multicommerce_related_post_below', 10, 1 );