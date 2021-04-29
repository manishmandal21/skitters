<?php
/**
 * Skitters functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skitters
 */

if ( ! function_exists( 'skitters_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skitters_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Skitters, use a find and replace
		 * to change 'skitters' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'skitters', get_template_directory() . '/languages' );

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
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'skitters' )
            )
        );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'skitters_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'skitters_setup' );

/**
 * Define constants
 */
// SKITTERS Root directory/URI.
define( 'SKITTERS_PARENT_DIR', get_template_directory() );
define( 'SKITTERS_PARENT_URI', get_template_directory_uri() );

// SKITTERS Include directory/URI.
define( 'SKITTERS_INC_DIR', SKITTERS_PARENT_DIR . '/inc' );
define( 'SKITTERS_INC_URI', SKITTERS_PARENT_URI . '/inc' );

// SKITTERS Assets directory/URI.
define( 'SKITTERS_ASSETS_DIR', SKITTERS_PARENT_DIR . '/assets' );
define( 'SKITTERS_ASSETS_URI', SKITTERS_PARENT_URI . '/assets' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skitters_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'skitters_content_width', 640 );
}
add_action( 'after_setup_theme', 'skitters_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skitters_widgets_init() {
    $sidebars = apply_filters( 'skitters_sidebars_args', array(
        'right-sidebar'  => esc_html__( 'Right Sidebar', 'skitters' ),
        'footer'         => esc_html__( 'Footer', 'skitters' ),

    ) );

    foreach ( $sidebars as $id => $name ) :

        register_sidebar( array(
            'id'            => $id,
            'name'          => $name,
            'description'   => esc_html__( 'Add widgets here.', 'skitters' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );

    endforeach;

}
add_action( 'widgets_init', 'skitters_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skitters_scripts() {
    /* Bootstrap */
	wp_enqueue_style('bootstrap', SKITTERS_ASSETS_URI . '/css/bootstrap.min.css', array(), '4.3.1', 'all');

	/* Bootstrap */
	wp_enqueue_style('fontawesome', SKITTERS_ASSETS_URI . '/css/fontawesome.css', array(), '5.11.2', 'all');

	/*Theme Style*/
    wp_enqueue_style( 'skitters-style', get_stylesheet_uri() );

    /*Theme Responsive Style*/
    wp_enqueue_style('responsive', SKITTERS_ASSETS_URI . '/css/responsive.css', array(), '1.0', 'all');

    /*Navigation Script*/
	wp_enqueue_script( 'skitters-navigation', SKITTERS_ASSETS_URI . '/js/navigation.min.js', array(), '20151215', true );

    /*Skip Link Script*/
	wp_enqueue_script( 'skitters-skip-link-focus-fix', SKITTERS_ASSETS_URI . '/js/skip-link-focus-fix.min.js', array(), '20151215', true );

    /*BooTstrap Script*/
	wp_enqueue_script( 'bootstrap', SKITTERS_ASSETS_URI . '/js/bootstrap.min.js', array(), '4.3.1', true );

	/*Smooth Scrollbar Script*/
	wp_enqueue_script( 'smooth-scroll', SKITTERS_ASSETS_URI . '/js/smooth-scrollbar.min.js', array(), '8.4.1', true );

	/*Custom Script*/
	wp_enqueue_script( 'custom', SKITTERS_ASSETS_URI . '/js/custom.js', array(), rand(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skitters_scripts' );


/**
 * Implement the Custom Header feature.
 */
require SKITTERS_INC_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require SKITTERS_INC_DIR . '/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require SKITTERS_INC_DIR . '/template-functions.php';

/**
 * Customizer additions.
 */
require SKITTERS_INC_DIR . '/customizer/customizer.php';
require SKITTERS_INC_DIR . '/customizer/colors.php';

/**
 * Load custom theme hooks
 */
require SKITTERS_INC_DIR . '/hooks/custom-theme-hooks.php';
require SKITTERS_INC_DIR . '/hooks/hooks.php';


/**
 * Load navwalker for bootstrap
 */
require SKITTERS_INC_DIR . '/class-wp-bootstrap-navwalker.php';

/**
 * Add editor style css
 */

add_editor_style('assets/css/editor-style.css');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require SKITTERS_INC_DIR . '/jetpack.php';
}