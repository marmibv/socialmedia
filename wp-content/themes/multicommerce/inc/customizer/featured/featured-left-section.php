<?php
/*check if post*/
if ( !function_exists('multicommerce_is_feature_content_post') ) :
	function multicommerce_is_feature_content_post() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		if( 'post' == $multicommerce_customizer_all_values['multicommerce-feature-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if product*/
if ( !function_exists('multicommerce_is_feature_content_product') ) :
	function multicommerce_is_feature_content_product() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		if( multicommerce_is_woocommerce_active() && 'product' == $multicommerce_customizer_all_values['multicommerce-feature-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if feature not disable*/
if ( !function_exists('multicommerce_if_feature_not_disable') ) :
	function multicommerce_if_feature_not_disable() {
		$multicommerce_customizer_all_values = multicommerce_get_theme_options();
		$multicommerce_feature_content_options = $multicommerce_customizer_all_values['multicommerce-feature-content-options'];
		if( ( multicommerce_is_woocommerce_active() && 'product' == $multicommerce_feature_content_options ) || 'post' == $multicommerce_feature_content_options ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for feature main*/
$wp_customize->add_section( 'multicommerce-feature-content-options', array(
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Main Section( Left Section )', 'multicommerce' ),
	'priority'		=> 20,
	'description'	 => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Main Section, Feature Right Section and  Category Menu Feature Left  .%1$s Note : Please go to %2$s Homepage Settings %3$s, Select "A static page" then "Front page" and "Posts page" to enable it', 'multicommerce' ), '<br />','<b><a class="te-customizer button button-primary" data-section="static_front_page"> ','</a></b>' ),
	'panel'          => 'multicommerce-feature-panel'
) );

/*Feature Content Options*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-content-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-content-options'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_feature_section_content_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-content-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Show', 'multicommerce' ),
	'description'   => esc_html__( 'Show post, page, or product on Feature section', 'multicommerce' ),
	'section'       => 'multicommerce-feature-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-content-options]',
	'type'	  	    => 'select'
) );

/* feature cat selection */
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-post-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-post-cat'],
	'sanitize_callback' => 'multicommerce_sanitize_number'
) );

$wp_customize->add_control(
	new Multicommerce_Customize_Category_Dropdown_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-feature-post-cat]',
		array(
			'label'		=> esc_html__( 'Select Post Category', 'multicommerce' ),
			'section'   => 'multicommerce-feature-content-options',
			'settings'  => 'multicommerce_theme_options[multicommerce-feature-post-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback'=> 'multicommerce_is_feature_content_post'
		)
	)
);


/* feature product cat selection */
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-product-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-product-cat'],
	'sanitize_callback' => 'multicommerce_sanitize_number'
) );

$wp_customize->add_control(
	new Multicommerce_Customize_WC_Category_Dropdown_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-feature-product-cat]',
		array(
			'label'		=> esc_html__( 'Select Product Category', 'multicommerce' ),
			'section'   => 'multicommerce-feature-content-options',
			'settings'  => 'multicommerce_theme_options[multicommerce-feature-product-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback' => 'multicommerce_is_feature_content_product'
		)
	)
);

/*Post Number*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-post-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-post-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-post-number]', array(
	'label'		=> esc_html__( 'Number', 'multicommerce' ),
	'section'   => 'multicommerce-feature-content-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-feature-post-number]',
	'type'	  	=> 'number',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );

/*display-cat*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-slider-display-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-slider-display-cat'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-slider-display-cat]', array(
	'label'		    => esc_html__( 'Display Categories', 'multicommerce' ),
	'section'       => 'multicommerce-feature-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-slider-display-cat]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );

/*display-title*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-slider-display-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-slider-display-title'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-slider-display-title]', array(
	'label'		    => esc_html__( 'Display Title', 'multicommerce' ),
	'section'       => 'multicommerce-feature-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-slider-display-title]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );

/*display-excerpt*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-slider-display-excerpt]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-slider-display-excerpt'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-slider-display-excerpt]', array(
	'label'		    => esc_html__( 'Display Excerpt', 'multicommerce' ),
	'section'       => 'multicommerce-feature-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-slider-display-excerpt]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );

/*display-arrow*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-slider-display-arrow]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-slider-display-arrow'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-slider-display-arrow]', array(
	'label'		    => esc_html__( 'Display Arrow', 'multicommerce' ),
	'section'       => 'multicommerce-feature-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-slider-display-arrow]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );

/*enable-autoplay*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-slider-enable-autoplay]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-slider-enable-autoplay'],
	'sanitize_callback' => 'multicommerce_sanitize_checkbox'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-slider-enable-autoplay]', array(
	'label'		    => esc_html__( 'Enable Autoplay', 'multicommerce' ),
	'section'       => 'multicommerce-feature-content-options',
	'settings'      => 'multicommerce_theme_options[multicommerce-feature-slider-enable-autoplay]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-fs-image-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-fs-image-display-options'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_fs_image_display_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-fs-image-display-options]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Feature Slider Image Display Options', 'multicommerce' ),
	'description'=> esc_html__( 'Recommended Image Size 816*520 ', 'multicommerce' ),
	'section'   => 'multicommerce-feature-content-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-fs-image-display-options]',
	'type'	  	=> 'radio',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );

/*Button text*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-feature-button-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-feature-button-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-feature-button-text]', array(
	'label'		=> esc_html__( 'Button Text', 'multicommerce' ),
	'description'=> esc_html__( 'Left empty to hide', 'multicommerce' ),
	'section'   => 'multicommerce-feature-content-options',
	'settings'  => 'multicommerce_theme_options[multicommerce-feature-button-text]',
	'type'	  	=> 'text',
	'active_callback'   => 'multicommerce_if_feature_not_disable'
) );