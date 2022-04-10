<?php
/*
*
* Template part for displaying first row of footer
*
* 
* @package Tech_Teller
*
*/
// Get default customization
$default = tech_teller_get_default_mods();

// Main footer column layout selected from theme customizer
$tech_teller_footer_column = esc_attr(get_theme_mod('tech_teller_footer_column_layout', $default['tech_teller_footer_column_layout']));

if (is_active_sidebar('footer-widget1') || is_active_sidebar('footer-widget2') || is_active_sidebar('footer-widget3') || is_active_sidebar('footer-widget4')) {
	?>
	<div class="row pb-3 tech-teller-footer-main">
	<?php
		switch ($tech_teller_footer_column) :
			case 'one-column':

				/**
				* Hook - tech_teller_main_footer_one_column_layout
				*
				* @hooked tech_teller_main_footer_one_column_layout_action - 10
				*/

				do_action( 'tech_teller_main_footer_one_column_layout' );

				break;

			case 'two-column':
			
				/**
				* Hook - tech_teller_main_footer_two_column_layout
				*
				* @hooked tech_teller_main_footer_two_column_layout_action - 10
				*/

				do_action( 'tech_teller_main_footer_two_column_layout' );

				break;

			case 'three-column':
			
				/**
				* Hook - tech_teller_main_footer_three_column_layout
				*
				* @hooked tech_teller_main_footer_three_column_layout_action - 10
				*/

				do_action( 'tech_teller_main_footer_three_column_layout' );

				break;
			
			default:
				
				case 'four-column':
			
				/**
				* Hook - tech_teller_main_footer_four_column_layout
				*
				* @hooked tech_teller_main_footer_four_column_layout_action - 10
				*/

				do_action( 'tech_teller_main_footer_four_column_layout' );

				break;

		endswitch;
	?>
	</div>
	<?php
}

