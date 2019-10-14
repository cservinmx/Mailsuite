
  <!-- /.content-wrapper -->
<?php
/*
 * Update 11-10-2019
 * Carlos Servín carlos@servin.mx
 * Mailsuite www.servin.mx
 * construct_footer 11-10-2019
 */


if(isset($this->session->userdata['logged_in'])){
  require_once('template/footer.php'); ?>
  <!-- Control Sidebar -->
  <?php  require_once('template/settings.php'); } ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



</body>
</html>
