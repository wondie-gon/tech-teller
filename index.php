<?php
/**
 * The main template index page
 *
 * 
 * @package Tech_Teller
 */

get_header();

// Get default customization
$default = tech_teller_get_default_mods();
        
?>
<div id="primary" class="content-area py-2 bg_tech_teller_light">
  <main id="main" class="site-main" role="main">
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
  </main>
</div><!-- End The main Content index.php -->
<?php
get_footer();
