<?php
/**
 *	Template part for displaying frontpage video
 *	 
 *	@package Tech_Teller
 *
 *	Video Post Format
 */
// Get defaults from theme customizer
$default = tech_teller_get_default_mods();

//check if enabled
$front_video_enabled = get_theme_mod( 'tech_teller_enable_front_page_video_section', $default['tech_teller_enable_front_page_video_section'] );

if ( true !== $front_video_enabled ) {

	return;

}

//get category of video section

$front_video_category = absint( get_theme_mod( 'tech_teller_front_page_video_section_category' ) );

$front_video_category = get_category( $front_video_category );

$front_video_category = $front_video_category->slug;

//get layout of video section
$front_video_layout = get_theme_mod( 'tech_teller_layout_front_page_video_section', $default['tech_teller_layout_front_page_video_section'] );
 
//get background for video section gradient
$gradient_bg_color = esc_attr( get_theme_mod( 'tech_teller_front_page_video_section_bg_color', $default['tech_teller_front_page_video_section_bg_color'] ) );

//get foreground for video section gradient
$gradient_fg_color = esc_attr( get_theme_mod( 'tech_teller_front_page_video_section_fg_color', $default['tech_teller_front_page_video_section_fg_color'] ) );

//get layout of video section
$gradient_direction = get_theme_mod( 'tech_teller_front_page_video_section_gradient_direction', $default['tech_teller_front_page_video_section_gradient_direction'] );

//get section heading
$section_heading = get_theme_mod( 'tech_teller_front_page_video_section_heading', $default['tech_teller_front_page_video_section_heading'] );

//get background for heading
$section_heading_bg = esc_attr( get_theme_mod( 'tech_teller_front_page_video_section_heading_bg', $default['tech_teller_front_page_video_section_heading_bg'] ) );

//get color for heading
$section_heading_color = esc_attr( get_theme_mod( 'tech_teller_front_page_video_section_heading_color', $default['tech_teller_front_page_video_section_heading_color'] ) );

// customizing video section background
if ( empty( $gradient_bg_color ) && empty( $gradient_fg_color ) && empty($gradient_direction) ) {
	
	$video_bg_style = '';

} else {

	$video_bg_style = ' style="background: ' . $gradient_bg_color . '; background: -webkit-linear-gradient( ' .  $gradient_direction . ', ' . $gradient_bg_color . ', ' . $gradient_fg_color . '); background: linear-gradient( ' .  $gradient_direction . ', ' . $gradient_bg_color . ', ' . $gradient_fg_color . ');"';

 }

//setting section heading style
if ( $section_heading_bg === '' && $section_heading_color === '' ) {
	
	$section_heading_style = '';

} else {

	$section_heading_style = ' style="color: ' . $section_heading_color . '; background-color: ' . $section_heading_bg . ';"';

}

/**
* Customizing media meta info, category and tag badges
*/
//media author meta
$tech_teller_media_author_meta = get_theme_mod( 'tech_teller_enable_media_posts_author_meta', $default['tech_teller_enable_media_posts_author_meta'] );

//media date meta
$tech_teller_media_date_meta = get_theme_mod( 'tech_teller_enable_media_posts_date_meta', $default['tech_teller_enable_media_posts_date_meta'] );

//media category badge
$tech_teller_media_cat_badge = get_theme_mod( 'tech_teller_enable_media_posts_category_badges', $default['tech_teller_enable_media_posts_category_badges'] );

//media tag badge
$tech_teller_media_tag_badge = get_theme_mod( 'tech_teller_enable_media_posts_tag_badges', $default['tech_teller_enable_media_posts_tag_badges'] );


/**	getting from video post format 
*			or 
*	videos category	
*/
$video_nums = 3;

if ( $front_video_layout === 'col-md-6' ) {
	$video_nums = 2;
} elseif ( $front_video_layout === 'col-md-3' ) {
	$video_nums = 4;
} else {
	$video_nums = 3;
}

$video_args = array(
		'post_type'			=>	'post',
		'posts_per_page'	=>	$video_nums,
		'tax_query' 		=> array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $front_video_category,
			),
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => array( 'post-format-video' ),
			),
		),
	);

$video_posts = new WP_Query($video_args);

if($video_posts->have_posts()) :
?>
<div class="py-3">
	<div class="container-fluid py-2 bg_tech_teller_video"<?php echo $video_bg_style; ?>>
		<h2 class="p-2 video-section-heading"<?php echo $section_heading_style; ?>><?php echo sprintf(esc_html__( '%s', 'tech-teller' ), $section_heading); ?></h2>
		<div class="row video-list">
			<?php while($video_posts->have_posts()) : $video_posts->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($front_video_layout . ' tech-teller-video media_post ttpost-with-attachment'); ?>>
				<div class="card mb-4 mb-md-2 video-container">
					<?php
						if($tech_teller_media_cat_badge == true) { 
							echo tech_teller_post_category();
						} 
					?>
					<div class="tt-content">
						<?php echo tech_teller_display_embedded_media(array( 'video', 'iframe' )); ?>
					</div>

					<div class="card-body tt-video-texts">
						<h2 class="tt-media-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="entry-meta">
							<h4 class="post-info">
								<?php

								if($tech_teller_media_author_meta == true) :
									tech_teller_posted_by();
								endif;

								if($tech_teller_media_author_meta == true && $tech_teller_media_date_meta == true) : 
								?> 
								| 
								<?php 
									tech_teller_posted_on(); 
								elseif($tech_teller_media_author_meta == false && $tech_teller_media_date_meta == true) :
									tech_teller_posted_on();
								endif;
								?>
							</h4>
						</div>
						<?php
				          // adding Social media sharing feature  
				          /**
				          * Hook - tech_teller_media_posts_social_sharing_feature
				          *
				          * @hooked tech_teller_media_posts_social_sharing_feature_action - 10
				          */
				          do_action( 'tech_teller_media_posts_social_sharing_feature' );
				        ?>
				        
					</div>
				</div>
				<?php if($tech_teller_media_tag_badge == true) : ?>
				<div class=justify-content-between entry-footer tech-teller-vid-ftr">
				  <?php tech_teller_post_tags(); ?>
				</div>
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php endif; ?>

