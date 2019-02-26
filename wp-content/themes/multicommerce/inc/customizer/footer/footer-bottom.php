<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'multicommerce-footer-option', array(
    'priority'      => 80,
    'capability'    => 'edit_theme_options',
    'panel'			=> 'multicommerce-footer-panel',
    'title'         => esc_html__( 'Footer Bottom', 'multicommerce' )
) );

/*copyright*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-footer-copyright]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-footer-copyright'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-footer-copyright]', array(
    'label'		=> esc_html__( 'Copyright Text', 'multicommerce' ),
    'section'   => 'multicommerce-footer-option',
    'settings'  => 'multicommerce_theme_options[multicommerce-footer-copyright]',
    'type'	  	=> 'text'
) );

/*footer info*/
$wp_customize->add_setting('multicommerce_theme_options[multicommerce-footer-info]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));
$description = sprintf( esc_html__( 'Add Footer Widgets from %1$s here%2$s', 'multicommerce' ), '<a class="te-customizer button button-primary" data-section="sidebar-widgets-footer-bottom-left-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new Multicommerce_Customize_Message_Control(
		$wp_customize,
		'multicommerce_theme_options[multicommerce-footer-info]',
		array(
			'section'   => 'multicommerce-footer-option',
			'description'    => $description,
			'settings'  => 'multicommerce_theme_options[multicommerce-footer-info]',
			'type'	  	=> 'message'
		)
	)
);