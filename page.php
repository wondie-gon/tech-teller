<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * 
 * @package Tech_Teller
 */
// get header
get_header();

if ( ! tech_teller_is_woocommerce_activated() || ! is_cart() || ! is_checkout() ) {
	/**
	* Hook - tech_teller_get_page.
	*
	* @hooked tech_teller_content_wrapper_start - 10
	* @hooked tech_teller_page_main_content - 20
	* @hooked tech_teller_content_wrapper_end - 30
	*/
	do_action( 'tech_teller_get_page' );
}

get_footer();

