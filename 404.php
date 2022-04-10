<?php
/**
 * The template to display pages not existing
 *
 * 
 * @package Tech_Teller
 */  
get_header(); 
?>
<div id="primary" class="content-area py-3 bg_tech_teller_light">
    <main id="main" class="site-main" role="main">
		<section class="error-404 not-found py-3 tech-teller-no-results">
            <div class="container">
                <div class="row">
                    <header class="page-header">
                        <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'tech-teller' ); ?></h1>
                    </header>
                </div>
                <div class="row page-content">
                    <div class="col-sm-8 py-2">
                        <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'tech-teller' ); ?>
                    </div>
                    <div class="col-sm-4 py-2">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>		 
        </section>
    </main>
</div><!-- .content-area -->
<?php get_footer(); ?>