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
                        <th>Unit Kerja Fakultas</th>
                        <th colspan="3">Dokumen Pendukung</th>
                        <th>Status</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($usulan as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'Surat Perjanjian_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Surat Perjanjian</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'Surat Tugas Belajar_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Surat Tugas Belajar</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'Scan CV_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Riwayat Hidup</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'Scan KTP_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">KTP</a><br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'SuratKedutaan_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Surat Kedutaan</a> 
                        </td><td>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'KARPEG_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">KARPEG</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'LOA_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">LOA</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'PASPOR_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">PASPOR</a> <br>
                          <a href="<?php echo base_url();?>file/foto/<?php echo $data->NIK.'_FOTO'.'.jpg'?>" target="_blank">Lihat Foto</a><br>
                           <a href="<?php echo base_url();?>file/tubel/<?php echo 'AGENDA_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Agenda</a>
                        </td>
                        <td>
                           <a href="<?php echo base_url();?>file/tubel/<?php echo 'Surat Permohonan SK TB_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Surat Pengantar</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'SK PNS_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">SK PNS</a> <br>
                          <a href="<?php echo base_url();?>file/tubel/<?php echo 'Surat Jaminan Pembiayaan Studi_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Keterangan Pembiayaan</a> <br>
                         <a href="<?php echo base_url();?>file/tubel/<?php echo 'Surat Keterangan Sehat_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Keterangan Sehat</a> <br> 
                        </td>
                        <td>Proses</td>
                      </tr>
                       <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>