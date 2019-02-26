<?php
if ( empty( $athm_field_value ) ) {
	$athm_field_value = $teg_widgets_default;
}
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<div class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>: 
	</label>
	<ul class="te-multiple-checkbox">
		<?php
		if( $teg_widgets_field_options ){
			foreach( $teg_widgets_field_options as $athm_option_name => $athm_option_title ){
				?>
				<li>
					<input 
					id="<?php echo esc_attr( $instance->get_field_id($teg_widgets_name) ).'_'.$athm_option_name; ?>" 
					name="<?php echo esc_attr( $instance->get_field_name($teg_widgets_name).'[]' ); ?>" 
					type="checkbox" 
					value="<?php echo $athm_option_name; ?>" 
					<?php checked(in_array($athm_option_name, (array)$athm_field_value)); ?> 
					/>
					<label for="<?php echo esc_attr( $instance->get_field_id($teg_widgets_name) ).'_'.$athm_option_name; ?>"><?php echo esc_html( $athm_option_title ); ?></label>
				</li>
				<?php
			}
		}
		if ( isset( $teg_widgets_description ) ) { 
			?>
			<br/>
			<small><?php echo esc_html( $teg_widgets_description ); ?></small>
			<?php 
		}
		?>
	</ul>
</div>