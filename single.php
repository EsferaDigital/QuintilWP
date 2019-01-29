<?php get_header();?>
<div class="Content-container">
  <article class="Widget widget-single">
    <?php get_search_form(); ?>
  </article>
  <main class="Main Single">
  <?php
    if(have_posts()): while(have_posts()): the_post();
      get_template_part('template-parts/content-single');
    endwhile; else:
      get_template_part('template-parts/content-none');
    endif;
  ?>
  </main>
  <?php comments_template();?>
</div>
<style>
  .Search{
    top: .5rem;
  }
</style>
<?php get_footer();?>
