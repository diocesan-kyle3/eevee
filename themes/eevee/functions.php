<?php
/**
 * Eevee Template functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eevee
 */

if( ! function_exists( 'eevee_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eevee_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Eevee, use a find and replace
		 * to change 'eevee' to the name of your theme in all the template files.
		 *
		 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
		 */
		load_theme_textdomain( 'eevee', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 *
		 * @link https://codex.wordpress.org/Automatic_Feed_Links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 *
		 * @link https://codex.wordpress.org/Title_Tag
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * This theme uses wp_nav_menu() in one location.
		 *
		 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
		 */
		register_nav_menus(array(
			'menu-1' => esc_html__( 'Primary', 'eevee' ),
		));

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script'
		) );

		/**
		 * Set up the WordPress core custom background feature.
		 *
		 * @link https://codex.wordpress.org/Custom_Backgrounds
		 */
		add_theme_support( 'custom-background', apply_filters( 'eevee_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/**
		 * Add theme support for selective refresh for widgets.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
		 */
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
add_action( 'after_setup_theme', 'eevee_setup' );

if( ! function_exists( 'eevee_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global integer $content_width
	 */
	function eevee_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'eevee_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'eevee_content_width', 0 );
endif;

if( ! function_exists( 'eevee_styles' ) ) :
	/**
	 * Enqueue styles.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	 */
	function eevee_styles() {
		wp_enqueue_style( 'eevee-style',
			get_template_directory_uri() . '/style.min.css',
			array(),
			'1.0.0',
			'screen'
		);

		wp_enqueue_style( 'slick-css',
			get_template_directory_uri() . '/assets/slick/slick.css',
			array(),
			'1.0.0',
			'screen'
		);

		wp_enqueue_style( 'slick-theme-css',
			get_template_directory_uri() . '/assets/slick/slick-theme.css',
			array(),
			'1.0.0',
			'screen'
		);

		wp_enqueue_style( 'font-awesome',
			'https://use.fontawesome.com/releases/v5.7.2/css/all.css',
			array(),
			'5.7.2',
			'screen'
		);

		wp_enqueue_style( 'jquery-ui-css',
			'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
			array(),
			'1.12.1',
			'screen'
		);
	}
	add_action( 'wp_enqueue_scripts', 'eevee_styles' );
endif;

if( ! function_exists( 'accordion_admin_styles' ) ) :
	/**
	 * Enqueue styles.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	 */
	function accordion_admin_styles() {
		wp_enqueue_style('accordion-admin-styles', get_template_directory_uri() . '/assets/css/admin-accordion.css');
	}
	add_action('admin_enqueue_scripts', 'accordion_admin_styles');
endif;

if( ! function_exists( 'eevee_scripts' ) ) :
	/**
	 * Enqueue scripts.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 */
	function eevee_scripts() {
		wp_enqueue_script( 'jquery-ui',
			'https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js',
			array( 'jquery' ),
			'1.9.2'
		);

		wp_enqueue_script( 'eevee-navigation',
			get_template_directory_uri() . '/assets/js/navigation.js',
			array(),
			'20200420',
			true
		);

		wp_enqueue_script( 'eevee-general',
			get_template_directory_uri() . '/assets/js/general.js',
			array('jquery'),
			'20200420',
			true
		);

		wp_enqueue_script( 'eevee-smoothscroll',
			get_template_directory_uri() . '/assets/js/smoothscroll.js',
			array( 'jquery' ),
			true
		);

		wp_enqueue_script( 'eevee-skip-link-focus-fix',
			get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js',
			array(),
			'20200420',
			true
		);

		wp_enqueue_script( 'slick-js',
			get_template_directory_uri() . '/assets/slick/slick.min.js',
			array( 'jquery' )
		);

		wp_enqueue_script( 'slick-init-js',
			get_template_directory_uri() . '/assets/js/slick-init.js',
			array( 'jquery' ),
			wp_get_theme()->get('Version'),
			true
		);

		wp_enqueue_script( 'accordion-js',
			get_template_directory_uri() . '/assets/js/accordion.js',
			array( 'jquery' ),
			'20200420',
			true
		);

    wp_enqueue_script( 'tabs-js',
			get_template_directory_uri() . '/assets/js/tabs.js',
			array( 'jquery' ),
			'20200420',
			true
		);
	}
	add_action( 'wp_enqueue_scripts', 'eevee_scripts' );
endif;

/**
 * Include inc functions.
 */
$incs = array(
	'customizer', // Customizer additions
	'email', // Hide/Protect Email from spam bots
	'excerpt', // Functions to handle excerpts
	'login', // Bring in styling for login
	'social-media', // Add ['dpi_social_media'] shortcode
	'theme-functions' // Functions to be called that enhance the theme by hooking into WordPress
);

foreach($incs as $inc) {
	require_once get_template_directory() . "/inc/$inc.php";
}

/**
 * Load Jetpack compatibility file.
 */
if( defined( 'JETPACK__VERSION' ) ) {
	require_once get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add Post Type Support
 *
 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
 */

if(function_exists( 'get_field' ) && get_field('has_custom_excerpts', 'options')) {
	add_post_type_support( 'page', 'excerpt' );
}

add_post_type_support( 'post', 'page-attributes' );

/**
 * Add Featured Image size.
 *
 * @link https://developer.wordpress.org/reference/functions/add_image_size/
 */
if( function_exists( 'add_image_size' ) ) {
  add_image_size( 'featured', 1500, 9999 ); // 1500 pixels wide (and unlimited height)
}

if( function_exists('acf_add_options_page') ) {
  /**
  * Add ACF Options page
	*
	* @link https://www.advancedcustomfields.com/resources/acf_add_options_page/
  */
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	 	acf_add_options_sub_page(array(
	 		'page_title' 	=> 'Theme Header Settings',
	 		'menu_title'	=> 'Header Settings',
	 		'parent_slug'	=> 'theme-general-settings',
	 	));

	 	acf_add_options_sub_page(array(
	 		'page_title' 	=> 'Theme Footer Settings',
	 		'menu_title'	=> 'Footer Settings',
	 		'parent_slug'	=> 'theme-general-settings',
	 	));

	acf_add_options_page(array(
		'page_title' 	=> 'Template Settings',
		'menu_title'	=> 'Template Settings',
		'menu_slug' 	=> 'template-settings',
		'capability'	=> 'edit_posts',
		'icon_url'		=> 'dashicons-admin-tools',
		'redirect'		=> false
	));
}

if( ! function_exists( 'add_editor_styles' )) {
  /**
  * Add editor.css (admin editor styling).
	*
	* @link https://developer.wordpress.org/reference/functions/add_editor_style/
  *
  * @return void
  */
  function add_editor_styles() {
    add_theme_support( 'editor-styles');
    add_editor_style( 'assets/css/editor.css' );
  }
  add_action( 'admin_init', 'add_editor_styles' );
}

if( ! function_exists( 'hide_acf_cog' ) ) {
  /**
  * Disable ACF cog shortcut.
  *
	* @link https://support.advancedcustomfields.com/forums/topic/remove-edit-field-group-cog/
	*
  * @return void
  */
	function hide_acf_cog() {
		echo '<style type="text/css">
			h2.hndle.ui-sortable-handle ~ .handle-actions a.acf-hndle-cog { display: none; visibility: hidden; }
		</style>';
	}
	add_action('admin_head', 'hide_acf_cog');
}

if(function_exists( 'get_field' ) && get_field('has_mega_menu', 'options')) {
	require_once "inc/dpi-menu/acf-menu.php";
	require_once "inc/dpi-menu/functions.php";
}
