<!DOCTYPE html>
<html>
   
<body class="skin-blue">
  <div class="container">
        <div class="container-fluid">
          <div class="col-md-6 col-md-offset-3" >
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header">
                  <h5><b>Semester <?php echo $this->session->userdata('sms');?></b></h5><br>
                  <h3 class="box-title"><b>Toefl</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php foreach($toef as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/editToefl/'.$data->ID_TOEFL ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="form-group">
                      <!-- <label for="Rumpun">NIK</label> -->
                       <input type="Hidden" class="form-control" name="idmonitor"  value="<?php echo $this->session->userdata('IDMON');?> "/>
                        <input type="Hidden" class="form-control" name="semester" value="<?php echo $this->session->userdata('sms');?> "/>
                        <input type="Hidden" name="namafile" value="<?php echo $data->BUKTI_TOEFL; ?>">
                        <input type="Hidden" name="status" value="<?php echo $data->SUDAH_BELUM; ?>">
                  </div>

                  <?php if ($data->SUDAH_BELUM==0) { ?>
                     <div class="form-group">
                      <label>Rencana:</label>
                      <input type="date" class="form-control" name="tglrencana" value="<?php echo $data->TGL_RENCANA; ?>" />
                    </div><!-- /.form group -->
                  <?php } else { ?> 
                    <div class="form-group">
                      <label>Nilai:</label>
                      <input type="number" class="form-control" name="skortoefl" placeholder="Skor..." value="<?php echo $data->NILAI; ?>" min="0" />
                      </select>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>Tanggal Tes:</label>
                      <input type="date" class="form-control" name="tgltes" value="<?php echo $data->TGL_TES; ?>" />
                    </div>      

                    <div class="form-group">
                      <label>Berlaku sampai dengan:</label>
                      <input type="date" class="form-control" name="tglberlaku" value="<?php echo $data->TGL_BERLAKU_SAMPAI; ?>" />
                    </div>      

                    <div class="form-group">
                      <label>Badan Penyelenggara:</label>
                      <input type="text" class="form-control" name="penyelenggara" placeholder="Tulis disini..." value="<?php echo $data->PENYELENGGARA; ?>" />
                    </div>

                    <div class="form-group">
                      <label>Unggah Bukti Sertifikat:</label>
                      <a href="<?php echo base_url().'/file/monitoring/toefl/'.$data->BUKTI_TOEFL; ?>"><?php echo $data->BUKTI_TOEFL; ?></a>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="buktitoefl" accept="application/pdf"/>
                    </div>  
                    <?php } ?>                 

                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringDosen/'.$this->session->userdata('sms') ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </div>
                </form>
                <?php } ?>          
              </div><!-- /.box -->
            </div>
        </div>
  </div>



    <!-- InputMask -->
    <script type="text/javascript">
    function yesnoCheck() {
    if (document.getElementById('belum').checked) {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none'
    }
    else {
      document.getElementById('ifNo').style.display = 'block';
      document.getElementById('ifYes').style.display = 'none';
    }

}
    </script>
    <script src="<?php echo base_url().'assets/Admin/plugins/input-mask/jquery.inputmask.js" type="text/javascript'?>"></script>
    <script src="<?php echo base_url().'assets/Admin/plugins/input-mask/jquery.inputmask.date.extensions.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/Admin/plugins/input-mask/jquery.inputmask.extensions.js'?>" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url().'assets/Admin/plugins/daterangepicker/daterangepicker.js'?>" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url().'assets/Admin/plugins/colorpicker/bootstrap-colorpicker.min.js'?>" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url().'assets/Admin/plugins/timepicker/bootstrap-timepicker.min.js'?>" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url().'assets/Admin/plugins/slimScroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url().'assets/Admin/plugins/iCheck/icheck.min.js'?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/Admin/"plugins/fastclick/fastclick.min.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/Admin/dist/js/app.min.js'?>" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url().'assets/Admin/dist/js/demo.js'?>" type="text/javascript"></script> -->