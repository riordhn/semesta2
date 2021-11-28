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
                <?php  foreach($tugas as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/editTAIB/'.$data->ID_TUGAS ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                  <!-- <div class="form-group"> -->
                      <!-- <label for="Rumpun">NIK</label> -->
                       <input type="Hidden" name="idmonitor"  value="<?php echo $this->session->userdata('IDMON');?> "/>
                        <input type="Hidden" name="semester" value="<?php echo $this->session->userdata('sms');?> "/>
                        <input type="Hidden"  name="namabimbingan"  value="<?php echo $data->BUKTI_BIMBINGAN;?> ">
                        <input type="Hidden" name="namasa" value="<?php echo $data->BUKTI_SA;?> ">
                        <input type="Hidden" name="statusupros" value="<?php echo $data->UJIAN_PROPOSAL;?> ">
                        <input type="Hidden" name="statuskelnas" value="<?php echo $data->PENILAIAN_PLAGIASI;?> ">
                        <input type="Hidden" name="statusseminar" value="<?php echo $data->SEMINAR_AKHIR;?> ">
                        
                  <!-- </div> -->

                  <div class="form-group">
                      <label>Unggah Bukti Bimbingan :</label>
                      <a href="<?php echo base_url().'/file/monitoring/tugas/'.$data->BUKTI_BIMBINGAN; ?>"><?php echo $data->BUKTI_BIMBINGAN; ?></a>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="buktibimbingan" />
                  </div> 

                  <div class="form-group" style="background-color: lightgrey">
                      <label>Ujian Proposal:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if ($data->UJIAN_PROPOSAL==1) { ?>
                        <mark style="background-color: lightgreen;"><b>SUDAH</b></mark>
                      <?php }else{ ?>
                        <mark style="background-color: orangered;"><b>BELUM</b></mark>
                      <?php } ?>
                  </div>

                    <?php if ($data->UJIAN_PROPOSAL==0) { ?>
                     <div class="form-group">
                      <label>Rencana Ujian Proposal:</label>
                      <input type="date" class="form-control" name="tglrencanaupros" value="<?php echo $data->TGL_RENCANA_UP ?>" />
                    </div><!-- /.form group -->
                  
                  <?php } else {?>
                    
                    <div class="form-group">
                      <label>Tanggal Ujian Proposal:</label>
                      <input type="date" class="form-control" name="tglupros" value="<?php echo $data->TGL_UJIAN_PROPOSAL ?>"/>
                    </div><!-- /.form group -->
                  <?php } ?>


                  <div class="form-group" style="background-color: lightgrey">
                      <label>Penilaian Kelayakan Naskah:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if ($data->PENILAIAN_PLAGIASI==1) { ?>
                        <mark style="background-color: lightgreen;"><b>SUDAH</b></mark>
                      <?php }else{ ?>
                        <mark style="background-color: orangered;"><b>BELUM</b></mark>
                      <?php } ?>
                  </div>

                    <?php if ($data->PENILAIAN_PLAGIASI==0) { ?>
                     <div class="form-group">
                      <label>Rencana Penilaian:</label>
                      <input type="date" class="form-control" name="tglrencanakelnas" value="<?php echo $data->TGL_RENCANA ?>"/>
                    </div><!-- /.form group -->
                  <?php } else { ?>
                
                    <div class="form-group">
                      <label>Tanggal Penilaian:</label>
                      <input type="date" class="form-control" name="tglkelnas" value="<?php echo $data->TGL_TES ?>"/>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>Hasil Penilaian (%):</label>
                      <input type="number" class="form-control" name="hasilpenilaian" placeholder="Tulis disini..." min="0" value="<?php echo $data->HASIL ?>"/>
                    </div> 
                  <?php } ?>
                  

                  <div class="form-group" style="background-color: lightgrey">
                      <label>Seminar Akhir:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if ($data->SEMINAR_AKHIR==1) { ?>
                        <mark style="background-color: lightgreen;"><b>SUDAH</b></mark>
                      <?php }else{ ?>
                        <mark style="background-color: orangered;"><b>BELUM</b></mark>
                      <?php } ?>
                  </div>

                  <?php if ($data->SEMINAR_AKHIR==0) { ?>
                     <div class="form-group">
                      <label>Rencana Seminar:</label>
                      <input type="date" class="form-control" name="tglrencanaseminar" value="<?php echo $data->TGL_RENCANA_SA ?>"/>
                    </div><!-- /.form group -->
                  <?php } else { ?>

                    <div class="form-group">
                      <label>Kategori :</label>
                      <select class="form-control" name="kategoriseminar" >
                        <option value="<?php echo $data->KATEGORI_SA ?>" selected><?php echo $data->KATEGORI_SA ?></option>
                        <option value="">---Pilih---</option>
                        <option value="Ujian Tertutup">Ujian Tertutup</option>
                        <option value="Ujian Terbuka">Ujian Terbuka</option>
                        <option value="Tesis">Tesis</option>
                        <option value="Skripsi">Skripsi</option>
                      </select>
                    </div><!-- /.form group -->     

                    <div class="form-group">
                      <label>Tanggal Seminar Akhir :</label>
                      <input type="date" class="form-control" name="tglseminar" value="<?php echo $data->TGL_SA ?>" />
                    </div> 

                    <div class="form-group">
                      <label>Unggah bukti dukung / surat keterangan seminar :</label>
                      <a href="<?php echo base_url().'/file/monitoring/tugas/'.$data->BUKTI_SA; ?>"><?php echo $data->BUKTI_SA; ?></a>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="buktiseminar" />
                    </div>

                    <?php } ?>                   


                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringIBDosen/'.$this->session->userdata('sms') ?>" class="btn btn-primary">Kembali</a>
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