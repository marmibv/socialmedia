<?php
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<p class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>:
	</label>
	<input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>" type="text" value="<?php echo esc_html( $athm_field_value ); ?>"/>
	<?php if ( isset( $teg_widgets_description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $teg_widgets_description ); ?></small>
	<?php } ?>
</p>