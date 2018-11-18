<?php
/*
Template name: Plantilla para Inicio
 */
get_header();
printf('<section class="container-central">');
	get_template_part('/plantillas/content');
	get_sidebar();
printf('</section>');
get_footer();
