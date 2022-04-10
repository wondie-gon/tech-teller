<?php
/**
* Tech Teller theme setup function
* 
* @package Tech_Teller
*/
if ( ! function_exists( 'tech_teller_setup' ) ) :
	function tech_teller_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tech Teller, use a find and replace
		 * to change 'tech-teller' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tech-teller', get_template_directory() . '/languages' ); 
		
		// Add default posts and comments RSS feed links to head		
		add_theme_support( 'automatic-feed-links' );

		/** 
		* Set up the WordPress Custom header feature
		*/
		add_theme_support( 'custom-header', apply_filters( 'tech_teller_custom_header_args', array(
				'default-image'          =>	'',
				'default-text-color'     =>	'fcfaf2',
				'width'                  =>	1600,
				'height'                 =>	250,
				'flex-height'            =>	true,
				'wp-head-callback'       =>	'tech_teller_custom_header_style',
			) ) );

		// Set up the WordPress core custom background feature
		$args = array(
				'default-color'		=>	'ffffff',
				'default-image'		=>	'',
				'wp-head-callback'	=>	'_custom_background_cb',
				);
		add_theme_support( 'custom-background', $args );
		
		// Add site title for each page automatically
		add_theme_support( 'title-tag' );
		// Enabling support for post thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );
		/* Image sizes */
		/* Image sizes for frontpage featured slider */
		add_image_size( 'tech-teller-slider-image', 700, 380, true );

		/* Image sizes for tall featured review image  */
		add_image_size( 'tech-teller-tall-image', 450, 600, true );

		/* Image sizes for two column content */
		add_image_size( 'tech-teller-large-image', 600, 450, true );

		/* Image sizes excerpt post lists with images  */
		add_image_size( 'tech-teller-small-image', 448, 336, true );

		/* Image sizes for four column  */
		add_image_size( 'tech-teller-smaller-image', 360, 270, true );

		/* Image sizes for four column contents */
		add_image_size( 'tech-teller-tiny-image', 240, 180, true );

		// Registering theme menus
		register_nav_menus( array(
				'main_top_menu'	=>	__( 'Main Top Menu', 'tech-teller' ),
				'footer_menu'  	=>	__( 'Footer Menu', 'tech-teller' ),
				'sidebar_menu'	=>	__( 'Sidebar Menu', 'tech-teller' )
			) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 */
		add_theme_support( 'custom-logo', array(
			'height'		=>	80,
			'width'			=>	150,
			'flex-width'	=>	true,
			'flex-height'	=>	true,
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
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'video',
			'gallery',
			'audio',
		) );

		/*
		* Function hooks for admin
		*/
		require( trailingslashit( get_template_directory() ) . 'inc/admin/hooks-admin.php' );

		/**
		* Load Init for Hook files.
		*/
		require( trailingslashit( get_template_directory() ) . 'inc/hooks/hooks-init.php' );

	}
endif;
add_action( 'after_setup_theme', 'tech_teller_setup' );

/**
 * 
 *	Adding editor style for style consistency with theme
 * 
 */
if ( ! function_exists( 'tech_teller_theme_add_editor_style' ) ) :

	function tech_teller_theme_add_editor_style() {

		add_editor_style( 'assets/css/editor-style.css' );
	}
	
endif;
add_action( 'after_setup_theme', 'tech_teller_theme_add_editor_style' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tech_teller_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'tech_teller_content_width', 640 );
}
add_action( 'after_setup_theme', 'tech_teller_content_width', 0 );

/* 
 * function to load stylesheets for the theme 
*/
function tech_teller_load_stylesheets () {

	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css', '', '5.10.2' );
	if ( is_front_page() || is_home() ) {
		// slick style
		wp_enqueue_style( 'slickstyle', get_template_directory_uri() . '/assets/css/slick.css', '', '1.8.1' );
	}
		
	// Theme stylesheet.
	wp_enqueue_style( 'tech-teller-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-based-style', get_template_directory_uri() . '/assets/css/bootstrap-based-style.css', '', '4.1.3' );
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/assets/css/tech-teller-custom-style.css', '', '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'tech_teller_load_stylesheets' );

/* 
 * function to enqueue jquery, and other js files 
*/
function tech_teller_enqueue_js(){


	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', array(), '3.7.3', false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	if ( ! is_admin() ) {
		// get latest jquesry
		wp_register_script( 'newjquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', '', '3.3.1', true );
		wp_enqueue_script( 'newjquery' );
	}

	/* 
	* Enqueue Bootstrap Js 
	*/
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '', '4.3.1', true );
	/* 
	* Enqueue techteller_customjs Js 
	*/
	wp_enqueue_script( 'techteller_customjs', get_template_directory_uri() . '/assets/js/tech-teller-custom.js', '', '1.0.0', true );

	if (is_singular() && comments_open() && get_option( 'thread_comments' )) {
		wp_enqueue_script('comment-reply');
	}

}
add_action( 'wp_enqueue_scripts', 'tech_teller_enqueue_js' );


/*
* Function to remove url field from comment form 
*/

function tech_teller_remove_comment_url( $arg ) {
	
	$arg['url'] = '';

	return $arg;
}
add_filter( 'comment_form_default_fields', 'tech_teller_remove_comment_url' );

/*
* Function to move comment text field to bottom 
*/
function tech_teller_comment_field_to_bottom( $fields ) {

	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}  
add_filter( 'comment_form_fields', 'tech_teller_comment_field_to_bottom' );


/*----------------------------------------------------------------------
* Get custom permalink
-------------------------------------------------------------------------*/
if ( ! function_exists( 'tech_teller_get_permalink' ) ) :

    function tech_teller_get_permalink( $post_id = '' ) {
        // Apply filters and return
        return apply_filters( 'tech_teller_get_permalink', esc_url( get_permalink() ) );

    }
endif;

// flushing rewrite rules 
add_action( 'after_switch_theme', 'tech_teller_rewrite_flush' );
function tech_teller_rewrite_flush() {
	flush_rewrite_rules();
}


/*
* Loading init function
*/
require( trailingslashit( get_template_directory() ) . 'inc/init.php' );

/*
*Registering custom Bootstrap navigation menu into theme
*/ 
require_once( trailingslashit( get_stylesheet_directory() ) . 'wp_bootstrap_navwalker.php' );