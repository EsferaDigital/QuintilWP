<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <title><?php wp_title('', true, 'right');?></title>
  <meta charset="<?php bloginfo( 'charset' )?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="<?php bloginfo('description') ?>" />
  <link rel="icon" type="image/x-icon" href="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/favicon.png')); ?>" />
<?php wp_head();?>
</head>
<body>
  <header id="mainHeader" class="Header">
    <div class="logo">
      <?php
        if(has_custom_logo()):
          the_custom_logo();
        else: ?>
          <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(home_url('/wp-content/themes/quintil/img/logo-completo-b.png')); ?>"></a>
        <?php endif; ?>
    </div>
    <?php dynamic_sidebar('header-sidebar'); ?>
    <div class="btn-menu">
      <i class="icon-menu" id="toggleMenu"></i>
    </div>
  <?php
    if(has_nav_menu('main_menu')):
      wp_nav_menu(array(
        'theme_location' => 'main_menu',
        'container' => 'nav',
        'container_class' => 'menu',
        'container_id' => 'mainMenu'
      ));
    else: ?>
    <nav class="menu" id="mainMenu">
      <ul>
        <?php wp_list_pages('title_li');?>
      </ul>
    </nav>
  <?php endif; ?>
  </header>
