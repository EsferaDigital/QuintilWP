<?php
/*
Template name: Plantilla para Somos
 */
?>
<?php get_header(); ?>
<section class="c-somos">
  <div class="c-somos-img">
    <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/hacemos1.jpg')); ?>">
    <figcaption>
      <h2>Ecosistema</h2>
      <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/globo.png')); ?>">
    </figcaption>
  </div>
  <article class="c-somos-article">
    <div class="c-somos-article-parrafos">
      <p>Diseñamos y ejecutamos programas que aceleran ecosistemas de emprendimiento e innovación. Participamos en las etapas iniciales de definiciones estratégicas para el desarrollo de cada ecosistema y realizamos acciones de fortalecimiento y medición de su impacto.</p>
      <p>Trabajamos en red, sumando a organizaciones especialistas en cada área, complementando nuestras capacidades y nuestro método, ampliando así nuestra cobertura.</p>
      <p>Convocando a los actores claves, facilitamos el trabajo colaborativo entre los componentes de cada ecosistema. Nos mantenemos actualizados, gracias a la revisión permanente y estudio de nuevas metodologías y lecciones de referencia.</p>
      <p>Apoyamos a organizaciones gubernamentales, universidades, gremios y empresas que asumen el desafío de Innovar. En nuestro andar, hemos apoyado al desarrollo de diversos ecosistemas universitarios, atendiéndolos desde sus particularidades y las características de su entorno, creando e implementando diversos planes para potenciar sus capacidades de innovación y emprendimiento. Hemos acompañado también a gremios empresariales en su rol promotor del ecosistema.</p>
    </div>
    <div class="c-somos-article-img">
      <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/desafios.jpg')); ?>">
      <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/flor.jpg')); ?>">
      <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/aprendiendo.jpg')); ?>">
    </div>
  </article>
</section>
<?php get_footer(); ?>
