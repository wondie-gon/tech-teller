<?php
/**
* Loading functions for theme customization
*
* @package Tech_Teller
*
*/

//head and header functions and hooks
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/header/header-template-functions.php' );

//Load function hooks for navigation menu
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/navigation-menu.php' );


//Load function hooks photo gallery
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/tech-teller-photo-gallery.php' );

//Load function hooks for related posts
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/tech-teller-related-posts.php' );


//Load function hooks for footer section layouts
require_once( trailingslashit( get_template_directory() ) . 'inc/hooks/footer-section-hooks.php' );
