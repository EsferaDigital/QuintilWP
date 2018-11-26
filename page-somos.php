<?php
/*
Template name: Plantilla para Quienes Somos
 */
get_header();
while (have_posts()) : the_post();
  the_content();
endwhile;
get_footer();
