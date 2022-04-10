<?php
/**
 * Template for customizing frontpage's featured blog post
 *
 * 
 * @package Tech_Teller
 */

/* Section for featured blog post */
$wp_customize->add_section(
	'tech_teller_frontpage_featured_blog', 
		array(
			'title'		=>	esc_html__('Featured Blog/News Post', 'tech-teller'),
			'panel'		=> 'tech_teller_frontpage_panel',
		)
	);

/*
* Enabling and Setting contents for featured blog post
*/
$wp_customize->add_setting(
	'tech_teller_frontpage_featured_blog',
		array(
			'default'			=>	$default['tech_teller_frontpage_select_featured_blog'],
			'sanitize_callback'	=>	'tech_teller_sanitize_select',
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_frontpage_featured_blog', 
	array(
			'label'		=>	esc_html__('Enable Content Type: ', 'tech-teller'),
			'description'	=>	esc_html__('Enable content type for featured blog', 'tech-teller'),
			'section'	=>	'tech_teller_frontpage_featured_blog',
			'settings'			=>	'tech_teller_frontpage_featured_blog',
			'type'		=>	'select',
			'choices'	=>	array(
				'disable'	=>	esc_html__('--Disable--', 'tech-teller'), 
				'post'	=>	esc_html__('Post', 'tech-teller'), 
				)
		)
	)
);

/*
* Get category list dropdown control for frontpage Featured blog
*/

$wp_customize->add_setting(
	'tech_teller_front_featured_blog_category',
		array(
			'default'			=>	$default['tech_teller_front_featured_blog_category'],
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Tech_Teller_Category_Dropdown_Control( 
			$wp_customize, 'tech_teller_front_featured_blog_category', 
			array(
				'label'				=>	esc_html__('Select category for featured blog', 'tech-teller'),
				'description'		=>	esc_html__('Select category for posts in featured blog section', 'tech-teller'),
				'section'			=>	'tech_teller_frontpage_featured_blog',
				'settings'			=>	'tech_teller_front_featured_blog_category',
				'type'            	=>	'dropdown-category',
				'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
			) 
		) 
	);


// Add heading for Featured Blog Block
$wp_customize->add_setting(
	'tech_teller_frontpage_featured_blog_heading', 
		array(
			'default'	=>	$default['tech_teller_frontpage_featured_blog_heading'],
			'transport'	=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_frontpage_featured_blog_heading', 
	array(
		'label'		=> esc_html__('Block Heading: ', 'tech-teller'),
		'section'	=> 'tech_teller_frontpage_featured_blog',
		'settings'	=> 'tech_teller_frontpage_featured_blog_heading',
		'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
		)
	)
);

// heading color for featured blog heading
$wp_customize->add_setting(
	'tech_teller_frontpage_featured_blog_heading_color', 
		array(
			'default'	=>	$default['tech_teller_frontpage_featured_blog_heading_color'],
			'transport'	=> 'postMessage',
			'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
		)
	);

$wp_customize->add_control(new WP_Customize_Color_control(
	$wp_customize, 
	'tech_teller_frontpage_featured_blog_heading_color', 
		array(
			'label'		=> esc_html__('Heading color', 'tech-teller'),
			'section'	=> 'tech_teller_frontpage_featured_blog',
			'settings'			=>	'tech_teller_frontpage_featured_blog_heading_color',
			'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
		)
	)
);

// title color for title of featured blog
$wp_customize->add_setting(
	'tech_teller_frontpage_featured_blog_title_color', 
		array(
			'default'	=> $default['tech_teller_frontpage_featured_blog_title_color'],
			'transport'	=> 'postMessage',
			'sanitize_callback'	=> 'tech_teller_sanitize_hex_color',
		)
	);

$wp_customize->add_control(new WP_Customize_Color_control(
	$wp_customize, 
	'tech_teller_frontpage_featured_blog_title_color', 
		array(
			'label'				=> esc_html__('Title color', 'tech-teller'),
			'section'			=> 'tech_teller_frontpage_featured_blog',
			'settings'			=>	'tech_teller_frontpage_featured_blog_title_color',
			'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
		)
	)
);


// text color for featured blog post
$wp_customize->add_setting(
	'tech_teller_frontpage_featured_blog_text_color', 
		array(
			'default'	=>	$default['tech_teller_frontpage_featured_blog_text_color'],
			'transport'	=> 'postMessage',
			'sanitize_callback'	=>	'tech_teller_sanitize_hex_color',
		)
	);

$wp_customize->add_control(new WP_Customize_Color_control(
	$wp_customize, 
	'tech_teller_frontpage_featured_blog_text_color', 
		array(
			'label'		=> esc_html__('Text color', 'tech-teller'),
			'section'	=> 'tech_teller_frontpage_featured_blog',
			'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
		)
	)
);

// Custom separator in customization of frontpage Featured blog

$wp_customize->add_setting(
'tech_teller_front_featured_blog_custom_separator', 
	array(
		'sanitize_callback'	=>	'tech_teller_sanitize_html'
	)
);

$wp_customize->add_control(new Tech_Teller_Separator_Custom_Control(
	$wp_customize, 
	'tech_teller_front_featured_blog_custom_separator',
		array(
			'type'	            =>	'tech-teller-separator',
			'section'	        =>	'tech_teller_frontpage_featured_blog',
			'settings'	        =>	'tech_teller_front_featured_blog_custom_separator',
			'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
		)
	)
);


/*
* Get category from dropdown control for below featured
*/

$wp_customize->add_setting(
	'tech_teller_category_for_below_featured_blog',
		array(
			'default'			=>	$default['tech_teller_category_for_below_featured_blog'],
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Tech_Teller_Category_Dropdown_Control( 
			$wp_customize, 'tech_teller_category_for_below_featured_blog', 
			array(
				'label'				=>	esc_html__('Posts category below featured', 'tech-teller'),
				'description'		=>	esc_html__('Select category for posts below featured blog', 'tech-teller'),
				'section'			=>	'tech_teller_frontpage_featured_blog',
				'settings'			=>	'tech_teller_category_for_below_featured_blog',
				'type'            	=> 	'dropdown-category',
				'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
			) 
		) 
	);

// Add heading for Featured Blog Block
$wp_customize->add_setting(
	'tech_teller_heading_for_below_featured_blog', 
		array(
			'default'	=>	$default['tech_teller_heading_for_below_featured_blog'],
			'transport'	=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_heading_for_below_featured_blog', 
	array(
		'label'		=> esc_html__('Section Heading: ', 'tech-teller'),
		'section'	=> 'tech_teller_frontpage_featured_blog',
		'settings'	=> 'tech_teller_heading_for_below_featured_blog',
		'active_callback'	=>	'tech_teller_if_featured_blog_not_disabled',
		)
	)
);

