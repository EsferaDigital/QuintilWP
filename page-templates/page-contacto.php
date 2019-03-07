<?php
/*
Template name: Contactanos
 */
?>
<?php get_header();?>
<main class="Main-contacto">
  <img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/fondo_contacto.jpg')); ?>" >
  <section class="contacto-header">
    <p>Estamos instalados en Valparaíso. Empeñados en hacer de esta ciudad la capital mundial del</p>
    <h2>Emprendimiento e innovación</h2>
    <p>lo que no impide que nos movamos por el mundo, activando ecosistemas y promoviendo relaciones virtuosas.</p>
  </section>
  <section class="Formulario">
    <h2>Contáctanos</h2>
    <?php
      if ( isset($_GET['sent']) ){
        if ( $_GET['sent'] == '1'){
          echo "<p class='modal-php-true'>Formulario enviado correctamente</p><br>";
        }else {
          echo "<p class='modal-php-false'> Hubo un error al enviar</p><br>";
        }
      }
    ?>
    <form method="post" action="<?php echo admin_url( 'admin-post.php' ) ?>" class="ContactForm" name="formulario">
      <div class="ContactForm-item">
        <i class="icon-user"></i>
        <input type="text" name="name" id="Name"placeholder="Nombre Apellido" required>
      </div>
      <div class="ContactForm-item">
        <i class="icon-group"></i>
        <input type="text" name="company" placeholder="Empresa">
      </div>
      <div class="ContactForm-item">
        <i class="icon-mail"></i>
        <input type="email" name="email" id="Email" placeholder="E-mail" required>
      </div>
      <div class="ContactForm-item">
        <i class="icon-phone"></i>
        <input type="tel" name="phone" placeholder="Teléfono">
      </div>
      <div class="ContactForm-item">
        <i class="icon-note"></i>
        <textarea name="message" id="Message" placeholder="Mensaje" cols="30" rows="10" required></textarea>
      </div>
      <div class="ContactForm-item">
        <input type="hidden" name="action" value="process_form">
        <input type="submit" name="submit" id="enviar" class="btn-enviar" value="Enviar">
      </div>
    </form>
  </section>
</main>
<?php get_footer();?>
