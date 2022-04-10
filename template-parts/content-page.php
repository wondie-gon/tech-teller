<?php
/**
 * Template part for displaying page contents in page.php
 *
 * @link wonwosbr@yahoo.com
 *
 * 
 * @package Tech_Teller
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mx-auto'); ?>>
	<div class="container-fluid">
		<div class="row">
			<header class="entry-header tech-teller-heading-bg">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		</div>
		<div class="row py-2">
			<?php tech_teller_post_thumbnail(); ?>
		</div>
		<div class="row py-2">
			<div class="col-12 entry-content">
				<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading&#60;span class="screen-reader-text"&#62; "%s"&#60;&#47;span&#62;', 'tech-teller' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tech-teller' ),
						'after'  => '</div>',
					) );
				?>
			</div>		
		</div>
	</div> <!-- .container-fluid -->
</article><!-- #post-<?php the_ID(); ?> -->