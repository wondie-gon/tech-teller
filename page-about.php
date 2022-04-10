<?php
/**
 * The template for about us page
 *
 * 
 * @package Tech_Teller
 */

get_header();
?>
<div id="primary" class="content-area py-2 bg_tech_teller_light">
  <main id="main" class="site-main" role="main">
    <div class="container-fluid">
      <?php 
        if( have_posts() ) :
          while(have_posts()) : the_post();
      ?>
      <div class="row">
        <div class="col-12">
          <header class="page-header tech-teller-heading-bg">
            <h1 class="page-title"><?php the_title(); ?></h1>
          </header>
        </div>
      </div>
      <div class="row">
        <div class="col-12 py-2">
        <?php
            the_content(); 
            endwhile;
          else :
            echo '<p>' . esc_html__( 'No content found', 'tech-teller' ) . '</P>';
          endif; 
        ?>
        </div>
      </div> 
    </div>
  </main>
</div><!-- End The main Content -->
<?php
get_footer();
