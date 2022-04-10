<?php
/**
 * customize style for Tech Teller theme
 *
 * 
 * @package Tech_Teller
 */

/*
* Customized internal CSS Output
*/
if ( ! function_exists( 'tech_teller_theme_customization_style_output' ) ) :
	function tech_teller_theme_customization_style_output() {

		// Get default customization
		$default = tech_teller_get_default_mods();

		$tech_teller_light_bg_color = esc_attr( get_theme_mod( 'tech_teller_light_bg_color', $default['tech_teller_light_bg_color'] ) );
		$tech_teller_heading_bg_on_light_bg = esc_attr( get_theme_mod( 'tech_teller_heading_bg_on_light_bg', $default['tech_teller_heading_bg_on_light_bg'] ) );
		$tech_teller_heading_color_on_light_bg = esc_attr( get_theme_mod( 'tech_teller_heading_color_on_light_bg', $default['tech_teller_heading_color_on_light_bg'] ) );
		$tech_teller_light_text_color = esc_attr( get_theme_mod( 'tech_teller_light_text_color', $default['tech_teller_light_text_color'] ) );
		$tech_teller_light_btn_bgcolor = esc_attr( get_theme_mod( 'tech_teller_light_btn_bgcolor', $default['tech_teller_light_btn_bgcolor'] ) );
		$tech_teller_light_btn_color = esc_attr( get_theme_mod( 'tech_teller_light_btn_color', $default['tech_teller_light_btn_color'] ) );

		$tech_teller_dark_bg_color = esc_attr( get_theme_mod( 'tech_teller_dark_bg_color', $default['tech_teller_dark_bg_color'] ) );
		$tech_teller_dark_text_color = esc_attr( get_theme_mod( 'tech_teller_dark_text_color', $default['tech_teller_dark_text_color'] ) );
		$tech_teller_dark_btn_bgcolor = esc_attr( get_theme_mod( 'tech_teller_dark_btn_bgcolor', $default['tech_teller_dark_btn_bgcolor'] ) );
		$tech_teller_dark_btn_color = esc_attr( get_theme_mod( 'tech_teller_dark_btn_color', $default['tech_teller_dark_btn_color'] ) );

		// infinite slider style customization
		$infinite_slider_title_bg_color = esc_attr( get_theme_mod( 'tech_teller_front_infinite_slider_title_bg', $default['tech_teller_front_infinite_slider_title_bg'] ) );

		// footer customization output
		$tech_teller_footer_main_bg_color = esc_attr( get_theme_mod( 'tech_teller_footer_main_bg_color', $default['tech_teller_footer_main_bg_color'] ) );
		$tech_teller_footer_extra_bg_color = esc_attr( get_theme_mod( 'tech_teller_footer_extra_bg_color', $default['tech_teller_footer_extra_bg_color'] ) );
		$tech_teller_footer_all_text_color = esc_attr( get_theme_mod( 'tech_teller_footer_all_text_color', $default['tech_teller_footer_all_text_color'] ) );
		$tech_teller_footer_all_link_color = esc_attr( get_theme_mod( 'tech_teller_footer_all_link_color', $default['tech_teller_footer_all_link_color'] ) );
		$tech_teller_footer_all_link_hover_color = esc_attr( get_theme_mod( 'tech_teller_footer_all_link_hover_color', $default['tech_teller_footer_all_link_hover_color'] ) );
		$tech_teller_footer_all_link_icons_color = esc_attr( get_theme_mod( 'tech_teller_footer_all_link_icons_color', $default['tech_teller_footer_all_link_icons_color'] ) );
		$tech_teller_footer_all_link_icons_hover_color = esc_attr( get_theme_mod( 'tech_teller_footer_all_link_icons_hover_color', $default['tech_teller_footer_all_link_icons_hover_color'] ) );
		?>
		<style id="custom-style-output" type="text/css">

			<?php if ( ! $tech_teller_light_bg_color ) : ?>
				.bg_tech_teller_light {
					background-color: <?php echo $tech_teller_light_bg_color; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_light_text_color ) : ?>
				.bg_tech_teller_light {
					color: <?php echo $tech_teller_light_text_color; ?>;
				}			
			<?php endif; ?>

			<?php if ( ! $tech_teller_heading_bg_on_light_bg ) : ?>
				.tech-teller-heading-bg,
				.tech-teller-single-heading {
					background-color: <?php echo $tech_teller_heading_bg_on_light_bg; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_heading_color_on_light_bg ) : ?>
				.tech-teller-heading-bg,
				.tech-teller-heading-bg .entry-title, 
				.tech-teller-heading-bg .page-title,
				.tech-teller-single-heading .entry-title {
					color: <?php echo $tech_teller_heading_color_on_light_bg; ?>;
				}			
			<?php endif; ?>

			<?php if ( ! $tech_teller_dark_bg_color ) : ?>
				.bg_tech_teller_dark {
					background-color: <?php echo $tech_teller_dark_bg_color; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_dark_text_color ) : ?>
				.bg_tech_teller_dark {
					color: <?php echo $tech_teller_dark_text_color; ?>;
				}			
			<?php endif; ?>


			<?php if ( ! $tech_teller_light_btn_bgcolor ) : ?>
				.bg_tech_teller_light .btn-tech-teller, 
				.bg_tech_teller_light a.btn-tech-teller {
					background-color: <?php echo $tech_teller_light_btn_bgcolor; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_light_btn_color ) : ?>
				.bg_tech_teller_light .btn-tech-teller, 
				.bg_tech_teller_light a.btn-tech-teller {
					color: <?php echo $tech_teller_light_btn_color; ?>;
				}			
			<?php endif; ?>

			<?php if ( ! $tech_teller_dark_btn_bgcolor ) : ?>
				.bg_tech_teller_dark .btn-tech-teller, 
				.bg_tech_teller_dark a.btn-tech-teller, 
				a.btn-tech-teller.featured_blog_link {
					background-color: <?php echo $tech_teller_dark_btn_bgcolor; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_dark_btn_color ) : ?>
				.bg_tech_teller_dark .btn-tech-teller, 
				.bg_tech_teller_dark a.btn-tech-teller, 
				a.btn-tech-teller.featured_blog_link {
					color: <?php echo $tech_teller_dark_btn_color; ?>;
				}			
			<?php endif; ?>

			<?php if ( ! $infinite_slider_title_bg_color ) : ?>
				.tt-continous-slider .slider-overlay-title, 
				.tt-continous-slider .slider-overlay-title:hover {
					background-color: <?php echo $infinite_slider_title_bg_color; ?>;
				}			
			<?php endif; ?>

			<?php if ( ! $tech_teller_footer_main_bg_color ) : ?>
				.tech_teller_footer_container,
				.tech_teller_footer_container .tech-teller-footer-main {
					background-color: <?php echo $tech_teller_footer_main_bg_color; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_footer_extra_bg_color ) : ?>
				.tech_teller_footer_container .tt-footer-extra {
					background-color: <?php echo $tech_teller_footer_extra_bg_color; ?>;
				}
			<?php endif; ?>
			
			<?php if ( ! $tech_teller_footer_all_text_color ) : ?>
				.tech_teller_footer_container,
				.tech_teller_footer_container .tech-teller-footer-main,
				.tech-teller-footer-main .widget_text,
				.tech-teller-footer-main .foot-widget ul li {
					color: <?php echo $tech_teller_footer_all_text_color; ?>;
				}			
			<?php endif; ?>


			<?php if ( ! $tech_teller_footer_all_link_color ) : ?>
				.tech_teller_footer_container a {
					color: <?php echo $tech_teller_footer_all_link_color; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_footer_all_link_hover_color ) : ?>
				.tech_teller_footer_container a:hover, 
				.tech_teller_footer_container a:focus {
					color: <?php echo $tech_teller_footer_all_link_hover_color; ?>;
				}			
			<?php endif; ?>


			<?php if ( ! $tech_teller_footer_all_link_icons_color ) : ?>
				.footer-social-row a .fab, 
				.footer-social-row .fab, 
				.footer-social-row a .fa, 
				.footer-social-row .fa {
					color: <?php echo $tech_teller_footer_all_link_icons_color; ?>;
				}
			<?php endif; ?>

			<?php if ( ! $tech_teller_footer_all_link_icons_hover_color ) : ?>
				.footer-social-row a .fab:hover, 
				.footer-social-row a .fab:focus, 
				.footer-social-row .fab:hover, 
				.footer-social-row a .fa:hover, 
				.footer-social-row a .fa:focus, 
				.footer-social-row .fa:hover {
					color: <?php echo $tech_teller_footer_all_link_icons_hover_color; ?>;
				}			
			<?php endif; ?>
			
		</style>
		<?php
	}
endif;
add_action( 'wp_head', 'tech_teller_theme_customization_style_output' );

/**
* Render the site title for the selective refresh partial.
*
* @return void
*/
function tech_teller_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
* Render the site tagline for the selective refresh partial.
*
* @return void
*/
function tech_teller_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/*
* custom header style
*/
if ( ! function_exists( 'tech_teller_custom_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see tech_teller_custom_header_setup().
	 */
	function tech_teller_custom_header_style() {

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if (get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color) {

			return;

		}

		// Custom styles for custom-header
		?>
		<style id="custom-header" type="text/css">
		<?php

		// Has the text been hidden?
		if (!display_header_text()) :
			?>

			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

		<?php

		// If the user has set a custom color for the text use that.
		else :
			?>

			.site-title a,
			.site-title .tt-brand,
			.site-description {
				color: #<?php echo esc_attr($header_text_color); ?>;
			}

		<?php endif; ?>
		</style>
		<?php
	}
endif;

add_action( 'wp_head', 'tech_teller_custom_header_style' );