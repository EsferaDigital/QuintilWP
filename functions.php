<?php
/*
* My Quintil Theme Functions and Definitions
*
*@link https://developer.wordpress.org(themes/basic/theme-functions)
*
*@package wordpress
*@subpackage Quintil
*@since 1.0.0
*@version 1.0.0
*/

//Establece el ancho máximo permitido para cualquier contenido en el tema, como video o imagenes.
if(!isset($content_width)){
  $content_width = 800;
}

if(!function_exists('quintil_scripts')):
  function quintil_scripts() {
    $icons = get_template_directory_uri() . '/css/icons.css';
    $style = get_stylesheet_uri();
    $scripts = get_template_directory_uri() . '/js/global.min.js';
    $Jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js';

    wp_register_style('icons', $icons, array(), '1.0.0', 'all' );
    wp_register_style('style', $style, array(), '1.0.0', 'all' );

    wp_register_script('Jquery', $Jquery, array(), '1.0.0', true);
    wp_register_script('scripts', $scripts, array('Jquery'), '1.0.0', true);

    if(is_front_page()):
      wp_register_style('iniciostyle', get_template_directory_uri() . '/css/inicio.css', array(), '1.0.0', 'all');
      wp_register_script('inicioscript', get_template_directory_uri() . '/js/inicio.js', array(), '1.0.0', true);


      wp_enqueue_style('style');
      wp_enqueue_style('iniciostyle');
      wp_enqueue_script('Jquery');
      wp_enqueue_script('inicioscript');
    endif;

    if(is_page('que-hacemos')):
      wp_register_script('homescript', get_template_directory_uri() . '/js/home.js', array(), '1.0.0', true);


      wp_enqueue_style('style');
      wp_enqueue_script('Jquery');
      wp_enqueue_script('homescript');

    endif;

    if(is_page('contactanos')):
      wp_register_script('contact-script', get_template_directory_uri() . '/js/contact_form.js', array(), '1.0.0', true);

      wp_enqueue_style('style');
      wp_enqueue_script('Jquery');
      wp_enqueue_script('contact-script');
    endif;

    if(is_page('quienes-somos')):
      wp_register_script('somos-script', get_template_directory_uri() . '/js/somos_script.js', array(), '1.0.0', true);

      wp_enqueue_style('style');
      wp_enqueue_script('Jquery');
      wp_enqueue_script('somos-script');
    endif;

    wp_enqueue_style('style');
    wp_enqueue_style('icons');
    wp_enqueue_script('scripts');
  }
endif;
add_action( 'wp_enqueue_scripts', 'quintil_scripts' );

// Añade caracteristicas especiales

if(!function_exists('quintil_custom')):
  function quintil_custom(){
    add_theme_support( 'post-thumbnails' );

    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption'
    ));

    add_theme_support('custom-logo', array(
      'height' => 100,
      'width' => 100,
      'flex-height' => true,
      'flex-width' => true
    ));

    //Añade opciones de formato a las entradas
    add_theme_support('post-formats', array(
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat'
    ));

    //Paleta de colores Gutenberg
    add_theme_support( 'editor-color-palette', array(
      array(
        'name' => __( 'gris', 'qtl' ),
        'slug' => 'gris',
        'color' => '#464646',
      ),
      array(
        'name' => __( 'blanco invierno', 'qtl' ),
        'slug' => 'blanco-invierno',
        'color' => '#EEEEED',
      ),
      array(
        'name' => __( 'amarillo', 'qtl' ),
        'slug' => 'amarillo',
        'color' => '#ff9f1c',
      ),
      array(
        'name' => __( 'verde claro', 'qtl' ),
        'slug' => 'verde-claro',
        'color' => '#47A367',
      ),
    ));

    //Deshabilita colores personalizados
    add_theme_support( 'disable-custom-colors' );

    //Habilita alineación de imágenes
    add_theme_support( 'align-wide' );

    //Hace responsive los elementos embebidos
    add_theme_support( 'responsive-embeds' );

    //Permite que los themes y plugins administren el titulo. Al usarlo no debemos poner el title en el header.php
    add_theme_support('title-tag');

    //Activar Feeds RSS
    add_theme_support('automatic-feed-links');

    //Oculta version con la que se hizo este tema
    remove_action('wp_head', 'wp_generator');

    // Activa la actualización selectiva de widgets en el personalizador
    add_theme_support('customize-selective-refresh-widgets');
  }
endif;
add_action('after_setup_theme', 'quintil_custom');

// Estilos para el editor gutenberg
if(!function_exists('quintil_editor_styles')):
  function quintil_editor_styles() {
    wp_enqueue_style('editor-style', get_theme_file_uri('/css/editor-style.css'), false, '1.0.0', 'all');
  }
endif;
add_action( 'enqueue_block_editor_assets', 'quintil_editor_styles');

if(!function_exists('quintil_menus')):
  function quintil_menus(){
    $locations = array(
      'main_menu' => __('Menú Principal', 'qtl'),
      'social_menu' => __('Menú Redes Sociales', 'qtl')
    );
    register_nav_menus($locations);
  }
endif;
add_action('init', 'quintil_menus');

if(!function_exists('quintil_register_sidebars')):
  function quintil_register_sidebars(){
    register_sidebar(array(
      'name' => __('Sidebar Principal', 'qtl'),
      'id' => 'main-sidebar',
      'description' => __('Añadir widgets aquí', 'qtl'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Sidebar Cabecera', 'qtl'),
      'id' => 'header-sidebar',
      'description' => __('Redes Sociales', 'qtl'),
      'before_widget' => '<div class="header-sociales">',
      'after_widget' => '</div>'
    ));
  }
endif;
add_action('widgets_init', 'quintil_register_sidebars');

// Hooks admin-post
add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );
add_action( 'admin_post_process_form', 'send_mail_data' );

// Funcion callback
function send_mail_data() {

  $name = sanitize_text_field($_POST['name']);
  $company = sanitize_text_field($_POST['company']);
  $email = sanitize_email($_POST['email']);
  $phone = sanitize_text_field($_POST['phone']);
	$message = sanitize_textarea_field($_POST['message']);

	$adminmail = "gabrielzavando@gmail.com"; //email destino
	$subject = 'Mensaje desde la web'; //asunto
	$headers = "Reply-to: " . $name . " <" . $email . ">";

	//Cuerpo del mensaje
  $msg = "Nombre: $name \n";
  $msg .= "Empresa: $company \n";
  $msg .= "E-mail: $email \n";
  $msg .= "Telefono: $phone \n";
	$msg .= "Mensaje: $message \n";

	$sendmail = wp_mail( $adminmail, $subject, $msg, $headers);

  wp_redirect( home_url('/contactanos') .'?sent='. $sendmail );
}//asumiendo que existe esta url

// Archivos externos

// require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/inc/custom-login.php';
require_once get_template_directory() . '/inc/custom-excerpt.php';
require_once get_template_directory() . '/inc/custom-description.php';
