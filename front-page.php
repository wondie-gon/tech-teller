<?php
/**
 * The front page template file
 *
 * 
 * @package Tech_Teller
 */
get_header();

// Get defaults from theme customizer
$default = tech_teller_get_default_mods();

$front_page_sections_sequence = array();
/**
* Check if sections enabled
* and add to front-page
*/
//adding top slider
$front_top_slider = get_theme_mod( 'tech_teller_front_slider', $default['tech_teller_front_slider_content'] );

if ( 'disable' !== $front_top_slider ) {
  $front_page_sections_sequence[0] = 'frontpage-top-slider';
}

//adding featured review
$front_featured_review = get_theme_mod( 'tech_teller_frontpage_featured_review', $default['select_featured_review_post'] );

if ( 'disable' !== $front_featured_review ) {
  $front_page_sections_sequence[1] = 'frontpage-featured-reviews';
}

//adding featured blog
$front_featured_blog = get_theme_mod( 'tech_teller_frontpage_featured_blog', $default['tech_teller_frontpage_select_featured_blog'] );

if ( 'disable' !== $front_featured_blog ) {
  $front_page_sections_sequence[2] = 'frontpage-blog-posts';
}

//adding bottom slider section
$front_bottom_slider = get_theme_mod( 'tech_teller_front_infinite_slider', $default['tech_teller_enable_front_infinite_slider'] );

if (true === $front_bottom_slider ) {
  $front_page_sections_sequence[3] = 'frontpage-infinite-slider';
}

//adding video section
$front_video_section = get_theme_mod( 'tech_teller_enable_front_page_video_section', $default['tech_teller_enable_front_page_video_section'] );

if ( true === $front_video_section ) {
  $front_page_sections_sequence[4] = 'frontpage-video';
}
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <?php
      if ( tech_teller_is_frontpage_blog() || empty( $front_page_sections_sequence ) ) {
      ?>
        <div class="container-fluid">
            <div class="row">
            <?php  
              $tech_teller_column_layout = esc_attr(get_theme_mod( 'tech_teller_default_site_column_layout', $default['tech_teller_default_site_column_layout'] ));

              if ( $tech_teller_column_layout === 'left-sidebar-layout' ) {
                get_sidebar();
              }
            ?>
              <div class="col-md-8 tt-content">
              <?php 
              if ( have_posts() ) :
                if ( is_home() && ! is_front_page() ) :
                ?>

                  <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                  </header>

                  <?php

                endif;

                while(have_posts()) :

                  the_post();

                  get_template_part( 'template-parts/content', get_post_format() );

                  endwhile;

                  /**
                  * Hook - tech_teller_posts_pagination.
                  *
                  * @hooked tech_teller_posts_pagination_action - 10
                  */
                  do_action( 'tech_teller_posts_pagination' );

                else :

                  get_template_part( 'template-parts/content', 'none' );

                endif;
              ?>
              </div>
              <?php 
                if ( empty($tech_teller_column_layout) || $tech_teller_column_layout === 'right-sidebar-layout' ) {
                  get_sidebar();
                }
              ?>
            </div>
          </div>
        <?php
        
      } elseif ( tech_teller_is_frontpage() || tech_teller_is_latest_posts() ) {

            foreach( $front_page_sections_sequence as $front_page_section ) {
              get_template_part( 'frontpage-parts/' . $front_page_section );
            }
        
      } 
      ?>
    </main>
  </div> <!-- #primary -->
<?php 
get_footer(); 
?>   

