<?php
/*adding sections for header social options */
$wp_customize->add_section( 'multicommerce-header-info', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Basic Info', 'multicommerce' ),
	'panel'          => 'multicommerce-header-panel'
) );

/*header basic info number*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-header-bi-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-header-bi-number'],
	'sanitize_callback' => 'multicommerce_sanitize_select'
) );
$choices = multicommerce_header_bi_number();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-header-bi-number]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Header Basic Info Number Display', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-header-bi-number]',
	'type'	  	=> 'select'
) );

/*first info*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-first-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-first-info-message]',
		array(
			'section'   => 'multicommerce-header-info',
			'description'    => "<hr /><h2>".esc_html__('First Info','multicommerce')."</h2>",
			'settings'  => 'multicommerce_theme_options[multicommerce-first-info-message]',
			'type'	  	=> 'message'
		)
	)
);
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-first-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-first-info-icon'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );

$wp_customize->add_control(
	new Multicommerce_Customize_Icons_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-first-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'multicommerce' ),
			'section'   => 'multicommerce-header-info',
			'settings'  => 'multicommerce_theme_options[multicommerce-first-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-first-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-first-info-title'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-first-info-title]', array(
	'label'		=> esc_html__( 'Title', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-first-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-first-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-first-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-first-info-link]', array(
	'label'		=> esc_html__( 'Link', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-first-info-link]',
	'type'	  	=> 'url'
) );

/*Second Info*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-second-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-second-info-message]',
		array(
			'section'   => 'multicommerce-header-info',
			'description'    => "<hr /><h2>".esc_html__('Second Info','multicommerce')."</h2>",
			'settings'  => 'multicommerce_theme_options[multicommerce-second-info-message]',
			'type'	  	=> 'message',
		)
	)
);
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-second-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-second-info-icon'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Multicommerce_Customize_Icons_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-second-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'multicommerce' ),
			'section'   => 'multicommerce-header-info',
			'settings'  => 'multicommerce_theme_options[multicommerce-second-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-second-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-second-info-title'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-second-info-title]', array(
	'label'		=> esc_html__( 'Title', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-second-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-second-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-second-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-second-info-link]', array(
	'label'		=> esc_html__( 'Link', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-second-info-link]',
	'type'	  	=> 'url'
) );

/*third info*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-third-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-third-info-message]',
		array(
			'section'   => 'multicommerce-header-info',
			'description'    => "<hr /><h2>".esc_html__('Third Info','multicommerce')."</h2>",
			'settings'  => 'multicommerce_theme_options[multicommerce-third-info-message]',
			'type'	  	=> 'message',
		)
	)
);
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-third-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-third-info-icon'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Multicommerce_Customize_Icons_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-third-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'multicommerce' ),
			'section'   => 'multicommerce-header-info',
			'settings'  => 'multicommerce_theme_options[multicommerce-third-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-third-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-third-info-title'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-third-info-title]', array(
	'label'		=> esc_html__( 'Title', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-third-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-third-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-third-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-third-info-link]', array(
	'label'		=> esc_html__( 'Link', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-third-info-link]',
	'type'	  	=> 'url'
) );

/*forth info*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-forth-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-forth-info-message]',
		array(
			'section'   => 'multicommerce-header-info',
			'description'    => "<hr /><h2>".esc_html__('Forth Info','multicommerce')."</h2>",
			'settings'  => 'multicommerce_theme_options[multicommerce-forth-info-message]',
			'type'	  	=> 'message',
		)
	)
);

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-forth-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-forth-info-icon'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Multicommerce_Customize_Icons_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-forth-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'multicommerce' ),
			'section'   => 'multicommerce-header-info',
			'settings'  => 'multicommerce_theme_options[multicommerce-forth-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-forth-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-forth-info-title'],
	'sanitize_callback' => 'multicommerce_sanitize_allowed_html'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-forth-info-title]', array(
	'label'		=> esc_html__( 'Title', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-forth-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-forth-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['multicommerce-forth-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-forth-info-link]', array(
	'label'		=> esc_html__( 'Link', 'multicommerce' ),
	'section'   => 'multicommerce-header-info',
	'settings'  => 'multicommerce_theme_options[multicommerce-forth-info-link]',
	'type'	  	=> 'url'
) );