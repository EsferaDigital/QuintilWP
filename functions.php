<?php

function quintil_scripts() {

  wp_enqueue_style( 'quintil-style', get_stylesheet_uri() );
  wp_enqueue_script('jquery');

  $inicioSrc = get_template_directory_uri() . '/js/global.min.js';
  wp_enqueue_script('inicio-script', $inicioSrc, array(), '1.0', true);


}
add_action( 'wp_enqueue_scripts', 'quintil_scripts' );

function custom_theme(){
  //agregar soporte al tema(parametro para imagenes destacadas)
  add_theme_support( 'post-thumbnails' );
  //Array de menus
  $locations = array(
    'menu_principal' => 'Menú Principal',
    'menu_social' => 'Menú Redes Sociales'
  );
  register_nav_menus($locations);
}

 add_action('after_setup_theme', 'custom_theme' );

function quintil_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'Quintil' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Añadir widgets aquí', 'Quintil' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name' => 'Encabezado',
    'id' => 'id-encabezado',
    'description' => 'Posición de encabezado para redes sociales',
    'before_widget' => '<section class="cabecera">',
    'after_widget' => '</section>',
  ));
}
add_action( 'widgets_init', 'quintil_widgets_init' );

// Función para enviar mail
function send_mail_data(){
  $name = sanitize_text_field($_POST['name']);
  $email = sanitize_email($_POST['email']);
  $message = sanitize_textarea_field($_POST['message']);

  $adminmail = "destino@dominio.com"; //email destino
  $subject = "Formulario de contacto"; // asunto
  $headers = "Responder a: " . $name . " <" . $email . ">";

  // Cuerpo del mensaje
  $msg = "Nombre: " . $name . "\n";
  $msg .= "E-mail: " . $email . "\n\n";
  $msg .= "Mensaje: \n\n" . $message . "\n";

  $sendmail = wp_mail( $adminmail, $subject, $msg, $headers);

  wp_redirect( 'http://localhost:8080/Quintil/contactanos/?sent='.$sendmail);
}

add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );
add_action( 'admin_post_process_form', 'send_mail_data' );
