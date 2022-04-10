<?php
/*
*
* Functions to be hooked for first row footer widget areas
*
* 
* @package Tech_Teller
*
*/

/*
* Function to display first footer row with four columns layout
*/
if ( ! function_exists( 'tech_teller_main_footer_four_column_layout_action' ) ) :
	
	function tech_teller_main_footer_four_column_layout_action() {

	 	if ( is_active_sidebar( 'footer-widget1' ) ) : ?>
			<div class="col-12 col-sm-6 col-md-3 p-3">
				<?php dynamic_sidebar( 'footer-widget1' ); ?>
			</div>
			<?php endif; ?>

			<!-- Footer widget two -->
			<?php if ( is_active_sidebar( 'footer-widget2' ) ) : ?>
			<div class="col-12 col-sm-6 col-md-3 p-3">
				<?php dynamic_sidebar( 'footer-widget2' ); ?>
			</div>
			<?php endif; ?>

			<!-- Footer widget three -->
			<?php if ( is_active_sidebar( 'footer-widget3' ) ) : ?>
			<div class="col-12 col-sm-6 col-md-3 p-3">
				<?php dynamic_sidebar( 'footer-widget3' ); ?>
			</div>
			<?php endif; ?>

			<!-- Footer widget four -->
			<?php if ( is_active_sidebar( 'footer-widget4' ) ) : ?>
			<div class="col-12 col-sm-6 col-md-3 p-3">
				<?php dynamic_sidebar( 'footer-widget4' ); ?>
			</div>
			<?php 
	    endif; 
	}

endif;
add_action( 'tech_teller_main_footer_four_column_layout', 'tech_teller_main_footer_four_column_layout_action', 10 );

/*
* Function to display first footer row with three columns layout
*/
if ( ! function_exists( 'tech_teller_main_footer_three_column_layout_action' ) ) :
	
	function tech_teller_main_footer_three_column_layout_action() {
		if ( is_active_sidebar( 'footer-widget1' ) ) : ?>
			<div class="col-12 col-sm-6 col-md-4 p-3">
				<?php dynamic_sidebar( 'footer-widget1' ); ?>
			</div>
			<?php endif; ?>

			<!-- Footer widget two -->
			<?php if ( is_active_sidebar( 'footer-widget2' ) ) : ?>
			<div class="col-12 col-sm-6 col-md-4 p-3">
				<?php dynamic_sidebar( 'footer-widget2' ); ?>
			</div>
			<?php endif; ?>

			<!-- Footer widget three -->
			<?php if ( is_active_sidebar( 'footer-widget3' ) ) : ?>
			<div class="col-12 col-sm-6 col-md-4 p-3">
				<?php dynamic_sidebar( 'footer-widget3' ); ?>
			</div>
			<?php 
	    endif; 
	}

endif;
add_action( 'tech_teller_main_footer_three_column_layout', 'tech_teller_main_footer_three_column_layout_action', 10 );


/*
* Function to display first footer row with two columns layout
*/
if ( ! function_exists( 'tech_teller_main_footer_two_column_layout_action' ) ) :
	
	function tech_teller_main_footer_two_column_layout_action() {

		if ( is_active_sidebar( 'footer-widget1' ) ) : 
		 	?>
	      <div class="col-12 col-md-6 p-3">
	        <?php dynamic_sidebar( 'footer-widget1' ); ?>
	      </div>
	    <?php endif; ?>

	    <!-- Footer widget two -->
	    <?php if ( is_active_sidebar( 'footer-widget2' ) ) : ?>
	      <div class="col-12 col-md-6 p-3">
	        <?php dynamic_sidebar( 'footer-widget2' ); ?>
	      </div>
	    <?php 
	    endif; 
	}

endif;
add_action( 'tech_teller_main_footer_two_column_layout', 'tech_teller_main_footer_two_column_layout_action', 10 );


/*
* Function to display first footer row with one column layout
*/
if ( ! function_exists( 'tech_teller_main_footer_one_column_layout_action' ) ) :
	
	function tech_teller_main_footer_one_column_layout_action() {

	     if ( is_active_sidebar( 'footer-widget1' ) ) : ?>
	      <div class="col-12 p-3">
	        <?php dynamic_sidebar( 'footer-widget1' ); ?>
	      </div>
	    <?php 
	    endif; 
	}

endif;
add_action( 'tech_teller_main_footer_one_column_layout', 'tech_teller_main_footer_one_column_layout_action', 10 );