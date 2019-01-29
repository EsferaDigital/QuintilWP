<aside class="comments">
  <?php if(have_comments()):?>
    <h3>
      <?php
        comments_number(
          __('No hay comentarios aún','qtl'),
          __('Hay un comentario publicado','qtl'),
          __('Hay % comentarios','qtl')
        );
      ?>
    </h3>
    <ol class="commentlist">
      <?php wp_list_comments();?>
    </ol>
  <?php endif;?>
  <?php
  $fields =  array(
    'author' =>
      '<div class="CommentForm-item"><i class="icon-user"></i><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' placeholder="Nombre Apellido *" /></div>',

    'email' =>
      '<div class="CommentForm-item"><i class="icon-mail"></i><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' placeholder="E-mail *" /></div>',

    'url' =>
      '<div class="CommentForm-item"><i class="icon-globo"></i><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" placeholder="Sitio web"/></div>',
  );
  comment_form(array(
    'title_reply' => __('Deja un comentario', 'qtl'),
    'comment_notes_before' => '<div class="CommentForm-item"><p>Tu dirección de correo electrónico no será publicada.</p><p>Los campos obligatorios están marcados con *</p></div>',
    'comment_field' => '<div class="CommentForm-item"><i class="icon-note"></i><textarea id="comment" name="comment" aria-required="true" placeholder="Comentario"></textarea></div>',
    'class_form' => 'CommentForm',
    'label_submit' => __('Enviar', 'qtl'),
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
  ));
  ?>
</aside>
