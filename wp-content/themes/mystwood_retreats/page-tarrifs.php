<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Tariffs
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
      <?php the_post_thumbnail(); ?>
      <ul>
        <li><a href="#" class="btn">Specials &gt;</a></li>
        <li><a href="#" class="btn">Book now &gt;</a></li>
      </ul>
    </div>
    <?php endif; ?>
  </div>
  <?php
    query_posts('post_type=tariffs&order=ASC&posts_per_page=3');
    if(have_posts()) :
      echo '<h1 class="grid_16">Our Tariffs</h1>';
      while (have_posts()) :
        the_post();
  ?>
  <div class="grid_4">
    <div class="tariff">
      <h2><?php the_title(); ?></h2>
      <p class="price"><sup>$</sup><?php the_field('price'); ?></p>
      <p class="disclaimer"><?php the_field('disclaimer'); ?></p>
      <p class="availability"><?php the_field('availability'); ?></p>
      <a href="" class="btn btn-primary">Book now &gt;</a>
    </div>
    <?php edit_post_link( __( 'Edit Tariff', 'starkers' ), '', ''); ?>
  </div>
  <?php
      endwhile;
    endif;
  ?>
  <div class="tariff grid_4">
    <h2>Specials</h2>
    <p class="price">Discount</p>
    <p class="disclaimer">Choose from a range of hand picked packages to suit your time and budget.</p>
    <a href="" class="btn btn-primary">Specials &gt;</a>
  </div>
</div>
<section id="specials">
  <div class="container_16">
    <div class="clearfix">
      <h1 class="grid_16">Our Packages</h1>
      <article id="our-packages" class="grid_4">
        <p>Choose a package or contact us to create your own.</p>
        <img src="<?php bloginfo('template_directory') ?>/images/tree.png" alt="" />
        <a href="#" class="btn btn-primary">Contact us &gt;</a>
      </article>
      <?php include_once(get_template_directory() . '/includes/packages.php'); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
