<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tech_Teller 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments py-2">

	<?php
	// You can start editing here  including this comment!
	if ( have_comments() ) :
		?>
	<div class="tech-teller-heading-bg">
		<h2 class="comments-title">
			<?php
			$tech_teller_comment_count = get_comments_number();
			if ( '1' === $tech_teller_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'tech-teller' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $tech_teller_comment_count, 'comments title', 'tech-teller' ) ),
					number_format_i18n( $tech_teller_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->
	</div>
	
		<?php the_comments_navigation(); ?>

		<ul class="row comment-list">
			<?php
			wp_list_comments( array(
				'short_ping'	=>	true,
				'avatar_size'	=>	40,
			) );
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, while the post type supoorts comments, leave a note.
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tech-teller' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	// Comment form
	$comments_args = array(
		'label_submit'	=>	__('Send', 'tech-teller'),
		'title_reply'	=>	__('Write your comments below.', 'tech-teller'),
		);
	comment_form( $comments_args );
	?>

</div><!-- #comments -->
