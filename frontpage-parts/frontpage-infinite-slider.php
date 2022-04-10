<?php
/**
 * Template part for displaying frontpage bottom infinite auto slider
 *
 * 
 * @package Tech_Teller
 */

// Get default customization
$default = tech_teller_get_default_mods();

// class for slider image
$tech_teller_slider_img_class = array( 'img-fluid d-block' );

$tech_teller_continous_slider = get_theme_mod( 'tech_teller_front_infinite_slider', $default['tech_teller_enable_front_infinite_slider'] );

// Get slider category
$tech_teller_continous_slider_cat = esc_attr( get_theme_mod( 'tech_teller_front_infinite_slider_category' ) );

//background color
$slider_section_bgcolor = esc_attr( get_theme_mod( 'tech_teller_front_infinite_slider_section_bg', $default['tech_teller_front_infinite_slider_section_bg'] ) );

// section heading txt
$slider_heading = get_theme_mod( 'tech_teller_front_infinite_slider_heading', $default['tech_teller_front_infinite_slider_heading'] );
 
if ( $tech_teller_continous_slider === false && $tech_teller_continous_slider_cat == 0 ) {
	return;
}


$args = array(
		'post_type' 		=>	'post',
		'posts_per_page'	=>	12,
		'category'			=>	$tech_teller_continous_slider_cat,
		'orderby' 			=>	'date',
		'order' 			=>	'DESC',
	);


//get posts
$slider_posts = get_posts( $args );

if ( $slider_posts ) :

	if ( ! empty($slider_heading) ) : 

		$slider_heading_color = esc_attr( get_theme_mod( 'tech_teller_front_infinite_slider_heading_color', $default['tech_teller_front_infinite_slider_heading_color'] ) );
		  			
?>
<div class="py-3">
	<div class="container-fluid">
		<div class="row mb-2 mx-0">
			<div class="col-12 pb-4 frontpage-section-heading">
				<h1 id="infinite_slider_header" class="p-2 tech-teller-h1" style="color: <?php echo $slider_heading_color; ?>;"><?php echo sprintf(esc_html__( '%s', 'tech-teller' ), $slider_heading); ?></h1>
			</div>	
		</div>
	</div>
</div>
<?php endif; ?>
<div class="py-3 infinite_slider_wrapper" style="background-color: <?php echo $slider_section_bgcolor; ?>;">
    <div class="container">
		<div class="row tt-continous-slider slider mx-0">
			<?php foreach($slider_posts as $post) : setup_postdata( $post ); ?>
				<div id="tech-slide-<?php the_ID(); ?>" <?php post_class( 'col-12 px-0 tech-teller-slick-inner' ); ?>>

				<?php

					// slider image
					if ( has_post_thumbnail() ) :

			  			the_post_thumbnail( 'tech-teller-smaller-image', array(
			                'class' => esc_attr( implode( ' ', $tech_teller_slider_img_class ) ),
			                'alt' => the_title_attribute( array(
			                'echo' => false
			                ) ),
			              ) );

					endif;

					// Slider title color

					$slider_title_color = esc_attr( get_theme_mod( 'tech_teller_front_infinite_slider_title_color', $default['tech_teller_front_infinite_slider_title_color'] ) );
					  
				?>
					<h1 class="slider-overlay-title tech-teller-rounded"><a href="<?php the_permalink(); ?>" style="color: <?php echo $slider_title_color; ?>;"><?php the_title(); ?></a></h1>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
</div>
<?php
	  wp_reset_postdata();
	endif;  
?>
