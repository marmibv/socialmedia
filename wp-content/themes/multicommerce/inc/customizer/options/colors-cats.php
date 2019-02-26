<?php
// Category Color Options
$wp_customize->add_section('multicommerce_category_color_setting', array(
    'priority'      => 50,
    'title'         => esc_html__('Category Color', 'multicommerce'),
    'description'   => esc_html__('Change the highlighted color of each category items as you want.', 'multicommerce'),
    'panel'         => 'multicommerce-options'
));

$i = 1;
$args = array(
    'orderby' => 'id',
    'hide_empty' => 0
);
$categories = get_categories( $args );
$wp_category_list = array();
foreach ($categories as $category_list ) {
    $wp_category_list[$category_list->cat_ID] = esc_attr( $category_list->cat_name );
    $cat_id = esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) );
    $cat_name = esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) );

    $wp_customize->add_setting('multicommerce_theme_options[cte-'.$cat_id.']', array(
        'default'           => $defaults['multicommerce-cte-hover-color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
		    'multicommerce_theme_options[cte-'.$cat_id.']',
		    array(
		    	'label'     => sprintf( esc_html__('"%s" Color', 'multicommerce'), $wp_category_list[$category_list->cat_ID] ),
			    'section'   => 'multicommerce_category_color_setting',
			    'settings'  => 'multicommerce_theme_options[cte-'.$cat_id.']',
			    'priority'  => $i
		    )
	    )
    );
	$wp_customize->add_setting('multicommerce_theme_options[cte-hover-'.$cat_id.']', array(
		'default'           => $defaults['multicommerce-primary-color'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'multicommerce_theme_options[cte-hover-'.$cat_id.']',
			array(
				'label'     => sprintf(esc_html__('"%s" Hover Color', 'multicommerce'), $wp_category_list[$category_list->cat_ID] ),
				'section'   => 'multicommerce_category_color_setting',
				'settings'  => 'multicommerce_theme_options[cte-hover-'.$cat_id.']',
				'priority'  => $i
			)
		)
	);

	/*adding hr between cats*/
	$wp_customize->add_setting('multicommerce_theme_options[cte-hr-'.$cat_id.']', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['multicommerce-primary-color'],
		'sanitize_callback' => 'esc_attr'
	));

	$wp_customize->add_control(
		new Multicommerce_Customize_Message_Control(
			$wp_customize,
			'multicommerce_theme_options[cte-hr-'.$cat_id.']',
			array(
				'section'   => 'multicommerce_category_color_setting',
				'description' => "<hr>",
				'settings'  => 'multicommerce_theme_options[cte-hr-'.$cat_id.']',
				'type'	  	=> 'message',
				'priority'  => $i
			)
		)
	);
    $i++;
}