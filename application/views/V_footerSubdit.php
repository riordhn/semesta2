<!-- Footer SEMESTA -->
<footer class="main-footer">
  <div class="container-fluid">
    <div style="background: #4F5155; color: #FFFFFF;">
      <div class="container">
          <ul class="col-xs-12 col-sm-12 col-md-4 col-lg-4">&copy; <?php echo date("Y"); ?>. Direktorat Sumber Daya Manusia Universitas Airlangga.</ul>
          <ul class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <p><strong>Helpdesk</strong></p>
              <p>Subdit PSDM, Gedung Kantor Manajemen, Lantai 3&nbsp;
                  <br>Kampus C Mulyorejo, Surabaya 60115&nbsp;
                  <br>Telp. (031) 5914042 ext. 308 Fax. (031) 5920032
                  <br>Email : semesta@sdm.unair.ac.id</p>
          </ul>
          <ul class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <p><strong>Direktorat Sumber Daya Manusia</strong></p>
              <p>Gedung Kantor Manajemen, Lantai 1&nbsp;
                  <br>Kampus C Mulyorejo, Surabaya 60115&nbsp;
                  <br>Telp. (031) 5914042 ext. 119 Fax. (031) 5920032</p>
          </ul>
      </div>
    </div>
  </div><!-- /.container -->
</footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url().'assets/Admin/plugins/jQuery/jQuery-2.1.3.min.js'?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url().'assets/Admin/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/Admin/plugins/slimScroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url().'assets/Admin/plugins/fastclick/fastclick.min.js'?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/Admin/dist/js/app.min.js'?>" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url().'assets/Admin/dist/js/demo.js'?>" type="text/javascript"></script> -->


<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url().'assets/Admin/plugins/datatables/jquery.dataTables.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/Admin/plugins/datatables/dataTables.bootstrap.js'?>" type="text/javascript"></script>
    <!-- page script -->
<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": false,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false
    });
  });
</script>
</body>
</html>
