<footer class="c-footer">
  <div class="c-footer-sociales">
      <a href="https://www.facebook.com/QuintilValley/" class="icon-facebook" target="_blank"></a>
      <a href="https://twitter.com/ValleyQuintil" class="icon-twitter" target="_blank"></a>
      <a href="https://www.instagram.com/Quintil_Valley/" class="icon-instagram" target="_blank"></a>
  </div>
  <div>
    <small>&copy; <?php echo date('Y'); ?> Quintil Valley</small>
    <div class="autor">
      <p>Desarrollado por</p>
      <a href="https://esferadigital.cl" target="_blank">Esfera Digital</a>
    </div>
  </div>
  <div id="up" class="icon-up"></div>
  </footer>
<?php wp_footer(); ?>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "376446842846566", // Facebook page ID
            call_to_action: "Escríbenos", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
</body>
</html>
