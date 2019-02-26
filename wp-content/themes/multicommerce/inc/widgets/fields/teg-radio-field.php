<?php
if ( empty( $athm_field_value ) ) {
	$athm_field_value = $teg_widgets_default;
}
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<p class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>:
	</label>
	<div class="radio-wrapper">
		<?php
			foreach ( $teg_widgets_field_options as $athm_option_name => $athm_option_title ){
		?>
			<input id="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>" type="radio" value="<?php echo esc_html( $athm_option_name ); ?>" <?php checked( $athm_option_name, $athm_field_value ); ?> />
				<label for="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>"><?php echo esc_html( $athm_option_title ); ?>:</label>
		<?php } ?>
	</div>
	<?php if ( isset( $teg_widgets_description ) ) { ?>
		<small><?php echo esc_html( $teg_widgets_description ); ?></small>
	<?php } ?>
</p>