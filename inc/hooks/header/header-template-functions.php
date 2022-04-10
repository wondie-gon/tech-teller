<?php
/**
 * head and header template functions and hooks
 *
 * @package Tech_Teller
 *
 * @since 1.0.4
 */

/**
 * head meta data contents
 * @since 1.0.4
 */
// hook in to wp_head
add_action('wp_head', 'tech_teller_head_meta_contents', 5);

if ( ! function_exists('tech_teller_head_meta_contents') ) {
	/**
	 * head meta data contents
	 *
	 * insert data into head meta contents
	 * useful for SEO
	 *
	 * @since 1.0.4
	 */
	function tech_teller_head_meta_contents() {

		// Get default customization
        $default = tech_teller_get_default_mods();

        $tech_teller_fb = get_theme_mod( 'tech_teller_facebook_link_username', $default['tech_teller_facebook_link_username'] );
        $tech_teller_twit = get_theme_mod( 'tech_teller_twitter_link_username', $default['tech_teller_twitter_link_username'] );
        
		?>
		<?php //if ( tech_teller_is_woocommerce_activated() && ( ! is_cart() || ! is_checkout() ) ) : ?>
<!-- <meta name="description" content="<?php //echo tech_teller_meta_description_data(); ?>" /> -->
<meta name="keywords" content="<?php  ?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo tech_teller_meta_title_data(); ?>" />
<!-- <meta property="og:description" content="<?php //echo tech_teller_meta_description_data(); ?>" /> -->
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="article:publisher" content="https://www.facebook.com/<?php echo !empty($tech_teller_fb)?$tech_teller_fb:''; ?>" />
<meta property="article:section" content="" />
<meta property="article:published_time" content="<?php echo get_the_date('Y F d h:m:s'); ?>">
<meta property="article:modified_time" content="<?php echo get_the_modified_date('Y F d h:m:s'); ?>">
<meta property="og:image" content="<?php echo tech_teller_meta_image_data(); ?>" />
<meta property="og:image:width" content="360">
<meta property="og:image:height" content="270">
<meta name="twitter:card" content="summary" />
<!-- <meta name="twitter:description" content="<?php //echo tech_teller_meta_description_data(); ?>" /> -->
<meta name="twitter:title" content="<?php echo tech_teller_meta_title_data(); ?>" />
<meta name="twitter:site" content="https://www.twitter.com/<?php echo !empty($tech_teller_twit)?$tech_teller_twit:''; ?>" />
<meta name="twitter:image" content="<?php echo tech_teller_meta_image_data(); ?>" />
<meta name="twitter:creator" content="@<?php echo !empty($tech_teller_twit)?$tech_teller_twit:''; ?>" />
		<?php
	}

}

/**
*
* function to get image url for meta data
* @since 1.0.4
*/

if ( ! function_exists('tech_teller_meta_image_data') ) {
	
	function tech_teller_meta_image_data() {

		// logo
        $custom_logo = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'custom-logo' );

        if ( is_home() || is_front_page() || is_search() || is_archive() ) {
        	
        	$img_url = esc_url ( $custom_logo );

        } elseif ( is_single() || is_singular() || is_page() ) {
        	
        	// if there is no image, get the logo url
	        if ( ! has_post_thumbnail() && ! empty($custom_logo) ) {

	        	$img_url = esc_url ( $custom_logo );

	        } elseif ( has_post_thumbnail() ) {

	        	// get image url
	        	$post_img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID(), 'tech-teller-smaller-image' ) );
	        	$img_url = $post_img['0'];
	        	$img_url = esc_url(  $img_url  );

	        } else {

	        	$img_url = '';

	        }

        } else {

        	$img_url = '';

        }

        return $img_url;

	}

}

/**
*
* function to get title for meta data
*
* @since 1.0.4
*/

if ( ! function_exists('tech_teller_meta_title_data') ) {
	
	function tech_teller_meta_title_data() {

        if ( is_home() || is_front_page() || is_search() || is_archive() ) {
        	
        	$meta_title = get_bloginfo('name');

        } else {
        	
	        if ( is_single() || is_singular() || is_page() ) {

	        	$meta_title = get_the_title();

	        } else {

	        	$meta_title = get_bloginfo('name');

	        }

        }

        return $meta_title;

	}

}

/**
*
* function to get description for meta data
*
* @since 1.0.4
*/

if ( ! function_exists('tech_teller_meta_description_data') ) {
	
	function tech_teller_meta_description_data() {

		//global $post;

        if ( is_home() || is_front_page() || is_search() || is_archive() ) {
        	
        	$tt_meta_description = get_bloginfo('description');

        } else {
        	
	        if ( is_single() || is_singular() || is_page() ) {

	        	$tt_meta_description = get_the_excerpt();

	        } else {

	        	$tt_meta_description = get_bloginfo('description');

	        }

        }

        return $tt_meta_description;

	}

}