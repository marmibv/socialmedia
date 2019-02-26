<?php
if ( empty( $athm_field_value ) ) {
	$athm_field_value = $teg_widgets_default;
}
//$teg_widgets_tabs;
$current_widget_slug = $instance->id_base.'_'.$instance->number.'_';
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<div class="multicommerce-tab-wraper <?php echo esc_attr($teg_wraper_class); ?>">
	<h5 class="multicommerce-tab-list nav-tab-wrapper">
		<?php 
		foreach($teg_widgets_tabs as $tab_key=>$tab_details){
			$current_tab_id = $current_widget_slug.$tab_key;
			?>
			<label for="field_<?php echo esc_attr($current_tab_id); ?>" data-id="#content_<?php echo esc_attr($current_tab_id); ?>" class="nav-tab <?php echo ($tab_key == $athm_field_value) ? 'nav-tab-active' : ''; ?>"><?php echo sanitize_text_field($tab_details['teg_tab_label']); ?><input id="field_<?php echo esc_attr($current_tab_id); ?>" type="radio" name="<?php echo $instance->get_field_name($teg_widgets_name); ?>" value="<?php echo esc_attr($tab_key); ?>" <?php checked($athm_field_value, $tab_key); ?> class="multicommerce-hidden"/></label>
		<?php } ?>
	</h5>
	<div class="multicommerce-tab-content-wraper">
		<?php
		foreach($teg_widgets_tabs as $tab_key=>$tab_details){ 
			$current_tab_id = $current_widget_slug.$tab_key;
			?>
			<div id="content_<?php echo esc_attr($current_tab_id); ?>" class="multicommerce-tab-content <?php echo ($athm_field_value==$tab_key
			) ? 'multicommerce-content-active' : ''; ?>" >
				<?php
					$all_values = get_option('widget_' . $instance->id_base);
					$this_widget_instance = isset($all_values[$instance->number]) ? $all_values[$instance->number] : array();
					$widget_fields = isset($tab_details['teg_tab_fields']) ? $tab_details['teg_tab_fields'] : array();
					// Loop through fields
					if(count($widget_fields)):
			            foreach ( $widget_fields as $widget_field ) {
			                // Make array elements available as variables
			                extract( $widget_field );
			                $teg_widgets_field_value = ! empty( $this_widget_instance[ $teg_widgets_name ] ) ? $this_widget_instance[ $teg_widgets_name ] : '';
			                teg_widgets_show_widget_field( $instance, $widget_field, $teg_widgets_field_value );
			            }
			        else:
			        	echo '<p>No fields are added on '.$tab_details['teg_tab_label'].' tab</p>';
			        endif;
				?>
			</div>
		<?php } ?>
	</div>
</div>