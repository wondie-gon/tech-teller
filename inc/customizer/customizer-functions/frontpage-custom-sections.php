<?php
/**
 * customization of the frontpage
 *
 * 
 * @package Tech_Teller
 */

// Get defaults for theme customizer
$default = tech_teller_get_default_mods();

/*
* Panel for frontpage sections
*/
$wp_customize->add_panel(
	'tech_teller_frontpage_panel',
		array(
			'title'	=>	esc_html__('Frontpage Features', 'tech-teller'),
			'priority'	=>	125,
			'active_callback' => 'tech_teller_is_latest_posts',
		)
	);

/**
 * Separator custom control
 */
class Tech_Teller_Separator_Custom_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 */
	public $type = 'tech-teller-separator';
	/**
	 * Control method
	 *
	 */
	public function render_content() {
		?>
		<p><hr style="border-color: #333333; opacity: 0.2;"></p>
		<?php
	}
}

/*
* Tech Teller frontpage features customization
*/

// Load customize frontpage slider section
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/frontpage-top-slider-section.php' );

// Load customize frontpage featured review
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/frontpage-featured-reviews.php' );

// Load customize frontpage blog posts
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/frontpage-blog-posts.php' );

// Load customize frontpage infinite slider
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/frontpage-infinite-slider.php' );

/**
*
*	Load customizer if video post format enabled
*/
$options = get_option('post_formats');

$formats = array('video', 'audio', 'gallery', 'image');

$output = array();

foreach ($formats as $format) {
	$output[] = (@$options[$format]) == 1 ? $format : '';
}

if (in_array('video', $output)) {
	
	//Load customize frontpage video section
	require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-functions/frontpage-video-section.php' );
}
