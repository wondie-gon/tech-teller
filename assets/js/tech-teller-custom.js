
jQuery(document).ready(function($){
	// fixed nav
	var topH = $('#tech_teller_header_top').height();
	$(window).scroll(function(){
		if($(this).scrollTop() > topH) {
			$('.fixed-enabled').addClass('tech_teller_fixed_nav').slideDown(800);
		} else {
			$('.fixed-enabled.tech_teller_fixed_nav').removeClass('tech_teller_fixed_nav');
		}
	});

	// Menu icon on small devices

	var menu_icon = $('.tt-menu-button');
	var menu_open = false;

	menu_icon.on('click', function(e) {
		e.preventDefault();
		if(!menu_open) {
			$(this).addClass('close');
			$('.tech-teller-navbar-collapse').addClass('tt-navbar-active');
			menu_open = true;
		} else {
			$(this).removeClass('close');
			$('.tech-teller-navbar-collapse').removeClass('tt-navbar-active');
			menu_open = false;
		}
	});

	// Search box
	$('#tech_teller_header_top #wfSearchTrigger').on('click', function(){

		var trig_button = $(this);
		var tech_teller_search_form = $('#tech_teller_header_top').find('.tech-teller-search-form');
		var tech_teller_search_control = tech_teller_search_form.find('.tech-teller-search-control');
		tech_teller_search_form.slideDown(500, function(){
			trig_button.hide();
		});
		tech_teller_search_control.focus();

		// when clicked outside the form
		tech_teller_search_form.focusout(function(){
			$(this).slideUp(500, function(){
				trig_button.show();
			});
		});
	});

	// Social media sharing window

	share_post_on_social_media();

	function share_post_on_social_media() {
		var left_win = (screen.width - 540)/2;
		var top_win = (screen.height - 540)/2;
		var params = "menubar=no, toolbar=no, status=no, width=540, height=450, top=" + top_win + ", left=" + left_win;

		$('a.social_share_link').on('click', function(event){
			event.preventDefault();
			var href = $(this).attr('href');
			window.open(href, "NewWindow", params);
		});
	}

	//frontpage video section text container slider
	tech_teller_video_text_container_display();
	function tech_teller_video_text_container_display() {

		var video_container = $('.tech-teller-video');
		//var video_texts = video_container.find('.tt-video-texts');

		$('.tech-teller-video .video-container').on({
			mouseenter : function() {
				var video_wrapper = $(this).closest('.tech-teller-video');

				var video_target = video_wrapper.attr('id');

				var text_to_show = $('#'+video_target).find('.tt-video-texts');

				text_to_show.addClass('ready');
				text_to_show.slideDown(1000)
				.animate({
						'height' : 160
					}, 'linear');
			},
			mouseleave : function(){
				if ($('.tt-video-texts').hasClass('ready')) {
					$('.tt-video-texts.ready').slideUp(500, function() {
						$(this).removeClass('ready');
					});
				}
			}
		});
	}

	// video social media share buttons
	tech_teller_media_posts_sharing();
	function tech_teller_media_posts_sharing() {

		var sharing_open = false;

		$('.media-share-btns button.btn-tech-teller-share').on('click', function(e) {

			e.preventDefault();

			var media_target = $(this).closest('.media_post');

			var media_id = media_target.attr('id');

			var share_icon = $('#'+media_id).find('.btn-tech-teller-share.fa');

			share_icon.toggleClass('fa-share');

			if (!sharing_open) {
				
				$('#'+media_id).find('.media-sharer-group').addClass('d-inline-block');
				$('.media-sharer-group.d-inline-block').animate({
					'marginLeft' : '1%',
					'width'	: '100%'
				}, 500, 'linear', function() {
					share_icon.addClass('fa-window-close');
				});
				sharing_open = true;
			} else {
				$('.media-sharer-group.d-inline-block').animate({
					'marginLeft' : '-100%',
					'width'	: '0'
				}, 500, 'linear', function() {
					$('.media-sharer-group.d-inline-block').removeClass('d-inline-block');
					share_icon.removeClass('fa-window-close');					
				});
				sharing_open = false;
			}

		});

	}

	// Displaying scroll Up Icon
	$(window).scroll(function(){
		if ($(this).scrollTop() > 800) {
			$('.scrollup').fadeIn(2000);
		} else {
			$('.scrollup').fadeOut(2000);
		}
	});

	// Auto scroll up when btn clicked
	$('.scrollup').click(function(){
		$("html, body").animate({
			scrollTop : 0
		}, 2000);

		return false;
	});
	
	// For sidebar list-group styling
	tech_teller_sidebar_listgroup();

	// add class to items
	function tech_teller_sidebar_listgroup() {

		var listgroup = 'list-group';
		var listgroup_item = 'list-group-item list-group-item-action';

		$('.widget.side-widget ul').addClass(listgroup);

		$('.widget.side-widget ul li').addClass(listgroup_item);
	}

}); // end jquery