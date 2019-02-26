<?php
/**
 * Reset options
 * Its outside options panel
 *
 * @param  array $reset_options
 * @return void
 *
 * @since MultiCommerce 1.0.0
 */
if ( ! function_exists( 'multicommerce_reset_db_options' ) ) :
    function multicommerce_reset_db_options( $reset_options ) {
        set_theme_mod( 'multicommerce_theme_options', $reset_options );
    }
endif;

function multicommerce_reset_db_setting( ){
	$multicommerce_customizer_all_values = multicommerce_get_theme_options();
	$input = $multicommerce_customizer_all_values['multicommerce-reset-options'];
	if( '0' == $input ){
		return;
	}
    $multicommerce_default_theme_options = multicommerce_get_default_theme_options();
    $multicommerce_get_theme_options = get_theme_mod( 'multicommerce_theme_options');

    switch ( $input ) {
        case "reset-color-options":
            $multicommerce_get_theme_options['multicommerce-primary-color'] = $multicommerce_default_theme_options['multicommerce-primary-color'];
            multicommerce_reset_db_options($multicommerce_get_theme_options);
            break;

        case "reset-all":
            multicommerce_reset_db_options($multicommerce_default_theme_options);
            break;

        default:
            break;
    }
}
add_action( 'customize_save_after','multicommerce_reset_db_setting' );

/*adding sections for Reset Options*/
$wp_customize->add_section( 'multicommerce-reset-options', array(
    'priority'       => 220,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Reset Options', 'multicommerce' )
) );

/*Reset Options*/
$wp_customize->add_setting( 'multicommerce_theme_options[multicommerce-reset-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['multicommerce-reset-options'],
    'sanitize_callback' => 'multicommerce_sanitize_select',
    'transport'			=> 'postMessage'
) );

$choices = multicommerce_reset_options();
$wp_customize->add_control( 'multicommerce_theme_options[multicommerce-reset-options]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Reset Options', 'multicommerce' ),
    'description'=> esc_html__( 'Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects. ', 'multicommerce' ),
    'section'   => 'multicommerce-reset-options',
    'settings'  => 'multicommerce_theme_options[multicommerce-reset-options]',
    'type'	  	=> 'select'
) );