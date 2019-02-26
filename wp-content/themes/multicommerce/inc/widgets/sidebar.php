<?php
/**
 * Sanitize choices
 * @since MultiCommerce 1.0.0
 * @param null
 * @return string $multicommerce_services_column_number
 *
 */
if ( ! function_exists( 'multicommerce_sanitize_choice_options' ) ) :
	function multicommerce_sanitize_choice_options( $value, $choices, $default ) {
		$input = esc_attr( $value );
		$output = array_key_exists( $input, $choices ) ? $input : $default;
		return $output;
	}
endif;

/**
 * Common functions for widgets
 * @since MultiCommerce 1.0.0
 * @param null
 * @return array $multicommerce_services_column_number
 *
 */
if ( ! function_exists( 'multicommerce_background_options' ) ) :
	function multicommerce_background_options() {
		$multicommerce_services_column_number = array(
			'default' => esc_html__( 'Default', 'multicommerce' ),
			'gray' => esc_html__( 'Gray', 'multicommerce' )
		);
		return apply_filters( 'multicommerce_background_options', $multicommerce_services_column_number );
	}
endif;

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function multicommerce_widget_init(){

	/**
	 * multicommerce_before_widget_init hook
	 * @since MultiCommerce 1.0.2
	 *
	 */
	do_action( 'multicommerce_before_widget_init' );

    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'multicommerce'),
        'id'   => 'multicommerce-sidebar',
        'description' => esc_html__('Displays items on right sidebar.', 'multicommerce'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Left Sidebar', 'multicommerce'),
        'id'   => 'multicommerce-left-sidebar',
        'description' => esc_html__('Displays items on left sidebar.', 'multicommerce'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));
    if ( multicommerce_is_woocommerce_active() ):
	    register_sidebar(array(
	        'name' => esc_html__('Product Right Sidebar', 'multicommerce'),
	        'id'   => 'multicommerce-product-right-sidebar',
	        'description' => esc_html__('Displays items on right sidebar on WooCommerce templates.', 'multicommerce'),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' => '</aside>',
	        'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
	        'after_title' => '</h3></div>'
	    ));
	    register_sidebar(array(
	        'name' => esc_html__('Product Left Sidebar', 'multicommerce'),
	        'id'   => 'multicommerce-product-left-sidebar',
	        'description' => esc_html__('Displays items on left sidebar on WooCommerce templates.', 'multicommerce'),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' => '</aside>',
	        'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
	        'after_title' => '</h3></div>'
	    ));
	endif;
	if ( is_customize_preview() ) {
		$description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s Homepage Settings %3$s, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'multicommerce' ), '<br />','<b><a class="te-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
	}
	else{
		$description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'multicommerce' );
	}
    register_sidebar(array(
        'name' => esc_html__('Homepage  Sections', 'multicommerce'),
        'id'   => 'multicommerce-home',
        'description'	=> $description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="te-title-action-wrapper clearfix"><h2 class="widget-title">',
        'after_title' => '</h2></div>',
    ));

	$description = esc_html__('Displays items on header area. Fit For Advertisement or Advanced WooCommerce Search Widget', 'multicommerce');
	register_sidebar(array(
		'name' => esc_html__('Header Area', 'multicommerce'),
		'id'   => 'multicommerce-header',
		'description' => $description,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));
	
	$description = esc_html__('Displays items before Feature Section. Fit For "About Service" Section Widget', 'multicommerce');
	register_sidebar(array(
		'name' => esc_html__('Before Feature', 'multicommerce'),
		'id'   => 'multicommerce-before-feature',
		'description' => $description,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Single After Content', 'multicommerce'),
		'id'   => 'single-after-content',
		'description' => esc_html__('Displays items on single post after content', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Full Width Top Footer Area', 'multicommerce'),
		'id'   => 'full-width-top-footer',
		'description' => esc_html__('Displays items on Footer area.', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

    register_sidebar(array(
        'name' => esc_html__('Footer Top Column One', 'multicommerce'),
        'id' => 'footer-top-col-one',
        'description' => esc_html__('Displays items on top footer section.', 'multicommerce'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Top Column Two', 'multicommerce'),
        'id' => 'footer-top-col-two',
        'description' => esc_html__('Displays items on top footer section.', 'multicommerce'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Top Column Three', 'multicommerce'),
        'id' => 'footer-top-col-three',
        'description' => esc_html__('Displays items on top footer section.', 'multicommerce'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));

	register_sidebar(array(
		'name' => esc_html__('Footer Top Column Four', 'multicommerce'),
		'id' => 'footer-top-col-four',
		'description' => esc_html__('Displays items on top footer section.', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Bottom Column One', 'multicommerce'),
		'id' => 'footer-bottom-col-one',
		'description' => esc_html__('Displays items on bottom footer section.', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Bottom Column Two', 'multicommerce'),
		'id' => 'footer-bottom-col-two',
		'description' => esc_html__('Displays items on bottom footer section.', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Full Width Bottom Footer Area', 'multicommerce'),
		'id'   => 'full-width-bottom-footer',
		'description' => esc_html__('Displays items on Footer area.', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Bottom Left Area', 'multicommerce'),
		'id'   => 'footer-bottom-left-area',
		'description' => esc_html__('Displays items on Left of the site info', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Popup Area', 'multicommerce'),
		'id'   => 'popup-widget-area',
		'description' => esc_html__('Displays items on Left of the site info', 'multicommerce'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="te-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	/*
	* file for sidebar and widgets
	*/
	require_once multicommerce_file_directory('inc/widgets/fields/teg-widget-fields.php');

	require_once multicommerce_file_directory('inc/widgets/teg-master-widget.php');

	require_once multicommerce_file_directory('inc/widgets/teg-col-posts.php');

	require_once multicommerce_file_directory('inc/widgets/teg-services.php');

	require_once multicommerce_file_directory('inc/widgets/teg-logo.php');

	require_once multicommerce_file_directory('inc/widgets/teg-featured-page.php');

	require_once multicommerce_file_directory('inc/widgets/teg-social.php');

	if ( multicommerce_is_woocommerce_active() ):
		require_once multicommerce_file_directory('inc/widgets/teg-wc-products.php');
		require_once multicommerce_file_directory('inc/widgets/teg-wc-cats.php');
		require_once multicommerce_file_directory('inc/widgets/teg-wc-cats-tabs.php');
		require_once multicommerce_file_directory('inc/widgets/teg-wc-search.php');
	endif;

	/*Widgets*/
	register_widget( 'Multicommerce_Posts_Col' );
	register_widget( 'Multicommerce_Services' );
	register_widget( 'Multicommerce_Advanced_Image_Logo' );
	register_widget( 'Multicommerce_Featured_Page' );
	register_widget( 'Multicommerce_Social' );
	if ( multicommerce_is_woocommerce_active() ) :
		register_widget( 'Multicommerce_Wc_Products' );
		register_widget( 'Multicommerce_Advanced_Search_Widget' );
		register_widget( 'Multicommerce_Wc_Feature_Cats' );
		register_widget( 'Multicommerce_Wc_Cats_Tabs' );
	endif;
	/**
	 * multicommerce_after_widget_init hook
	 * @since MultiCommerce 1.0.2
	 *
	 */
	do_action( 'multicommerce_after_widget_init' );

}
add_action('widgets_init', 'multicommerce_widget_init');

/* ajax callback for get_edit_post_link*/
add_action( 'wp_ajax_teg_get_edit_post_link', 'multicommerce_get_edit_post_link' );
function multicommerce_get_edit_post_link(){
	if( isset( $_GET['id'] ) ){
		$id = absint( $_GET['id'] );
		if( get_edit_post_link( $id ) ){
			?>
			<a class="button button-link te-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">
				<?php esc_html_e('Full Edit','multicommerce');?>
			</a>
			<?php
		}
		else{
			echo 0;
		}
		exit;
	}
}