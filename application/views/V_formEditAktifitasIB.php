<!DOCTYPE html>
<html>
   
  <body class="skin-blue">
  <div class="content-wrapper">
        <div class="container-fluid">
          <div class="col-md-6 col-md-offset-3" >
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header">
                  <h5><b>Semester <?php echo $this->session->userdata('sms');?> </b></h5><br>
                  <h3 class="box-title">Aktivitas Studi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php foreach($aktifitas as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/editAktifitasIB' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">


                  <div class="form-group">
                      <!-- <label for="Rumpun">NIK</label> -->
                        <input type="Hidden" class="form-control" name="idaktif" placeholder="NIK" value="<?php echo $data->ID_AKTIVITAS_IB;?> "/>

                        <input type="Hidden" class="form-control" name="idmonitor" placeholder="NIK" value="<?php echo $data->ID_MONITORING_IB;?> "/>

                        <input type="Hidden" class="form-control" name="semester" placeholder="NIK" value="<?php echo $data->SEMESTER;?> "/>
                  </div>

                  <div class="form-group">
                      <label for="NIDN">SKS Kredit:</label>
                        <input type="number" class="form-control" name="sks" placeholder="SKS" value="<?php echo $data->SKS;?>" required/>
                  </div>

                    <div class="form-group">
                      <label>IPS:</label>
                      <input type="text" class="form-control" name="ips" placeholder="IPS" value="<?php echo $data->IPS;?> " required/>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>IPK:</label>
                      <input type="text" class="form-control" name="ipk" placeholder="IPK" value="<?php echo $data->IPK;?> " required>
                    </div>      

                    <div class="form-group">
                      <label>Berkas KHS:</label>&nbsp&nbsp</br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="khs" /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                    <input type="Hidden" class="form-control" name="filekhs" placeholder="NIK" value="<?php echo $data->FILE_KHS;?> "/>

                    <div class="form-group">
                      <label>Berkas KRS:</label>&nbsp&nbsp</br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="krs" /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                    <input type="Hidden" class="form-control" name="filekrs" placeholder="NIK" value="<?php echo $data->FILE_KRS;?> "/>

                    <div class="form-group">
                      <label for="deskripsi">Deskripsi Progres Penelitian Disertasi (%):</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" cols="80"><?php echo $data->DESKRIPSI_PROGRES_PENELITIAN_DISERTASI_THESIS;?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Persentase Pengerjaan Disertasi ( % ) :</label>
                      <input type="number" class="form-control" name="persen" placeholder="Persentase Pengerjaan" value="<?php echo $data->PRESENTASE_PENGERJAAN_DISERTASI_THESIS;?>">
                    </div>              

                    <div class="form-group">
                      <label>Berkas Disertasi:</label></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="disertasi" /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                    <input type="Hidden" class="form-control" name="filediser" placeholder="NIK" value="<?php echo $data->FILE_DISERTASI_THESIS;?> "/>

                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringIBDosen/'.'$_POST[semester]' ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                <?php } ?>
                
                
              </div><!-- /.box -->
            </div>
</div>
</div>


    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('deskripsi');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <!-- InputMask -->
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
    <script src="<?php echo base_url().'assets/Admin/dist/js/demo.js'?>" type="text/javascript"></script>