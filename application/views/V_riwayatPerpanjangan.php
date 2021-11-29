<div class="container">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Riwayat Usulan Perpanjangan</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Univ Tujuan Tubel</th>
                        <th>Lama Perpanjangan</th>
                        <th>Berkas Pernyataan Keterlambatan</th>
                        <th>Berkas Perjanjian Perpanjangan</th>
                        <th>Surat Rekomendasi Jaminan Pembiayaan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php // $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                        <td><?php //echo $a.'.' ?></td>
                        <td></td>
                        <td></td>
                        <td><a href="<?php// echo base_url().'C_dosen/unduhDosen2/'.$data->ID_TUBEL;?>">Lihat/Unduh</a></td>
                        <td><a href="<?php //echo base_url().'C_dosen/unduhDosen/'.$data->ID_TUBEL;?>">Lihat/Unduh</a></td>
                          <td><a href="<?php// echo base_url().'C_dosen/unduhDosen2/'.$data->ID_TUBEL;?>">Lihat/Unduh</a></td>
                        <td><a href="<?php// echo base_url().'C_dosen/unduhDosen2/'.$data->ID_TUBEL;?>">Edit</a></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>