<div class="content-wrapper">
<section class="content">

   <div class="box">
                            <div class="box-header">
                              <?php foreach($mon as $bio){ ?>
                              <h1 class="box-title"><?php echo $bio->NAMA; ?></h1> <br>
                              <?php } ?>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th>Penasehat Akademik</th>
                                  <th>Semester Sekarang</th>
                                  <th>Total Semester</th>
                                </tr>
                              <?php foreach($sekarang as $akt){ ?>
                                <tr>
                                  <td><?php echo $akt->PENASEHAT_AKADEMIK; ?></td>
                                  <td><?php echo $akt->SEMESTER_SEKARANG; ?></td>
                                  <td><?php echo $akt->TOTAL_SEMESTER; ?></td>
                                </tr>
                              <?php } ?>                              
                               </table>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                              <h1 class="box-title">Aktivitas Studi</h1>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th>Semester</th>
                                  <th>Dosbing 1</th>
                                  <th>Dosbing 2</th>
                                  <th>Judul Tugas Akhir</th>
                                  <th>Presentase Tugas Akhir</th>
                                  <th>Presentase Kelulusan</th>
                                </tr>
                                <?php foreach($aktivitas as $akt){ ?>
                                <tr>
                                  <td rowspan="3"><?php echo $akt->SEMESTER; ?></td>
                                  <td><?php echo $akt->DOSBING_1; ?></td>
                                  <td><?php echo $akt->DOSBING_2; ?></td>
                                  <td><?php echo $akt->TOPIK_JUDUL_DISERTASI; ?></td>
                                  <td><?php echo $akt->PRESENTASE_DISERTASI; ?>%</td>
                                  <td><?php echo $akt->PRESENTASE_KELULUSAN; ?>%</td>
                                </tr>
                                <tr>
                                  <td colspan="5">Penjelasan Kemajuan Studi: <?php echo $akt->PENJELASAN_KEMAJUAN_STUDI; ?></td>
                                  </tr>
                                <tr><td colspan="5">Langkah Konkrit Semester Depan: <?php echo $akt->LANGKAH_KONKRIT_SMT_DEPAN; ?></td></tr>
                                <?php } ?>
                              </table>
                            </div>
                        </div>
                  
                        <div class="box">
                            <div class="box-header">
                              <h1 class="box-title">Publikasi</h1>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th style="width: 20px">Semester</th>
                                  <th>Status Publikasi</th>
                                  <th>Nama Publikasi</th>
                                  <th>Tanggal Submit</th>
                                  <th>Progress Jurnal</th>
                                  <th>Bukti Publikasi</th>
                                  <th>Tanggal Rencana</th>
                                </tr>
                              <?php $i=1; foreach($publikasi as $pub){ ?>
                                <tr>
                                  <td><?php echo $pub->SEMESTER; ?></td>
                                  <?php if($pub->SUDAH_BELUM==1){ ?>
                                  <td>Sudah</td>
                                  <td><?php echo $pub->NAMA_PUBLIKASI; ?></td>
                                  <td><?php echo $pub->TGL_SUBMIT; ?></td>
                                  <td><?php echo $pub->PROGRESS_JURNAL; ?></td>
                                  <td><a href="<?php echo base_url();?>file/monitoring/publikasi/<?php echo $pub->BUKTI_PUBLIKASI; ?>" target="_blank">Lihat</a></td>
                                  <td>-</td>
                                <?php }else{ ?>
                                  <td>Belum</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td><?php echo $pub->TGL_RENCANA; ?></td>
                                <?php } ?>
                                </tr>
                              <?php } ?>
                              </table>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                              <h1 class="box-title">TOEFL</h1>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th style="width: 20px">Semester</th>
                                  <th>Status</th>
                                  <th>Tanggal Tes</th>
                                  <th>Berlaku Sampai</th>
                                  <th>Penyelenggara Tes</th>
                                  <th>Nilai</th>
                                  <th>Bukti</th>
                                  <th>Tanggal Rencana</th>
                                </tr>
                                <?php $i=1; foreach($toefl as $peng){ ?>
                                <tr>
                                  <td><?php echo $pub->SEMESTER; ?></td>
                                  <?php if($peng->SUDAH_BELUM==1){?>
                                  <td>Sudah</td>
                                  <td><?php echo $peng->TGL_TES; ?></td>
                                  <td><?php echo $peng->TGL_BERLAKU_SAMPAI; ?></td>
                                  <td><?php echo $peng->PENYELENGGARA; ?></td>
                                  <td><?php echo $peng->NILAI; ?></td>
                                  <td><a href="<?php echo base_url();?>file/monitoring/toefl/<?php echo $peng->BUKTI_TOEFL; ?>" target="_blank">Lihat</a></td>
                                  <td>-</td>
                                <?php }else{ ?>
                                  <td>Belum</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td><?php echo $peng->TGL_RENCANA; ?></td>
                                <?php } ?>
                                </tr>
                                 <?php $i++; } ?>
                                
                              </table>
                            </div>
                        </div>
                    
                            <div class="box">
                            <div class="box-header">
                              <h1 class="box-title">Tugas Akhir</h1>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <?php foreach($tugas_akhir as $sem){ ?>
                                <tr>
                                  <td rowspan="4"><b><?php echo "Semester ".$sem->SEMESTER; ?></b></td>
                                  <td colspan="1"><b>Bukti Bimbingan</b></td>
                                  <td colspan="4"><a href="<?php echo base_url();?>file/monitoring/tugas/<?php echo $sem->BUKTI_BIMBINGAN; ?>" target="_blank">Lihat</a></td>
                                </tr>
                                <tr>
                                  <td><b>Ujian Proposal</b></td>
                                  <?php if($sem->UJIAN_PROPOSAL==1){ ?>
                                    <td>Sudah</td>
                                    <td>Tanggal: <?php echo $sem->TGL_UJIAN_PROPOSAL; ?></td>
                                  <?php }else{ ?>
                                    <td>Belum</td>
                                    <td>Rencana</td>
                                    <td><?php echo $sem->TGL_RENCANA_UP; ?></td>
                                  <?php } ?>
                                </tr>
                                <tr>
                                  <td><b>Penilaian Kelayakan</b></td>
                                  <?php if($sem->PENILAIAN_PLAGIASI==1){ ?>
                                    <td>Sudah</td>
                                    <td>Tanggal: <?php echo $sem->TGL_TES; ?></td>
                                    <td>Hasil: <?php echo $sem->HASIL."%"; ?></td>
                                  <?php }else{ ?>
                                    <td>Belum</td>
                                    <td>Rencana</td>
                                    <td><?php echo $sem->TGL_RENCANA; ?></td>
                                  <?php } ?>
                                </tr>
                                <tr>
                                  <td><b>Seminar Akhir</b></td>
                                  <?php if($sem->SEMINAR_AKHIR==1){ ?>
                                    <td>Sudah</td>
                                    <td>Tanggal: <?php echo $sem->TGL_SA; ?></td>
                                    <td>Kategori: <?php echo $sem->KATEGORI_SA; ?></td>
                                    <td>Bukti: <?php echo $sem->BUKTI_SA; ?></td>
                                  <?php }else{ ?>
                                    <td>Belum</td>
                                    <td>Rencana</td>
                                    <td><?php echo $sem->TGL_RENCANA_SA; ?></td>
                                  <?php } ?>
                                </tr>

                                <?php } ?>
                                
                              </table>
                            </div>
                        </div>                 
  </section>
</div>