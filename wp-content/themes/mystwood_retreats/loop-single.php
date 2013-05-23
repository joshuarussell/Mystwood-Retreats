<?php
/**
 * The loop that displays a single post.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h1><?php the_title(); ?></h1>
			<p><?php starkers_posted_on(); ?></p>
		</header>

		<?php the_field('content'); ?>
		<?php edit_post_link( __( 'Edit', 'starkers' ), '', '' ); ?>
	</article>
<?php endwhile; // end of the loop. ?>