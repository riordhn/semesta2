<!DOCTYPE html>
<html>
   
  <body class="skin-blue">
  <div class="container">
        <div class="container-fluid">
          <div class="col-md-6 col-md-offset-3" >
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header" align="center">
                  <h3 class="box-title"><b>Formulir Perpanjangan Tugas Belajar</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php foreach ($tubel as $key) { ?>
                <form action="<?php echo base_url().'C_dosen/savePerpanjangan' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">

                      <!-- <label for="Rumpun">NIK</label> -->
                        <input type="Hidden" class="form-control" name="idtubel" value="<?php echo $key->ID_TUBEL;?> "/>

                        <input type="Hidden" class="form-control" name="mulaiperpanjangan" value="<?php echo $key->SELESAI_TUBEL;?> "/>
                        
                        <input type="Hidden" class="form-control" name="jenis" value="1"/>
                  

                  <div class="form-group">
                      <h4><mark style="background-color: yellow;"><b>Tugas Belajar : <?php echo $key->PERGURUAN_TINGGI_PENYELENGGARA.", ".$key->NAMA_NEGARA ?></b></mark></h4>
                  </div>

                  <div class="form-group">
                      <label>Usul Penambahan Semester :</label><br>
                        <select class="form-control" name="jangka" id="jangka" required >
                          <option value="">Pilih Lama Perpanjangan</option>
                          <option value="1"><b>1 Semester</b></option>
                          <option value="2"><b>2 Semester</b></option>
                        </select>
                  </div>

                  <div class="form-group">
                    <label>Nama Beasiswa:</label></br>
                    <input type="text" class="form-control" name="beasiswa" placeholder="Ketik disini..." required />
                  </div><!-- /.form group -->
                    
                    <div class="form-group">
                      <li><label>Berkas Pernyataan Keterlambatan Tugas Belajar Bukan atas Kelalaian ybs:</label></li></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file0" required /></br>
                      *Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <li><label>Surat Rekomendasi dari Lembaga Pendidikan Tempat Pegawai Pelajar untuk <br> Memperpanjang Masa Tugas Belajar:</label></li></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file1" required/></br>
                      *Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <li><label>Surat Rekomendasi jaminan perpanjangan pembiayaan tugas belajar dari pemberi beasiswa:</label></li></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file2" required/></br>
                      *Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                     <div class="form-group">
                      <li><label>Surat Rekomendasi Perpanjangan Tubel dari pimpinan unit kerja<br> (ttd. Kedep mengetahui Dekan Fak):</label></li><br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file3" required>
                      *Format berkas PDF dengan ukuran maksimal 2 MB
                     </div><!-- /.form group -->

                     <div class="form-group">
                      <li><label>SK Kenaikan Pangkat Terakhir (*jika mengalami kenaikan pangkat saat masa studi):</label></li><br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file4">
                      *Format berkas PDF dengan ukuran maksimal 2 MB
                     </div><!-- /.form group -->

                     <div class="form-group">
                      <li><label>SK Kenaikan Jabatan Terakhir (*jika mengalami kenaikan jabatan saat masa studi):</label></li><br> 
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file5">
                      *Format berkas PDF dengan ukuran maksimal 2 MB
                     </div><!-- /.form group -->
                     
                     <div class="form-group">
                      <li><label>Surat Pengantar Pengajuan Perpanjangan:</label><br>
                        <strong>Nomor Surat:</strong></li><br>
                        <input type="text" class="form-control" name="nosurat" placeholder="Nomor Surat" required><br>
                        <strong>Tanggal Surat:</strong><br>
                        <input type="date" class="form-control" name="tglsurat" placeholder="Tgl Surat" required><br>
                        <strong>Jabatan Pejabat Yang bertanda Tangan:</strong><br>
                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan Atasan" required><br>
                        <strong>Unggah Berkas:</strong><br>
                        <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file6" required>
                         *Format berkas PDF dengan ukuran maksimal 2 MB
                     </div><!-- /.form group -->
                        



                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen' ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </div>
                </form>
                <?php } ?>
 
              </div><!-- /.box -->
          </div>
        </div>
</div>
</body>



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