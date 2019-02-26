<?php
/**
 * feature sider side posts and ads
 *
 * @since DuperMag 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('supermag_feature_side') ) :

    function supermag_feature_side() {

        global $supermag_customizer_all_values;
        echo '<div class="besides-slider">';
        echo '<div class="besides-slider-left">';
        /*Featured Post Beside Slider*/
        $supermag_feature_site_cat = $supermag_customizer_all_values['supermag-feature-side-cat'];
        $supermag_float_fixed = 1;
        if( !empty($supermag_feature_site_cat) ){
            $beside_post_args = array(
                'cat'                 => $supermag_feature_site_cat,
                'posts_per_page'      => 4,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            );
            $beside_query = new WP_Query($beside_post_args);
            if ($beside_query->have_posts()) {
                while ($beside_query->have_posts()) {
                    $beside_query->the_post();
                    if (has_post_thumbnail()) {
                        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-thumbnail');
                    }
                    else {
                        $image_url[0] = get_template_directory_uri() . '/assets/img/no-image-240-172.png';
                    }
                    ?>
                    <div class="beside-post clearfix" style="background-image: url('<?php echo esc_url( $image_url[0] ); ?>')">
                        <a href="<?php the_permalink(); ?>">
                            <div class="overlay"></div>
                        </a>
                        <div class="beside-caption clearfix">
                            <h3 class="post-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
                            <div class="post-date">
                                <?php
                                $archive_year  = get_the_date('Y');
                                $archive_month = get_the_date('m');
                                $archive_day   = get_the_date('d');
                                ?>
                                <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo esc_attr( get_the_date('F d, Y') ); ?>
                                </a>
                                <?php comments_popup_link( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' );?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if( 2 == $supermag_float_fixed ){
                        echo "</div>";
                        echo '<div class="besides-slider-right">';
                    }
                    $supermag_float_fixed++;
                }
            }
            wp_reset_postdata();
        }
        else{
            ?>
            <div class="beside-post clearfix">
                <figure class="beside-thumb clearfix">
                    <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-240-172.png" ); ?>"/>
                </figure>
                <div class="beside-caption clearfix" style="color: #2D2D2D">
                    <h3 class="post-title" style="color: #2D2D2D">
                        <?php _e('Select post', 'dupermag' );?>
                    </h3>
                    <div class="post-date">
                        <?php _e(' Goto Appearance > Customize > Featured Section Options', 'dupermag' );?>
                    </div>
                </div>
            </div>
            <div class="beside-post clearfix">
                <figure class="beside-thumb clearfix">
                    <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-240-172.png" ); ?>"/>
                </figure>
                <div class="beside-caption clearfix" style="color: #2D2D2D">
                    <h3 class="post-title">
                        <?php _e('Select another post', 'dupermag' );?>
                    </h3>
                    <div class="post-date">
                        <?php _e(' Goto Appearance > Customize > Featured Section Options', 'dupermag' );?>
                    </div>
                </div>
            </div>
            <?php
            echo "</div>";/*besides-slider-left*/
            echo '<div class="besides-slider-right">';
            ?>
            <div class="beside-post clearfix">
                <figure class="beside-thumb clearfix">
                    <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-240-172.png" ); ?>"/>
                </figure>
                <div class="beside-caption clearfix" style="color: #2D2D2D">
                    <h3 class="post-title" style="color: #2D2D2D">
                        <?php _e('Select post', 'dupermag' );?>
                    </h3>
                    <div class="post-date">
                        <?php _e(' Goto Appearance > Customize > Featured Section Options', 'dupermag' );?>
                    </div>
                </div>
            </div>
            <div class="beside-post clearfix">
                <figure class="beside-thumb clearfix">
                    <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-240-172.png" ); ?>"/>
                </figure>
                <div class="beside-caption clearfix" style="color: #2D2D2D">
                    <h3 class="post-title">
                        <?php _e('Select another post', 'dupermag' );?>
                    </h3>
                    <div class="post-date">
                        <?php _e(' Goto Appearance > Customize > Featured Section Options', 'dupermag' );?>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div><!-- .beides-slider-right -->';
        echo '</div><!-- .beides-block -->';
    }
endif;
add_action( 'supermag_action_feature_side', 'supermag_feature_side', 0 );