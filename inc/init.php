<?php
/**
 * Load files.
 *
 * @package Tech_Teller
 */

/*
* Loading defaults function
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/default.php' );

/*
* custom login logo function
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/admin/custom-login-logo.php' );

/*
* Implement the Custom Header feature.
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/custom-header.php' );

/*
* Loading template tags
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/template-tags.php' );

/*
* Loading template function
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/template-functions.php' );

/*
* Loading customizer function
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php' );

/*
* Admin function
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/admin/functions-admin.php' );

/*
* Load Widgets and and Widget areas
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/widgets/widgets.php' );

//Load function hooks for social media
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/social-media.php' );

//Load function hooks for header and sidebar advertisement 
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/header-and-sidebar-advertisement.php' );

//Load function hooks for frontpage slider layout
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/top-slider-layout.php' );

/**
* Load page template functions
*
* @since 1.0.4
*/
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/tech-teller-page-template-functions.php' );

/**
* WooCommerce functions
*
* @since 1.0.4
*/
if ( tech_teller_is_woocommerce_activated() ) {
	/**
	* Load woocommerce template functions
	*
	* @since 1.0.4
	*/
	require_once( trailingslashit( get_template_directory() ) . 'inc/woocommerce/tech-teller-wc-template-functions.php' );

	/**
	* Load woocommerce template hooks
	*
	* @since 1.0.4
	*/
	require_once( trailingslashit( get_template_directory() ) . 'inc/woocommerce/tech-teller-wc-template-hooks.php' );
}


