<?php
/**
 * Starkers functions and definitions
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

/** Tell WordPress to run starkers_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'starkers_setup' );

if ( ! function_exists( 'starkers_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Starkers HTML5 3.0
 */
function starkers_setup() {

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size('banner-image', 940, 278, true);

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'starkers', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'starkers' ),
	) );
}
endif;

if ( ! function_exists( 'starkers_menu' ) ):
/**
 * Set our wp_nav_menu() fallback, starkers_menu().
 *
 * @since Starkers HTML5 3.0
 */
function starkers_menu() {
	echo '<nav><ul><li><a href="'.get_bloginfo('url').'">Home</a></li>';
	wp_list_pages('title_li=');
	echo '</ul></nav>';
}
endif;

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * @since Starkers HTML5 3.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * @since Starkers HTML5 3.0
 * @deprecated in Starkers HTML5 3.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function starkers_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'starkers_remove_gallery_css' );

if ( ! function_exists( 'starkers_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * @since Starkers HTML5 3.0
 */
function starkers_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<article <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s says:', 'starkers' ), sprintf( '%s', get_comment_author_link() ) ); ?>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<?php _e( 'Your comment is awaiting moderation.', 'starkers' ); ?>
			<br />
		<?php endif; ?>

		<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'starkers' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'starkers' ), ' ' );
			?>

		<?php comment_text(); ?>

			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<article <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<p><?php _e( 'Pingback:', 'starkers' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'starkers'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Closes comments and pingbacks with </article> instead of </li>.
 *
 * @since Starkers HTML5 3.0
 */
function starkers_comment_close() {
	echo '</article>';
}

/**
 * Adjusts the comment_form() input types for HTML5.
 *
 * @since Starkers HTML5 3.0
 */
function starkers_fields($fields) {
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
	'author' => '<p><label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '*' : '' ) .
	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'  => '<p><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '*' : '' ) .
	'<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	'url'    => '<p><label for="url">' . __( 'Website' ) . '</label>' .
	'<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
);
return $fields;
}
add_filter('comment_form_default_fields','starkers_fields');

/**
 * Register widgetized areas.
 *
 * @since Starkers HTML5 3.0
 */
function starkers_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'starkers' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'starkers' ),
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'starkers' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'starkers' ),
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'starkers' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'starkers' ),
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'starkers' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'starkers' ),
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'starkers' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'starkers' ),
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'starkers' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'starkers' ),
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running starkers_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'starkers_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * @updated Starkers HTML5 3.2
 */
function starkers_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'starkers_remove_recent_comments_style' );

if ( ! function_exists( 'starkers_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since Starkers HTML5 3.0
 */
function starkers_posted_on() {
	printf( __( 'Posted on %2$s', 'starkers' ),
		'meta-prep meta-prep-author',
		sprintf( '<time datetime="%1$s" pubdate>%2$s</time>',
			get_the_date('Y-m-d'),
			get_the_date()
		));
}
endif;

if ( ! function_exists( 'starkers_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Starkers HTML5 3.0
 */
function starkers_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'starkers' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'starkers' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'starkers' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

function formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter('the_content', 'formatter', 99);

/**
 * Slides post type
 */
function slide_post_type() {
	$labels = array(
		'name'                => _x('Slides', 'Post Type General Name', 'text_domain'),
		'singular_name'       => _x('Slide', 'Post Type Singular Name', 'text_domain'),
		'menu_name'           => __('Slides', 'text_domain'),
		'parent_item_colon'   => __('', 'text_domain'),
		'all_items'           => __('All Slides', 'text_domain'),
		'view_item'           => __('View Slide', 'text_domain'),
		'add_new_item'        => __('Add New Slide', 'text_domain'),
		'add_new'             => __('Add New', 'text_domain'),
		'edit_item'           => __('Edit Slide', 'text_domain'),
		'update_item'         => __('Update Slide', 'text_domain'),
		'search_items'        => __('Search slides', 'text_domain'),
		'not_found'           => __('No slides found', 'text_domain'),
		'not_found_in_trash'  => __('No slides found in Trash', 'text_domain'),
	);

	$args = array(
		'label'               => __('slide', 'text_domain'),
		'description'         => __('Home page slides', 'text_domain'),
		'labels'              => $labels,
		'supports'            => array('title', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => get_bloginfo('template_directory') . '/images/admin-slides-icon.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type('slide', $args);
}

/**
 * Specials post type
 */
function specials_post_type() {
	$labels = array(
		'name'                => _x('Specials', 'Post Type General Name', 'text_domain'),
		'singular_name'       => _x('Special', 'Post Type Singular Name', 'text_domain'),
		'menu_name'           => __('Specials', 'text_domain'),
		'parent_item_colon'   => __('', 'text_domain'),
		'all_items'           => __('All Specials', 'text_domain'),
		'view_item'           => __('View Special', 'text_domain'),
		'add_new_item'        => __('Add New Special', 'text_domain'),
		'add_new'             => __('Add New', 'text_domain'),
		'edit_item'           => __('Edit Special', 'text_domain'),
		'update_item'         => __('Update Special', 'text_domain'),
		'search_items'        => __('Search specials', 'text_domain'),
		'not_found'           => __('No specials found', 'text_domain'),
		'not_found_in_trash'  => __('No specials found in Trash', 'text_domain'),
	);

	$args = array(
		'label'               => __('special', 'text_domain'),
		'description'         => __('Specials', 'text_domain'),
		'labels'              => $labels,
		'supports'            => array('title', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => get_bloginfo('template_directory') . '/images/admin-slides-icon.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type('specials', $args);
}

/**
 * tariffs post type
 */
function tariffs_post_type() {
	$labels = array(
		'name'                => _x('Tariffs', 'Post Type General Name', 'text_domain'),
		'singular_name'       => _x('Tariff', 'Post Type Singular Name', 'text_domain'),
		'menu_name'           => __('Tariffs', 'text_domain'),
		'parent_item_colon'   => __('', 'text_domain'),
		'all_items'           => __('All Tariffs', 'text_domain'),
		'view_item'           => __('View tariff', 'text_domain'),
		'add_new_item'        => __('Add New Tariff', 'text_domain'),
		'add_new'             => __('Add New', 'text_domain'),
		'edit_item'           => __('Edit Tariff', 'text_domain'),
		'update_item'         => __('Update Tariff', 'text_domain'),
		'search_items'        => __('Search tariffs', 'text_domain'),
		'not_found'           => __('No tariffs found', 'text_domain'),
		'not_found_in_trash'  => __('No tariffs found in Trash', 'text_domain'),
	);

	$args = array(
		'label'               => __('tariff', 'text_domain'),
		'description'         => __('Tariffs', 'text_domain'),
		'labels'              => $labels,
		'supports'            => array('title', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => get_bloginfo('template_directory') . '/images/admin-slides-icon.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type('tariffs', $args);
}

function mr_add_editor_styles() {
	add_editor_style('css/editor-style.css');
}

function remove_comments() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}

function remove_admin_menus() {
	remove_menu_page('edit-comments.php');
	remove_menu_page('edit.php');
}

add_action('init', 'slide_post_type', 0);
add_action('init', 'specials_post_type', 0);
add_action('init', 'tariffs_post_type', 0);
add_action('init', 'mr_add_editor_styles');
add_action('wp_before_admin_bar_render', 'remove_comments');
add_action('admin_menu', 'remove_admin_menus');