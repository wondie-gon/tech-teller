<?php
/**
 * Template for customizing frontpage video section
 *
 * 
 * @package Tech_Teller
 */
// Get defaults for theme customizer
$default = tech_teller_get_default_mods();

/*
* Section for video at frontpage
*/
$wp_customize->add_section(
	'tech_teller_front_page_video_section',
		array(
			'title'		=>	esc_html__('Latest Video Section', 'tech-teller'),
			'panel'		=> 'tech_teller_frontpage_panel',
		)
	);
/*
* enabling video section on frontpage
*/
$wp_customize->add_setting(
	'tech_teller_enable_front_page_video_section',
		array(
			'default'			=>	$default['tech_teller_enable_front_page_video_section'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox', 
		)
	);


$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_enable_front_page_video_section',
			array(
				'label'			=>	esc_html__('Enable Video Section', 'tech-teller'),
				'description' 	=>	esc_html__('Check the box to enable and display latest videos at frontpage of your website.', 'tech-teller'),
				'section'		=>	'tech_teller_front_page_video_section',
				'settings'		=>	'tech_teller_enable_front_page_video_section',
				'type' 			=>	'checkbox',
			)
	  	)
);

/*
* Get category from dropdown control for video section
*/

$wp_customize->add_setting(
	'tech_teller_front_page_video_section_category',
		array(
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Tech_Teller_Category_Dropdown_Control( 
			$wp_customize, 'tech_teller_front_page_video_section_category', 
			array(
				'label'				=>	esc_html__('Category for video section', 'tech-teller'),
				'section'			=>	'tech_teller_front_page_video_section',
				'settings'			=>	'tech_teller_front_page_video_section_category',
				'type'            	=>	'dropdown-category',
				'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
			) 
		) 
	);

/*
* Layout for frontpage video section
*/

$wp_customize->add_setting(
	'tech_teller_layout_front_page_video_section',
		array(
			'default'			=>	$default['tech_teller_layout_front_page_video_section'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);
	
$wp_customize->add_control(
	new Tech_Teller_Radio_Image_Control(
	$wp_customize,
	'tech_teller_layout_front_page_video_section',
		array(
			'label'				=>	esc_html__('Video column layout', 'tech-teller'),
			'description'		=>	esc_html__('Select column layout and how many videos are displayed at fronpage of your website.', 'tech-teller'),
			'section'			=>	'tech_teller_front_page_video_section',
			'settings'			=>	'tech_teller_layout_front_page_video_section',
			'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
			'choices'		=>	array(
				'col-md-4' 	=>	esc_url(get_template_directory_uri() . '/assets/images/three-col-vid-layout.png'),
				'col-md-3'	=>	esc_url(get_template_directory_uri() . '/assets/images/four-col-vid-layout.png'),
				'col-md-6' 	=>	esc_url(get_template_directory_uri() . '/assets/images/two-col-vid-layout.png'),
				)
		)
  	)
);

// background for video section bg gradient
$wp_customize->add_setting(
	'tech_teller_front_page_video_section_bg_color', 
	array(
		'default'	=> $default['tech_teller_front_page_video_section_bg_color'],
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_page_video_section_bg_color', 
			array(
				'label'				=>	esc_html__('Section Background Color', 'tech-teller'),
				'description'		=>	esc_html__('Select background color for video section', 'tech-teller'),
				'section'			=>	'tech_teller_front_page_video_section',
				'settings'			=>	'tech_teller_front_page_video_section_bg_color',
				'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
			)
		)
);

// foreground for video section bg gradient
$wp_customize->add_setting(
	'tech_teller_front_page_video_section_fg_color', 
	array(
		'default'	=> $default['tech_teller_front_page_video_section_fg_color'],
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_page_video_section_fg_color', 
			array(
				'label'				=>	esc_html__('Section Foreground Color', 'tech-teller'),
				'description'		=>	esc_html__('Select foreground color for video section. This will enable you to make various gradients for the section\'s background.', 'tech-teller'),
				'section'			=>	'tech_teller_front_page_video_section',
				'settings'			=>	'tech_teller_front_page_video_section_fg_color',
				'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
			)
		)
);

/*
* setting gradient direction for background color
*/
$wp_customize->add_setting(
	'tech_teller_front_page_video_section_gradient_direction',
		array(
			'default'			=>	$default['tech_teller_front_page_video_section_gradient_direction'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);


$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	'tech_teller_front_page_video_section_gradient_direction',
		array(
			'label'			=>	esc_html__('Gradient Direction', 'tech-teller'),
			'description' 	=>	esc_html__('Select direction of linear gradient you want to create for background.', 'tech-teller'),
			'section'		=>	'tech_teller_front_page_video_section',
			'settings'		=>	'tech_teller_front_page_video_section_gradient_direction',
			'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
			'type'			=>	'select',
			'choices'		=>	array(
				'to top' 	=> esc_html__( 'To Top', 'tech-teller' ),
				'to bottom'	=>	esc_html__('To Bottom', 'tech-teller'),
				'to left'	=>	esc_html__('To Left', 'tech-teller'),
				'to right'	=>	esc_html__('To Right', 'tech-teller'),
				)
		)
  	)
);

//Add heading for video section
$wp_customize->add_setting(
	'tech_teller_front_page_video_section_heading', 
	array(
		'default'			=>	$default['tech_teller_front_page_video_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize, 
		'tech_teller_front_page_video_section_heading', 
			array(
				'label'				=>	esc_html__('Heading for video section: ', 'tech-teller'),
				'description'		=>	esc_html__('Change if you want another heading for video section: ', 'tech-teller'),
				'section'			=>	'tech_teller_front_page_video_section',
				'settings'			=>	'tech_teller_front_page_video_section_heading',
				'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
				)
		)
);

// background color for heading of video section
$wp_customize->add_setting(
	'tech_teller_front_page_video_section_heading_bg', 
	array(
		'default'	=> $default['tech_teller_front_page_video_section_heading_bg'],
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_page_video_section_heading_bg', 
			array(
				'label'				=>	esc_html__('Heading Background Color', 'tech-teller'),
				'description'		=>	esc_html__('Select background color for heading of video section', 'tech-teller'),
				'section'			=>	'tech_teller_front_page_video_section',
				'settings'			=>	'tech_teller_front_page_video_section_heading_bg',
				'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
			)
		)
);

// text color for heading of video section
$wp_customize->add_setting(
	'tech_teller_front_page_video_section_heading_color', 
	array(
		'default'	=> $default['tech_teller_front_page_video_section_heading_color'],
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_page_video_section_heading_color', 
			array(
				'label'				=>	esc_html__('Heading Color', 'tech-teller'),
				'description'		=>	esc_html__('Select text color for heading of video section', 'tech-teller'),
				'section'			=>	'tech_teller_front_page_video_section',
				'settings'			=>	'tech_teller_front_page_video_section_heading_color',
				'active_callback'	=>	'tech_teller_if_front_page_video_section_enabled',
			)
		)
);