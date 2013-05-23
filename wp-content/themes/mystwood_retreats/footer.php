<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
?>
<section id="specials">
  <div class="container_16">
    <?php if(!is_archive()) : ?>
    <div class="clearfix">
      <h1 class="grid_16">Our Packages</h1>
      <article id="our-packages" class="grid_4">
        <p>Choose a package or contact us to create your own.</p>
        <img src="<?php bloginfo('template_directory') ?>/images/tree.png" alt="" />
        <a href="#" class="btn btn-primary">Contact us &gt;</a>
      </article>
      <?php
        query_posts('post_type=specials&order=ASC&posts_per_page=3');

        if(have_posts()) :
          while (have_posts()) :
            the_post();
            if(get_field('show_on_home_page')) :
      ?>
      <article class="grid_4">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <h3><?php the_field('sub_heading'); ?></h3>
        <?php the_field('content'); ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary">More &gt;</a>
        <?php edit_post_link( __( 'Edit Special', 'starkers' ), '', ''); ?>
      </article>
      <?php
            endif;
          endwhile;
        endif;
        wp_reset_query();
      ?>
    </div>
  <?php endif; ?>
  </div>
</section>
<footer id="footer">
	<div class="container_16">
		<p class="grid_8">&copy; <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <?php echo date('Y'); ?></p>
		<p class="grid_8 tagline"><?php bloginfo( 'description' ); ?></p>
	</div>
</footer>

<?php
	wp_footer();
?>
</body>
</html>