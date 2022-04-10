<?php
/**
 * The template to display archive page
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
        <?php if ( have_posts() ) : ?>
        <header class="page-header tech-teller-heading-bg">
          <h1 class="page-title">
            <?php
              if ( is_category() ) {
                single_cat_title();
              } elseif ( is_tag() ) {
                single_tag_title();
              } elseif ( is_author() ) {
                the_post();
                echo '<span>' . esc_html__( 'Posts archive by: ', 'tech-teller' ) . '</span>' . get_the_author();
                rewind_posts();
              } elseif ( is_day() ) {
                echo '<span>' . esc_html__( 'Archives by date: ', 'tech-teller' ) . '</span>' . get_the_date();
              } elseif ( is_month() ) {
                echo '<span>' . esc_html__( 'Archives by month: ', 'tech-teller' ) . '</span>' . get_the_date( 'F Y' );
              } elseif ( is_year() ) {
                echo '<span>' . esc_html__( 'Archives by year: ', 'tech-teller' ) . '</span>' . get_the_date( 'Y' );
              } else {
                the_archive_title();
              }
            ?>
          </h1>
        </header>
        <?php
          while(have_posts()) : the_post();
        
            //get template part for posts
            get_template_part( 'template-parts/content', get_post_format() );

          endwhile;

          //echo paginate_links();

          /**
          * Hook - tech_teller_posts_pagination.
          *
          * @hooked tech_teller_posts_pagination_action - 10
          */
          do_action( 'tech_teller_posts_pagination' );

        else :
          echo '<p>' . esc_html__( 'No content found', 'tech-teller' ) . '</P>';
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
</div><!-- End The main Content archive.php -->
<?php
get_footer();
