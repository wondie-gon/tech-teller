<?php
/*
*
* Template part for displaying second bottom row of footer
*
* 
* @package Tech_Teller
*
*/
// Get default customization
$default = tech_teller_get_default_mods();

$tech_teller_extra_footer_links = get_theme_mod('tech_teller_enable_bottom_footer_page_links', $default['tech_teller_enable_bottom_footer_page_links']);

?>
<div class="row py-2 tt-footer-extra">
    <!-- Extra footer -->
    <?php  
    	if (true == $tech_teller_extra_footer_links) :
			
    		/*
			* Hook - tech_teller_bottom_extra_footer
			*
			* @hooked tech_teller_bottom_extra_footer_action - 10
			*/

			do_action( 'tech_teller_bottom_extra_footer' );

		endif;

		/*
		* Hook - tech_teller_bottom_footer_copyright_related
		*
		* @hooked tech_teller_bottom_footer_copyright_related_action - 10
		*/

		do_action( 'tech_teller_bottom_footer_copyright_related' );

	?>	

</div>