<?php
/*
*
* Template part for displaying front page news hero sliders
*
* 
* @package Tech_Teller
*/
// Get default customization
$default = tech_teller_get_default_mods();

$frontslider = get_theme_mod( 'tech_teller_front_slider', $default['tech_teller_front_slider_content'] );

if ( 'disable' === $frontslider ) {
	return;
}

$tech_teller_slider_layout = esc_attr(get_theme_mod( 'tech_teller_layout_front_slider', $default['tech_teller_layout_front_slider'] ));

switch ($tech_teller_slider_layout) {
	case 'excerpt-right-slider':

		/**
		* Hook - tech_teller_front_top_slider_layout_excerpt_right
		*
		* @hooked tech_teller_front_top_slider_layout_excerpt_right_action - 10
		*/

		do_action( 'tech_teller_front_top_slider_layout_excerpt_right' );

		break;

	case 'excerpt-left-slider':
		
		/**
		* Hook - tech_teller_front_top_slider_layout_excerpt_left
		*
		* @hooked tech_teller_front_top_slider_layout_excerpt_left_action - 10
		*/
		
		do_action( 'tech_teller_front_top_slider_layout_excerpt_left' );

		break;

	case 'one-column-slider':
		
		/**
		* Hook - tech_teller_front_top_slider_layout_one_column
		*
		* @hooked tech_teller_front_top_slider_layout_one_column_action - 10
		*/
		
		do_action( 'tech_teller_front_top_slider_layout_one_column' );

		break;
	
	default:

		break;
}

?>
	

<!-- posts for below the first slider -->

<div class="py-0 bg_tech_teller_dark">
    <div class="container-fluid">
		<div class="row">			
			<div class="mx-auto col-md-12">
	          	<div class="row">
	          	<?php

					$slider_cat = absint( get_theme_mod( 'tech_teller_front_slider_category_list' ) );

					$slider_num = absint( get_theme_mod( 'tech_teller_num_of_front_sliders', $default['tech_teller_num_of_front_sliders'] ) );

					$category_for_below_slider = absint( get_theme_mod( 'tech_teller_category_for_post_below_slider' ) );

						if ( $category_for_below_slider == 0  ) {

							return;
						}

						$below_slider_args = array(
						        'posts_per_page'   => 3,
						        'post_type'        => 'post',
						        'cat'				=>	$category_for_below_slider,
						      );

						//if above selected category same with this section
						if ( $category_for_below_slider == $slider_cat ) {
						  $below_slider_args['offset'] = $slider_num;
						}

						$below_slider_posts = new WP_Query($below_slider_args);

						if ( $below_slider_posts->have_posts() ) :  
						    while($below_slider_posts->have_posts()) : $below_slider_posts->the_post();
				?>
		            <div id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-4 p-4' ); ?>>
		              <div class="row">
		                <div class="col-4 p-0"> 
		                  <?php tech_teller_rounded_post_thumbnail_link(); ?>
		                </div>
		                <div class="col-8">
		                	<h1 class="tech-teller-h3">
		                		<a href="<?php the_permalink(); ?>">
			                  		<?php the_title(); ?>
			              		</a>
		                	</h1>	                  
							<h2 class="small post-info"><?php tech_teller_posted_by(); ?> | <?php tech_teller_posted_on(); ?></h2>
							<p class="py-1">
			              		<?php echo tech_teller_post_category(); ?>
			              	</p>
		                </div>
		              </div>
		             
		            </div> <!-- .col-lg-4 -->
		            <?php
							endwhile; 
							wp_reset_postdata();

						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
