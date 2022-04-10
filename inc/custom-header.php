<?php
/**
 * Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Tech_Teller
 */

// Template funcion hook for site identity
if ( ! function_exists( 'tech_teller_site_identity_action' ) ) :
    function tech_teller_site_identity_action() {

    	$custom_logo = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'custom-logo' );

          ?>
            <div class="col-12 col-md-5 pt-md-1">
              <?php
              if ( ! display_header_text() ) {

                // if no logo

                if ( ! $custom_logo ) {
                  ?>
                  <h1 class="site-title pt-2">
                    <a class="tt-brand displaying-header-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                      <?php bloginfo( 'name' ); ?>
                    </a>
                  </h1>
                  <?php
                } else {
                ?>
                <div class="row">
                  <div class="col-md-3">
                    <a class="tt-brand_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <img class="site-logo d-block img-fluid" src="<?php echo esc_url( $custom_logo); ?>" alt="<?php bloginfo( 'blogname'); ?>" />
                    </a>
                  </div>
                </div>
                <?php
                  }
              } else {
                // if header text to be displayed
                /**
                * Hook - tech_teller_logo_and_header_texts.
                *
                * @hooked tech_teller_logo_and_header_texts_action - 10
                */
                do_action( 'tech_teller_logo_and_header_texts' );

              }

              ?>
          </div>
          <?php
    }
endif;
add_action( 'tech_teller_site_identity', 'tech_teller_site_identity_action', 10 );

// site logo and heade texts function hook
if ( ! function_exists( 'tech_teller_logo_and_header_texts_action' ) ) :
    function tech_teller_logo_and_header_texts_action() {

      $site_title = get_theme_mod( 'blogname' );

      $site_description = get_theme_mod( 'blogdescription' );

      $custom_logo = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'custom-logo' );

        if ( ! $custom_logo ) :

            // when there is no logo image
              if ( $site_title ) { 
                ?>
                <h1 class="site-title pt-2">
                  <a class="tt-brand displaying-header-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php echo $site_title; ?>
                  </a>
                </h1>
              <?php } else { ?>
                <h1 class="site-title pt-2">
                  <a class="tt-brand displaying-header-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                  </a>
                </h1>
              <?php } 

               if ( $site_description ) { ?>
                  <p class="site-description"><?php echo $site_description; /* WPCS: xss ok. */ ?></p>
              <?php  } else { 
              
                  $tech_teller_site_description = get_bloginfo( 'description', 'display' );
              ?>
                  <p class="site-description"><?php echo $tech_teller_site_description; /* WPCS: xss ok. */ ?></p>
              <?php }

              // when there is logo image
              else: 
              ?>
              <div class="row">
                <div class="col-md-3">
                  <a class="tt-brand_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="site-logo d-block img-fluid" src="<?php echo esc_url( $custom_logo); ?>" alt="<?php bloginfo( 'name'); ?>" />
                  </a>
                </div>
                <?php if ( $site_title ) { ?>
                  <div class="col-md-9">
                    <h1 class="site-title pt-2">
                        <a class="tt-brand displaying-header-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php echo $site_title; ?>
                        </a>
                    </h1>
                  </div>
                <?php  } else { ?>
                    <div class="col-md-9">
                      <h1 class="site-title pt-2">
                          <a class="tt-brand displaying-header-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                              <?php bloginfo( 'name' ); ?>
                          </a>
                      </h1>
                    </div>
                <?php  } 

                 if ( $site_description ) { ?>
                  <div class="col-md-12 pt-md-1">
                        <p class="site-description"><?php echo $site_description; /* WPCS: xss ok. */ ?></p>
                  </div>
                <?php } else { ?>
                  <div class="col-md-12 pt-md-1">
                    <?php
                      $tech_teller_site_description = get_bloginfo( 'description', 'display' );
                          ?>
                        <p class="site-description"><?php echo $tech_teller_site_description; /* WPCS: xss ok. */ ?></p>
                  </div>
                <?php } ?>
              </div>
              <?php

              endif;
    }
endif;
add_action( 'tech_teller_logo_and_header_texts', 'tech_teller_logo_and_header_texts_action', 10 );
/*
* Main header customization
*/
if ( ! function_exists( 'tech_teller_customized_main_header_action' ) ) :
    
    function tech_teller_customized_main_header_action() {

        $tech_teller_custom_header_enabled = get_option( 'custom_header' );

        $tech_teller_header_bgimg_url = wp_get_attachment_image_url( get_theme_mod( 'header_image' ) );

        if ( $tech_teller_custom_header_enabled === true && ! empty($tech_teller_header_bgimg_url) ) {
        	?>

        	<div class="row" style="background: url(<?php echo $tech_teller_header_bgimg_url; ?>) no-repeat scroll top; backgroundsize: 1600px auto;">

        	<?php
        } else {
            ?>

            <div class="row">

            <?php
        }

             /**
              * Hook - tech_teller_site_identity.
              *
              * @hooked tech_teller_site_identity_action - 10
              */
              do_action( 'tech_teller_site_identity' );
              /**
              * Hook - tech_teller_header_social_media_links.
              *
              * @hooked tech_teller_header_social_media_links_action - 10
              */
              do_action( 'tech_teller_header_social_media_links' );
              /**
              * Hook - tech_teller_header_advertisement.
              *
              * @hooked tech_teller_header_advertisement_action - 10
              */
              do_action( 'tech_teller_header_advertisement' );
        ?>
        </div>
        <?php
         /**
          * Hook - tech_teller_responsive_navigation_menu.
          *
          * @hooked tech_teller_responsive_navigation_menu_action - 10
          */
          do_action( 'tech_teller_responsive_navigation_menu' );
    }

endif;
add_action( 'tech_teller_customized_main_header', 'tech_teller_customized_main_header_action', 10 );

