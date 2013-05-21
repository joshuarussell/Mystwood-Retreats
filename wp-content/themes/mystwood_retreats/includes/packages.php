<?php
  query_posts('post_type=specials&order=ASC&posts_per_page=3');

  if(have_posts()) :
    while (have_posts()) :
      the_post();
      if(get_field('show_on_home_page')) :
?>
<article class="grid_4">
  <h2><?php the_title(); ?></h2>
  <h3><?php the_field('sub_heading'); ?></h3>
  <?php the_field('content'); ?>
  <a href="#" class="btn btn-primary">More &gt;</a>
  <?php edit_post_link( __( 'Edit Special', 'starkers' ), '', ''); ?>
</article>
<?php
      endif;
    endwhile;
  endif;
?>