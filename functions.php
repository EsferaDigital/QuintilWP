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

if(!function_exists('quintil_scripts')):
  function quintil_scripts() {
    $icons = 'https://file.myfontastic.com/5FPdHFK8qJXu8n3sP2T9fC/icons.css';
    $style = get_stylesheet_uri();
    $scripts = get_template_directory_uri() . '/js/global.min.js';

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
      'before_widget' => '<article id="%1$s" class="widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>'
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

require_once get_template_directory() . '/inc/custom-contact-form.php';
