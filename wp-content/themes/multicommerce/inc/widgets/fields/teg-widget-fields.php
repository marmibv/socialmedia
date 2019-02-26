<?php
/**
 * Define custom fields for widgets
 *
 * @package Theme Egg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */

function teg_widgets_show_widget_field( $instance = '', $widget_field = '', $athm_field_value = '' ) {

	extract( $widget_field );
	switch ( $teg_widgets_field_type ) {

		// Standard text field
		case 'text':
			require multicommerce_file_directory('inc/widgets/fields/teg-text-field.php');
			break;
		// Standard text field
		case 'color':
			require multicommerce_file_directory('inc/widgets/fields/teg-color-field.php');
			break;
		// Standard url field
		case 'url' :
			require multicommerce_file_directory('inc/widgets/fields/teg-url-field.php');
			break;
		// Checkbox field
		case 'checkbox' :
			require multicommerce_file_directory('inc/widgets/fields/teg-checkbox-field.php');
			break;

		// Textarea field
		case 'textarea' :
			require multicommerce_file_directory('inc/widgets/fields/teg-textarea-field.php');
			break;
		// Radio fields
		case 'radio' :
			require multicommerce_file_directory('inc/widgets/fields/teg-radio-field.php');
			break;
		// Radio fields
		case 'icon' :
			require multicommerce_file_directory('inc/widgets/fields/teg-icon-field.php');
			break;
		// Select field
		case 'select' :
			require multicommerce_file_directory('inc/widgets/fields/teg-select-field.php');
			break;
		// MultiSelect field
		case 'multiselect' :
			require multicommerce_file_directory('inc/widgets/fields/teg-multiselect-field.php');
			break;
		case 'pagelist' :
			require multicommerce_file_directory('inc/widgets/fields/teg-pagelist-field.php');
			break;
		case 'number' :
			require multicommerce_file_directory('inc/widgets/fields/teg-number-field.php');
			break;
		case 'widget_section_header':
			?>
			<span class="section-header"><?php echo esc_html( $teg_widgets_title ); ?></span>
			<?php
			break;
		case 'widget_layout_image':
			?>
			<div class="layout-image-wrapper">
				<span class="image-title"><?php echo esc_html( $teg_widgets_title ); ?></span>
				<img src="<?php echo esc_url( $teg_widgets_layout_img ); ?>"
				     title="<?php echo esc_attr__( 'Widget Layout', 'multicommerce' ); ?>"/>
			</div>
			<?php
			break;
		case 'repeater':
			require multicommerce_file_directory('inc/widgets/fields/teg-repeater-field.php');
			break;

		case 'accordion':
			require multicommerce_file_directory('inc/widgets/fields/teg-accordion-field.php');
			break;

		case 'tabgroup':
			require multicommerce_file_directory('inc/widgets/fields/teg-tabgroup-field.php');
			break;

		case 'termlist':
			require multicommerce_file_directory('inc/widgets/fields/teg-termlist-field.php');
			break;
			
		case 'multitermlist':
			require multicommerce_file_directory('inc/widgets/fields/teg-multitermlist-field.php');
			break;

		case 'upload' :
			require multicommerce_file_directory('inc/widgets/fields/teg-upload-field.php');
			break;
		default:
			?>
			<p><?php echo esc_html__('Field type', 'multicommerce').' '.esc_attr($teg_widgets_field_type).' '.esc_html__('Not found.', 'multicommerce'); ?></p>
			<?php
			break;
	}
}

function teg_widgets_updated_field_value( $widget_field, $new_field_value ){

	$teg_widgets_field_type = '';

	extract( $widget_field );

	switch ( $teg_widgets_field_type ) {
		// Allow only integers in number fields
		case 'number':
			return multicommerce_sanitize_number( $new_field_value, $widget_field );
			break;
		// Allow some tags in textareas
		case 'textarea':
			$teg_widgets_allowed_tags = array(
				'p' => array(),
				'em' => array(),
				'strong' => array(),
				'a' => array(
					'href' => array(),
				),
			);
			return wp_kses( $new_field_value, $teg_widgets_allowed_tags );
			break;
		// No allowed tags for all other fields
		case 'url':
			return esc_url_raw( $new_field_value );
			break;
		case 'multitermlist':
			$multi_term_list = array();
			if(is_array($new_field_value)){
				foreach($new_field_value as $key=>$value){
					$multi_term_list[] = absint($value);
				}
			}
			return $multi_term_list;
			break;
		case 'multiselect':
			$multiselect_list = array();
			if(is_array($new_field_value)){
				foreach($new_field_value as $key=>$value){
					$multiselect_list[] = esc_attr($value);
				}
			}
			return $multiselect_list;
			break;
		case 'accordion':
			$dropdown_accordions = array();
			if(is_array($new_field_value)){
				foreach($new_field_value as $key=>$value){
					$dropdown_accordions[] = esc_attr($value);
				}
			}
			return $dropdown_accordions;
			break;
		case 'repeater':
			//return $new_field_value;
			$sanitize_repeater_value = array();
			if(count($new_field_value) && is_array($new_field_value)){
				foreach($new_field_value as $index=>$repeater_row){
					$repeater_fields = $widget_field['repeater'];
					foreach($repeater_fields as $fields_key=>$fields_data){
						$repeater_field_type = isset($fields_data['teg_repeater_field_type']) ? $fields_data['teg_repeater_field_type'] : '';
						$repeater_field_name = isset($fields_data['teg_repeater_name']) ? $fields_data['teg_repeater_name'] : '';
						$repeater_field_value = isset($repeater_row[$repeater_field_name]) ? $repeater_row[$repeater_field_name] : '';
						switch($repeater_field_type){
							case 'url':
								$sanitize_repeater_value[$index][$repeater_field_name] = esc_url_raw( $repeater_field_value  );
							case 'upload':
								$sanitize_repeater_value[$index][$repeater_field_name] = esc_url_raw( $repeater_field_value  );
							default:
								$sanitize_repeater_value[$index][$repeater_field_name] = wp_kses_post( sanitize_text_field( $repeater_field_value  ) );
								break;
						}
					}
				}
			}
			return $sanitize_repeater_value;
			break;
		default:
			return wp_kses_post( sanitize_text_field( $new_field_value ) );

	}
}