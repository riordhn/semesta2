<div class="container">
<section class="content">
          <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Daftar Riwayat Usulan Izin Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Status Pegawai/Gol</th>
                        <th>Tanggal Pengajuan IB</th>
                        <th>Status</th>
                        <th>Lokasi Berkas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->STATUS_PEGAWAI." / ".$data->PANGKAT_GOLONGAN ?></td>
                        <td><?php echo $data->TGL_SUBMIT_IB ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                        <td><?php echo $data->LOKASI_DATA?></td>
                        <?php if ($data->ID_STATUS_SL==3){?>
                        <td><a href="<?php echo base_url().'C_fakultas/unduhFak2/'.$data->ID_IB.'/'.$data->NIK;?>">Lihat/Unduh</a></td>
                      <?php } else if($data->ID_STATUS_SL==7){?>
                          <td><a href="<?php echo base_url().'C_fakultas/unduhFak/'.$data->ID_IB.'/'.$data->NIK;?>">Lihat/Unduh</a></td>
                      <?php }else { ?><td>-</td> <?php } ?>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>

   
</section>
</div>
