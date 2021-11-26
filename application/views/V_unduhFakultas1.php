<div class="content-wrapper">
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
                    
                      <tr>
                        <td>1.</td>
                        <td>Surat Perjanjian</td>
                        <td align="center"><a href="<?php echo base_url();?>file/tubel/<?php echo 'SuratPerjanjian_'.$this->session->userdata('NIK').'_'.$fil.'.pdf'?>" target="_blank">Lihat</a></td>
                      </tr>
                      <tr>
                      <td>2.</td>
                        <td>Surat Tugas Belajar</td>
                        <td align="center"><a href="<?php echo base_url();?>file/tubel/<?php echo 'SuratTugasBelajar_'.$this->session->userdata('NIK').'_'.$fil.'.pdf'?>" target="_blank">Lihat</a></td>
                      </tr>
                    
                    <tr><td width="20px"><a href="<?php echo base_url().'C_fakultas';?>" class="btn btn-block btn-primary btn-sm" >Kembali</a><br>  </td></tr>
                    </tbody>
                    
                  </table><br>
                  
	                </div><!-- /.box-body -->
	              </div>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>
