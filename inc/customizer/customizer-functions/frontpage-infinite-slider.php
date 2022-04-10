<?php
/**
 * Template for customizing frontpage infinite auto slider section
 *
 * 
 * @package Tech_Teller
 */
// Get defaults for theme customizer
$default = tech_teller_get_default_mods();


/*
* Section for infinite slider
*/
$wp_customize->add_section(
	'tech_teller_front_infinite_slider',
		array(
			'title'		=>	esc_html__('Featured Infinite Slider/Banner', 'tech-teller'),
			'panel'		=> 'tech_teller_frontpage_panel',
		)
	);
/*
* enabling infinite slider for frontpage
*/
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider',
		array(
			'default'			=>	$default['tech_teller_enable_front_infinite_slider'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox', 
		)
	);


$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_front_infinite_slider',
			array(
				'label'			=>	esc_html__('Enable infinite slider', 'tech-teller'),
				'description' 	=>	esc_html__('Check the box to enable infinite slider', 'tech-teller'),
				'section'		=>	'tech_teller_front_infinite_slider',
				'settings'		=>	'tech_teller_front_infinite_slider',
				'type' 			=>	'checkbox',
			)
	  	)
	);

// Get category from dropdown control for infinite slider
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider_category',
		array(
			'default'			=>	$default['tech_teller_front_infinite_slider_category'],
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Tech_Teller_Category_Dropdown_Control( 
			$wp_customize, 'tech_teller_front_infinite_slider_category', 
			array(
				'label'				=>	esc_html__('Category for infinite slider', 'tech-teller'),
				'description'		=>	esc_html__('Select category to choose posts for infinite slider section', 'tech-teller'),
				'section'			=>	'tech_teller_front_infinite_slider',
				'settings'			=>	'tech_teller_front_infinite_slider_category',
				'type'            	=>	'dropdown-category',
				'active_callback'	=>	'tech_teller_if_front_infinite_slider_enabled',
			) 
		) 
	);

// Layout for infinite slider
$wp_customize->add_setting(
	'tech_teller_layout_front_infinite_slider',
		array(
			'default'			=>	$default['tech_teller_layout_front_infinite_slider'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);
	
$wp_customize->add_control(
	new Tech_Teller_Radio_Image_Control(
	$wp_customize,
	'tech_teller_layout_front_infinite_slider',
		array(
			'label'				=>	esc_html__('Slider column layout', 'tech-teller'),
			'description'		=>	esc_html__('Select layout how individual sliders are displayed.', 'tech-teller'),
			'section'			=>	'tech_teller_front_infinite_slider',
			'settings'			=>	'tech_teller_layout_front_infinite_slider',
			'active_callback'	=>	'tech_teller_if_front_infinite_slider_enabled',
			'choices'		=>	array( 
				'2' =>	esc_url(get_template_directory_uri() . '/assets/images/two-col-slider-layout.png'),
				'3' =>	esc_url(get_template_directory_uri() . '/assets/images/three-col-slider-layout.png'),
				'4'	=>	esc_url(get_template_directory_uri() . '/assets/images/four-col-slider-layout.png'),
				)
			)
	  	)
	);

// infinite slider autoplay speed
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider_speed',
		array(
			'default'			=>	$default['tech_teller_front_infinite_slider_speed'],
			'sanitize_callback'	=>	'tech_teller_sanitize_number_range',
		)
	);
	
$wp_customize->add_control(
	new WP_Customize_Control(
	$wp_customize,
	'tech_teller_front_infinite_slider_speed',
		array(
			'label'				=>	esc_html__('Slider speed', 'tech-teller'),
			'description'		=>	esc_html__('Set speed of slider autoplay', 'tech-teller'),
			'section'			=>	'tech_teller_front_infinite_slider',
			'settings'			=>	'tech_teller_front_infinite_slider_speed',
			'active_callback'	=>	'tech_teller_if_front_infinite_slider_enabled',
			'type'				=> 'range',
			'input_attrs'   	=> array( 'min' => 3000, 'max' => 8000, 'step'	=>	500 ),
		)
  	)
);

// Add heading for infinite slider section
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider_heading', 
	array(
		'default'			=> $default['tech_teller_front_infinite_slider_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'	=> 'postMessage',
		)
	);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize, 
		'tech_teller_front_infinite_slider_heading', 
			array(
				'label'				=>	esc_html__('Heading for section: ', 'tech-teller'),
				'section'			=>	'tech_teller_front_infinite_slider',
				'settings'			=>	'tech_teller_front_infinite_slider_heading',
				'active_callback'	=>	'tech_teller_if_front_infinite_slider_enabled',
				)
		)
);

// Heading color for infinite slider section
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider_heading_color', 
	array(
		'default'	=> $default['tech_teller_front_infinite_slider_heading_color'],
		'transport'	=> 'postMessage',
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_infinite_slider_heading_color', 
			array(
				'label'				=>	esc_html__('Heading Color', 'tech-teller'),
				'section'			=>	'tech_teller_front_infinite_slider',
				'settings'			=>	'tech_teller_front_infinite_slider_heading_color',
				'active_callback'	=>	'tech_teller_if_slider_heading_is_set',
			)
		)
);

// background color for infinite slider section
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider_section_bg', 
	array(
		'default'	=> $default['tech_teller_front_infinite_slider_section_bg'],
		'transport'	=> 'postMessage',
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_infinite_slider_section_bg', 
			array(
				'label'				=>	esc_html__('Background Color', 'tech-teller'),
				'section'			=>	'tech_teller_front_infinite_slider',
				'settings'			=>	'tech_teller_front_infinite_slider_section_bg',
				'active_callback'	=>	'tech_teller_if_front_infinite_slider_enabled',
			)
		)
);

// Title color for individual infinite slider post
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider_title_color', 
	array(
		'default'	=> $default['tech_teller_front_infinite_slider_title_color'],
		'transport'	=> 'postMessage',
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_infinite_slider_title_color', 
			array(
				'label'				=>	esc_html__('Title Color', 'tech-teller'),
				'description'		=>	esc_html__('Set color for title of individual post in the slider', 'tech-teller'),
				'section'			=>	'tech_teller_front_infinite_slider',
				'settings'			=>	'tech_teller_front_infinite_slider_title_color',
				'active_callback'	=>	'tech_teller_if_front_infinite_slider_enabled',
			)
		)
);

// background color for each slider title
$wp_customize->add_setting(
	'tech_teller_front_infinite_slider_title_bg', 
	array(
		'default'	=> $default['tech_teller_front_infinite_slider_title_bg'],
		'transport'	=> 'postMessage',
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_control(
		$wp_customize, 
		'tech_teller_front_infinite_slider_title_bg', 
			array(
				'label'				=>	esc_html__('Title Background Color', 'tech-teller'),
				'section'			=>	'tech_teller_front_infinite_slider',
				'settings'			=>	'tech_teller_front_infinite_slider_title_bg',
				'active_callback'	=>	'tech_teller_if_front_infinite_slider_enabled',
			)
		)
);