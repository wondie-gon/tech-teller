<?php
/**
 * Default theme options.
 *
 * 
 * @package Tech_Teller
 */
if (!function_exists('tech_teller_get_default_mods')) :
	/**
	 * Get default theme options
	 *
	 * @return array Default theme options.
	 */
	function tech_teller_get_default_mods(){
		
		$defaults = array();

		// General Column Layout
		$defaults['tech_teller_default_site_column_layout'] 					=	'right-sidebar-layout';
		$defaults['tech_teller_enable_breadcrumbs'] 							=	1;
		$defaults['tech_teller_enable_fixed_nav'] 								=	1;
		$defaults['tech_teller_small_device_menu_button_position'] 				=	'right-menu-button';
		$defaults['tech_teller_small_menu_button_type'] 						=	'grid';

		// Custom style default colors
		$defaults['tech_teller_light_bg_color'] 								=	'#ffffff';
		$defaults['tech_teller_heading_bg_on_light_bg'] 						=	'#fa5151';
		$defaults['tech_teller_heading_color_on_light_bg'] 						=	'#ffffff';
		$defaults['tech_teller_light_text_color']								=	'#000000';
		$defaults['tech_teller_light_btn_bgcolor']								=	'transparent';
		$defaults['tech_teller_light_btn_color'] 								=	'#3A6073';
		
		$defaults['tech_teller_dark_bg_color']									=	'#040e0a';
		$defaults['tech_teller_dark_text_color']								=	'#ffffff';
		$defaults['tech_teller_dark_btn_bgcolor']								=	'transparent';
		$defaults['tech_teller_dark_btn_color']									=	'#F19818';

		// default color settings for footer area
		$defaults['tech_teller_footer_main_bg_color']							=	'#2b2b2b';
		$defaults['tech_teller_footer_all_text_color']							=	'#ffffff';
		$defaults['tech_teller_footer_all_link_color']							=	'#b4b0b0';
		$defaults['tech_teller_footer_all_link_hover_color']					=	'#ffffff';
		$defaults['tech_teller_footer_all_link_icons_color']					=	'#a4a4a4';
		$defaults['tech_teller_footer_all_link_icons_hover_color']				=	'#fbfbfb';
		$defaults['tech_teller_footer_extra_bg_color']							=	'#121212';

		// Frontpage slider default
		$defaults['tech_teller_front_slider_content']							=	'disable';
		$defaults['tech_teller_num_of_front_sliders']							=	3;
		$defaults['tech_teller_front_slider_custom_btn']						=	esc_html__('Continue Reading', 'tech-teller');
		$defaults['tech_teller_front_slider_category_list']						=	0;
		$defaults['tech_teller_category_for_post_below_slider']					=	0;
		$defaults['tech_teller_layout_front_slider']							=	'excerpt-right-slider';
		$defaults['tech_teller_front_slider_speed']								=	8000;

		// Review posts default options
		$defaults['tech_teller_front_featured_review_category']					=	0;
		$defaults['tech_teller_category_for_below_featured_review']				=	0;
		$defaults['select_featured_review_post']	    						=	'disable';
		$defaults['tech_teller_frontpage_featured_review_heading']				=	esc_html__( 'Featured Review', 'tech-teller' );
		$defaults['tech_teller_frontpage_review_additional_text']				=	esc_html__('The review of this product is based on personal experiences and from other users', 'tech-teller');
		$defaults['tech_teller_frontpage_review_post_title_color']				=	'#ffffff';
		$defaults['tech_teller_frontpage_review_custom_btn_text']				=	esc_html__('Learn More', 'tech-teller');

		// Featured blog
		$defaults['tech_teller_frontpage_select_featured_blog'] 				=	'disable';
		$defaults['tech_teller_front_featured_blog_category']					=	0;
		$defaults['tech_teller_category_for_below_featured_blog']				=	0;
		$defaults['tech_teller_frontpage_featured_blog_heading'] 				=	esc_html__('Featured Blog', 'tech-teller');
		$defaults['tech_teller_frontpage_featured_blog_heading_color']			=	'#ffffff';
		$defaults['tech_teller_frontpage_featured_blog_title_color']			=	'#ffffff';
		$defaults['tech_teller_frontpage_featured_blog_text_color']				=	'#ffffff';
		$defaults['tech_teller_heading_for_below_featured_blog'] 				=	esc_html__('Recent Blogs', 'tech-teller');

		// Frontpage infinite slider default
		$defaults['tech_teller_enable_front_infinite_slider']					=	0;
		$defaults['tech_teller_layout_front_infinite_slider']					=	'4';
		$defaults['tech_teller_front_infinite_slider_speed']					=	4000;
		$defaults['tech_teller_front_infinite_slider_category']					=	0;
		$defaults['tech_teller_front_infinite_slider_section_bg']				=	'#ffffff';
		$defaults['tech_teller_front_infinite_slider_heading']					=	'';
		$defaults['tech_teller_front_infinite_slider_heading_color']			=	'#ffffff';
		$defaults['tech_teller_front_infinite_slider_title_color']				=	'#ffffff';
		$defaults['tech_teller_front_infinite_slider_title_bg']					=	'#000000';

		// frontpage video post formats section default
		$defaults['tech_teller_enable_front_page_video_section']				=	0;
		$defaults['tech_teller_layout_front_page_video_section']				=	'col-md-4';
		$defaults['tech_teller_front_page_video_section_bg_color']				=	'#fa5151';
		$defaults['tech_teller_front_page_video_section_fg_color']				=	'#040e0a';
		$defaults['tech_teller_front_page_video_section_gradient_direction']	=	'to top';
		$defaults['tech_teller_front_page_video_section_heading']				=	esc_html__( 'Recent Videos', 'tech-teller' );
		$defaults['tech_teller_front_page_video_section_heading_bg']			=	'#fa5151';
		$defaults['tech_teller_front_page_video_section_heading_color']			=	'#ffffff';

		// Blog pages default
		$defaults['tech_teller_enable_blog_posts_author_meta']					=	1;
		$defaults['tech_teller_enable_blog_posts_date_meta']					=	1;
		$defaults['tech_teller_enable_blog_posts_featured_image']				=	1;
		$defaults['tech_teller_enable_blog_posts_category_badges']				=	1;
		$defaults['tech_teller_enable_blog_posts_tag_badges']					=	1;

		// Archive pages default
		$defaults['tech_teller_enable_archive_posts_author_meta']				=	1;
		$defaults['tech_teller_enable_archive_posts_date_meta']					=	1;
		$defaults['tech_teller_enable_archive_posts_featured_image']			=	1;
		$defaults['tech_teller_enable_archive_posts_tag_badges']				=	1;

		//media posts default
		$defaults['tech_teller_enable_media_posts_author_meta']					=	0;
		$defaults['tech_teller_enable_media_posts_date_meta']					=	1;
		$defaults['tech_teller_enable_media_posts_category_badges']				=	1;
		$defaults['tech_teller_enable_media_posts_tag_badges']					=	1;

		// Social media sharing default for media posts
		$defaults['tech_teller_enable_media_posts_social_sharing_feature']		=	0;
		$defaults['tech_teller_select_facebook_for_media_posts']				=	0;
		$defaults['tech_teller_select_twitter_for_media_posts']					=	0;
		$defaults['tech_teller_select_googleplus_for_media_posts']				=	0;
		$defaults['tech_teller_select_pinterest_for_media_posts']				=	0;
		$defaults['tech_teller_select_instagram_for_media_posts']	    		=	0;
		$defaults['tech_teller_select_youtube_for_media_posts']					=	0;
		$defaults['tech_teller_select_linkedin_for_media_posts']				=	0;

		// Search pages default
		$defaults['tech_teller_enable_search_posts_author_meta']				=	1;
		$defaults['tech_teller_enable_search_posts_date_meta']					=	1;
		$defaults['tech_teller_enable_search_posts_featured_image']				=	1;
		$defaults['tech_teller_enable_search_posts_excerpt']					=	1;
		$defaults['tech_teller_enable_search_posts_category_badges']			=	1;
		$defaults['tech_teller_enable_search_posts_tag_badges']					=	1;

		// Advertisement post default
		$defaults['post_tech_teller_header_custom_advertisement']				=	0;
		$defaults['tech_teller_header_custom_ad_heading']						=	'';
		$defaults['tech_teller_header_ad_post_link']							=	'http://www.wontechalook.com';

		$defaults['post_tech_teller_sidebar_custom_advertisement']				=	0;
		$defaults['tech_teller_sidebar_custom_ad_heading']						=	'';
		$defaults['tech_teller_sidebar_custom_ad_text']							=	'';
		$defaults['tech_teller_sidebar_custom_ad_btn_text']						=	'';
		$defaults['tech_teller_sidebar_ad_post_link']							=	'http://www.wontechalook.com';

		// Social media sharing default
		$defaults['enable_tech_teller_social_media_sharing']					=	0;
		$defaults['tech_teller_select_facebook_to_share_post']					=	0;
		$defaults['tech_teller_select_twitter_to_share_post']					=	0;
		$defaults['tech_teller_select_googleplus_to_share_post']				=	0;
		$defaults['tech_teller_select_pinterest_to_share_post']					=	0;
		$defaults['tech_teller_select_linkedin_to_share_post']	    			=	0;
		$defaults['tech_teller_select_instagram_to_share_post']					=	0;

		// Single post features default
		$defaults['tech_teller_enable_post_featured_image']						=	1;
		$defaults['tech_teller_enable_post_author_meta']						=	1;
		$defaults['tech_teller_enable_post_date_meta']							=	1;
		$defaults['tech_teller_enable_post_author_box']							=	1;
		$defaults['tech_teller_enable_post_tag_badges']							=	1;
		$defaults['tech_teller_enable_post_comment_link']						=	1;


		// Social media link default
		$defaults['enable_tech_teller_social_media_link_nav']					=	0;

		$defaults['tech_teller_facebook_link_username']							=	'#';
		$defaults['tech_teller_twitter_link_username']							=	'#';
		$defaults['tech_teller_googleplus_link_username']						=	'#';
		$defaults['tech_teller_pinterest_link_username']						=	'#';
		$defaults['tech_teller_linkedin_link_username']	    					=	'#';
		$defaults['tech_teller_instagram_link_username']						=	'#';
		$defaults['tech_teller_youtube_link_username']							=	'#';

		$defaults['tech_teller_enable_social_media_on_header']					=	1;
		$defaults['tech_teller_enable_social_media_on_footer']					=	1;

		// footer default
		$defaults['tech_teller_footer_column_layout']							=	'four-column';
		$defaults['tech_teller_enable_extra_bottom_footer']						=	0;
		$defaults['tech_teller_enable_bottom_footer_page_links']				=	0;
		$defaults['tech_teller_enable_scroll_to_top_button']					=	0;
		$defaults['tech_teller_bottom_footer_copyright_text']					=	'';
		$defaults['tech_teller_enable_bottom_footer_site_name']					=	0;
		$defaults['tech_teller_enable_bottom_footer_powered_by']				=	1;
		

		$defaults = apply_filters('tech_teller_filter_default_mods', $defaults);

		return $defaults;
	}
endif;