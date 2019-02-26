<?php
	$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<p class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>:
	</label>
	<textarea class="widefat" rows="<?php echo intval( $teg_widgets_row ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>"><?php echo esc_html( $athm_field_value ); ?></textarea>
</p>