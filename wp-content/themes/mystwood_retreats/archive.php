<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

get_header(); ?>

<div id="container" class="container_16">
	<div class="grid_16">
		<?php
			global $post;

			if($post->post_type == 'specials') :
		?>
		<h1>Specials</h1>
		<?php
			endif;

			rewind_posts();
			get_template_part('loop', 'archive');
		?>
	</div>
</div>
<?php get_footer(); ?>