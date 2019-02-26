<?php
/**
 * content and content wrapper end
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_after_content' ) ) :

    function multicommerce_after_content() {
        ?>
            </div><!--inner-content-->
            </div><!-- #content -->
            </div><!-- content-wrapper-->
        <?php
    }

endif;

add_action( 'multicommerce_action_after_content', 'multicommerce_after_content', 10 );

/**
 * Footer content
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_footer' ) ) :

    function multicommerce_footer() {

        global $multicommerce_customizer_all_values;
        ?>
        <footer id="colophon" class="site-footer">
            <div class="footer-wrapper">
                <?php
                if( is_active_sidebar( 'full-width-top-footer' ) ) :
                    echo "<div class='wrapper full-width-top-footer'>";
	                dynamic_sidebar( 'full-width-top-footer' );
	                echo "</div>";
                endif;
                ?>
                <div class="top-bottom wrapper">
                    <?php
                    if(
                        is_active_sidebar('footer-top-col-one') ||
                        is_active_sidebar('footer-top-col-two') ||
                        is_active_sidebar('footer-top-col-three') ||
                        is_active_sidebar('footer-top-col-four')
                    )
                    {
                        ?>
                        <div id="footer-top">
                            <div class="footer-columns clearfix">
			                    <?php
			                    $footer_top_col = 'footer-sidebar teg-col-4';
			                    if (is_active_sidebar('footer-top-col-one')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-one'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-top-col-two')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-two'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-top-col-three')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-three'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-top-col-four')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-four'); ?>
                                    </div>
			                    <?php endif; ?>
                            </div>
                        </div><!-- #foter-top -->
                        <?php
                    }
                    if(
                        is_active_sidebar('footer-bottom-col-one') ||
                        is_active_sidebar('footer-bottom-col-two')
                    )
                    {
                        ?>
                        <div id="footer-bottom">
                            <div class="footer-columns clearfix">
                                <?php
			                    $footer_bottom_col = 'footer-sidebar teg-col-2';
			                    if (is_active_sidebar('footer-bottom-col-one')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_bottom_col); ?>">
					                    <?php dynamic_sidebar('footer-bottom-col-one'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-bottom-col-two')) : ?>
                                    <div class="footer-sidebar float-right <?php echo esc_attr($footer_bottom_col); ?>">
					                    <?php dynamic_sidebar('footer-bottom-col-two'); ?>
                                    </div>
			                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <?php
                    }
	                if( is_active_sidebar( 'full-width-bottom-footer' ) ) :
		                echo "<div class='wrapper full-width-bottom-footer'>";
		                dynamic_sidebar( 'full-width-bottom-footer' );
		                echo "</div>";
	                endif;
	                ?>
                    <div class="clearfix"></div>
                </div><!-- top-bottom-->
                <div class="footer-bottom-info">
                    <div class="wrapper">
	                    <?php
	                    if( is_active_sidebar( 'footer-bottom-left-area' ) ) :
                            ?>
                            <div class="site-info-left">
                                <?php
                                dynamic_sidebar( 'footer-bottom-left-area' );
                                ?>
                            </div>
                        <?php
	                    endif;
	                    ?>
                        <div class="site-info-right">
                            <span>
		                        <?php if( isset( $multicommerce_customizer_all_values['multicommerce-footer-copyright'] ) ): ?>
			                        <?php 
                                    echo wp_kses_post( $multicommerce_customizer_all_values['multicommerce-footer-copyright'] ); 
                                    multicommerce_customizer_shortcut_edit('multicommerce-footer-copyright');
                                    ?>
		                        <?php endif; ?>
                            </span>
                            <span>
	                            <?php 
                                $author_url = 'https'.'://'.'theme'.'egg'.'.'.'com';
                                $author_url = apply_filters( 'multicommerce_author_url', $author_url );
                                printf( esc_html__( '%1$s by %2$s', 'multicommerce' ), 'MultiCommerce', '<a href="'.esc_url($author_url).'">ThemeEgg</a>' ); ?>
                            </span>
                        </div><!-- .site-info -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div><!-- footer-wrapper-->
        </footer><!-- #colophon -->
    <?php
    }
endif;
add_action( 'multicommerce_action_footer', 'multicommerce_footer', 10 );

/**
 * Page end
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'multicommerce_page_end' ) ) :

    function multicommerce_page_end() {
	    global $multicommerce_customizer_all_values;
	    $multicommerce_top_right_button_options = $multicommerce_customizer_all_values['multicommerce-top-right-button-options'];
	    $multicommerce_popup_widget_title = $multicommerce_customizer_all_values['multicommerce-popup-widget-title'];
	    if( 'widget' == $multicommerce_top_right_button_options ){
		    ?>
            <!-- Modal -->
            <div id="te-widget-modal" class="modal fade">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content" id="te-widget-modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <?php
						    if( !empty( $multicommerce_popup_widget_title ) ){
							    ?>
                                <h4 class="modal-title"><?php echo esc_html( $multicommerce_popup_widget_title ); ?></h4>
							    <?php
						    }
						    ?>
                        </div>
                        <?php
                        if( is_active_sidebar( 'popup-widget-area' ) ) :
                            echo "<div class='modal-body'>";
	                        dynamic_sidebar( 'popup-widget-area' );
	                        echo "</div>";
                        endif;
                        ?>
                    </div><!--.modal-content-->
                </div>
            </div><!--#te-shortcode-bootstrap-modal-->
		    <?php
	    }
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'multicommerce_action_after', 'multicommerce_page_end', 10 );