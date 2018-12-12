<?php get_header();?>
<?php while(have_posts()) : the_post(); ?>
  <section>
    <h1>Plantilla Page.php</h1>
    <?php the_title();?>
    <?php the_content();?>
  </section>
<?php endwhile; ?>
<?php get_footer();?>
