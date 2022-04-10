<?php
/**
* Tech Teller theme customizer function
* 
* @package Tech_Teller
*/

// Get defaults for theme customizer
$default = tech_teller_get_default_mods();


if ( ! function_exists( 'tech_teller_customize_register' ) ) :

	function tech_teller_customize_register($wp_customize) {


		// Load category dropdown control
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/class-tech-teller-category-dropdown-control.php' );

		// Load radio image control
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/class-tech-teller-radio-image-control.php' );

		// Load sanitize call backs
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/callbacks/sanitize-callback.php' );
		
		// Load active call back functions
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/callbacks/active-callback.php' );

		// Load general theme options
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/general-theme-settings.php' );

		// Load front page customizer panel register
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/frontpage-custom-sections.php' );

		// Load pages customizer panel register
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/posts-customizer.php' );

		// Load customize ad posts
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/ad-post-customizer.php' );

		// Load customize single post appearances
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/single-post-customizer.php' );

		// Load footer customizer
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/footer-customizer.php' );

		// Load social media customizer
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/social-media-nav.php' );
	}
	add_action('customize_register', 'tech_teller_customize_register');
endif;


// Load customize internal style -- background colors, typo colors
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/tech-teller-customize-style.php' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tech_teller_customizer_script(){
	wp_enqueue_script('tech-teller-customizer-script', get_template_directory_uri() . '/assets/js/tech-teller-theme-customizer.js', array('newjquery', 'customize-preview'), '1.0.0', true);
}
add_action('customize_preview_init', 'tech_teller_customizer_script');

/**
* Enqueue scripts and styles for customize control
*/

function tech_teller_customize_controls_scripts() {            

    wp_enqueue_style( 'tech-teller-customize-controls-style', get_template_directory_uri() . '/assets/css/customizer-controls-style.css' );
}
add_action('customize_controls_enqueue_scripts', 'tech_teller_customize_controls_scripts');
