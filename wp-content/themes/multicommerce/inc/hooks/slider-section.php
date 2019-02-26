<?php
/**
 * Display default slider
 *
 * @since MultiCommerce 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('multicommerce_default_featured') ) :
    function multicommerce_default_featured(){
        ?>
        <div class="teg-col-2" style="background-image: url('<?php echo esc_url(get_multicommerce_placeholder_src()); ?>')">

        </div>
        <div class="teg-col-2" style="background-image: url('<?php echo esc_url(get_multicommerce_placeholder_src()); ?>')">

        </div>
        <div class="clearfix"></div>
        <div class="teg-col-3" style="background-image: url('<?php echo esc_url(get_multicommerce_placeholder_src()); ?>')">

        </div>
        <div class="teg-col-3" style="background-image: url('<?php echo esc_url(get_multicommerce_placeholder_src()); ?>')">

        </div>
        <div class="teg-col-3" style="background-image: url('<?php echo esc_url(get_multicommerce_placeholder_src()); ?>')">

        </div>
        <?php
    }
endif;

/**
 * Display related posts from same category
 *
 * @since MultiCommerce 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('multicommerce_feature_slider') ) :
    function multicommerce_feature_slider() {
	    global $multicommerce_customizer_all_values;
	    $multicommerce_feature_content_options = $multicommerce_customizer_all_values['multicommerce-feature-content-options'];
	    $multicommerce_feature_right_content_options = $multicommerce_customizer_all_values['multicommerce-feature-right-content-options'];
	    $multicommerce_fs_image_display_options = $multicommerce_customizer_all_values['multicommerce-fs-image-display-options'];
	    $slider_full = '';
	    if( 'disable' == $multicommerce_feature_right_content_options ){
	        $slider_full = 'full-width';
        }
	    if( 'disable' == $multicommerce_feature_content_options ){
		    $slider_full = 'full-width-right';
        }
	    ?>
        <div class="clearfix"></div>
        <div class="wrapper">
            <div class="slider-feature-wrap <?php echo esc_attr( $slider_full ); ?> clearfix <?php echo esc_attr( $multicommerce_fs_image_display_options );?>">
	            <?php
	            if( is_active_sidebar( 'multicommerce-before-feature' ) ) :
		            ?>
                    <div class="multicommerce-before-feature">
			            <?php
			            dynamic_sidebar( 'multicommerce-before-feature' );
			            ?>
                    </div>
		            <?php
	            endif;
		        if( 'disable' != $multicommerce_feature_content_options ){
			        ?>
                    <div class="slider-section">
				        <?php
				        $multicommerce_feature_slider_display_arrow = $multicommerce_customizer_all_values['multicommerce-feature-slider-display-arrow'];
				        $multicommerce_feature_slider_enable_autoplay = $multicommerce_customizer_all_values['multicommerce-feature-slider-enable-autoplay'];
				        if( 1 ==$multicommerce_feature_slider_display_arrow ){
					        echo "<span class='teg-action-wrapper'>";
					        echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
					        echo "</span>";/*.teg-action-wrapper*/
				        }
				        ?>
                        <div class="featured-slider te-feature-section"
                             data-autoplay="<?php echo esc_attr( $multicommerce_feature_slider_enable_autoplay );?>"
                             data-arrows="<?php echo esc_attr( $multicommerce_feature_slider_display_arrow );?>"
                        >
					        <?php
					        $multicommerce_feature_post_number = $multicommerce_customizer_all_values['multicommerce-feature-post-number'];
					        $multicommerce_feature_slider_display_cat = $multicommerce_customizer_all_values['multicommerce-feature-slider-display-cat'];
					        $multicommerce_feature_slider_display_title = $multicommerce_customizer_all_values['multicommerce-feature-slider-display-title'];
					        $multicommerce_feature_slider_display_excerpt = $multicommerce_customizer_all_values['multicommerce-feature-slider-display-excerpt'];

					        $sticky = get_option( 'sticky_posts' );

					        if( 'product' == $multicommerce_feature_content_options && multicommerce_is_woocommerce_active() ){
						        $multicommerce_feature_product_cat = $multicommerce_customizer_all_values['multicommerce-feature-product-cat'];
						        $query_args = array(
							        'posts_per_page' => $multicommerce_feature_post_number,
							        'post_status'    => 'publish',
							        'post_type'      => 'product',
							        'no_found_rows'  => 1,
							        'meta_query'     => array(),
							        'tax_query'      => array(
								        'relation' => 'AND',
							        )
						        );
						        if( 0 != $multicommerce_feature_product_cat ){
							        $query_args['tax_query'][] = array(
								        'taxonomy' => 'product_cat',
								        'field'    => 'term_id',
								        'terms'    => $multicommerce_feature_product_cat,
							        );
						        }
					        }
					        else{
						        $multicommerce_feature_post_cat = $multicommerce_customizer_all_values['multicommerce-feature-post-cat'];
						        $query_args = array(
							        'posts_per_page'      => $multicommerce_feature_post_number,
							        'no_found_rows'       => true,
							        'post_status'         => 'publish',
							        'ignore_sticky_posts' => true,
							        'post__not_in' => $sticky
						        );
						        if( 0 != $multicommerce_feature_post_cat ){
							        $query_args['cat'] = $multicommerce_feature_post_cat;
						        }
					        }

					        $slider_query = new WP_Query( $query_args );

					        if ( $slider_query->have_posts() ):
						        while ($slider_query->have_posts()): $slider_query->the_post();
							        if (has_post_thumbnail()) {
								        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							        }else{
								        $image_url = multicommerce_placeholder_image_details();
							        }
							        $bg_image_style = '';
							        if( 'full-screen-bg' == $multicommerce_fs_image_display_options ){
								        $bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
							        }
							        ?>
                                    <div class="no-media-query te-slide-unit teg-col-1" style="<?php echo esc_attr( $bg_image_style ); ?>">
								        <?php
								        if( 'responsive-img' == $multicommerce_fs_image_display_options ){
								        	if (has_post_thumbnail()) {
								        		the_post_thumbnail( 'full');
								        	} else {
								        		the_multicommerce_placeholder();
								        	}
								        }
								        ?>
                                        <a class="te-overlay" href="<?php the_permalink()?>"></a>
                                        <div class="slider-desc">
									        <?php
									        if( 1 == $multicommerce_feature_slider_display_cat ){
										        ?>
                                                <div class="above-slider-details">
											        <?php
											        if( 'product' == $multicommerce_feature_content_options && multicommerce_is_woocommerce_active() ){
												        multicommerce_list_product_category();
											        }
											        else{
												        multicommerce_list_post_category();
											        }
											        ?>
                                                </div>
										        <?php
									        }
									        if( 1 == $multicommerce_feature_slider_display_title || 1 == $multicommerce_feature_slider_display_excerpt ){
										        ?>
                                                <div class="slider-details">
											        <?php
											        if( 1 == $multicommerce_feature_slider_display_title ){
												        ?>
                                                        <div class="slide-title">
                                                            <a href="<?php the_permalink()?>">
														        <?php the_title(); ?>
                                                            </a>
                                                        </div>
												        <?php
											        }
											        if( 1 == $multicommerce_feature_slider_display_excerpt ){
												        ?>
                                                        <div class="slide-desc">
													        <?php the_excerpt();?>
                                                        </div>
												        <?php
											        }
											        ?>
                                                </div>
										        <?php
									        }
									        $multicommerce_feature_button_text = $multicommerce_customizer_all_values['multicommerce-feature-button-text'];
									        if( !empty( $multicommerce_feature_button_text )){
										        ?>
                                                <div class="slider-buttons">
                                                    <a href="<?php the_permalink()?>" class="slider-button secondary">
												        <?php
												        if( ( multicommerce_is_woocommerce_active() && 'product' == $multicommerce_feature_content_options ) || 'post' == $multicommerce_feature_content_options ){
													        echo esc_html( $multicommerce_feature_button_text );
												        }
												        ?>
                                                    </a>
                                                </div>
										        <?php
									        }
									        ?>
                                        </div>
                                    </div>
							        <?php
						        endwhile;
					        else:
						        multicommerce_default_featured();
					        endif;
					        wp_reset_postdata();
					        ?>
                        </div>
                    </div>
			        <?php
		        }
		        if( 'disable' != $multicommerce_feature_right_content_options ){
			        $multicommerce_fs_right_image_display_options = $multicommerce_customizer_all_values['multicommerce-feature-right-image-display-options'];
			        ?>
                    <div class="beside-slider <?php echo esc_attr( $multicommerce_fs_right_image_display_options ); ?>">
				        <?php
				        $multicommerce_feature_slider_right_display_arrow = $multicommerce_customizer_all_values['multicommerce-feature-right-display-arrow'];
				        $multicommerce_feature_slider_right_enable_autoplay = $multicommerce_customizer_all_values['multicommerce-feature-right-enable-autoplay'];

				        if( 1 == $multicommerce_feature_slider_right_display_arrow ){
					        echo "<span class='teg-action-wrapper'>";
					        echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
					        echo "</span>";/*.teg-action-wrapper*/
				        }
				        ?>
                        <div class="fs-right-slider"
                             data-autoplay="<?php echo esc_attr( $multicommerce_feature_slider_right_enable_autoplay);?>"
                             data-arrows="<?php echo esc_attr( $multicommerce_feature_slider_right_display_arrow );?>"
                        >
					        <?php
					        $multicommerce_feature_right_post_cat = $multicommerce_customizer_all_values['multicommerce-feature-right-post-cat'];
					        $multicommerce_feature_right_product_cat = $multicommerce_customizer_all_values['multicommerce-feature-right-product-cat'];
					        $multicommerce_feature_right_post_number = $multicommerce_customizer_all_values['multicommerce-feature-right-post-number'];
					        $multicommerce_feature_right_display_title = $multicommerce_customizer_all_values['multicommerce-feature-right-display-title'];
					        $multicommerce_feature_right_button_text = $multicommerce_customizer_all_values['multicommerce-feature-right-button-text'];

					        $sticky = get_option( 'sticky_posts' );

					        if( 'product' == $multicommerce_feature_right_content_options && multicommerce_is_woocommerce_active() ){
						        $query_args = array(
							        'posts_per_page' => $multicommerce_feature_right_post_number,
							        'post_status'    => 'publish',
							        'post_type'      => 'product',
							        'no_found_rows'  => 1,
							        'meta_query'     => array(),
							        'tax_query'      => array(
								        'relation' => 'AND',
							        )
						        );
						        if( 0 != $multicommerce_feature_right_product_cat ){
							        $query_args['tax_query'][] = array(
								        'taxonomy' => 'product_cat',
								        'field'    => 'term_id',
								        'terms'    => $multicommerce_feature_right_product_cat,
							        );
						        }
					        }
					        else{
						        $query_args = array(
							        'posts_per_page'      => $multicommerce_feature_right_post_number,
							        'no_found_rows'       => true,
							        'post_status'         => 'publish',
							        'ignore_sticky_posts' => true,
							        'post__not_in' => $sticky
						        );
						        if( 0 != $multicommerce_feature_right_post_cat ){
							        $query_args['cat'] = $multicommerce_feature_right_post_cat;
						        }
					        }

					        $slider_query = new WP_Query( $query_args );
					        while ( $slider_query->have_posts() ): $slider_query->the_post();
						        if (has_post_thumbnail()) {
							        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						        } else {
								    $image_url = multicommerce_placeholder_image_details();
						        }
						        $bg_image_style = '';
						        if( 'full-screen-bg' == $multicommerce_fs_right_image_display_options ){
							        $bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
						        }
						        ?>
                                <div class="no-media-query te-beside-slider-unit" style="<?php echo esc_attr( $bg_image_style ); ?>">
							        <?php
							        if( 'responsive-img' == $multicommerce_fs_right_image_display_options ){
							        	if (has_post_thumbnail()) {
							        		the_post_thumbnail( 'full');
							        	} else {
							        		the_multicommerce_placeholder();
							        	}
							        }
							        ?>
                                    <a class="te-overlay" href="<?php the_permalink()?>"></a>
                                    <div class="beside-slider-desc">
                                        <div class="beside-slider-content-wrapper">
									        <?php
									        if( 1 == $multicommerce_feature_right_display_title ){
										        ?>
                                                <div class="slider-details">
                                                    <div class="slide-title">
                                                        <a href="<?php the_permalink()?>">
													        <?php the_title(); ?>
                                                        </a>
                                                    </div>
                                                </div>
										        <?php
									        }
									        if( !empty( $multicommerce_feature_right_button_text ) && ( ( multicommerce_is_woocommerce_active() && 'product' == $multicommerce_feature_right_content_options ) || 'post' == $multicommerce_feature_right_content_options )){
										        ?>
                                                <div class="slider-buttons">
                                                    <a href="<?php the_permalink()?>" class="slider-button secondary">
												        <?php
												        echo esc_html( $multicommerce_feature_right_button_text );
												        ?>
                                                    </a>
                                                </div>
										        <?php
									        }
									        ?>
                                        </div>
                                    </div>
                                </div>
						        <?php
					        endwhile;
					        wp_reset_postdata();
					        ?>
                        </div><!--.fs-right-slider-->
                    </div><!--beside-slider-->
			        <?php
		        }
		        ?>
            </div><!--slider-feature-wrap-->
        </div>
        <div class="clearfix"></div>
        <?php
    }
endif;
add_action( 'multicommerce_featured_slider', 'multicommerce_feature_slider', 0 );