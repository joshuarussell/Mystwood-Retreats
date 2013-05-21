<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

get_header(); ?>
<div id="container" class="container_16">
  <div class="grid_16">
    <?php get_template_part( 'loop', 'index' ); ?>
  </div>
</div>
<?php get_footer(); ?>