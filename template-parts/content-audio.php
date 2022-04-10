<?php
/**
 * Template part for displaying audio post formats
 *
 * @package Tech_Teller
 */
// Get defaults from theme customizer
$default = tech_teller_get_default_mods();

// post author meta
$tech_teller_post_author_meta = get_theme_mod( 'tech_teller_enable_post_author_meta', $default['tech_teller_enable_post_author_meta'] );

// post date meta
$tech_teller_post_date_meta = get_theme_mod( 'tech_teller_enable_post_date_meta', $default['tech_teller_enable_post_date_meta'] );

//post author box
$tech_teller_post_author_box = get_theme_mod( 'tech_teller_enable_post_author_box', $default['tech_teller_enable_post_author_box'] );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-2' ); ?>>
  <div class="container-fluid p-0">
    <div class="row mx-auto">
      <?php 
        if ( has_post_format( 'audio' ) ) :
		?>
		<div class="col-lg-5 col-md-4">
			<div class="embed-responsive tech-teller-audio">
			<?php
			  echo tech_teller_display_embedded_media( array( 'audio', 'iframe' ) );
			?>
			</div>
		</div>
		<?php
        endif; 
      ?>
      <div class="col-lg-7 col-md-8">
        <div class="row">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <div class="col-12 p-0">
            <div class="entry-meta">
              <h2 class="small post-info">
                <?php

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
                ?>
              </h2>
            </div>
          </div>
          <div class="entry-excerpt">
            <?php the_excerpt(); ?>
          </div>
        </div>
        <div class="row">
          <a href="<?php the_permalink(); ?>" class="btn btn-tech-teller"><?php _e( 'Continue Reading', 'tech-teller' ); ?></a>
        </div>
      </div>
    </div>
    
    <div class="row py-2 tech-teller-content-ftr">
      <?php tech_teller_post_tags(); ?>
    </div>
  
  </div>
</article>