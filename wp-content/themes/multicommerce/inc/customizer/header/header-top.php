<?php
/*check if enable header top*/
if ( !function_exists('multicommerce_is_enable_header_top') ) :
	function multicommerce_is_enable_header_top() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		if( 1 == $multicommerce_customizer_all_values['multicommerce-enable-header-top'] ){
			return true;
		}
		return false;
	}
endif;

/*check for multicommerce-top-right-button-options*/
if ( !function_exists('multicommerce_top_right_button_if_not_disable') ) :
	function multicommerce_top_right_button_if_not_disable() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		$multicommerce_enable_header_top = $multicommerce_customizer_all_values['multicommerce-enable-header-top'];
		$multicommerce_top_right_button_options = $multicommerce_customizer_all_values['multicommerce-top-right-button-options'];
		if( 1 == $multicommerce_enable_header_top && 'disable' != $multicommerce_top_right_button_options ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('multicommerce_top_right_button_if_widget') ) :
	function multicommerce_top_right_button_if_widget() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		$multicommerce_enable_header_top = $multicommerce_customizer_all_values['multicommerce-enable-header-top'];
		$multicommerce_top_right_button_options = $multicommerce_customizer_all_values['multicommerce-top-right-button-options'];
		if( 1 == $multicommerce_enable_header_top && 'widget' == $multicommerce_top_right_button_options ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('multicommerce_menu_right_button_if_link') ) :
	function multicommerce_menu_right_button_if_link() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		$multicommerce_enable_header_top = $multicommerce_customizer_all_values['multicommerce-enable-header-top'];
		$multicommerce_top_right_button_options = $multicommerce_customizer_all_values['multicommerce-top-right-button-options'];
		if( 1 == $multicommerce_enable_header_top && 'link' == $multicommerce_top_right_button_options ){
			return true;
		}
		return false;
	}
endif;

if(!function_exists('multicommerce_customizer_header_top_section_render')):

	function multicommerce_customizer_header_top_section_render(){
		/**
		 * @hook multicommerce_topheader_section
		 * @since MultiCommerce 1.0.2
		 *
		 * @hooked multicommerce_top_header_section_callback -  10
		 */
		do_action('multicommerce_topheader_section');
	}
	
endif;


/*adding sections for header options*/
$wp_customize->add_section( 'multicommerce-header-top-option', array(
	'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Header Top', 'multicommerce' ),
	'panel'          => 'multicommerce-header-panel'
) );

/*header top enable*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-enable-header-top]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-enable-header-top'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox',
	'transport'			=> 'postMessage',
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-enable-header-top]', array(
	'label'		=> esc_html__( 'Enable Header Top Options', 'multicommerce' ),
	'section'   => 'multicommerce-header-top-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-enable-header-top]',
	'type'	  	=> 'checkbox'
) );
$wp_customize->selective_refresh->add_partial( 
	'multicommerce_theme_options[multicommerce-enable-header-top]', 
	array(
		'selector'            => '.multicommerce-top-header-wraper',
		'container_inclusive' => false,
		'render_callback'     => 'multicommerce_customizer_header_top_section_render',
        'fallback_refresh'    => true, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
    ) 
);

/*header top message*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-header-top-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-header-top-message]',
		array(
			'section'   => 'multicommerce-header-top-option',
			'description'    => "<hr /><h2>".esc_html__('Header top elements.','multicommerce')."</h2>",
			'settings'  => 'multicommerce_theme_options[multicommerce-header-top-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'multicommerce_is_enable_header_top'
		)
	)
);

/*Basic Info display*/
$choices = multicommerce_header_top_display_selection();
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-top-basic-info-display-selection]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-header-top-basic-info-display-selection'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Basic Info from %1$s here%2$s', 'multicommerce' ), '<a class="te-customizer button button-primary" data-section="multicommerce-header-info" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-top-basic-info-display-selection]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Basic Info Display', 'multicommerce' ),
	'description'=> $description,
	'section'   => 'multicommerce-header-top-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-header-top-basic-info-display-selection]',
	'type'	  	=> 'select',
	'active_callback'   => 'multicommerce_is_enable_header_top'
) );

/*Top Menu Display*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-top-menu-display-selection]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-header-top-menu-display-selection'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Menu Items from %1$s here%2$s and select Menu Location : Top Menu ( Support First Level Only ) ', 'multicommerce' ), '<a class="te-customizer button button-primary" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-top-menu-display-selection]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Top Menu Display', 'multicommerce' ),
	'description'=> $description,
	'section'   => 'multicommerce-header-top-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-header-top-menu-display-selection]',
	'type'	  	=> 'select',
	'active_callback'=> 'multicommerce_is_enable_header_top'
) );

/*Social Display*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-top-social-display-selection]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-header-top-social-display-selection'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Social Items from %1$s here%2$s ', 'multicommerce' ), '<a class="te-customizer button button-primary" data-section="multicommerce-social-options" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-top-social-display-selection]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Social Display', 'multicommerce' ),
	'description'=> $description,
	'section'   => 'multicommerce-header-top-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-header-top-social-display-selection]',
	'type'	  	=> 'select',
	'active_callback'   => 'multicommerce_is_enable_header_top'
) );

/*Button Right Message*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-top-right-button-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));
$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-top-right-button-message]',
		array(
			'section'   => 'multicommerce-header-top-option',
			'description'    => "<hr /><h2>".esc_html__('Top right button.','multicommerce')."</h2>",
			'settings'  => 'multicommerce_theme_options[multicommerce-top-right-button-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'multicommerce_is_enable_header_top'
		)
	)
);

/*Button Link Options*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-top-right-button-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-top-right-button-options'],
	'sanitize_callback' => 'multicommerce_sanitize_select',
	'transport'			=> 'postMessage',
) );
$choices = multicommerce_menu_right_button_link_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-top-right-button-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Top Right Button Options', 'multicommerce' ),
	'section'       => 'multicommerce-header-top-option',
	'settings'      => 'multicommerce_theme_options[multicommerce-top-right-button-options]',
	'type'	  	    => 'select',
	'active_callback'   => 'multicommerce_is_enable_header_top'
) );

/*Button title*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-top-right-button-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-top-right-button-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-top-right-button-title]', array(
	'label'		=> esc_html__( 'Button Title', 'multicommerce' ),
	'section'   => 'multicommerce-header-top-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-top-right-button-title]',
	'type'	  	=> 'text',
	'active_callback'   => 'multicommerce_top_right_button_if_not_disable'
) );

/*Popup widget title*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-popup-widget-title]', array(
	'label'		=> esc_html__( 'Popup Widget Title', 'multicommerce' ),
	'section'   => 'multicommerce-header-top-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-popup-widget-title]',
	'type'	  	=> 'text',
	'active_callback'   => 'multicommerce_top_right_button_if_not_disable'
) );

/*Button Right appointment Message*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-top-right-button-widget-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));
$description = sprintf( esc_html__( 'Add Widgets from %1$s here%2$s ', 'multicommerce' ), '<a class="te-customizer button button-primary" data-section="widgets-popup-widget-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-top-right-button-widget-message]',
		array(
			'section'   => 'multicommerce-header-top-option',
			'description'    => $description,
			'settings'  => 'multicommerce_theme_options[multicommerce-top-right-button-widget-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'multicommerce_top_right_button_if_widget'
		)
	)
);

/*Button link*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-top-right-button-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-top-right-button-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-top-right-button-link]', array(
	'label'		=> esc_html__( 'Button Link', 'multicommerce' ),
	'section'   => 'multicommerce-header-top-option',
	'settings'  => 'multicommerce_theme_options[multicommerce-top-right-button-link]',
	'type'	  	=> 'url',
	'active_callback'   => 'multicommerce_menu_right_button_if_link'
) );