<?php
/**
 * Template part for displaying frontpage featured review
 *
 * 
 * @package Tech_Teller
 */
// Wrapping div class with image background
$featured_thumbnail_wrap_class  = array( 'col-lg-5 col-md-6 order-1 order-lg-2 tech-teller-rounded bg-tech-teller-img' );

// Get default customization
$default = tech_teller_get_default_mods();

$featured_review = get_theme_mod( 'tech_teller_frontpage_featured_review', $default['select_featured_review_post'] );


if ( $featured_review === 'disable' ) {
	return;
}


	// Get custom featured review heading
	$featured_review_heading = get_theme_mod( 'tech_teller_frontpage_featured_review_heading', $default['tech_teller_frontpage_featured_review_heading'] );

	// Get custom featured additional text
	$featured_additional_text = get_theme_mod( 'tech_teller_frontpage_review_additional_text', $default['tech_teller_frontpage_review_additional_text'] );

	// Get custom color for post title
	$review_title_color = get_theme_mod( 'tech_teller_frontpage_review_post_title_color' )?' style="color: ' . esc_attr(get_theme_mod( 'tech_teller_frontpage_review_post_title_color' )) . ';"':'';

	// Get custom btn text
	$featured_custom_btn_txt = get_theme_mod( 'tech_teller_frontpage_review_custom_btn_text', $default['tech_teller_frontpage_review_custom_btn_text'] );

	// Get id of the post
	if ( in_array($featured_review, array( 'post' )) ) {


		// Get custom featured review category
		$featured_review_cat = absint(get_theme_mod( 'tech_teller_front_featured_review_category' ));
		if ( $featured_review_cat == 0  ) {
			return;
		}
	

	// Setting argument for post query
	$featured_review_args = array(
		'post_type'			=>	'post',
		'posts_per_page'	=>	1,
		'cat'				=>	$featured_review_cat,
	);

	$featured_review_post = new WP_Query($featured_review_args);

	if ( $featured_review_post->have_posts() ) :
		while($featured_review_post->have_posts()) : $featured_review_post->the_post();

?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'py-2 bg_tech_teller_light' ); ?>>
		<div class="container-fluid">
		  <div class="row mb-4 mx-0">
		    <div class="col-md-12 pb-4 frontpage-section-heading">
		      <h1 id="featuredReviewHeading" class="p-2 tech-teller-h1"><?php echo sprintf(esc_html__( '%s', 'tech-teller' ), $featured_review_heading); ?></h1>
		    </div>
		  </div>
		  <div class="row mx-0">
		    <div class="col-lg-3 col-md-6 py-md-4 px-4 order-2 order-lg-1 text-lg-right d-flex flex-column justify-content-between">
		      <p class="lead mb-1"><?php echo get_the_excerpt(); ?></p>
		    </div>

		    <?php

	          if ( has_post_thumbnail() ) :

	            $num = 1;

	            $img_size = 'tech-teller-tall-image';

	            $img_url = esc_url(tech_teller_get_attachment($num, $img_size));
	            
	            $featured_bg_style = ' style="background-image: linear-gradient(to bottom, rgba(0, 0, 30, .5), rgba(0, 0, 102, .5)), url(' . $img_url . ');"';

	          else:

	              $featured_bg_style = '';

	          endif;

			?>

		    <div class="<?php echo esc_attr(implode(' ', $featured_thumbnail_wrap_class)); ?>" <?php echo $featured_bg_style; ?>>
		      <h1 class="py-4 featured-review-title"><a class="link-on-img"<?php echo $review_title_color; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		      <?php echo tech_teller_post_category_on_bgimg(); ?>
		    </div>

		    <div class="col-lg-3 col-md-6 py-md-4 px-4 order-3 order-lg-3 d-flex flex-column justify-content-between">
		      <?php tech_teller_single_post_author_box(); ?>
		      <p id="review_extra_text"><?php echo sprintf(esc_html__( '%s', 'tech-teller' ), $featured_additional_text); ?></p>
		  	  <a id="featured_review_link" class="btn btn-tech-teller mt-4 text-left" href="<?php the_permalink(); ?>"><?php echo sprintf(esc_html__( '%s  &rarr;', 'tech-teller' ), $featured_custom_btn_txt); ?></a>
		    </div>
		  </div>
		</div>
	</div>
<?php 
	  endwhile;
	  wp_reset_postdata();
	endif;
	 }


/*
* Posts below frontpage featured review post
*/
// Get custom featured review category
$featured_review_cat = absint(get_theme_mod( 'tech_teller_front_featured_review_category' ));

// category for section below featured review
$below_featured_cat = absint(get_theme_mod( 'tech_teller_category_for_below_featured_review' ));

if ( $below_featured_cat == 0 ) {
	return;
}

$tech_teller_below_featured_args = array(
        'post_type'			=>	'post',
		'posts_per_page'	=>	4,
		'cat'				=>	$below_featured_cat,
      );

//if the above selected category is similar to this
if ( $below_featured_cat == $featured_review_cat ) {
	$tech_teller_below_featured_args['offset'] = 1;
}

$tech_teller_below_featured_posts = new WP_Query($tech_teller_below_featured_args);

?>

<div class="py-3 bg_tech_teller_light">
  <div class="container-fluid">
    <div class="row">
	  <?php 

	  if ( $tech_teller_below_featured_posts->have_posts() ) :  
	    while($tech_teller_below_featured_posts->have_posts()) : $tech_teller_below_featured_posts->the_post();
                      
	  ?>
    <div class="col-xs-12 col-sm-6 col-md-3 hasImgLinks">
      <?php tech_teller_rounded_post_thumbnail_link(); ?>
      <h2 class="small post-info pt-2"><?php tech_teller_posted_by(); ?> | <?php tech_teller_posted_on(); ?></h2>
      <h1 class="tech-teller-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </div>                
      <?php
          endwhile; 
        wp_reset_postdata();

        endif;
      ?>
    </div>
  </div>
</div>