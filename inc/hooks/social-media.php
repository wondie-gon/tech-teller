<?php
/**
* function hooks for Social media links, and share buttons
*
* @package Tech_Teller
*
*/

/** 
*   Function hook for social media links bar at header
*/
if ( ! function_exists( 'tech_teller_header_social_media_links_action' ) ) :

    function tech_teller_header_social_media_links_action() {

        // Get default customization
        $default = tech_teller_get_default_mods();

        // Enable social media link navbar
        $tech_teller_social_media_nav_enabled = get_theme_mod( 'enable_tech_teller_social_media_link_nav', $default['enable_tech_teller_social_media_link_nav'] );

        // Social media navbar at header
        $tech_teller_social_media_at_header = get_theme_mod( 'tech_teller_enable_social_media_on_header', $default['tech_teller_enable_social_media_on_header'] );

        if ( false === $tech_teller_social_media_nav_enabled ) {

            return;

        }


        if ( false !== $tech_teller_social_media_at_header ) :

            $link_to_facebook = get_theme_mod( 'tech_teller_facebook_link_username', $default['tech_teller_facebook_link_username'] );
            $link_to_twitter = get_theme_mod( 'tech_teller_twitter_link_username', $default['tech_teller_twitter_link_username'] );
            $link_to_googleplus = get_theme_mod( 'tech_teller_googleplus_link_username', $default['tech_teller_googleplus_link_username'] );
            $link_to_pinterest = get_theme_mod( 'tech_teller_pinterest_link_username', $default['tech_teller_pinterest_link_username'] );
            $link_to_linkedin = get_theme_mod( 'tech_teller_linkedin_link_username', $default['tech_teller_linkedin_link_username'] );
            $link_to_instagram = get_theme_mod( 'tech_teller_instagram_link_username', $default['tech_teller_instagram_link_username'] );
            $link_to_youtube = get_theme_mod( 'tech_teller_youtube_link_username', $default['tech_teller_youtube_link_username'] );

            ?>
            <div class="col-12 col-md-4 header_social_col">
              <div class="btn-toolbar py-2" role="toolbar" aria-label="Social Media Button Group">

                <?php if ( ! empty($link_to_facebook) ) : ?>
                    <div class="btn-group mx-1 mx-md-2 pb-2" role="group" aria-label="Facebook">
                        <a target="_blank" class="btn btn-tech-teller-circle" href="https://www.facebook.com/<?php echo esc_attr( $link_to_facebook ); ?>">
                            <i class="d-block fab fa-facebook-f"></i>
                        </a>
                    </div>
                <?php

                    endif;

                    // Enabling twitter button
                    if ( ! empty($link_to_twitter) ) :  
                ?>

                    <div class="btn-group mx-1 pb-2" role="group" aria-label="Twitter">
                        <a target="_blank" class="btn btn-tech-teller-circle" href="https://twitter.com/<?php echo esc_attr( $link_to_twitter ); ?>">
                            <i class="d-block fab fa-twitter"></i>
                        </a>
                    </div>

                <?php

                    endif;

                    // Enabling googleplus button
                    if ( ! empty($link_to_googleplus) ) :  
                ?>
                    <div class="btn-group mx-1 pb-2" role="group" aria-label="Google+">
                        <a target="_blank" class="btn btn-tech-teller-circle" href="https://plus.google.com/<?php echo esc_attr( $link_to_googleplus ); ?>">
                            <i class="d-block fab fa-google-plus-g"></i>
                        </a>
                    </div>

                <?php

                    endif;

                    // Enabling pinterest button
                    if ( ! empty($link_to_pinterest) ) :  
                ?>
                    <div class="btn-group mx-1 pb-2" role="group" aria-label="Pinterest">
                        <a target="_blank" class="btn btn-tech-teller-circle" href="https://www.pinterest.com/<?php echo esc_attr( $link_to_pinterest ); ?>">
                            <i class="d-block fab fa-pinterest-p"></i>
                        </a>
                    </div>

                <?php

                    endif;

                    // Enabling linkedin button
                    if ( ! empty($link_to_linkedin) ) :  
                ?>
                    <div class="btn-group mx-1 pb-2" role="group" aria-label="LinkedIn">
                        <a target="_blank" class="btn btn-tech-teller-circle" href="https://www.linkedin.com/in/<?php echo esc_attr( $link_to_linkedin ); ?>">
                            <i class="d-block fab fa-linkedin-in"></i>
                        </a>
                    </div>
                <?php

                    endif;

                    // Enabling instagram button
                    if ( ! empty($link_to_instagram) ) :  
                ?>
                    <div class="btn-group mx-1 pb-2" role="group" aria-label="Instagram">
                        <a target="_blank" class="btn btn-tech-teller-circle" href="https://www.instagram.com/<?php echo esc_attr( $link_to_instagram ); ?>">
                            <i class="d-block fab fa-instagram"></i>
                        </a>
                    </div>
                <?php

                    endif;

                    // Enabling youtube button
                    if ( ! empty($link_to_youtube) ) :
                ?>
                    <div class="btn-group mx-1 pb-2" role="group" aria-label="Youtube">
                        <a target="_blank" class="btn btn-tech-teller-circle" href="https://www.youtube.com/<?php echo esc_attr( $link_to_youtube ); ?>">
                            <i class="d-block fab fa-youtube"></i>
                        </a>
                    </div>
                <?php

                    endif;

                ?>
              </div>
            </div>

    <?php
        endif;
    }

endif;

add_action( 'tech_teller_header_social_media_links', 'tech_teller_header_social_media_links_action', 10 );

/** 
*   Function hook for social media links bar at footer
*/
if ( ! function_exists( 'tech_teller_footer_social_media_links_action' ) ) :

    function tech_teller_footer_social_media_links_action() {

        // Get default customization
        $default = tech_teller_get_default_mods();

        // Get enabler of social media link navbar
        $tech_teller_social_media_nav_enabled = get_theme_mod( 'enable_tech_teller_social_media_link_nav', $default['enable_tech_teller_social_media_link_nav'] );

        // Get enabler of social media navbar at footer
        $tech_teller_social_media_at_footer = get_theme_mod( 'tech_teller_enable_social_media_on_footer', $default['tech_teller_enable_social_media_on_footer'] );

        if ( false === $tech_teller_social_media_nav_enabled ) {

            return;
            
        }

        if ( false !== $tech_teller_social_media_at_footer ) :

            $link_to_facebook = get_theme_mod( 'tech_teller_facebook_link_username', $default['tech_teller_facebook_link_username'] );
            $link_to_twitter = get_theme_mod( 'tech_teller_twitter_link_username', $default['tech_teller_twitter_link_username'] );
            $link_to_googleplus = get_theme_mod( 'tech_teller_googleplus_link_username', $default['tech_teller_googleplus_link_username'] );
            $link_to_pinterest = get_theme_mod( 'tech_teller_pinterest_link_username', $default['tech_teller_pinterest_link_username'] );
            $link_to_linkedin = get_theme_mod( 'tech_teller_linkedin_link_username', $default['tech_teller_linkedin_link_username'] );
            $link_to_instagram = get_theme_mod( 'tech_teller_instagram_link_username', $default['tech_teller_instagram_link_username'] );
            $link_to_youtube = get_theme_mod( 'tech_teller_youtube_link_username', $default['tech_teller_youtube_link_username'] );

            ?>

            <div class="row tech-teller-footer-main footer-social-row">
                <div class="col-12 col-md-6">
                  <div class="btn-toolbar py-3" role="toolbar" aria-label="Social Media Button Group">

                    <?php if ( ! empty($link_to_facebook) ) : ?>
                        <div class="btn-group mx-3 mx-md-2 py-2 py-md-0" role="group" aria-label="Facebook">
                            <a target="_blank" class="btn btn-tech-teller-social" href="https://www.facebook.com/<?php echo esc_attr( $link_to_facebook ); ?>">
                                <i class="d-block fab fa-facebook-f"></i>
                            </a>
                        </div>
                    <?php

                        endif;

                        // Enabling twitter button
                        if ( ! empty($link_to_twitter) ) :  
                    ?>

                        <div class="btn-group mx-3 mx-md-2 py-2 py-md-0" role="group" aria-label="Twitter">
                            <a target="_blank" class="btn btn-tech-teller-social" href="https://twitter.com/<?php echo esc_attr( $link_to_twitter); ?>">
                                <i class="d-block fab fa-twitter"></i>
                            </a>
                        </div>

                    <?php

                        endif;

                        // Enabling googleplus button
                        if ( ! empty($link_to_googleplus) ) :  
                    ?>
                        <div class="btn-group mx-3 mx-md-2 py-2 py-md-0" role="group" aria-label="Google+">
                            <a target="_blank" class="btn btn-tech-teller-social" href="https://plus.google.com/<?php echo esc_attr( $link_to_googleplus); ?>">
                                <i class="d-block fab fa-google-plus-g"></i>
                            </a>
                        </div>

                    <?php

                        endif;

                        // Enabling pinterest button
                        if ( ! empty($link_to_pinterest) ) :  
                    ?>
                        <div class="btn-group mx-3 mx-md-2 py-2 py-md-0" role="group" aria-label="Pinterest">
                            <a target="_blank" class="btn btn-tech-teller-social" href="https://www.pinterest.com/<?php echo esc_attr( $link_to_pinterest); ?>">
                                <i class="d-block fab fa-pinterest-p"></i>
                            </a>
                        </div>

                    <?php

                        endif;

                        // Enabling linkedin button
                        if ( ! empty($link_to_linkedin) ) :  
                    ?>
                        <div class="btn-group mx-3 mx-md-2 py-2 py-md-0" role="group" aria-label="LinkedIn">
                            <a target="_blank" class="btn btn-tech-teller-social" href="https://www.linkedin.com/in/<?php echo esc_attr( $link_to_linkedin); ?>">
                                <i class="d-block fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    <?php

                        endif;

                        // Enabling instagram button
                        if ( ! empty($link_to_instagram) ) :  
                    ?>
                        <div class="btn-group mx-3 mx-md-2 py-2 py-md-0" role="group" aria-label="Instagram">
                            <a target="_blank" class="btn btn-tech-teller-social" href="https://www.instagram.com/<?php echo esc_attr( $link_to_instagram); ?>">
                                <i class="d-block fab fa-instagram"></i>
                            </a>
                        </div>
                    <?php

                        endif;

                        // Enabling youtube button
                        if ( ! empty($link_to_youtube) ) :
                    ?>
                        <div class="btn-group mx-3 mx-md-2 py-2 py-md-0" role="group" aria-label="Youtube">
                            <a target="_blank" class="btn btn-tech-teller-social" href="https://www.youtube.com/<?php echo esc_attr( $link_to_youtube); ?>">
                                <i class="d-block fab fa-youtube"></i>
                            </a>
                        </div>
                    <?php

                        endif;

                    ?>
                  </div>
                </div>
            </div>
    <?php
        endif;
     }

endif;

add_action( 'tech_teller_footer_social_media_links', 'tech_teller_footer_social_media_links_action', 10 );

/** 
*   social media sharing for standard posts
*/
if ( ! function_exists( 'tech_teller_post_social_media_share_action' ) ) :

    function tech_teller_post_social_media_share_action() {

        global $post;

        // Get default customization
        $default = tech_teller_get_default_mods();

        $tech_teller_enable_post_share = get_theme_mod( 'enable_tech_teller_social_media_sharing', $default['enable_tech_teller_social_media_sharing'] );

        if ( false === $tech_teller_enable_post_share ) {

        	return;

        }

        $share_to_facebook = get_theme_mod( 'tech_teller_select_facebook_to_share_post', $default['tech_teller_select_facebook_to_share_post'] );
        $share_to_twitter = get_theme_mod( 'tech_teller_select_twitter_to_share_post', $default['tech_teller_select_twitter_to_share_post'] );
        $share_to_googleplus = get_theme_mod( 'tech_teller_select_googleplus_to_share_post', $default['tech_teller_select_googleplus_to_share_post'] );
        $share_to_pinterest = get_theme_mod( 'tech_teller_select_pinterest_to_share_post', $default['tech_teller_select_pinterest_to_share_post'] );
        $share_to_linkedin = get_theme_mod( 'tech_teller_select_linkedin_to_share_post', $default['tech_teller_select_linkedin_to_share_post'] );

        ?>          
        <div class="row pt-2">
            <div class="col-md-12">
              <ul class="nav nav-pills tech-teller-nav-pills">
                <?php

                    if ( $share_to_facebook != false )  :
                ?>
                    <li class="nav-item tech_teller_social_item"> 
                        <a title="Share on Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&t=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="nav-link social_share_link social_facebook" data-toggle="pill"><i class="d-block fab fa-facebook-f"></i></a> 
                    </li>
                <?php

                    endif;  
                
                    if ( $share_to_twitter != false ) :
                ?>
                    <li class="nav-item tech_teller_social_item"> 
                        <a title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); echo ' Check this out!'; ?>&url=<?php echo get_permalink(); ?>" class="nav-link social_share_link social_twitter" data-toggle="pill"><i class="d-block fab fa-twitter"></i></a> 
                    </li>
                <?php

                    endif;  
                
                    if ( $share_to_googleplus != false ) :
                ?>
                    <li class="nav-item tech_teller_social_item"> 
                        <a title="Share on Google+" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="nav-link social_share_link social_gplus" data-toggle="pill"><i class="d-block fab fa-google-plus-g"></i></a> 
                    </li>
                <?php

                    endif;  
                
                    if ( $share_to_pinterest != false ) :
                ?>
                    <li class="nav-item tech_teller_social_item"> 
                        <a title="Share on Pinterest" href="https://www.pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>&description=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="nav-link social_share_link social_pinterest" data-toggle="pill"><i class="d-block fab fa-pinterest-p"></i></a> 
                    </li>
                <?php

                    endif;  
                
                    if ( $share_to_linkedin != false )  :
                ?>
                    <li class="nav-item tech_teller_social_item"> 
                        <a title="Share on LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>&summary=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="nav-link social_share_link social_linkden" data-toggle="pill"><i class="d-block fab fa-linkedin-in"></i></a> 
                    </li>
                <?php

                    endif;  
                
                ?>
              </ul>
            </div>
        </div>

    <?php

     }

endif;

add_action( 'tech_teller_post_social_media_share', 'tech_teller_post_social_media_share_action', 10 );

/** 
*   Media post's social media sharing feature
*/
if ( ! function_exists( 'tech_teller_media_posts_social_sharing_feature_action' ) ) :

    function tech_teller_media_posts_social_sharing_feature_action() {

        global $post;

        // Get default customization
        $default = tech_teller_get_default_mods();

        $type = get_post_format($post->ID);

        $tech_teller_enable_media_post_share = boolval( get_theme_mod( 'tech_teller_enable_media_posts_social_sharing_feature', $default['tech_teller_enable_media_posts_social_sharing_feature'] ) );

        if ( false != $tech_teller_enable_media_post_share ) :


        $share_to_facebook = boolval( get_theme_mod( 'tech_teller_select_facebook_for_media_posts', $default['tech_teller_select_facebook_for_media_posts'] ) );
        $share_to_twitter = boolval( get_theme_mod( 'tech_teller_select_twitter_for_media_posts', $default['tech_teller_select_twitter_for_media_posts'] ) );
        $share_to_googleplus = boolval( get_theme_mod( 'tech_teller_select_googleplus_for_media_posts', $default['tech_teller_select_googleplus_for_media_posts'] ) );
        $share_to_pinterest = boolval( get_theme_mod( 'tech_teller_select_pinterest_for_media_posts', $default['tech_teller_select_pinterest_for_media_posts'] ) );
        $share_to_linkedin = boolval( get_theme_mod( 'tech_teller_select_linkedin_for_media_posts', $default['tech_teller_select_linkedin_for_media_posts'] ) );
       

        ?>          
        <div class="d-flex justify-content-between align-items-center mt-1 entry-footer">
            <div class="btn-group media-share-btns">
                <button type="button" class="btn btn-tech-teller-share" title="<?php sprintf(esc_html__( 'Share %1$s', 'tech-teller' ), $type); ?>"><i class="fa fa-share"></i></button>

                <div class="media-sharer-group" role="group">
                    <?php
                        if ( $share_to_facebook != false )  :
                    ?> 
                            <a title="Share on Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&t=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-facebook-f"></i></a> 
                    <?php

                        endif;  

                        if ( $share_to_twitter != false ) :
                    ?> 
                            <a title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); echo ' Check this out!'; ?>&url=<?php echo get_permalink(); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-twitter"></i></a> 
                    <?php

                        endif;

                        if ( $share_to_pinterest != false ) :
                    ?> 
                            <a title="Pin" href="https://www.pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo esc_url(tech_teller_display_embedded_media(array($type, 'iframe' ))); ?>&description=<?php get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-pinterest-p"></i></a> 
                    <?php

                        endif;  

                        if ( $share_to_linkedin != false )  :
                    ?> 
                            <a title="Share on LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>&summary=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-linkedin-in"></i></a> 
                    <?php

                        endif;  

                        if ( $share_to_googleplus != false ) :
                    ?> 
                            <a title="Share on Google+" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-google-plus-g"></i></a> 
                    <?php

                        endif;  
                    ?>
                </div>
            </div>
        </div>

    <?php
        endif;
     }

endif;

add_action( 'tech_teller_media_posts_social_sharing_feature', 'tech_teller_media_posts_social_sharing_feature_action', 10 );