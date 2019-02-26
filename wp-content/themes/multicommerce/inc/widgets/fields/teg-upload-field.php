<?php
$teg_wraper_class = isset($teg_wraper_class) ? $teg_wraper_class : '';
?>
<p class="teg-widget-field-wrapper sub-option widget-upload <?php echo esc_attr($teg_wraper_class); ?>">
	<label for="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>"><?php echo esc_html( $teg_widgets_title ); ?></label>
	<span class="img-preview-wrap" <?php echo empty( $athm_field_value ) ? 'style="display:none;"' : ''; ?>>
		<img class="widefat" src="<?php echo esc_url( $athm_field_value ); ?>" alt="<?php esc_attr_e( 'Image preview', 'multicommerce' ); ?>"  />
	</span>
	<!-- .img-preview-wrap -->
	<input type="text" class="widefat" name="<?php echo esc_attr( $instance->get_field_name( $teg_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $teg_widgets_name ) ); ?>" placeholder="<?php esc_html_e('Choose file', 'multicommerce'); ?>" value="<?php echo esc_url( $athm_field_value ); ?>" />
	<input type="button" value="<?php esc_attr_e( 'Upload Image', 'multicommerce' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','multicommerce'); ?>" data-button="<?php esc_attr_e( 'Select Image','multicommerce'); ?>"/>
	<input type="button" value="<?php esc_attr_e( 'Remove Image', 'multicommerce' ); ?>" class="button media-image-remove" />
</p>