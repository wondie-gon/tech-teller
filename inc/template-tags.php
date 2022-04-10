<?php
/**
 * Custom template tags for this theme
 *
 * 
 */

/*
* Single post author box
*/
if ( !function_exists( 'tech_teller_single_post_author_box' ) ) :

    function tech_teller_single_post_author_box() {

        global $post;

        if ( 'post' !== get_post_type($post) ) :

            return false;
       
        elseif ( 'post' === get_post_type($post) || has_post_format( array( 'standard' ) ) ) :

            $tech_teller_author_bio = get_the_author_meta( 'description' );

        ?>
            <h2 class="post-info single-post-author">

                <?php

                    echo esc_html__( 'Author', 'tech-teller' ) .  ': ';

                    tech_teller_posted_by();

                ?>

            </h2>

            <?php if ( $tech_teller_author_bio ) : ?>

                <p class="author-bio lead"><?php echo wp_kses_post($tech_teller_author_bio, 'tech-teller'); ?></p>

            <?php endif; ?>

            <a class="winplate plate-rounded plate-tech-teller-author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_blank"><?php echo esc_html__( 'See posts from author', 'tech-teller' ); ?></a>

        <?php

        else:

        ?>
            <a class="winplate plate-rounded plate-tech-teller-author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_blank"><?php echo esc_html__( 'See posts from author', 'tech-teller' ); ?></a>
        <?php

        endif;
     }

endif;

/*
*   Related Posts
*
*   Adding related post under single post
*/
if ( !function_exists( 'tech_teller_related_post_action' ) ) :
    function tech_teller_related_post_action( $post_id ) {

        if ( true === get_theme_mod( 'tech_teller_related_post_action', true ) ) :
            get_template_part( 'template-parts/single/related', 'posts' );
        endif;
    }
endif;
add_action( 'tech_teller_related_post', 'tech_teller_related_post_action', 10, 1 );


/**
* Prints HTML with meta information for the current post-date/time.
*/
if ( ! function_exists( 'tech_teller_posted_on' ) ) :

	function tech_teller_posted_on() {

        global $post;

        if ( 'post' !== get_post_type( $post ) ) {

            return false;

        }

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'tech-teller' ),
			'<a href="' . esc_url(  get_permalink()  ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="fa fa-calendar"></i>&nbsp;' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'tech_teller_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function tech_teller_posted_by() {

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s ', 'post author', 'tech-teller' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(  get_author_posts_url( get_the_author_meta( 'ID' ) )  ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"><i class="fa fa-user"></i>&nbsp;' . $byline . '</span> '; // WPCS: XSS OK.

	}
endif;

/*
* Function for post's category
*/
function tech_teller_post_category() {
    $tech_teller_cats = get_the_category();

    $tech_teller_cat_format = ' <span class="winplate plate-tech-teller plate-rounded"><a href="%1$s">%2$s</a></span>';
    
    $output = '';

    if ( $tech_teller_cats ) {
        foreach ( $tech_teller_cats as $tech_teller_cat ) {
            $output .= sprintf( $tech_teller_cat_format, esc_url( get_category_link( $tech_teller_cat->term_id ) ), esc_html( $tech_teller_cat->name ) );
        }
    }
    return $output;
}

/*----------------------------------------------------------------------
# Function to print tags and comments.
-------------------------------------------------------------------------*/
if ( ! function_exists( 'tech_teller_post_footer' ) ) {

    function tech_teller_post_footer() {

        // Get default customization
        $default = tech_teller_get_default_mods();

        //post tag badges
        $tech_teller_post_tag_badges = get_theme_mod( 'tech_teller_enable_post_tag_badges', $default['tech_teller_enable_post_tag_badges'] );

        //post comment link
        $tech_teller_post_comment_link = get_theme_mod( 'tech_teller_enable_post_comment_link', $default['tech_teller_enable_post_comment_link'] );

        if ( 'post' === get_post_type() ) {

        	$comments_num = get_comments_number();

        	if ( comments_open() ) {
        		if ( $comments_num == 0 ) {
        			$comment_badge = esc_html__( 'No comments available', 'tech-teller' );
        		} elseif ( $comments_num > 1 ) {
                    $comment_badge = $comments_num . esc_html__( ' comments', 'tech-teller' );
        		} else {
        			$comment_badge = esc_html__( '1 comment', 'tech-teller' );
        		}

        		$comment_badge = '<a href="' . get_comments_link() . '">' . $comment_badge . '</a>';
        	} else {
        		$comment_badge = esc_html__( 'Comments are closed', 'tech-teller' );
        	}

            $tag_sep    = '</span><span class="winplate plate-rounded plate-tech-teller-tag"><i class="fa d-inline fa-tags"></i>&nbsp;';

            $tags_list  = get_the_tag_list( '<span class="winplate plate-rounded plate-tech-teller-tag"><i class="d-inline fa fa-tags"></i>&nbsp;', $tag_sep, '</span>' );
            $output     = '';

            if ( $tags_list && $tech_teller_post_tag_badges == true) {

                $output .= '<div class="col-xs-12 col-sm-6">';

                $output .= $tags_list;
                
                $output .= '</div><!-- .col-xs-12 -->';
            }
            
            if ( $comment_badge && $tech_teller_post_comment_link == true) {

                $output .= '<div class="col-xs-12 col-sm-6 text-right"><span class="winplate plate-rounded plate-tech-teller-comment"><i class="fa d-inline fa-comment"></i>&nbsp;';

                $output .= $comment_badge;
                
                $output .= '</span></div><!-- .col-xs-12 -->';
            }
            // Filter
            $output = apply_filters( 'tech_teller_post_footer', $output );

            if ( ! empty( $output ) ) {
                echo $output;
            }

        }

    }

}

/*----------------------------------------------------------------------
# Function to print the post tags.
-------------------------------------------------------------------------*/
if ( ! function_exists( 'tech_teller_post_tags' ) ) {

    function tech_teller_post_tags() {
        if ( 'post' === get_post_type() ) {

            $tag_sep    = '</span><span class="winplate plate-rounded plate-tech-teller-tag"><i class="fa d-inline fa-tags"></i>&nbsp;';

            $tags_list  = get_the_tag_list( '<strong>Tags:</strong> <span class="winplate plate-rounded plate-tech-teller-tag"><i class="fa d-inline fa-tags"></i>&nbsp;', $tag_sep, '</span>' );
            $output     = '';

            if ( $tags_list ) {

                $output .= '<div class="col-12">';

                $output .= $tags_list;
                
                $output .= '</div><!-- .col-12 -->';
            }
            // Filter
            $output = apply_filters( 'tech_teller_post_tags', $output );

            if ( ! empty( $output ) ) {
                echo $output;
            }

        }

    }

}

if ( ! function_exists( 'tech_teller_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on search and archive views, or a div
	 * element when on single views, or as background image for index and frontpage views
	 */
	function tech_teller_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {
            ?>
            <div class="col-md-8 p-0 post-thumbnail">
            <?php
            $singular_img_class = array( 'img-fluid d-block mx-auto tech-teller-rounded');
              the_post_thumbnail( 'tech-teller-large-image', array(
                'class' =>  esc_attr( implode( ' ', $singular_img_class ) ),
                'alt'   =>  the_title_attribute( array(
                'echo'  =>  false
                ) ),
              ) );
            ?>
            </div>
            <?php
          } elseif ( is_page() ) {
            ?>
            <div class="col-12 p-0 post-thumbnail">
            <?php
            $singular_img_class = array( 'img-fluid d-block tech-teller-rounded');
              the_post_thumbnail( 'tech-teller-large-image', array(
                'class' =>  esc_attr( implode( ' ', $singular_img_class ) ),
                'alt'   =>  the_title_attribute( array(
                'echo'  =>  false
                ) ),
              ) );
            ?>
            </div>
            <?php
          } else {

            // Class for image wrpping div
            $wrapping_div_class  = array( 'col-lg-5 col-md-4 tech-teller-post-list' );

            // Class for image
            $post_img_class = array( 'post-thumbnail img-fluid d-block mx-auto tech-teller-rounded');
            
            // Get custom permalink for image
            $img_link = esc_url( tech_teller_get_permalink() );
            ?>
            <div class="<?php echo esc_attr( implode( ' ', $wrapping_div_class)); ?>">
              <a class="post-thumbnail-link" href="<?php echo $img_link; ?>">
                <?php
                  the_post_thumbnail( 'tech-teller-small-image', array(
                    'class' =>  esc_attr( implode( ' ', $post_img_class ) ),
                    'alt'   =>  the_title_attribute( array(
                    'echo'  =>  false
                    ) ),
                  ) );  
                ?>
              </a>
              <?php echo tech_teller_post_category(); ?> 
            </div>
            <?php
            } 
          
	}
endif;

/**
* Function to display post thumbnail as bg image
*/

if ( ! function_exists( 'tech_teller_thumbnail_as_bgimg' ) ) :
    /**
     * puts the post thumbnail as background image on page views, 
     * frontpage, index views
     */
    function tech_teller_thumbnail_as_bgimg() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_page() ) {
        
            $post_img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'tech-teller-small-image' );
            $img_url = $post_img['0'];
            $img_url = esc_url(  $img_url  );
            ?>
            <div class="post-thumbnail-wrap col-lg-5 col-md-4 py-2 px-0 mx-auto tech-teller-rounded bg-tech-teller-img" style="background-image: url(<?php echo $img_url; ?>);"> 
                <?php echo tech_teller_post_category(); ?> 
            </div>
            <?php
        }
    }
endif;

/*
* Function for getting various attachement, including featured image
*/

function tech_teller_get_attachment( $num = 1, $img_size = '' ) {

    $output ='';

    if ( has_post_thumbnail() && $num == 1 ) :

        if ( ! empty( $img_size ) ) {
            $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), $img_size );
        } else {
            $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        }
        
    else:
        $tech_teller_attachments = get_posts( array(
            'post_type'       =>    'attachment',
            'posts_per_page'  =>    $num,
            'post_parent'     =>    get_the_ID(),   
        ) );
        if ( $tech_teller_attachments && $num == 1 ) :
            foreach ( $tech_teller_attachments as $tech_teller_attachment ) :
                $output = wp_get_attachment_url( $tech_teller_attachment->ID );
            endforeach;
        elseif ( $tech_teller_attachments && $num > 1 ):
            $output = $tech_teller_attachments;
        endif;
        wp_reset_postdata();
    endif;

    return $output;
}

/*
* Function for getting gallery images
*/

function tech_teller_get_gallery_images() {

    global $post;

    $output = '';

    if ( $post->post_status == 'publish' ) :

        $tech_teller_attachments = get_posts( array(
            'post_type'       =>    'attachment',
            'posts_per_page'  =>    -1,
            'post_parent'     =>    get_the_ID(),   
        ) );

        $output = $tech_teller_attachments;

        wp_reset_postdata();

    endif;

    return $output;
}


/*
* Function for post's category on background image
*/
function tech_teller_post_category_on_bgimg() {
    $tech_teller_cats = get_the_category();

    $tech_teller_cat_format = '<span class="winplate plate-tech-teller plate-rounded tech-teller-btm-left"><a href="%1$s">%2$s</a></span>';
    
    $output = '';

    if ( $tech_teller_cats ) {
        foreach ( $tech_teller_cats as $tech_teller_cat ) {
            $output .= sprintf( $tech_teller_cat_format, esc_url( get_category_link( $tech_teller_cat->term_id ) ), esc_html( $tech_teller_cat->name ) );
        }
    }
    return $output;
}

/**
* Function to display tiny post thumbnail
*/

if ( ! function_exists( 'tech_teller_rounded_post_thumbnail_link' ) ) :
    /**
     *
     * Displays tiny post thumbnail as links
     * for example in recent posts below selected or featured posts
     */
    function tech_teller_rounded_post_thumbnail_link() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        // Get custom permalink
        $img_link = esc_url( tech_teller_get_permalink() );

        // Class for images
        $post_img_class = array( 'post-thumbnail img-fluid d-block tech-teller-rounded');
        ?>
        <a class="post-thumbnail-link" href="<?php echo $img_link; ?>">
          <?php
            the_post_thumbnail( 'tech-teller-smaller-image', array(
              'class'   =>  esc_attr( implode( ' ', $post_img_class ) ),
              'alt'     =>  the_title_attribute( array(
              'echo'    =>  false
              ) ),
            ) );  
          ?>
        </a>
        <?php
    }
endif;

/* 
* Function to display embedded media
*/
function tech_teller_display_embedded_media( $type = array() ) {

    $tech_teller_embeded = array();

    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );

    $tech_teller_embeded = get_media_embedded_in_content($content, $type);

    if ( in_array( 'audio', $type ) ) {

        $output = str_replace( '?visual=true', '?visual=false', $tech_teller_embeded[0] );

    } else {

        $output = $tech_teller_embeded[0];

    }

    return $output;

}

/* 
* Displaying breadcrumb of Yoast plugin
*/
function tech_teller_yoast_supported_breadcrumbs() {
    
    if ( function_exists( 'yoast_breadcrumb' ) ) :

    // Get default customization
    $default = tech_teller_get_default_mods();

      $tech_teller_breadcrumb_enabled = get_theme_mod( 'tech_teller_enable_breadcrumbs', $default['tech_teller_enable_breadcrumbs'] );

      if ( $tech_teller_breadcrumb_enabled == true && !is_front_page() && !is_home() ) {
        yoast_breadcrumb( '<p id="breadcrumbs" class="pl-2 py-1">','</p>' );
      }

    endif;
}
