<?php
/**
 * WooCommerce Template Functions.
 *
 * @package Tech_Teller
 *
 * @since 1.0.4
 */

/**
*
* Woocommerce theme supports
* 
* @since 1.0.4
*/
if ( ! function_exists('tech_teller_adding_woocommerce_support') ) {

	function tech_teller_adding_woocommerce_support() {

		// theme supports to make Tech Teller WooCommerce compatible

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}

}

/**
*
* Enqueueing style sheets for woocommerce pages
*
* @since 1.0.4
*/
if ( ! function_exists('tech_teller_woocommerce_style') ) :

	function tech_teller_woocommerce_style() {

		/**
		*
		* style for woocommerce pages
		*
		* @since 1.0.4
		*/

		if ( tech_teller_is_woocommerce_activated() || is_woocommerce() ) {
	
			wp_enqueue_style( 'woocommercestyle', get_template_directory_uri() . '/inc/woocommerce/css/tech-teller-woocommerce.css', '', '1.0.0' );

		} 

		// style for product, product tag and category pages
		if ( is_product() || is_product_tag() || is_product_category() ) {

			wp_enqueue_style( 'woocommercestyleproduct', get_template_directory_uri() . '/inc/woocommerce/css/tech-teller-woocommerce-product.css', '', '1.0.0' );

		} 

		// style for cart and checkout pages
		if ( is_cart() || is_checkout() ) {

			wp_enqueue_style( 'woocartcheckoutstyle', get_template_directory_uri() . '/inc/woocommerce/css/tech-teller-woocommerce-cart-checkout.css', '', '1.0.0' );

		}

	}

endif;

/**
*
* Add class to woocommerce body
*
* @since 1.0.4
*/

function tech_teller_woocommerce_body_class( $classes ) {

	if ( is_woocommerce() || is_shop() || is_product_category() || is_product_tag() || is_product() ) {

		$classes[] = 'tech-teller-woocommerce';


	} else {
		if ( is_cart() ) {

			$classes[] = 'tech-teller-woocommerce-cart';

		} elseif ( is_checkout() ) {

			$classes[] = 'tech-teller-woocommerce-checkout';

		}
	}
	
	return $classes;
}

// wrapper before WooCommerce content
if ( ! function_exists( 'tech_teller_woocommerce_content_wrapper_start' ) ) :

	/**
	* before WooCommerce content
	* Wrap start before WooCommerce content
	*
	* @since 1.0.4
	* 
	*/
	function tech_teller_woocommerce_content_wrapper_start() {

		// get the header
		//get_header();
		?>
		<div id="primary" class="content-area py-2 tech-teller-wc-area">
		  	<main id="main" class="site-main" role="main">
		    	<div class="container-fluid">
		      		<div class="row">
						<?php

	}

endif;

// theme before woocommerce main content

if ( ! function_exists( 'tech_teller_woocommerce_before_main_content' ) ) : 

	function tech_teller_woocommerce_before_main_content() {

		
		// Get default customization
		$default = tech_teller_get_default_mods();
		
		$tech_teller_column_layout = esc_attr( get_theme_mod( 'tech_teller_default_site_column_layout', $default['tech_teller_default_site_column_layout'] ) );

        if ( $tech_teller_column_layout === 'left-sidebar-layout' ) {
          get_sidebar();
        }
		?>
	        <div class="col-md-8 tt-content">
	          <?php

	}

endif;


// theme after main woocommerce content

if ( ! function_exists( 'tech_teller_woocommerce_after_main_content' ) ) : 

	function tech_teller_woocommerce_after_main_content() {

		
		// Get default customization
		$default = tech_teller_get_default_mods();
		
		$tech_teller_column_layout = esc_attr( get_theme_mod( 'tech_teller_default_site_column_layout', $default['tech_teller_default_site_column_layout'] ) );
		?>
	        </div>
	          <?php
	    if ( empty($tech_teller_column_layout) || $tech_teller_column_layout === 'right-sidebar-layout' ) {
		get_sidebar();
		}
	}

endif;



// wrapper after WooCommerce content
if ( ! function_exists( 'tech_teller_woocommerce_content_wrapper_end' ) ) :
	
	/**
	* after WooCommerce content
	* Wrap end after WooCommerce content
	*
	* @since 1.0.4
	* 
	*/
	function tech_teller_woocommerce_content_wrapper_end() {
		?>
      				</div> <!-- .row end -->
    			</div> <!-- .container-fluid end -->
  			</main> <!-- #main end -->
		</div> <!-- #primary end -->
		<?php
		// get footer
		//get_footer();
	}

endif;
/**
*
* changing woocommerce default separator of breadcrumb
*
* @since 1.0.4
*/
add_filter( 'woocommerce_breadcrumb_defaults', 'tech_teller_change_wc_breadcrumb_separator' );
if ( ! function_exists( 'tech_teller_change_wc_breadcrumb_separator' ) ) :

	function tech_teller_change_wc_breadcrumb_separator( $defaults ) {

		$defaults['delimiter'] = ' &gt; ';

		return $defaults;
	}

endif;

/**
*
* woocommerce renaming product description tab title
*
* @since 1.0.4
*/

if ( ! function_exists('tech_teller_woocommerce_product_tabs_description') ) {
	
	function tech_teller_woocommerce_product_tabs_description( $tabs ) {

		$tabs['description']['title'] = __('About Product', 'tech-teller');

		return $tabs;
	}

}
/*
if ( ! function_exists('tech_teller_product_review_callback') ) {
	
	function tech_teller_product_review_callback() {



	}

}
*/