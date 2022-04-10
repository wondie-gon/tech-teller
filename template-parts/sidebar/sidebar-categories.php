<?php
/**
 * Displays categories sidebar
 *
 * 
 * @package Tech_Teller
 *
 */
$hide_title   = true; 
$orderby      = 'name'; 
$show_count   = 0;
$pad_counts   = 0;
$hierarchical = false;
$style        = 'list';
$use_desc     = false;

$args = array(
  'hide_title_if_empty'   => $hide_title,
  'orderby'               => $orderby,
  'show_count'            => $show_count,
  'pad_counts'            => $pad_counts,
  'hierarchical'          => $hierarchical,
  'style'                 => $style,
  'title_li'              => '',
  'use_desc_for_title'    => $use_desc,
);  
?>
<div id="categories" class="widget side-widget pb-4">
  <div class="widget-title">
    <h3 class="side-widget-title p-2"><?php _e('Categories', 'tech-teller'); ?></h3>
  </div>
  <ul class="list-group p-2 tech-teller-rounded tech-teller-shadow categories-widget">
    <?php wp_list_categories($args); ?>
  </ul>
</div>