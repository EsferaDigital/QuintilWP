<?php
/* Template name: Página sin sidebar */
get_header();?>
<div class="Content-container Page FullWidth">
  <main class="Main">
    <?php while (have_posts()): the_post(); ?>
      <section class="PostContent">
        <?php the_title('<h2>','</h2>'); ?>
        <article><?php the_content(); ?></article>
      </section>
    <?php endwhile; ?>
  </main>
</div>
<?php get_footer(); ?>
