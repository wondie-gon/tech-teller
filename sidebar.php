<?php
/**
 * Displays the sidebar section
 *
 * @package Tech_Teller
 * @version 1.0.0
 */

$sidebar_class = 'col-md-4 col-sm-12 col-xs-12';
?>
<div class="<?php echo esc_attr( $sidebar_class ); ?>" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>

	<aside id="secondary" class="sidebar-widget-area"> 
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	</aside>
	<?php

	 else :

	 	/*
	 	* if sidebars are not enabled
	 	* categories and archive are displayed
	 	*/
	  	// template for categories side section
	    get_template_part( 'template-parts/sidebar/sidebar', 'categories' );

	    // template for archives side section
	    get_template_part( 'template-parts/sidebar/sidebar', 'archives' );

	 endif;

	  /**
	  * 
	  * Sidebar Advertisement
      * Hook - tech_teller_sidebar_advertisement.
      *
      * Should be enabled and customized to be displayed
      *
      * @hooked tech_teller_sidebar_advertisement_action - 10
      */
      do_action( 'tech_teller_sidebar_advertisement' ); 

	 ?>
</div>