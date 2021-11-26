<div class="content-wrapper">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Usulan Pengaktifan Kembali</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Pengusul</th>
                        <th>Unduh File</th>
                        <th>Status</th>
                        <th>Unggah Berkas</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($pengak as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->nama; ?></td>
                        <td>Ijazah / SKL :<a href="<?php echo base_url();?>file/pengaktifan/<?php echo $data->FILE_A?>" target="_blank">Lihat/Unduh</a><br>
                            <!-- Penyetaraan Ijazah (LN) :<a href="<?php echo base_url();?>file/pengaktifan/<?php echo $data->FILE_B?>" target="_blank">Lihat/Unduh</a> -->
                        </td>
                        <td><?php echo $data->status_sl ?></td>
                        <td><a href="<?php echo base_url().'C_fakultas/unggahPengaktifan/'.$data->ID_PENGAKTIFAN;?>"><button class="btn btn-primary">Unggah File</button></a></td>
                      </tr>
                    <?php }?>
                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>