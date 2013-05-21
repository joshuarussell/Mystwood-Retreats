<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

get_header(); ?>
<div id="container" class="container_16">
  <div class="grid_16">
    <?php if ( have_posts() ) : ?>
    <div id="search-results">
      <div class="clearfix">
		    <h1><?php printf( __( 'Search Results for: %s', 'starkers' ), '' . get_search_query() . '' ); ?></h1>
        <?php get_search_form(); ?>
      </div>
		  <?php get_template_part( 'loop', 'search' ); ?>
    </div>
    <?php else : ?>
		<h2><?php _e( 'Nothing Found', 'starkers' ); ?></h2>
		<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starkers' ); ?></p>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>