<?php
/**
 * Template part for displaying archive, category posts
 *
 * @package Tech_Teller
 */
// Get defaults for theme customizer
$default = tech_teller_get_default_mods();

// post author meta
$tech_teller_archive_post_author_meta = get_theme_mod( 'tech_teller_enable_archive_posts_author_meta', $default['tech_teller_enable_archive_posts_author_meta'] );

// post date meta
$tech_teller_archive_post_date_meta = get_theme_mod( 'tech_teller_enable_archive_posts_date_meta', $default['tech_teller_enable_archive_posts_date_meta'] );

//featured image
$tech_teller_archive_post_featured_image = get_theme_mod( 'tech_teller_enable_archive_posts_featured_image', $default['tech_teller_enable_archive_posts_featured_image'] );

//post tag badge
$tech_teller_archive_post_tag_badge = get_theme_mod( 'tech_teller_enable_archive_posts_tag_badges', $default['tech_teller_enable_archive_posts_tag_badges'] );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-2' ); ?>>
  <div class="container-fluid p-0">
    <div class="row">
      <?php 
        if ( has_post_thumbnail() && $tech_teller_archive_post_featured_image == true ) :

          tech_teller_post_thumbnail();

          // class for excerpt column
          $tech_teller_excerpt_column_class = array( 'col-lg-7 col-md-8');
        else:

          // class for excerpt column
          $tech_teller_excerpt_column_class = array( 'col-12 px-4');
        endif; 
      ?>
      <div class="<?php print_r(esc_attr( implode( ' ', $tech_teller_excerpt_column_class ) )); ?>">
        <div class="row">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <div class="col-12 p-0">
            <div class="entry-meta">
              <h2 class="small post-info">
                <?php

                  if ( $tech_teller_archive_post_author_meta == true ) :
                    tech_teller_posted_by();
                  endif;

                  if ( $tech_teller_archive_post_author_meta == true && $tech_teller_archive_post_date_meta == true ) : 
                  ?> 
                  | 
                  <?php 
                    tech_teller_posted_on(); 
                  elseif ( $tech_teller_archive_post_author_meta == false && $tech_teller_archive_post_date_meta == true ) :
                    tech_teller_posted_on();
                  endif;
                ?>
              </h2>
            </div>
          </div>
          <div class="entry-content">
            <?php 
              the_excerpt( sprintf(
                wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers */
                  __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tech-teller' ),
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
        <div class="row">
          <a href="<?php the_permalink(); ?>" class="btn btn-tech-teller"><?php _e( 'Continue reading', 'tech-teller' ); ?></a>
        </div>
      </div>
    </div>
    <?php if ( $tech_teller_archive_post_tag_badge == true ) : ?>
    <div class="row tech-teller-content-ftr">
      <?php tech_teller_post_tags(); ?>
    </div>
    <?php endif; ?>
  </div>
</article>