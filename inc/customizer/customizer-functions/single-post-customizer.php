<?php
/**
 * Template for customizing single post features
 *
 * 
 * @package Tech_Teller
 */
// Get defaults for theme customizer
$default = tech_teller_get_default_mods();


// Adding custom single post panel
$wp_customize->add_panel(
	'tech_teller_single_post_panel', 
		array(
			'title'		=>	esc_html__('Single Post', 'tech-teller'),
			'priority'	=>	255,
			'active_callback'	=>	'tech_teller_is_single_post',
		)
	);

// Single post features 
$wp_customize->add_section(
	'tech_teller_single_post_features_section', 
	array(
		'title'		=>	esc_html__('Single Post Features', 'tech-teller'),
		'panel'		=>	'tech_teller_single_post_panel'
	)
);

// Post author meta
$wp_customize->add_setting(
	'tech_teller_enable_post_author_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_post_author_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_post_author_meta', 
		array(
			'section'			=>	'tech_teller_single_post_features_section',
			'label'				=>	esc_html__('Post Author Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_post_author_meta',
			'type'				=>	'checkbox',
		)
	)
);

// Post date meta
$wp_customize->add_setting(
	'tech_teller_enable_post_date_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_post_date_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_post_date_meta', 
		array(
			'section'			=>	'tech_teller_single_post_features_section',
			'label'				=>	esc_html__('Post Date Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_post_date_meta',
			'type'				=>	'checkbox',
		)
	)
);

// Post featured image
$wp_customize->add_setting(
	'tech_teller_enable_post_featured_image', 
		array(
			'default'	=>	$default['tech_teller_enable_post_featured_image'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_post_featured_image', 
		array(
			'section'			=>	'tech_teller_single_post_features_section',
			'label'				=>	esc_html__('Featured Image', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_post_featured_image',
			'type'				=>	'checkbox',
		)
	)
);

// Post author box
$wp_customize->add_setting(
	'tech_teller_enable_post_author_box', 
		array(
			'default'	=>	$default['tech_teller_enable_post_author_box'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_post_author_box', 
		array(
			'section'			=>	'tech_teller_single_post_features_section',
			'label'				=>	esc_html__('About Author Box', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_post_author_box',
			'type'				=>	'checkbox',
		)
	)
);

// Post tags
$wp_customize->add_setting(
	'tech_teller_enable_post_tag_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_post_tag_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_post_tag_badges', 
		array(
			'section'			=>	'tech_teller_single_post_features_section',
			'label'				=>	esc_html__('Post Tag Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_post_tag_badges',
			'type'				=>	'checkbox',
		)
	)
);

// Post comment link
$wp_customize->add_setting(
	'tech_teller_enable_post_comment_link', 
		array(
			'default'	=>	$default['tech_teller_enable_post_comment_link'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_post_comment_link', 
		array(
			'section'			=>	'tech_teller_single_post_features_section',
			'label'				=>	esc_html__('Post Comment Link', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_post_comment_link',
			'type'				=>	'checkbox',
		)
	)
);


// Single post social media sharing 
$wp_customize->add_section(
	'tech_teller_social_media_sharing_section', 
	array(
		'title'		=>	esc_html__('Share Post on Social Media', 'tech-teller'),
		'panel'		=>	'tech_teller_single_post_panel'
	)
);

/* 
* Whether to display social media sharing
*/

$wp_customize->add_setting(
	'enable_tech_teller_social_media_sharing',
		array(
			'default'	=>	$default['enable_tech_teller_social_media_sharing'],
			'sanitize_callback'	=>	'tech_teller_sanitize_checkbox'
		)
	);
$wp_customize->add_control(
	'enable_tech_teller_social_media_sharing',
	    array(
	        'label' => esc_html__('Enable Social Media Sharing', 'tech-teller'),
	        'section' => 'tech_teller_social_media_sharing_section',
	        'type' => 'checkbox',
	    )
	);

/* 
* Check social media to which posts are to be shared
*/
// Facebook
$wp_customize->add_setting(
	'tech_teller_select_facebook_to_share_post', 
		array(
			'default'	=>	$default['tech_teller_select_facebook_to_share_post'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_facebook_to_share_post', 
		array(
			'section'			=>	'tech_teller_social_media_sharing_section',
			'label'				=>	esc_html__('Facebook', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
);
// Twitter
$wp_customize->add_setting(
	'tech_teller_select_twitter_to_share_post', 
	array(
		'default'	=>	$default['tech_teller_select_twitter_to_share_post'],
		'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_twitter_to_share_post', 
		array(
			'section'			=>	'tech_teller_social_media_sharing_section',
			'label'				=>	esc_html__('Twitter', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
);
// googleplus
$wp_customize->add_setting(
	'tech_teller_select_googleplus_to_share_post', 
	array(
		'default'	=>	$default['tech_teller_select_googleplus_to_share_post'],
		'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_googleplus_to_share_post', 
		array(
			'section'			=>	'tech_teller_social_media_sharing_section',
			'label'				=>	esc_html__('Google+', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
);
// pinterest
$wp_customize->add_setting(
	'tech_teller_select_pinterest_to_share_post', 
		array(
			'default'	=>	$default['tech_teller_select_pinterest_to_share_post'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_pinterest_to_share_post', 
		array(
			'section'			=>	'tech_teller_social_media_sharing_section',
			'label'				=>	esc_html__('Pinterest', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
);

// linkedin
$wp_customize->add_setting(
	'tech_teller_select_linkedin_to_share_post', 
		array(
			'default'	=>	$default['tech_teller_select_linkedin_to_share_post'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_select_linkedin_to_share_post', 
		array(
			'section'			=>	'tech_teller_social_media_sharing_section',
			'label'				=>	esc_html__('Linkedin', 'tech-teller'),
			'active_callback'	=>	'tech_teller_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
);




