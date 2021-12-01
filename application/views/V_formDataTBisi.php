<!DOCTYPE html>
<html>
   
  <body class="skin-blue" onload="cek()">
  <div class="container">
        <div class="container-fluid">
          <div class="col-md-12" >
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header">
                  <h5 class="text-center"><b>Langkah 2 dari 4 Usulan Tugas Belajar</b></h5><br>
                  <h4 class="text-center">Formulir Pengajuan Tugas Belajar</h4>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php foreach ($Tubel as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/updateTb' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">

                    <input type="hidden" class="form-control" name="NIK" placeholder="NIK" value="<?php echo $this->session->userdata('NIK')?>" />

                    <input type="hidden" class="form-control" name="idtubel" placeholder="idtubel" value="<?php echo $data->ID_TUBEL?>" />
                    

                    <div class="form-group">
                      <label>Jenjang Pendidikan Penyelenggara:</label></br>
                      <select class="form-control" name="jenjang" id="jenjang">
                          <option value="<?php echo $data->ID_JENJANG;?>"><?php echo $data->NAMA_JENJANG;?></option>
                          <option>Pilih Jenjang</option>
                          <?php foreach ($jenjang as $k){ ?>
                          <option value="<?php echo $k->ID_JENJANG ?>"><?php echo $k->NAMA_JENJANG ?></option>
                          <?php } ?>

                      </select>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>Lokasi Perguruan Tinggi Tugas Belajar:</label></br>
                      <select class="form-control" name="perguruan" id="perguruan" required onchange="countryChange(this.value)">
                          <option value="">Pilih Lokasi PT TB</option>
                          <?php if ($data->LOKASI_TUBEL==0) { ?>
                          <option value="0" selected>Dalam Negeri</option>
                          <option value="1">Luar Negeri</option>
                          <?php } else {?>
                          <option value="0">Dalam Negeri</option>
                          <option value="1" selected>Luar Negeri</option>
                        <?php } ?>

                      </select>
                    </div>
                    
                    
                      <div class="form-group">
                         <div style="display: none;" id="negara">
                        <label>Pilih Negara:</label></br>
                        <select class="form-control" name="negara" id="ln">
                        <option value="">--Pilih Negara--</option>
                        <?php foreach ($negara as $ne3){
                          if ($data->ID_NEGARA==$ne3->ID_NEGARA) { ?>
                            <option value="<?php echo $ne3->ID_NEGARA;?>" selected><?php echo $ne3->NAMA_NEGARA;?></option>
                          <?php } else { ?>
                          <option value="<?php echo $ne3->ID_NEGARA;?>"><?php echo $ne3->NAMA_NEGARA;?></option>
                          }
                        <?php } }?>

                        </select>
                      </div>
                        <div style="display: none;" id="negara1">
                          <div class="form-group">
                            <label>Pilih Negara:</label></br>
                             <input class="form-control" type="hidden" value="109" id="dn">
                            <input class="form-control" type="text" name="nama_negara" value="Indonesia" readonly>                 
                          </div>
                        </div>
                      </div>

                    <div class="form-group">
                      <label>Nama Perguruan Tinggi:</label>
                        <input type="text" class="form-control" name="NamaPT" placeholder="Nama Perguruan Tinggi" value="<?php echo $data->PERGURUAN_TINGGI_PENYELENGGARA; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="Bidang">Bidang:</label>
                        <input type="text" class="form-control" name="bidang" placeholder="Bidang **Contoh:Ilmu Komputer" value="<?php echo $data->NAMA_BIDANG_PERGURUAN_TINGGI; ?>"/>
                    </div>

                    <div class="form-group">
                      <label for="mulai">Mulai Tugas Belajar:</label>
                        <input type="date" class="form-control" name="mulai" value="<?php echo $data->MULAI_TUBEL; ?>"/>
                    </div>

                    <!-- <div class="form-group">
                      <label for="selesai">Selesai Tugas Belajar:</label>
                        <input type="date" class="form-control" name="selesai" value="<?php echo $data->SELESAI_TUBEL; ?>"/>
                    </div> -->

                    <div class="form-group">
                      <label for="jaminan">Jenis Pembiayaan:</label><br>
                        <select class="form-control" name="Jenis">
                          <option>Pilih Jenis Pembiayaan</option>
                          <?php if ($data->JENIS_PEMBIAYAAN==0) { ?>
                          <option value="0" selected>Dalam Negeri</option>
                          <option value="1">Luar Negeri</option>
                          <?php } else {?>
                          <option value="0">Dalam Negeri</option>
                          <option value="1" selected>Luar Negeri</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="sumber">Sumber Pembiayaan:</label>
                        <input type="text" class="form-control" name="sumber" placeholder="Sumber Pembiayaan" value="<?php echo $data->SUMBER_PEMBIAYAAN; ?>"/>
                    </div>

                    <div class="form-group">
                      <label for="Tahun">Tahun Pembiayaan:</label></br>
                      <select class="form-control" name="tahun" id="tahun">
                        <option value="<?php echo$data->TAHUN_PEMBIAYAAN; ?>"><?php echo $data->TAHUN_PEMBIAYAAN; ?></option>
                          <option >----Pilih Tahun----</option>
                          <?php
                            $thn_skr = date('Y');
                            $thn_sblm = $thn_skr-5;
                            $thn_dpn = $thn_skr+5;
                            for ($x = $thn_skr; $x <= $thn_dpn; $x++) {
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
    <!-- <script src="<?php echo base_url().'assets/Admin/dist/js/demo.js'?>" type="text/javascript"></script> -->

    <script type="text/javascript">
      
      function countryChange(sam){
        if (sam == '1') {
            $('#negara').show();
            $('#negara1').hide();
            document.getElementById('ln').setAttribute('required','required');
            document.getElementById('ln').setAttribute('name','negarax');
          } else {
            $('#negara1').show();
            $('#negara').hide();
            document.getElementById('dn').setAttribute('name','negara');
          }
      }

      function cek(){
        var sam= document.getElementById("perguruan").value;
        if (sam == '0') {
            $('#negara1').show();
            $('#negara').hide();
            document.getElementById('dn').setAttribute('name','negara');
            document.getElementById('ln').setAttribute('name','negarax');
          } else {
            $('#negara').show();
            $('#negara1').hide();
            document.getElementById('ln').setAttribute('required','required');
            document.getElementById('dn').setAttribute('name','negarax');
          }
      }
    </script>