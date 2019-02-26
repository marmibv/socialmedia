<?php
/*check if feature enable*/
if ( !function_exists('multicommerce_is_feature_section_enable') ) :
	function multicommerce_is_feature_section_enable() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		$multicommerce_enable_special_menu = $multicommerce_customizer_all_values['multicommerce-enable-category-menu'];
		$multicommerce_feature_content_options = $multicommerce_customizer_all_values['multicommerce-feature-content-options'];
		$multicommerce_feature_right_content_options = $multicommerce_customizer_all_values['multicommerce-feature-right-content-options'];
		if( ('disable' != $multicommerce_feature_content_options || 'disable' != $multicommerce_feature_right_content_options ) &&
		    1 == $multicommerce_enable_special_menu ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for special menu*/
$wp_customize->add_section( 'multicommerce-feature-category-menu', array(
	'capability'     => 'edit_theme_options',
	'priority'		 => 40,
	'title'          => esc_html__( 'Category Menu Feature Left', 'multicommerce' ),
	'panel'          => 'multicommerce-feature-panel',
	'active_callback'=> 'multicommerce_is_feature_section_enable'
) );

/*enable-category-menu*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-enable-category-menu]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-enable-category-menu'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-enable-category-menu]', array(
	'label'		    => esc_html__( 'Display Category Menu on Feature Left', 'multicommerce' ),
	'section'       => 'multicommerce-feature-category-menu',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-enable-category-menu]',
	'type'	  	    => 'checkbox'
) );