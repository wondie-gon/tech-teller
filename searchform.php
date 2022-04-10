<?php
    /**
 * The search form template for Tech Teller theme
 *
 * @package Tech_Teller
 */
 ?>
<form class="form-inline tech-teller-search-form mt-2 mt-md-0" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input class="form-control tech-teller-search-control" name="s" type="text" placeholder="Search" aria-label="Search" required="required">
  <button id="wfSearchButton" class="btn btn-tech-teller" type="submit"><?php _e( 'Go', 'tech-teller' ); ?></button>
</form>
<button id="wfSearchTrigger" class="btn btn-tech-teller py-1"><i class="fa fa-search"></i></button>