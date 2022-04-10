<?php
/**
 * Template for customizing header ad post section
 *
 * 
 * @package Tech_Teller
 */

// Get defaults for theme customizer
$default = tech_teller_get_default_mods();

// Adding ad post panel
$wp_customize->add_panel(
	'tech_teller_advertisment_panel', 
		array(
			'title'		=>	esc_html__('Advertisement Section', 'tech-teller'),
			'priority'	=>	250
		)
	);

// Header advertisement section
$wp_customize->add_section(
	'tech_teller_header_ad_section', 
		array(
			'title'		=>	esc_html__('Header Advertisement Posts', 'tech-teller'),
			'panel'		=>	'tech_teller_advertisment_panel'
		)
	);

/* 
* Whether to display Header ad post
*/

$wp_customize->add_setting(
	'post_tech_teller_header_custom_advertisement',
		array(
			'default'	=>	$default['post_tech_teller_header_custom_advertisement'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox'
		)
	);
$wp_customize->add_control(
	'post_tech_teller_header_custom_advertisement',
	    array(
	        'label' => esc_html__('Enable Header Advertisment Section', 'tech-teller'),
	        'section' => 'tech_teller_header_ad_section',
	        'type' => 'checkbox',
	    )
	);

/* 
* Header ad post heading
*/
$wp_customize->add_setting(
	'tech_teller_header_custom_ad_heading', 
		array(
			'default'	=>	$default['tech_teller_header_custom_ad_heading'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_header_custom_ad_heading', 
		array(
			'section'			=>	'tech_teller_header_ad_section',
			'label'				=>	esc_html__('Ad Heading:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_header_custom_advertisement_enabled',
		)
	)
);

/* 
* Header ad post image
*/
$wp_customize->add_setting(
	'tech_teller_header_ad_post_image', 
		array(
			'default'			=>	'',
			'sanitize_callback' =>	'tech_teller_sanitize_image',	
		)
	);

$wp_customize->add_control(new WP_Customize_Cropped_Image_Control(
	$wp_customize, 
	'tech_teller_header_ad_post_image', 
		array(
			'section'	=>	'tech_teller_header_ad_section',
			'label'		=>	esc_html__('Add Image:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_header_custom_advertisement_enabled',
			'width'		=>	400,
			'height'	=>	60
		)
	)
);

/* 
* Header ad post link
*/
$wp_customize->add_setting(
	'tech_teller_header_ad_post_link',
		array(
			'default'	=>	$default['tech_teller_header_ad_post_link'],
			'sanitize_callback' => 'esc_url_raw',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_header_ad_post_link', 
		array(
			'section'			=>	'tech_teller_header_ad_section',
			'label'				=>	esc_html__('Link:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_header_custom_advertisement_enabled',
		)
	)
);

// sidebar advertisement section
$wp_customize->add_section(
	'tech_teller_sidebar_ad_section', 
		array(
			'title'		=>	esc_html__('Sidebar Advertisement Posts', 'tech-teller'),
			'panel'		=>	'tech_teller_advertisment_panel'
		)
	);

/* 
* Whether to display sidebar ad post
*/

$wp_customize->add_setting(
	'post_tech_teller_sidebar_custom_advertisement',
		array(
			'default'	=>	$default['post_tech_teller_sidebar_custom_advertisement'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox'
		)
	);
$wp_customize->add_control(
	'post_tech_teller_sidebar_custom_advertisement',
	    array(
	        'label' => esc_html__('Enable Sidebar Advertisment Section', 'tech-teller'),
	        'section' => 'tech_teller_sidebar_ad_section',
	        'type' => 'checkbox',
	    )
	);

/* 
* sidebar ad post heading
*/
$wp_customize->add_setting(
	'tech_teller_sidebar_custom_ad_heading', 
		array(
			'default'	=>	$default['tech_teller_sidebar_custom_ad_heading'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_sidebar_custom_ad_heading', 
		array(
			'section'			=>	'tech_teller_sidebar_ad_section',
			'label'				=>	esc_html__('Ad Heading:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_sidebar_custom_advertisement_enabled',
		)
	)
);
/* 
* sidebar ad post text
*/
$wp_customize->add_setting(
	'tech_teller_sidebar_custom_ad_text', 
		array(
			'default'	=>	$default['tech_teller_sidebar_custom_ad_text'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_sidebar_custom_ad_text', 
		array(
			'section'			=>	'tech_teller_sidebar_ad_section',
			'label'				=>	esc_html__('Ad Text:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_sidebar_custom_advertisement_enabled',
		)
	)
);
/* 
* sidebar ad post btn text
*/
$wp_customize->add_setting(
	'tech_teller_sidebar_custom_ad_btn_text', 
		array(
			'default'	=>	$default['tech_teller_sidebar_custom_ad_btn_text'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_sidebar_custom_ad_btn_text', 
		array(
			'section'			=>	'tech_teller_sidebar_ad_section',
			'label'				=>	esc_html__('Ad Button Text:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_sidebar_custom_advertisement_enabled',
		)
	)
);

/* 
* sidebar ad post image
*/
$wp_customize->add_setting(
	'tech_teller_sidebar_ad_post_image', 
	array(
			'default'			=>	'',
			'sanitize_callback' =>	'tech_teller_sanitize_image',	
		)
	);

$wp_customize->add_control(new WP_Customize_Cropped_Image_Control(
	$wp_customize, 
	'tech_teller_sidebar_ad_post_image', 
		array(
			'section'	=>	'tech_teller_sidebar_ad_section',
			'label'		=>	esc_html__('Add Image:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_sidebar_custom_advertisement_enabled',
			'width'		=>	400,
			'height'	=>	450
		)
	)
);

/* 
* sidebar ad post link
*/
$wp_customize->add_setting(
	'tech_teller_sidebar_ad_post_link',
		array(
			'default'	=>	$default['tech_teller_sidebar_ad_post_link'],
			'sanitize_callback' => 'esc_url_raw',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_sidebar_ad_post_link', 
		array(
			'section'			=>	'tech_teller_sidebar_ad_section',
			'label'				=>	esc_html__('Link:', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_sidebar_custom_advertisement_enabled',
		)
	)
);
	

