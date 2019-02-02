<?php get_header();?>
<div class="Content-container">
  <?php get_template_part('template-parts/content-author');?>
  <main class="Main">
    <?php
      if(have_posts()): while(have_posts()): the_post();
        get_template_part('template-parts/content-search');
      endwhile; else:
        get_template_part('template-parts/content-none');
      endif;
    ?>
  </main>
  <?php get_template_part('template-parts/pagination');?>
</div>
<?php get_footer();?>
