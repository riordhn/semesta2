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
                  <h3 class="box-title">Formulir Tambah Seminar</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php foreach($seminar as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/editSeminar' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">


                  <div class="form-group">
                      <!-- <label for="Rumpun">NIK</label> -->
                        <input type="Hidden" class="form-control" name="idkeg" placeholder="NIK" value="<?php echo $data->ID_KEGIATAN;?> "/>

                        <input type="Hidden" class="form-control" name="idmonitor" placeholder="NIK" value="<?php echo $data->ID_MONITORING;?> "/>

                        <input type="Hidden" class="form-control" name="semester" placeholder="NIK" value="<?php echo $data->SEMESTER;?> "/>
                  </div>

                  <div class="form-group">
                      <label>Jenis Kegiatan :</label>
                        <select name="jenis" id="jenis">
                          <?php if ($data->JENIS_KEGIATAN==0) { ?>
                          <option value="0" selected>Seminar</option>
                          <option value="1">Pelatihan</option>
                          <?php } else { ?>
                          <option value="0">Seminar</option>
                          <option value="1" selected="true">Pelatihan</option>
                          <?php } ?>
                          
                        </select>
                  </div>

                  <div class="form-group">
                      <label for="NIDN">Nama Kegiatan :</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kegiatan" value="<?php echo $data->NAMA_KEGIATAN;?> "/>
                  </div>

                    <div class="form-group">
                      <label>Penyelenggara :</label>
                      <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" value="<?php echo $data->PENYELENGGARA_KEGIATAN;?> "/>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label for="Sektor">Negara :</label>
                      <input type="text" class="form-control" name="negara" placeholder="Negara" value="<?php echo $data->NEGARA;?> "/> 
                    </div>

                    <div class="form-group">
                      <label for="Sektor">Tahun :</label>
                      <input type="text" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo $data->TAHUN_KEGIATAN;?> "/>
                    </div>

                    <div class="form-group">
                      <label>Pindaian (Scan) Sertifikat:</label></br>
                      <a href="<?php echo base_url();?>file/monitoring/<?php echo $data->FILE_UPLOAD_BUKTI ?>" target="_blank"><?php echo $data->FILE_UPLOAD_BUKTI ?></a> 
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="sertif" /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                    <input type="Hidden" class="form-control" name="filekeg" placeholder="NIK" value="<?php echo $data->FILE_UPLOAD_BUKTI;?> "/>

                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringDosen/'.'$_POST[semester]' ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                <?php } ?>
                
                
              </div><!-- /.box -->
            </div>
</div>
</div>



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