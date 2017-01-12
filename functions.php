<?php
/**
 * Drubo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Drubo
 */

if ( ! function_exists( 'drubo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function drubo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Drubo, use a find and replace
	 * to change 'drubo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'drubo', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'drubo' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'drubo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'drubo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function drubo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'drubo_content_width', 640 );
}
add_action( 'after_setup_theme', 'drubo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function drubo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'drubo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'drubo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'drubo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function drubo_scripts() {
	/**
	 * ===================================================================================
	 * 	*****	Stylesheets assets  *****
	 * ===================================================================================
	 */

	// Bootstrap
	wp_enqueue_style( 'Bootstrap' , get_template_directory_uri().'/css/bootstrap.min.css', '' , '3.3.5' , 'all' );
	// This core.css file contents all plugings css file
	wp_enqueue_style( 'core' , get_template_directory_uri().'/css/core.css', '' , '1.0.0' , 'all' );
	// Theme shortcodes/elements style
	wp_enqueue_style( 'shortcode' , get_template_directory_uri().'/css/shortcode/shortcodes.css', '' , '1.0.0' , 'all' );
	// Nivo Slider
	wp_enqueue_style( 'nivo-slider' , get_template_directory_uri().'/css/nivo-slider.css', '' , '3.2' , 'all' );
	// Magnific Popup Css
	wp_enqueue_style( 'magnific-popup' , get_template_directory_uri().'/css/magnific-popup.css', '' , '1.0.0' , 'all' );
	// Material design iconic font Css
	wp_enqueue_style( 'material-design-iconic-font' , get_template_directory_uri().'/css/material-design-iconic-font.min.css', '' , '1.0.0' , 'all' );
	// Venubox Css
	wp_enqueue_style( 'venobox' , get_template_directory_uri().'/css/venobox.css', '' , '1.0.0' , 'all' );
	// Owl carsoul Css
	wp_enqueue_style( 'owl-carousel' , get_template_directory_uri().'/css/plugins/owl.carousel.css', '' , '1.0.0' , 'all' );
	// Mean Menu Css
	wp_enqueue_style( 'meanmenu' , get_template_directory_uri().'/css/plugins/meanmenu.min.css', '' , '1.0.0' , 'all' );
	// Mean Menu Css



	// Load our main stylesheet.
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	// Responsive css
	wp_enqueue_style( 'responsive' , get_template_directory_uri().'/css/responsive.css', '' , '1.0.0' , 'all' );
	// Custom css
	wp_enqueue_style( 'custom' , get_template_directory_uri().'/css/custom.css', '' , '1.0.0' , 'all' );


	

	/**
	 * ===================================================================================
	 * 			Javascripts assets
	 * ===================================================================================
	 */
	
    wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery') , '3.3.5' , true );
    wp_enqueue_script( 'plugins-js' , get_template_directory_uri(). '/js/plugins.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'nivo-slider-js' , get_template_directory_uri(). '/js/jquery.nivo.slider.pack.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'magnific-popup-js' , get_template_directory_uri(). '/js/jquery.magnific-popup.min.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'isotope-js' , get_template_directory_uri(). '/js/isotope.pkgd.min.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'venobox-js' , get_template_directory_uri(). '/js/venobox.min.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'ajax-mail-js' , get_template_directory_uri(). '/js/ajax-mail.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'ajaxchimp-js' , get_template_directory_uri(). '/js/jquery.ajaxchimp.min.js', array('jquery') , '1.0.0' , true );


    wp_enqueue_script( 'owl-carousel-js' , get_template_directory_uri(). '/js/owl.carousel.min.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'meanmenu-js' , get_template_directory_uri(). '/js/jquery.meanmenu.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'imagesloaded-js' , get_template_directory_uri(). '/js/imagesloaded.pkgd.min.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'counterup-js' , get_template_directory_uri(). '/js/jquery.counterup.min.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'waypoints-js' , get_template_directory_uri(). '/js/jquery.waypoints.min.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'theme-main-js' , get_template_directory_uri(). '/js/main.js', array('jquery') , '1.0.0' , true );


    //wp_enqueue_script( 'google-map-js' , '//maps.googleapis.com/maps/api/js', array('jquery') , '1.0.0' , true );
    

    // modernizr
    wp_enqueue_script( 'modanizer' ,  get_template_directory_uri().'/js/vendor/modernizr-2.8.3.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'drubo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
