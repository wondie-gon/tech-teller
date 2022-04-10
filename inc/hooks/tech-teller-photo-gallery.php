<?php
/**  
* Function hooks for photo gallery
*
* @package Tech_Teller
*/

/*  
* Photo gallery hooks
*/
if ( ! function_exists( 'tech_teller_get_photo_gallery_posts_action' ) ) :

	function tech_teller_get_photo_gallery_posts_action() {

		$gallery_args = array(
            'post_type'			=>	'post',
            'posts_per_page'	=>	1,
            'tax_query'			=>	array(
            'relation' =>	'OR',
              array(
                'taxonomy' =>	'category',
                'field'    =>	'slug',
                'terms'    =>	'gallery',
              ),
              array(
                'taxonomy' =>	'post_format',
                'field'    =>	'slug',
                'terms'    =>	array( 'post-format-gallery' ),
              ),
            ),
          );
	    $gallery_posts = new WP_Query( $gallery_args );

	    if ( $gallery_posts->have_posts() ) :
	        while($gallery_posts->have_posts()) : $gallery_posts->the_post();
	    		
		        $pics = array();

		        $pics = tech_teller_get_gallery_images();
		        
		        foreach ( $pics as $pic ) {
		        	$div_class = 'post-attachment mime-' . sanitize_title( $pic->post_mime_type );
		            $img_title = $pic->post_title;
		            $img_link = wp_get_attachment_url( $pic->ID );

		        }
	        ?>
	        <div class="row">
	         
	            <div class="<?php echo $div_class; ?> col-lg-5 col-md-4 tt-gallery-posts">
	            	<a href="<?php the_permalink(); ?>">
	            		<img class="d-block img-fluid mx-auto tt-gallery-postsimg tech-teller-rounded" src="<?php echo $img_link; ?>" alt="<?php echo $img_title; ?>" />
	            	</a>
	            	<div class="d-block"><?php echo tech_teller_post_category(); ?></div>
	            </div><!-- .post-thumbnail-wrap -->
	            <div class="col-lg-7 col-md-8 pl-4 justify-content-center">
	              <h3 class="p-2 gallery-posts-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                <?php the_excerpt(); ?>
	              <div class="d-block"><?php tech_teller_post_tags(); ?></div>
	            </div><!-- .col-lg-7.col-md-8 -->
	            
	        </div>
	        <?php
	        endwhile; wp_reset_postdata();  
	    endif;

	}

endif;
add_action( 'tech_teller_get_photo_gallery_posts', 'tech_teller_get_photo_gallery_posts_action', 10 );

/*
* Photo gallery single post hook
*/

if ( ! function_exists( 'tech_teller_get_photo_gallery_single_action' ) ) :

	function tech_teller_get_photo_gallery_single_action() {

		$gallery_args = array(
            'post_type'     =>	'post',
            'tax_query'     =>	array(
            'relation'		=>	'OR',
              array(
                'taxonomy'	=>	'category',
                'field'		=>	'slug',
                'terms'		=>	'gallery',
              ),
              array(
                'taxonomy'	=>	'post_format',
                'field'		=>	'slug',
                'terms'		=>	array( 'post-format-gallery' ),
              ),
            ),
          );
	    $gallery_posts = new WP_Query( $gallery_args );

	    if ( $gallery_posts->have_posts() ) :
	        while( $gallery_posts->have_posts() ) : $gallery_posts->the_post();

	        $pics = array();

	        $pics = tech_teller_get_gallery_images();
	        	        
	        ?>
	        <div class="row">
	            <?php if ( is_singular() ) { ?>
	            <div class="col-12">
	            	<header class="entry-header tech-teller-single-heading tech-teller-rounded">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>
	            </div>			
                    <?php
                	foreach ( $pics as $pic ) :
                		//var_dump( $pic);
                		$div_class = 'post-attachment mime-' . sanitize_title( $pic->post_mime_type ) . ' blocks-gallery-item tt-gallery col-sm-6 col-md-3 py-2';
			            $img_title = $pic->post_title;
			            $img_link = wp_get_attachment_url( $pic->ID, 'tech-teller-small-image' );
			            ?>
			            <div class="<?php echo $div_class; ?>">
			            	<a href="<?php echo $img_link; ?>">
			            		<figure class="tt-gallery-figure">
			            			<img class="d-block img-fluid mx-auto tt-gallery-img tech-teller-rounded" src="<?php echo $img_link; ?>" alt="<?php echo $img_title; ?>" />
			            			<figcaption class="gallery-caption tt-caption tech-teller-rounded">
			            				<?php echo $img_title; ?>
			            			</figcaption>
			            		</figure>
			            	</a>
			            </div>
			            <?php
			        endforeach;  
	                 } 
	            ?>
	        </div>
	        <?php
	        endwhile; wp_reset_postdata();  
	    endif;

	}

endif;
add_action( 'tech_teller_get_photo_gallery_single', 'tech_teller_get_photo_gallery_single_action', 10 );
