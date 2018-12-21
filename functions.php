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

//Establece el ancho máximo permitido para cualquier contenido en el temz, como video o imagenes.
if(!isset($content_width)){
  $content_width = 800;
}

if(!function_exists('quintil_scripts')):
  function quintil_scripts() {
    $icons = get_template_directory_uri() . '/css/icons.css';
    $style = get_stylesheet_uri();
    $scripts = get_template_directory_uri() . '/js/global.min.js';

    if(is_front_page()):
      wp_register_script('homescript', get_template_directory_uri() . '/js/home.js', array(), '1.0.0', true);
      wp_enqueue_script('homescript');
    endif;

    if(is_page('contactanos')):
      wp_register_script('contact-script', get_template_directory_uri() . '/js/contact_form.js', array(), '1.0.0', true);
      wp_enqueue_script('contact-script');
    endif;

    if(is_page('quienes-somos')):
      wp_register_script('somos-script', get_template_directory_uri() . '/js/somos_script.js', array(), '1.0.0', true);
      wp_enqueue_script('somos-script');
    endif;

    wp_register_style('icons', $icons, array(), '1.0.0', 'all' );
    wp_register_style('style', $style, array(), '1.0.0', 'all' );
    wp_register_script('scripts', $scripts, array('jquery'), '1.0.0', true);

    wp_enqueue_style('icons');
    wp_enqueue_style('style');
    wp_enqueue_script('jquery');
    wp_enqueue_script('scripts');
  }
endif;
add_action( 'wp_enqueue_scripts', 'quintil_scripts' );

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

// Archivos externos

require_once get_template_directory() . '/inc/custom-login.php';

// require_once get_template_directory() . '/inc/custom-contact-form.php';

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
  $msg = 'Nombre: ' . $name . '\n';
  $msg .= 'Empresa: ' . $company . '\n\n';
  $msg .= 'E-mail: ' . $email . '\n\n';
  $msg .= 'Telefono: ' . $phone . '\n\n';
	$msg .= 'Mensaje: \n\n' . $message . '\n';

	$sendmail = wp_mail( $adminmail, $subject, $msg, $headers);

  wp_redirect( home_url('/contactanos') .'?sent='. $sendmail );
}//asumiendo que existe esta url
