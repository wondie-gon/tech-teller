<?php
/**
 * Template part for displaying recent blog posts on frontpage
 *
 * 
 * @package Tech_Teller
 */

global $post;

// Get default customization
$default = tech_teller_get_default_mods();

$featured_blog = get_theme_mod( 'tech_teller_frontpage_featured_blog', $default['tech_teller_frontpage_select_featured_blog'] );

if ($featured_blog === 'disable') {
  return;
} 

  // Get custom featured blog heading
  $featured_blog_heading = get_theme_mod( 'tech_teller_frontpage_featured_blog_heading', $default['tech_teller_frontpage_featured_blog_heading'] );

  // Get custom color for blog post heading
  $blog_heading_color = esc_attr( get_theme_mod( 'tech_teller_frontpage_featured_blog_heading_color' ) )?' style="color: ' . esc_attr( get_theme_mod( 'tech_teller_frontpage_featured_blog_heading_color' ) ) . ';"':'';

  // Get custom color for blog post title
  $blog_title_color = esc_attr( get_theme_mod( 'tech_teller_frontpage_featured_blog_title_color' ) )?' style="color: ' . esc_attr( get_theme_mod( 'tech_teller_frontpage_featured_blog_title_color' ) ) . ';"':'';

  // Get custom color for blog post text
  $blog_text_color = esc_attr( get_theme_mod( 'tech_teller_frontpage_featured_blog_text_color' ) )?' style="color: ' . esc_attr( get_theme_mod( 'tech_teller_frontpage_featured_blog_text_color' ) ) . ';"':'';


  // Get id of the post
  if (in_array($featured_blog, array( 'post' ))) {

    $featured_blog_cat = absint(get_theme_mod( 'tech_teller_front_featured_blog_category' ));

    if ($featured_blog_cat == 0 ) {
      return;
    }

  // Setting argument for post query
  $featured_args = array(
    'post_type'     =>  'post',
    'posts_per_page'  =>  1,
    'cat'       =>  $featured_blog_cat,
  );

  $featured_blog_post = new WP_Query($featured_args);

  if ($featured_blog_post->have_posts()) :
    while($featured_blog_post->have_posts()) : $featured_blog_post->the_post();

    //get post format
    $post_format = get_post_format($post->ID); 

?>
  <div id="post-<?php the_ID(); ?>" <?php post_class( 'py-2' ); ?>>
    <div class="container-fluid tech_teller_featured_blog">
      <div class="row mb-4 mx-0">
        <div class="col-md-12 pb-4 frontpage-section-heading">
          <h1 id="featured_blog_heading" class="p-2 tech-teller-h1"<?php echo $blog_heading_color; ?>><?php echo sprintf(esc_html__( '%s', 'tech-teller' ), $featured_blog_heading); ?></h1>
        </div>
      </div>

      <?php
          if(has_post_thumbnail()) :

            //wrapping div class for featured
            $featured_div_class  = array( 'row tech-teller-rounded mx-0 bg-tech-teller-img featured_blog_wrapper' );

            $num = 1;

            $img_size = 'tech-teller-large-image';

            $img_url = esc_url(tech_teller_get_attachment($num, $img_size));
            
            $featured_bgstyle = ' style="background-image: linear-gradient(to bottom, rgba(0, 0, 30, .5), rgba(0, 0, 102, .5)), url( ' . $img_url . ');"';

          else:

              //wrapping div class for featured
              $featured_div_class  = array( 'row tech-teller-rounded mx-0 bg_tech_teller_dark featured_blog_wrapper' );


              $featured_bgstyle = '';

          endif;

      ?>
      <div class="<?php echo esc_attr(implode( ' ', $featured_div_class)); ?>"<?php echo $featured_bgstyle; ?>>  
            <?php  
                if(has_post_thumbnail()) {

                  //div class for excerpt
                  $featured_excerpt_class  = array( 'px-md-5 d-flex flex-column align-items-start justify-content-center col-md-7 order-1 order-md-2' );
                  ?>
                  <div class="col-md-4 mr-auto order-2 order-md-1 py-4">
                    <img class="img-fluid d-block tech-teller-rounded" src="<?php echo $img_url; ?>">
                    <?php echo tech_teller_post_category(); ?>
                  </div>
                  <?php
              } elseif( 'video' === $post_format ) {
                  //div class for excerpt
                  $featured_excerpt_class  = array( 'px-md-5 d-flex flex-column align-items-start justify-content-center col-md-7 order-1 order-md-2' );
                    ?>
                    <div class="col-md-4 mr-auto order-2 order-md-1 py-4 mx-auto embed-responsive featured-tech-teller-video">
                      <?php echo tech_teller_display_embedded_media(array($post_format, 'iframe')); ?>
                      <?php echo tech_teller_post_category(); ?>
                    </div>
                    <?php                 
              } else {
                  //div class for excerpt
                  $featured_excerpt_class  = array( 'px-md-5 justify-content-center col-12' );
  
                  echo '';
              }
            ?>

          <div class="<?php echo esc_attr( implode( ' ', $featured_excerpt_class)); ?>">

            <h1>
              <a class="featured_blog_title"<?php echo $blog_title_color; ?> href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h1>
            <h2 class="small post-info featured_blog_meta">
              <?php tech_teller_posted_by(); ?> | <?php tech_teller_posted_on(); ?>
            </h2>
            <div class="featured_blog_content"<?php echo $blog_text_color; ?>>
              <?php the_excerpt(); ?>
            </div>
            <a class="btn btn-tech-teller featured_blog_link" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Continue reading  &rarr;', 'tech-teller' ); ?></a>
          </div>
        </div>
    </div>
  </div>
  <?php 
    endwhile;
    wp_reset_postdata();
  endif;
    }

/*
* Posts below frontpage featured blog post
*/
// category for featured blog
$featured_blog_cat = absint(get_theme_mod( 'tech_teller_front_featured_blog_category' ));

// category for section below featured blog
$below_featured_cat = absint(get_theme_mod( 'tech_teller_category_for_below_featured_blog' ));

//heading
$below_featured_heading = get_theme_mod( 'tech_teller_heading_for_below_featured_blog', $default['tech_teller_heading_for_below_featured_blog'] );

if ($below_featured_cat == 0 ) {
  return;
}

$args = array(
  'post_type'       =>  'post',
  'posts_per_page'  =>  5,
  'cat'             =>  $below_featured_cat,
);


//if the above selected category is similar to this
if ($below_featured_cat == $featured_blog_cat) {
  $args['offset'] = 1;
}

$tech_teller_recent_blogs = new WP_Query( $args );
?>
  <div class="py-3 bg_tech_teller_light">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-8">
            <h2 id="below_featured_heading" class="pb-2"><?php echo sprintf(esc_html__( '%s', 'tech-teller' ), $below_featured_heading); ?></h2> 
            <?php 
            if($tech_teller_recent_blogs->have_posts()) :
                    while($tech_teller_recent_blogs->have_posts()) : $tech_teller_recent_blogs->the_post();
            ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'py-3' ); ?>>
                  <div class="container-fluid">
                    <div class="row">
                      <?php tech_teller_post_thumbnail(); ?>
                    <div class="col-lg-7 col-md-8 pl-4 justify-content-center">
                      <div class="row">
                        <h1 class="tech-teller-h1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="col-12 p-0">
                          <h2 class="small post-info">
                            <?php tech_teller_posted_by(); ?> | <?php tech_teller_posted_on(); ?>
                          </h2>
                        </div>
                        <div class="entry-excerpt">
                          <!-- <p class="lead mb-0"> -->
                            <?php the_excerpt(); ?>
                          <!-- </p> -->
                        </div>
                      </div>
                      <div class="row">
                        <a href="<?php the_permalink(); ?>" class="btn btn-tech-teller"><?php echo esc_html__( 'Continue reading  &rarr;', 'tech-teller' ); ?></a>
                      </div>
                    </div>
                    </div>
                    <div class="row py-2 tech-teller-content-ftr">
                      <?php tech_teller_post_tags(); ?>
                    </div>
                  </div>
                </div>
            <?php 
                    endwhile;
            endif; 
            ?>
          </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>