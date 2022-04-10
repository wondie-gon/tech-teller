<?php
/**
 * Template for customizing theme footer options
 *
 * 
 * @package Tech_Teller
 */
// Get defaults for theme customizer
$default = tech_teller_get_default_mods();


// Adding custom footer panel
$wp_customize->add_panel(
	'tech_teller_footer_panel', 
		array(
			'title'		=>	esc_html__('Footer', 'tech-teller'),
			'priority'	=>	105,
		)
	);

/*
* Section for footer customizer
*/
$wp_customize->add_section(
	'tech_teller_main_footer',
		array(
			'title'		=>	esc_html__('Footer Layout Setting', 'tech-teller'),
			'panel'		=> 'tech_teller_footer_panel',
		)
	);

/*
* Layout for footer
*/

$wp_customize->add_setting(
	'tech_teller_footer_column_layout',
		array(
			'default'			=>	$default['tech_teller_footer_column_layout'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);
	
$wp_customize->add_control(
	new Tech_Teller_Radio_Image_Control(
	$wp_customize,
	'tech_teller_footer_column_layout',
		array(
			'label'				=>	esc_html__('Footer layout', 'tech-teller'),
			'description'		=>	esc_html__('Select layout to set column number for footer widget area.', 'tech-teller'),
			'section'			=>	'tech_teller_main_footer',
			'settings'			=>	'tech_teller_footer_column_layout',
			'choices'		=>	array( 
				'one-column'	=>	esc_url(get_template_directory_uri() . '/assets/images/one-col-footer.png'),
				'two-column'	=>	esc_url(get_template_directory_uri() . '/assets/images/two-col-footer.png'),
				'three-column'	=>	esc_url(get_template_directory_uri() . '/assets/images/three-col-footer.png'),
				'four-column'	=>	esc_url(get_template_directory_uri() . '/assets/images/four-col-footer.png'),
				)
		)
  	)
);

/*
* Section for bottom footer
*/
$wp_customize->add_section(
	'tech_teller_extra_bottom_footer',
		array(
			'title'		=>	esc_html__('Extra Bottom Footer', 'tech-teller'),
			'panel'		=> 'tech_teller_footer_panel',
		)
	);

/*
* Setting for bottom footer to add other than copyright
*/
$wp_customize->add_setting(
	'tech_teller_enable_extra_bottom_footer',
		array(
			'default'			=>	$default['tech_teller_enable_extra_bottom_footer'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox', 
		)
	);


$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_enable_extra_bottom_footer',
			array(
				'label'			=>	esc_html__('Enable Extra Footer', 'tech-teller'),
				'description' 	=>	esc_html__('Check the box to enable extra bottom footer for adding page links for example, &ldquo;Terms and conditions&rdquo; beside the Copyright notice.', 'tech-teller'),
				'section'		=>	'tech_teller_extra_bottom_footer',
				'settings'		=>	'tech_teller_enable_extra_bottom_footer',
				'type' 			=>	'checkbox',
			)
	  	)
);

/*
* Setting to enable page links
*/
$wp_customize->add_setting(
	'tech_teller_enable_bottom_footer_page_links',
		array(
			'default'			=>	$default['tech_teller_enable_bottom_footer_page_links'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox', 
		)
	);


$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_enable_bottom_footer_page_links',
			array(
				'label'				=>	esc_html__('Enable Page Links', 'tech-teller'),
				'description' 		=>	esc_html__('Enable to add page links on bottom footer', 'tech-teller'),
				'section'			=>	'tech_teller_extra_bottom_footer',
				'settings'			=>	'tech_teller_enable_bottom_footer_page_links',
				'active_callback'	=>	'tech_teller_if_extra_bottom_footer_enabled',
				'type' 				=>	'checkbox',
			)
	  	)
);

// page link 1 setting
$wp_customize->add_setting(
	'tech_teller_extra_bottom_footer_page_link_1',
		array(
			'sanitize_callback'	=>	'tech_teller_sanitize_dropdown_pages'
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_extra_bottom_footer_page_link_1',
			array(
				'label'				=>	esc_html__('Page Link 1', 'tech-teller'),
				'description' 		=>	esc_html__('Select 1st page to put its link on extra bottom footer along with Copyright text.', 'tech-teller'),
				'section'			=>	'tech_teller_extra_bottom_footer',
				'settings'			=>	'tech_teller_extra_bottom_footer_page_link_1',
				'active_callback'	=>	'tech_teller_if_bottom_footer_page_links_enabled',
				'type'				=>	'dropdown-pages',
			)
	  	)
);

// page link 2 setting
$wp_customize->add_setting(
	'tech_teller_extra_bottom_footer_page_link_2',
		array(
			'sanitize_callback'	=>	'tech_teller_sanitize_dropdown_pages'
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_extra_bottom_footer_page_link_2',
			array(
				'label'				=>	esc_html__('Page Link 2', 'tech-teller'),
				'description' 		=>	esc_html__('Select 2nd page to put its link on extra bottom footer along with Copyright text.', 'tech-teller'),
				'section'			=>	'tech_teller_extra_bottom_footer',
				'settings'			=>	'tech_teller_extra_bottom_footer_page_link_2',
				'active_callback'	=>	'tech_teller_if_bottom_footer_page_links_enabled',
				'type'				=>	'dropdown-pages',
			)
	  	)
);

/*
* Setting to enable for scroll to top button
*/
$wp_customize->add_setting(
	'tech_teller_enable_scroll_to_top_button',
		array(
			'default'			=>	$default['tech_teller_enable_scroll_to_top_button'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox', 
		)
	);


$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_enable_scroll_to_top_button',
			array(
				'label'				=>	esc_html__('Enable Scroll to Top Button', 'tech-teller'),
				'description' 		=>	esc_html__('Enable the scroll to top button on bottom footer', 'tech-teller'),
				'section'			=>	'tech_teller_extra_bottom_footer',
				'settings'			=>	'tech_teller_enable_scroll_to_top_button',
				'active_callback'	=>	'tech_teller_if_extra_bottom_footer_enabled',
				'type' 				=>	'checkbox',
			)
	  	)
);

/* 
* Footer Copyright text
*/
$wp_customize->add_setting(
	'tech_teller_bottom_footer_copyright_text', 
		array(
			'default'			=>	$default['tech_teller_bottom_footer_copyright_text'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_bottom_footer_copyright_text', 
		array(
			'label'				=>	esc_html__('Copyright Text:', 'tech-teller'),
			'description' 		=>	esc_html__('Change text if you want a different copyright text to display at bottom footer.', 'tech-teller'),
			'section'			=>	'tech_teller_extra_bottom_footer',
			'settings'			=>	'tech_teller_enable_scroll_to_top_button',
			'active_callback'	=>	'tech_teller_if_extra_bottom_footer_enabled',
		)
	)
);

/*
* Setting to enable Site name at bottom footer
*/
$wp_customize->add_setting(
	'tech_teller_enable_bottom_footer_site_name',
		array(
			'default'			=>	$default['tech_teller_enable_bottom_footer_site_name'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox', 
		)
	);


$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_enable_bottom_footer_site_name',
			array(
				'label'				=>	esc_html__('Display Site Name: ', 'tech-teller'),
				'description' 		=>	esc_html__('Slide the checkbox to the right if you want your site name to appear along with copyright notice.', 'tech-teller'),
				'section'			=>	'tech_teller_extra_bottom_footer',
				'settings'			=>	'tech_teller_enable_bottom_footer_site_name',
				'active_callback'	=>	'tech_teller_if_extra_bottom_footer_enabled',
				'type' 				=>	'checkbox',
			)
	  	)
);

/*
* Setting to enable powered by notice at bottom footer
*/
$wp_customize->add_setting(
	'tech_teller_enable_bottom_footer_powered_by',
		array(
			'default'			=>	$default['tech_teller_enable_bottom_footer_powered_by'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox', 
		)
	);


$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_enable_bottom_footer_powered_by',
			array(
				'label'				=>	esc_html__('Display Powered By: ', 'tech-teller'),
				'description' 		=>	esc_html__('Slide the checkbox to the right if you want powered by notice to appear along with copyright notice.', 'tech-teller'),
				'section'			=>	'tech_teller_extra_bottom_footer',
				'settings'			=>	'tech_teller_enable_bottom_footer_powered_by',
				'active_callback'	=>	'tech_teller_if_extra_bottom_footer_enabled',
				'type' 				=>	'checkbox',
			)
	  	)
);