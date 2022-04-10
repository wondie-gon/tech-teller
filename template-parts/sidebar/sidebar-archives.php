<?php
/**
 * Displays archives sidebar
 *
 * 
 * @package Tech_Teller
 *
 */
?>
<?php
$type        = 'monthly';

$args = array(
  'type'     => $type
);  
?>
<div id="archives" class="widget side-widget pb-4">
	<div class="widget-title">
		<h3 class="side-widget-title p-2"><?php _e('Archives', 'tech-teller'); ?></h3>
	</div>
	<ul class="list-group p-2 tech-teller-rounded tech-teller-shadow archives-widget">
		<?php wp_get_archives($args); ?>
	</ul>
</div>