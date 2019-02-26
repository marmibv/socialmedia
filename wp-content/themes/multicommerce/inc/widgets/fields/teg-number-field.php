<?php
if ( empty( $athm_field_value ) ) {
	$athm_field_value = $teg_widgets_default;
}
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<p class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>:
	</label><br/>
	<input class="widefat" name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>" value="<?php echo esc_html( $athm_field_value ); ?>"/>
	<?php if ( isset( $teg_widgets_description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $teg_widgets_description ); ?></small>
	<?php } ?>
</p>