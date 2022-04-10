<?php
/*
* The footer for Tech Teller theme
*
* This is the template that displays all of the footer sections and everything up until the end
*
* 
* @package Tech_Teller
*/

 ?>
        <div class="pt-3 tech_teller_footer_container">
          <div class="container-fluid">
            <?php  

              // template for footer first row template
              get_template_part('template-parts/footer/footer', 'first-row');

              /*
              *
              * template for footer social media navbar
              *
              * Hook - tech_teller_footer_social_media_links
              *
              * @hooked tech_teller_footer_social_media_links_action - 10
              */

              do_action( 'tech_teller_footer_social_media_links' );

              // template for footer second row template
              get_template_part('template-parts/footer/footer', 'second-row');

            ?>
          </div>
            <?php  
              /**
              * Hook - tech_teller_scroll_to_top_feature
              *
              * @hooked tech_teller_scroll_to_top_feature_action - 10
              */

              do_action( 'tech_teller_scroll_to_top_feature' );

            ?>
        </div>
      </div> <!-- .site-content -->
    <?php wp_footer(); ?>
  </body>
</html>