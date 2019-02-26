<?php
$repeater_row_title = isset($widget_field['repeater_row_title']) ? $widget_field['repeater_row_title'] : esc_html__('Row', 'multicommerce');
$repeater_add_new_label = isset($widget_field['teg_add_new_label']) ? $widget_field['teg_add_new_label'] : esc_html__('Add row', 'multicommerce');
$repeater_row_fields = isset($widget_field['repeater']) ? $widget_field['repeater'] : array();
$coder_repeater_depth = 'coderRepeaterDepth_'.'0';
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<div class="teg-widget-field-wrapper <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>">
		<?php echo esc_html( $teg_widgets_title ); ?>:
	</label>
	<div class="te-repeater">
		<?php
		$repeater_count = 0;
		if( count( $athm_field_value ) > 0 && is_array( $athm_field_value ) ){

			foreach ($athm_field_value as $repeater_key=>$repeater_details){
				
				?>
				<div class="repeater-table">
					<div class="te-repeater-top">
						<div class="te-repeater-title-action">
							<button type="button" class="te-repeater-action">
								<span class="te-toggle-indicator" aria-hidden="true"></span>
							</button>
						</div>
						<div class="te-repeater-title">
							<h3><?php echo esc_attr($repeater_row_title); ?><span class="in-te-repeater-title"></span></h3>
						</div>
					</div>
					<div class='te-repeater-inside hidden'>
						<?php
						foreach($repeater_row_fields as $repeater_slug => $repeater_data){

							$field_name = isset($repeater_data['teg_repeater_name']) ? $repeater_data['teg_repeater_name'] : '__not_found__';
							$repeater_field_id  = $instance->get_field_id( $teg_widgets_name).$repeater_count.$field_name;
							$repeater_field_name  = $instance->get_field_name( $teg_widgets_name ).'['.$repeater_count.']['.$field_name.']';
							$repeater_field_type = (isset($repeater_data['teg_repeater_field_type'])) ? $repeater_data['teg_repeater_field_type'] : '';
							$repeater_field_title = (isset($repeater_data['teg_repeater_title'])) ? $repeater_data['teg_repeater_title'] : '';
							$inner_wraper_class = isset($repeater_data['teg_wraper_class']) ? $repeater_data['teg_wraper_class'] : '';
							$teg_repeater_default = isset($repeater_data['teg_repeater_default']) ? $repeater_data['teg_repeater_default'] : '';

							switch ( $repeater_field_type ) {
							// Standard url field
								case 'url':
								?>
								<p class="<?php echo esc_attr($inner_wraper_class); ?>">
									<label for="<?php echo esc_attr( $repeater_field_id ); ?>"><?php echo $repeater_field_title; ?></label>
									<input type="url" class="widefat" name="<?php echo esc_attr( $repeater_field_name ); ?>" id="<?php echo esc_attr( $repeater_field_id ); ?>" value="<?php echo esc_url( $repeater_details[$field_name] ); ?>" />
								</p>
								<?php
								break;
								// Standard upload field
								case 'upload':
								?>
								<p class="<?php echo esc_attr($inner_wraper_class); ?>">
									<span class="img-preview-wrap" <?php echo empty( $repeater_details[$field_name] ) ? 'style="display:none;"' : ''; ?>>
										<img class="widefat" src="<?php echo esc_url( $repeater_details[$field_name] ); ?>" alt="<?php esc_attr_e( 'Image preview', 'multicommerce' ); ?>"  />
									</span>
									<!-- .img-preview-wrap -->
									<input type="text" class="widefat" name="<?php echo esc_attr( $repeater_field_name ); ?>" id="<?php echo esc_attr( $repeater_field_id ); ?>" value="<?php echo esc_url( $repeater_details[$field_name] ); ?>" />
									<input type="button" value="<?php esc_attr_e( 'Upload Image', 'multicommerce' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','multicommerce'); ?>" data-button="<?php esc_attr_e( 'Select Image','multicommerce'); ?>"/>
									<input type="button" value="<?php esc_attr_e( 'Remove Image', 'multicommerce' ); ?>" class="button media-image-remove" />
								</p>
								<?php
								break;
								default:
								
								$widget_field = array(
									'teg_widgets_name'          => $teg_widgets_name.'['.$repeater_count.']['.$field_name.']',
									'teg_wraper_class'=> $inner_wraper_class,
									'teg_widgets_title'         => $repeater_field_title,
									'teg_widgets_default'       => $teg_repeater_default,
									'teg_widgets_field_type'    => $repeater_field_type,
								);
								$teg_repeater_field_value = isset($repeater_details[$field_name]) ? $repeater_details[$field_name] : '';
								teg_widgets_show_widget_field( $instance, $widget_field, $teg_repeater_field_value);
								break;
							}
						}
						?>
						<div class="te-repeater-control-actions">
							<button type="button" class="button-link button-link-delete te-repeater-remove"><?php esc_html_e('Remove','multicommerce');?></button> |
							<button type="button" class="button-link te-repeater-close"><?php esc_html_e('Close','multicommerce');?></button>
						</div>
					</div>
				</div>
				<?php
				$repeater_count++;
			}
		}

		?>
		<script type="text/html" class="te-code-for-repeater">
			<div class="repeater-table">
				<div class="te-repeater-top">
					<div class="te-repeater-title-action">
						<button type="button" class="te-repeater-action">
							<span class="te-toggle-indicator" aria-hidden="true"></span>
						</button>
					</div>
					<div class="te-repeater-title">
						<h3><?php echo esc_attr($repeater_row_title); ?><span class="in-te-repeater-title"></span></h3>
					</div>
				</div>
				<div class='te-repeater-inside hidden'>
					<?php
					foreach($repeater_row_fields as $repeater_slug => $repeater_data){

						$field_name = isset($repeater_data['teg_repeater_name']) ? $repeater_data['teg_repeater_name'] : '__not_found__';
						$repeater_field_id  = $instance->get_field_id( $teg_widgets_name).$field_name;
						$repeater_field_name  = $instance->get_field_name( $teg_widgets_name ).'['.$coder_repeater_depth.']['.$field_name.']';
						$repeater_field_type = (isset($repeater_data['teg_repeater_field_type'])) ? $repeater_data['teg_repeater_field_type'] : '';
						$repeater_field_title = (isset($repeater_data['teg_repeater_title'])) ? $repeater_data['teg_repeater_title'] : '';
						$repeater_default_value = (isset($repeater_data['teg_repeater_default'])) ? $repeater_data['teg_repeater_default'] : '';
						$inner_wraper_class = isset($repeater_data['teg_wraper_class']) ? $repeater_data['teg_wraper_class'] : '';

						switch ( $repeater_field_type ) {
							// Standard text field
							case 'url':
							?>
							<p class="<?php echo esc_attr($inner_wraper_class); ?>">
								<label for="<?php echo esc_attr( $repeater_field_id ); ?>"><?php echo $repeater_field_title; ?></label>
								<input type="url" class="widefat" name="<?php echo esc_attr( $repeater_field_name ); ?>" id="<?php echo esc_attr( $repeater_field_id ); ?>" value="<?php echo esc_url($repeater_default_value); ?>" />
							</p>
							<?php
							break;
							// Standard url field
							case 'upload':
							?>
							<p class="<?php echo esc_attr($inner_wraper_class); ?>">
								<span class="img-preview-wrap" <?php echo empty( $repeater_details[$field_name] ) ? 'style="display:none;"' : ''; ?>>
									<img class="widefat" src="<?php echo esc_url( $repeater_default_value ); ?>" alt="<?php esc_attr_e( 'Image preview', 'multicommerce' ); ?>"  />
								</span>
								<!-- .img-preview-wrap -->
								<input type="text" class="widefat" name="<?php echo esc_attr( $repeater_field_name ); ?>" id="<?php echo esc_attr( $repeater_field_id ); ?>" value="<?php echo esc_url($repeater_default_value); ?>" />
								<input type="button" value="<?php esc_attr_e( 'Upload Image', 'multicommerce' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','multicommerce'); ?>" data-button="<?php esc_attr_e( 'Select Image','multicommerce'); ?>"/>
								<input type="button" value="<?php esc_attr_e( 'Remove Image', 'multicommerce' ); ?>" class="button media-image-remove" />
							</p>
							<?php
							break;
							default:

							$widget_field = array(
								'teg_widgets_name'          => $teg_widgets_name.'['.$coder_repeater_depth.']['.$field_name.']',
								'teg_widgets_title'         => $repeater_field_title,
								'teg_widgets_default'       => $repeater_default_value,
								'teg_widgets_field_type'    => $repeater_field_type,
							);
							teg_widgets_show_widget_field( $instance, $widget_field, $repeater_default_value );
							break;
						}
					}
					?>
					<div class="te-repeater-control-actions">
						<button type="button" class="button-link button-link-delete te-repeater-remove"><?php esc_html_e('Remove','multicommerce');?></button> |
						<button type="button" class="button-link te-repeater-close"><?php esc_html_e('Close','multicommerce');?></button>
					</div>
				</div>
			</div>
		</script>

		<input class="te-total-repeater" type="hidden" value="<?php echo esc_attr( $repeater_count ) ?>">
		<span class="button te-add-repeater" id="<?php echo esc_attr( $coder_repeater_depth ); ?>"><?php echo $repeater_add_new_label; ?></span><br/>

	</div>
	<?php if ( isset( $teg_widgets_description ) ) { ?>
		<small><?php echo esc_html( $teg_widgets_description ); ?></small>
	<?php } ?>
</div>