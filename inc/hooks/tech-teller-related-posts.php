<?php
/*
*
* Function hooks to related posts under a single post
*
* 
* @package Tech_Teller
*
*/
// related posts heading text
if ( ! function_exists( 'tech_teller_related_posts_heading_text' ) ) :

	function tech_teller_related_posts_heading_text() {

		global $post;

		?>
		<div class="post-header">
        	<h3>
		<?php

		$tech_teller_post_type = get_post_type( $post );

		$tech_teller_post_format = get_post_format( $post->ID );

		 if ( 'post' === get_post_type( $post ) && has_post_format( array( 'standard' ) ) ) {

		 	$heading_text = 'Related Posts';

		
		} else {

			if ( ! has_post_format( array( 'standard' ) ) ) {

				switch ( $tech_teller_post_format ) {

					case 'video':
						$heading_text = 'Related Videos';
						break;
					case 'audio':
						$heading_text = 'Related Audios';
						break;
					default:
						$heading_text = 'Related Posts';
						break;
				}
			} else {
				$heading_text = 'Related Posts';
			}

		}

		echo wp_kses_post( $heading_text,'tech-teller' );

		?>
			</h3>
		</div>
		<?php
	}

endif;

/**
* Function hook for dislaying related posts of post
*/
if ( ! function_exists( 'tech_teller_related_posts_of_post_action' ) ) :

	function tech_teller_related_posts_of_post_action() {

		global $post;

		$orig_post = $post;

		$args = array(
				'post__not_in'			=>	array( $post->ID ),
				'posts_per_page'		=>	4,
				'ignore_sticky_posts'	=>	1,
				);
		// get tags of current single post
		$tech_teller_tags = wp_get_post_tags( $post->ID );

		// get categories of current single post
		$tech_teller_categorries = get_the_category( $post->ID );

		if ( $tech_teller_tags ) {

			$tech_teller_tag_ids = array();

			foreach ( $tech_teller_tags as $tech_teller_tag ) {
				$tech_teller_tag_ids[] = $tech_teller_tag->term_id;
			}

			// include tag in args
			$args['tag__in'] = $tech_teller_tag_ids;

		} else {
			$tech_teller_category_ids = array();

			foreach ( $tech_teller_categorries as $tech_teller_category ) {
				$tech_teller_category_ids[] = $tech_teller_category->term_id;
			}

			// include category in args
			$args['category__in'] = $tech_teller_category_ids;
		}

		// get posts based on the argument above
		$tech_teller_related_posts = new WP_Query( $args );

		if ( $tech_teller_related_posts->have_posts() ) {

			// heading text
			tech_teller_related_posts_heading_text();

			?>
			<div class="row">
			<?php
			while($tech_teller_related_posts->have_posts()) {
				$tech_teller_related_posts->the_post();
				?>
				<div class="col-sm-6 col-md-3 text-center hasImgLinks">
				<?php
					if ( ! has_post_format( array( 'standard' ) ) ) {
						$tech_teller_post_format = get_post_format( $post->ID );

	                	switch ( $tech_teller_post_format ) {
	                		case 'audio':
	                			?>
								<div class="embed-responsive tech-teller-audio">
								<?php
									echo tech_teller_display_embedded_media( array( 'audio', 'iframe' ) );
								?>
								</div>
								<?php
	                			break;

                			case 'video':
	                			?>
								<div class="embed-responsive tech-teller-video">
								<?php
									echo tech_teller_display_embedded_media( array( 'video', 'iframe' ) );
								?>
								</div>
								<?php
	                			break;	                		
	                		default:
	                			echo '';
	                			break;
	                	}

						if ( has_post_thumbnail() ) {
							tech_teller_rounded_post_thumbnail_link();
		                }
	                } else {
	                	if ( has_post_thumbnail() ) {
							tech_teller_rounded_post_thumbnail_link();
		                }
	                }

				?>
					<h2 class="small pt-2 post-info"><?php tech_teller_posted_on(); ?></h2>
					<h3 class="tech-teller-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				</div>
				<?php
			}
			?>
			</div>
			<?php
		}

		$post = $orig_post;

		wp_reset_query();

	}
endif;
add_action( 'tech_teller_related_posts_of_post', 'tech_teller_related_posts_of_post_action', 10 );