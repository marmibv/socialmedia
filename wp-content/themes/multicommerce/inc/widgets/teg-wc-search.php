<?php
/**
 * Custom Search Widget
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
if ( ! class_exists( 'Multicommerce_Advanced_Search_Widget' ) ) :
	/**
	 * Class for adding search widget
	 * A new way to add search form
	 * @package ThemeEgg
	 * @subpackage MultiCommerce
	 * @since 1.0.0
	 */
	class Multicommerce_Advanced_Search_Widget extends Multicommerce_Master_Widget{
		
		function __construct() {
			parent::__construct(
			/*Base ID of your widget*/
				'multicommerce_advanced_search',
				/*Widget name will appear in UI*/
				esc_html__( 'Advanced WooCommerce Search', 'multicommerce'),
				/*Widget description*/
				array( 'description' => esc_html__( 'Add Advanced WooCommerce Search Widget', 'multicommerce' ), )
			);
		}

		/**
         * Helper function that holds widget fields
         * Array is used in update and form functions
         */
        public function widget_fields(){

            $fields = array(
            	'multicommerce_search_placeholder'    => array(
            		'teg_widgets_name'          => 'multicommerce_search_placeholder',
            		'teg_widgets_title'         => esc_html__( 'Search Placeholder', 'multicommerce' ),
            		'teg_widgets_default'       => 'Search product',
            		'teg_widgets_field_type'    => 'text',
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
		 * @return void
		 *
		 */
		function widget( $args, $instance ) {
			$instance = (array)$instance;
			global $multicommerce_search_placeholder;
			$multicommerce_search_placeholder = isset($instance['multicommerce_search_placeholder']) ? esc_attr( $instance['multicommerce_search_placeholder'] ) : '';
			echo $args['before_widget'];
			if ( multicommerce_is_woocommerce_active() ) :
				get_template_part( 'template-parts/product-search' );
			else :
				get_search_form();
			endif;
			echo $args['after_widget'];
		}

	}
endif;