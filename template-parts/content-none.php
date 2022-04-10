<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tech_Teller
 */
?>
<section class="no-results not-found mx-auto py-2 tech-teller-no-results">
	<div class="container-fluid">
		<div class="row">
			<header>
				<h1 class="strong"><?php esc_html_e( 'Nothing Found', 'tech-teller' ); ?></h1>
			</header><!-- .page-header -->
		</div>
		<div class="row py-2">
			<div class="col-12 page-content">
				<?php
				if (is_home() && current_user_can('publish_posts')) :

					printf(
						'<p>' . wp_kses(
							/* translators: 1: link to WP admin new post page. */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tech-teller' ),
							array(
								'a' => array(
									'href' => array(),
								),
							)
						) . '</p>',
						esc_url( admin_url( 'post-new.php' ) )
					);

				elseif (is_search()) :
					?>
				<div class="row py-2">
					<div class="col-sm-8">
						<p class="center"><?php esc_html_e('Sorry, there is nothing that matches your search.', 'tech-teller'); ?></P>
					</div>
					<div class="col-sm-4">
						<?php get_search_form(); ?>
					</div>
				</div>

  				<header class="info-header tech-teller-heading-bg">
					<h4 class="info-title"><?php esc_html_e( 'You can view our latest articles though.', 'tech-teller' ); ?></h4>
				</header>

		  				<?php $query = new WP_Query(array('post_count' => '5'));
		    				while($query->have_posts()) : $query->the_post();
		  				?>
				            <ul>
				              <li>
				                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				              </li>
				            </ul>
		    			<?php 	
		    				endwhile; 
				else :
						?>

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tech-teller' ); ?></p>
					<?php
					get_search_form();

				endif;
						?>
			</div><!-- .page-content -->
		</div>
	</div>
</section><!-- .no-results -->
