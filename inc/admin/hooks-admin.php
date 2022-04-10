<?php
/**
*
*	Function hooks for admin dashboard, admin options etc
*
*	@package Tech_Teller
*
*	
*/
// hook for rendering welcoming text in admin dashboard
if ( ! function_exists( 'tech_teller_dashboard_welcoming_text_action' ) ) :
	function tech_teller_dashboard_welcoming_text_action() {

		// the theme
		$theme = wp_get_theme();

		?>
			<p class="welcoming-text">
				<?php
					printf(esc_html__( 'You have now installed %s and ready to use as your theme for your website. Thank you for choosing our product! We hope you will enjoy by all features and functionalities that the theme offers.', 'tech-teller' ), $theme->Name);
				?>
			</p>
		<?php
	}
endif;
add_action( 'tech_teller_dashboard_welcoming_text', 'tech_teller_dashboard_welcoming_text_action', 10 );

// hook for rendering about theme
if ( ! function_exists( 'tech_teller_dashboard_about_theme_action' ) ) :
	function tech_teller_dashboard_about_theme_action() {

		// the theme
		$theme = wp_get_theme();

		?>
		<div class="dashboard-grid-bi">
			<div class="dashboard-col theme-description">
				<h1><?php echo $theme->Name; ?></h1>
				<h4><?php echo $theme->Author; ?></h4>
				<p><?php echo $theme->Description; ?></p>
			</div>
			<div class="dashboard-col">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</div>
		</div>
		<?php
	}
endif;
add_action( 'tech_teller_dashboard_about_theme', 'tech_teller_dashboard_about_theme_action', 10 );


// hook for rendering getting-started content in admin dashboard
if ( ! function_exists( 'tech_teller_getting_started_content_action' ) ) :
	function tech_teller_getting_started_content_action() {
		?>
			<div class="dashboard-grid-bi">
				<div class="dashboard-col">
					<h3><?php _e( 'Theme Documentation', 'tech-teller' ); ?></h3>
					<p><?php _e( 'We have compiled the necessary documentation that explains every aspect of this theme. You can get full documentation by clicking the button below.', 'tech-teller' ); ?></p>
					<a class="button button-dashboard link-outside" href="#"><?php _e( 'Documentation', 'tech-teller' ); ?></a>
				</div>
				<?php if ( current_user_can( 'customize' ) ) : ?>
				<div class="dashboard-col">
					<h3><?php _e( 'Customize Theme', 'tech-teller' ); ?></h3>
					<p><?php _e( 'You can easiliy customize our theme using WordPress Customizer to suit your preferences for the website you want to build.', 'tech-teller' ); ?></p>
					<a class="button button-dashboard link-inside" href="<?php echo esc_url( admin_url( 'customize.php?theme=tech-teller' ) ); ?>"><?php _e( 'Go to Customizer', 'tech-teller' ); ?></a>
				</div>
			<?php endif; ?>
			</div>
		<?php
	}
endif;
add_action( 'tech_teller_getting_started_content', 'tech_teller_getting_started_content_action', 10 );


// hook for rendering Recommended plugins content in admin dashboard
if ( ! function_exists( 'tech_teller_recommended_plugins_content_action' ) ) :
	function tech_teller_recommended_plugins_content_action() {
		?>
			<div class="dashboard-inner-container">
				<div class="dashboard-action-box">
					<h3><?php _e( 'Recommended Plugins', 'tech-teller' ); ?></h3>
					<p><?php _e( 'In order for you to extend some functionalities of the theme and WordPress itself, we have listed recommended plugins in our documentation. Click the button below to see the recommended plugins.', 'tech-teller' ); ?></p>
					<p>
						<a class="button button-dashboard link-action" href="#"><?php _e( 'See the list', 'tech-teller' ); ?></a>
					</p>
				</div>
			</div>
		<?php
	}
endif;
add_action( 'tech_teller_recommended_plugins_content', 'tech_teller_recommended_plugins_content_action', 10 );


// hook for rendering theme support content in admin dashboard
if ( ! function_exists( 'tech_teller_theme_support_feature_action' ) ) :
	function tech_teller_theme_support_feature_action() {
		?>
			<div class="dashboard-grid-bi">
				<div class="dashboard-col">
					<h3><?php _e( 'Documentation', 'tech-teller' ); ?></h3>
					<p><?php _e( 'We have compiled the necessary documentation that explains every aspect of this theme. All you need to know about Techteller are included in our documentation.', 'tech-teller' ); ?></p>
					<a class="button button-dashboard link-outside" target="_blank" href="#"><?php _e( 'Full Documentation', 'tech-teller' ); ?></a>
				</div>
				<div class="dashboard-col">
					<h3><?php _e( 'Contact Support', 'tech-teller' ); ?></h3>
					<p><?php _e( 'Besides our full documentation about Techteller, we offer excellent support through our online support system.', 'tech-teller' ); ?></p>
					<a class="button button-dashboard link-outside" target="_blank" href="#"><?php _e( 'Contact Support', 'tech-teller' ); ?></a>
				</div>
			</div>
		<?php
	}
endif;
add_action( 'tech_teller_theme_support_feature', 'tech_teller_theme_support_feature_action', 10 );


// hook for rendering theme free vs pro in admin dashboard
if ( ! function_exists( 'tech_teller_theme_free_vs_pro_features_action' ) ) :
	function tech_teller_theme_free_vs_pro_features_action() {

		//get_template_part( 'features');
		$tech_teller_theme_features = array(
		'frontpage_customizable_sections'		=>	array(
			'feature_title'			=>	esc_html__( 'Frontpage Customizable Sections', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Add various sections (slider, featured review, featured blog, video section etc) at frontpage and customize layout, style and select categories to be displayed.', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'frontpage_featured_slider'		=>	array(
			'feature_title'			=>	esc_html__( 'Frontpage Featured Slider', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Add sliders, customize layout, customize color, slider speed', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'features_customization_easiness'		=>	array(
			'feature_title'			=>	esc_html__( 'Easy Customization of Features', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Most features are easily customizable', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'mobile_friendliness'		=>	array(
			'feature_title'			=>	esc_html__( 'Mobile Friendly', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Responsive layout for every device', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'responsive_layout_of_sections'		=>	array(
			'feature_title'			=>	esc_html__( 'Various Layout Designs', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Different layout of sections for menu, footer, slider etc..', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'social_media_integration'		=>	array(
			'feature_title'			=>	esc_html__( 'Social Media Integrated', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Major social media integrated, link site, share posts with social media and customize', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'color_customization'		=>	array(
			'feature_title'			=>	esc_html__( 'Customizable Colors', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'You can customize colors for various sections of frontpage and other pages easily', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'background_customization'		=>	array(
			'feature_title'			=>	esc_html__( 'Customizable Backgrounds', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'You can customize background colors and images for various sections of frontpage and other pages easily', 'tech-teller' ),
			'feature_free'			=>	1,
			'feature_pro'			=>	1
			),

		'contact_form'				=>	array(
			'feature_title'			=>	esc_html__( 'Contact Forms', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Add and customize forms for better user interaction, slider speed', 'tech-teller' ),
			'feature_free'			=>	0,
			'feature_pro'			=>	1
			),

		'custom_post_formats'		=>	array(
			'feature_title'			=>	esc_html__( 'Support Custom Post Formats', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Activate, deactivate and customize video, audio, gallery', 'tech-teller' ),
			'feature_free'			=>	0,
			'feature_pro'			=>	1
			),

		'custom_post_types'		=>	array(
			'feature_title'			=>	esc_html__( 'Custom Post Types for About Us Page', 'tech-teller' ),
			'feature_detail'		=>	esc_html__( 'Activate, deactivate and customize Services, Team, Testimonial for About Us page', 'tech-teller' ),
			'feature_free'			=>	0,
			'feature_pro'			=>	1
			),
		);

		if ( !empty($tech_teller_theme_features) ) :

			?>
				<div class="dashboard-inner-container featured-section features">
					<table class="table free-vs-pro">
						<thead>
							<tr>
								<th></th>
								<!-- <th><?php // _e( 'Free', 'tech-teller'); ?></th>
								<th><?php // _e( 'Pro', 'tech-teller'); ?></th> -->

								<th><?php esc_html( 'Free' ); ?></th>
								<th><?php esc_html( 'Pro' ); ?></th>
							</tr>
						</thead>
						<tbody>

							<?php

								foreach ($tech_teller_theme_features as $tech_teller_feature) {				

									if ( $tech_teller_feature['feature_free'] == 1 ) {
										$dashicons_free = ' dashicons-yes';
									} else {
										$dashicons_free = ' dashicons-no-alt';
									}

									if ( $tech_teller_feature['feature_pro'] == 1 ) {
										$dashicons_pro = ' dashicons-yes';
									} else {
										$dashicons_pro = ' dashicons-no-alt';
									}


							
								echo '<tr>
										<td class="feature">
											<h3>' . $tech_teller_feature['feature_title'] . '</h3>
											<p>' . $tech_teller_feature['feature_detail'] . '</p>
										</td>
										<td class="feature-free"><span class="dashicons-before' . $dashicons_free . '"></span></td>
										<td class="feature-pro"><span class="dashicons-before' . $dashicons_pro . '"></span></td>
									</tr>';
							 	} 
							?>
							<tr>
								<td class="feature"></td>
								<td class="feature-btn" colspan="2">
									<a class="button button-primary" href="#"><span class="mr-rgt-1 dashicons dashicons-cart"></span><?php _e( 'Get The Pro Version Now', 'tech-teller' ); ?></a>
								</td>
							</tr>
						</tbody>
					</table>
					
				</div>
			<?php

			endif;
	 }
endif;
add_action( 'tech_teller_theme_free_vs_pro_features', 'tech_teller_theme_free_vs_pro_features_action', 10 );

// hook for rendering theme admin dashboard
if ( ! function_exists( 'tech_teller_dashboard_page_content_action' ) ) :
	function tech_teller_dashboard_page_content_action() {
		?>
			<div class="wrap about-wrap ">
			<h1><?php _e( 'Welcome to Techteller', 'tech-teller' ); ?></h1>
			<?php  
				/**
				* Hook - tech_teller_dashboard_welcoming_text.
				*
				* @hooked tech_teller_dashboard_welcoming_text_action - 10
				*/
				do_action( 'tech_teller_dashboard_welcoming_text' );

				settings_errors(); 

				// dashboard tab
				$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'about_theme';
			?>

			<div class="dashboard-container">
				<h2 class="nav-tab-wrapper">
					<a class="nav-tab<?php echo $active_tab == 'about_theme' ? ' nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=tech-teller-admin-options&tab=about_theme' ) ); ?>"><?php _e( 'About Theme', 'tech-teller' ); ?></a>
					<a class="nav-tab<?php echo $active_tab == 'getting_started' ? ' nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=tech-teller-admin-options&tab=getting_started' ) ); ?>"><?php _e( 'Getting Started', 'tech-teller' ); ?></a>
					<a class="nav-tab<?php echo $active_tab == 'recommended_plugins' ? ' nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=tech-teller-admin-options&tab=recommended_plugins' ) ); ?>"><?php _e( 'Recommended Plugins', 'tech-teller' ); ?></a>
					<a class="nav-tab<?php echo $active_tab == 'support_feature' ? ' nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=tech-teller-admin-options&tab=support_feature' ) ); ?>"><?php _e( 'Support', 'tech-teller' ); ?></a>
					<a class="nav-tab<?php echo $active_tab == 'free_pro_features' ? ' nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=tech-teller-admin-options&tab=free_pro_features' ) ); ?>"><?php _e( 'Free Vs Pro', 'tech-teller' ); ?></a>
				</h2>

				<?php  

					// Toggling tabs
					switch ($active_tab) {
						case 'getting_started':
							/**
				              * Hook - tech_teller_getting_started_content.
				              *
				              * @hooked tech_teller_getting_started_content_action - 10
				              */
							do_action( 'tech_teller_getting_started_content' );

							break;
						case 'recommended_plugins':
							/**
				              * Hook - tech_teller_recommended_plugins_content.
				              *
				              * @hooked tech_teller_recommended_plugins_content_action - 10
				              */
							do_action( 'tech_teller_recommended_plugins_content' );

							break;
						case 'support_feature':
							/**
				              * Hook - tech_teller_theme_support_feature.
				              *
				              * @hooked tech_teller_theme_support_feature_action - 10
				              */
							do_action( 'tech_teller_theme_support_feature' );

							break;
						case 'free_pro_features':
							/**
				              * Hook - tech_teller_theme_free_vs_pro_features.
				              *
				              * @hooked tech_teller_theme_free_vs_pro_features_action - 10
				              */
							do_action( 'tech_teller_theme_free_vs_pro_features' );

							break;
						
						default:

							/**
				              * Hook - tech_teller_dashboard_about_theme.
				              *
				              * @hooked tech_teller_dashboard_about_theme_action - 10
				              */
							do_action( 'tech_teller_dashboard_about_theme' );

							break;
					}

				?>
				<?php

				?>
			</div>

		</div>
		<?php
	}
endif;
add_action( 'tech_teller_dashboard_page_content', 'tech_teller_dashboard_page_content_action', 10 );