  <div class="container">
    <div class="container-fluid">
       <div class="box"> 
                <div class="box-header">
                  <center><h3 class="box-title">Verifikasi Usulan Tugas Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Unit Kerja</th>
                        <th>Pangkat Golongan</th>
                        <th>Status Pegawai</th>
                        <th>Jenis Kepegawaian</th>
                        <th>Tanggal Submit TB</th>
                        <th>Status</th>
                        <th>Lokasi Data</th>
                        <th width="150px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                       <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td><?php echo $data->PANGKAT_GOLONGAN?></td>
                        <td><?php echo $data->STATUS_PEGAWAI?></td>
                        <td><?php echo $data->JENIS_KEPEGAWAIAN?></td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php if($data->NUM>0 && $data->CEK==0){
                          echo "Terdapat file ditangguhkan";
                        }else{ echo $data->STATUS_SL;}?></td>
                        <td><?php if($data->NUM>0 && $data->CEK==0 ){
                          echo "Dosen/Tendik dan Unit Kerja";
                        }else{ echo $data->LOKASI_DATA;}?></td>
                        
                        <td><?php if($data->ID_status_sl>=2){ if($data->CEK>0){ ?><a href="<?php echo base_url().'C_subditSDM/prosesTBSubdit/'.$data->ID_TUBEL;?>" class="btn btn-block btn-primary btn-sm" >Proses</a><?php }else{if($data->NUM==0){?><a href="<?php echo base_url().'C_subditSDM/prosesTBSubdit/'.$data->ID_TUBEL;?>" class="btn btn-block btn-primary btn-sm" >Proses</a><?php }}}?></td>
                        
                      </tr>
                       <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>
