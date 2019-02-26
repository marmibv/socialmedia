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
		/* see more here https://developer.wordpress.org/reference/functions/get_terms/*/
		$args = array(
			'taxonomy'     => $teg_taxonomy_type,
			'hide_empty'   => false,
			'number'      => 999,
		);
		$all_terms = get_terms($args);
		if( $all_terms ){
			foreach( $all_terms as $single_term ){
				$teg_term_id = $single_term->term_id;
				$teg_term_name = $single_term->name;
				?>
				<li>
					<input 
					id="<?php echo esc_attr( $instance->get_field_id($teg_widgets_name) ).'_'.$teg_taxonomy_type.'_'.$teg_term_id; ?>" 
					name="<?php echo esc_attr( $instance->get_field_name($teg_widgets_name).'[]' ); ?>" 
					type="checkbox" 
					value="<?php echo $teg_term_id; ?>" 
					<?php checked(in_array($teg_term_id, (array)$athm_field_value)); ?> 
					/>
					<label for="<?php echo esc_attr( $instance->get_field_id($teg_widgets_name) ).'_'.$teg_taxonomy_type.'_'.$teg_term_id; ?>"><?php echo esc_html( $teg_term_name ).' ('.$single_term->count.')'; ?></label>
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