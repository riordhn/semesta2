<div class="content-wrapper">
    <div class="container-fluid">
    	 <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Verifikasi Usulan Tugas Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama <br> NIP <br> TTL</th>
                        <th>Status Pegawai/Golongan</th>
                        <th>Lihat data Tugas Belajar</th>
                        <th>Tanggal Submit TB</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->STATUS_PEGAWAI." / ".$data->PANGKAT_GOLONGAN ?></td>
                        <td><a href="<?php echo base_url().'C_fakultas/dataTubel/'.$data->ID_TUBEL?>" class="btn btn-block btn-primary btn-sm" >Lihat data</a></td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                        <td><a href="<?php echo base_url().'C_fakultas/prosesTBFakultas/'.$data->ID_TUBEL?>" class="btn btn-block btn-primary btn-sm" >Lihat Berkas</a><br> 
                        <?php //if(empty($file)) { ?>
                        <a href="<?php echo base_url().'C_fakultas/uploadFileTBFakultas/'.$data->ID_TUBEL?>" class="btn btn-block btn-success btn-sm" >Unggah Berkas Pengajuan</a> <br>
                        <?php //} else { ?>
                          <!-- <a href="<?php echo base_url().'C_fakultas/fileDitangguhkan/'.$data->ID_TUBEL?>" class="btn btn-block btn-primary btn-sm" >Perbaiki File</a> 
                        <?php // }  ?>   -->
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>