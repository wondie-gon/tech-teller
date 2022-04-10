<?php
/*
 * Template for customizing blog pages, search page, archive page
 *
 * 
 * @package Tech_Teller
 */

// Adding custom pages panel
$wp_customize->add_panel(
	'tech_teller_pages_features_panel', 
		array(
			'title'				=>	esc_html__('Posts Customizer', 'tech-teller'),
			'priority'			=>	130,
			'active_callback'	=>	'tech_teller_is_page_displays_posts',
		)
	);

/*
* Blog pages features 
*/
$wp_customize->add_section(
	'tech_teller_blog_page_features_section', 
	array(
		'title'			=>	esc_html__('Blog Pages Features', 'tech-teller'),
		'description'	=>	esc_html__('Settings you make here will be reflected at most blog posts in various pages of your website.', 'tech-teller'),
		'panel'		=>	'tech_teller_pages_features_panel',
	)
);

// Blog posts author meta
$wp_customize->add_setting(
	'tech_teller_enable_blog_posts_author_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_blog_posts_author_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_blog_posts_author_meta', 
		array(
			'section'			=>	'tech_teller_blog_page_features_section',
			'label'				=>	esc_html__('Post Author Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_blog_posts_author_meta',
			'type'				=>	'checkbox',
		)
	)
);

// Blog posts date meta
$wp_customize->add_setting(
	'tech_teller_enable_blog_posts_date_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_blog_posts_date_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_blog_posts_date_meta', 
		array(
			'section'			=>	'tech_teller_blog_page_features_section',
			'label'				=>	esc_html__('Post Date Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_blog_posts_date_meta',
			'type'				=>	'checkbox',
		)
	)
);

// Blog posts featured image
$wp_customize->add_setting(
	'tech_teller_enable_blog_posts_featured_image', 
		array(
			'default'	=>	$default['tech_teller_enable_blog_posts_featured_image'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_blog_posts_featured_image', 
		array(
			'section'			=>	'tech_teller_blog_page_features_section',
			'label'				=>	esc_html__('Featured Image', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_blog_posts_featured_image',
			'type'				=>	'checkbox',
		)
	)
);

// Blog posts category badges
$wp_customize->add_setting(
	'tech_teller_enable_blog_posts_category_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_blog_posts_category_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_blog_posts_category_badges', 
		array(
			'section'			=>	'tech_teller_blog_page_features_section',
			'label'				=>	esc_html__('Post Category Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_blog_posts_category_badges',
			'type'				=>	'checkbox',
		)
	)
);

// Blog posts tags
$wp_customize->add_setting(
	'tech_teller_enable_blog_posts_tag_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_blog_posts_tag_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_blog_posts_tag_badges', 
		array(
			'section'			=>	'tech_teller_blog_page_features_section',
			'label'				=>	esc_html__('Post Tag Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_blog_posts_tag_badges',
			'type'				=>	'checkbox',
		)
	)
);

/*
* Archive pages features 
*/
$wp_customize->add_section(
	'tech_teller_archive_page_features_section', 
	array(
		'title'		=>	esc_html__('Archive Pages Features', 'tech-teller'),
		'description'	=>	esc_html__('Settings you make here will be reflected on appearance of posts in archive, category, tag and related pages of your website.', 'tech-teller'),
		'panel'		=>	'tech_teller_pages_features_panel',
	)
);

// Archive posts author meta
$wp_customize->add_setting(
	'tech_teller_enable_archive_posts_author_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_archive_posts_author_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_archive_posts_author_meta', 
		array(
			'section'			=>	'tech_teller_archive_page_features_section',
			'label'				=>	esc_html__('Post Author Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_archive_posts_author_meta',
			'type'				=>	'checkbox',
		)
	)
);

// Archive posts date meta
$wp_customize->add_setting(
	'tech_teller_enable_archive_posts_date_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_archive_posts_date_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_archive_posts_date_meta', 
		array(
			'section'			=>	'tech_teller_archive_page_features_section',
			'label'				=>	esc_html__('Post Date Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_archive_posts_date_meta',
			'type'				=>	'checkbox',
		)
	)
);

// Archive posts featured image
$wp_customize->add_setting(
	'tech_teller_enable_archive_posts_featured_image', 
		array(
			'default'	=>	$default['tech_teller_enable_archive_posts_featured_image'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_archive_posts_featured_image', 
		array(
			'section'			=>	'tech_teller_archive_page_features_section',
			'label'				=>	esc_html__('Featured Image', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_archive_posts_featured_image',
			'type'				=>	'checkbox',
		)
	)
);

// Archive posts tags
$wp_customize->add_setting(
	'tech_teller_enable_archive_posts_tag_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_archive_posts_tag_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_archive_posts_tag_badges', 
		array(
			'section'			=>	'tech_teller_archive_page_features_section',
			'label'				=>	esc_html__('Post Tag Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_archive_posts_tag_badges',
			'type'				=>	'checkbox',
		)
	)
);

/*
* media posts features 
*/
$wp_customize->add_section(
	'tech_teller_media_page_features_section', 
	array(
		'title'		=>	esc_html__('Media Posts Features', 'tech-teller'),
		'description'	=>	esc_html__('Settings you make here will be reflected on appearance of media posts in various pages of your website.', 'tech-teller'),
		'panel'		=>	'tech_teller_pages_features_panel',
	)
);

// media posts author meta
$wp_customize->add_setting(
	'tech_teller_enable_media_posts_author_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_media_posts_author_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_media_posts_author_meta', 
		array(
			'section'			=>	'tech_teller_media_page_features_section',
			'label'				=>	esc_html__('Post Author Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_media_posts_author_meta',
			'type'				=>	'checkbox',
		)
	)
);

// media posts date meta
$wp_customize->add_setting(
	'tech_teller_enable_media_posts_date_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_media_posts_date_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_media_posts_date_meta', 
		array(
			'section'			=>	'tech_teller_media_page_features_section',
			'label'				=>	esc_html__('Post Date Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_media_posts_date_meta',
			'type'				=>	'checkbox',
		)
	)
);

// media posts category
$wp_customize->add_setting(
	'tech_teller_enable_media_posts_category_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_media_posts_category_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_media_posts_category_badges', 
		array(
			'section'			=>	'tech_teller_media_page_features_section',
			'label'				=>	esc_html__('Post Category Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_media_posts_category_badges',
			'type'				=>	'checkbox',
		)
	)
);

// media posts tags
$wp_customize->add_setting(
	'tech_teller_enable_media_posts_tag_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_media_posts_tag_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_media_posts_tag_badges', 
		array(
			'section'			=>	'tech_teller_media_page_features_section',
			'label'				=>	esc_html__('Post Tag Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_media_posts_tag_badges',
			'type'				=>	'checkbox',
		)
	)
);

/*
* Search pages features
*/ 
$wp_customize->add_section(
	'tech_teller_search_page_features_section', 
	array(
		'title'		=>	esc_html__('Search Pages Features', 'tech-teller'),
		'panel'		=>	'tech_teller_pages_features_panel',
	)
);

// search posts author meta
$wp_customize->add_setting(
	'tech_teller_enable_search_posts_author_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_search_posts_author_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_search_posts_author_meta', 
		array(
			'section'			=>	'tech_teller_search_page_features_section',
			'label'				=>	esc_html__('Post Author Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_search_posts_author_meta',
			'type'				=>	'checkbox',
		)
	)
);

// search posts date meta
$wp_customize->add_setting(
	'tech_teller_enable_search_posts_date_meta', 
		array(
			'default'	=>	$default['tech_teller_enable_search_posts_date_meta'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_search_posts_date_meta', 
		array(
			'section'			=>	'tech_teller_search_page_features_section',
			'label'				=>	esc_html__('Post Date Meta', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_search_posts_date_meta',
			'type'				=>	'checkbox',
		)
	)
);

// search posts featured image
$wp_customize->add_setting(
	'tech_teller_enable_search_posts_featured_image', 
		array(
			'default'	=>	$default['tech_teller_enable_search_posts_featured_image'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_search_posts_featured_image', 
		array(
			'section'			=>	'tech_teller_search_page_features_section',
			'label'				=>	esc_html__('Featured Image', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_search_posts_featured_image',
			'type'				=>	'checkbox',
		)
	)
);

// search posts excerpt
$wp_customize->add_setting(
	'tech_teller_enable_search_posts_excerpt', 
		array(
			'default'	=>	$default['tech_teller_enable_search_posts_excerpt'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_search_posts_excerpt', 
		array(
			'section'			=>	'tech_teller_search_page_features_section',
			'label'				=>	esc_html__('Post Excerpt', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_search_posts_excerpt',
			'type'				=>	'checkbox',
		)
	)
);

// search posts category badges
$wp_customize->add_setting(
	'tech_teller_enable_search_posts_category_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_search_posts_category_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_search_posts_category_badges', 
		array(
			'section'			=>	'tech_teller_search_page_features_section',
			'label'				=>	esc_html__('Post Category Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_search_posts_category_badges',
			'type'				=>	'checkbox',
		)
	)
);

// search posts tags
$wp_customize->add_setting(
	'tech_teller_enable_search_posts_tag_badges', 
		array(
			'default'	=>	$default['tech_teller_enable_search_posts_tag_badges'],
			'sanitize_callback' => 'tech_teller_sanitize_checkbox',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'tech_teller_enable_search_posts_tag_badges', 
		array(
			'section'			=>	'tech_teller_search_page_features_section',
			'label'				=>	esc_html__('Post Tag Badges', 'tech-teller'),
			'settings'			=>	'tech_teller_enable_search_posts_tag_badges',
			'type'				=>	'checkbox',
		)
	)
);


//if media post formats enabled
$options = get_option('post_formats');

$formats = array('video', 'audio', 'gallery', 'image');

$output = array();

foreach ($formats as $format) {
	$output[] = (@$options[$format]) == 1 ? $format : '';
}

if (!empty($output)) :

	//Load social sharing feature for media posts
	require_once( trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-functions/media-posts-social-sharing.php' );

endif;


