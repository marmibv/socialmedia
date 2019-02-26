<?php
/*check if post*/
if ( !function_exists('multicommerce_is_feature_right_content_post') ) :
	function multicommerce_is_feature_right_content_post() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		if( 'post' == $multicommerce_customizer_all_values['multicommerce-feature-right-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if product*/
if ( !function_exists('multicommerce_is_feature_right_content_product') ) :
	function multicommerce_is_feature_right_content_product() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		if( multicommerce_is_woocommerce_active() && 'product' == $multicommerce_customizer_all_values['multicommerce-feature-right-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if feature not disable*/
if ( !function_exists('multicommerce_if_feature_right_not_disable') ) :
	function multicommerce_if_feature_right_not_disable() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		$multicommerce_feature_right_content_options = $multicommerce_customizer_all_values['multicommerce-feature-right-content-options'];
		if( ( multicommerce_is_woocommerce_active() && 'product' == $multicommerce_feature_right_content_options ) || 'post' == $multicommerce_feature_right_content_options ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for feature right*/
$wp_customize->add_section( 'multicommerce-feature-right-content-options', array(
	'capability'     => 'edit_theme_options',
	'priority'		 => 30,
	'title'          => esc_html__( 'Feature Right Section', 'multicommerce' ),
	'description'	 => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Main Section, Feature Right Section and  Category Menu Feature Left  .%1$s Note : Please go to %2$s Homepage Settings %3$s, Select "A static page" then "Front page" and "Posts page" to enable it', 'multicommerce' ), '<br />','<b><a class="te-customizer button button-primary" data-section="static_front_page"> ','</a></b>' ),
	'panel'          => 'multicommerce-feature-panel'
) );

/*Feature Content Options*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-content-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-content-options'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_feature_section_content_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-right-content-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Show', 'multicommerce' ),
	'description'   => esc_html__( 'Show post, page, or product on Feature section', 'multicommerce' ),
	'section'       => 'multicommerce-feature-right-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-right-content-options]',
	'type'	  	    => 'select'
) );

/* feature cat selection */
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-post-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-post-cat'],
	'sanitize_callback' => 'multicommerce_sanitize_number'
) );

$wp_customize->add_control(
	new Multicommerce_Customize_Category_Dropdown_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-feature-right-post-cat]',
		array(
			'label'		=> esc_html__( 'Select Post Category', 'multicommerce' ),
			'section'   => 'multicommerce-feature-right-content-options',
			'settings'  => 'multicommerce_theme_options[multicommerce-feature-right-post-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback'   => 'multicommerce_is_feature_right_content_post'
		)
	)
);

/* feature product cat selection */
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-product-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-product-cat'],
	'sanitize_callback' => 'multicommerce_sanitize_number'
) );

$wp_customize->add_control(
	new Multicommerce_Customize_WC_Category_Dropdown_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-feature-right-product-cat]',
		array(
			'label'		=> esc_html__( 'Select Product Category', 'multicommerce' ),
			'section'   => 'multicommerce-feature-right-content-options',
			'settings'  => 'multicommerce_theme_options[multicommerce-feature-right-product-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback'   => 'multicommerce_is_feature_right_content_product'
		)
	)
);

/*Post Number*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-post-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-post-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-right-post-number]', array(
	'label'		=> esc_html__( 'Number', 'multicommerce' ),
	'section'   => 'multicommerce-feature-right-content-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-feature-right-post-number]',
	'type'	  	=> 'number',
	'active_callback'   => 'multicommerce_if_feature_right_not_disable'
) );

/*display-title*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-display-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-display-title'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-right-display-title]', array(
	'label'		    => esc_html__( 'Display Title', 'multicommerce' ),
	'section'       => 'multicommerce-feature-right-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-right-display-title]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_right_not_disable'
) );

/*display-arrow*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-display-arrow]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-display-arrow'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-right-display-arrow]', array(
	'label'		    => esc_html__( 'Display Arrow', 'multicommerce' ),
	'section'       => 'multicommerce-feature-right-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-right-display-arrow]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_right_not_disable'
) );

/*enable-autoplay*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-enable-autoplay]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-enable-autoplay'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-right-enable-autoplay]', array(
	'label'		    => esc_html__( 'Enable Autoplay', 'multicommerce' ),
	'section'       => 'multicommerce-feature-right-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-right-enable-autoplay]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_right_not_disable'
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-image-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-image-display-options'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_fs_image_display_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-right-image-display-options]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Feature Slider Image Display Options', 'multicommerce' ),
	'description'=> esc_html__( 'Recommended Image Size 372*255 or 744*510 ', 'multicommerce' ),
	'section'   => 'multicommerce-feature-right-content-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-feature-right-image-display-options]',
	'type'	  	=> 'radio',
	'active_callback'   => 'multicommerce_if_feature_right_not_disable'
) );

/*Button text*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-right-button-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-right-button-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-right-button-text]', array(
	'label'		=> esc_html__( 'Button Text', 'multicommerce' ),
	'description'=> esc_html__( 'Left empty to hide', 'multicommerce' ),
	'section'   => 'multicommerce-feature-right-content-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-feature-right-button-text]',
	'type'	  	=> 'text',
	'active_callback' => 'multicommerce_if_feature_right_not_disable'
) );