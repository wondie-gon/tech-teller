<?php
/*
* social media sharing features for video, audio, gallery, image posts 
*/
$wp_customize->add_section(
	'tech_teller_media_posts_social_sharing_feature_section', 
	array(
		'title'			=>	esc_html__('Media Posts Social Sharing', 'tech-teller'),
		'description'	=>	esc_html__('Settings you make here enables a social media sharing features for various media posts such as video, audio, gallery and images. First enable, then select the social media.', 'tech-teller'),
		'panel'		=>	'tech_teller_pages_features_panel',
	)
);

/* 
* Whether to display social media sharing 
* feature for media posts
*/
$wp_customize->add_setting(
	'tech_teller_enable_media_posts_social_sharing_feature',
		array(
			'default'	=>	$default['tech_teller_enable_media_posts_social_sharing_feature'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox'
		)
	);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tech_teller_enable_media_posts_social_sharing_feature',
		    array(
		        'label' 		=> esc_html__('Enable Social Media Sharing', 'tech-teller'),
		        'section' 		=> 'tech_teller_media_posts_social_sharing_feature_section',
		        'settings'		=> 'tech_teller_enable_media_posts_social_sharing_feature',
		        'type' 			=> 'checkbox',
		    )
    	)
	);

// Facebook
$wp_customize->add_setting(
	'tech_teller_select_facebook_for_media_posts', 
		array(
			'default'	=>	$default['tech_teller_select_facebook_for_media_posts'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_facebook_for_media_posts', 
		array(
			'section'			=>	'tech_teller_media_posts_social_sharing_feature_section',
			'label'				=>	esc_html__('Facebook', 'tech-teller'),
			'settings'			=> 'tech_teller_select_facebook_for_media_posts',
			'active_callback'	=>	'tech_teller_if_social_sharing_enabled_for_media_posts',
			'type'				=>	'checkbox',
		)
	)
);
// Twitter
$wp_customize->add_setting(
	'tech_teller_select_twitter_for_media_posts', 
	array(
		'default'	=>	$default['tech_teller_select_twitter_for_media_posts'],
		'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_twitter_for_media_posts', 
		array(
			'section'			=>	'tech_teller_media_posts_social_sharing_feature_section',
			'label'				=>	esc_html__('Twitter', 'tech-teller'),
			'settings'			=> 'tech_teller_select_twitter_for_media_posts',
			'active_callback'	=>	'tech_teller_if_social_sharing_enabled_for_media_posts',
			'type'				=>	'checkbox',
		)
	)
);
// googleplus
$wp_customize->add_setting(
	'tech_teller_select_googleplus_for_media_posts', 
	array(
		'default'	=>	$default['tech_teller_select_googleplus_for_media_posts'],
		'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_googleplus_for_media_posts', 
		array(
			'section'			=>	'tech_teller_media_posts_social_sharing_feature_section',
			'label'				=>	esc_html__('Google+', 'tech-teller'),
			'settings'			=> 'tech_teller_select_googleplus_for_media_posts',
			'active_callback'	=>	'tech_teller_if_social_sharing_enabled_for_media_posts',
			'type'				=>	'checkbox',
		)
	)
);
// pinterest
$wp_customize->add_setting(
	'tech_teller_select_pinterest_for_media_posts', 
		array(
			'default'	=>	$default['tech_teller_select_pinterest_for_media_posts'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_pinterest_for_media_posts', 
		array(
			'section'			=>	'tech_teller_media_posts_social_sharing_feature_section',
			'label'				=>	esc_html__('Pinterest', 'tech-teller'),
			'settings'			=> 'tech_teller_select_pinterest_for_media_posts',
			'active_callback'	=>	'tech_teller_if_social_sharing_enabled_for_media_posts',
			'type'				=>	'checkbox',
		)
	)
);

// linkedin
$wp_customize->add_setting(
	'tech_teller_select_linkedin_for_media_posts', 
		array(
			'default'	=>	$default['tech_teller_select_linkedin_for_media_posts'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_linkedin_for_media_posts', 
		array(
			'section'			=>	'tech_teller_media_posts_social_sharing_feature_section',
			'label'				=>	esc_html__('Linkedin', 'tech-teller'),
			'settings'			=> 'tech_teller_select_linkedin_for_media_posts',
			'active_callback'	=>	'tech_teller_if_social_sharing_enabled_for_media_posts',
			'type'				=>	'checkbox',
		)
	)
);