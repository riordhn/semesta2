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
                    <?php $a=1; foreach($panjang as $fil){ ?>
                      <tr>
                        <td><?php echo $a.".";?></td>
                        <td><?php echo $fil->NAMA_FILE_PJG;?></td>
                        <!-- <td><a href="<?php //echo base_url().'C_fakultas/lakukan_download/'.$fil->ID_UP_FILE_T?>">Unduh</a></td> -->
                        <td align="center"><a href="<?php echo base_url();?>file/perpanjangan/<?php echo $fil->ID_UP_FILE_PJG?>" target="_blank">Lihat</a></td>
                      </tr>
                    <?php $a++; } ?>
                    <tr><td width="20px"><a href="<?php echo base_url().'C_fakultas/usulanPerpanjangan';?>" class="btn btn-block btn-primary btn-sm" >Kembali</a><br>  </td></tr>
                    </tbody>
                    
                  </table><br>
                  
	                </div><!-- /.box-body -->
	              </div>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>
