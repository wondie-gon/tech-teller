<?php
/*
* Functions which enhance Tech Teller theme by hooking into WordPress
* 
* @package Tech_Teller
*/

/*
* Checks to see if we're on the homepage or not.
*/
function tech_teller_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/*
* Checks to see if Static Front Page is set to "Your latest posts".
*/
function tech_teller_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/*
* Checks to see if Static Front Page is set to "Posts page".
*/
function tech_teller_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/*
* Checks to see if the current page displays any kind of post listing.
*/
function tech_teller_is_page_displays_posts() {
	return ( tech_teller_is_frontpage_blog() || is_search() || is_archive() || tech_teller_is_latest_posts() );
}

/**
 * Checks to see if page is single post.
 */
function tech_teller_is_single_post() {
	return is_single();
}

/*
* Add a pingback url auto-discovery header for singularly identifiable articles.
*/
function tech_teller_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'tech_teller_pingback_header' );

/**
 * Check if WooCommerce is activated
 *
 * @since 1.0.4
 */
if ( ! function_exists( 'tech_teller_is_woocommerce_activated' ) ) {
	function tech_teller_is_woocommerce_activated() {
		if ( class_exists( 'WooCommerce' ) || in_array( 'woocommerce-page', get_body_class() ) ) { 
			return true; 
		} else { 
			return false; 
		}
	}
}


//Enqueue scripts for custom frontpage

function tech_teller_enqueue_slick_slider_js() {
	
	// Get default customization
	$default = tech_teller_get_default_mods();           

   if ( is_front_page() || is_home() ) :

   		// autoplay speed of top slider
		$speed_of_top_slider = intval( get_theme_mod( 'tech_teller_front_slider_speed', $default['tech_teller_front_slider_speed'] ) );

		// Layout and autoplay speed of infitite slider
		$columns_infinite = intval( get_theme_mod( 'tech_teller_layout_front_infinite_slider', $default['tech_teller_layout_front_infinite_slider'] ) );
		$speed_infinite = intval( get_theme_mod( 'tech_teller_front_infinite_slider_speed', $default['tech_teller_front_infinite_slider_speed'] ) );

		// slick_js
		wp_enqueue_script('slickjs', get_template_directory_uri() . '/assets/js/slick.js', '', '', true);

	    wp_register_script( 'techtellerslicksliders', get_template_directory_uri() . '/assets/js/tech-teller-slick-sliders.js', '', '1.0.0', true );
	    wp_enqueue_script( 'techtellerslicksliders' );

	    wp_localize_script( 'techtellerslicksliders', 'techtellerSlider', array(
	    	'slideSpeedTop'		=>	$speed_of_top_slider,
	    	'sliderNumInf'		=>	$columns_infinite,
	    	'slideSpeedInf'		=>	$speed_infinite,	
	    	));
   endif;
}
add_action( 'wp_enqueue_scripts', 'tech_teller_enqueue_slick_slider_js' );

// Tech Teller pagination
if ( ! function_exists( 'tech_teller_posts_pagination_action' ) ) :

	function tech_teller_posts_pagination_action() {
		?>
		<div class="pagination">
			<?php  
				the_posts_pagination(array(
					'mid_size'				=>	2,
					'prev_text'				=>	esc_html__( 'Previous', 'tech-teller' ),
					'next_text'				=>	esc_html__( 'Next', 'tech-teller' ),
					));
			?>
		</div>
		<?php
	}

endif;
add_action( 'tech_teller_posts_pagination', 'tech_teller_posts_pagination_action', 10 );

// Custom excerpt length for various posts
if ( ! function_exists( 'tech_teller_search_result_excerpt_length' ) ) :

	function tech_teller_search_result_excerpt_length($length) {

		global $post;

		if ( is_search() ) {

			return 25;

		} elseif ( 'post' !== $post->post_type ) {

			return 30;

		} else {

			return 45;

		}

	}

endif;
add_filter( 'excerpt_length', 'tech_teller_search_result_excerpt_length' );

// check if post has more content
if ( ! function_exists( 'tech_teller_post_has_more_content' ) ) :

	function tech_teller_post_has_more_content() {

		// get excerpt and count words
		$tech_teller_excerpt_text = strip_tags( str_replace( array( "\n", "\r" ), ' ', get_the_excerpt() ) );

		$tech_teller_excerpt_words = explode( ' ', $tech_teller_excerpt_text );

		// get all content and count words  
		$tech_teller_content_text = strip_tags( str_replace( array( "\n", "\r" ), ' ', get_the_content() ) );

		$tech_teller_content_words = explode( ' ', $tech_teller_content_text );

		// if num of all content is greater than excerpt
		if ( count($tech_teller_content_words) > count($tech_teller_excerpt_words) ) {
			
			return true;

		}

	}

endif;

// Removing the bracket after excerpt
function tech_teller_custom_excerpt_postfix($more) {

	return '...';
}
add_filter( 'excerpt_more', 'tech_teller_custom_excerpt_postfix' );