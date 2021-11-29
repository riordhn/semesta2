
<div class="container">
  <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Informasi Data Tubel
                
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
                  foreach ($target as $tar) {
                   ?>
                  <tr>
                    <td rowspan="9" width="10px"><img src="<?php echo $data->FOTO1; ?>" width="150px"></td>
                    <td  width="170px"><b>Nama Lengkap</b></td>
                    <td>:  <?php echo $data->GELAR_DEPAN ?> <?php echo $data->NAMA ?> <?php echo $data->GELAR_BELAKANG ?></td>
                    <td></td>
                    <td><b>Syarat Kelulusan</b></td>
                  </tr>
                  <tr>
                    <td><b>NIP/NIK</b></td>
                    <td>: <?php echo $data->NIK ?></td>
                    <td width="400px"></td>
                    <td>Target Total SKS :</td>
                    <td>: <?php echo $tar->JUMLAH_SKS ?></td>
                  </tr>
                  <tr>
                    <td><b>Semester Sekarang</b></td>
                    <td>: <?php echo $data->semester_now ?></td>
                     <td></td>
                    <td>Target Jumlah Publikasi</td>
                    <td>: <?php echo $tar->JUMLAH_PUBLIKASI ?></td>
                  </tr>
                  <tr>
                    <tr>
                    <td><b>Jenjang</b></td>
                    <td>: <?php echo $data->NAMA_JENJANG;
                    //if($data->ID_JENJANG=="S2"){ echo "S2-Magister";}
                    // elseif ($data->ID_JENJANG=="S3") {
                    //    echo "S3-Doktoral";
                     //} ?></td>
                    <td></td>
                    <td>Target Jumlah Total SKS Tesis/Disertasi/Skripsi</td>
                    <td>: <?php echo $tar->JUMLAH_DISERTASI_THESIS_SKRIPSI ?></td>
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
                    <td><b>Tanggal Mulai</b></td>
                    <td>: <?php echo $data->Mulai ?></td>
                  </tr>
                  <tr>
                    <td><b>Tanggal Selesai</b></td>
                    <td>: <?php echo $data->Selesai
                     ?></td>
                  </tr>
                  
                  
                 <?php }} ?>
                </tbody>

              </table>

            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- this row will not appear when printing -->
         
        </section>


        
  <section class="content-header">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Monitoring</h3><br><br>
                  <td width="30%">
                   
                        <form method="post"> 
                        <b>Tampil dan Tambahkan Laporan Semester</b> :&nbsp;&nbsp;&nbsp;<select name="semester" id="semester">
                         <option >----Pilih Semester----</option>
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
                        <a href="<?php echo base_url().'C_dosen/tabelMonitoringDosen/'.'$_POST[semester]' ?>"><button>Pilih</button></a>
                        </form>
                      </td><br><br>
                      <h5 class="box-title"><i class="fa fa-bookmark" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<?php if($this->session->userdata('sms')!=NULL){ ?> <b>Semester <?php echo $this->session->userdata('sms');?></b> <?php } else { ?><b>Silakan Pilih Semester</b><?php }?> </h5>
                </div><!-- /.box-header --><br><br>
                <?php if($this->session->userdata('sms')!=NULL){ ?>
                <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>Aktivitas Studi</b></h4>
                  
                  <table class="table table-hover">
                    <?php if($this->session->userdata('sms')!=NULL){ 
                      if(empty($aktifitas)){  ?>
                    <tr><td width="30px"><a href="<?php echo base_url().'C_dosen/tambahAktifitas' ?>" class="btn btn-block btn-social btn-instagram"><i>+</i>Tambah Aktifitas </a></td></tr>
                   <?php } else {
                      echo "<tr>&nbsp;&nbsp;&nbsp;<b>**Semester sudah terlewati, silakan isi semester selanjutnya</b></tr>";
                    } } ?>
                    <tr>
                      <th>No.</th>
                      <th>SKS Kredit</th>
                      <th>IPK</th>
                      <th>IPS</th>
                      <th>Deskripsi Progres Disertasi</th>
                      <th>Persentase Progres Disertasi</th>
                      <th>Berkas Disertasi</th>
                      <th>Berkas KHS</th>
                      <th>Berkas KRS</th>
                      <th>Berkas Evaluasi Pembimbing</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $a=1; foreach ($aktifitas as $aktif) { ?>
                    <tr>
                      <td><?php echo $a; ?>.</td>
                      <td><?php echo $aktif->SKS?></td>
                      <td><?php echo $aktif->IPK ?></td>
                      <td><?php echo $aktif->IPS ?></td>
                      <td><?php echo $aktif->DESKRIPSI_PROGRES_PENELITIAN_DISERTASI_THESIS ; ?></td>
                      <td><?php echo $aktif->PRESENTASE_PENGERJAAN_DISERTASI_THESIS ?>%</td>
                      <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $aktif->FILE_DISERTASI_THESIS ?>" target="_blank">Lihat</a> </td>
                      <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $aktif->FILE_KHS ?>" target="_blank">Lihat</a> </td>
                      <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $aktif->FILE_KRS ?>" target="_blank">Lihat</a> </td>
                      <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $aktif->FILE_EVALUASI_PEMBIMBING ?>" target="_blank">Lihat</a> </td>
                      <td><a href="<?php echo base_url().'C_dosen/editAktifitas/'.$aktif->ID_AKTIVITAS;?>" class="btn btn-warning btn-xs" >Koreksi</a></td>
                   </tr>
                   <?php  $a++;} ?>
                  <?php //} ?>
                    
                  </table>
                  
                </div><!-- /.box-body --><br><br>

                <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>Publikasi</b></h4>
                  <table class="table table-hover">
                    <?php if($this->session->userdata('sms')!=NULL){  ?>
                    <tr><td width="30px"><a href="<?php echo base_url().'C_dosen/tambahPublikasi'?>" class="btn btn-block btn-social btn-instagram"><i>+</i>Tambah Publikasi </a></td></tr>
                    <tr><?php }?>
                      <th>No.</th>
                      <th>Judul Jurnal</th>
                      <th>ISSN/ISBN</th>
                      <th>Urutan Penulis</th>
                      <th>Tahun</th>
                      <th>Afiliasi</th>
                      <th>Scopus</th>
                      <th>WOS</th>
                      <th>Sinta</th>
                      <th>Tautan</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $s=1; foreach ($publikasi as $publik) { ?>
                    <tr>
                      <td><?php echo $s; ?>. </td>
                      <td><?php echo $publik->JUDUL_JURNAL?></td>
                      <td><?php echo $publik->ISSN_ISBN ?></td>
                      <td><?php echo $publik->PENULIS_KE_BERAPA ?></td>
                      <td><?php echo $publik->TAHUN_PUBLIKASI ?></td>
                      <td><?php echo $publik->AFILIASI ?></td>
                      <td><?php echo $publik->SCOPUS ?></td>
                      <td><?php echo $publik->WOS ?></td>
                      <td><?php echo $publik->SHINTA ?></td>
                      <td><a href="http://<?php echo $publik->LINK_PUBLIKASI; ?>" target="_blank"><?php echo $publik->LINK_PUBLIKASI ;?></a> </td>
                      <td><a href="<?php echo base_url().'C_dosen/editPublikasi/'.$publik->ID_PUBLIKASI;?>" class="btn btn-warning btn-xs" >Koreksi</a></td>
                   </tr>
                  <?php $s++;} ?>
                    
                  </table>
                </div><!-- /.box-body --><br><br>

                <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>Penghargaan</b></h4>
                  <table class="table table-hover">
                      
                    <tr><td width="30px"><a href="<?php echo base_url().'C_dosen/tambahPenghargaan'?>" class="btn btn-block btn-social btn-instagram"><i>+</i>Tambah Penghargaan </a></td></tr>
                    <tr>
                      <th>No.</th>
                      <th>Nama Penghargaan</th>
                      <th>Pemberi Penghargaan</th>
                      <th>Tahun</th>
                      <th>Berkas</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $d=1; foreach ($penghargaan as $peng) { ?>
                    <tr>
                      <td><?php echo $d; ?>.</td>
                      <td><?php echo $peng->NAMA_PENGHARGAAN ?></td>
                      <td><?php echo $peng->PEMBERI_PENGHARGAAN ?></td>
                      <td><?php echo $peng->TAHUN_PENGHARGAAN ?></td>
                      <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $peng->FILE_UPLOAD_PENGHARGAAN ?>" target="_blank">Lihat</a> </td>
                      <td><a href="<?php echo base_url().'C_dosen/editPenghargaan/'.$peng->ID_PENGHARGAAN;?>" class="btn btn-warning btn-xs" >Koreksi</a></td>
                   </tr>
                  <?php $d++;} ?>
                    
                  </table>
                </div><!-- /.box-body --><br><br>

                 <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>Seminar & Pelatihan</b></h4>
                  <table class="table table-hover">
                      
                    <tr><td width="30px"><a href="<?php echo base_url().'C_dosen/tambahSeminar'?>" class="btn btn-block btn-social btn-instagram"><i>+</i>Tambah Kegiatan</a></td></tr>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kegiatan</th>
                      <th>Jenis Kegiatan</th>
                      <th>Penyelenggara</th>
                      <th>Negara</th>
                      <th>Tahun</th>
                      <th>Berkas</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $f=1; foreach ($seminar as $sem) { ?>
                    <tr>
                      <td><?php echo $f; ?>.</td>
                      <td><?php echo $sem->NAMA_KEGIATAN ?></td>
                      <td><?php if($sem->JENIS_KEGIATAN == 0){
                        echo "Seminar";
                      } else{
                        echo "Pelatihan";
                      }  ?></td>
                      <td><?php echo $sem->PENYELENGGARA_KEGIATAN ?></td>
                      <td><?php echo $sem->NEGARA ?></td>
                      <td><?php echo $sem->TAHUN_KEGIATAN ?></td>
                      <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $sem->FILE_UPLOAD_BUKTI?>" target="_blank">Lihat</a> </td>
                      <td><a href="<?php echo base_url().'C_dosen/editSeminar/'.$sem->ID_KEGIATAN;?>" class="btn btn-warning btn-xs" >Koreksi</a></td>
                   </tr>
                  <?php $f++;} ?>
                    
                  </table>
                </div><!-- /.box-body --><br><br>

                <!-- <div class="box-body table-responsive no-padding">
                  <h4 class="box-title"><i class="fa fa-check-square-o" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;<b>Pelatihan</b></h4>
                  <table class="table table-hover">
                      
                    <tr><td width="30px"><a href="<?php // echo base_url().'C_dosen/tambahPelatihan'?>" class="btn btn-block btn-social btn-instagram"><i>+</i>Tambah Pelatihan </a></td></tr>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pelatihan</th>
                      <th>Penyelenggara</th>
                      <th>Negara</th>
                      <th>Tahun</th>
                      <th>File</th>
                    </tr>
                    <?php// $a=0; foreach ($beasiswa as $data){ $a++ ?>
                    <tr>
                      <td>1. </td>
                      <td>Coding</td>
                      <td>Google</td>
                      <td>Amerika</td>
                      <td>2017</td>
                      <td><a href="#">Lihat</a> </td>
                   </tr>
                  <?php //} ?>
                    
                  </table>
                </div> /.box-body --> 
                <?php }?>
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->




</div><!-- /.content-wrapper -->