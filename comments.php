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
  <?php comment_form();?>
</aside>
