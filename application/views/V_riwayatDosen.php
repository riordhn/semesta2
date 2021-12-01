<div class="container">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Riwayat Usulan Tugas Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Unit Kerja Fakultas</th>
                        <th>Tanggal Submit TB</th>
                        <th>Status</th>
                        <th>Lokasi Berkas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($tubel1 as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php 
                        if ($data->status_sl=="Usulan Ditolak") {
                          echo $data->status_sl;
                          echo "| Tidak diterima" ;
                        }elseif($data->status_sl=="Selesai"){
                          echo $data->status_sl;
                          echo " | Disetujui" ;
                        }elseif($data->STATUS_SL=="Submit dari Fakultas" && $data->ID_FAKULTAS >= 16){
                          echo "Submit dari Dosen/Tendik non-fakultas" ;
                        }else{
                        echo $data->status_sl;}
                        ?></td>
                        <td><?php echo $data->LOKASI_DATA?></td>
            
                        <td><a href="<?php echo base_url().'C_dosen/unduhDosen/'.$data->ID_TUBEL;?>">Lihat/Unduh</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-header">
                  <center><h3 class="box-title">Riwayat Usulan Perpanjangan Tugas Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Univ/Negara Tugas Belajar</th>
                        <th>Tanggal Submit Perpanjangan</th>
                        <th>Tanggal Usulan Mulai Perpanjangan</th>
                        <th>Tanggal Usulan Selesai Perpanjangan</th>
                        <th>Jumlah Semester Diajukan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($tubel2 as $data1){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.'; ?></td>
                        <td><?php echo $data1->NAMA ?><br> <?php echo $data1->NIK ?><br> <?php echo $data1->TEMPAT_LAHIR ?>, <?php echo $data1->TGL_LAHIR ?></td>
                        <td><?php echo $data1->PERGURUAN_TINGGI_PENYELENGGARA.", ".$data1->nama_negara ?></td>
                        <td><?php echo $data1->TANGGAL_PENGAJUAN ?></td>
                        <td><?php echo $data1->MULAI_PERPANJANGAN?></td>
                        <td><?php echo $data1->SELESAI_PERPANJANGAN?></td>
                        <td><?php echo $data1->TAMBAHAN_SEMESTER?> Semester</td>
                        <td><?php if ($data1->status_sl=="Usulan Ditolak") {
                          echo $data1->status_sl;
                          echo "| Tidak diterima" ;
                        }elseif($data1->status_sl=="Selesai"){
                          echo $data1->status_sl;
                          echo " | Disetujui" ;
                        }else{
                        echo $data1->status_sl;
                        }?></td>
                        <td><a href="<?php echo base_url().'C_dosen/unduhDosenPjg/'.$data1->ID_PERPANJANGAN;?>">Lihat/Unduh</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
             

              <div class="box-header">
                  <center><h3 class="box-title">Riwayat Usulan Pengaktifan Kembali dari Tugas Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Tanggal Pengajuan Pengaktifan</th>
                        <th>Tanggal Lulus</th>
                        <th>Tanggal SPMT</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($tubel as $data3){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data3->NAMA ?><br> <?php echo $data3->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data3->TGL_LAHIR ?></td>
                        <td><?php echo $data3->TANGGAL_SUBMIT_PK ?></td>
                        <td><?php echo $data3->TANGGAL_LULUS ?></td>
                        <td><?php echo $data3->TANGGAL_SPMT?></td>
                        <td><a href="<?php echo base_url().'C_dosen/unduhDosenAkt/'.$data3->ID_PENGAKTIFAN;?>">Lihat/Unduh</a></td>
                      
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
            </div>


    </div>
</div>