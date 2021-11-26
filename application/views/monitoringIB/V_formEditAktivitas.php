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
                  <h3 class="box-title"><b>Aktivitas Studi</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php  foreach($aktifitas as $data) { ?>
                <form action="<?php echo base_url().'C_dosen/editAktifitasIB/'.$data->ID_AKTIVITAS_IB ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">


                  <div class="form-group">
                      <!-- <label for="Rumpun">NIK</label> -->
                        <input type="Hidden" class="form-control" name="idmonitor" value="<?php echo $this->session->userdata('IDMON');?> "/>

                        <input type="Hidden" class="form-control" name="semester" value="<?php echo $this->session->userdata('sms');?> "/>
                  </div>

                  <div class="form-group">
                      <label>Promotor I / Dosbing I:</label>
                        <input type="text" class="form-control" name="dos1" placeholder="Ketik disini..." value="<?php echo $data->DOSBING_1 ?>" required />
                  </div>

                    <div class="form-group">
                      <label>Promotor II / Dosbing II:</label>
                      <input type="text" class="form-control" name="dos2" placeholder="Ketik disini..." value="<?php echo $data->DOSBING_2 ?>" required />
                    </div><!-- /.form group -->

                    <div class="form-group">
                      <label>Topik:</label>
                      <input type="text" class="form-control" name="topik" placeholder="Topik" value="<?php echo $data->TOPIK_JUDUL_DISERTASI ?>" required /><br>
                      <i>*Jika belum ada topik silahkan isi dengan " - "</i>
                    </div>

                    <div class="form-group">
                      <label>Persentase Tugas Akhir/Thesis ( % ):</label>
                      <input type="number" class="form-control" name="persenta" placeholder="Contoh: 20%" min="0" value="<?php echo $data->PRESENTASE_DISERTASI ?>" required />
                      <i>*note:</i>
                    </div>

                    <div class="form-group">
                      <label>Persentase Kelulusan ( % ):</label>
                      <input type="number" class="form-control" name="persenkel" placeholder="Contoh: 20%" value="<?php echo $data->PRESENTASE_KELULUSAN ?>" min="0" required />
                      <i>*note:</i>
                    </div>                 

                    <div class="form-group">
                      <label for="kemajuan">Penjelasan Terkait Kemajuan Studi:</label><br>
                      <p>
                        *Pada bagian ini Anda diminta menjelaskan dengan rinci segala sesuatu yang terkait dengan kondisi kemajuan studi, sebagaimana tertulis pada tabel data umum. Silakan dijelaskan berbagai hambatan yang mungkin ditemui dan apa yang sudah diupayakan selama ini dalam mengatasinya.
                        Silakan Anda menganalisis dan mengevaluasi apa saja yang belum optimal dilakukan untuk dapat menyelesaikan studi tepat waktu atau sesegera mungkin.
                      </p>
                      <textarea name="kemajuan" class="form-control" id="kemajuan" rows="4" cols="80" placeholder="Tulis Disini...." required><?php echo $data->PENJELASAN_KEMAJUAN_STUDI ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="langkah">Langkah Konkrit Semester Depan:</label><br>
                      <p>
                        *Pada bagian ini silakan Anda menuliskan apa saja langkah konkrit yang akan dilakukan dalam satu semester ke depan terkait target studi masing-masing, baik menyangkut perkuliahan, persiapan publikasi dan tugas akhir maupun penyelesainnya.
                      </p>
                      <textarea name="langkah" class="form-control" id="langkah" rows="4" cols="80" placeholder="Tulis Disini...." required><?php echo $data->LANGKAH_KONKRIT_SMT_DEPAN ?></textarea>
                    </div>

                  <!-- /.box-body -->
                  <div class="box-footer" >
                  <a href="<?php echo base_url().'C_dosen/tabelMonitoringIBDosen/'.$this->session->userdata('sms') ?>" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-success">Simpan</button>
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
        CKEDITOR.replace('kemajuan');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>

    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('langkah');
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