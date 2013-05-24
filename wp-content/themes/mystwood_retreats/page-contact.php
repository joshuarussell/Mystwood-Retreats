<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Contact Us
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
?>
<?php get_header(); ?>
<div id="container" class="container_16">
  <div class="grid_16">
    <h1><?php the_title(); ?></h1>
    <?php if(has_post_thumbnail()): ?>
    <div id="banner">
      <?php the_post_thumbnail('banner-image'); ?>
      <ul>
        <li><a href="/specials" class="btn">Specials &gt;</a></li>
        <li><a href="http://book.resonline.com.au/make-booking?ap=325750" class="btn">Book now &gt;</a></li>
      </ul>
    </div>
    <?php endif; ?>
  </div>
  <div id="google-map" class="grid_7"></div>
  <div class="grid_9">
    <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>
