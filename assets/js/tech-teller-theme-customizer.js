/**
 *
 * Theme Customizer live preview refresh
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * @package Tech_Teller
 *
 */
 ( function( $ ) {

 	//site logo
 	wp.customize( 'custom_logo', function( value ) {
 		value.bind( function( to ) {
 			$('img.site-logo').attr( 'src', to );
 		} );
 	} );

	// Site title and description.
	wp.customize(  'blogname', function( value ) {
		value.bind( function( to ) {
			$('.site-title a').html( to );
		} );
	} );
	wp.customize(  'blogdescription', function( value ) {
		value.bind( function( to ) {
			$('.site-description').html( to );
		} );
	} );

	// Header text color.
	wp.customize(  'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$('.site-title a, .site-description').css( {
					'color': to
				} );
		} );
	} );

	// Body background color
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$('body').css( {
				'background-color': to
			} );
		} );
	} );
	 
	
 	/*
 	* instant preview during dark background color custom settings
 	*/
 	wp.customize( 'tech_teller_dark_bg_color', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_dark').css( {
 					'background-color': to
 				} );
 			
 		} );
 	} );

 	// Paragraph text color within dark colored background
 	wp.customize( 'tech_teller_dark_text_color', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_dark').css( {
 					'color': to
 				} );
 		} );
 	} );

 	// Button background color within dark colored background
 	wp.customize( 'tech_teller_dark_btn_bgcolor', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_dark .btn-tech-teller, .bg_tech_teller_dark a.btn-tech-teller').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );

 	// Button link or text color within dark colored background
 	wp.customize( 'tech_teller_dark_btn_color', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_dark .btn-tech-teller, .bg_tech_teller_dark a.btn-tech-teller, a.btn-tech-teller.featured_blog_link').css( {
 				'color':to,
 				'border-color': to
 			} );
 		} );
 	} );


 	/*
 	* instant preview during light background color custom settings
 	*/
 	// Customization preview of light colored background
 	wp.customize( 'tech_teller_light_bg_color', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_light').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );

 	// Customization preview of heading bg color
 	wp.customize( 'tech_teller_heading_bg_on_light_bg', function( value ) {
 		value.bind( function( to ) {
 			$('.tech-teller-heading-bg, .tech-teller-single-heading').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );

 	// heading color within light colored background
 	wp.customize( 'tech_teller_heading_color_on_light_bg', function( value ) {
 		value.bind( function( to ) {
 			$('.tech-teller-heading-bg, .tech-teller-heading-bg .entry-title, .tech-teller-heading-bg .page-title, .tech-teller-single-heading .entry-title')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	// Paragraph text color within light colored background
 	wp.customize( 'tech_teller_light_text_color', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_light').css( {
 					'color': to
 				} );
 		} );
 	} );

 	// Button background color within light colored background
 	wp.customize( 'tech_teller_light_btn_bgcolor', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_light .btn-tech-teller, .bg_tech_teller_light a.btn-tech-teller').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );

 	// Button link or text color within light colored background
 	wp.customize( 'tech_teller_light_btn_color', function( value ) {
 		value.bind( function( to ) {
 			$('.bg_tech_teller_light .btn-tech-teller, .bg_tech_teller_light a.btn-tech-teller').css( {
 				'color': to,
 				'border-color': to
 			} );
 		} );
 	} );

 	/*
 	* instant preview during footer area color custom settings
 	*/
 	// Customization preview of main footer background
 	wp.customize( 'tech_teller_footer_main_bg_color', function( value ) {
 		value.bind( function( to ) {
 			$('.tech_teller_footer_container, .tech_teller_footer_container .tech-teller-footer-main').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );

 	// Customization preview of bottom extra footer background
 	wp.customize( 'tech_teller_footer_extra_bg_color', function( value ) {
 		value.bind( function( to ) {
 			$('.tech_teller_footer_container .tt-footer-extra').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );

 	//text color in footer area
 	wp.customize( 'tech_teller_footer_all_text_color', function( value ) {
 		value.bind( function( to ) {
 			$('.tech_teller_footer_container, .tech_teller_footer_container .tech-teller-footer-main, .tech-teller-footer-main .widget_text, .tech-teller-footer-main .foot-widget ul li')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	//link color in footer area
 	wp.customize( 'tech_teller_footer_all_link_color', function( value ) {
 		value.bind( function( to ) {
 			$('.tech_teller_footer_container a')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	//icon links color in footer area
 	wp.customize( 'tech_teller_footer_all_link_icons_color', function( value ) {
 		value.bind( function( to ) {
 			$('.footer-social-row a .fab')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	/* 
 	* frontpage top slider section live preview
 	*/
 	//button text
	wp.customize(  'tech_teller_front_slider_custom_btn', function( value ) {
		value.bind( function( to ) {
			$('#topsection_btn_link').html( to );
		} );
	} );

 	/* 
 	* frontpage review section live preview
 	*/
 	//heading
	wp.customize(  'tech_teller_frontpage_featured_review_heading', function( value ) {
		value.bind( function( to ) {
			$('#featuredReviewHeading').html( to );
		} );
	} );

	//additional text
	wp.customize(  'tech_teller_frontpage_review_additional_text', function( value ) {
		value.bind( function( to ) {
			$('#review_extra_text').html( to );
		} );
	} );

	//title color
 	wp.customize( 'tech_teller_frontpage_review_post_title_color', function( value ) {
 		value.bind( function( to ) {
 			$('a.link-on-img')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	//button text
	wp.customize(  'tech_teller_frontpage_review_custom_btn_text', function( value ) {
		value.bind( function( to ) {
			$('#featured_review_link').html( to );
		} );
	} );

	/* 
 	* frontpage featured blog section live preview
 	*/
 	//heading
	wp.customize(  'tech_teller_frontpage_featured_blog_heading', function( value ) {
		value.bind( function( to ) {
			$('#featured_blog_heading').html( to );
		} );
	} );

	//heading color
 	wp.customize( 'tech_teller_frontpage_featured_blog_heading_color', function( value ) {
 		value.bind( function( to ) {
 			$('.frontpage-section-heading h1#featured_blog_heading')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	//title color
 	wp.customize( 'tech_teller_frontpage_featured_blog_title_color', function( value ) {
 		value.bind( function( to ) {
 			$('.featured_blog_title, .featured_blog_meta a')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	//text color
 	wp.customize( 'tech_teller_frontpage_featured_blog_text_color', function( value ) {
 		value.bind( function( to ) {
 			$('p.featured_blog_content')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	//below featured blog heading
	wp.customize(  'tech_teller_heading_for_below_featured_blog', function( value ) {
		value.bind( function( to ) {
			$('#below_featured_heading').html( to );
		} );
	} );


	/* 
 	* frontpage infinite slider section live preview
 	*/
 	// Section header text
 	wp.customize(  'tech_teller_front_infinite_slider_heading', function( value ) {
		value.bind( function( to ) {
			$('h1#infinite_slider_header').html( to );
		} );
	} );

	// Section header color
 	wp.customize( 'tech_teller_front_infinite_slider_heading_color', function( value ) {
 		value.bind( function( to ) {
 			$('h1#infinite_slider_header')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	// Section background color
 	wp.customize( 'tech_teller_front_infinite_slider_section_bg', function( value ) {
 		value.bind( function( to ) {
 			$('#infinite_slider_wrapper').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );

 	// each slider title color
 	wp.customize( 'tech_teller_front_infinite_slider_title_color', function( value ) {
 		value.bind( function( to ) {
 			$('.tt-continous-slider .slider-overlay-title a')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	// each slider title background color
 	wp.customize( 'tech_teller_front_infinite_slider_title_bg', function( value ) {
 		value.bind( function( to ) {
 			$('.tt-continous-slider .slider-overlay-title').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );


 	/* 
 	* frontpage video section live preview
 	*/
 	// Section header text
 	wp.customize(  'tech_teller_front_page_video_section_heading', function( value ) {
		value.bind( function( to ) {
			$('h2.video-section-heading').html( to );
		} );
	} );

	// Section header color
 	wp.customize( 'tech_teller_front_page_video_section_heading_color', function( value ) {
 		value.bind( function( to ) {
 			$('.video-section-heading')
 			.css( {
 					'color': to
 				} );
 		} );
 	} );

 	// Section header background color
 	wp.customize( 'tech_teller_front_page_video_section_heading_bg', function( value ) {
 		value.bind( function( to ) {
 			$('.video-section-heading').css( {
 					'background-color': to
 				} ); 			
 		} );
 	} );


} )( jQuery );