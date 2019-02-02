<?php get_header();?>
<div class="Content-container">
  <article class="Widget">
    <h3 class="Widget-title-search"><?php _e('Resultados para la búsqueda:', 'qtl');?></h3>
    <mark><?php echo get_search_query();?></mark>
    <?php get_search_form(); ?>
  </article>
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
