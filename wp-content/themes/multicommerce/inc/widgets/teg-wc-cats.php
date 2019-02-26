<?php
/**
 * Feature Section Types
 * Two different types
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! function_exists( 'multicommerce_wc_feature_type_default' ) ) :
	function multicommerce_wc_feature_type_default( $multicommerce_featured_cats, $term_per_slide, $multicommerce_img_size, $number_of_product_text ){
		$i = 1;
		$j = 1;
		$total_items = count( $multicommerce_featured_cats );
		$remaining_items = $total_items;

		$current_slide_number = 1;
		$multicommerce_slider_display_options = $term_per_slide;

		$total_posts = $multicommerce_slider_display_options;
		if( $multicommerce_slider_display_options > $remaining_items ){
			$total_posts = $remaining_items;
		}

		$fixed ='';
		if( $remaining_items < $multicommerce_slider_display_options || $multicommerce_slider_display_options < 3 ){
			$fixed = 'fix remain-'.$remaining_items;
		}

		echo "<div class='te-unique-slide ".esc_attr( $fixed )."'>";
		foreach ( $multicommerce_featured_cats as $term_id ) {
			$taxonomy = 'product_cat';
			$term_id = absint($term_id);
			$term = get_term_by( 'id', $term_id, $taxonomy );
			if ( $term && ! is_wp_error( $term ) ) {

				$term_link = get_term_link( $term_id, $taxonomy );
				$term_name = $term->name;
				$total_product = $term->count;
				$thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
				$image_url = wp_get_attachment_image_src( $thumbnail_id, $multicommerce_img_size );
				if ( !$image_url ) {
					$image_url[0] =  get_template_directory_uri() . '/assets/img/multicommerce-default.jpg';
				}
				if( $j > $multicommerce_slider_display_options ){
					if( $multicommerce_slider_display_options == 1 || $j % $multicommerce_slider_display_options == 1 ){
						$current_slide_number = $current_slide_number + 1;
						$remaining_items = $remaining_items - $multicommerce_slider_display_options;
						if( $multicommerce_slider_display_options > $remaining_items ){
							$total_posts = $remaining_items;
						}
						$fixed ='';
						if( $remaining_items < $multicommerce_slider_display_options || $multicommerce_slider_display_options < 3 )
							if( $remaining_items < $multicommerce_slider_display_options ){
								$fixed = 'fix remain-'.$remaining_items;
							}
						$i = 1;
						echo "</div><div class='te-unique-slide ".esc_attr( $fixed )."'>";
					}
				}
				$col = 'teg-col-1';
				if( 1 == $total_posts ){
					$col = 'te-extra-height teg-col-1';
				}
                elseif( 2 == $total_posts ){
					$col = 'te-extra-height teg-col-2';
				}
                elseif( 3 == $total_posts ){
					$col = 'teg-col-2';
					if( $i == 3 ){
						echo "<div class='clearfix'></div>";
						$col = 'teg-col-1';
					}
				}
                elseif( 4 == $total_posts ){
					$col = 'teg-col-2';
				}
                elseif( 5 == $total_posts ){
					$col = 'teg-col-2';
					if( $i > 2 ){
						$col = 'teg-col-3';
					}
				}
                elseif( 6 == $total_posts ){
					$col = 'teg-col-3';
				}
				?>
                <div class="single-list <?php echo esc_attr( $col ).' atsi-'.absint( $i ); ?>">
                    <div class="no-media-query single-unit" style="background-image:url(<?php echo esc_url( $image_url[0] ); ?>);">
                        <a class="te-overlay" href="<?php the_permalink()?>"></a>
                        <div class="cte-details">
                            <a href="<?php echo esc_url( $term_link ); ?>">
                                <div class="cte-title">
                                    <h3><?php echo esc_html( $term_name ); ?><span><?php echo esc_html( $total_product ).' '.esc_html( $number_of_product_text ); ?> </span></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
				<?php
				$i++;
				$j++;
			}
		}
		echo "</div>";/*te-unique-slide te-custom-slide*/
	}
endif;

if ( ! function_exists( 'multicommerce_wc_feature_type_two' ) ) :
	function multicommerce_wc_feature_type_two( $multicommerce_featured_cats, $term_per_slide, $multicommerce_img_size, $number_of_product_text ){
		$i = 1;
		$j = 1;
		$total_items = count( $multicommerce_featured_cats );
		$remaining_items = $total_items;

		$current_slide_number = 1;
		$multicommerce_slider_display_options = $term_per_slide;

		$total_posts = $multicommerce_slider_display_options;
		if( $multicommerce_slider_display_options > $remaining_items ){
			$total_posts = $remaining_items;
		}

		$fixed ='';
		$closed = 1;
		if( $remaining_items < $multicommerce_slider_display_options || $multicommerce_slider_display_options < 3 ){
			$fixed = 'fix remain-'.$remaining_items;
		}

		echo "<div class='te-unique-slide ".esc_attr( $fixed )."'>";
		foreach ( $multicommerce_featured_cats as $term_id ) {
			$taxonomy = 'product_cat';
			$term_id = absint($term_id);
			$term = get_term_by( 'id', $term_id, $taxonomy );
			if ( $term && ! is_wp_error( $term ) ) {
				$term_link = get_term_link( $term_id, $taxonomy );
				$term_name = $term->name;
				$total_product = $term->count;
				$thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
				$image_url = wp_get_attachment_image_src( $thumbnail_id, $multicommerce_img_size );
				if ( !$image_url ) {
					$image_url[0] =  get_template_directory_uri() . '/assets/img/multicommerce-default.jpg';
				}
				if( $j > $multicommerce_slider_display_options ){
					if( $multicommerce_slider_display_options == 1 || $j % $multicommerce_slider_display_options == 1 ){
						$current_slide_number = $current_slide_number + 1;
						$remaining_items = $remaining_items - $multicommerce_slider_display_options;
						if( $multicommerce_slider_display_options > $remaining_items ){
							$total_posts = $remaining_items;
						}
						$fixed ='';
						if( $remaining_items < $multicommerce_slider_display_options || $multicommerce_slider_display_options < 3 )
							if( $remaining_items < $multicommerce_slider_display_options ){
								$fixed = 'fix remain-'.$remaining_items;
							}
						$i = 1;
						echo "</div><div class='te-unique-slide ".esc_attr( $fixed )."'>";
					}
				}
				$col = 'teg-col-1';

				/*first post slide*/
				if( $i == 1 ){
					/*open left wrapper div*/
					echo "<div class='left'>";
					if( 1 == $total_posts ){
						$col = 'te-extra-height te-extra-width teg-col-1';
					}
					else{
						$col = 'te-extra-height teg-col-1';
					}
				}
				else{
					/*close left wrapper and open right wrapper*/
					if( $i == 2 ){
						echo "</div>";
						echo "<div class='right'>";
					}

					if( 2 == $total_posts ){
						$col = 'te-extra-height teg-col-1';
					}
                    elseif( 3 == $total_posts ){
						$col = 'teg-col-1';
					}
                    elseif( 4 == $total_posts ){
						if( $i == 2 ){
							$col = 'teg-col-1';
						}
						else{
							$col = 'teg-col-2';
						}
					}
                    elseif( 5 == $total_posts ){
						$col = 'teg-col-2';
					}
				}
				?>
                <div class="single-list no-media <?php echo esc_attr( $col ).' atsi-'.absint( $i ); ?>">
                    <div class="no-media-query single-unit" style="background-image:url(<?php echo esc_url( $image_url[0] ); ?>);">
                        <a class="te-overlay" href="<?php the_permalink()?>"></a>
                        <div class="cte-details">
                            <a href="<?php echo esc_url( $term_link ); ?>">
                                <div class="cte-title">
                                    <h3><?php echo esc_html( $term_name ); ?><span><?php echo esc_html( $total_product ).' '.esc_html( $number_of_product_text ); ?> </span></h3>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
				<?php
				/*close div after last item of slide*/
				$closed = 0;
				if( $i >=$total_posts  ){
					$closed =1;
					echo "</div>";
				}

				$i++;
				$j++;
			}
		}
		if( 1 != $closed ){
			echo "</div>";
		}
		echo "</div>";/*te-unique-slide te-custom-slide*/
	}
endif;

/**
 * Feature Section
 * Two different types
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Wc_Feature_Cats' ) ) {
    /**
     * Class for adding widget
     *
     * @package ThemeEgg
     * @subpackage Multicommerce_Wc_Feature_Cats
     * @since 1.0.0
     */
    class Multicommerce_Wc_Feature_Cats extends Multicommerce_Master_Widget{

        function __construct() {
            parent::__construct(
            	/*Base ID of your widget*/
                'multicommerce_wc_feature_cats',
                /*Widget name will appear in UI*/
                esc_html__( 'WooCommerce Categories', 'multicommerce'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Show WooCommerce Categories Beautifully', 'multicommerce' ), )
            );
        }

        /**
         * Helper function that holds widget fields
         * Array is used in update and form functions
         */
        public function widget_fields(){

            $fields = array(

                'multicommerce_widget_tab'    => array(
                    'teg_widgets_name'          => 'multicommerce_widget_tab',
                    'teg_widgets_title'         => esc_html__( 'Widget Tab', 'multicommerce' ),
                    'teg_widgets_default'       => 'general',
                    'teg_widgets_field_type'    => 'tabgroup',
                    'teg_widgets_tabs'          => array(
                        'general'=>array(
                            'teg_tab_label'=>esc_html__('General', 'multicommerce'),
                            'teg_tab_fields'=> array(
                            	'title'    => array(
				            		'teg_widgets_name'          => 'title',
				            		'teg_widgets_title'         => esc_html__( 'Title', 'multicommerce' ),
				            		'teg_widgets_default'       => '',
				            		'teg_widgets_field_type'    => 'text',
				            	),
				            	'multicommerce_featured_cats'    => array(
				            		'teg_widgets_name'          => 'multicommerce_featured_cats',
				            		'teg_widgets_title'         => esc_html__( 'Select Feature Categories ', 'multicommerce' ),
				            		'teg_taxonomy_type'			=> 'product_cat',
				            		'teg_widgets_default'       => '',
				            		'teg_widgets_field_type'    => 'multitermlist',
				            	),
				            	'number_of_product_text'    => array(
				            		'teg_widgets_name'          => 'number_of_product_text',
				            		'teg_widgets_title'         => esc_html__( 'Product Text', 'multicommerce' ),
				            		'teg_widgets_default'       => '',
				            		'teg_widgets_field_type'    => 'text',
				            	),
				            	'multicommerce_img_size'    => array(
				            		'teg_widgets_name'          => 'multicommerce_img_size',
				            		'teg_widgets_title'         => esc_html__( 'Image Size', 'multicommerce' ),
				            		'teg_widgets_default'       => 'full',
				            		'teg_widgets_field_type'    => 'select',
				            		'teg_widgets_field_options' => multicommerce_get_image_sizes_options(),
				            	),
                            ),
                        ),
                        'layout'=>array(
                            'teg_tab_label'=>esc_html__('Layout', 'multicommerce'),
                            'teg_tab_fields'=> array(
                            	'enable_widget_border'=>array(
                                    'teg_widgets_name'          => 'enable_widget_border',
                                    'teg_widgets_title'         => esc_html__( 'Enable widget border', 'multicommerce' ),
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'checkbox',
                                ),
                            	'layout_type'    => array(
				            		'teg_widgets_name'          => 'layout_type',
				            		'teg_widgets_title'         => esc_html__( 'Select Layout', 'multicommerce' ),
				            		'teg_widgets_default'       => '',
				            		'teg_widgets_field_type'    => 'select',
				            		'teg_widgets_field_options' => multicommerce_wc_cat_layout_type(),
				            	),
				            	'enable_slider_mode'=>array(
                                    'teg_widgets_name'          => 'enable_slider_mode',
                                    'teg_widgets_title'         => esc_html__( 'Enable slider mode.', 'multicommerce' ),
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'checkbox',
                                ),
                                'term_per_slide'=>array(
                                    'teg_widgets_name'          => 'term_per_slide',
                                    'teg_widgets_title'         => esc_html__( 'Category per slide', 'multicommerce' ),
                                    'teg_widgets_default'       => 4,
                                    'teg_widgets_field_type'    => 'number',
                                ),
                                'enable_prev_next'=>array(
                                    'teg_widgets_name'          => 'enable_prev_next',
                                    'teg_widgets_title'         => esc_html__( 'Enable Prev - Next on Carousel Column', 'multicommerce' ),
                                    'teg_widgets_default'       => 1,
                                    'teg_widgets_field_type'    => 'checkbox',
                                ),
                                'view_all_option'=>array(
                                    'teg_widgets_name'          => 'view_all_option',
                                    'teg_widgets_title'         => esc_html__( 'View all options', 'multicommerce' ),
                                    'teg_widgets_default'       => 'disable',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_adv_link_options(),
                                ),
                                'all_link_text'=>array(
                                    'teg_widgets_name'          => 'all_link_text',
                                    'teg_widgets_title'         => esc_html__( 'All link text', 'multicommerce' ),
                                    'teg_widgets_default'       => '',
                                    'teg_widgets_field_type'    => 'text',
                                ),
                                'all_link_url'=>array(
                                    'teg_widgets_name'          => 'all_link_url',
                                    'teg_widgets_title'         => esc_html__( 'All link url', 'multicommerce' ),
                                    'teg_widgets_default'       => '',
                                    'teg_widgets_field_type'    => 'url',
                                ),
                            ),
                        ),
                    ),
                ),
            );

            $widget_fields_key = 'fields_'.$this->id_base;
            $widgets_fields = apply_filters( $widget_fields_key, $fields );
            return $widgets_fields;

        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            
            $instance = (array) $instance;
	        $title = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

	        $multicommerce_featured_cats = array_map( 'esc_attr', $instance['multicommerce_featured_cats'] );
	        $layout_type = esc_attr( $instance[ 'layout_type' ] );
	        $enable_slider_mode = (isset( $instance['enable_slider_mode'] ) ) ? absint( $instance['enable_slider_mode'] ) : 0;

	        $term_per_slide = absint( $instance[ 'term_per_slide' ] );
	        $view_all_option = esc_attr( $instance[ 'view_all_option' ] );
	        $all_link_text = esc_html( $instance[ 'all_link_text' ] );
	        $number_of_product_text = esc_html( $instance[ 'number_of_product_text' ] );
	        $all_link_url = esc_url( $instance[ 'all_link_url' ] );
	        $enable_prev_next = esc_attr( $instance['enable_prev_next'] );
	        $multicommerce_img_size = esc_attr( $instance['multicommerce_img_size'] );
	        $enable_widget_border = isset( $instance['enable_widget_border'] ) ? absint( $instance['enable_widget_border'] ) : 0;

	        $widget_wraper_class = '';
            $is_title_part_exist = false;
            if ( !empty( $title ) || 'disable' != $view_all_option || ( 1 == $enable_prev_next && 1 == $enable_slider_mode ) ){
                $is_title_part_exist = true;
            }
            if($is_title_part_exist){
                $widget_wraper_class .= " widget-title-enable";
            }else{
                $widget_wraper_class .= " widget-title-disable";
            }

            if($enable_widget_border){
                $widget_wraper_class .= " enabled-widget-border";
            }else{
                $widget_wraper_class .= " disabled-widget-border";
            }
            ?>
            <div class="widget-wraper <?php echo esc_attr($widget_wraper_class); ?>">
                <?php
		        echo $args['before_widget'];
		        if ( !empty( $title ) ||
		             'disable' != $view_all_option ||
		             ( 1 == $enable_prev_next && 1 == $enable_slider_mode )
		        ){

			        echo $args['before_title'];
			        echo '<span class="widget-title-wrap">'.$title.'</span>';
			        echo "<span class='teg-action-wrapper'>";
			        if( 'disable' != $view_all_option && !empty( $all_link_text ) && !empty( $all_link_url )){
				        $target ='';
				        if( 'new-tab-link' == $view_all_option ){
					        $target = 'target="_blank"';
				        }
				        echo '<a href="'.$all_link_url.'" class="all-link" '.$target.'>'.$all_link_text.'</a>';
			        }

			        if( 1 == $enable_prev_next && 1 == $enable_slider_mode ){
				        echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
			        }
			        echo "</span>";/*.teg-action-wrapper*/

			        echo $args['after_title'];
		        }
		        if(!empty( $multicommerce_featured_cats ) ){
			        if( 1 == $enable_slider_mode ){
				        $class = 'te-cte-feature-slider teg-slick-carousel';
			        }
			        else{
				        $class = 'te-cte-feature-section column';
			        }
			        ?>
	                <div class="wc-cte-feature <?php echo esc_attr( $class ); ?> layout-<?php echo esc_attr( $layout_type );?>" data-column="1">
	                    <?php

	                    if( 2 == $layout_type ){
		                    multicommerce_wc_feature_type_two( $multicommerce_featured_cats, $term_per_slide, $multicommerce_img_size, $number_of_product_text );
	                    }
	                    else{
		                    multicommerce_wc_feature_type_default( $multicommerce_featured_cats, $term_per_slide, $multicommerce_img_size, $number_of_product_text );
	                    }
	                    ?>
	                </div><!--wc-cte-feature-->
			        <?php
		        }
		        echo $args['after_widget'];
		        ?>
		    </div>
		    <?php
        }
    } // Class Multicommerce_Wc_Feature_Cats ends here
}