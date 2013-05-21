<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
?>
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