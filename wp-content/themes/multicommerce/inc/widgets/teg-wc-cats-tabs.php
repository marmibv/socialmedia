<?php
/**
 * Custom columns of category with various options
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Wc_Cats_Tabs' ) ) {
    
    /**
     * Class for adding widget
     *
     * @package ThemeEgg
     * @subpackage Multicommerce_Wc_Cats_Tabs
     * @since 1.0.0
     */
    class Multicommerce_Wc_Cats_Tabs extends Multicommerce_Master_Widget {

        /*defaults values for fields*/
        private $thumb;

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'multicommerce_wc_cats_tabs',
                /*Widget name will appear in UI*/
                esc_html__( 'WooCommerce Cats Tabs', 'multicommerce'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Show WooCommerce Category and Product on Tabs', 'multicommerce' ), )
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
                                    'teg_widgets_title'         => esc_html__( 'Select Feature Categories', 'multicommerce' ),
                                    'teg_taxonomy_type'         => 'product_cat',
                                    'teg_widgets_default'       => array(),
                                    'teg_widgets_field_type'    => 'multitermlist',
                                ),
                                'post_number'    => array(
                                    'teg_widgets_name'          => 'post_number',
                                    'teg_widgets_title'         => esc_html__( 'Number of posts to show', 'multicommerce' ),
                                    'teg_widgets_default'       => 4,
                                    'teg_widgets_field_type'    => 'number',
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
                                    'teg_widgets_title'         => esc_html__( 'Order', 'multicommerce' ),
                                    'teg_widgets_default'       => 'desc',
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
                                'column_number'    => array(
                                    'teg_widgets_name'          => 'column_number',
                                    'teg_widgets_title'         => esc_html__( 'Column Number', 'multicommerce' ),
                                    'teg_widgets_default'       => 4,
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
                                'enable_prev_next'=>array(
                                    'teg_widgets_name'          => 'enable_prev_next',
                                    'teg_widgets_title'         => esc_html__( 'Enable Prev - Next on Carousel Column', 'multicommerce' ),
                                    'teg_widgets_default'       => 1,
                                    'teg_widgets_field_type'    => 'checkbox',
                                ),
                                'wc_cat_display_option'=>array(
                                    'teg_widgets_name'          => 'wc_cat_display_option',
                                    'teg_widgets_title'         => esc_html__( 'Selected category options', 'multicommerce' ),
                                    'teg_widgets_default'       => 'disable',
                                    'teg_widgets_field_type'    => 'select',
                                    'teg_widgets_field_options' => multicommerce_wc_cat_display_options(),
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
	        $title = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	        $multicommerce_featured_cats = array_map( 'esc_attr', $instance['multicommerce_featured_cats'] );

	        $post_number = absint( $instance[ 'post_number' ] );
	        $column_number = absint( $instance[ 'column_number' ] );
	        $display_type = esc_attr( $instance[ 'display_type' ] );
	        $wc_cat_display_option = esc_attr( $instance[ 'wc_cat_display_option' ] );
	        $orderby = esc_attr( $instance[ 'orderby' ] );
	        $order = esc_attr( $instance[ 'order' ] );
	        $view_all_option = esc_attr( $instance[ 'view_all_option' ] );
	        $all_link_text = esc_html( $instance[ 'all_link_text' ] );
	        $all_link_url = esc_url( $instance[ 'all_link_url' ] );
	        $enable_prev_next = esc_attr( $instance['enable_prev_next'] );
	        $this->thumb = $multicommerce_img_size = esc_attr( $instance['multicommerce_img_size'] );
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
    	        /*test start*/
    	        echo $args['before_widget'];
    	        if(!empty( $multicommerce_featured_cats ) ){
    		        if ( !empty( $title ) ||
    		             'disable' != $view_all_option ||
    		             ( 1 == $enable_prev_next && 'carousel' == $display_type )
    		        ){

    			        echo $args['before_title'];
    			        echo '<span class="widget-title-wrap">'.$title.'</span>';
    			        echo '<i class="fa fa-angle-down mobile-only toggle-cats"></i>';
    			        echo "<span class='teg-action-wrapper te-tabs'>";
    			        $i = 0;
    			        foreach ( $multicommerce_featured_cats as $key => $term_id ){
    				        $taxonomy = 'product_cat';
    				        $term = get_term_by( 'id', $term_id, $taxonomy );
    				        if ( $term && ! is_wp_error( $term ) ) {
    					        $term_name = $term->name;
    					        $active = ( $i == 0 ? ' active' : '');
    					        echo "<span class='te-cte-color-wrap-".esc_attr( $term_id.$active )."' data-id='".esc_attr( $term_id )."'>";
    					        echo esc_html( $term_name );
    					        echo "</span>";
    					        $i++;
                            }
                        }
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
    		        }
    		        $i = 0;
    		        foreach ( $multicommerce_featured_cats as $key => $term_id ) {

    			        $active = ( $i == 0 ? ' active' : '');
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
                            'meta_query' => array(),
    				        'tax_query'      => array(
    					        'relation' => 'AND',
    					        array(
    						        'taxonomy' => 'product_cat',
    						        'field'    => 'term_id',
    						        'terms'    => $term_id,
    					        ),
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'exclude-from-catalog',
                                    'operator' => 'NOT IN',
                                ),
    				        ),
    			        );

    			        switch ( $orderby ){

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
    			        $multicommerce_featured_query = new WP_Query( $query_args );
    			        if ($multicommerce_featured_query->have_posts()) :

                            $div_attr = 'data-column="'.absint( $column_number ).'" class="featured-entries-col woocommerce column';
                            if( 'carousel' == $display_type ){
                                $div_attr .= ' teg-slick-carousel"';
                            }else{
                                $div_attr .= ' "';
                            }

    				        echo "<div class='te-tabs-wrap " .$wc_cat_display_option.' '.$active. "' data-id='".esc_attr( $term_id )."'>";
    				        if( 'disable' != $wc_cat_display_option ){
    					        $taxonomy = 'product_cat';
    					        $term_id = absint($term_id);
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
                                <div class="te-cte-product-wrap clearfix">
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
                                /*single_product_archive_thumbnail_size*/
                                add_filter( 'single_product_archive_thumbnail_size', array( $this, 'single_product_archive_thumbnail_size' ) );
    					        $multicommerce_featured_index = 1;
    					        while ( $multicommerce_featured_query->have_posts() ) :
                                    $multicommerce_featured_query->the_post();
    						        $multicommerce_list_classes = 'single-list';
    						        if( 'carousel' != $display_type ){
    							        if( 1 != $multicommerce_featured_index && $multicommerce_featured_index % $column_number == 1 ){
    								        echo "<div class='clearfix'></div>";
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
                                        <ul class="post-container products">
    								        <?php wc_get_template_part( 'content', 'product' ); ?>
                                        </ul><!--.post-container-->
                                    </div><!--dynamic css-->
    						        <?php
    						        $multicommerce_featured_index++;
    					        endwhile;
                                remove_filter( 'single_product_archive_thumbnail_size', array( $this, 'single_product_archive_thumbnail_size' ) );
    					        ?>
                            </div><!--featured entries-col-->
    				        <?php
    				        if( 'disable' != $wc_cat_display_option){
    					        ?>
                                </div><!--cat product wrap-->
    					        <?php
    				        }
    				        echo "</div>";/*.te-tabs-wrap*/
    				        // Reset the global $the_post as this query will have stomped on it
    			        endif;
    			        wp_reset_postdata();
    			        $i++;
    		        }
    	        }
    	        /*test end*/
    	        echo $args['after_widget'];
    	        ?>
            </div>
            <div class='clearfix'></div>
            <?php
        }
    } // Class Multicommerce_Wc_Cats_Tabs ends here
}