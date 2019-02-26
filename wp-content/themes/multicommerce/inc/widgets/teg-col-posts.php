<?php
/**
 * Custom columns of category with various options
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Posts_Col' ) ) {
    /**
     * Class for adding widget
     *
     * @package ThemeEgg
     * @subpackage Multicommerce_Posts_Col
     * @since 1.0.0
     */
    class Multicommerce_Posts_Col extends Multicommerce_Master_Widget {

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'multicommerce_posts_col',
                /*Widget name will appear in UI*/
                esc_html__( 'Posts Column', 'multicommerce'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Show posts from selected category with advanced options', 'multicommerce' ), )
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
                                    'teg_wraper_class'          => 'title',
                                    'teg_widgets_title'         => esc_html__( 'Title', 'multicommerce' ),
                                    'teg_widgets_default'       => '',
                                    'teg_widgets_field_type'    => 'text',
                                ),
                                'multicommerce_post_cat'        => array(
                                    'teg_widgets_name'          => 'multicommerce_post_cat',
                                    'teg_wraper_class'          => 'multicommerce-post-cat',
                                    'teg_widgets_title'         => esc_html__( 'Select Category ', 'multicommerce' ),
                                    'teg_widgets_default'       => '-1',
                                    'teg_taxonomy_type'         => 'category',
                                    'teg_widgets_field_type'    => 'termlist',
                                ),
                                'multicommerce_post_tag'        => array(
                                    'teg_widgets_name'          => 'multicommerce_post_tag',
                                    'teg_wraper_class'          => 'multicommerce-post-tag',
                                    'teg_widgets_title'         => esc_html__( 'Select Tag ', 'multicommerce' ),
                                    'teg_widgets_default'       => '-1',
                                    'teg_taxonomy_type'         => 'post_tag',
                                    'teg_widgets_field_type'    => 'termlist',
                                ),
                                'post_advanced_option'          => array(
                                    'teg_widgets_name'          => 'post_advanced_option',
                                    'teg_widgets_title'         => esc_html__( 'Show from?', 'multicommerce' ),
                                    'teg_widgets_default'       => 'recent',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_post_advanced_options(),
                                    'teg_widget_relations'      => array(
                                        'recent' => array(
                                            'hide_fields'   => array(
                                                'multicommerce-post-cat', 
                                                'multicommerce-post-tag', 
                                            ),
                                        ),
                                        'cat'   => array(
                                            'hide_fields'   => array(
                                                'multicommerce-post-tag',
                                            ),
                                            'show_fields'   => array(
                                                'multicommerce-post-cat',
                                            ),
                                        ),
                                        'tag'   => array(
                                            'hide_fields'   => array(
                                                'multicommerce-post-cat',
                                            ),
                                            'show_fields'   => array(
                                                'multicommerce-post-tag', 
                                            ),
                                        ),
                                    ),
                                ),
                                'post_number'        => array(
                                    'teg_widgets_name'          => 'post_number',
                                    'teg_widgets_title'         => esc_html__( 'Number of posts to show', 'multicommerce' ),
                                    'teg_widgets_default'       => 4,
                                    'teg_widgets_field_type'    => 'number',
                                ),
                                'orderby'        => array(
                                    'teg_widgets_name'          => 'orderby',
                                    'teg_widgets_title'         => esc_html__( 'Order by', 'multicommerce' ),
                                    'teg_widgets_default'       => 'date',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_post_orderby(),
                                ),
                                'order'        => array(
                                    'teg_widgets_name'          => 'order',
                                    'teg_widgets_title'         => esc_html__( 'Order', 'multicommerce' ),
                                    'teg_widgets_default'       => 'DESC',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_post_order(),
                                ),
                                'multicommerce_img_size'        => array(
                                    'teg_widgets_name'          => 'multicommerce_img_size',
                                    'teg_widgets_title'         => esc_html__( 'Normal Featured Post Image', 'multicommerce' ),
                                    'teg_widgets_default'       => 'large',
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
                                'column_number'=>array(
                                    'teg_widgets_name'          => 'column_number',
                                    'teg_widgets_title'         => esc_html__( 'Column Number ', 'multicommerce' ),
                                    'teg_widgets_default'       => 3,
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_widget_column_number(),
                                ),
                                'display_type'=>array(
                                    'teg_widgets_name'          => 'display_type',
                                    'teg_widgets_title'         => esc_html__( 'Display type', 'multicommerce' ),
                                    'teg_wraper_class'          => 'display_type',
                                    'teg_widgets_default'       => 'column',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_widget_display_type(),
                                    'teg_widget_relations'      => array(
                                        'column' => array(
                                            'hide_fields'   => array(
                                                'enable-prev-next', 
                                            ),
                                        ),
                                        'carousel'   => array(
                                            'show_fields'   => array(
                                                'enable-prev-next', 
                                            ),
                                        ),
                                    ),
                                ),
                                'enable_prev_next'=>array(
                                    'teg_widgets_name'          => 'enable_prev_next',
                                    'teg_wraper_class'          => 'enable-prev-next',
                                    'teg_widgets_title'         => esc_html__( 'Enable Prev - Next on Carousel Column', 'multicommerce' ),
                                    'teg_widgets_default'       => 1,
                                    'teg_widgets_field_type'    => 'checkbox',
                                ),
                                'view_all_option'=>array(
                                    'teg_widgets_name'          => 'view_all_option',
                                    'teg_wraper_class'          => 'view-all-option',
                                    'teg_widgets_title'         => esc_html__( 'View all options', 'multicommerce' ),
                                    'teg_widgets_default'       => 'disable',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_adv_link_options(),
                                    'teg_widget_relations'      => array(
                                        'disable' => array(
                                            'hide_fields'   => array(
                                                'all-link-text', 
                                                'all-link-url', 
                                            ),
                                        ),
                                        'normal-link'   => array(
                                            'show_fields'   => array(
                                                'all-link-text', 
                                                'all-link-url',
                                            ),
                                        ),
                                        'new-tab-link'   => array(
                                            'show_fields'   => array(
                                                'all-link-text', 
                                                'all-link-url',
                                            ),
                                        ),
                                    ),
                                ),
                                'all_link_text'=>array(
                                    'teg_widgets_name'          => 'all_link_text',
                                    'teg_wraper_class'          => 'all-link-text',
                                    'teg_widgets_title'         => esc_html__( 'All link text', 'multicommerce' ),
                                    'teg_widgets_default'       => '',
                                    'teg_widgets_field_type'    => 'text',
                                ),
                                'all_link_url'=>array(
                                    'teg_widgets_name'          => 'all_link_url',
                                    'teg_wraper_class'          => 'all-link-url',
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

            $instance =(array) $instance;

            $multicommerce_before_widget = 'before_widgets_'.$this->id_base;

            do_action( $multicommerce_before_widget, $args, $instance, $this );

            $multicommerce_post_cat = isset( $instance['multicommerce_post_cat'] ) ? absint( $instance['multicommerce_post_cat'] ) : '';
	        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : get_cat_name($multicommerce_post_cat);
	        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $multicommerce_post_tag = isset( $instance['multicommerce_post_tag'] ) ? absint( $instance['multicommerce_post_tag'] ) : '';
            $post_advanced_option = isset( $instance['post_advanced_option'] ) ? esc_attr( $instance['post_advanced_option'] ) : 'recent'; 
            $post_number = isset( $instance['post_number'] ) ? absint( $instance['post_number'] ) : 4; 
            $column_number = isset( $instance['column_number'] ) ? absint( $instance['column_number'] ) : 3; 
            $display_type = isset( $instance['display_type'] ) ? esc_attr( $instance['display_type'] ) : 'column'; 
            $orderby = isset( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : 'date';
            $order = isset( $instance['order'] ) ? esc_attr( $instance['order'] ) : 'DESC';
            $view_all_option = isset( $instance['view_all_option'] ) ? esc_attr( $instance['view_all_option'] ) : 'disable';
            $all_link_text = isset( $instance['all_link_text'] ) ? esc_html( $instance['all_link_text'] ) : '';
            $all_link_url = isset( $instance['all_link_url'] ) ? esc_url( $instance['all_link_url'] ) : '';
            $enable_prev_next = isset( $instance['enable_prev_next'] ) ? absint( $instance['enable_prev_next'] ) : '';
            $multicommerce_img_size = isset( $instance['multicommerce_img_size'] ) ? esc_attr( $instance['multicommerce_img_size'] ) : 'large';
            $enable_widget_border = isset( $instance['enable_widget_border'] ) ? absint( $instance['enable_widget_border'] ) : 0;

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

                /**
                 * Filter the arguments for the Recent Posts widget.
                 *
                 * @since 1.0.0
                 *
                 * @see WP_Query
                 *
                 */
    	        $sticky = get_option( 'sticky_posts' );
    	        $query_args = array(
    		        'posts_per_page' => $post_number,
    		        'post_status'    => 'publish',
    		        'post_type'      => 'post',
    		        'no_found_rows'  => 1,
    		        'order'          => $order,
    		        'ignore_sticky_posts' => true,
    		        'post__not_in' => $sticky
    	        );
    	        switch ( $post_advanced_option ) {

    		        case 'cat' :
    			        $query_args['cat'] = $multicommerce_post_cat;
    			        break;

    		        case 'tag' :
    			        $query_args['tag'] = $multicommerce_post_tag;
    			        break;
    	        }

    	        switch ( $orderby ) {

                    case 'ID' :
    		        case 'author' :
    		        case 'title' :
    		        case 'date' :
    		        case 'modified' :
    		        case 'rand' :
    		        case 'comment_count' :
    		        case 'menu_order' :
    			        $query_args['orderby']  = $orderby;
    			        break;

    		        default :
    			        $query_args['orderby']  = 'date';
    	        }

                

                $multicommerce_featured_query = new WP_Query( $query_args );

                if ($multicommerce_featured_query->have_posts()) :
                    echo $args['before_widget'];
    	            if ( !empty( $title ) ||
    	                 'disable' != $view_all_option ||
    	                 ( 1 == $enable_prev_next && 'carousel' == $display_type )
    	            ){
    		            if( -1 != $multicommerce_post_cat ){
    			            echo "<div class='te-cte-color-wrap-".$multicommerce_post_cat."'>";
    		            }
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

    		            if( 1 == $enable_prev_next && 'carousel' == $display_type){
    		                echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
                        }
    		            echo "</span>";/*.teg-action-wrapper*/

    		            echo $args['after_title'];
    		            if( -1 != $multicommerce_post_cat ){
    			            echo "</div>";
    		            }
    	            }
    	            $div_attr = 'data-column="'.absint( $column_number ).'" class="featured-entries-col column';
    	            if( 'carousel' == $display_type ){
    		            $div_attr .= ' teg-slick-carousel"';
    	            }else{
                        $div_attr .= ' "';
                    }
                    ?>
                    <div <?php echo $div_attr;?>>
    	                <?php
    	                $multicommerce_featured_index = 1;
    	                while ( $multicommerce_featured_query->have_posts() ) :$multicommerce_featured_query->the_post();
    		                $thumb = $multicommerce_img_size;
    		                $multicommerce_list_classes = 'single-list';
    		                $multicommerce_words = 21;
    		                if( 'carousel' != $display_type ){
    			                if( 1 != $multicommerce_featured_index && $multicommerce_featured_index % $column_number == 1 ){
    				                echo "<div class='clearfix'></div>";
    			                }
    		                }
                            if( 1 == $column_number ){
                                $multicommerce_list_classes .= " teg-col-1";
                            }
                            elseif( 2 == $column_number ){
                                $multicommerce_list_classes .= " teg-col-2";
                            }
                            elseif( 3 == $column_number ){
                                $multicommerce_list_classes .= " teg-col-3";
                            }
                            else{
                                $multicommerce_list_classes .= " teg-col-4";
                            }
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
                                                    <h2 class="caption-title"><?php the_title(); ?></h2>
    					                            <?php
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
                                            $show_category_listing = apply_filters( 'multicommerce_show_category_listing', true, $instance, $this );
                                            if($show_category_listing){
        			                            multicommerce_list_post_category();
                                            }
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
                    <?php
                    echo $args['after_widget'];
                    echo "<div class='clearfix'></div>";
                    // Reset the global $the_post as this query will have stomped on it
                endif;
    	        wp_reset_postdata();
                ?>
            </div>
            <?php

            $multicommerce_after_widget = 'after_widgets_'.$this->id_base;

            do_action( $multicommerce_after_widget, $args, $instance, $this );

        }
    } // Class Multicommerce_Posts_Col ends here
}