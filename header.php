<?php
printf('<!DOCTYPE html>
<html language_attributes();>
<head>
	<title>' . get_bloginfo('name') . '</title>
	<meta charset="' . get_bloginfo('charset') . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="description" content="' . get_bloginfo('description') . '" />
	<link rel="icon" type="image/x-icon" href="' . get_bloginfo('template_url') . '/img/favicon.png"/>
	<link rel="stylesheet" href="' . get_bloginfo('stylesheet_url') . '" />');
wp_head();
printf('
</head>

<body body_class() >
<div id="page" class="site">
	<header id="masthead" class="c-header">
		<div class="site-branding">
');
			if(has_custom_logo()){
				the_custom_logo();
			}else{
				printf('<a href="http://localhost:8080/Quintil/"><img src="' . get_bloginfo('template_url') . '/img/logo.png" alt="Logo"/></a>');
			}
			printf('<div class="c-header-menu icon-menu" id="toggle-menu"></div>');
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
	printf('
	</header>
');
