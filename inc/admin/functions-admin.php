<?php
/**
 * Function for managing admin pages
 *
 * @package Tech_Teller
 *
 * _________________________
    
    Theme Admin page
  ___________________________

 */

if (is_admin()) {
	add_action('admin_menu', 'tech_teller_add_admin_page');
}
function tech_teller_add_admin_page() {
	// the theme
	$theme = wp_get_theme();

	// theme page and menu
	add_theme_page(
		sprintf(esc_html__('Welcome to %1$s %2$s', 'tech-teller'), $theme->Name, $theme->Version),
		sprintf(esc_html__('%1$s Options', 'tech-teller'), $theme->Name),
		'edit_theme_options',
		'tech-teller-admin-options',
		'tech_teller_admin_dashboard_page'
		);
}


// Theme admin main page
function tech_teller_admin_dashboard_page() {
	/**
	* Hook - tech_teller_dashboard_page_content.
	*
	* @hooked tech_teller_dashboard_page_content_action - 10
	*/
	do_action('tech_teller_dashboard_page_content');
}


// enqueue style for theme's admin pages
if (!function_exists('tech_teller_enqueue_admin_scripts')) :
	
	function tech_teller_enqueue_admin_scripts() {

		wp_enqueue_style('tech-teller-admin-style', get_template_directory_uri() . '/assets/css/tech-teller-admin-style.css', '', '1.0.0');

	}

endif;
add_action('admin_enqueue_scripts', 'tech_teller_enqueue_admin_scripts');