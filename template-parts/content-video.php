<?php
/**
 * Template part for displaying video post formats
 *
 * @package Tech_Teller
 */
// Get defaults from theme customizer
$default = tech_teller_get_default_mods();

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

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-2 media_post' ); ?>>
  <div class="container-fluid p-0">
    <div class="row pt-4">
      <?php 
        if ( has_post_format( 'video' ) ) :
		  ?>
  		<div class="col-lg-5 col-md-4 py-2 ttpost-with-attachment">
  			<div class="embed-responsive tech-teller-video">
  			<?php
  			  echo tech_teller_display_embedded_media(array( 'video', 'iframe' ));
  			?>
  			</div>
        <?php
          if ( $tech_teller_media_cat_badge == true ) { 
            echo tech_teller_post_category();
          }  
        
          // adding Social media sharing feature  
          /**
          * Hook - tech_teller_media_posts_social_sharing_feature
          *
          * @hooked tech_teller_media_posts_social_sharing_feature_action - 10
          */
          do_action( 'tech_teller_media_posts_social_sharing_feature' );
        ?>
  		</div>
  		<?php
        endif; 
      ?>
      <div class="col-lg-7 col-md-8 pl-4 justify-content-center">
        <div class="row">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <div class="col-12 p-0">
            <div class="entry-meta">
              <h2 class="small post-info">
                <?php

                  if ( $tech_teller_media_author_meta == true ) :
                    tech_teller_posted_by();
                  endif;

                  if ( $tech_teller_media_author_meta == true && $tech_teller_media_date_meta == true ) : 
                  ?> 
                  | 
                  <?php 
                    tech_teller_posted_on(); 
                  elseif ( $tech_teller_media_author_meta == false && $tech_teller_media_date_meta == true ) :
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
          <div class="row ml-2">
            <a href="<?php the_permalink(); ?>" class="btn btn-tech-teller"><?php echo esc_html__( 'View Full', 'tech-teller' ); ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-2 tech-teller-content-ftr">
      <?php  
        if (is_single()) {
          tech_teller_post_footer();
        } else {
      ?>
      <div class="col-12 col-md-6">
        <?php
          if ( $tech_teller_media_tag_badge == true ) { 
            tech_teller_post_tags();
          }  
        ?>
      </div>  
      <?php } ?>
    </div>
  
  </div>
</article>