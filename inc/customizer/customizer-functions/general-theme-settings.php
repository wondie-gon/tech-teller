<?php
/**
 * General theme customization 
 *
 * 
 * @package Tech_Teller
 */

// Get defaults for theme customizer
$default = tech_teller_get_default_mods();

/*
* Panel Theme General Setting
*/
$wp_customize->add_panel(
	'tech_teller_general_options_panel',
		array(
			'title'	=>	esc_html__('General Theme Options', 'tech-teller'),
			'priority'	=>	65,
		)
	);

$wp_customize->get_setting('custom_logo')->transport      = 'postMessage';
$wp_customize->get_setting('blogname')->transport         = 'postMessage';
$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
$wp_customize->get_setting('background_color')->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'tech_teller_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'tech_teller_customize_partial_blogdescription',
	) );

}

$wp_customize->get_section( 'title_tagline' )->panel = 'tech_teller_general_options_panel';
$wp_customize->get_section( 'title_tagline' )->priority = 4;

$wp_customize->get_section( 'header_image' )->panel = 'tech_teller_general_options_panel';
$wp_customize->get_section('header_image')->title = esc_html__('Custom Header Image', 'tech-teller');
$wp_customize->get_section( 'header_image' )->priority = 8;

$wp_customize->get_section('background_image')->panel = 'tech_teller_general_options_panel';
$wp_customize->get_section('background_image')->title = esc_html__('Body Background Image Settings', 'tech-teller');
$wp_customize->get_section('background_image')->priority = 10;

$wp_customize->get_section('colors')->panel = 'tech_teller_general_options_panel';
$wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'tech-teller');
$wp_customize->get_section('colors')->priority = 12;


//---------------------Light Background color customization-----------------------------
/*
*	section for light background
*/
$wp_customize->add_section('tech_teller_light_standard_colors', array(
	'title'			=>	esc_html__('Colors for Light Backgrounds', 'tech-teller'),
	'description'	=>	esc_html__('Changes you make here will be reflected on light background colored sections such as main text content areas, sidebars, and related sections. Choose colors for background, text, button links and their background that suit your website.', 'tech-teller'),
	'panel'			=>	'tech_teller_general_options_panel',
	'priority'		=>	14,	
));

/*
* setting for light background
*/
// Light background color
$wp_customize->add_setting('tech_teller_light_bg_color', array(
	'default'			=>	$default['tech_teller_light_bg_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// Heading background color in light background sections
$wp_customize->add_setting('tech_teller_heading_bg_on_light_bg', array(
	'default'			=>	$default['tech_teller_heading_bg_on_light_bg'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// Heading color in light background sections
$wp_customize->add_setting('tech_teller_heading_color_on_light_bg', array(
	'default'			=>	$default['tech_teller_heading_color_on_light_bg'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// paragraph and text color on Light background
$wp_customize->add_setting('tech_teller_light_text_color', array(
	'default'			=>	$default['tech_teller_light_text_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// Button background color on Light background
$wp_customize->add_setting('tech_teller_light_btn_bgcolor', array(
	'default'			=>	$default['tech_teller_light_btn_bgcolor'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// Button color on Light background
$wp_customize->add_setting('tech_teller_light_btn_color', array(
	'default'			=>	$default['tech_teller_light_btn_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

/*
*	control for light background
*/
// control for light background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_light_bg_color', array(
	'label'		=> esc_html__('Background Color', 'tech-teller'),
	'section'	=> 'tech_teller_light_standard_colors',
	'settings'	=> 'tech_teller_light_bg_color',

)));

// control for heading background color in light background sections
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_heading_bg_on_light_bg', array(
	'label'		=> esc_html__('Heading Background Color', 'tech-teller'),
	'section'	=> 'tech_teller_light_standard_colors',
	'settings'	=> 'tech_teller_heading_bg_on_light_bg',

)));

// control for heading color on light background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_heading_color_on_light_bg', array(
	'label'		=> esc_html__('Heading Color', 'tech-teller'),
	'section'	=> 'tech_teller_light_standard_colors',
	'settings'	=> 'tech_teller_heading_color_on_light_bg',
)));

// control for text on light background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_light_text_color', array(
	'label'		=> esc_html__('Text Color', 'tech-teller'),
	'section'	=> 'tech_teller_light_standard_colors',
	'settings'	=> 'tech_teller_light_text_color',
)));

// control for button bgColor on light background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_light_btn_bgcolor', array(
	'label'		=> esc_html__('Button Background Color', 'tech-teller'),
	'section'	=> 'tech_teller_light_standard_colors',
	'settings'	=> 'tech_teller_light_btn_bgcolor',
)));

// control for button link color on light background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_light_btn_color', array(
	'label'		=> esc_html__('Button Text Colors', 'tech-teller'),
	'section'	=> 'tech_teller_light_standard_colors',
	'settings'	=> 'tech_teller_light_btn_color',
)));


//---------------------Dark Backgrounds color customization-----------------------------
/*
*	section for dark background
*/
$wp_customize->add_section('tech_teller_dark_standard_colors', array(
	'title'		=> esc_html__('Colors for Dark Backgrounds', 'tech-teller'),
	'description'	=>	esc_html__('Changes you make here will be reflected on darker background colored sections such as front page slider, our team section, and related sections. Choose colors for background, text, button links and their background that suit your website.', 'tech-teller'),
	'panel'		=>	'tech_teller_general_options_panel',
	'priority'	=> 16,	
));

/*
*	setting for dark background
*/
// dark background color
$wp_customize->add_setting('tech_teller_dark_bg_color', array(
	'default'			=>	$default['tech_teller_dark_bg_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// paragraph and text color on dark background
$wp_customize->add_setting('tech_teller_dark_text_color', array(
	'default'			=>	$default['tech_teller_dark_text_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// Button background color on dark background
$wp_customize->add_setting('tech_teller_dark_btn_bgcolor', array(
	'default'			=>	$default['tech_teller_dark_btn_bgcolor'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// Button color on dark background
$wp_customize->add_setting('tech_teller_dark_btn_color', array(
	'default'			=>	$default['tech_teller_dark_btn_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

/*
*	control for dark background
*/
// control for dark background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_dark_bg_color', array(
	'label'		=> esc_html__('Background Color', 'tech-teller'),
	'section'	=> 'tech_teller_dark_standard_colors',
	'settings'	=> 'tech_teller_dark_bg_color',

)));

// control for text on dark background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_dark_text_color', array(
	'label'		=> esc_html__('Text Color', 'tech-teller'),
	'section'	=> 'tech_teller_dark_standard_colors',
	'settings'	=> 'tech_teller_dark_text_color',
)));

// control for button bgColor on dark background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_dark_btn_bgcolor', array(
	'label'		=> esc_html__('Button Background Color', 'tech-teller'),
	'section'	=> 'tech_teller_dark_standard_colors',
	'settings'	=> 'tech_teller_dark_btn_bgcolor',
)));

// control for button link color on dark background
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_dark_btn_color', array(
	'label'		=> esc_html__('Button Text Colors', 'tech-teller'),
	'section'	=> 'tech_teller_dark_standard_colors',
	'settings'	=> 'tech_teller_dark_btn_color',
)));

//---------------------Footer color customization-----------------------------

/*
*	section for footer color customization
*/
$wp_customize->add_section('tech_teller_footer_coloring_section', array(
	'title'		=> esc_html__('Footer Color Settings', 'tech-teller'),
	'description'	=>	esc_html__('Changes you make here will customize the appearance of footer area. Choose colors for background, text, links and icons that suit your website.', 'tech-teller'),
	'panel'		=>	'tech_teller_general_options_panel',
	'priority'	=> 18,	
));
/*
*	Settings for footer area color customization
*/
// background color footer main or top part
$wp_customize->add_setting('tech_teller_footer_main_bg_color', array(
	'default'			=>	$default['tech_teller_footer_main_bg_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// background color of the bottom footer extra section
$wp_customize->add_setting('tech_teller_footer_extra_bg_color', array(
	'default'			=>	$default['tech_teller_footer_extra_bg_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// text color on all footer area
$wp_customize->add_setting('tech_teller_footer_all_text_color', array(
	'default'			=>	$default['tech_teller_footer_all_text_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// link color on all footer area
$wp_customize->add_setting('tech_teller_footer_all_link_color', array(
	'default'			=>	$default['tech_teller_footer_all_link_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// link color after hover event on all footer area
$wp_customize->add_setting('tech_teller_footer_all_link_hover_color', array(
	'default'			=>	$default['tech_teller_footer_all_link_hover_color'],
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// fontawesome icons color on all footer area
$wp_customize->add_setting('tech_teller_footer_all_link_icons_color', array(
	'default'			=>	$default['tech_teller_footer_all_link_icons_color'],
	'transport'			=> 'postMessage',
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

// fontawesome icons hover event color on all footer area
$wp_customize->add_setting('tech_teller_footer_all_link_icons_hover_color', array(
	'default'			=>	$default['tech_teller_footer_all_link_icons_hover_color'],
	'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
));

/*
*	control for footer area color customization
*/
// control for background color footer main or top part
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_footer_main_bg_color', array(
	'label'		=> esc_html__('Top Main Footer Background', 'tech-teller'),
	'section'	=> 'tech_teller_footer_coloring_section',
	'settings'	=> 'tech_teller_footer_main_bg_color',

)));

// control for background color bottom extra footer 
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_footer_extra_bg_color', array(
	'label'		=> esc_html__('Bottom Extra Footer Background', 'tech-teller'),
	'section'	=> 'tech_teller_footer_coloring_section',
	'settings'	=> 'tech_teller_footer_extra_bg_color',

)));

// control for text color in footer
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_footer_all_text_color', array(
	'label'		=> esc_html__('Footer Text Color', 'tech-teller'),
	'section'	=> 'tech_teller_footer_coloring_section',
	'settings'	=> 'tech_teller_footer_all_text_color',
)));

// control for link color in footer
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_footer_all_link_color', array(
	'label'		=> esc_html__('Footer Link Color', 'tech-teller'),
	'section'	=> 'tech_teller_footer_coloring_section',
	'settings'	=> 'tech_teller_footer_all_link_color',
)));

// control for link hover color in footer
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_footer_all_link_hover_color', array(
	'label'		=> esc_html__('Color After Hover', 'tech-teller'),
	'section'	=> 'tech_teller_footer_coloring_section',
	'settings'	=> 'tech_teller_footer_all_link_hover_color',
)));

// control for icon link color in footer
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_footer_all_link_icons_color', array(
	'label'		=> esc_html__('Footer Icon Links Color', 'tech-teller'),
	'section'	=> 'tech_teller_footer_coloring_section',
	'settings'	=> 'tech_teller_footer_all_link_icons_color',
)));

// control for icon link hover color in footer
$wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'tech_teller_footer_all_link_icons_hover_color', array(
	'label'		=> esc_html__('Color After Hover', 'tech-teller'),
	'section'	=> 'tech_teller_footer_coloring_section',
	'settings'	=> 'tech_teller_footer_all_link_icons_hover_color',
)));

// -----------------------------------------------------------------------
/*
* Website Column Layout
*/
$wp_customize->add_section(
	'tech_teller_site_column_layout_section',
	array(
		'title'		=>	esc_html__('Default Layout and Features', 'tech-teller'),
		'panel'		=>	'tech_teller_general_options_panel',
		'priority'	=>	6,
		)
	);

// site column layout
$wp_customize->add_setting(
	'tech_teller_default_site_column_layout',
		array(
			'default'			=>	$default['tech_teller_default_site_column_layout'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);
	
$wp_customize->add_control(
	new Tech_Teller_Radio_Image_Control(
	$wp_customize,
	'tech_teller_default_site_column_layout',
		array(
			'label'				=>	esc_html__('Site column layout', 'tech-teller'),
			'description'		=>	esc_html__('Select the default site column layout from the following options. The selected layout will be used as a default layout for various pages such as blogs, categories, search, archive etc..','tech-teller'),
			'section'			=>	'tech_teller_site_column_layout_section',
			'settings'			=>	'tech_teller_default_site_column_layout',
			'choices'		=>	array( 
				'right-sidebar-layout' =>	esc_url(get_template_directory_uri() . '/assets/images/right-sidebar-layout.png'),
				'left-sidebar-layout' =>	esc_url(get_template_directory_uri() . '/assets/images/left-sidebar-layout.png'),
				)
		)
  	)
);

// Enable breadcrumbs
$wp_customize->add_setting(
	'tech_teller_enable_breadcrumbs',
		array(
			'default'			=>	$default['tech_teller_enable_breadcrumbs'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox',
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_breadcrumbs', 
		array(
			'label'				=>	esc_html__('Enable Breadcrumbs', 'tech-teller'),
			'section'			=>	'tech_teller_site_column_layout_section',
			'settings'			=>	'tech_teller_enable_breadcrumbs',
			'type'				=>	'checkbox',
		)
	)
);

/*
* Website Responsiveness
*/
$wp_customize->add_section(
	'tech_teller_site_responsiveness_options_section',
	array(
		'title'		=>	esc_html__('Site Responsiveness', 'tech-teller'),
		'panel'		=>	'tech_teller_general_options_panel',
		'priority'	=>	22,
		)
	);

// Enable fixed top menu
$wp_customize->add_setting(
	'tech_teller_enable_fixed_nav',
		array(
			'default'			=>	$default['tech_teller_enable_fixed_nav'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox',
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_fixed_nav', 
		array(
			'label'				=>	esc_html__('Enable Fixed Menu', 'tech-teller'),
			'section'			=>	'tech_teller_site_responsiveness_options_section',
			'settings'			=>	'tech_teller_enable_fixed_nav',
			'type'				=>	'checkbox',
		)
	)
);


$wp_customize->add_setting(
	'tech_teller_small_menu_button_type',
		array(
			'default'			=>	$default['tech_teller_small_menu_button_type'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);
	
$wp_customize->add_control(
	new Tech_Teller_Radio_Image_Control(
	$wp_customize,
	'tech_teller_small_menu_button_type',
		array(
			'label'				=>	esc_html__('Menu Button Type', 'tech-teller'),
			'description'		=>	esc_html__('Select the type of menu button you want to use to toggle the navigation menu on small devices.', 'tech-teller'),
			'section'			=>	'tech_teller_site_responsiveness_options_section',
			'settings'			=>	'tech_teller_small_menu_button_type',
			'choices'		=>	array( 
				'grid' =>	esc_url(get_template_directory_uri() . '/assets/images/menu-grid.png'),
				'bar'	=>	esc_url(get_template_directory_uri() . '/assets/images/menu-bar.png'),
				)
		)
  	)
);
// Menu Button position on small devices
$wp_customize->add_setting(
	'tech_teller_small_device_menu_button_position',
		array(
			'default'			=>	$default['tech_teller_small_device_menu_button_position'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_small_device_menu_button_position', 
		array(
			'label'			=>	esc_html__('Menu Button Position', 'tech-teller'),
			'description'	=>	esc_html__('Where do you want the menu button to appear on small devices?', 'tech-teller'),
			'section'		=>	'tech_teller_site_responsiveness_options_section',
			'settings'		=>	'tech_teller_small_device_menu_button_position',
			'type'			=>	'select',
			'choices'		=>	array(
				'right-menu-button'	=>	esc_html__('Top Right', 'tech-teller'),
				'left-menu-button'	=>	esc_html__('Top Left', 'tech-teller'),
				)
		)
	)
);
