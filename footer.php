<footer class="c-footer">
    <?php
      wp_nav_menu(array(
        'theme_location' => 'social_menu',
        'container' => 'nav',
        'container_class' => 'menu-social'
      ));
    ?>
    <div>
      <small>&copy; <?php echo date('Y'); ?> Quintil Valley</small>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>
</html>
