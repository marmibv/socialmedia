<?php
/**
 * Class for adding Featured Column Section Widget
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Featured_Page' ) ) {

    class Multicommerce_Featured_Page extends Multicommerce_Master_Widget {

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'multicommerce_featured_page',
                /*Widget name will appear in UI*/
                esc_html__( 'Featured Section', 'multicommerce'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Select page and Show title, featured image and excerpt', 'multicommerce' ), )
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
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'text',

                                ),
                                'first_page_id' => array(
                                    'teg_widgets_name'          => 'first_page_id',
                                    'teg_widgets_title'         => esc_html__( 'Select first featured page', 'multicommerce' ),
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'pagelist',
                                    'teg_widgets_description'                          => esc_html__(' Select a Page which have featured image and excerpts.', 'multicommerce')
                                ),
                                'first_button_text'             => array(
                                    'teg_widgets_name'          => 'first_button_text',
                                    'teg_widgets_title'         => esc_html__( 'First Button Text', 'multicommerce' ),
                                    'teg_widgets_default'       => esc_html__( 'Shop Now', 'multicommerce' ),
                                    'teg_widgets_field_type'    => 'text',

                                ),
                                'first_button_url'             => array(
                                    'teg_widgets_name'          => 'first_button_url',
                                    'teg_widgets_title'         => esc_html__( 'First Button Url', 'multicommerce' ),
                                    'teg_widgets_default'       => '',
                                    'teg_widgets_field_type'    => 'url',

                                ),
                                'second_page_id' => array(
                                    'teg_widgets_name'          => 'second_page_id',
                                    'teg_widgets_title'         => esc_html__( 'Select second featured page', 'multicommerce' ),
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'pagelist',
                                    'teg_widgets_description'                          => esc_html__(' Select a Page which have featured image and excerpts.', 'multicommerce')
                                ),
                                'second_button_text'             => array(
                                    'teg_widgets_name'          => 'second_button_text',
                                    'teg_widgets_title'         => esc_html__( 'Second Button Text', 'multicommerce' ),
                                    'teg_widgets_default'       => esc_html__( 'Shop Now', 'multicommerce' ),
                                    'teg_widgets_field_type'    => 'text',

                                ),
                                'second_button_url'             => array(
                                    'teg_widgets_name'          => 'second_button_url',
                                    'teg_widgets_title'         => esc_html__( 'Second Button Url', 'multicommerce' ),
                                    'teg_widgets_default'       => '',
                                    'teg_widgets_field_type'    => 'url',
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

	        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $first_page_id = isset($instance[ 'first_page_id' ] ) ? absint( $instance[ 'first_page_id' ] ) : '';
            $first_button_text = isset($instance[ 'first_button_text' ]) ? esc_html( $instance[ 'first_button_text' ] ) : '';
            $first_button_url = isset($instance[ 'first_button_url' ]) ? esc_url( $instance[ 'first_button_url' ] ) : '';

            $second_page_id = isset($instance[ 'second_page_id' ] ) ? absint( $instance[ 'second_page_id' ] ) : '';
            $second_button_text = isset($instance[ 'second_button_text' ]) ? esc_html( $instance[ 'second_button_text' ] ) : '';
            $second_button_url = isset($instance[ 'second_button_url' ]) ? esc_url( $instance[ 'second_button_url' ] ) : '';
            $enable_widget_border = isset( $instance['enable_widget_border'] ) ? absint( $instance['enable_widget_border'] ) : 0;

            $widget_wraper_class = '';
            $is_title_part_exist = false;
            if ( !empty( $title ) ){
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
    	        if ( !empty( $title ) ){

    		        echo $args['before_title'];
    		        echo '<span class="widget-title-wrap">'.$title.'</span>';
    		        echo $args['after_title'];
    	        }
    	        ?>
                <div class="featured-entries-col featured-entries-page">
    		        <?php
    		        $post_in = array();
    		        if( !empty( $first_page_id ) && 0 != $first_page_id ){
    			        $post_in[] = $first_page_id;
                    }
                    if( !empty( $second_page_id ) && 0 != $second_page_id ){
    		            $post_in[] = $second_page_id;
    		        }

    		        if( !empty( $post_in )) :
    			        $query_args = array(
    				        'post__in'         => $post_in,
    				        'orderby'             => 'post__in',
    				        'posts_per_page'      => count( $post_in ),
    				        'post_type'           => 'page',
    				        'no_found_rows'       => true,
    				        'post_status'         => 'publish'
    			        );
    			        $multicommerce_featured_query = new WP_Query( $query_args );
    			        $total_post = $multicommerce_featured_query->post_count;
    			        $multicommerce_featured_index = 1;
    			        
    			        while ( $multicommerce_featured_query->have_posts() ) :$multicommerce_featured_query->the_post();
                            if( 2 == $total_post ){
                                $multicommerce_list_classes = " teg-col-2";
                            }
                            else{
                                $multicommerce_list_classes = " teg-col-1";
                            }
    				        $multicommerce_list_classes .= " index-".absint( $multicommerce_featured_index );
    				        if (has_post_thumbnail()) {
    					        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full' );
    				        } else {
    					        $image_url[0] = get_template_directory_uri() . '/assets/img/multicommerce-default.jpg';
    				        }
    				        $bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
    				        ?>
                            <div class="feature-promo <?php echo esc_attr( $multicommerce_list_classes ); ?>">
                                <div class="no-media-query single-unit" style="<?php echo esc_attr( $bg_image_style ); ?>">
                                    <div class="page-details">
                                        <h3 class="title">
    		                                <?php the_title(); ?>
                                        </h3>
                                        <div class="details">
    		                                <?php the_excerpt(); ?>
                                        </div>
    	                                <?php
    	                                if( 1 == $multicommerce_featured_index ){
    		                                if( !empty( $first_button_text ) ){
    			                                echo '<div class="slider-buttons"><a href="'.$first_button_url.'" class="slider-button secondary" '." ".'>'.$first_button_text.'</a></div>';
    		                                }
    	                                }
    	                                if( 2 == $multicommerce_featured_index ){
    		                                if( !empty( $second_button_text ) ){
    			                                echo '<div class="slider-buttons"><a href="'.$second_button_url.'" class="slider-button secondary" '." ".'>'.$second_button_text.'</a></div>';
    		                                }
    	                                }
    	                                ?>
                                    </div>
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
    } // Class Multicommerce_Featured_Page ends here
}