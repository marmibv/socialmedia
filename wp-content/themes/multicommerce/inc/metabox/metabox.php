<?php
/**
 * MultiCommerce sidebar layout options
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('multicommerce_sidebar_layout_options') ) :
    function multicommerce_sidebar_layout_options() {
        $multicommerce_sidebar_layout_options = array(
            'default-sidebar' => array(
                'value'     => 'default-sidebar',
                'thumbnail' => get_template_directory_uri() . '/assets/img/default-sidebar.png'
            ),
            'left-sidebar' => array(
                'value'     => 'left-sidebar',
                'thumbnail' => get_template_directory_uri() . '/assets/img/left-sidebar.png'
            ),
            'right-sidebar' => array(
                'value' => 'right-sidebar',
                'thumbnail' => get_template_directory_uri() . '/assets/img/right-sidebar.png'
            ),
            'both-sidebar' => array(
                'value'     => 'both-sidebar',
                'thumbnail' => get_template_directory_uri() . '/assets/img/both-sidebar.png'
            ),
            'no-sidebar' => array(
                'value'     => 'no-sidebar',
                'thumbnail' => get_template_directory_uri() . '/assets/img/no-sidebar.png'
            ),
            'no-sidebar-center' => array(
                'value'     => 'no-sidebar-center',
                'thumbnail' => get_template_directory_uri() . '/assets/img/no-sidebar-center.png'
            ),

        );
        return apply_filters( 'multicommerce_sidebar_layout_options', $multicommerce_sidebar_layout_options );
    }
endif;

/**
 * Custom Metabox
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'multicommerce_add_metabox' )):
    function multicommerce_add_metabox() {
        add_meta_box(
            'multicommerce_sidebar_layout', // $id
            esc_html__( 'Sidebar Layout', 'multicommerce' ), // $title
            'multicommerce_sidebar_layout_callback', // $callback
            'post', // $page
            'side', // $context
            'high'
        ); // $priority

        add_meta_box(
            'multicommerce_sidebar_layout', // $id
            esc_html__( 'Sidebar Layout', 'multicommerce' ), // $title
            'multicommerce_sidebar_layout_callback', // $callback
            'page', // $page
            'normal', // $context
            'high'
        ); // $priority

	    add_meta_box(
		    'multicommerce_sidebar_layout', // $id
		    esc_html__( 'Sidebar Layout', 'multicommerce' ), // $title
		    'multicommerce_sidebar_layout_callback', // $callback
		    'product', // $page
		    'normal', // $context
		    'high'
	    ); // $priority
    }
endif;
add_action('add_meta_boxes', 'multicommerce_add_metabox');

/**
 * Callback function for metabox
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('multicommerce_sidebar_layout_callback') ) :
    function multicommerce_sidebar_layout_callback(){
        global $post;
        $multicommerce_sidebar_layout_options = multicommerce_sidebar_layout_options();
        $multicommerce_sidebar_layout = 'default-sidebar';
        $multicommerce_sidebar_meta_layout = get_post_meta( $post->ID, 'multicommerce_sidebar_layout', true );
        if( !multicommerce_is_null_or_empty($multicommerce_sidebar_meta_layout) ){
            $multicommerce_sidebar_layout = $multicommerce_sidebar_meta_layout;
        }
        wp_nonce_field( basename( __FILE__ ), 'multicommerce_sidebar_layout_nonce' );
        ?>
        <table class="form-table page-meta-box">
            <tr>
                <td>
                    <?php
                    foreach ( $multicommerce_sidebar_layout_options as $field ) {
                        ?>
                        <div class="hide-radio radio-image-wrapper">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="multicommerce_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $multicommerce_sidebar_layout ); ?> />
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                            </label>
                        </div>
                    <?php } // end foreach
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td><em class="f13"><?php esc_html_e( 'You can set up the sidebar content', 'multicommerce' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_html_e( 'here', 'multicommerce' ); ?></a></em></td>
            </tr>
        </table>
        <?php
    }
endif;

/**
 * save the custom metabox data
 * @hooked to save_post hook
 *
 * @since MultiCommerce 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('multicommerce_save_sidebar_layout') ) :
    function multicommerce_save_sidebar_layout( $post_id ) {

        // Verify the nonce before proceeding.
        if ( !isset( $_POST[ 'multicommerce_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'multicommerce_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
            return;

        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
            return;

        if ('page' == $_POST['post_type']) {
            if (!current_user_can( 'edit_page', $post_id ) )
                return $post_id;
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }

        //Execute this saving function
        if(isset($_POST['multicommerce_sidebar_layout'])){
            $old = get_post_meta( $post_id, 'multicommerce_sidebar_layout', true);
            $new = sanitize_text_field($_POST['multicommerce_sidebar_layout']);
            if ($new && $new != $old) {
                update_post_meta($post_id, 'multicommerce_sidebar_layout', $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id,'multicommerce_sidebar_layout', $old);
            }
        }
    }
endif;
add_action('save_post', 'multicommerce_save_sidebar_layout');