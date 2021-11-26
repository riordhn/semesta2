<div class="content-wrapper">
        <div class="container-fluid">
<section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Informasi Data Diri
                
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <tbody>
                 <?php foreach($tubel as $data) {
                   ?>
                  <tr>
                    <?php if ($data->FOTO1==NULL) { ?>
                    <td rowspan="16" width="10px"><i>*Foto Belum Diupload</i></td>
                    <?php } else {?>
                    <td rowspan="16" width="10px"><img src="<?php echo $data->FOTO1; ?>" width="300px"></td>
                  <?php }?>
                    <td><b>Gelar Depan</b></td>
                    <td>: <?php echo $data->GELAR_DEPAN ?></td>
                  </tr>
                  <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>: <?php echo $data->NAMA ?></td>
                  </tr>
                  <tr>
                    <td><b>Gelar Belakang</b></td>
                    <td>: <?php echo $data->GELAR_BELAKANG ?></td>
                  </tr>
                  <tr>
                    <td><b>NIP/NIK</b></td>
                    <td>: <?php echo $data->NIK ?></td>
                  </tr>
                  <tr>
                    <td><b>Unit Kerja</b></td>
                    <td>: Universitas Airlangga</td>
                  </tr>
                  <tr>
                    <td><b>Unit Kerja Fakultas</b></td>
                    <td>: <?php echo $data->UNIT_KERJA ?></td>
                  </tr>
                  <tr>
                    <td><b>Tempat Lahir</b></td>
                    <td>: <?php echo $data->TEMPAT_LAHIR ?></td>
                  </tr>
                  <tr>
                    <td><b>Tanggal Lahir</b></td>
                    <td>: <?php echo $data->TGL_LAHIR ?></td>
                  </tr>
                  <tr>
                    <td><b>No.HP</b></td>
                    <td>: <?php echo $data->HANDPHONE ?></td>
                  </tr>
                  <tr>
                    <td><b>Alamat</b></td>
                    <td>: <?php echo $data->ALAMAT ?></td>
                  </tr>
                  <tr>
                    <td><b>Email</b></td>
                    <td>: <?php echo $data->EMAIL ?></td>
                  </tr>
                  <tr>
                    <td><b>Pangkat/Gol</b></td>
                    <td>: <?php echo $data->PANGKAT_GOLONGAN ?></td>
                  </tr>
                  <tr>
                    <td><b>TMT PNS/PT</b></td>
                    <td>: <?php echo $data->TMT_PNS ?></td>
                  </tr>
                  <tr>
                    <td><b>Status Pegawai</b></td>
                    <td>: <?php echo $data->STATUS_PEGAWAI ?></td>
                  </tr>
                  <tr>
                    <td><b>Status Jabatan</td>
                    <td>: <?php echo $data->STATUS_JABATAN ?></td>
                  </tr>
                  <tr>
                    <td><b>Nama Jabatan</b></td>
                    <td>: <?php echo $data->NAMA_JABATAN ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <!-- <td><a href="<?php echo base_url().'C_dosen/formtb' ?>"><button class="btn btn-primary">Lanjutkan Ke Formulir >></button></a></td> -->
                  </tr>
                 <?php } ?>
                </tbody>

              </table>

            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Informasi Data Tugas Belajar
              </h2>
            </div><!-- /.col -->
          </div>


          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <tbody>
                 <?php foreach($tubel as $data) {
                   ?>
                  <tr>
                    <td><b>ID Tugas Belajar</b></td>
                    <td>: <?php echo $data->ID_TUBEL ?></td>
                  </tr>
                  <tr>
                    <td><b>Tanggal Submit</b></td>
                    <td>: <?php echo $data->TGL_SUBMIT_TB ?></td>
                  </tr>
                  <tr>
                    <td><b>Lokasi Tugas Belajar</b></td>
                    <td>: <?php
                     if ($data->LOKASI_TUBEL==1) {
                       echo "Luar Negeri";
                     } else
                     echo "Dalam Negeri"; ?></td>
                  </tr>
                  <tr>
                    <td><b>Perguruan Tinggi</b></td>
                    <td>: <?php echo $data->PERGURUAN_TINGGI_PENYELENGGARA ?></td>
                  </tr>
                  <tr>
                    <td><b>Bidang</b></td>
                    <td>: <?php echo $data->NAMA_BIDANG_PERGURUAN_TINGGI ?></td>
                  </tr>
                  <tr>
                    <td><b>Mulai Tugas Belajar</b></td>
                    <td>: <?php echo $data->MULAI_TUBEL ?></td>
                  </tr>
                  <tr>
                    <td><b>Selesai Tugas Belajar</b></td>
                    <td>: <?php echo $data->SELESAI_TUBEL ?></td>
                  </tr>
                  <tr>
                    <td><b>Jenis Pembiayaan</b></td>
                    <td>: <?php  if ($data->JENIS_PEMBIAYAAN==1) {
                       echo "Luar Negeri";
                     } else
                     echo "Dalam Negeri" ?></td>
                  </tr>
                  <tr>
                    <td><b>Sumber Pembiayaan</b></td>
                    <td>: <?php echo $data->SUMBER_PEMBIAYAAN ?></td>
                  </tr>
                  <tr>
                    <td><b>Tahun Pembiayaan</b></td>
                    <td>: <?php echo $data->TAHUN_PEMBIAYAAN ?></td>
                  </tr>
                 <?php } ?>
                </tbody>

              </table>

            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="box-footer" >
          <a href="<?php echo base_url().'C_fakultas/usulanTBFakultas/' ?>" class="btn btn-primary">Kembali</a>
          </div>
          <!-- this row will not appear when printing -->
         
        </section>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->