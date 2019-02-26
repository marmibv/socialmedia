<?php
/*check if post*/
if ( !function_exists('multicommerce_is_category_menu_feature_left') ) :
	function multicommerce_is_category_menu_feature_left() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		if( 1 == $multicommerce_customizer_all_values['multicommerce-feature-enable-category-menu'] ){
			return true;
		}
		return false;
	}
endif;

/*Sticky  Menu Section*/
$wp_customize->add_section( 'multicommerce-sticky-menu', array(
	'priority'       => 100,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Sticky Menu Options', 'multicommerce' ),
	'panel'          => 'multicommerce-header-panel',
) );

/*sticky menu*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-enable-sticky-menu]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-enable-sticky-menu'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-enable-sticky-menu]', array(
	'label'		=> esc_html__( 'Enable Sticky Menu', 'multicommerce' ),
	'section'   => 'multicommerce-sticky-menu',
	'settings'  => 'multicommerce_theme_options[multicommerce-enable-sticky-menu]',
	'type'	  	=> 'checkbox'
) );

$wp_customize->add_setting('multicommerce_theme_options[multicommerce-sticky-menu-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr',
));

$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-sticky-menu-message]',
		array(
			'section'   => 'multicommerce-sticky-menu',
			'description'=> sprintf( esc_html__( 'Sticky Menu wont work, if you Display Category Menu on Feature Left.%1$s Note : Please go to %2$s "Category Menu Feature Left"%3$s and uncheck( disable ) it', 'multicommerce' ), '<br />','<b><a class="te-customizer" data-section="multicommerce-category-menu"> ','</a></b>' ),
			'settings'  => 'multicommerce_theme_options[multicommerce-sticky-menu-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'multicommerce_is_category_menu_feature_left'
		)
	)
);