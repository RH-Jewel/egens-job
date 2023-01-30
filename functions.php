<?php

/**
 * egenslab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package egenslab
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function egenslab_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on egenslab, use a find and replace
		* to change 'egenslab' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('egenslab', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');


	//* Add support for post formats
	// add_theme_support('post-formats', array(
	// 	'audio',
	// 	'gallery',
	// 	'quote',
	// 	'video'
	// ));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(

		array(
			'primary_menu' => __('Primary Menu', 'egenslab'),
			'top_menu' => __('Top Menu', 'egenslab'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'egenslab_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'egenslab_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function egenslab_content_width()
{
	$GLOBALS['content_width'] = apply_filters('egenslab_content_width', 640);
}
add_action('after_setup_theme', 'egenslab_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function egenslab_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Blog Sidebar', 'egenslab'),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__('Add widgets here.', 'egenslab'),
			'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer One', 'egenslab'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add widgets here.', 'egenslab'),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Two', 'egenslab'),
			'id'            => 'footer-2',
			'description'   => esc_html__('Add widgets here.', 'egenslab'),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Three', 'egenslab'),
			'id'            => 'footer-3',
			'description'   => esc_html__('Add widgets here.', 'egenslab'),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Four', 'egenslab'),
			'id'            => 'footer-4',
			'description'   => esc_html__('Add widgets here.', 'egenslab'),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Five', 'egenslab'),
			'id'            => 'footer-5',
			'description'   => esc_html__('Add widgets here.', 'egenslab'),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action('widgets_init', 'egenslab_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function egenslab_scripts()
{
	wp_enqueue_style('egns-classic', get_template_directory_uri() . '/assets/css/classic-themes.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('egns-custom-style-min', get_template_directory_uri() . '/assets/css/custom.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('egns-style-min', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION, 'all');

	wp_enqueue_style('egenslab-style', get_stylesheet_uri() . '?v=434', array(), _S_VERSION);
	wp_style_add_data('egenslab-style', 'rtl', 'replace');


	wp_enqueue_script('egenslab-custom-min-js', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('egenslab-navigation', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'egenslab_scripts');


if (!function_exists('your_prefix_enqueue_fa5')) {
	function your_prefix_enqueue_fa5()
	{
		wp_enqueue_style('fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all');
		wp_enqueue_style('fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all');
	}
	add_action('wp_enqueue_scripts', 'your_prefix_enqueue_fa5');
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load library file.
 */
require get_template_directory() . '/inc/library/codestar-framework/codestar-framework.php';

/**
 * Load library file.
 */
require get_template_directory() . '/inc/theme-option/theme-options.php';

/**
 * Load Elementor file.
 */
require get_template_directory() . '/inc/elementor.php';


function add_query_vars_filter($vars)
{
	$vars[] = "slug";
	$vars[] = "job_id";
	return $vars;
}

add_filter('query_vars', 'add_query_vars_filter');
