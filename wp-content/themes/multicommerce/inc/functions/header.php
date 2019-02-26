<?php
/**
 * Displays header media
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @since 1.0.0
 */
function multicommerce_header_image_markup( $html, $header, $attr ) {

	$output = '';
	$multicommerce_customizer_all_values = multicommerce_get_theme_options();
	$multicommerce_header_image_link = $multicommerce_customizer_all_values['multicommerce-header-image-link'];
	$multicommerce_header_image_link_new_tab = $multicommerce_customizer_all_values['multicommerce-header-image-link-new-tab'];
	$output .= '<div class="wrapper header-image-wrap">';
	if ( !empty( $multicommerce_header_image_link)) {
		$target = "";
		if( 1 == $multicommerce_header_image_link_new_tab ){
			$target = 'target = _blank';
		}
		$output .= '<a '.esc_attr( $target ) .' href="'.esc_url( $multicommerce_header_image_link ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
	}
	$output .= $html;
	if ( !empty( $multicommerce_header_image_link)) {
		$output .= ' </a>';
	}
	$output .= "</div>";
	return $output;
}
add_filter( 'get_header_image_tag', 'multicommerce_header_image_markup', 99, 3 );

if ( ! function_exists( 'multicommerce_header_markup' ) ) :

	function multicommerce_header_markup() {
		if ( function_exists( 'the_custom_header_markup' ) ) {
			the_custom_header_markup();
		}else{
			$header_image = get_header_image();
			if( ! empty( $header_image ) ) {
				$multicommerce_customizer_all_values = multicommerce_get_theme_options();
				$multicommerce_header_image_link = $multicommerce_customizer_all_values['multicommerce-header-image-link'];
				$multicommerce_header_image_link_new_tab = $multicommerce_customizer_all_values['multicommerce-header-image-link-new-tab'];
				echo '<div class="wrapper header-image-wrap">';
				if ( !empty( $multicommerce_header_image_link)) {
					$target = "";
				    if( 1 == $multicommerce_header_image_link_new_tab ){
				        $target = "target = '_blank'";
                    }
				    ?>
					<a <?php echo esc_attr( $target ); ?> href="<?php echo esc_url( $multicommerce_header_image_link ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php
				}
				?>
                <img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php
				if ( !empty( $multicommerce_header_image_link ) ) { ?>
					</a>
					<?php
				}
				echo "</div>";
			}
		}
	}
endif;