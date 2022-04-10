<?php
/**
* Frontpage top slider layout function hooks
* @package Tech_Teller
*/

/*
* Function for layout to display excerpt on the right and image on the left
*/
if ( ! function_exists( 'tech_teller_front_top_slider_layout_excerpt_right_action' ) ) :
	
	function tech_teller_front_top_slider_layout_excerpt_right_action() {

		// Get default customization
		$default = tech_teller_get_default_mods();

		// class for slider image
		$rounded_img_class = array( 'img-fluid d-block tech-teller-rounded slider-img' );

		$frontslider = get_theme_mod( 'tech_teller_front_slider', $default['tech_teller_front_slider_content'] );


		$btn_text = get_theme_mod( 'tech_teller_front_slider_custom_btn', $default['tech_teller_front_slider_custom_btn'] );

		$slider_num = absint( get_theme_mod( 'tech_teller_num_of_front_sliders', $default['tech_teller_num_of_front_sliders'] ) );

		?>
		<div class="py-2 bg_tech_teller_dark">
		    <div class="container-fluid">
		    	<div class="tt-slick-slider">
					<?php
						global $post;

						if ( in_array( $frontslider, array( 'post', 'page' ) ) ) {

							if ( 'post' === $frontslider ) {

								$slider_cat = absint( get_theme_mod( 'tech_teller_front_slider_category_list' ) );

								if ( $slider_cat == 0 ) {
									return;
								} 

								$sliders_args = array(
								  'post_type'			=>	'post',
								  'posts_per_page'		=>	$slider_num,
								  'cat'					=>	$slider_cat,
								  'orderby'       		=>	'date',
								  'order'				=>	'DESC',
								);

								$tech_teller_custom_front_sliders = new WP_Query( $sliders_args );
								
					    		if ( $tech_teller_custom_front_sliders->have_posts() ) :
					    			while ( $tech_teller_custom_front_sliders->have_posts() ) : $tech_teller_custom_front_sliders->the_post();

					?>
									<div id="post-gallery-<?php the_ID(); ?>" <?php post_class( 'slide' ); ?>>
										<div class="row">
										  	<div class="col-md-7">
										  		<?php
										  			if ( has_post_thumbnail() ) :

										  			the_post_thumbnail( 'tech-teller-slider-image', array(
										                'class'	=>	esc_attr( implode( ' ', $rounded_img_class ) ),
										                'alt'	=>	the_title_attribute( array(
										                'echo'	=>	false
										                ) ),
										              ) );  
														
													endif; 
												?>
											</div>
											<div class="col-md-5 slider-excerpt">
											  <div class="row">
											  	<div class="col-12">
											  		<?php echo tech_teller_post_category(); ?>
											  	</div>
											  	<div class="col-12">
											  		<h1 class="slider-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
										    		<div class="entry-excerpt">
														<?php the_excerpt(); ?>
												    </div>
											  	</div>
											  	<div class="col-12">
											  		
												 	<a id="topsection_btn_link" href="<?php the_permalink(); ?>" class="btn btn-tech-teller">
												 		<?php
											 				echo sprintf(esc_html__( '%s &rarr;', 'tech-teller' ), $btn_text); 
											 			?>
											 		</a>												 	
											  	</div>
										      </div>
											</div>
								    	</div>
								    </div>

					<?php
					    			endwhile;
					    			wp_reset_postdata();
								endif; 						  	
						  	} 
						  	
						  	else {

						  		$tech_teller_slider_page_list_array = array();
					                for ( $i = 1; $i <= $slider_num; $i++ ) {
					                    $tech_teller_slider_page_list = get_theme_mod( 'tech_teller_front_slider_page_' . $i );
					                    if ( ! empty($tech_teller_slider_page_list) ) {
					                        $tech_teller_slider_page_list_array[] = absint( $tech_teller_slider_page_list );
					                    }
					                }
				                // return if no valid page was selected
				                if ( empty($tech_teller_slider_page_list_array) ) {
				                    return;
				                }

						  		$sliders_args = array(
								  'post_type'			=>	'page',
								  'posts_per_page'		=>	$slider_num,
								  'post__in'			=>	$tech_teller_slider_page_list_array,
								  'orderby'				=>	'post__in',
							    );

							    $tech_teller_custom_front_sliders = new WP_Query( $sliders_args );

								$i = 1;
					    		if ( $tech_teller_custom_front_sliders->have_posts() ) :
					    			while($tech_teller_custom_front_sliders->have_posts()) : $tech_teller_custom_front_sliders->the_post();
					?>

									<div id="post-gallery-<?php the_ID(); ?>" <?php post_class( 'slide' ); ?>>
										<div class="row">
										  	<div class="col-md-7">
										  		<?php  
										  			// Get custom image for frontpage sliders
						  							$custom_slider_img = wp_get_attachment_image_url( get_theme_mod( 'tech_teller_front_slider_custom_page_image_' . $i ), 'tech-teller-slider-image' );
										  		?>
										  		<?php
										  			if(! empty($custom_slider_img)) :  
										  		?>
										  		<img class="<?php echo esc_attr( implode( ' ', $rounded_img_class) ); ?>" src="<?php echo esc_url($custom_slider_img); ?>">
										  		<?php  
													endif; 
												?>
											</div>
											<div class="col-md-5 slider-excerpt">
											  <div class="row">
											  	<div class="col-12">
											  		<h1 class="slider-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
										    		<div class="entry-excerpt">
														<?php the_excerpt(); ?>
												    </div>
											  	</div>
											  	<div class="col-12">
											  		
												 	<a id="topsection_btn_link" href="<?php the_permalink(); ?>" class="btn btn-tech-teller">
												 		<?php
											 				echo sprintf(esc_html__( '%s &rarr;', 'tech-teller' ), $btn_text); 
											 			?>
											 		</a>
												 	
											  	</div>
										      </div>
											</div>
								    	</div>
								    </div>

					<?php
									$i++;
					    			endwhile;
					    			wp_reset_postdata();
								endif; 

						  	 } 

						} 
					?>
				</div>
			</div>
		</div>
<?php
	} 

endif;
add_action( 'tech_teller_front_top_slider_layout_excerpt_right', 'tech_teller_front_top_slider_layout_excerpt_right_action', 10 );

/*
* Function for layout to display excerpt on the left and image on the right
*/
if ( ! function_exists( 'tech_teller_front_top_slider_layout_excerpt_left_action' ) ) :
	
	function tech_teller_front_top_slider_layout_excerpt_left_action() {

		// Get default customization
		$default = tech_teller_get_default_mods();

		// class for slider image
		$rounded_img_class = array( 'img-fluid d-block tech-teller-rounded slider-img');

		$frontslider = get_theme_mod( 'tech_teller_front_slider', $default['tech_teller_front_slider_content'] );


		$btn_text = get_theme_mod( 'tech_teller_front_slider_custom_btn', $default['tech_teller_front_slider_custom_btn'] );

		$slider_num = absint( get_theme_mod( 'tech_teller_num_of_front_sliders', $default['tech_teller_num_of_front_sliders'] ) );

		?>

		<div class="py-2 bg_tech_teller_dark">
		    <div class="container-fluid">
		    	<div class="tt-slick-slider">
					<?php  
						if ( in_array( $frontslider, array( 'post', 'page' ) ) ) {

							if ( 'post' === $frontslider ) {

								$slider_cat = absint( get_theme_mod( 'tech_teller_front_slider_category_list' ) );

								if ( $slider_cat == 0 ) {
									return;
								} 

								$sliders_args = array(
								  'post_type'			=>	'post',
								  'posts_per_page'		=>	$slider_num,
								  'cat'					=>	$slider_cat,
								  'orderby'       		=>	'date',
								  'order'				=>	'DESC',
								);

								$tech_teller_custom_front_sliders = new WP_Query( $sliders_args );
								
					    		if ( $tech_teller_custom_front_sliders->have_posts() ) :
					    			while($tech_teller_custom_front_sliders->have_posts()) : $tech_teller_custom_front_sliders->the_post();
					?>
									<div id="post-gallery-<?php the_ID(); ?>" <?php post_class( 'slide' ); ?>>
										<div class="row">
										  	<div class="col-md-5 slider-excerpt">
												<div class="row">
												  	<div class="col-12">
												  		<?php echo tech_teller_post_category(); ?>
												  	</div>
												  	<div class="col-12">
												  		<h1 class="slider-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
											    		<div class="entry-excerpt">
															<?php the_excerpt(); ?>
													    </div>
												  	</div>
												  	<div class="col-12">

													 	<a id="topsection_btn_link" href="<?php the_permalink(); ?>" class="btn btn-tech-teller">
													 		<?php
											 					echo sprintf(esc_html__( '%s &rarr;', 'tech-teller' ), $btn_text); 
											 				?>
												 		</a>

												  	</div>
										        </div>
											</div>
											<div class="col-md-7">
										  		<?php
										  			if ( has_post_thumbnail() ) :

										  			the_post_thumbnail( 'tech-teller-slider-image', array(
										                'class'	=>	esc_attr( implode( ' ', $rounded_img_class ) ),
										                'alt'	=>	the_title_attribute( array(
										                'echo'	=>	false
										                ) ),
										              ) );  
														
													endif; 
												?>
											</div>
								    	</div>
								    </div>

					<?php
					    			endwhile;
					    			wp_reset_postdata();
								endif; 						  	
						  	} 
						  	
						  	else {

						  		$tech_teller_slider_page_list_array = array();
					                for ( $i = 1; $i <= $slider_num; $i++ ) {
					                    $tech_teller_slider_page_list = get_theme_mod( 'tech_teller_front_slider_page_' . $i );
					                    if ( ! empty($tech_teller_slider_page_list) ) {
					                        $tech_teller_slider_page_list_array[] = absint( $tech_teller_slider_page_list );
					                    }
					                }
				                // return if no valid page was selected
				                if ( empty($tech_teller_slider_page_list_array) ) {
				                    return;
				                }

						  		$sliders_args = array(
								  'post_type'			=>	'page',
								  'posts_per_page'		=>	$slider_num,
								  'post__in'			=>	$tech_teller_slider_page_list_array,
								  'orderby'				=>	'post__in',
							    );

							    $tech_teller_custom_front_sliders = new WP_Query( $sliders_args );

								$i = 1;
					    		if ( $tech_teller_custom_front_sliders->have_posts() ) :
					    			while($tech_teller_custom_front_sliders->have_posts()) : $tech_teller_custom_front_sliders->the_post();
					?>
									<div id="post-gallery-<?php the_ID(); ?>" <?php post_class( 'slide' ); ?>>
										<div class="row">
										  	<div class="col-md-5 slider-excerpt">
										  		<div class="row">
												  	<div class="col-12">
												  		<h1 class="slider-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
											    		<div class="entry-excerpt">
															<?php the_excerpt(); ?>
													    </div>
												  	</div>
												  	<div class="col-12">

													 	<a id="topsection_btn_link" href="<?php the_permalink(); ?>" class="btn btn-tech-teller">
													 		<?php
											 					echo sprintf(esc_html__( '%s &rarr;', 'tech-teller' ), $btn_text); 
											 				?>
												 		</a>

												  	</div>
										        </div>
											</div>
											<div class="col-md-7">
										      <?php  
										  			// Get custom image for frontpage sliders
						  							$custom_slider_img = wp_get_attachment_image_url( get_theme_mod( 'tech_teller_front_slider_custom_page_image_' . $i ), 'tech-teller-slider-image' );
										  		?>
										  		<?php
										  			if ( ! empty($custom_slider_img) ) :  
										  		?>
										  		<img class="<?php echo esc_attr( implode( ' ', $rounded_img_class) ); ?>" src="<?php echo esc_url($custom_slider_img); ?>">
										  		<?php  
													endif; 
												?>
											</div>
								    	</div>
								    </div>

					<?php
									$i++;
					    			endwhile;
					    			wp_reset_postdata();
								endif; 

						  	 } 

						} 
					?>
				</div>
			</div>
		</div>
<?php
	} 

endif;
add_action( 'tech_teller_front_top_slider_layout_excerpt_left', 'tech_teller_front_top_slider_layout_excerpt_left_action', 10 );


/*
* Function for layout to display slider with image and title overlay in one column
*/
if ( ! function_exists( 'tech_teller_front_top_slider_layout_one_column_action' ) ) :
	
	function tech_teller_front_top_slider_layout_one_column_action() {

		// Get default customization
		$default = tech_teller_get_default_mods();

		// class for slider image
		$rounded_img_class = array( 'img-fluid d-block tech-teller-rounded slider-img');

		$frontslider = get_theme_mod( 'tech_teller_front_slider', $default['tech_teller_front_slider_content'] );


		$btn_text = get_theme_mod( 'tech_teller_front_slider_custom_btn', $default['tech_teller_front_slider_custom_btn'] );

		$slider_num = absint( get_theme_mod( 'tech_teller_num_of_front_sliders', $default['tech_teller_num_of_front_sliders'] ) );

		?>

		<div class="py-2 bg_tech_teller_dark">
		    <div class="container-fluid">
		    	<div class="tt-slick-slider">
					<?php  
						if ( in_array( $frontslider, array( 'post', 'page' ) ) ) {

							if ( 'post' === $frontslider ) {

								$slider_cat = absint( get_theme_mod( 'tech_teller_front_slider_category_list' ) );

								if ( $slider_cat == 0 ) {
									return;
								} 

								$sliders_args = array(
								  'post_type'			=>	'post',
								  'posts_per_page'		=>	$slider_num,
								  'cat'					=>	$slider_cat,
								  'orderby'       		=>	'date',
								  'order'				=>	'DESC',
								);

								$tech_teller_custom_front_sliders = new WP_Query( $sliders_args );
								
					    		if ( $tech_teller_custom_front_sliders->have_posts() ) :
					    			while($tech_teller_custom_front_sliders->have_posts()) : $tech_teller_custom_front_sliders->the_post();
					?>
									<div id="post-gallery-<?php the_ID(); ?>" <?php post_class( 'slide' ); ?>>
										<div class="row">
											<div class="col-12">
												<?php
										  			if ( has_post_thumbnail() ) :

										  			the_post_thumbnail( 'tech-teller-slider-image', array(
										                'class'	=>	esc_attr( implode( ' ', $rounded_img_class ) ),
										                'alt'	=>	the_title_attribute( array(
										                'echo'	=>	false
										                ) ),
										              ) );  
														
													endif; 
												?>
											</div>
											<div class="col-md-6">
										  		<?php echo tech_teller_post_category(); ?>
										  	</div>
										  	<div class="col-md-6">

											 	<a id="topsection_btn_link" href="<?php the_permalink(); ?>" class="btn btn-tech-teller">
											 		<?php
											 			echo sprintf(esc_html__( '%s &rarr;', 'tech-teller' ), $btn_text); 
											 		?>
										 		</a>

										  	</div>
								    	</div>
								    </div>

					<?php
					    			endwhile;
					    			wp_reset_postdata();
								endif; 
						  	
						  	} 
						  	
						  	else {

						  		$tech_teller_slider_page_list_array = array();
					                for ( $i = 1; $i <= $slider_num; $i++ ) {
					                    $tech_teller_slider_page_list = get_theme_mod( 'tech_teller_front_slider_page_' . $i );
					                    if ( ! empty($tech_teller_slider_page_list) ) {
					                        $tech_teller_slider_page_list_array[] = absint( $tech_teller_slider_page_list );
					                    }
					                }
				                // return if no valid page was selected
				                if ( empty($tech_teller_slider_page_list_array) ) {
				                    return;
				                }

						  		$sliders_args = array(
								  'post_type'			=>	'page',
								  'posts_per_page'		=>	$slider_num,
								  'post__in'			=>	$tech_teller_slider_page_list_array,
								  'orderby'				=>	'post__in',
							    );

							    $tech_teller_custom_front_sliders = new WP_Query( $sliders_args );

								$i = 1;
					    		if ( $tech_teller_custom_front_sliders->have_posts() ) :
					    			while($tech_teller_custom_front_sliders->have_posts()) : $tech_teller_custom_front_sliders->the_post();
					?>

									<div id="post-gallery-<?php the_ID(); ?>" <?php post_class( 'slide' ); ?>>
										<div class="row">
											<div class="col-12">
												<?php  
										  			// Get custom image for frontpage sliders
						  							$custom_slider_img = wp_get_attachment_image_url( get_theme_mod( 'tech_teller_front_slider_custom_page_image_' . $i ), 'tech-teller-slider-image' );
										  		?>
										  		<?php
										  			if(! empty($custom_slider_img)) :  
										  		?>
										  		<img class="<?php echo esc_attr( implode( ' ', $rounded_img_class) ); ?>" src="<?php echo esc_url($custom_slider_img); ?>">
										  		<?php  
													endif; 
												?>
											</div>
										  	<div class="col-12">

											 	<a id="topsection_btn_link" href="<?php the_permalink(); ?>" class="btn btn-tech-teller">
											 		<?php
											 			echo sprintf(esc_html__( '%s &rarr;', 'tech-teller' ), $btn_text); 
											 		?>
										 		</a>

										  	</div>						  	
								    	</div>
								    </div>

					<?php
									$i++;
					    			endwhile;
					    			wp_reset_postdata();
								endif; 

						  	 } 

						} 
					?>
				</div>
			</div>
		</div>
<?php
	} 

endif;
add_action( 'tech_teller_front_top_slider_layout_one_column', 'tech_teller_front_top_slider_layout_one_column_action', 10 );