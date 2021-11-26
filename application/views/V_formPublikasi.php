<!DOCTYPE html>
<html>
   
  <body class="skin-blue">
  <div class="content-wrapper">
        <div class="container-fluid">
          <div class="col-md-6 col-md-offset-3" >
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header">
                  <h5><b>Semester <?php echo $this->session->userdata('sms');?></b></h5><br>
                  <h3 class="box-title">Publikasi Jurnal</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php // foreach($Biodata as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/savePublikasi' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">

                   

                  <div class="form-group">
                      <!-- <label for="Rumpun">NIK</label> -->
                       <input type="Hidden" class="form-control" name="idmonitor" placeholder="NIK" value="<?php echo $this->session->userdata('IDMON');?> "/>

                        <input type="Hidden" class="form-control" name="semester" placeholder="NIK" value="<?php echo $this->session->userdata('sms');?> "/>

                  </div>

                  <div class="form-group">
                      <label>Judul Jurnal :</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul Jurnal"/>
                  </div>

                    <div class="form-group">
                      <label>Penulis Ke- :</label>
                      <input type="number" class="form-control" name="penulis" placeholder="Penulis Ke-" min="0" />
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label for="Sektor">Afiliasi :</label>
                      <input type="text" class="form-control" name="afiliasi" placeholder="Afiliasi">
                    </div>

                    <div class="form-group">
                      <label for="Sektor">ISSN/ISBN :</label>
                      <input type="text" class="form-control" name="issn" placeholder="ISSN/ISBN">
                    </div>

                    <div class="form-group">
                      <label for="Sektor">Indeks Scopus :</label><br>
                      <select name="scopus" id="scopus" class="form-control">
                         <option value="-">----Pilih Indeks----</option>
                         <option value="Q1">Q1</option>
                         <option value="Q2">Q2</option>
                         <option value="Q3">Q3</option>
                         <option value="Q4">Q4</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Sektor">Indeks Web Of Science(WOS) :</label>
                      <input type="Number" class="form-control" name="wos" placeholder="Indeks WOS" min="0">
                    </div>

                    <div class="form-group">
                      <label for="Sektor">Indeks Sinta :</label><br>
                      <select name="shinta" id="shinta" class="form-control">
                         <option value="-">----Pilih Indeks----</option>
                         <option value="Shinta 1">Sinta 1</option>
                         <option value="Shinta 2">Sinta 2</option>
                         <option value="Shinta 3">Sinta 3</option>
                         <option value="Shinta 4">Sinta 4</option>
                         <option value="Shinta 5">Sinta 5</option>
                         <option value="Shinta 6">Sinta 6</option>

                      </select>
                    </div>                    

                    <div class="form-group">
                      <label for="Sektor">Tahun Publikasi :</label><br>
                      <select name="tahun" id="tahun" class="form-control">
                         <option >----Pilih Tahun----</option>
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
                      <label>Tautan Dokumen Buku:</label>
                      <input type="text" class="form-control" name="link" placeholder="Tautan Dokumen" /></br>
                    </div><!-- /.form group -->

                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringDosen/'.'$_POST[semester]' ?>" class="btn btn-primary">Kembali</a>
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