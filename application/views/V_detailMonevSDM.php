<div class="content-wrapper">
<section class="content">
          <div class='row'>
            <div class='col-xs-12'>
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#aktivitas" data-toggle="tab">Aktivitas Studi</a></li>
                  <li><a href="#publikasi" data-toggle="tab">Publikasi & Penghargaan</a></li>
                  <li><a href="#seminar" data-toggle="tab">Seminar & Pelatihan</a></li>
                </ul>
                <div class="tab-content">
                  <!-- aktivitas -->
                  <div class="tab-pane active" id="aktivitas" >
                        <div class="box">
                            <div class="box-header">
                              <?php foreach($mon as $bio){?>
                              <h1 class="box-title"><?php echo $bio->NAMA ?></h1> <br><br>
                              <h1 class="box-title">Aktivitas Studi</h1>
                              <?php } ?>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Semester</th>
                                  <th>SKS</th>
                                  <th>IPK</th>
                                  <th>IPS</th>
                                  <th>KHS</th>
                                  <th>KRS</th>
                                  <th>Progres Disertasi</th>
                                  <th>Deskripsi Disertasi atau Penelitian</th>
                                  <th>Dokumen Disertasi</th>
                                  <th>Dokumen Evaluasi Pembimbing</th>
                                </tr>
                                <?php $i=1; foreach($aktivitas as $akt){?>
                                <tr>
                                  <td><?php echo $i."."; ?></td>
                                  <td><?php echo $akt->SEMESTER; ?></td>
                                  <td><?php echo $akt->SKS; ?></td>
                                  <td><?php echo $akt->IPK; ?></td>
                                  <td><?php echo $akt->IPS; ?></td>
                                  <?php if($akt->FILE_KHS==null){
                                          echo "<td>Tidak ada file upload</td>";
                                        }else{
                                          echo "<td><a href=".base_url()."file/monitoring/".$akt->FILE_KHS." target='_blank'>Lihat KHS</a></td>";
                                        }
                                        if($akt->FILE_KRS==null){
                                          echo "<td>Tidak ada file upload</td>";
                                        }else{
                                          echo "<td><a href='".base_url()."file/monitoring/".$akt->FILE_KRS."' target='_blank'>Lihat KRS</a></td>";
                                        }
                                  ?>
                                  <td><?php echo $akt->PRESENTASE_PENGERJAAN_DISERTASI_THESIS; ?>%</td>
                                  <td><?php echo $akt->DESKRIPSI_PROGRES_PENELITIAN_DISERTASI_THESIS; ?></td>
                                  <?php if($akt->FILE_DISERTASI_THESIS==null){
                                          echo "<td>Tidak ada file upload</td>";
                                        }else{
                                          echo "<td><a href=".base_url()."file/monitoring/".$akt->FILE_DISERTASI_THESIS." target='_blank'>Lihat Disertasi</a></td>";
                                        }
                                  ?>
                                  <?php if($akt->FILE_EVALUASI_PEMBIMBING==null){
                                          echo "<td>Tidak ada file upload</td>";
                                        }else{
                                          echo "<td><a href=".base_url()."file/monitoring/".$akt->FILE_EVALUASI_PEMBIMBING." target='_blank'>Lihat Evaluasi</a></td>";
                                        }
                                  ?>
                                </tr>
                                 <?php $i++; } ?>
                              </table>
                            </div>
                        </div>
                  </div><!-- /#aktivitas- -->

                  <!-- publikasi-->
                  <div class="tab-pane" id="publikasi">
                        <div class="box">
                            <div class="box-header">
                              <?php foreach($mon as $bio){?>
                              <h1 class="box-title"><?php echo $bio->NAMA ?></h1> <br><br>
                              <h1 class="box-title">Publikasi</h1>
                              <?php } ?>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Penulis Ke</th>
                                  <th style="width: 20px">Semester</th>
                                  <th>Judul Jurnal</th>
                                  <th>Afiliasi</th>
                                  <th>ISSN/ISBN</th>
                                  <th>Tahun</th>
                                  <th>Kwartil</th>
                                  <th>Link Publikasi</th>
                                </tr>
                               <?php $i=1; foreach($publikasi as $pub){?>
                                <tr>
                                  <td><?php echo $i."."; ?></td>
                                  <td><?php echo $pub->PENULIS_KE_BERAPA; ?></td>
                                  <td><?php echo $pub->SEMESTER; ?></td>
                                  <td><?php echo $pub->JUDUL_JURNAL; ?></td>
                                  <td><?php echo $pub->AFILIASI; ?></td>
                                  <td><?php echo $pub->ISSN_ISBN; ?></td>
                                  <td><?php echo $pub->TAHUN_PUBLIKASI; ?></td>
                                  <td><?php echo $pub->KWARTIL; ?></td>
                                  <td><a href="https://<?php echo $pub->LINK_PUBLIKASI?>" target="_blank">Lihat Publikasi</a></td>
                                </tr>
                                 <?php $i++; } ?>
                                
                              </table>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                              <h1 class="box-title">Penghargaan</h1>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Nama Penghargaan</th>
                                  <th style="width: 20px">Semester</th>
                                  <th>Pemberi Penghargaan</th>
                                  <th>Tahun</th>
                                  <th>File</th>
                                </tr>
                                <?php $i=1; foreach($penghargaan as $peng){?>
                                <tr>
                                  <td><?php echo $i."."; ?></td>
                                  <td><?php echo $peng->NAMA_PENGHARGAAN; ?></td>
                                  <td><?php echo $peng->SEMESTER; ?></td>
                                  <td><?php echo $peng->PEMBERI_PENGHARGAAN; ?></td>
                                  <td><?php echo $peng->TAHUN_PENGHARGAAN; ?></td>
                                  <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $peng->FILE_UPLOAD_PENGHARGAAN;?>" target="_blank">Lihat Penghargaan</a></td>
                                </tr>
                                 <?php $i++; } ?>
                                
                              </table>
                            </div>
                        </div>
                    
                  </div><!-- /#publikasi -->

                   <!-- seminar-->
                  <div class="tab-pane" id="seminar">
                               <div class="box">
                            <div class="box-header">
                             <?php foreach($mon as $bio){?>
                              <h1 class="box-title"><?php echo $bio->NAMA ?></h1><br><br>
                              <h1 class="box-title">Seminar</h1>
                              <?php } ?>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Nama Seminar</th>
                                  <th style="width: 20px">Semester</th>
                                  <th>Penyelenggara</th>
                                  <th>Negara</th>
                                  <th>Tahun</th>
                                  <th>File</th>
                                </tr>
                                 <?php $i=1; foreach($seminar as $sem){?>
                                <tr>
                                  <td><?php echo $i."."; ?></td>
                                  <td><?php echo $sem->NAMA_KEGIATAN; ?></td>
                                  <td><?php echo $sem->SEMESTER; ?></td>
                                  <td><?php echo $sem->PENYELENGGARA_KEGIATAN; ?></td>
                                  <td><?php echo $sem->NEGARA; ?></td>
                                  <td><?php echo $sem->TAHUN_KEGIATAN; ?></td>
                                  <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $sem->FILE_UPLOAD_BUKTI;?>" target="_blank">Lihat File</a></td>
                                </tr>
                                 <?php $i++; } ?>
                                
                              </table>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                              <h1 class="box-title">Pelatihan</h1>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Nama Pelatihan</th>
                                  <th style="width: 20px">Semester</th>
                                  <th>Penyelenggara</th>
                                  <th>Negara</th>
                                  <th>Tahun</th>
                                  <th>Lihat File</th>
                                </tr>
                                <?php $i=1; foreach($pelatihan as $sem){?>
                                <tr>
                                  <td><?php echo $i."."; ?></td>
                                  <td><?php echo $sem->NAMA_KEGIATAN; ?></td>
                                  <td><?php echo $sem->SEMESTER; ?></td>
                                  <td><?php echo $sem->PENYELENGGARA_KEGIATAN; ?></td>
                                  <td><?php echo $sem->NEGARA; ?></td>
                                  <td><?php echo $sem->TAHUN_KEGIATAN; ?></td>
                                  <td><a href="<?php echo base_url();?>file/monitoring/<?php echo $sem->FILE_UPLOAD_BUKTI;?>" target="_blank">Lihat File</a></td>
                                </tr>
                                 <?php $i++; } ?>
                                
                              </table>
                            </div>
                        </div>
                    
                  </div><!-- /#seminar -->

                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
  </div>