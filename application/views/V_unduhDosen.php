<div class="container">
    <div class="container-fluid">
    	<div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Daftar Dokumen Verifikasi Usulan</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Dokumen</th>
                        <th class="text-center">Lihat/Unduh</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=0; foreach ($ibel as $data){ $a++; ?>
                      <tr>
                        <td><?php echo $a.'.' ;?></td>
                        <td><?php echo $data->NAMA_FILE_T ?></td>
                        <td align="center"><a href="<?php echo base_url();?>file/tubel/<?php echo $data->ID_UP_FILE_T?>" target="_blank">Lihat/Unduh</a></td>
                      </tr>
                      <?php } ?>
                    
                    <tr><td width="20px"><a href="<?php echo base_url().'C_dosen/riwayatDosen';?>" class="btn btn-block btn-primary btn-sm" >Kembali</a><br>  </td></tr>
                    </tbody>
                    
                  </table><br>
                  
	                </div><!-- /.box-body -->
	              </div>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>
