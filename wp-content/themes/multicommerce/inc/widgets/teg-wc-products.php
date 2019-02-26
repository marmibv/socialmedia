<?php
/**
 * Custom columns of category with various options
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Wc_Products' ) ) {
    /**
     * Class for adding widget
     *
     * @package ThemeEgg
     * @subpackage Multicommerce_Wc_Products
     * @since 1.0.0
     */
    class Multicommerce_Wc_Products extends Multicommerce_Master_Widget{

        /*defaults values for fields*/
        private $thumb;

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'multicommerce_wc_products',
                /*Widget name will appear in UI*/
                esc_html__( 'WooCommerce Products', 'multicommerce'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Show WooCommerce Products with advanced options', 'multicommerce' ), )
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
                                'multicommerce_wc_product_cat'    => array(
                                    'teg_widgets_name'          => 'multicommerce_wc_product_cat',
                                    'teg_widgets_title'         => esc_html__( 'Product Categories', 'multicommerce' ),
                                    'teg_widgets_default'       => '-1',
                                    'teg_taxonomy_type'         => 'product_cat',
                                    'teg_widgets_field_type'    => 'termlist',
                                ),
                                'multicommerce_wc_product_tag'    => array(
                                    'teg_widgets_name'          => 'multicommerce_wc_product_tag',
                                    'teg_widgets_title'         => esc_html__( 'Product Tags', 'multicommerce' ),
                                    'teg_widgets_default'       => '-1',
                                    'teg_taxonomy_type'         => 'product_tag',
                                    'teg_widgets_field_type'    => 'termlist',
                                ),
                                'wc_advanced_option'    => array(
                                    'teg_widgets_name'          => 'wc_advanced_option',
                                    'teg_widgets_title'         => esc_html__( 'Show from?', 'multicommerce' ),
                                    'teg_widgets_default'       => 'recent',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_wc_advanced_options(),
                                ),  
                                'post_number'    => array(
                                    'teg_widgets_name'          => 'post_number',
                                    'teg_widgets_title'         => esc_html__( 'Number of post to show', 'multicommerce' ),
                                    'teg_widgets_default'       => 4,
                                    'teg_widgets_field_type'    => 'number',
                                ), 
                                'wc_cat_display_option'    => array(
                                    'teg_widgets_name'          => 'wc_cat_display_option',
                                    'teg_widgets_title'         => esc_html__( 'Selected category option', 'multicommerce' ),
                                    'teg_widgets_default'       => 'disable',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_wc_cat_display_options(),
                                ),     
                                'orderby'    => array(
                                    'teg_widgets_name'          => 'orderby',
                                    'teg_widgets_title'         => esc_html__( 'Order By', 'multicommerce' ),
                                    'teg_widgets_default'       => 'date',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_wc_product_orderby(),
                                ),    
                                'order'    => array(
                                    'teg_widgets_name'          => 'order',
                                    'teg_widgets_title'         => esc_html__( 'Order By', 'multicommerce' ),
                                    'teg_widgets_default'       => 'DESC',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_post_order(),
                                ),  
                                'multicommerce_img_size'    => array(
                                    'teg_widgets_name'          => 'multicommerce_img_size',
                                    'teg_widgets_title'         => esc_html__( 'Image Size', 'multicommerce' ),
                                    'teg_widgets_default'       => 'shop_catalog',
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
                                    'teg_widgets_default'       => 'column',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_widget_display_type(),
                                ),
                                'adaptive_height'=>array(
                                    'teg_widgets_name'          => 'adaptive_height',
                                    'teg_widgets_title'         => esc_html__( 'Adaptive Height?', 'multicommerce' ),
                                    'teg_widgets_default'       => 0,
                                    'teg_widgets_field_type'    => 'checkbox',
                                    'teg_widgets_description'   => esc_html__('Adaptive height only work when you selected Carousel Column.', 'multicommerce'),
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

        function single_product_archive_thumbnail_size(){
            return $this->thumb;
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
	        $wc_advanced_option = esc_attr( $instance[ 'wc_advanced_option' ] );
	        $multicommerce_wc_product_cat = esc_attr( $instance['multicommerce_wc_product_cat'] );
	        $multicommerce_wc_product_tag = esc_attr( $instance['multicommerce_wc_product_tag'] );
	        $title = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	        $post_number = absint( $instance[ 'post_number' ] );
	        $column_number = isset( $instance['column_number'] ) ? absint( $instance['column_number'] ) : 3;
	        $display_type = esc_attr( $instance[ 'display_type' ] );
            $adaptive_height = isset( $instance['adaptive_height'] ) ? absint( $instance['adaptive_height'] ) : 0;
	        $wc_cat_display_option = esc_attr( $instance[ 'wc_cat_display_option' ] );
	        $orderby = esc_attr( $instance[ 'orderby' ] );
	        $order = esc_attr( $instance[ 'order' ] );
	        $view_all_option = esc_attr( $instance[ 'view_all_option' ] );
	        $all_link_text = esc_html( $instance[ 'all_link_text' ] );
	        $all_link_url = esc_url( $instance[ 'all_link_url' ] );
	        $enable_prev_next = esc_attr( $instance['enable_prev_next'] );
	        $this->thumb = $multicommerce_img_size = esc_attr( $instance['multicommerce_img_size'] );
            $enable_widget_border = isset( $instance['enable_widget_border'] ) ? absint( $instance['enable_widget_border'] ) : 0;
	        $product_visibility_term_ids = wc_get_product_visibility_term_ids();

	        /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 1.0.0
             *
             * @see WP_Query
             *
             */
	        $query_args = array(
		        'posts_per_page' => $post_number,
		        'post_status'    => 'publish',
		        'post_type'      => 'product',
		        'no_found_rows'  => 1,
		        'order'          => $order,
		        'meta_query'     => array(),
		        'tax_query'      => array(
			        'relation' => 'AND',
		        ),
	        );

	        switch ( $wc_advanced_option ) {

		        case 'featured' :
		            if( !empty( $product_visibility_term_ids['featured'] )){
			            $query_args['tax_query'][] = array(
				            'taxonomy' => 'product_visibility',
				            'field'    => 'term_taxonomy_id',
				            'terms'    => $product_visibility_term_ids['featured'],
			            );
                    }

			        break;

		        case 'onsale' :
			        $product_ids_on_sale    = wc_get_product_ids_on_sale();
			        if( !empty( $product_ids_on_sale ) ){
			            $query_args['post__in'] = $product_ids_on_sale;
                    }
			        break;

		        case 'cat' :
		            if( !empty( $multicommerce_wc_product_cat )){
			            $query_args['tax_query'][] = array(
				            'taxonomy' => 'product_cat',
				            'field'    => 'term_id',
				            'terms'    => $multicommerce_wc_product_cat,
			            );
                    }

			        break;

		        case 'tag' :
		            print_r( $multicommerce_wc_product_tag );
		            if( !empty( $multicommerce_wc_product_tag )){
			            $query_args['tax_query'][] = array(
				            'taxonomy' => 'product_tag',
				            'field'    => 'term_id',
				            'terms'    => $multicommerce_wc_product_tag,
			            );
                    }

			        break;
	        }

	        switch ( $orderby ) {

		        case 'price' :
			        $query_args['meta_key'] = '_price';
			        $query_args['orderby']  = 'meta_value_num';
			        break;

		        case 'sales' :
			        $query_args['meta_key'] = 'total_sales';
			        $query_args['orderby']  = 'meta_value_num';
			        break;

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
                $multicommerce_featured_query = new WP_Query( $query_args );

                if ($multicommerce_featured_query->have_posts()) :
                    echo $args['before_widget'];
    	            if ( !empty( $title ) ||
                         'disable' != $view_all_option ||
                         ( 1 == $enable_prev_next && 'carousel' == $display_type )
                    ){
    		            if( -1 != $multicommerce_wc_product_cat ){
    			            echo "<div class='te-cte-color-wrap-".esc_attr( $multicommerce_wc_product_cat )."'>";
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
    		            if( -1 != $multicommerce_wc_product_cat ){
    			            echo "</div>";
    		            }
    	            }

                    $div_attr = 'data-adaptive="'.$adaptive_height.'" data-column="'.absint( $column_number ).'" class="featured-entries-col woocommerce column';
                    if( 'carousel' == $display_type ){
                        $div_attr .= ' teg-slick-carousel"';
                    }else{
                        $div_attr .= ' "';
                    }

    	            if( 'disable' != $wc_cat_display_option && 'cat' == $wc_advanced_option ){
    		            $taxonomy = 'product_cat';
    		            $term_id = absint($multicommerce_wc_product_cat);
    		            $term_link = get_term_link( $term_id, $taxonomy );
    		            $term = get_term( $term_id, $taxonomy );
    		            $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true);
    		            if ( !empty( $thumbnail_id ) ) {
    			            $image_url = wp_get_attachment_image_src($thumbnail_id, 'full');
    		            }
    		            else{
    			            $image_url[0] =  get_template_directory_uri() . '/assets/img/multicommerce-default.jpg';
    		            }
    		            ?>
                        <div class="te-cte-product-wrap clearfix <?php echo esc_attr( $wc_cat_display_option ); ?>">
                        <div class="te-cte-block">
                            <div class="te-cte-bg" style="background-image:url(<?php echo esc_url( $image_url[0] );?>);">
                                <a href="<?php echo esc_url($term_link); ?>" class="te-overlay"></a>
                                <div class="product-details">
    		                        <?php if( !empty( $term->name ) ) {
    		                            ?>
                                        <h3>
                                            <a href="<?php echo esc_url( $term_link ); ?>">
    					                        <?php echo esc_html( $term->name ); ?>
                                            </a>
                                        </h3>
    		                        <?php
    		                        }
    		                        ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div <?php echo $div_attr;?>>
    	                <?php
    	                $multicommerce_featured_index = 1;
    	                while ( $multicommerce_featured_query->have_posts() ) :$multicommerce_featured_query->the_post();
    		                $multicommerce_list_classes = 'single-list';
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
                                <ul class="post-container products">
                                    <?php
                                    /*single_product_archive_thumbnail_size*/
                                    add_filter( 'single_product_archive_thumbnail_size', array( $this, 'single_product_archive_thumbnail_size' ) );

                                    wc_get_template_part( 'content', 'product' );

                                    remove_filter( 'single_product_archive_thumbnail_size', array( $this, 'single_product_archive_thumbnail_size' ) );
                                    ?>
                                </ul><!--.post-container-->
                            </div><!--dynamic css-->
    		                <?php
    		                $multicommerce_featured_index++;
    	                endwhile;
    	                ?>
                    </div><!--featured entries-col-->
                    <?php
    	            if( 'disable' != $wc_cat_display_option && 'cat' == $wc_advanced_option ){
    		            ?>
                        </div><!--cat product wrap-->
    		            <?php
    	            }
                    echo $args['after_widget'];
                    echo "<div class='clearfix'></div>";
                    // Reset the global $the_post as this query will have stomped on it
                endif;
    	        wp_reset_postdata();
                ?>
            </div>
            <?php
        }
    } // Class Multicommerce_Wc_Products ends here
}