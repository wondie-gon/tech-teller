<?php
/**  
* Function hooks for advertisement
* @package Tech_Teller
*/

/*  
* Header advertisement hook
*/
if ( ! function_exists( 'tech_teller_header_advertisement_action' ) ) :
    function tech_teller_header_advertisement_action() {

        // Get default customization
        $default = tech_teller_get_default_mods();

        $tech_teller_header_ad = get_theme_mod( 'post_tech_teller_header_custom_advertisement', $default['post_tech_teller_header_custom_advertisement'] );

        if ( false === $tech_teller_header_ad ) {
            return;
        }

        //get heading
        $tech_teller_ad_heading = get_theme_mod( 'tech_teller_header_custom_ad_heading', $default['tech_teller_header_custom_ad_heading'] );
        // get image of custom header image
        $tech_teller_ad_img = wp_get_attachment_image_url( get_theme_mod( 'tech_teller_header_ad_post_image' ) );

        // get link for the header ad
        $tech_teller_ad_link = get_theme_mod( 'tech_teller_header_ad_post_link', $default['tech_teller_header_ad_post_link'] );
        ?>
            <div class="col-md-3 header_ad_col text-right">
                <?php if ( ! empty($tech_teller_ad_heading) ) : ?>
                  <h5 class="header_ad_heading py-0"><a href="<?php echo $tech_teller_ad_link; ?>"><?php echo $tech_teller_ad_heading;  ?></a></h5>
                <?php endif; ?>
                  <a href="<?php echo $tech_teller_ad_link; ?>" target="_blank">
                      <img src="<?php echo $tech_teller_ad_img; ?>">
                  </a>
            </div>
        <?php
        
    }
endif;
add_action( 'tech_teller_header_advertisement', 'tech_teller_header_advertisement_action', 10 );


/*  
* Sidebar advertisement
*/
if ( ! function_exists( 'tech_teller_sidebar_advertisement_action' ) ) {
    function tech_teller_sidebar_advertisement_action() {

        // Get default customization
        $default = tech_teller_get_default_mods();
        
        $tech_teller_sidebar_ad = get_theme_mod( 'post_tech_teller_sidebar_custom_advertisement', $default['post_tech_teller_sidebar_custom_advertisement'] ); 

        //get heading
        $tech_teller_side_ad_heading = get_theme_mod( 'tech_teller_sidebar_custom_ad_heading', $default['tech_teller_sidebar_custom_ad_heading'] );
        //get text
        $tech_teller_side_ad_text = get_theme_mod( 'tech_teller_sidebar_custom_ad_text', $default['tech_teller_sidebar_custom_ad_text'] );
        //get button text
        $tech_teller_side_ad_btn_text = get_theme_mod( 'tech_teller_sidebar_custom_ad_btn_text', $default['tech_teller_sidebar_custom_ad_btn_text'] );
        // get image of custom sidebar image
        $side_ad_img = wp_get_attachment_image_url( get_theme_mod( 'tech_teller_sidebar_ad_post_image' ) );

        // get link for the sidebar ad
        $tech_teller_side_ad_link = get_theme_mod( 'tech_teller_sidebar_ad_post_link', $default['tech_teller_sidebar_ad_post_link'] );

        if ( false == $tech_teller_sidebar_ad ) {
            return;
        }
        ?>

            <div class="sidebar_ad_sec tech-teller-rounded my-2 text-center" style="background-image: url( '<?php echo $side_ad_img; ?>' ); background-size: cover; background-repeat: no-repeat; background-position: center;">
                <?php if ( ! empty($tech_teller_side_ad_heading) ) { ?>
                    <h2 class="sidebar_ad_heading p-2"><a href="<?php echo $tech_teller_side_ad_link; ?>"><?php echo $tech_teller_side_ad_heading;  ?></a></h2>
                <?php } ?>
                <?php
                if ( ! empty($tech_teller_side_ad_text) ) {
                ?>
                    <p class="side_ad_text lead"><?php echo $tech_teller_side_ad_text ?></p>
                <?php
                  }

                    if ( ! empty($tech_teller_side_ad_btn_text) ) { 
                ?>
                        <a class="btn btn-tech-teller-ad" href="<?php echo $tech_teller_side_ad_link; ?>" target="_blank">
                            <?php echo $tech_teller_side_ad_btn_text; ?>
                        </a>
                <?php 
                    } 
                ?>
            </div>

        <?php
        
    }
}
add_action( 'tech_teller_sidebar_advertisement', 'tech_teller_sidebar_advertisement_action', 10 );
