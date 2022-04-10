<?php
/**
 * Template part for displaying gallery post formats
 *
 * @package Tech_Teller
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('py-2 tech-teller-gallery'); ?>>
  <div class="container-fluid p-0">
    <?php
     /**
      * Hook - tech_teller_get_photo_gallery_posts.
      *
      * @hooked tech_teller_get_photo_gallery_posts_action - 10
      */
      do_action( 'tech_teller_get_photo_gallery_posts' ); 
    ?>
  </div>
</div>