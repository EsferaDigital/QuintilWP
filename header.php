<?php
printf('<!DOCTYPE html>
<html lang="' . get_bloginfo('language') . '">
<head>
	<title>' . get_bloginfo('name') . '</title>
	<meta charset="' . get_bloginfo('charset') . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="description" content="' . get_bloginfo('description') . '" />
  <link rel="icon" type="image/x-icon" href="' . get_bloginfo('template_url') . '/img/favicon.png"/>
  <link href="https://file.myfontastic.com/5FPdHFK8qJXu8n3sP2T9fC/icons.css" rel="stylesheet">
	<link rel="stylesheet" href="' . get_bloginfo('stylesheet_url') . '?t=1542910041091" />');
wp_head();
printf('
</head>

<body>
<div id="page" class="site">
	<header id="masthead" class="c-header">
');
			if(has_custom_logo()){
				the_custom_logo();
			}else{
				printf('<a href="http://localhost:8080/Quintil/"><img src="' . get_bloginfo('template_url') . '/img/logo-completo-b.png" alt="Logo"/></a>');
      }
      dynamic_sidebar('id-encabezado');
			printf('<div class="c-header-menu icon-menu" id="toggle-menu"></div>');
			$args = array(
        'theme_location' => 'menu_principal',
        'container' => 'nav',
        'container_class' => 'c-nav',
        'container_id' => 'main-nav'
      );
      wp_nav_menu($args);
	printf('
	</header>
');
