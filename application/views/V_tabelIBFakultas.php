<div class="container">
    <div class="container-fluid">
    	 <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Verifikasi Usulan Izin Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Unit Kerja Fakultas</th>
                        <!-- <th>Tanggal Submit IB</th> -->
                        <th>Status</th>
                        <th width="100px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=0; foreach ($ibel as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <!-- <td><?php echo $data->TGL_SUBMIT_IB ?></td> -->
                        <td><?php echo $data->STATUS_SL?></td>
                        <td><a href="<?php echo base_url().'C_fakultas/prosesIBFakultas/'.$data->ID_IB;?>" class="btn btn-block btn-primary btn-sm" >Proses</a><br>  <a href="<?php echo base_url().'C_fakultas/uploadFileIBFakultas/'.$data->ID_IB;?>" class="btn btn-block btn-primary btn-sm" >Unggah File</a>  </td>
                      </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>