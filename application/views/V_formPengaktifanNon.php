<!DOCTYPE html>
<html>
   
  <body class="skin-blue">
  <div class="container">
        <div class="container-fluid">
          <div class="col-md-6 col-md-offset-3" >
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header">
                  <h3 class="box-title">Formulir Pengaktifan Kembali </h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <?php foreach ($idtubel as $key) {?>
                <form action="<?php echo base_url().'C_dosen/savePengaktifan' ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">

                         <input type="Hidden" class="form-control" name="idtubel" value="<?php echo $key->id_tubel;?> "/>
                         <input type="Hidden" class="form-control" name="jenis" value="1"/>                  

                    <div class="form-group">
                      <label>Tanggal Kelulusan Sesuai Ijazah / Tanggal Drop Out:</label></br>
                      <input type="date" class="form-control" name="tgl" required /></br>
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>Surat Keterangan Lulus / Ijazah / Surat Keterangan Drop Out:</label></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file0" required /></br>
                      *Format berkas PDF dengan ukuran maksimal 2 MB
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>Berita Acara Pemeriksan (bagi pegawai pelajar yang melebihi ketentuan studi/tidak segera melakukan pengaktifan ketika kembali):</label></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file1" required /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div> 

                    <div class="form-group">
                      <label>DP-3 Tahun Terakhir:</label></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file2" required /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div> 

                    <div class="form-group">
                      <label>Surat Keterangan Melaksanakan Tugas dan Mata Kuliah Yang Dibina (SPMT):</label></br>
                          <label><b>Tanggal SPMT:</b></label><br>
                          <input type="date" class="form-control" name="spmt" required><br>
                          <label>Unggah Berkas SPMT:</label>
                          <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file3" required></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div> 

                    <div class="form-group">
                      <label>Surat Pengantar Pengajuan Pengaktifan Kembali dari Tugas Belajar:</label></br>
                          <label><b>Tanggal Surat:</b></label><br>
                          <input type="date" class="form-control" name="tglsurat" required><br>
                          <label><b>Nomor Surat:</b></label><br>
                          <input type="text" class="form-control" name="nosurat" placeholder="Nomor Surat" required><br>
                          <label><b>Jabatan Pejabat Yang bertanda Tangan:</b></label><br>
                          <input type="text" class="form-control" name="jabatan" placeholder="Jabatan Pejabat" required><br>
                          <label>Unggah Berkas:</label>
                          <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file4" required></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div> 

                    <div class="form-group">
                      <label>SK Kenaikan Pangkat:</label></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file5" required /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div> 

                    <div class="form-group">
                      <label>SK Kenaikan Jabatan:</label></br>
                      <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file6" required /></br>
                      Format berkas PDF dengan ukuran maksimal 2 MB
                    </div> 


                  <!-- /.box-body -->
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