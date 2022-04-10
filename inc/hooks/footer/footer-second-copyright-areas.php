<?php
/*
*
* Functions to be hooked for bottom row footer widget areas
*
* 
* @package Tech_Teller
*
*/

/*
* Function hook to display bottom footer row layout
*/
if ( ! function_exists( 'tech_teller_bottom_extra_footer_action' ) ) :

	function tech_teller_bottom_extra_footer_action() {

		$tech_teller_footer_page_link_1 = get_theme_mod( 'tech_teller_extra_bottom_footer_page_link_1' );

		$tech_teller_footer_page_link_2 = get_theme_mod( 'tech_teller_extra_bottom_footer_page_link_2' );

		if ( ! empty($tech_teller_footer_page_link_1) ) :

            $tech_teller_footer_page_link_1 = absint( $tech_teller_footer_page_link_1 );

            ?>

            <div class="col-lg-4 col-6">
		      <p class="mb-0 mt-2"><a href="<?php echo get_permalink( $tech_teller_footer_page_link_1 ); ?>"><?php echo get_the_title( $tech_teller_footer_page_link_1 ); ?></a></p>
		    </div>

            <?php

        endif;

        if ( ! empty($tech_teller_footer_page_link_2) ) :

            $tech_teller_footer_page_link_2 = absint( $tech_teller_footer_page_link_2 );

        	?>

        	<div class="col-lg-4 col-6">
		      <p class="mb-0 mt-2"><a href="<?php echo get_permalink( $tech_teller_footer_page_link_2 ); ?>"><?php echo get_the_title( $tech_teller_footer_page_link_2 ); ?></a></p>
		    </div>

        	<?php

        endif;

	}
endif;
add_action( 'tech_teller_bottom_extra_footer', 'tech_teller_bottom_extra_footer_action', 10 );


/*
* Function for bottom footer copyright notice and related
*/
if ( ! function_exists( 'tech_teller_bottom_footer_copyright_related_action' ) ) :

    function tech_teller_bottom_footer_copyright_related_action() {

        // Get default customization
        $default = tech_teller_get_default_mods();
        
        $tech_teller_copyright_notice = esc_attr( get_theme_mod( 'tech_teller_bottom_footer_copyright_text', $default['tech_teller_bottom_footer_copyright_text'] ) );
        ?>
        <div class="col-12 text-center">
            <p class="mb-0 mt-2">          
            <?php

                // the theme
                $theme = wp_get_theme();

                if ( ! empty($tech_teller_copyright_notice) ) :
                    echo $tech_teller_copyright_notice;
                else:

                    echo '&copy;' . get_the_date( 'Y' );

                endif;

                $tech_teller_footer_site_name = get_theme_mod( 'tech_teller_enable_bottom_footer_site_name', $default['tech_teller_enable_bottom_footer_site_name'] );

                $tech_teller_footer_powered_by = get_theme_mod( 'tech_teller_enable_bottom_footer_powered_by', $default['tech_teller_enable_bottom_footer_powered_by'] );

                if ( false == $tech_teller_footer_site_name ) :

                    echo '&nbsp;&nbsp;';

                else:
            ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            <?php

                endif;
                
                // displaying theme name and author
                if ( false != $tech_teller_footer_powered_by ) {
                     
                    echo $theme->Name; 
                    _e( ' WordPress Theme by ', 'tech-teller' ); 
                    echo $theme->Author;

                 } 
            ?>
            </p>
        </div>
        <?php
    }

endif;
add_action( 'tech_teller_bottom_footer_copyright_related', 'tech_teller_bottom_footer_copyright_related_action', 10 );


/*
* Function to add scroll to top feature
*/
if ( ! function_exists( 'tech_teller_scroll_to_top_feature_action' ) ) :

    function tech_teller_scroll_to_top_feature_action() {

        // Get default customization
        $default = tech_teller_get_default_mods();
        
        $tech_teller_scroll_top = get_theme_mod( 'tech_teller_enable_scroll_to_top_button', $default['tech_teller_enable_scroll_to_top_button'] );

            if ( false == $tech_teller_scroll_top ) {
              return;
            }
        ?>
            <div class="scrollup" title="Scroll Top"><i class="fa fa-angle-up"></i></div>
        <?php
    }

endif;
add_action( 'tech_teller_scroll_to_top_feature', 'tech_teller_scroll_to_top_feature_action', 10 );