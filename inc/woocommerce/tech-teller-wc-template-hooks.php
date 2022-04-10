<?php
/**
 * WooCommerce Template hooks.
 *
 * @package Tech_Teller
 *
 * @since 1.0.4
 */

if ( tech_teller_is_woocommerce_activated() ) :
	/**
	* unhooking woocommerce wrappers
	*
	* @since 1.0.4	
	*/
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	/**
	* hooking in theme functions to display woocommerce wrappers
	*
	* @since 1.0.4	
	*/
	add_action('woocommerce_before_main_content', 'tech_teller_woocommerce_content_wrapper_start', 10);
	add_action('woocommerce_before_main_content', 'tech_teller_woocommerce_before_main_content', 10);

	add_action('woocommerce_after_main_content', 'tech_teller_woocommerce_after_main_content', 10);
	add_action('woocommerce_after_main_content', 'tech_teller_woocommerce_content_wrapper_end', 10);

	// body class for woocommerce pages
	add_filter('body_class', 'tech_teller_woocommerce_body_class');
	

	add_action( 'wp_enqueue_scripts', 'tech_teller_woocommerce_style' );

endif;

/**
* action hook theme support for WooCommerce compatibility
*
* @since 1.0.4
*/
add_action('after_setup_theme', 'tech_teller_adding_woocommerce_support');

/**
*
* Hook for woocommerce renaming product description tab title
*
* @since 1.0.4
*/
add_action('woocommerce_product_tabs', 'tech_teller_woocommerce_product_tabs_description', 98);


