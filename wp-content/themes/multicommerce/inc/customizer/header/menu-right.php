<?php
/*
 * Multicommerce Header Menu Right Customizer
 */
if(!function_exists('multicommerce_customizer_show_highlight_text_field')):
	
	function multicommerce_customizer_show_highlight_text_field($control){

		return true;
		/*$menu_right_text = $control->manager->get_setting( 'multicommerce_theme_options[multicommerce-menu-right-text]' )->value();
		if($menu_right_text) {
            return true;
        } else {
            return false;
        }*/

	}

endif;

if(!function_exists('multicommerce_customizer_header_menu_right_part_render')):

	function multicommerce_customizer_header_menu_right_part_render(){
		/**
		 * multicommerce_header_menu_right_part hook
		 * @since MultiCommerce 1.0.2
		 *
		 * @hooked multicommerce_headermenu_rightpart_callback -  10
		 */
		do_action('multicommerce_header_menu_right_part');
	}
	
endif;

/*Menu Right Section*/
$wp_customize->add_section( 'multicommerce-menu-right', array(
	'priority'       => 90,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Menu Right Options', 'multicommerce' ),
	'panel'          => 'multicommerce-header-panel',
) );


/*Menu Right Text and Link*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-menu-right-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-menu-right-text'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'	=> 'postMessage',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-menu-right-text]', array(
	'label'		=> esc_html__( 'Menu Right Text', 'multicommerce' ),
	'section'   => 'multicommerce-menu-right',
	'settings'  => 'multicommerce_theme_options[multicommerce-menu-right-text]',
	'type'	  	=> 'text'
) );

$wp_customize->selective_refresh->add_partial( 
	'multicommerce_theme_options[multicommerce-menu-right-text]', 
	array(
		'selector'            => '.te-menu-right-wrapper',
		'container_inclusive' => true,
		'render_callback'     => 'multicommerce_customizer_header_menu_right_part_render',
        'fallback_refresh'    => true, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
    ) 
);

/*Highlight text*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-menu-right-highlight-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-menu-right-highlight-text'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-menu-right-highlight-text]', array(
	'label'		=> esc_html__( 'Menu Right Highlight Text', 'multicommerce' ),
	'section'   => 'multicommerce-menu-right',
	'settings'  => 'multicommerce_theme_options[multicommerce-menu-right-highlight-text]',
	'type'	  	=> 'text',
	'active_callback' => 'multicommerce_customizer_show_highlight_text_field',
) );

/*Link*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-menu-right-text-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-menu-right-text-link'],
	'sanitize_callback' => 'esc_url_raw',
	'transport'	=> 'postMessage',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-menu-right-text-link]', array(
	'label'		=> esc_html__( 'Menu Right Text Link', 'multicommerce' ),
	'section'   => 'multicommerce-menu-right',
	'settings'  => 'multicommerce_theme_options[multicommerce-menu-right-text-link]',
	'type'	  	=> 'url',
	'active_callback' => 'multicommerce_customizer_show_highlight_text_field',
) );
$wp_customize->selective_refresh->add_partial( 
	'multicommerce_theme_options[multicommerce-menu-right-text-link]', 
	array(
		'selector'            => '.te-menu-right-wrapper',
		'container_inclusive' => true,
		'render_callback'     => 'multicommerce_customizer_header_menu_right_part_render',
        'fallback_refresh'    => true, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
    ) 
);

/*enable new tab on link*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-menu-right-link-new-tab]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-menu-right-link-new-tab'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox',
	'transport'	=> 'postMessage',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-menu-right-link-new-tab]', array(
	'label'		=> esc_html__( 'Open Link New Tab', 'multicommerce' ),
	'section'   => 'multicommerce-menu-right',
	'settings'  => 'multicommerce_theme_options[multicommerce-menu-right-link-new-tab]',
	'type'	  	=> 'checkbox',
	'active_callback' => 'multicommerce_customizer_show_highlight_text_field',
) );
