<aside class="Sidebar">
  <?php
    if(is_active_sidebar('main-sidebar')):
      dynamic_sidebar('main-sidebar');
    else:
  ?>
    <article class="Widget">
      <h3><?php _e('Buscar','qtl');?></h3>
      <?php get_search_form(); ?>
    </article>
  <?php
    endif;
  ?>
</aside>
