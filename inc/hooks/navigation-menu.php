<?php
/**  
* Function hooks for navigation menu
*
* @package Tech_Teller
*/

/*  
* Navigation menu hook
*/
if ( ! function_exists( 'tech_teller_responsive_navigation_menu_action' ) ) :

	function tech_teller_responsive_navigation_menu_action() {

			// Get default customization
			$default = tech_teller_get_default_mods();

				$tech_teller_fixed_nav_enabled = (get_theme_mod( 'tech_teller_enable_fixed_nav', $default['tech_teller_enable_fixed_nav'] ) != 1 ) ? false : true;

				$tech_teller_menu_button_position = get_theme_mod( 'tech_teller_small_device_menu_button_position' ) ? get_theme_mod( 'tech_teller_small_device_menu_button_position' ) : $default['tech_teller_small_device_menu_button_position'];

				$tech_teller_menu_button_type = get_theme_mod( 'tech_teller_small_menu_button_type' ) ? get_theme_mod( 'tech_teller_small_menu_button_type' ) : $default['tech_teller_small_menu_button_type'];

				if ( false === $tech_teller_fixed_nav_enabled ) {

				  $tech_teller_navbar_class = array( 'navbar navbar-expand-md py-2 py-md-0 tech-teller-nav' );

				} else {

				  $tech_teller_navbar_class = array( 'navbar navbar-expand-md py-2 py-md-0 tech-teller-nav fixed-enabled' );

				}
          	?>
        
			<nav id="tech_teller_nav" class="<?php echo esc_attr( implode( ' ', $tech_teller_navbar_class) ); ?>">

			<?php

				if ( $tech_teller_menu_button_position === 'right-menu-button' ) {

				  $tech_teller_menu_button_class = array( 'navbar-toggler tt-menu-button toggler-right' );

				} else {

				  $tech_teller_menu_button_class = array( 'navbar-toggler tt-menu-button toggler-left' );

				}

			?>
				<button class="<?php echo esc_attr(implode( ' ', $tech_teller_menu_button_class)); ?>" type="button" data-toggle="collapse" data-target="#navbarWontech">
				  <span class="tt-toggler<?php echo '-' . $tech_teller_menu_button_type; ?>"></span>
				</button>
				<div id="navbarWontech" class="collapse navbar-collapse tech-teller-navbar-collapse">
				  <div class="container-fluid">
				    <div class="row">
				      <div class="col-md-9 col-sm-12 col-xs-12 tech-teller-menu-col">
				        <?php
				    
				          $args = array(
				                  'menu'			=>	'main_top_menu',
				                  'theme_location'	=>	'main_top_menu',
				                  'depth'			=>	5,
				                  'container'       =>	'ul',
				                  'menu_class'      =>	'navbar-nav mx-auto navbar_tech_teller',
				                  'walker'          =>	new WP_Bootstrap_Navwalker()     
				          );
				          wp_nav_menu( $args ); 
				        ?>
				      </div>
				      <div class="col-md-3 col-sm-12 col-xs-12 tech-teller-search-box">
				        <?php get_search_form(); ?>
				      </div>
				    </div>
				  </div> 
				</div>   
			</nav>
<?php

	}

endif;
add_action( 'tech_teller_responsive_navigation_menu', 'tech_teller_responsive_navigation_menu_action', 10 );