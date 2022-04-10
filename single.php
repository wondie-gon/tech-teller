<?php
/**
 * The template file for single post
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
      <?php 
        if ( 'gallery' == get_post_format() ) {
          /**
          * Hook - tech_teller_get_photo_gallery_single.
          *
          * @hooked tech_teller_get_photo_gallery_single_action - 10
          */
          do_action( 'tech_teller_get_photo_gallery_single' );
        } else {
      ?>
      <div class="row">
      <?php  

        $tech_teller_column_layout = esc_attr( get_theme_mod( 'tech_teller_default_site_column_layout', $default['tech_teller_default_site_column_layout'] ) );

        if ( $tech_teller_column_layout === 'left-sidebar-layout' ) {
          get_sidebar();
        }

      ?>
        <div class="col-md-8 tt-content">
          <?php 
            if ( have_posts() ) :  
              while(have_posts()) : the_post();
           
                get_template_part( 'template-parts/content', 'single' );
              
              endwhile; 
            endif;
          ?>
        </div>
        <?php 
          if ( empty($tech_teller_column_layout) || $tech_teller_column_layout === 'right-sidebar-layout' ) {
            get_sidebar();
          }
        ?>
      </div>
      <?php } ?>
    </div>
  </main>
</div><!-- End The main Content -->
<?php
get_footer();
