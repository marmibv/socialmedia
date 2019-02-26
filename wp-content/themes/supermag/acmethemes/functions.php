<?php
/**
 * List down the post category
 *
 * @since SuperMag 1.0.0
 *
 * @param int $post_id
 * @return string list of category
 *
 */
if ( !function_exists('supermag_list_category') ) :
    function supermag_list_category( $post_id = 0 ) {

        if( 0 == $post_id ){
            global $post;
            $post_id = $post->ID;
        }
        $categories = get_the_category($post_id);
        $separator = '&nbsp;';
        $output = '';
        if($categories) {
            $output .= '<span class="cat-links">';
            foreach($categories as $category) {
                $output .= '<a class="at-cat-item-'.esc_attr($category->term_id).'" href="'.esc_url( get_category_link( $category->term_id ) ).'"  rel="category tag">'.esc_html( $category->cat_name ).'</a>'.$separator;
            }
            $output .='</span>';
            echo trim( $output, $separator );
        }
    }
endif;

/**
 * Callback functions for comments
 *
 * @since SuperMag 1.0.0
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 */
if ( !function_exists('supermag_commment_list') ) :

    function supermag_commment_list($comment, $args, $depth) {
        extract($args, EXTR_SKIP);
        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        }
        else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?>
        <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, '64'); ?>
            <?php printf(__('<cite class="fn">%s</cite>', 'supermag' ), get_comment_author_link()); ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'supermag'); ?></em>
            <br/>
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <i class="fa fa-clock-o"></i>
                <?php
                /* translators: 1: date, 2: time */
                printf(__('%1$s at %2$s', 'supermag'), get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link(__('(Edit)', 'supermag'), '  ', ''); ?>
        </div>
        <?php comment_text(); ?>
        <div class="reply">
            <?php comment_reply_link( array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
        <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif;
    }
endif;

/**
 * Date display functions
 *
 * @since SuperMag 1.0.0
 * edited 1.5.0
 *
 * @param string $format
 * @return string
 *
 */
if ( ! function_exists( 'supermag_date_display' ) ) :
    function supermag_date_display( $format = 'l, F j, Y') {
	    $supermag_customizer_all_values = supermag_get_theme_options();
	    if( 'default' == $supermag_customizer_all_values['supermag-header-date-format'] ){
		    echo esc_html( date_i18n( $format ) );
        }
        else{
	        echo date_i18n(get_option('date_format'));
        }
    }
endif;

/**
 * Return content of fixed lenth
 *
 * @since SuperMag 1.0.0
 *
 * @param string $supermag_content
 * @param int $length
 * @return string
 *
 */
if ( ! function_exists( 'supermag_words_count' ) ) :
    function supermag_words_count( $supermag_content = null, $length = 16 ) {
        $length = absint( $length );
        $source_content = preg_replace( '`\[[^\]]*\]`', '', $supermag_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '...' );
        return $trimmed_content;
    }
endif;

/**
 * BreadCrumb Settings
 */
if( ! function_exists( 'supermag_breadcrumbs' ) ):
	function supermag_breadcrumbs() {
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require supermag_file_directory('acmethemes/library/breadcrumbs/breadcrumbs.php');
		}
		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false
		);
		$supermag_customizer_all_values = supermag_get_theme_options();

		$supermag_you_are_here_text = $supermag_customizer_all_values['supermag-you-are-here-text'];
		if( !empty( $supermag_you_are_here_text ) ){
			$supermag_you_are_here_text = "<span class='breadcrumb'>".$supermag_you_are_here_text."</span>";
		}

		echo "<div class='breadcrumbs init-animate clearfix'>".$supermag_you_are_here_text."<div id='supermag-breadcrumbs' class='clearfix'>";
		breadcrumb_trail( $breadcrumb_args );
		echo "</div></div>";
	}
endif;