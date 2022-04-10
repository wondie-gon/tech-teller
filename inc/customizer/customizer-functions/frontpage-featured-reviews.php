<?php
/**
 * Template for customizing frontpage's featured reviews
 *
 * 
 * @package Tech_Teller
 */

/*
* Section for frontpage featured review posts
*/
$wp_customize->add_section(
	'tech_teller_frontpage_featured_review',
	array(
		'title'		=>	esc_html__('Featured Review Post', 'tech-teller'),
		'panel'		=> 'tech_teller_frontpage_panel'
	)
);

/*
* Enabling and Setting contents for featured review posts
*/
$wp_customize->add_setting(
	'tech_teller_frontpage_featured_review',
	array(
		'default'	=>	$default['select_featured_review_post'],
		'sanitize_callback'	=>	'tech_teller_sanitize_select'
	)
);

$wp_customize->add_control('tech_teller_frontpage_featured_review',
	array(
		'section'	=>	'tech_teller_frontpage_featured_review',
		'label'		=>	esc_html__('Enable Content Type: ', 'tech-teller'),
		'description'	=>	esc_html__('Enable content type for featured review', 'tech-teller'),
		'settings'	=>	'tech_teller_frontpage_featured_review',
		'type'		=>	'select',
		'choices'	=>	array(
			'disable'	=>	esc_html__('--Disable--', 'tech-teller'), 
			'post'	=>	esc_html__('Post', 'tech-teller'), 
			)
	)
);

/*
* Get category list dropdown control for frontpage Featured
*/

$wp_customize->add_setting(
	'tech_teller_front_featured_review_category',
		array(
			'default'			=>	$default['tech_teller_front_featured_review_category'],
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Tech_Teller_Category_Dropdown_Control( 
			$wp_customize, 'tech_teller_front_featured_review_category', 
			array(
				'label'				=>	esc_html__('Select category for featured Post', 'tech-teller'),
				'description'		=>	esc_html__('Select category to choose posts for featured section', 'tech-teller'),
				'section'			=>	'tech_teller_frontpage_featured_review',
				'settings'			=>	'tech_teller_front_featured_review_category',
				'type'            	=> 'dropdown-category',
				'active_callback'	=>	'tech_teller_if_featured_review_post',
			) 
		) 
	);


// Add heading for featured review post
$wp_customize->add_setting(
	'tech_teller_frontpage_featured_review_heading', 
	array(
		'default'	=> $default['tech_teller_frontpage_featured_review_heading'],
		'transport'	=> 'postMessage',
		'sanitize_callback'	=>	'sanitize_text_field',
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_frontpage_featured_review_heading', 
	array(
		'label'		=> esc_html__('Heading of Review: ', 'tech-teller'),
		'section'	=> 'tech_teller_frontpage_featured_review',
		'settings'	=> 'tech_teller_frontpage_featured_review_heading',
		'active_callback'	=>	'tech_teller_if_featured_review_not_disabled',
		)
	)
);

// Additional text for featured review setting
$wp_customize->add_setting(
	'tech_teller_frontpage_review_additional_text',
		array(
			'default' => $default['tech_teller_frontpage_review_additional_text'],
			'transport'	=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	'tech_teller_frontpage_review_additional_text',
		array(
			'section'		=> 'tech_teller_frontpage_featured_review',
			'label'			=> esc_html__('Additional Text: ', 'tech-teller'),
			'description'	=>	esc_html__('Brief info on how the review was made. Not more than 200 characters', 'tech-teller'),
			'active_callback' => 'tech_teller_if_featured_review_not_disabled',
			'type'	=>	'textarea',
		)
  	)
);

// Title color for featured review post
$wp_customize->add_setting(
	'tech_teller_frontpage_review_post_title_color', 
	array(
		'default'	=> $default['tech_teller_frontpage_review_post_title_color'],
		'transport'	=> 'postMessage',
		'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
	)
);

$wp_customize->add_control(new WP_Customize_Color_control(
	$wp_customize, 
	'tech_teller_frontpage_review_post_title_color', 
		array(
			'label'		=> esc_html__('Title Color', 'tech-teller'),
			'section'	=> 'tech_teller_frontpage_featured_review',
			'settings'	=> 'tech_teller_frontpage_review_post_title_color',
			'active_callback'	=>	'tech_teller_if_featured_review_not_disabled',
		)
	)
);

//Featured review custom button text setting
$wp_customize->add_setting(
	'tech_teller_frontpage_review_custom_btn_text',
		array(
			'default' => $default['tech_teller_frontpage_review_custom_btn_text'],
			'transport'	=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	'tech_teller_frontpage_review_custom_btn_text',
		array(
			'section'		=> 'tech_teller_frontpage_featured_review',
			'label'			=> esc_html__('Button text ', 'tech-teller'),
			'active_callback' => 'tech_teller_if_featured_review_not_disabled'
		)
  	)
);

// Custom separator for frontpage Featured

$wp_customize->add_setting(
'tech_teller_front_featured_review_custom_separator', 
	array(
		'sanitize_callback'	=>	'tech_teller_sanitize_html'
	)
);

$wp_customize->add_control(new Tech_Teller_Separator_Custom_Control(
	$wp_customize, 
	'tech_teller_front_featured_review_custom_separator',
		array(
			'type'	            =>	'tech-teller-separator',
			'section'	        =>	'tech_teller_frontpage_featured_review',
			'settings'	        =>	'tech_teller_front_featured_review_custom_separator',
			'active_callback'	=>	'tech_teller_if_featured_review_not_disabled',
		)
	)
);


/*
* Get category from dropdown control for below featured
*/

$wp_customize->add_setting(
	'tech_teller_category_for_below_featured_review',
		array(
			'default'			=>	$default['tech_teller_category_for_below_featured_review'],
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Tech_Teller_Category_Dropdown_Control( 
			$wp_customize, 'tech_teller_category_for_below_featured_review', 
			array(
				'label'				=>	esc_html__('Post category below featured', 'tech-teller'),
				'description'		=>	esc_html__('Select category for posts below featured review', 'tech-teller'),
				'section'			=>	'tech_teller_frontpage_featured_review',
				'settings'			=>	'tech_teller_category_for_below_featured_review',
				'type'            	=> 'dropdown-category',
				'active_callback'	=>	'tech_teller_if_featured_review_not_disabled',
			) 
		) 
	);
	