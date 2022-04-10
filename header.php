<?php
/*
 * The header for Tech Teller theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * 
 * @package Tech_Teller
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="tt-header tech-teller-header-main">
    <div id="tech_teller_header_top" class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php  
            /**
              * Hook - tech_teller_customized_main_header.
              *
              * @hooked tech_teller_customized_main_header_action - 10
              */
              do_action( 'tech_teller_customized_main_header' );
          ?>

        </div>
      </div> <!-- end header .row -->
    </div>  <!-- end header .container-fluid -->
  </header>
  <?php tech_teller_yoast_supported_breadcrumbs(); ?>
  <div id="content" class="site-content">