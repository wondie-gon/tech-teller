<?php
/*
* Functions of Tech Teller theme for widgets and sidebars
* 
* @package Tech_Teller
*/

add_action('widgets_init', 'tech_teller_widget_init');
/*
* Function to register theme widget areas
*/
function tech_teller_widget_init(){

	// Get default customization
	$default = tech_teller_get_default_mods();

	/* Sidebar widget area */
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'tech-teller' ),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'Add sidebar widget area.', 'tech-teller' ),
		'before_widget' => '<div id="%1$s" class="widget side-widget pb-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title mb-1"><h3 class="side-widget-title p-2">',
		'after_title'   => '</h3></div>',
	) );

	/* Footer widget area 1 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area One', 'tech-teller' ),
		'id'            => 'footer-widget1',
		'description'   => esc_html__( 'Add footer widget area one.', 'tech-teller' ),
		'before_widget' => '<div id="%1$s" class="child-widget-1 widget foot-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
		'after_title'   => '</h3></div>',
	) );



	// Main footer column layout selected from theme customizer
	//$tech_teller_footer_column = '';

	$tech_teller_footer_column = esc_attr(get_theme_mod('tech_teller_footer_column_layout', $default['tech_teller_footer_column_layout']));

	if ($tech_teller_footer_column == 'two-column' || $tech_teller_footer_column == 'three-column' || $tech_teller_footer_column == 'four-column') :
		
		/* Footer widget area 2 */
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Two', 'tech-teller' ),
			'id'            => 'footer-widget2',
			'description'   => esc_html__( 'Add footer widget area two.', 'tech-teller' ),
			'before_widget' => '<div id="%1$s" class="child-widget-2 widget foot-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
			'after_title'   => '</h3></div>',
		) );

	endif;


	if ($tech_teller_footer_column == 'three-column' || $tech_teller_footer_column == 'four-column') :
		
		/* Footer widget area 3 */
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Three', 'tech-teller' ),
			'id'            => 'footer-widget3',
			'description'   => esc_html__( 'Add footer widget area three.', 'tech-teller' ),
			'before_widget' => '<div id="%1$s" class="child-widget-3 widget foot-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
			'after_title'   => '</h3></div>',
		) );

	endif;


	if ($tech_teller_footer_column == 'four-column') :
		
		/* Footer widget area 4 */
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Four', 'tech-teller' ),
			'id'            => 'footer-widget4',
			'description'   => esc_html__( 'Add footer widget area four.', 'tech-teller' ),
			'before_widget' => '<div id="%1$s" class="child-widget-4 widget foot-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
			'after_title'   => '</h3></div>',
		) );

	endif;


	/* The social media widget area for post share */
	register_sidebar( array(
		'name'          => esc_html__( 'Social Media Widget', 'tech-teller' ),
		'id'            => 'social-widget',
		'description'   => esc_html__( 'Add social media widget area for posts.', 'tech-teller' ),
		'before_widget' => '<div class="row"><div id="%1$s" class="col-md-12 d-flex align-items-center justify-content-between my-2">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h3 class="social-widget-title">',
		'after_title'   => '</h3></div>',
	) );
}
