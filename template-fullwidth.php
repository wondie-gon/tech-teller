<?php
/**
 * Template Name: Fullwidth
 *
 * This is the template that displays one column for static pages like privacy policy
 *
 * 
 * @package Tech_Teller
 */

get_header();
?>
<div id="primary" class="content-area py-5 bg_tech_teller_light">
  <main id="main" class="site-main" role="main">
    <div class="container">
      <?php 
      if ( have_posts() ) :
        while(have_posts()) : the_post();
      ?>
      <article class="post page">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
      </article>
      <?php 
        endwhile;
      else :
        echo '<p>' . esc_html__( 'No content found', 'tech-teller' ) . '</P>';
      endif; 
      ?>
    </div>
  </main>
</div><!-- End The main Content -->
<?php
get_footer();