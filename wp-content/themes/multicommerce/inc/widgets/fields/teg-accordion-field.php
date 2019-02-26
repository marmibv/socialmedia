<?php
$teg_widgets_accordion = isset($widget_field['teg_widgets_accordion']) ? $widget_field['teg_widgets_accordion'] : array();
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
$all_values = get_option('widget_' . $instance->id_base);
$this_widget_instance = isset($all_values[$instance->number]) ? $all_values[$instance->number] : array();
$athm_field_value = (array)$athm_field_value;
?>
<div class="teg-widget-field-wrapper teg-widget-accordion-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<?php
	if( count( $teg_widgets_accordion ) > 0 && is_array( $teg_widgets_accordion ) ){ 
		foreach ($teg_widgets_accordion as $accordion_key=>$accordion_details){
			$is_dropdown = in_array($accordion_key, $athm_field_value);
			$teg_accordion_title = isset($accordion_details['teg_accordion_title']) ? esc_html($accordion_details['teg_accordion_title']) : '';
			$teg_accordion_fields = isset($accordion_details['teg_accordion_fields']) ? $accordion_details['teg_accordion_fields'] : array();
			$accordion_wraper_class = ($is_dropdown) ? 'open' : 'closed';
			$accordion_icon_class = ($is_dropdown) ? 'fa-angle-up' : 'fa-angle-down';
			?>
			<div class="teg-accordion-wrapper <?php echo esc_attr($accordion_wraper_class); ?>">
				<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name.$accordion_key ) ); ?>" class="teg-accordion-title"><?php esc_html($teg_accordion_title); ?>
					<?php echo esc_html($teg_accordion_title); ?><i class="teg-accordion-arrow fa <?php echo esc_attr($accordion_icon_class); ?>"></i>
					<input id="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name.$accordion_key ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>[]" value="<?php echo esc_attr($accordion_key); ?>" <?php checked( 1, $is_dropdown ) ?> class="multicommerce-hidden" type="checkbox">
				</label>
				<div class="teg-accordion-content">
					<?php
					if(count($teg_accordion_fields)):
					foreach($teg_accordion_fields as $field_key=>$accordion_field):
						$current_widgets_field_default = isset($accordion_field['teg_widgets_default']) ? $accordion_field['teg_widgets_default'] : '';
						$current_field_widget_name = isset($accordion_field['teg_widgets_name']) ? $accordion_field['teg_widgets_name'] : '';

						if(!$current_field_widget_name){
							return;
						}
						$current_widgets_field_value = isset($this_widget_instance[$current_field_widget_name]) ? $this_widget_instance[$current_field_widget_name] : $current_widgets_field_default;
						teg_widgets_show_widget_field( $instance, $accordion_field, $current_widgets_field_value );
					endforeach;
				else:
					?>
					<p><?php esc_html_e('Sorry no field are added on accordion.', 'multicommerce'); ?></p>
					<?php
				endif;
					?>
				</div>
			</div>
			<?php
		}

	}else{
		?>
			<p><?php esc_html_e('There is no accordion on this accordion group', 'multicommerce'); ?></p>
		<?php
	}
	?>
	<?php if ( isset( $teg_widgets_description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $teg_widgets_description ); ?></small>
	<?php } ?>
</div>