<?php
/**
 * Class for adding About Section Widget
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Services' ) ) {

	class Multicommerce_Services extends Multicommerce_Master_Widget {

		function __construct() {
			parent::__construct(
			/*Base ID of your widget*/
				'multicommerce_services',
				/*Widget name will appear in UI*/
				esc_html__( 'Service Section', 'multicommerce' ),
				/*Widget description*/
				array( 'description' => esc_html__( 'Show Section with beautiful Icons.', 'multicommerce' ), )
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
                    'teg_widgets_title'         => esc_html__( 'General', 'multicommerce' ),
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
                                'teg_all_page_items' => array(
				            		'teg_widgets_name'          => 'teg_all_page_items',
				            		'teg_widgets_title'         => esc_html__( 'Select Pages For About', 'multicommerce' ),
				            		'teg_widgets_default'       => '',
				            		'teg_widgets_field_type'    => 'repeater',
				            		'teg_widgets_description'   => esc_html__('Add Page, Reorder and Remove. Please do not forget to add Icon and Excerpt on selected pages.', 'multicommerce'),
				            		'repeater_row_title'        => esc_html__('Select Item', 'multicommerce'),
				            		'teg_add_new_label'        => esc_html__('Add Item', 'multicommerce'),
				            		'repeater'  => array(
				            			'page_icon'                  => array(
				            				'teg_repeater_name'         => 'page_icon',
				            				'teg_repeater_title'        => esc_html__( 'Page Icon', 'multicommerce' ),
				            				'teg_repeater_default'      => 'fa-th-list',
				            				'teg_repeater_field_type'   => 'icon',
				            			),
				            			'page_id'                  => array(
				            				'teg_repeater_name'         => 'page_id',
				            				'teg_repeater_title'        => esc_html__( 'Select Page', 'multicommerce' ),
				            				'teg_repeater_default'      => '',
				            				'teg_repeater_field_type'   => 'pagelist',
				            			),
				            		),
				            	),
                            ),
                        ),
                        'layout'=>array(
                            'teg_tab_label'=>esc_html__('Layout', 'multicommerce'),
                            'teg_tab_fields'=> array(
                            	'icon_layout'=>array(
                                    'teg_widgets_name'          => 'icon_layout',
                                    'teg_widgets_title'         => esc_html__( 'Icon Layout', 'multicommerce' ),
                                    'teg_widgets_default'       => 'top_large',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_widget_icon_layout(),
                                ),
                                'enable_widget_border'=>array(
                                    'teg_widgets_name'          => 'enable_widget_border',
                                    'teg_widgets_title'         => esc_html__( 'Enable widget border', 'multicommerce' ),
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'checkbox',
                                ),
                                'column_number'=>array(
                                    'teg_widgets_name'          => 'column_number',
                                    'teg_widgets_title'         => esc_html__( 'Column Number ', 'multicommerce' ),
                                    'teg_widgets_default'       => 3,
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_widget_column_number(),
                                ),
                                'single_item_link_option'=>array(
                                    'teg_widgets_name'          => 'single_item_link_option',
                                    'teg_widgets_title'         => esc_html__( 'Single item link option', 'multicommerce' ),
                                    'teg_widgets_default'       => 'disable',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_adv_link_options(),
                                ),
                                'display_type'=>array(
                                    'teg_widgets_name'          => 'display_type',
                                    'teg_widgets_title'         => esc_html__( 'Display type', 'multicommerce' ),
                                    'teg_widgets_default'       => 'column',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_widget_display_type(),
                                ),
                                'adaptive_height'=>array(
                                    'teg_widgets_name'          => 'adaptive_height',
                                    'teg_widgets_title'         => esc_html__( 'Adaptive Height?', 'multicommerce' ),
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'checkbox',
                                    'teg_widgets_description'	=> esc_html__('Adaptive height only work when you selected Carousel Column.', 'multicommerce'),
                                ),
                                'enable_prev_next'=>array(
                                    'teg_widgets_name'          => 'enable_prev_next',
                                    'teg_widgets_title'         => esc_html__( 'Enable Prev - Next on Carousel Column', 'multicommerce' ),
                                    'teg_widgets_default'       => 1,
                                    'teg_widgets_field_type'    => 'checkbox',
                                    'teg_widgets_description'	=> esc_html__('Enable Prev next only work when you selected Carousel Column.', 'multicommerce'),
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
		 * @since 1.0
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 *
		 * @return void
		 *
		 */
		public function widget( $args, $instance ) {

			$instance = (array) $instance;
			/*default values*/
			$title = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$teg_all_page_items = isset($instance['teg_all_page_items']) ? $instance['teg_all_page_items'] : array();

			$single_item_link_option = isset( $instance['single_item_link_option'] ) ? esc_attr( $instance['single_item_link_option'] ) : 'disable';
			$column_number = isset( $instance['column_number'] ) ? absint( $instance['column_number'] ) : 3;
			$display_type = isset( $instance['display_type'] ) ? esc_attr( $instance['display_type'] ) : 'column';
			$adaptive_height = isset( $instance['adaptive_height'] ) ? absint( $instance['adaptive_height'] ) : 0;
			$icon_layout = isset( $instance['icon_layout'] ) ? esc_attr( $instance['icon_layout'] ) : 'top_large';
			$view_all_option = isset( $instance['view_all_option'] ) ? esc_attr( $instance['view_all_option'] ) : 'disable';
			$all_link_text = isset( $instance['all_link_text'] ) ? esc_attr( $instance['all_link_text'] ) : '';
			$all_link_url = isset( $instance['all_link_url'] ) ? esc_url( $instance['all_link_url'] ) : '';
			$enable_prev_next = isset( $instance['enable_prev_next'] ) ? absint( $instance['enable_prev_next'] ) : '';
			$enable_widget_border = isset( $instance['enable_widget_border'] ) ? absint( $instance['enable_widget_border'] ) : 0;

			$div_attr = 'data-adaptive="'.$adaptive_height.'" data-column="'.absint( $column_number ).'" class="featured-entries-col featured-entries-about column';
            if( 'carousel' == $display_type ){
                $div_attr .= ' teg-slick-carousel"';
            }else{
                $div_attr .= ' "';
            }

			$widget_wraper_class = '';
			$is_title_part_exist = false;
			if ( !empty( $title ) || 'disable' != $view_all_option || ( 1 == $enable_prev_next && 'carousel' == $display_type ) ){
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
				     ( 1 == $enable_prev_next && 'carousel' == $display_type )
				){

					echo $args['before_title'];
					echo '<span class="widget-title-wrap">'.$title.'</span>';
					?><span class='teg-action-wrapper'><?php
						if( 'disable' != $view_all_option && !empty( $all_link_text ) && !empty( $all_link_url )){
							$target ='';
							if( 'new-tab-link' == $view_all_option ){
								$target = 'target="_blank"';
							}
							?><a href="<?php echo esc_url($all_link_url); ?>" class="all-link" <?php echo esc_html($target); ?>><?php echo esc_html($all_link_text); ?></a><?php
						}
						if( 1 == $enable_prev_next && 'carousel' == $display_type){
							?><i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i><?php
						}
					?></span><?php
					echo $args['after_title'];

				}
				?>
	            <div <?php echo $div_attr;?>>
		            <?php
		            
		            $post_in = array();
		            if  (count($teg_all_page_items) > 0 && is_array($teg_all_page_items) ){
			            foreach ( $teg_all_page_items as $about ){
				            if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
					            $post_in[] = $about['page_id'];
				            }
			            }
		            }
		            if( !empty( $post_in )):
						$query_args = array(
							'post__in'         => $post_in,
							'orderby'             => 'post__in',
							'posts_per_page'      => count( $post_in ),
							'post_type'           => 'page',
							'no_found_rows'       => true,
							'post_status'         => 'publish'
						);
						$multicommerce_featured_index = 1;
			            $multicommerce_featured_query = new WP_Query( $query_args );
			            $teg_page_details = wp_list_pluck( $teg_all_page_items, 'page_icon', 'page_id' );
			            while ( $multicommerce_featured_query->have_posts() ) :
			            	$multicommerce_featured_query->the_post();
			            	$multicommerce_list_classes = 'single-list';
			            	$column_number = absint($column_number);
				            if( 'carousel' != $display_type ){
					            if( 1 != $multicommerce_featured_index && $multicommerce_featured_index % $column_number == 1 ){
					            	?>
					            		<div class='clearfix'></div>
					            	<?php
					            }
				            }
				            if( 1 == $column_number ){
				            	$multicommerce_list_classes .= " teg-col-1";
				            }elseif( 2 == $column_number ){
				            	$multicommerce_list_classes .= " teg-col-2";
				            }elseif( 3 == $column_number ){
				            	$multicommerce_list_classes .= " teg-col-3";
				            }else{
				            	$multicommerce_list_classes .= " teg-col-4";
				            }		            
				            ?>
	                        <div class="<?php echo esc_attr( $multicommerce_list_classes ); ?>">
	                            <div class="single-item <?php echo esc_attr($icon_layout); ?>">
	                                <?php
	                                if( 'disable' != $single_item_link_option ){
		                                $target ='';
		                                if( 'new-tab-link' == $single_item_link_option ){
			                                $target = 'target="_blank"';
		                                }
		                                ?>
		                                	<a href="<?php echo esc_url(get_permalink()); ?>" class="all-link" <?php echo esc_html($target); ?>>
		                                <?php
	                                }
	                                ?>
		                                <div class="icon">
		                                	<?php
		                                	$multicommerce_icon = isset($teg_page_details[get_the_ID()]) ? $teg_page_details[get_the_ID()] : '';
		                                	$multicommerce_icon = isset( $multicommerce_icon ) ? esc_attr( $multicommerce_icon ) : '';
		                                	if ( ! empty ( $multicommerce_icon ) ) { ?>
		                                		<i class="fa <?php echo esc_attr( $multicommerce_icon ); ?>"></i>
		                                		<?php
		                                	}
		                                	?>
		                                </div>
		                                <div class="content">
		                                	<h4 class="title">
		                                		<?php the_title(); ?>
		                                	</h4>
		                                	<div class="details">
		                                		<?php the_excerpt(); ?>
		                                	</div>
		                                </div>
		                            <?php
		                            if( 'disable' != $single_item_link_option ){
			                            ?>
			                            </a>
			                            <?php
		                            }
		                            ?>
	                            </div>
	                        </div><!--dynamic css-->
				            <?php
				            $multicommerce_featured_index++;
			            endwhile;
			            wp_reset_postdata();
					endif;
		            ?>
	            </div>
				<?php
				echo $args['after_widget'];
				?>
			</div>
			<?php
		}
	} // Class Multicommerce_Services ends here
}