<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]><html dir="ltr" lang="en-US"class="no-js iem7"><![endif]-->
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie6 oldie"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie7 oldie"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" class="no-js ie8 oldie"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="en-US" class="no-js"><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php

        global $page, $paged;

        wp_title( '|', true, 'right' );

        bloginfo( 'name' );

        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'starkers' ), max( $paged, $page ) );

        ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>

        <?php
            wp_head();
        ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="container_16">
            <header id="header" class="grid_16">
                <nav id="social-networks">
                    <ul>
                        <li class="facebook"><a href="http://www.facebook.com/pages/Mystwood-Retreats/161117837274504">Facebook</a></li>
                        <li class="twitter"><a href="#">Twitter</a></li>
                        <li class="email"><a href="mailto:info@mystwood.com.au">Email</a></li>
                    </ul>
                </nav>
                <hgroup>
                    <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <h2><?php bloginfo( 'description' ); ?></h2>
                </hgroup>
                <?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'main-menu', 'theme_location' => 'primary' ) ); ?>
            </header>
            <?php if(is_front_page()) : ?>
            <section id="carousel" class="grid_12">
                <?php
                    query_posts('post_type=slide');
                    if(have_posts()) :
                    if($wp_query->post_count > 1) :
                ?>
                <ul id="carousel-controls">
                    <li class="prev"><a href="#prev">Previous</a></li>
                    <li class="next"><a href="#next">Next</a></li>
                </ul>
                <ul id="carousel-pager"></ul>
                <?php endif; ?>
                <ul id="carousel-buttons">
                    <li><a href="/specials" class="btn">Specials &gt;</a></li>
                    <li><a href="http://book.resonline.com.au/make-booking?ap=325750" class="btn">Book Now &gt;</a></li>
                </ul>
                <div id="carousel-items">
                    <?php
                        $i = 1;
                        while (have_posts()) :
                            the_post();
                    ?>
                    <div class="item<?php echo (($i == 1) ? ' first-child' : '') ?>">
                        <?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
                    </div>
                    <?php $i++; endwhile; ?>
                </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>









