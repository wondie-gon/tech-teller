<?php
/**
 * Template part for displaying single posts.
 *
 * @link wonwosbr@yahoo.com
 *
 * 
 * @package Tech_Teller
 */
// Get defaults for theme customizer
$default = tech_teller_get_default_mods();

// post author meta
$tech_teller_post_author_meta = get_theme_mod( 'tech_teller_enable_post_author_meta', $default['tech_teller_enable_post_author_meta'] );

// post date meta
$tech_teller_post_date_meta = get_theme_mod( 'tech_teller_enable_post_date_meta', $default['tech_teller_enable_post_date_meta'] );

//featured image
$tech_teller_post_featured_image = get_theme_mod( 'tech_teller_enable_post_featured_image', $default['tech_teller_enable_post_featured_image'] );

//post author box
$tech_teller_post_author_box = get_theme_mod( 'tech_teller_enable_post_author_box', $default['tech_teller_enable_post_author_box'] );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'mx-auto' ); ?>>
	<div class="container-fluid">
		<div class="row">
			<header class="entry-header tech-teller-single-heading tech-teller-rounded">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
			<div class="entry-meta">
				<h5 class="post-info p-2">
					<?php

						if ( !tech_teller_posted_by() && !tech_teller_posted_on() ) {
							echo '';
						} else {
							if ( $tech_teller_post_author_meta == true ) :
								tech_teller_posted_by();
							endif;

							if ( $tech_teller_post_author_meta == true && $tech_teller_post_date_meta == true ) : 
							?> 
							| 
							<?php 
								tech_teller_posted_on(); 
							elseif ( $tech_teller_post_author_meta == false && $tech_teller_post_date_meta == true ) :
								tech_teller_posted_on();
							endif;
						}
					
					?>
				</h5>
			</div>
		</div>
		<?php

			/**
			* Hook - tech_teller_post_social_media_share
			*
			* @hooked tech_teller_post_social_media_share_action - 10
			*/

			do_action( 'tech_teller_post_social_media_share' );

		?>
		<div class="row py-2">
			<?php

				if ( $tech_teller_post_featured_image == true ) :
					tech_teller_post_thumbnail();
				endif;

				if ( $tech_teller_post_author_box == true ) :
			?>
			<div class="col-md-4">
				<?php tech_teller_single_post_author_box(); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="row py-2 entry-content">
			<div class="col-12 p-0">
				<?php 
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tech-teller' ),
						'after'  => '</div>',
					) ); 
				?>
			</div>		
		</div>
		<div class="row py-2 entry-footer tech-teller-content-ftr">
			<?php tech_teller_post_footer(); ?>
		</div>
	</div>
</article>
<?php
/**
*
* If woocommerce is activated, do not show related posts of standard posts
* 
* @since 1.0.4
*/
if ( ! is_woocommerce() ) :
	
	/**
	* Related posts of single post
	*
	* Hook - tech_teller_related_post
	*
	* @hooked tech_teller_related_post_action
	*
	* @since 1.0.0
	*/
	do_action( 'tech_teller_related_post', get_the_ID() );
	?>
	<!-- Comment section -->
	<?php  
		 // If comments are open or we have at least one comment, load up the comment template.
	    if ( comments_open() || get_comments_number() ) :
	      comments_template();
	    endif;

endif;
?>
