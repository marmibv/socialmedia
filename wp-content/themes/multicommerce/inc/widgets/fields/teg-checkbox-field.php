<?php
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
$teg_widget_relations = isset($teg_widget_relations) ? $teg_widget_relations : array();
$teg_relations_json = wp_json_encode( $teg_widget_relations);
$teg_relation_class = ($teg_widget_relations) ? 'teg_widget_relations' : '';
?>
<p class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<input class="<?php echo esc_attr($teg_relation_class); ?>" id="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>" type="checkbox" value="1" <?php checked( '1', $athm_field_value ); ?> data-relations="<?php echo esc_attr($teg_relations_json) ?>"/>
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>
	</label>
	<?php if ( isset( $teg_widgets_description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $teg_widgets_description ); ?></small>
	<?php } ?>
</p>