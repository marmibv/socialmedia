<?php
/**
 * content and content wrapper end
 *
 * @since DuperMag 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'supermag_after_content' ) ) :

    function supermag_after_content() {
      ?>
        </div><!-- #content -->
        </div><!-- content-wrapper-->
    <?php
    }
endif;
add_action( 'supermag_action_after_content', 'supermag_after_content', 10 );

/**
 * Footer content
 *
 * @since DuperMag 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'supermag_footer' ) ) :

    function supermag_footer() {

        global $supermag_customizer_all_values;
        ?>
        <div class="clearfix"></div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="footer-wrapper">
                <div class="top-bottom wrapper">
                    <div id="footer-top">
                        <div class="footer-columns">
                           <?php if( is_active_sidebar( 'footer-col-one' ) ) : ?>
                                <div class="footer-sidebar acme-col-3">
                                    <?php dynamic_sidebar( 'footer-col-one' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( is_active_sidebar( 'footer-col-two' ) ) : ?>
                                <div class="footer-sidebar acme-col-3">
                                    <?php dynamic_sidebar( 'footer-col-two' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( is_active_sidebar( 'footer-col-three' ) ) : ?>
                                <div class="footer-sidebar acme-col-3">
                                    <?php dynamic_sidebar( 'footer-col-three' ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="clear"></div>

                        </div>
                    </div><!-- #foter-top -->
                    <div class="clearfix"></div>
                 </div><!-- top-bottom-->
                <div class="footer-copyright border text-center">
                    <p>
                        <?php if( isset( $supermag_customizer_all_values['supermag-footer-copyright'] ) ): ?>
                            <?php echo wp_kses_post( $supermag_customizer_all_values['supermag-footer-copyright'] ); ?>
                        <?php endif; ?>
                    </p>
                    <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'dupermag' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'dupermag' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'dupermag' ), 'DuperMag', '<a href="http://www.acmethemes.com/" rel="designer">AcmeThemes</a>' ); ?>
                    </div><!-- .site-info -->
                </div>
            </div><!-- footer-wrapper-->
        </footer><!-- #colophon -->
    <?php
    }
endif;
add_action( 'supermag_action_footer', 'supermag_footer', 10 );

/**
 * Page end
 *
 * @since supermag 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'supermag_page_end' ) ) :

    function supermag_page_end() {
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'supermag_action_after', 'supermag_page_end', 10 );