<?php
/**
 * Class for adding Social Section Widget
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Social' ) ) {

    class Multicommerce_Social extends Multicommerce_Master_Widget{

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'multicommerce_social',
                /*Widget name will appear in UI*/
                esc_html__( 'Social Section', 'multicommerce'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Show Social Section.', 'multicommerce' ), )
            );
        }

        /**
         * Helper function that holds widget fields
         * Array is used in update and form functions
         */
        public function widget_fields(){

            $fields = array(
                'title'    => array(
                    'teg_widgets_name'          => 'title',
                    'teg_widgets_title'         => esc_html__( 'Title', 'multicommerce' ),
                    'teg_widgets_default'       => '',
                    'teg_widgets_field_type'    => 'text',
                ),
                'enable_widget_border'=>array(
                    'teg_widgets_name'          => 'enable_widget_border',
                    'teg_widgets_title'         => esc_html__( 'Enable widget border', 'multicommerce' ),
                    'teg_widgets_default'       => 0,
                    'teg_widgets_field_type'    => 'checkbox',
                ),
            );

            $widget_fields_key = 'fields_'.$this->id_base;
            $widgets_fields = apply_filters( $widget_fields_key, $fields );
            return $widgets_fields;

        }

        /*Widget Backend*/
        public function form( $instance ) {

            parent::form($instance);
            ?>

            <p>
                <?php
                if( is_customize_preview() ){
	                printf( esc_html__( 'Add/Edit Social Icons from %1$s Here %2$s ', 'multicommerce' ), '<a class="te-customizer button button-primary" data-section="multicommerce-social-options" style="cursor: pointer">','</a>' );
                }
                else{
	                printf( esc_html__( 'Add/Edit Social Icons from %1$s Here %2$s ', 'multicommerce' ), '<a target="_blank" href="'.esc_url( admin_url( 'customize.php' ) ).'?autofocus[section]=multicommerce-social-options'.'" class="button button-primary">','</a>' );
                }
                ?>
            </p>
            <?php
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

            /*default values*/
            $title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
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
                <div class="featured-entries-col featured-social">
    	            <?php
    	            do_action('multicommerce_action_social_links');
    	            ?>
                </div>
    	        <?php
    	        echo $args['after_widget'];
                ?>
            </div>
            <?php
        }
    } // Class Multicommerce_Social ends here
}