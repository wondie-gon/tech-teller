<?php
/**
 * Template for customizing frontpage top sliders
 *
 * 
 * @package Tech_Teller
 */


// Get defaults for theme customizer
$default = tech_teller_get_default_mods();


/*
* Section for frontpage slider
*/
$wp_customize->add_section(
	'tech_teller_front_slider',
		array(
			'title'		=>	esc_html__('Featured Posts Slider/Banner Setting', 'tech-teller'),
			'panel'		=> 'tech_teller_frontpage_panel',
		)
	);
/*
* enabling and Setting contents for frontpage slider
*/
$wp_customize->add_setting(
	'tech_teller_front_slider',
		array(
			'default'			=>	$default['tech_teller_front_slider_content'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
			'transport'			=>	'refresh', 
		)
	);


$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	'tech_teller_front_slider',
		array(
			'section'		=>	'tech_teller_front_slider',
			'label'			=>	esc_html__('Slider Content', 'tech-teller'),
			'description' 	=>	esc_html__('Select the content type to display on slider', 'tech-teller'),
			'settings'		=>	'tech_teller_front_slider',
			'type'			=>	'select',
			'choices'		=>	array(
				'disable' => esc_html__( '--Disable--', 'tech-teller' ),
				'post'	=>	esc_html__('Post', 'tech-teller'),
				'page'	=>	esc_html__('Page', 'tech-teller'),
				)
		)
  	)
);

/*
* Number of sliders
*/
$wp_customize->add_setting(
	'tech_teller_num_of_front_sliders',
		array(
			'default'			=>	$default['tech_teller_num_of_front_sliders'],
			'sanitize_callback'	=>	'tech_teller_sanitize_number',
			'transport'			=>	'refresh',
		)
	);
	
$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	'tech_teller_num_of_front_sliders',
		array(
			'label'				=>	esc_html__('Number of sliders', 'tech-teller'),
			'description'		=>	esc_html__('How many sliders do you want on homepage?', 'tech-teller'),
			'section'			=>	'tech_teller_front_slider',
			'settings'			=>	'tech_teller_num_of_front_sliders',
			'active_callback'	=>	'tech_teller_if_slider_not_disabled',
			'type' 				=>	'number',
		)
  	)
);

//Top slider custom button text setting
$wp_customize->add_setting(
	'tech_teller_front_slider_custom_btn',
		array(
			'sanitize_callback' =>	'sanitize_text_field',
			'default' 			=>	$default['tech_teller_front_slider_custom_btn'],
			'transport'			=>	'postMessage',
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	'tech_teller_front_slider_custom_btn',
		array(
			'label'				=>	esc_html__( 'Button text ', 'tech-teller' ),
			'section'			=>	'tech_teller_front_slider',
			'settings'			=>	'tech_teller_front_slider_custom_btn',
			'active_callback' 	=>	'tech_teller_if_slider_not_disabled',
		)
  	)
);

/*
* Get category list dropdown control for first slider
*/

$wp_customize->add_setting(
	'tech_teller_front_slider_category_list',
		array(
			'default'			=>	$default['tech_teller_front_slider_category_list'],
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Tech_Teller_Category_Dropdown_Control( 
			$wp_customize, 'tech_teller_front_slider_category_list', 
			array(
				'label'				=>	esc_html__('Select category for slider Post', 'tech-teller'),
				'description'		=>	esc_html__('Select category to choose posts for slider section', 'tech-teller'),
				'section'			=>	'tech_teller_front_slider',
				'settings'			=>	'tech_teller_front_slider_category_list',
				'type'            	=>	'dropdown-category',
				'active_callback'	=>	'tech_teller_if_slider_post',
			) 
		) 
	);


// Setting pages dropdown and images for display
$front_slider_num = get_theme_mod('tech_teller_num_of_front_sliders', $default['tech_teller_num_of_front_sliders']);
for ($i=1; $i <= $front_slider_num; $i++) {


	// slider page setting
	$wp_customize->add_setting(
		'tech_teller_front_slider_page_' . $i,
			array(
				'sanitize_callback'	=>	'tech_teller_sanitize_dropdown_pages'
			)
		);
	$wp_customize->add_control(
		'tech_teller_front_slider_page_' . $i,
			array(
				'label'		=>	esc_html__('Page ', 'tech-teller') . $i,
				'type'		=>	'dropdown-pages',
				'section'	=>	'tech_teller_front_slider',
				'settings'	=>	'tech_teller_front_slider_page_' . $i,
				'active_callback'	=>	'tech_teller_if_slider_page',  
			)
		);


	// Add custom image for frontpage slider posts
	$wp_customize->add_setting(
		'tech_teller_front_slider_custom_page_image_' . $i, 
		array(
			'default'			=>	'',
			'sanitize_callback' =>	'tech_teller_sanitize_image',	
		)
	);

	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control(
		$wp_customize, 
		'tech_teller_front_slider_custom_page_image_' . $i, 
			array(
				'label'		=> esc_html__('Featured image ', 'tech-teller') . $i,
				'section'	=> 'tech_teller_front_slider',
				'settings'	=>	'tech_teller_front_slider_custom_page_image_' . $i,
				'active_callback'	=>	'tech_teller_if_slider_page',
				'width'		=>	700,
				'height'	=>	380
			)
		)
	);

	// Custom separator for frontpage slider

	$wp_customize->add_setting(
	'tech_teller_front_slider_custom_separator_' . $i, 
		array(
			'sanitize_callback'	=>	'tech_teller_sanitize_html'
		)
	);
	$wp_customize->add_control(new Tech_Teller_Separator_Custom_Control(
		$wp_customize, 
		'tech_teller_front_slider_custom_separator_' . $i,
			array(
				'type'	            =>	'tech-teller-separator',
				'section'	        =>	'tech_teller_front_slider',
				'settings'	        =>	'tech_teller_front_slider_custom_separator_' . $i,
				'active_callback'	=>	'tech_teller_if_slider_page',
			)
		)
	);

}

/*
* Layout for top slider
*/

$wp_customize->add_setting(
	'tech_teller_layout_front_slider',
		array(
			'default'			=>	$default['tech_teller_layout_front_slider'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);
	
$wp_customize->add_control(
	new Tech_Teller_Radio_Image_Control(
	$wp_customize,
	'tech_teller_layout_front_slider',
		array(
			'label'				=>	esc_html__('Slider layout', 'tech-teller'),
			'description'		=>	esc_html__('Select layout how sliders are displayed.', 'tech-teller'),
			'section'			=>	'tech_teller_front_slider',
			'settings'			=>	'tech_teller_layout_front_slider',
			'active_callback'	=>	'tech_teller_if_slider_not_disabled',
			'choices'		=>	array( 
				'excerpt-right-slider' =>	esc_url(get_template_directory_uri() . '/assets/images/two-col-excrpt-right.png'),
				'excerpt-left-slider' =>	esc_url(get_template_directory_uri() . '/assets/images/two-col-excrpt-left.png'),
				'one-column-slider'	=>	esc_url(get_template_directory_uri() . '/assets/images/one-col-slider.png'),
				)
		)
  	)
);

/*
* Front top slider autoplay speed
*/

$wp_customize->add_setting(
	'tech_teller_front_slider_speed',
		array(
			'default'			=>	$default['tech_teller_front_slider_speed'],
			'sanitize_callback'	=>	'tech_teller_sanitize_number_range',
		)
	);
	
$wp_customize->add_control(
	new WP_Customize_Control(
	$wp_customize,
	'tech_teller_front_slider_speed',
		array(
			'label'				=>	esc_html__('Slider speed', 'tech-teller'),
			'description'		=>	esc_html__('Set speed of slider autoplay', 'tech-teller'),
			'section'			=>	'tech_teller_front_slider',
			'settings'			=>	'tech_teller_front_slider_speed',
			'active_callback'	=>	'tech_teller_if_slider_not_disabled',
			'type'				=>	'range',
			'input_attrs'   	=>	array( 'min' => 5000, 'max' => 12000, 'step'	=>	1000 ),
		)
  	)
);

/*
* Get category list dropdown control for section below first slider
*/

$wp_customize->add_setting( 'tech_teller_category_for_post_below_slider',
	array(
		'default'           => $default['tech_teller_category_for_post_below_slider'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Tech_Teller_Category_Dropdown_Control( $wp_customize, 'tech_teller_category_for_post_below_slider',
	array(
        'label'           => esc_html__( 'Category for Post Below Slider', 'tech-teller' ),
        'description'           => esc_html__( 'Select category to choose posts for section below slider', 'tech-teller' ),
        'section'         => 'tech_teller_front_slider',
        'settings'			=>	'tech_teller_category_for_post_below_slider',
        'type'            => 'dropdown-category',
		'active_callback' => 'tech_teller_if_slider_not_disabled',

    ) 
) );
	