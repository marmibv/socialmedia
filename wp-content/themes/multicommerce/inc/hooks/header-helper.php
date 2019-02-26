<?php
/**
 * Display Basic Info
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('multicommerce_basic_info') ) :

	function multicommerce_basic_info( ) {
		global $multicommerce_customizer_all_values;
		$multicommerce_basic_info_data = array();

		$multicommerce_first_info_icon = $multicommerce_customizer_all_values['multicommerce-first-info-icon'] ;
		$multicommerce_first_info_title = $multicommerce_customizer_all_values['multicommerce-first-info-title'];
		$multicommerce_first_info_link = $multicommerce_customizer_all_values['multicommerce-first-info-link'];
		$multicommerce_basic_info_data[] = array(
			"icon" => $multicommerce_first_info_icon,
			"title" => $multicommerce_first_info_title,
			"link" => $multicommerce_first_info_link
		);

		$multicommerce_second_info_icon = $multicommerce_customizer_all_values['multicommerce-second-info-icon'] ;
		$multicommerce_second_info_title = $multicommerce_customizer_all_values['multicommerce-second-info-title'];
		$multicommerce_second_info_link = $multicommerce_customizer_all_values['multicommerce-second-info-link'];
		$multicommerce_basic_info_data[] = array(
			"icon" => $multicommerce_second_info_icon,
			"title" => $multicommerce_second_info_title,
			"link" => $multicommerce_second_info_link
		);

		$multicommerce_third_info_icon = $multicommerce_customizer_all_values['multicommerce-third-info-icon'] ;
		$multicommerce_third_info_title = $multicommerce_customizer_all_values['multicommerce-third-info-title'];
		$multicommerce_third_info_link = $multicommerce_customizer_all_values['multicommerce-third-info-link'];
		$multicommerce_basic_info_data[] = array(
			"icon" => $multicommerce_third_info_icon,
			"title" => $multicommerce_third_info_title,
			"link" => $multicommerce_third_info_link
		);

		$multicommerce_forth_info_icon = $multicommerce_customizer_all_values['multicommerce-forth-info-icon'] ;
		$multicommerce_forth_info_title = $multicommerce_customizer_all_values['multicommerce-forth-info-title'];
		$multicommerce_forth_info_link = $multicommerce_customizer_all_values['multicommerce-forth-info-link'];
		$multicommerce_basic_info_data[] = array(
			"icon" => $multicommerce_forth_info_icon,
			"title" => $multicommerce_forth_info_title,
			"link" => $multicommerce_forth_info_link
		);

		$column = count( $multicommerce_basic_info_data );
		if( $column == 1 ){
			$col= "col-md-12";
		}
        elseif( $column == 2 ){
			$col= "col-md-6";
		}
        elseif( $column == 3 ){
			$col= "col-md-4";
		}
		else{
			$col= "col-md-3";
		}
		$i = 0;
		$number = $multicommerce_customizer_all_values['multicommerce-header-bi-number'];

		echo "<div class='icon-box'>";
		multicommerce_customizer_shortcut_edit('multicommerce-first-info-title');
		foreach ( $multicommerce_basic_info_data as $base_basic_info_data) {
			if( $i >= $number ){
				break;
			}
			?>
            <div class="icon-box <?php echo esc_attr( $col );?>">
				<?php
				if( !empty( $base_basic_info_data['icon'])){
					?>
                    <div class="icon">
                        <i class="fa <?php echo esc_attr( $base_basic_info_data['icon'] );?>"></i>
                    </div>
					<?php
				}
				if( !empty( $base_basic_info_data['title'] ) ){
					?>
                    <div class="icon-details">
						<?php
						if( !empty( $base_basic_info_data['title']) ){
							if( !empty( $base_basic_info_data['link'])){
								echo '<a href="'.esc_url( $base_basic_info_data['link'] ).'">'.'<span class="icon-text">'.esc_html( $base_basic_info_data['title'] ).'</span>'.'</a>';
                            }else{
	                            echo '<span class="icon-text">'.esc_html( $base_basic_info_data['title'] ).'</span>';
                            }
						}
						?>
                    </div>
					<?php
				}
				?>
            </div>
			<?php
			$i++;
		}
		echo "</div>";
	}
endif;
add_action( 'multicommerce_action_basic_info', 'multicommerce_basic_info', 10, 2 );

/**
 * Display Social Links
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('multicommerce_social_links') ) :

	function multicommerce_social_links( ) {

		global $multicommerce_customizer_all_values;
		$multicommerce_social_data = json_decode( $multicommerce_customizer_all_values['multicommerce-social-data'] );
		if( is_array( $multicommerce_social_data )){
			multicommerce_customizer_shortcut_edit('multicommerce-social-data');
			foreach ( $multicommerce_social_data as $social_data ){
				$icon = $social_data->icon;
				$link = $social_data->link;
				$checkbox = $social_data->checkbox;
				$icons_type = $social_data->select;
				echo '<div class="icon-box '.esc_attr($icons_type).'">';
				echo '<a href="'.esc_url( $link ).'" target="'.($checkbox == 1 ? '_blank':'').'">';
				echo '<i class="fa '.esc_attr( $icon ).'"></i>';
				echo '</a>';
				echo '</div>';
			}
		}
	}
endif;
add_action( 'multicommerce_action_social_links', 'multicommerce_social_links', 10 );

if ( !function_exists('multicommerce_top_menu') ) :

	function multicommerce_top_menu( ) {
		echo "<div class='te-first-level-nav te-display-inline-block'>";
		wp_nav_menu(
			array(
				'theme_location' => 'top-menu',
				'container' => false,
				'depth' => 1
			)
		);
		echo "</div>";
	}
endif;
add_action( 'multicommerce_action_top_menu', 'multicommerce_top_menu', 10 );