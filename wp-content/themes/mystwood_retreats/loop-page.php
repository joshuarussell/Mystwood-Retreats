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
			<?php include_once(get_template_directory() . '/includes/packages.php'); ?>
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