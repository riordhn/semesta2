  <div class="content-wrapper">
    <div class="container-fluid">
    	 <div class="box"> 
                <div class="box-header">
                  <center><h3 class="box-title">Verifikasi Usulan Perpanjangan Tugas Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama <br> NIP</th>
                        <th>Unit Kerja Fakultas</th>
                        <th>Pangkat Golongan</th>
                        <th>Status Pegawai</th>
                        <th>Jenis Kepegawaian</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th colspan="2">Dokumen Pendukung</th>
                        <th width="150px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $a=0; foreach ($usulan as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td><?php echo $data->PANGKAT_GOLONGAN?></td>
                        <td><?php echo $data->STATUS_PEGAWAI?></td>
                        <td><?php echo $data->JENIS_KEPEGAWAIAN?></td>
                        <td><?php echo $data->MULAI_PERPANJANGAN ?></td>
                        <td><?php echo $data->SELESAI_PERPANJANGAN ?></td>
                        <td>
                          <a href="<?php echo base_url();?>file/perpanjangan/<?php echo 'Surat Perjanjian Perpanjangan TB_'.$data->NIK.'_'.$data->ID_PERPANJANGAN.'.pdf'?>" target="_blank">Surat Perjanjian Perpanjangan TB</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'SETNEG_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">SETNEG</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'Scan CV_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Riwayat Hidup</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'Scan KTP_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">KTP</a><br>
                           <a href="<?php echo base_url();?>file/perpanjangan/<?php echo 'Progress Report_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Progress Report</a>
                        </td><td>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'KARPEG_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">KARPEG</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'LOA_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">LOA</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'PASPOR_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">PASPOR</a> <br>
                          <a href="<?php echo base_url();?>file/foto/<?php echo $data->NIK.'_FOTO'.'.jpg'?>" target="_blank">Lihat Foto</a> 
                        </td>
                        <td>Proses</td>
                      </tr>
                       <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>
