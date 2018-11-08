<?php
printf('<main class="c-content">');
	//Lógica de the_loop
	//Si (hay entradas)
		//mientras(hay entradas)
			//muestra la info de las entradas
	//Si no
		//Mensaje de no hay entradas
	//Limpiar el loop
	if( have_posts() ):
		while( have_posts() ):
			the_post();
			//creamos una variable en la que iremos insertando los datos
			$html = '
				<article class="c-content-item">
					<a href="%s">%s</a>					
					<h1 class="item-title">%s</h1>	
					<div class="item-autor">Por: <a href="%s">%s</a></div>				
					<p>%s</p>
					<div class="item-texto">%s</div>
					<div class="item-category">%s</div>
					<p class="item-tags">%s</p>
				</article>
			';
			printf(
				$html,
				get_the_permalink(),
				get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'imagen-destacada' ) ),
				get_the_title(),
				get_author_posts_url(get_the_author_meta('id')),
				get_the_author(),				
				get_the_date(),
				// get_the_time(),
				get_the_content(),
				get_the_category_list( ' - ' ),
				get_the_tag_list('<p class="tag icon-tag"> ',' ','</p>')
			);
		endwhile;
	else:
		printf('<p>No hay entradas disponibles</p>');
	endif;
	rewind_posts();
printf('</main>');