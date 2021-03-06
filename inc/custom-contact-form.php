<?php

if(!function_exists('quintil_contact_table')):
  function quintil_contact_table(){
    global $wpdb;
    global $contact_table_version;
    $contact_table_version = '1.0.0';
    $table = $wpdb->prefix . 'contact_form';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
      CREATE TABLE $table (
        contact_id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        subject VARCHAR(50) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        comments LONGTEXT NOT NULL,
        contact_date DATETIME NOT NULL,
        PRIMARY KEY (contact_id)
      )$charset_collate;
      ";

      require_once ABSPATH . 'wp-admin/includes/upgrade.php';

      dbDelta($sql);
      add_option('contact_table_version', $contact_table_version);
  }
endif;

add_action('after_setup_theme','quintil_contact_table');

if(!function_exists('quintil_contact_form_menu')):
  function quintil_contact_form_menu(){
    add_menu_page('Contacto','Contacto','administrator','contact_form','quintil_contact_form_comments','dashicons-id-alt',20);
    add_submenu_page('contact_form','Todos los Contactos','Todos los Contactos','administrator','contact_form_comments','quintil_contact_form_comments');
  }
endif;

add_action('admin_menu','quintil_contact_form_menu');

if(!function_exists('quintil_contact_form_comments')):
  function quintil_contact_form_comments(){
  ?>
    <div class="wrap">
      <h1><?php _e('Contactos de la web','quintil');?></h1>
      <table class="wp-list-table widefat striped">
        <thead>
          <tr>
            <th class="manage-column"><?php _e('Id','quintil');?></th>
            <th class="manage-column"><?php _e('Nombre','quintil');?></th>
            <th class="manage-column"><?php _e('Email','quintil');?></th>
            <th class="manage-column"><?php _e('Empresa','quintil');?></th>
            <th class="manage-column"><?php _e('Mensaje','quintil');?></th>
            <th class="manage-column"><?php _e('Fecha','quintil');?></th>
            <th class="manage-column"><?php _e('Telefono','quintil');?></th>
            <th class="manage-column"><?php _e('Eliminar','quintil');?></th>
          </tr>
        </thead>
        <tbody>
          <?php
            global $wpdb;
            $table = $wpdb->prefix . 'contact_form';
            $rows = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
            // echo '<pre>';
            //   var_dump($rows);
            // echo '</pre>';
            foreach($rows as $row):
          ?>
            <tr>
              <td><?php echo $row['contact_id'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['subject'];?></td>
              <td><?php echo $row['comments'];?></td>
              <td><?php echo $row['contact_date'];?></td>
              <td><?php echo $row['phone'];?></td>
              <td>
                <a href="#" class="u-delete" data-contact-id="<?php echo $row['contact_id'];?>">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php
  }
endif;

if(!function_exists('quintil_contact_form')):
  function quintil_contact_form($atts){
    ?>
      <form class="ContactForm" method="POST">
        <legend><?php echo $atts['title']; ?></legend>
        <input type="text" name="name" placeholder="Nombre Apellido">
        <input type="text" name="company" placeholder="Empresa">
        <input type="email" name="email" placeholder="E-mail">
        <input type="tel" name="phone" placeholder="Teléfono">
        <textarea name="comments" cols="50" rows="5" placeholder="Mensaje"></textarea>
        <button type="submit">ENVIAR</button>
        <input type="hidden" name="send_contact_form" value="1">
      </form>
    <?php
  }
endif;

add_shortcode('contact_form','quintil_contact_form');

if(!function_exists('quintil_contact_scripts')):
  function quintil_contact_scripts() {
    if(is_page('contactanos')):
      // wp_register_style('contact-form-style', get_template_directory_uri() . '/css/contact_form.css', array(), '1.0.0', 'all');
      // wp_enqueue_style('contact-form-style');

      wp_register_script('contact-form-script', get_template_directory_uri() . '/js/contact_form.js', array(), '1.0.0', true);
      wp_enqueue_script('contact-form-script');
    endif;
  }
endif;
add_action( 'wp_enqueue_scripts', 'quintil_contact_scripts' );

if(!function_exists('quintil_contact_form_save')):
  function quintil_contact_form_save(){
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_contact_form'])):

      global $wpdb;
      $name = sanitize_text_field($_POST['name']);
      $company = sanitize_text_field($_POST['company']);
      $email = sanitize_text_field($_POST['email']);
      $phone = sanitize_text_field($_POST['phone']);
      $comments = sanitize_text_field($_POST['comments']);

      $table = $wpdb->prefix . 'contact_form';

      $form_data = array(
        'name' => $name,
        'email' => $email,
        'subject' => $company,
        'phone' => $phone,
        'comments' => $comments,
        'contact_date' => date('Y-m-d H:m:s')
      );

      $form_formats = array('%s','%s','%s','%s','%s','%s');

      $wpdb->insert($table, $form_data,$form_formats);

      $url = get_page_by_title('Gracias por escribirnos');
      wp_redirect(get_permalink($url->ID));
      exit();

    endif;
  }
endif;

add_action('init', 'quintil_contact_form_save');

if(!function_exists('quintil_contact_admin_script')):
  function quintil_contact_admin_script(){
    wp_register_script('contact-form-admin-script', get_template_directory_uri() . '/js/contact_form_admin.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('contact-form-admin-script');

    //Pasar valores de PHP a JS en notación de Objeto
    wp_localize_script(
      'contact-form-admin-script',
      'contact_form',
      array(
        'name' => 'Módulo de Comentarios de Contacto',
        'ajax_url' => admin_url('admin-ajax.php')
      )
    );
  }
endif;

add_action('admin_enqueue_scripts','quintil_contact_admin_script');

if(!function_exists('quintil_contact_form_delete')):
  function quintil_contact_form_delete(){
    if(isset($_POST['id'])):
      global $wpdb;
      $table = $wpdb->prefix . 'contact_form';
      $delete_row = $wpdb->delete($table, array('contact_id' => $_POST['id']),array('%d'));

      if($delete_row){
        $response = array(
          'err' => false,
          'msg' => 'Se elimino el comentario con el ID' . $_POST['id']
        );
      }else {
        $response = array(
          'err' => true,
          'msg' => 'No se elimino el contacto con el ID' . $_POST['id']
        );
      }
      die(json_encode($response));
    endif;
  }
endif;

add_action('wp_ajax_quintil_contact_form_delete', 'quintil_contact_form_delete');
?>
