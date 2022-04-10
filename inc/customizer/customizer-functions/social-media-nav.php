<?php
/**
 * Template for customizing social media links
 *
 * 
 * @package Tech_Teller
 */
// Get defaults for theme customizer
$default = tech_teller_get_default_mods();


// Social media link customizer section 
$wp_customize->add_section(
	'tech_teller_social_media_link_section', 
	array(
		'title'		=>	esc_html__('Social Media Links', 'tech-teller'),
		'panel'		=>	'tech_teller_general_options_panel',
		'priority'	=>	24,
	)
);

/* 
* Whether to display social media link nav bar
*/
$wp_customize->add_setting(
	'enable_tech_teller_social_media_link_nav',
		array(
			'default'	=>	$default['enable_tech_teller_social_media_link_nav'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox'
		)
	);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'enable_tech_teller_social_media_link_nav',
		    array(
		        'label' 		=> esc_html__('Enable Social Media links', 'tech-teller'),
		        'section' 		=> 'tech_teller_social_media_link_section',
		        'settings'		=> 'enable_tech_teller_social_media_link_nav',
		        'type' 			=> 'checkbox',
		    )
    	)
	);

/* 
* setting up social media usernames
*/

// Facebook
$wp_customize->add_setting(
	'tech_teller_facebook_link_username', 
		array(
			'default'	=>	$default['tech_teller_facebook_link_username'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_facebook_link_username', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('Facebook', 'tech-teller'),
			'settings'			=> 'tech_teller_facebook_link_username',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
		)
	)
);

// Twitter
$wp_customize->add_setting(
	'tech_teller_twitter_link_username', 
	array(
		'default'	=>	$default['tech_teller_twitter_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_twitter_link_username', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('Twitter', 'tech-teller'),
			'settings'			=>  'tech_teller_twitter_link_username',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
		)
	)
);

// googleplus
$wp_customize->add_setting(
	'tech_teller_googleplus_link_username', 
	array(
		'default'	=>	$default['tech_teller_googleplus_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_googleplus_link_username', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('Google+', 'tech-teller'),
			'settings'			=>  'tech_teller_googleplus_link_username',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
		)
	)
);
// pinterest
$wp_customize->add_setting(
	'tech_teller_pinterest_link_username', 
		array(
			'default'	=>	$default['tech_teller_pinterest_link_username'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_pinterest_link_username', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('Pinterest', 'tech-teller'),
			'settings'			=>	'tech_teller_pinterest_link_username',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
		)
	)
);
// linkedin
$wp_customize->add_setting(
	'tech_teller_linkedin_link_username', 
		array(
			'default'	=>	$default['tech_teller_linkedin_link_username'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_linkedin_link_username', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('Linkedin', 'tech-teller'),
			'settings'			=>	'tech_teller_linkedin_link_username',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
		)
	)
);

// instagram
$wp_customize->add_setting(
	'tech_teller_instagram_link_username', 
	array(
		'default'	=>	$default['tech_teller_instagram_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_instagram_link_username', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('Instagram', 'tech-teller'),
			'settings'			=>	'tech_teller_instagram_link_username',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
		)
	)
);

// youtube
$wp_customize->add_setting(
	'tech_teller_youtube_link_username', 
	array(
		'default'	=>	$default['tech_teller_youtube_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_youtube_link_username', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('Youtube', 'tech-teller'),
			'settings'			=>	'tech_teller_youtube_link_username',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
		)
	)
);

// Social media on header
$wp_customize->add_setting(
	'tech_teller_enable_social_media_on_header', 
	array(
		'default'	=>	$default['tech_teller_enable_social_media_on_header'],
		'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_social_media_on_header', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('In the Header', 'tech-teller'),
			'description'		=>	esc_html__('Uncheck if you want the social media bar not to be displayed on header', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_social_media_on_header',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
			'type'				=>	'checkbox',
		)
	)
);

// Social media on footer
$wp_customize->add_setting(
	'tech_teller_enable_social_media_on_footer', 
	array(
		'default'	=>	$default['tech_teller_enable_social_media_on_footer'],
		'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_social_media_on_footer', 
		array(
			'section'			=>	'tech_teller_social_media_link_section',
			'label'				=>	esc_html__('In the Footer', 'tech-teller'),
			'description'		=>	esc_html__('Uncheck if you want the social media bar not to be displayed on footer', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_social_media_on_footer',
			'active_callback'	=>	'tech_teller_if_social_media_link_nav_enabled',
			'type'				=>	'checkbox',
		)
	)
);

