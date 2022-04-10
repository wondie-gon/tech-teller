<?php  
/**
* Active callback function for theme customization
*
* @package Tech_Teller
*/

/**
 * Check if the front slider is not disabled
 */
function tech_teller_if_slider_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'tech_teller_front_slider' )->value();
}

/**
 * Check if the featured review is not disabled
 */
function tech_teller_if_featured_review_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'tech_teller_frontpage_featured_review' )->value();
}

/**
 * Check if the featured blog is not disabled
 */
function tech_teller_if_featured_blog_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'tech_teller_frontpage_featured_blog' )->value();
}

/**
 * Check if the infinite slider enabled
 */
function tech_teller_if_front_infinite_slider_enabled($control) {

	return false != $control->manager->get_setting( 'tech_teller_front_infinite_slider' )->value();
}

/**
 * Check if video section is enabled for frontpage
 */
function tech_teller_if_front_page_video_section_enabled($control) {

	return false != $control->manager->get_setting( 'tech_teller_enable_front_page_video_section' )->value();
}

/**
 * Check if the infinite slider heading is set
 */
function tech_teller_if_slider_heading_is_set($control) {

	return false != $control->manager->get_setting( 'tech_teller_front_infinite_slider_heading' )->value();
}

/**
 * Check if the header advertisement is not disabled
 */
function tech_teller_if_header_custom_advertisement_enabled($control) {

	return false != $control->manager->get_setting( 'post_tech_teller_header_custom_advertisement' )->value();
}

/**
 * Check if the sidebar advertisement is not disabled
 */
function tech_teller_if_sidebar_custom_advertisement_enabled($control) {

	return false != $control->manager->get_setting( 'post_tech_teller_sidebar_custom_advertisement' )->value();
}

/**
 * Check if the social media sharing not disabled for media posts
 */
function tech_teller_if_social_sharing_enabled_for_media_posts($control) {

	return false != $control->manager->get_setting( 'tech_teller_enable_media_posts_social_sharing_feature' )->value();
}

/**
 * Check if the social media sharing is not disabled for single post
 */
function tech_teller_if_social_media_sharing_enabled($control) {

	return false != $control->manager->get_setting( 'enable_tech_teller_social_media_sharing' )->value();
}

/**
 * Check if the social media nav disabled
 */
function tech_teller_if_social_media_link_nav_enabled($control) {

	return false != $control->manager->get_setting( 'enable_tech_teller_social_media_link_nav' )->value();
}

/**
 * Check if the slider is page
 */
function tech_teller_if_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'tech_teller_front_slider' )->value();
}

/**
 * Check if the slider is post
 */
function tech_teller_if_slider_post( $control ) {
	return 'post' === $control->manager->get_setting( 'tech_teller_front_slider' )->value();
}

/**
 * Check if the featured review is post
 */
function tech_teller_if_featured_review_post( $control ) {
	return 'post' === $control->manager->get_setting( 'tech_teller_frontpage_featured_review' )->value();
}

/**
 * Check if the extra bottom footer enabled
 */
function tech_teller_if_extra_bottom_footer_enabled($control) {

	return false != $control->manager->get_setting( 'tech_teller_enable_extra_bottom_footer' )->value();
}

/**
 * Check if page links at extra bottom footer enabled
 */
function tech_teller_if_bottom_footer_page_links_enabled($control) {

	return false != $control->manager->get_setting( 'tech_teller_enable_bottom_footer_page_links' )->value();
}