<!DOCTYPE html>
<html>
   
  <body class="skin-blue">
  <div class="container">
        <div class="container-fluid">
          <div class="col-md-6 col-md-offset-3" >
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header">
                  <h5 class="text-center"><b>Langkah 2 dari 4 Usulan Tugas Belajar</b></h5><br>
                  <h3 class="box-title text-center">Formulir Pengajuan Tugas Belajar</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url().'C_dosen/saveTb' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">

                    <input type="hidden" class="form-control" name="NIK" placeholder="NIK" value="<?php echo $this->session->userdata('NIK')?>" />
                    

                    <div class="form-group">
                      <label>Jenjang Pendidikan Penyelenggara:</label></br>
                      <select class="form-control" name="jenjang" id="jenjang" required>
                          <option value="">Pilih Jenjang</option>
                          <?php foreach ($jenjang as $k){ ?>
                          <option value="<?php echo $k->ID_JENJANG ?>"><?php echo $k->NAMA_JENJANG ?></option>
                          <?php } ?>
                      </select>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label for="Sektor">Lokasi Perguruan Tinggi Tugas Belajar:</label></br>
                      <select class="form-control" name="perguruan" id="perguruan" required>
                          <option value="">Pilih Lokasi PT TB</option>
                          <option value="0">Dalam Negeri</option>
                          <option value="1">Luar Negeri</option>

                      </select>
                    </div>

                    <div style="display: none;" id="negara">
                      <div class="form-group">
                        <label for="Sektor">Pilih Negara:</label></br>
                        <select class="form-control" name="negara" id="ln">
                        <option value="">--Pilih Negara--</option>
                        <?php foreach ($negara as $ne3){?>
                            <option value="<?php echo $ne3->ID_NEGARA;?>"><?php echo $ne3->NAMA_NEGARA;?></option>
                        <?php } ?>

                        </select>
                      </div>
                    </div>

                    <div style="display: none;" id="negara1">
                      <div class="form-group">
                        <label>Pilih Negara:</label></br>
                         <input class="form-control" type="hidden" id="dn" value="109">
                        <input class="form-control" type="text" name="nama_negara" value="Indonesia" readonly>                 
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Nama Perguruan Tinggi:</label>
                        <input type="text" class="form-control" name="NamaPT" placeholder="Nama Perguruan Tinggi" required/>
                    </div>

                    <div class="form-group">
                      <label for="Bidang">Bidang:</label>
                        <input type="text" class="form-control" name="bidang" placeholder="Bidang **Contoh:Ilmu Komputer" required/>
                    </div>

                    <div class="form-group">
                      <label for="mulai">Mulai Tugas Belajar:</label>
                        <input type="date" class="form-control" name="mulai" required/>
                    </div>

                    <!-- <div class="form-group">
                      <label for="selesai">Selesai Tugas Belajar:</label>
                        <input type="date" class="form-control" name="selesai" required/>
                    </div> -->

                    <div class="form-group">
                      <label for="jaminan">Jenis Pembiayaan :</label><br>
                        <select class="form-control" name="Jenis" required>
                          <option value="">Pilih Jenis Pembiayaan</option>
                          <option value="0">Dalam Negeri</option>
                          <option value="1">Luar Negeri</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="sumber">Sumber Pembiayaan:</label>
                        <input type="text" class="form-control" name="sumber" placeholder="Sumber Pembiayaan" required/>
                    </div>

                    <div class="form-group">
                      <label for="Tahun">Tahun Pembiayaan:</label></br>
                      <select class="form-control" name="tahun" id="tahun" required>
                          <option value="">----Pilih Tahun----</option>
                          <?php
                            $thn_skr = date('Y');
                            $thn_sblm = $thn_skr-10;
                            $thn_dpn = $thn_skr+10;
                            for ($x = $thn_sblm; $x <= $thn_dpn; $x++) {
                          ?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
                          <?php
                            }
                          ?>

                      </select>
                    </div>



                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/formtb' ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </form>
                
                
              </div><!-- /.box -->
            </div>
            </div>
            </div>



     <script type="text/javascript">
      $(document).ready(function(){
        $('#perguruan').on('change', function(){
          if (this.value == '1') {
            $('#negara').show();
            $('#negara1').hide();
            document.getElementById('ln').setAttribute('required','required');
            document.getElementById('dn').setAttribute('name','negarax');
          } else {
            $('#negara1').show();
            $('#negara').hide();
            document.getElementById('ln').setAttribute('name','negarax');
            document.getElementById('dn').setAttribute('name','negara');
          }
        });
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
    <!-- <script src="<?php echo base_url().'assets/Admin/dist/js/demo.js'?>" type="text/javascript"></script> -->