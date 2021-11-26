<div class="content-wrapper">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Usulan Perpanjangan</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Pengusul</th>
                        <th>Usul Semester Perpanjangan</th>
                        <th>Tanggal Mulai Perpanjangan</th>
                        <th>Tanggal Selesai Perpanjangan</th>
                        <th>Unduh File</th>
                        <!-- <th>Unduh Template</th> -->
                        <th>Status</th>
                        <th>Unggah Berkas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php  $a=0; foreach ($panjang as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->nama ?></td>
                        <td><?php echo $data->TAMBAHAN_SEMESTER." Semester" ?></td>
                        <td><?php echo $data->MULAI_PERPANJANGAN ?></td>
                        <td><?php echo $data->SELESAI_PERPANJANGAN ?></td>
                        <td><a href="<?php echo base_url().'C_Fakultas/unduhperpanjangan/'.$data->ID_PERPANJANGAN?>">Lihat/Unduh Berkas</a></td>
                        <!-- <td><a href="<?php echo base_url().'C_Fakultas/outputSKPjg/'.$data->ID_PERPANJANGAN?>">Unduh Template Surat Permohonan</a></td> -->
                        <td><?php echo $data->status_sl ?></td>
                        <form action="<?php echo base_url().'C_Fakultas/upload_perpanjangan/'.$data->ID_PERPANJANGAN ?>" class="form-group" method="POST" enctype="multipart/form-data">
                        <td>
                            <li><b>Surat Rekomendasi Perpanjangan Tubel dari pimpinan unit kerja (ttd. Kedep mengetahui Dekan Fak) :</b></li> 
                            <input type="file" class="form-control" name="file30" required><br><b><li>SK Kenaikan Pangkat Terakhir (*jika mengalami kenaikan pangkat saat masa studi)</b>:</li> <input type="file" class="form-control" name="file56">
                            <br><li><b>SK Kenaikan Jabatan Terakhir (*jika mengalami kenaikan jabatan saat masa studi)</b>:</li> <input type="file" class="form-control" name="file57">
                            <br><li><b>Surat Pengantar Pengajuan Perpanjangan</b>:</li>
                            <strong>Nomor Surat:</strong><br>
                            <input type="text" class="form-control" name="nosurat" placeholder="Nomor Surat" required><br>
                            <strong>Tanggal Surat:</strong><br>
                            <input type="date" class="form-control" name="tglsurat" placeholder="Tgl Surat" required><br>
                            <strong>Jabatan Pejabat Yang bertanda Tangan:</strong><br>
                            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan Atasan" required><br>
                            <strong>Unggah Berkas:</strong><br>
                            <input type="file" class="form-control" name="file68" required>
                          </td>
                          <td><button type="submit" class="btn btn-primary" name="btsub">Unggah</button></td>
                          </form>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>