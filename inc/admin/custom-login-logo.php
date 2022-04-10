<?php
/**
* 
* To customize logo at login page
*
* @package Tech_Teller 
*/
function tech_teller_filter_custom_login_logo() {

    if ( has_custom_logo() ) :

        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url( $image[0] ); ?>);
                -webkit-background-size: <?php echo absint( $image[1] )?>px;
                background-size: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
                width: <?php echo absint( $image[1] ) ?>px;
                padding-bottom: 30px;
            }
        </style>
        <?php
    endif;
}

add_action( 'login_head', 'tech_teller_filter_custom_login_logo', 10 );

// change login logo url to your website
function tech_teller_filter_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'tech_teller_filter_login_logo_url');

// Change the defualt login logo url title
function tech_teller_filter_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'tech_teller_filter_login_logo_url_title');