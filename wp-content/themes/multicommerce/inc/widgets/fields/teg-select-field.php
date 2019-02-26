<?php
if ( empty( $athm_field_value ) ) {
	$athm_field_value = $teg_widgets_default;
}
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
$teg_widget_relations = isset($teg_widget_relations) ? $teg_widget_relations : array();
$teg_relations_json = wp_json_encode( $teg_widget_relations);
$teg_relation_class = '';
if($teg_widget_relations){
	$teg_relation_class =  'teg_widget_relations';
}
?>
<p class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>:
	</label>
	<select name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>" class="widefat <?php echo esc_attr($teg_relation_class); ?>" data-relations="<?php echo esc_attr($teg_relations_json) ?>">
		<?php foreach ( $teg_widgets_field_options as $athm_option_name => $athm_option_title ) { ?>
			<option value="<?php echo esc_attr( $athm_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>" <?php selected( $athm_option_name, $athm_field_value ); ?>>
				<?php echo esc_html( $athm_option_title ); ?>
			</option>
		<?php } ?>
	</select>
	<?php if ( isset( $teg_widgets_description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $teg_widgets_description ); ?></small>
	<?php } ?>
</p>