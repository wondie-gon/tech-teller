<?php
/**
 * Template for displaying content of related post.
 *
 * 
 */
?>
<article class="py-2">
  <div class="container-fluid p-0">
    <?php

      /**
      * Hook - tech_teller_related_posts_of_post.
      *
      * @hooked tech_teller_related_posts_of_post_action - 10
      */  
      do_action('tech_teller_related_posts_of_post');
    ?>
  </div>
</article>