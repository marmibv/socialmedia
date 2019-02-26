<?php
if ( ! function_exists( 'multicommerce_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function multicommerce_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on MultiCommerce, use a find and replace
         * to change 'multicommerce' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'multicommerce', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
        * Enable support for custom logo.
        *
        *  @since MultiCommerce 1.0.0
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 290,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        set_post_thumbnail_size( 240, 172, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'multicommerce' ),
            'top-menu' => esc_html__( 'Top Menu', 'multicommerce' ),
            'category-menu' => esc_html__( 'Category Menu', 'multicommerce' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'multicommerce_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        /*Post Format Support*/
        add_theme_support( 'post-formats', array('aside', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );
        
        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style('assets/css/editor-style.min.css');

        // Adding excerpt for page
        add_post_type_support( 'page', 'excerpt' );

        /*woocommerce support*/
        add_theme_support( 'woocommerce' );

        /*Set up the woocommerce Gallery Lightbox*/
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        $starter_content = array(
            'widgets'   => array( 
                'multicommerce-left-sidebar' => array(
                    'search', 
                    'categories', 
                    'meta',
                ),
                'multicommerce-home' => array(
                    'search', 
                    'categories', 
                    'meta',
                ),
            ),
            'posts' => array(
                'home',
                'about',
                'contact',
                'blog',
            ),
            'options' => array(
                'show_on_front'=>'page',
                'page_on_front'=>'{{home}}',
                'page_for_posts'=>'{{blog}}',
            ),
            'theme_mods' => array(

            ),
            'nav_menus' => array(
                'primary'=> array(
                    'name'  => esc_html__('Primary Menu', 'multicommerce'),
                    'items' => array(
                        'link_home',
                        'page_about',
                        'page_blog',
                        'page_contact',
                    ),
                ),
            ),
        );
        $starter_content = apply_filters('multicommerce_starter_content', $starter_content);

        add_theme_support( 'starter-content', $starter_content );

    }
endif; // multicommerce_setup
add_action( 'after_setup_theme', 'multicommerce_setup' );


if ( ! function_exists( 'multicommerce_fallback_menu' ) ) :
/**
 *
 */
function multicommerce_fallback_menu() {

    $home_url = esc_url(home_url('/'));
    $fallback_menu = '<ul id="main-menu" class="menu">';
    $fallback_menu .= '<li><a href="' . $home_url . '" rel="home">' . esc_html__('Home', 'multicommerce') . '</a></li>';
    $fallback_menu .= '<li><a target="_blank" href="https://demo.themeegg.com/themes/multicommerce/" rel="home">' . esc_html__('Demo', 'multicommerce') . '</a></li>';
    $fallback_menu .= '<li><a target="_blank" href="https://docs.themeegg.com/docs/multicommerce/" rel="home">' . esc_html__('Docs', 'multicommerce') . '</a></li>';
    $fallback_menu .= '<li><a target="_blank" href="https://themeegg.com/support-forum/forum/multicommerce-theme/" rel="home">' . esc_html__('Support', 'multicommerce') . '</a></li>';
    $fallback_menu .= '</ul>';

    echo $fallback_menu;
    
}

endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function multicommerce_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'multicommerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'multicommerce_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function multicommerce_scripts() {
    global $multicommerce_customizer_all_values;

    /*google font*/
    $google_fonts = multicommerce_google_font_family();
    wp_enqueue_style( 'multicommerce-googleapis', '//fonts.googleapis.com/css?family='.$google_fonts, array(), '1.0.0' );
    
    /*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );

    /*Select 2*/
    if( multicommerce_is_woocommerce_active() ){
        wp_enqueue_style('select2');
        wp_enqueue_script('select2');
    }

    wp_enqueue_style( 'multicommerce-main', get_template_directory_uri().'/assets/css/main.min.css', array(), '1.0.2' );
    wp_style_add_data( 'multicommerce-main', 'rtl', 'replace' );

    wp_enqueue_style( 'multicommerce-woocommerce', get_template_directory_uri().'/assets/css/woocommerce.min.css', array(), '1.0.2' );
    wp_style_add_data( 'multicommerce-woocommerce', 'rtl', 'replace' );

    wp_enqueue_style( 'multicommerce-style', get_stylesheet_uri(), array(), '1.0.2' );

    /*jquery start*/
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), '3.7.3', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), '1.4.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    /*slick slider*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.css', array(), '1.8.1' );
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/library/slick/slick.min.js', array('jquery'), '1.8.1', 1);

    wp_enqueue_script('slicknav', get_template_directory_uri() . '/assets/library/SlickNav/jquery.slicknav.min.js', array('jquery'), '1.0.10', 1);

    if( 1 == $multicommerce_customizer_all_values['multicommerce-enable-sticky-sidebar'] ){
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/theia-sticky-sidebar/theia-sticky-sidebar.min.js', array('jquery'), '1.7.0', 1);
    }

    wp_enqueue_script('multicommerce-custom', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '1.0.2', 1);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'multicommerce_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function multicommerce_is_edit_page() {
    //make sure we are on the backend
    if ( !is_admin() ){
        return false;
    }
    global $pagenow;
    return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

/**
 * Enqueue admin scripts and styles.
 */
function multicommerce_admin_scripts( $hook ) {
    wp_register_script( 'multicommerce-admin-script', get_template_directory_uri() . '/assets/js/teg-admin.min.js', array( 'jquery' ), '1.0.2' );
    wp_register_style( 'multicommerce-admin-style', get_template_directory_uri() . '/assets/css/teg-admin.min.css', array(), '1.0.2' );
    wp_style_add_data( 'multicommerce-admin-style', 'rtl', 'replace' );
    wp_register_style( 'multicommerce-about-style', get_template_directory_uri() . '/assets/css/teg-about.min.css', array(), '1.0.2' );
    wp_style_add_data( 'multicommerce-about-style', 'rtl', 'replace' );
    if ( 'widgets.php' == $hook || multicommerce_is_edit_page() ){
        wp_enqueue_media();
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'multicommerce-admin-script');
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'multicommerce-admin-style');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );
    }
}
add_action( 'admin_enqueue_scripts', 'multicommerce_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require_once multicommerce_file_directory('inc/core/template-tags.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require_once multicommerce_file_directory('inc/core/extras.php');

/**
 * Load custom header.
 */
require_once multicommerce_file_directory('inc/core/custom-header.php');

/**
 * Load Jetpack compatibility file.
 */
require_once multicommerce_file_directory('inc/core/jetpack.php');