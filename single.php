<?php get_header(); ?>
<h1>Soy el single.php</h1>
<?php while (have_posts())
:the_post();?>
<?php the_content();?>
<?php endwhile; ?>
<?php get_footer(); ?>
