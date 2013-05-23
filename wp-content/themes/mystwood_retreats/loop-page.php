<?php
/**
 * The loop that displays a page.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.2
 */
?>
<div id="container" class="container_16">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php if(!is_front_page() && has_post_thumbnail()): ?>
    <div id="banner" class="grid_16">
      <?php the_post_thumbnail('banner-image'); ?>
      <ul>
        <li><a href="/specials" class="btn">Specials &gt;</a></li>
        <li><a href="http://book.resonline.com.au/make-booking?ap=325750" class="btn">Book now &gt;</a></li>
      </ul>
    </div>
    <?php endif; ?>
		<article class="grid_16 post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if(is_front_page()) : ?>
			<?php if(get_the_post_thumbnail()) : ?>
			<div class="grid_4 alpha">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php endif; ?>
			<div class="grid_12 omega">
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<?php the_field('excerpt'); ?>
				<p><a href="<?php the_field('more_button_url'); ?>" class="btn">More &gt;</a></p>
				<?php wp_link_pages( array( 'before' => '<nav>' . __( 'Pages:', 'starkers' ), 'after' => '</nav>' ) ); ?>
				<footer>
					<?php edit_post_link( __( 'Edit content', 'starkers' ), '', '' ); ?>
				</footer>
			</div>
			<?php else : ?>
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<nav>' . __('Pages:', 'starkers'), 'after' => '</nav>')); ?>
			<footer>
				<?php edit_post_link( __( 'Edit content', 'starkers' ), '', ''); ?>
			</footer>
		<?php endif; ?>
		</article>
	<?php endwhile; ?>
</div>
<?php if(is_front_page()) : ?>
<section id="specials">
	<div class="container_16">
		<div class="clearfix">
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
			  <a href="<?php the_permalink(); ?>" class="btn">More &gt;</a>
			  <?php edit_post_link( __( 'Edit Special', 'starkers' ), '', ''); ?>
			</article>
			<?php
			      endif;
			    endwhile;
			  endif;
			  wp_reset_query();
			?>
			<article id="enquire-now" class="grid_4">
				<h2>Enquire Now</h2>
				<h3>Contact Mystwood anytime</h3>
				<address class="clearfix">
					<p>117 Milsons Arm Road Wollombi, NSW 2325</p>
					<a href="/contact-us" class="btn">Map &gt;</a>
				</address>
				<ol>
					<li class="email"><a href="mailto:info@mystwood.com.au">info@mystwood.com.au</a></li>
					<li class="phone">(+61) 02 4998 3234</li>
					<li class="facebook"><a href="http://www.facebook.com/pages/Mystwood-Retreats/161117837274504">Follow us on Facebook</a></li>
					<li class="twitter"><a href="#">Follow us on Twitter</a></li>
				</ol>
			</article>
		</div>
	</div>
</section>
<?php endif; ?>