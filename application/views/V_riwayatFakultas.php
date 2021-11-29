<div class="container">
<section class="content">
          <!-- Small boxes (Stat box) -->
    <div class="row">
        <div  class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php foreach($tubel1 as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Studi Lanjut <br> Dalam Proses <?php echo $this->session->userdata('fak');?></p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <!-- <a href="<?php echo base_url().'C_subditSDM/detailDashboard/1' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php foreach($tubel2 as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Studi Lanjut <br> Dalam Proses SDM</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <!-- <a href="<?php echo base_url().'C_subditSDM/detailDashboardSDM/' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php foreach($tubel3 as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Studi Lanjut <br> Dalam Proses AGE</p>
                </div>
                <div class="icon">
                 <i class="fa fa-fw fa-user"></i>
                </div>
                <!-- <a href="<?php echo base_url().'C_subditSDM/detailDashboard/5' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php foreach($tubel4 as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Studi Lanjut <br> Selesai</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <!-- <a href="<?php echo base_url().'C_subditSDM/detailDashboard/7' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
        </div>
        <!-- ------------------------------------------IBEL----------------------------- -->
        <div  class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php foreach($ibel1 as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Izin Belajar <br> Dalam Proses <?php echo $this->session->userdata('fak');?></p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <!-- <a href="<?php echo base_url().'C_subditSDM/detailDashboardIB/1' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-xs-6">
              <!-- small box -->
              <div class="small-box bg-gray">
                <div class="inner">
                  <h3><?php foreach($ibel2 as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Izin Belajar <br> Dalam Proses SDM</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <!-- <a href="<?php echo base_url().'C_subditSDM/detailDashboardSDMIB/' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php foreach($ibel4 as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Izin Belajar <br> Selesai</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <!-- <a href="<?php echo base_url().'C_subditSDM/detailDashboardIB/7' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
        </div>

        <!-- -------------------------------------------IBEL-------------------------- -->
         <div class="col-lg-6 col-xs-6">
             <div class="small-box bg-purple">
                <div class="inner">
                  <center>
                  <h3><?php foreach($pp as $smt){ echo $smt->NUM;}?></h3>
                  <p>Perpanjangan</p>
                  </center>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                 <!-- <a href="<?php echo base_url().'C_subditSDM/perpanjanganSubdit' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <center>
                  <h3><?php foreach($pk as $smt){ echo $smt->NUM;}?></h3>
                  <p>Pengaktifan Kembali</p>
                </center>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                 <!-- <a href="<?php echo base_url().'C_subditSDM/pengaktifanSubdit' ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
 </div>

 <?php 
            if (!empty($tangguh) || !empty($tpan) || !empty($takt) || !empty($ibel) ) { ?>
          <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                    Ada File Pengajuan yang ditangguhkan! Silakan <a href="<?php echo base_url().'C_fakultas/fileDitangguhkan' ?>" class="btn btn-primary btn-xs">Klik di sini</a> untuk upload ulang!
          </div>
        <?php }?>
       
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Daftar Usulan Studi Lanjut</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Status Pegawai/Gol</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jenis Pengajuan</th>
                        <th>Status</th>
                        <th>Lokasi Berkas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->STATUS_PEGAWAI." / ".$data->PANGKAT_GOLONGAN ?></td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td>Tugas Belajar</td>
                        <td><?php echo $data->STATUS_SL?></td>
                        <td><?php echo $data->LOKASI_DATA?></td>
                        <?php if ($data->ID_STATUS_SL==3){?>
                        <td><a href="<?php echo base_url().'C_fakultas/unduhFak2/'.$data->ID_TUBEL.'/'.$data->NIK;?>">Lihat/Unduh</a></td>
                      <?php } else if($data->ID_STATUS_SL==7){?>
                          <td><a href="<?php echo base_url().'C_fakultas/unduhFak/'.$data->ID_TUBEL.'/'.$data->NIK;?>">Lihat/Unduh</a></td>
                      <?php }else { ?><td>-</td> <?php } ?>
                      </tr>
                      <?php } ?>

                      <?php $a=0; foreach ($Ibelall as $bla){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $bla->NAMA ?><br> <?php echo $bla->NIK ?><br> <?php echo $bla->TEMPAT_LAHIR ?>, <?php echo $bla->TGL_LAHIR ?></td>
                        <td><?php echo $bla->STATUS_PEGAWAI." / ".$bla->PANGKAT_GOLONGAN ?></td>
                        <td><?php echo $bla->TGL_SUBMIT_IB;?></td>
                        <td>Izin Belajar</td>
                        <td><?php echo $bla->STATUS_SL?></td>
                        <td><?php echo $bla->LOKASI_DATA?></td>
                        <?php if ($bla->ID_STATUS_SL==3){?>
                        <td><a href="<?php echo base_url().'C_fakultas/unduhFak2/'.$$bla->ID_IBEL.'/'.$data->NIK;?>">Lihat/Unduh</a></td>
                      <?php } else if($bla->ID_STATUS_SL==7){?>
                          <td><a href="<?php echo base_url().'C_fakultas/unduhFak/'.$bla->ID_IBEL.'/'.$data->NIK;?>">Lihat/Unduh</a></td>
                      <?php }else { ?><td>-</td> <?php } ?>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>

   
</section>
</div>
