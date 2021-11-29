<div class="container">
    <div class="container-fluid">
    	 <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Usulan Laporan Izin Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Status Pegawai/Golongan</th>
                        <th>Prodi, Perguruan Tinggi</th>
                        <th>Jenjang</th>
                        <th>Tanggal kelulusan</th>
                        <th>Lihat Ijazah</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($laporan as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->STATUS_PEGAWAI." / ".$data->PANGKAT_GOLONGAN ?></td>
                        <td><?php echo $data->NAMA_BIDANG_PERGURUAN_TINGGI.' ,'.$data->PERGURUAN_TINGGI_PENYELENGGARA ?></td>
                        <td><?php echo $data->NAMA_JENJANG ?></td>
                        <td><?php echo $data->TGL_LULUS_IB ?></td>
                        <td> <a href="<?php echo base_url().'file/laporan/'.$data->FILE_IJAZAH?>" class="btn btn-block btn-primary btn-sm" target="_blank">Lihat Ijazah</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>