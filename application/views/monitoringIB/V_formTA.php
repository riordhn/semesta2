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
                  <h3 class="box-title"><b>TUGAS AKHIR</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php // foreach($Biodata as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/saveTAIB' ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                      <!-- <label for="Rumpun">NIK</label> -->
                       <input type="Hidden" class="form-control" name="idmonitor"  value="<?php echo $this->session->userdata('IDMON');?> "/>
                        <input type="Hidden" class="form-control" name="semester" value="<?php echo $this->session->userdata('sms');?> "/>
                  </div>

                  <div class="form-group">
                      <label>Unggah Bukti Bimbingan :</label>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="buktibimbingan" />
                  </div> 

                  <div class="form-group" style="background-color: lightgrey">
                      <label>Ujian Proposal:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="sudah" name="statusupros" value="1" onclick="javascript:yesnoCheck();" required>
                        <label for="sudah">Sudah</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="belum" name="statusupros" value="0" onclick="javascript:yesnoCheck();" required>
                        <label for="belum">Belum</label>
                  </div>

                  <div id="ifYes" style="display: none">
                     <div class="form-group">
                      <label>Rencana Ujian Proposal:</label>
                      <input type="date" class="form-control" name="tglrencanaupros" />
                    </div><!-- /.form group -->
                  </div>

                  <div id="ifNo" style="display: none">
                    <div class="form-group">
                      <label>Tanggal Ujian Proposal:</label>
                      <input type="date" class="form-control" name="tglupros" />
                    </div><!-- /.form group -->
                  </div>

                  <div class="form-group" style="background-color: lightgrey">
                      <label>Penilaian Kelayakan Naskah:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="sudah1" name="statuskelnas" value="1" onclick="javascript:kelayakan();" required>
                        <label for="sudah1">Sudah</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="belum1" name="statuskelnas" value="0" onclick="javascript:kelayakan();" required>
                        <label for="belum1">Belum</label>
                  </div>

                  <div id="iya" style="display: none">
                     <div class="form-group">
                      <label>Rencana Penilaian:</label>
                      <input type="date" class="form-control" name="tglrencanakelnas" />
                    </div><!-- /.form group -->
                  </div>

                  <div id="tidak" style="display: none">
                    <div class="form-group">
                      <label>Tanggal Penilaian:</label>
                      <input type="date" class="form-control" name="tglkelnas" />
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>Hasil Penilaian (%):</label>
                      <input type="number" class="form-control" name="hasilpenilaian" placeholder="Tulis disini..." min="0" />
                    </div> 
                  </div>

                  <div class="form-group" style="background-color: lightgrey">
                      <label>Seminar Akhir:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="sudah2" name="statusseminar" value="1" onclick="javascript:seminar();" required>
                        <label for="sudah2">Sudah</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="belum2" name="statusseminar" value="0" onclick="javascript:seminar();" required>
                        <label for="belum2">Belum</label>
                  </div>

                  <div id="iya2" style="display: none">
                     <div class="form-group">
                      <label>Rencana Seminar:</label>
                      <input type="date" class="form-control" name="tglrencanaseminar" />
                    </div><!-- /.form group -->
                  </div>

                  <div id="tidak2" style="display: none">
                    <div class="form-group">
                      <label>Kategori :</label>
                      <select class="form-control" name="kategoriseminar" >
                        <option value="">---Pilih---</option>
                        <option value="Ujian Tertutup">Ujian Tertutup</option>
                        <option value="Ujian Terbuka">Ujian Terbuka</option>
                        <option value="Tesis">Tesis</option>
                        <option value="Skripsi">Skripsi</option>
                      </select>
                    </div><!-- /.form group -->     

                    <div class="form-group">
                      <label>Tanggal Seminar Akhir :</label>
                      <input type="date" class="form-control" name="tglseminar" />
                    </div> 

                    <div class="form-group">
                      <label>Unggah bukti dukung / surat keterangan seminar :</label>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="buktiseminar" />
                    </div>                   

                  </div>

                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringIBDosen/'.$this->session->userdata('sms') ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </div>
                </form>
                <?php //} ?>              
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

    <script type="text/javascript">
      function kelayakan() {
      if (document.getElementById('belum1').checked) {
          document.getElementById('iya').style.display = 'block';
          document.getElementById('tidak').style.display = 'none'
      }
      else {
        document.getElementById('tidak').style.display = 'block';
        document.getElementById('iya').style.display = 'none';
      }

    }
    </script>

    <script type="text/javascript">
    function seminar() {
      if (document.getElementById('belum2').checked) {
          document.getElementById('iya2').style.display = 'block';
          document.getElementById('tidak2').style.display = 'none'
      }
      else {
        document.getElementById('tidak2').style.display = 'block';
        document.getElementById('iya2').style.display = 'none';
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
    <script src="<?php echo base_url().'assets/Admin/dist/js/demo.js'?>" type="text/javascript"></script>