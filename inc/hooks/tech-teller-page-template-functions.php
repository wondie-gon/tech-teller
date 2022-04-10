<?php
/**
 * Theme page template functions and hooks
 *
 * @package Tech_Teller
 *
 * @since 1.0.4
 */
/**
* hooking in functions to display page wrappers
*
* @since 1.0.4	
*/
add_action('tech_teller_get_page', 'tech_teller_content_wrapper_start', 10);
add_action('tech_teller_get_page', 'tech_teller_page_main_content', 20);
add_action('tech_teller_get_page', 'tech_teller_content_wrapper_end', 30);

/**
* wrapper before page content
* @since 1.0.4
*/
if ( ! function_exists( 'tech_teller_content_wrapper_start' ) ) :

	/**
	* before page content
	* Wrap start before page content
	*
	* @since 1.0.4
	* 
	*/
	
	function tech_teller_content_wrapper_start() {

		// get header
		//get_header();

		if ( tech_teller_is_woocommerce_activated() ) {
			$bg_class = 'tech-teller-wc-area';
		} else {
			$bg_class = 'bg_tech_teller_light';
		}
		?>
		<div id="primary" class="content-area py-2 <?php echo esc_attr( $bg_class ); ?>">
		  	<main id="main" class="site-main" role="main">
		    	<div class="container-fluid">
		      		<div class="row">
						<?php
	}

endif;

/**
* main content of page
*
* @since 1.0.4
*/
if ( ! function_exists( 'tech_teller_page_main_content' ) ) :

	/**
	* main page content
	* Getting main content of page
	*
	* @since 1.0.4
	* 
	*/
	function tech_teller_page_main_content() {

		// Get default customization
		$default = tech_teller_get_default_mods();
		
		$tech_teller_column_layout = esc_attr( get_theme_mod( 'tech_teller_default_site_column_layout', $default['tech_teller_default_site_column_layout'] ) );

        if ( $tech_teller_column_layout === 'left-sidebar-layout' ) {
          get_sidebar();
        }
		?>
	        <div class="col-md-8 tt-content">
	          <?php
	          	if ( have_posts() ) :

	                while(have_posts()) : the_post();
	             
	                  get_template_part( 'template-parts/content', 'page' ); 
	                
	                endwhile;
	                /**
	                * Hook - tech_teller_posts_pagination.
	                *
	                * @hooked tech_teller_posts_pagination_action - 10
	                */
	                do_action( 'tech_teller_posts_pagination' );
	            else :

	              echo '<p>' . esc_html__( 'No content found', 'tech-teller' ) . '</P>';

	            endif;
	          ?>
	        </div>
	        <?php 
		if ( empty($tech_teller_column_layout) || $tech_teller_column_layout === 'right-sidebar-layout' ) {
		get_sidebar();
		}
	}

endif;

/**
* wrapper after page content
* @since 1.0.4
*/
if ( ! function_exists( 'tech_teller_content_wrapper_end' ) ) :
	
	/**
	* after page content
	* Wrap end after page content
	*
	* @since 1.0.4
	* 
	*/
	function tech_teller_content_wrapper_end() {
		?>
      				</div> <!-- .row end -->
    			</div> <!-- .container-fluid end -->
  			</main> <!-- #main end -->
		</div> <!-- #primary end -->
		<?php
		//get_footer();
	}

endif;