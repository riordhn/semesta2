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
                <?php // foreach($Biodata as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/saveSeminarIB' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">


                  <div class="form-group">
                      <!-- <label for="Rumpun">NIK</label> -->
                        <input type="Hidden" class="form-control" name="idmonitor" placeholder="NIK" value="<?php echo $this->session->userdata('IDMON');?> "/>

                        <input type="Hidden" class="form-control" name="semester" placeholder="NIK" value="<?php echo $this->session->userdata('sms');?> "/>
                  </div>

                  <div class="form-group">
                      <label>Jenis Kegiatan :</label>
                        <select name="jenis" id="jenis">
                          <option value="0">Seminar</option>
                          <option value="1">Pelatihan</option>
                          
                        </select>
                  </div>

                  <div class="form-group">
                      <label for="NIDN">Nama Kegiatan :</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kegiatan"/>
                  </div>

                    <div class="form-group">
                      <label>Penyelenggara :</label>
                      <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara"/>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label for="Sektor">Negara :</label><br>
                      <select name="negara" id="negara">
                      <option >----Pilih Negara----</option>
                      <?php foreach ($negara as $ne1){?>
                          <option value="<?php echo $ne1->ID_NEGARA;?>"><?php echo $ne1->NAMA_NEGARA;?></option>
                          <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Sektor">Tahun :</label><br>
                      <select name="tahun" id="tahun">
                         <option>----Pilih Tahun----</option>
                          <?php
                            $thn_skr = date('Y');
                            $thn_sblm = $thn_skr-5;
                            $thn_dpn = $thn_skr+10;
                            for ($x = $thn_sblm; $x <= $thn_dpn; $x++) {
                          ?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
                          <?php
                            }
                          ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Pindaian (Scan) Sertifikat:</label></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="sertif" /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringIBDosen'.$this->session->userdata('sms') ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                <?php //} ?>
                
                
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