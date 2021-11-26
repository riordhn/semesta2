<div class="content-wrapper">
  <div class="container-fluid">
  <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Informasi Data Izin Belajar
                
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <tbody>
                 <?php foreach($Biodata as $data) {
                  
                   ?>
                  <tr>
                    <td rowspan="10" width="10px"><img src="<?php echo $data->FOTO1; ?>" width="150px"></td>
                    <td  width="170px"><b>Nama Lengkap</b></td>
                    <td>:  <?php echo $data->GELAR_DEPAN ?> <?php echo $data->NAMA ?> <?php echo $data->GELAR_BELAKANG ?></td>
                    
                  </tr>
                  <tr>
                    <td><b>NIP/NIK</b></td>
                    <td>: <?php echo $data->NIK ?></td>
                  </tr>
                  <tr>
                    <td style="background-color: yellow;"><b>Semester Sekarang</b></td>
                    <td style="background-color: yellow;">: <b>Semester <?php echo $data->semester_now ?> dari <?php echo $data->TOTAL_SEMESTER ?></b></td>
                  </tr>
                  <tr>
                    <tr>
                    <td><b>Jenjang</b></td>
                    <td>: <?php echo $data->NAMA_JENJANG;
                    //if($data->ID_JENJANG=="S2"){ echo "S2-Magister";}
                    // elseif ($data->ID_JENJANG=="S3") {
                    //    echo "S3-Doktoral";
                     //} ?></td>
                  </tr>
                  <tr>
                    <td><b>Program Studi</b></td>
                    <td>: <?php echo $data->NAMA_BIDANG_PERGURUAN_TINGGI ?></td>
                    
                  </tr>
                  <tr>
                    <td><b>Perguruan Tinggi</b></td>
                    <td>: <?php echo $data->PERGURUAN_TINGGI_PENYELENGGARA ?></td>
                  </tr>
                  <tr>
                    <td><b>Penasehat Akademik</b></td>
                    <td>: <?php echo $data->PENASEHAT_AKADEMIK ?></td>
                  </tr>
                  <tr>
                    <td><b>Tanggal Mulai</b></td>
                    <td>: <?php 
                    $month=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                      $pecah=explode('-', $data->Mulai);
                      echo $pecah[0].' '.$month[(int)$pecah[1]].' '.$pecah[2]; ?></td>
                  </tr>
                  <tr>
                    <td><b>Tanggal Selesai</b></td>
                    <td>: <?php
                    $month=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                      $pecah=explode('-', $data->Selesai);
                      echo $pecah[0].' '.$month[(int)$pecah[1]].' '.$pecah[2];
                  ?></td>
                  </tr>
                  
                  
                 <?php } ?>
                </tbody>

              </table>

            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- this row will not appear when printing -->
         
        </section>


        
  <section class="invoice">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <i class="fa fa-globe"></i>
                  <h2 class="box-title"><b>LEMBAR MONITORING</b></h2><br><br>
                  <td width="30%">
                        <form method="post"> 
                        <b>Tampil dan Tambahkan Laporan Semester</b> :&nbsp;&nbsp;&nbsp;<select name="semester" id="semester" required>
                         <option value="">----Pilih Semester----</option>
                        <?php foreach ($idmonitor as $key) { 
                          for ($i=1; $i <= $key->TOTAL_SEMESTER; $i++) {
                           echo  "<option value=".$i." >Semester ".$i." </option>"; } }?>
                          <!-- <option value="1" >Semester 1 </option>
                          <option value="2" >Semester 2 </option>
                          <option value="3" >Semester 3 </option>
                          <option value="4" >Semester 4 </option>
                          <option value="5" >Semester 5 </option>
                          <option value="6" >Semester 6 </option> -->
                        </select>
                        <a href="<?php echo base_url().'C_dosen/tabelMonitoringDosen/'.'$_POST[semester]' ?>"><button class="btn btn-success btn-xs">Pilih</button></a>
                        </form>
                      </td><br><br>
                      <h5 class="box-title"><i class="fa fa-bookmark" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<?php if($this->session->userdata('sms')!=NULL){ ?> <b>Semester <?php echo $this->session->userdata('sms');?></b> <?php } else { ?><b>Silakan Pilih Semester</b><?php }?> </h5>
                </div><!-- /.box-header --><br><br>
                <?php if($this->session->userdata('sms')!=NULL){ ?>

                <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>PUBLIKASI</b></h4>
                  <table class="table table-hover">
                    <?php if($this->session->userdata('sms')!=NULL){  ?>
                    <tr><?php if ($publikasi==NULL) { ?>
                     <td width="20px"><a href="<?php echo base_url().'C_dosen/tambahPublikasiIB'?>" class="btn btn-block btn-social btn-success"><i>+</i>Tambah Laporan</a></td>
                   <?php } ?>
                   </tr>
                    <tr><?php }?>
                      <th>Semester</th>
                      <th>Status</th>
                      <th>Kategori</th>
                      <th>Nama Jurnal/Forum Ilmiah/Seminar</th>
                      <th>Progres Publikasi</th>
                      <th>Tanggal Submit/Accepted/Publish/Penyelenggaraan/Rencana</th>
                      <th>Bukti Kegiatan</th>
                      <th style="text-align: right;">Aksi</th>
                    </tr>
                    <?php foreach ($publikasi as $publik) { ?>
                    <tr>
                      <td align="center"><?php echo $publik->SEMESTER ?> </td>
                      <td><?php if ($publik->SUDAH_BELUM==1) { ?>
                        <button class="btn btn-success">SUDAH</button>
                      <?php }else{ ?>
                        <button class="btn btn-danger">BELUM</button>
                      <?php } ?>
                      </td>
                      <td><?php echo $publik->KATEGORI_PUBLIKASI ?></td>
                      <td><?php echo $publik->NAMA_PUBLIKASI ?></td>
                      <td><?php echo $publik->PROGRESS_JURNAL?></td>
                      <td><?php if ($publik->TGL_SUBMIT!=NULL) {
                                   echo "<button class='btn btn-success'/>".$publik->tanggalsub."</button>"; 
                                } else {
                                  echo "<button class='btn btn-danger'/>".$publik->TGL_RENCANA."</button>"; 
                                } ?></td>
                      <td><?php if ($publik->BUKTI_PUBLIKASI!=NULL) { ?>
                        <a href="<?php echo base_url().'file/monitoringIB/'.$publik->BUKTI_PUBLIKASI; ?>" target="_blank"><button>Unduh/Lihat</button></a>
                      <?php } ?>
                      </td>
                      <td align="right"><a href="<?php echo base_url().'C_dosen/editPublikasiIB/'.$publik->ID_PUBLIKASI_IB;?>" class="btn btn-warning btn-xs" ><i class="fa fa-pencil">&nbsp;Koreksi</a></td>
                   </tr>
                  <?php } ?>
                    
                  </table>
                </div><!-- /.box-body --><br><br>


                <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>TOEFL</b></h4>
                  <table class="table table-hover">
                      
                    <tr><?php if ($toef==NULL) { ?>
                      <td width="30px"><a href="<?php echo base_url().'C_dosen/tambahToeflIB'?>" class="btn btn-block btn-social btn-success"><i>+</i>Tambah Laporan</a></td></tr>
                    <?php } ?>
                    <tr>
                      <th>Semester</th>
                      <th>Status</th>
                      <th>Tgl Tes / Rencana</th>
                      <th>Berlaku sampai</th>
                      <th>Penyelenggara</th>
                      <th>Nilai</th>
                      <th>Bukti Tes</th>
                      <th style="text-align: right;">Aksi</th>
                    </tr>
                    <?php foreach ($toef as $toefl) { ?>
                    <tr>
                      <td align="center"><?php echo $toefl->SEMESTER ?> </td>
                      <td><?php if ($toefl->SUDAH_BELUM==1) { ?>
                        <button class="btn btn-success">SUDAH</button>
                      <?php }else{ ?>
                        <button class="btn btn-danger">BELUM</button>
                      <?php } ?>
                      </td>
                      <td><?php if ($toefl->TGL_TES!=NULL) {
                                   echo "<button class='btn btn-success'/>".$toefl->tanggalsub."</button>"; 
                                } else {
                                  echo "<button class='btn btn-danger'/>".$toefl->tanggalber."</button>"; 
                                } ?>
                      </td>
                      <td><?php echo $toefl->TGL_BERLAKU_SAMPAI ?></td>
                      <td><?php echo $toefl->PENYELENGGARA ?></td>
                      <td><?php echo $toefl->NILAI ?></td>
                      <td><?php if ($toefl->BUKTI_TOEFL!=NULL) { ?>
                        <a href="<?php echo base_url();?>file/monitoringIB/toefl/<?php echo $toefl->BUKTI_TOEFL ?>" target="_blank"><button>Unduh/Lihat</button></a>
                      <?php } ?>
                      </td>
                      <td align="right"><a href="<?php echo base_url().'C_dosen/editToeflIB/'.$toefl->ID_TOEFL;?>" class="btn btn-warning btn-xs" ><i class="fa fa-pencil">&nbsp;Koreksi</a></td>
                   </tr>
                  <?php } ?>
                    
                  </table>
                </div><!-- /.box-body --><br><br>


                <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>AKTIFITAS STUDI</b></h4>
                  
                  <table class="table table-hover">
                    <tr><?php if ($aktifitas==NULL) { ?>
                      <td width="30px"><a href="<?php echo base_url().'C_dosen/tambahAktifitasIB' ?>" class="btn btn-block btn-social btn-success"><i>+</i>Tambah Laporan</a></td></tr>
                   <?php } ?>
                    <tr>
                      <th>Semester</th>
                      <th>Promotor I</th>
                      <th>Promotor II</th>
                      <th>Topik</th>
                      <th>Persentase TA/Thesis</th>
                      <th>Persentase Kelulusan</th>
                      <th style="text-align: right;">Aksi</th>
                    </tr>
                    <?php foreach ($aktifitas as $aktif) { ?>
                    <tr>
                      <td rowspan="3" align="center"><?php echo $aktif->SEMESTER ?> </td>
                      <td><?php echo $aktif->DOSBING_1 ?></td>
                      <td><?php echo $aktif->DOSBING_2 ?></td>
                      <td><?php echo $aktif->TOPIK_JUDUL_DISERTASI ?></td>
                      <td><?php echo $aktif->PRESENTASE_DISERTASI ?>%</td>
                      <td><?php echo $aktif->PRESENTASE_KELULUSAN ?>%</td>
                      <td align="right"><a href="<?php echo base_url().'C_dosen/editAktifitasIB/'.$aktif->ID_AKTIVITAS_IB;?>" class="btn btn-warning btn-xs" ><i class="fa fa-pencil">&nbsp;Koreksi</a></td>
                   </tr>
                   <tr>
                     <td><li><b>Penjelasan Terkait<br>Kemajuan Studi</b></li></td>
                      <td colspan="6"><?php echo $aktif->PENJELASAN_KEMAJUAN_STUDI ?></td>
                   </tr>
                   <tr>
                     <td><li><b>Langkah Konkrit <br>Semester depan</b></li></td>
                     <td colspan="6"><?php echo $aktif->LANGKAH_KONKRIT_SMT_DEPAN ?></td>
                   </tr>
                   <?php  } ?>
                  <?php //} ?>
                    
                  </table>
                  
                </div><!-- /.box-body --><br><br>


                 <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>TUGAS AKHIR</b></h4>
                  <table class="table table-hover">
                      
                    <tr><?php if ($tugas==NULL) {?>
                      <td width="30px"><a href="<?php echo base_url().'C_dosen/tambahTAIB'?>" class="btn btn-block btn-social btn-success"><i>+</i>Tambah Laporan</a>
                      <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Semester</th>
                      <th style="text-align: center;">Bukti Bimbingan</th>
                      <th style="text-align: center;">Status Ujian Proposal</th>
                      <th style="text-align: center;">Tgl Pelaksanaan/Rencana Ujian</th>
                      <th style="text-align: center;">Status Penilaian Kelayakan Naskah</th>
                      <th style="text-align: center;">Tgl Pelaksanaan/Rencana Penilaian</th>
                      <th style="text-align: center;">Hasil Penilaian</th>
                      <th style="text-align: center;">Status Seminar Akhir</th>
                      <th style="text-align: center;">Kategori Seminar Akhir</th>
                      <th style="text-align: center;">Tgl Pelaksanaan/Rencana Seminar</th>
                      <th style="text-align: center;">Bukti Seminar Akhir</th>
                      <th style="text-align: right;">Aksi</th>
                    </tr>
                    <?php foreach ($tugas as $sem) { ?>
                    <tr>
                      <td align="center"><?php echo $sem->SEMESTER ?> </td>
                     <td><?php if ($sem->BUKTI_BIMBINGAN!=NULL) { ?>
                        <a href="<?php echo base_url();?>file/monitoring/tugas/<?php echo $sem->BUKTI_BIMBINGAN?>" target="_blank"><button>Unduh/Lihat</button></a> 
                          <?php }else{ echo "-";} ?>
                      </td>
                      <td><?php if ($sem->UJIAN_PROPOSAL==1) { ?>
                        <button class="btn btn-success">SUDAH</button>
                      <?php }else{ ?>
                        <button class="btn btn-danger">BELUM</button>
                      <?php } ?></td>
                      <td><?php if ($sem->TGL_UJIAN_PROPOSAL!='0000-00-00' && $sem->TGL_UJIAN_PROPOSAL!=NULL) {
                                   echo "<button class='btn btn-success'/>".$sem->tanggalup."</button>"; 
                                } else {
                                  echo "<button class='btn btn-danger'/>".$sem->tanggalrenup."</button>"; 
                                } ?></td>
                      <td><?php if ($sem->PENILAIAN_PLAGIASI==1) { ?>
                        <button class="btn btn-success">SUDAH</button>
                      <?php }else{ ?>
                        <button class="btn btn-danger">BELUM</button>
                      <?php } ?></td>
                      <td><?php if ($sem->TGL_TES!='0000-00-00' && $sem->TGL_TES!=NULL)        {
                                   echo "<button class='btn btn-success'/>".$sem->tanggalpen."</button>"; 
                                } else {
                                  echo "<button class='btn btn-danger'/>".$sem->tanggalrenpen."</button>"; 
                                } ?></td>
                      <td><?php echo $sem->HASIL ?></td>
                      <td><?php if ($sem->SEMINAR_AKHIR==1) { ?>
                        <button class="btn btn-success">SUDAH</button>
                      <?php }else{ ?>
                        <button class="btn btn-danger">BELUM</button>
                      <?php } ?>
                      </td>
                      <td><?php echo $sem->KATEGORI_SA ?></td>
                      <td><?php if ($sem->TGL_TES!='0000-00-00' && $sem->TGL_TES!=NULL)        {
                                   echo "<button class='btn btn-success'/>".$sem->tanggalsa."</button>"; 
                                } else {
                                  echo "<button class='btn btn-danger'/>".$sem->tanggalrensa."</button>"; 
                                } ?>
                      </td>
                      <td><a href="<?php echo base_url();?>file/monitoringIB/tugas/<?php echo $sem->BUKTI_SA?>" target="_blank"><button>Unduh/Lihat</button></a> 
                      </td>
                      <td align="right"><a href="<?php echo base_url().'C_dosen/editTAIB/'.$sem->ID_TUGAS;?>" class="btn btn-warning btn-xs" ><i class="fa fa-pencil">&nbsp;Koreksi</a></td>
                   </tr>
                  <?php } ?>
                    
                  </table>
                </div><!-- /.box-body --><br><br>

               
                <?php }?>
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->



</div>
</div><!-- /.content-wrapper -->