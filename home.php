<?php
/*
Template name: Plantilla para Inicio
 */
?>
<?php get_header(); ?>
<div id="modalHome1" class="card-rotate">
  <figure class="card-rotate-figure">
    <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/Que-hacemos1.jpg')); ?>" >
    <figcaption class="trasera">
      <h2 class="card-rotate-title">
        Ecosistema
      </h2>
      <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/globo.png')); ?>" >
      <p class="card-rotate-description">
        Diseñamos y ejecutamos programas que aceleran ecosistemas de emprendimiento e innovación.
      </p>
      <div class="btn-modal">Ver más</div>
    </figcaption>
  </figure>
</div>
<div id="modalHome2" class="card-rotate">
  <figure class="card-rotate-figure">
    <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/Que-hacemos2.jpg')); ?>" >
    <figcaption class="trasera">
      <h2 class="card-rotate-title">
        Empresa
      </h2>
      <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/grafico.png')); ?>" >
      <p class="card-rotate-description">
        Asistimos la incorporación de técnicas de gestión de la innovación y manejamos portafolios de innovación empresarial.
      </p>
      <div class="btn-modal">Ver más</div>
    </figcaption>
  </figure>
</div>
<div id="modalHome3" class="card-rotate">
  <figure class="card-rotate-figure">
    <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/Que-hacemos3.jpg')); ?>" >
    <figcaption class="trasera">
      <h2 class="card-rotate-title">
        Innovacion abierta
      </h2>
      <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/avion.png')); ?>" >
      <p class="card-rotate-description">
        Estamos en sintonía con la vanguardia de las nuevas técnicas y metodologías en gestión de la Innovación.
      </p>
      <div class="btn-modal">Ver más</div>
    </figcaption>
  </figure>
</div>
<?php get_footer(); ?>

