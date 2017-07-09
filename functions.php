<?php
/**
 * MDD WordPress Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package William_Boles
 */

if ( ! function_exists( 'wp_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MDD WordPress Starter, use a find and replace
	 * to change 'wp-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-starter', get_template_directory() . '/languages' );

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
	 * Enable support for theme logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 20,
		'width'       => 32,
		'flex-height' => false,
		'flex-width'  => true,
		'header-text' => 'site-title'
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Register Custom Navigation Walker
	require_once('inc/wp-bootstrap-navwalker.php');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main navigation area', 'wp-starter' ),
	) );



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

	/*
	 * Add support for post formats
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'image',
		'video',
		'quote',
		'status'
	) );

	// Register Custom Comments Walker
	require_once('inc/wp-bootstrap-comment-walker.php');

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'wp_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'wp-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s col-sm-12"><div class="panel panel-default">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<div class="widget-title panel-heading"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Left Footer', 'wp-starter' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="panel panel-default">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<div class="widget-title panel-heading"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Center Footer', 'wp-starter' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'wp-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="panel panel-default">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<div class="widget-title panel-heading"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Footer', 'wp-starter' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'wp-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="panel panel-default">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<div class="widget-title panel-heading"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'wp_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_starter_scripts() {
	wp_enqueue_style( 'fontawesome', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" );

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_starter_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wp_starter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'wp_starter_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Recommend the Kirki plugin
 */
require get_template_directory() . '/inc/include-kirki.php';

/**
 * Load the Kirki Fallback class
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load template files.
 */
require get_template_directory() . '/inc/site-navigation.php';
require get_template_directory() . '/inc/frontpage-jumbotron.php';
require get_template_directory() . '/inc/footer-text.php';
