<?php

// Añade un span leer más a cada entrada
if(!function_exists('qtl_excerpt_more')):
  function qtl_excerpt_more(){
    $url_post = get_permalink();
    return "&nbsp;<a href='$url_post'><span class='vermas'>Ver más</span></a>";
  }
endif;

if(!function_exists('qtl_excerpt_length')):
  function qtl_excerpt_length(){
    return 20;
  }
endif;

add_filter('excerpt_length', 'qtl_excerpt_length');

add_filter('excerpt_more', 'qtl_excerpt_more');

?>
