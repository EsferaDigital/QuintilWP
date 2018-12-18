<?php

if(!function_exists('quintil_login_scripts')):
  function quintil_login_scripts() {
    $fonts = 'https://fonts.googleapis.com/css?family=Raleway:400,700';
    $custom = get_template_directory_uri() . '/css/custom_properties.css';
    $loginstyle = get_template_directory_uri() . '/css/login_page.css';
    $script = get_template_directory_uri() . '/js/login_page.js';

    wp_register_style('google-fonts', $fonts, array(), '1.0.0', 'all' );
    // wp_register_style('custom-properties', $custom, array(), '1.0.0', 'all' );
    wp_register_style('login-page-style', $loginstyle, array('google-fonts'), '1.0.0', 'all' );
    wp_register_script('login-page-script', $script, array('jquery'), '1.0.0', true);

    wp_enqueue_style('google-fonts');
    // wp_enqueue_style('custom-properties');
    wp_enqueue_style('login-page-style');
    wp_enqueue_script('jquery');
    wp_enqueue_script('login-page-script');
  }
endif;
add_action( 'login_enqueue_scripts', 'quintil_login_scripts' );
