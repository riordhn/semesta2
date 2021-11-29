 <div class="container">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Monitoring
             <small>Izin Belajar</small>
         </h1>
     </section>

     <!-- Main content -->
     <section class="content">
         <!-- Small boxes (Stat box) -->
         SEMESTER 1-6
         <div class="row">
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-aqua">
                     <div class="inner">
                         <h3>
                             <?php foreach($smt1 as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Semester 1
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringIB/1' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-green">
                     <div class="inner">
                         <h3>
                             <?php foreach($smt2 as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Semester 2
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringIB/2' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-yellow">
                     <div class="inner">
                         <h3>
                             <?php foreach($smt3 as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Semester 3
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringIB/3' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-red">
                     <div class="inner">
                         <h3>
                             <?php foreach($smt4 as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Semester 4
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringIB/4' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-blue">
                     <div class="inner">
                         <h3>
                             <?php foreach($smt5 as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Semester 5
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringIB/5' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-purple">
                     <div class="inner">
                         <h3>
                             <?php foreach($smt6 as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Semester 6
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringIB/6' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
         </div><!-- /.row -->

         SELANJUTNYA
         <!-- Small boxes (Stat box) -->
         <div class="row">
             
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-teal">
                     <div class="inner">
                         <h3>
                             <?php foreach($smt7 as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Semester 7 dan selebihnya
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringSmt7IB' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-maroon">
                     <div class="inner">
                         <h3>
                             <?php foreach($semua as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Total Aktif Izin Belajar
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringSemuaIB/' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-green">
                     <div class="inner">
                         <h3>
                             <?php foreach($semuaTarget as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Target Lulus Tahun Ini
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringThIB/' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-lg-6">
                 <!-- small box -->
                 <div class="small-box bg-navy">
                     <div class="inner">
                         <center>
                             <h3>
                                 <?php foreach($semua80 as $smt){ echo $smt->NUM;}?>
                             </h3>
                             <p>
                                 Indikasi Kelulusan tahun ini
                             </p>
                         </center>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringIndiIB/' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-4">
                 <!-- small box -->
                 <div class="small-box bg-green">
                     <div class="inner">
                         <h3>
                             <?php foreach($semuaLulus as $smt){ echo $smt->NUM;}?>
                         </h3>
                         <p>
                             Lulus
                         </p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-group"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailMonitoringLulusIB/' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->

         </div><!-- /.row -->

         <!-- Widgets as boxes -->
         <div class="container-fluid">
             <div class="box">
                 <div class="box-header">
                     <center>
                         <h3 class="box-title">Daftar Monitoring</h3>
                     </center> <br>
                 </div><!-- /.box-header -->
                 <div class="box-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 <th colspan="7"></th>
                                 <th><a href="<?php echo base_url().'C_subditSDM/fileExcelIB/';?>"
                                         class="btn btn-block btn-primary btn-sm">Ekspor ke Excel</a></th>
                             </tr>
                             <tr>
                                 <th style="width: 10px">No.</th>
                                 <th>Nama</th>
                                 <th style="width: 15px">Semester</th>
                                 <th>Universitas Tujuan</th>
                                 <th>Tanggal Mulai</th>
                                 <th>Tanggal Selesai</th>
                                 <th>Progres Tesis/Disertasi</th>
                                 <th style="width: 10px">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $i=1; foreach($mon as $akt){?>
                             <tr>
                                 <td><?php echo $i."."; ?></td>
                                 <td><?php echo $akt->NAMA; ?></td>
                                 <td><?php echo $akt->SEMESTER_SEKARANG; ?></td>
                                 <td><?php echo $akt->PERGURUAN_TINGGI_PENYELENGGARA; ?></td>
                                 <td><?php echo $akt->MULAI_IB; ?></td>
                                 <td><?php echo $akt->SELESAI_IB; ?></td>
                                 <td><?php echo $akt->PROGRES_DISERTASI; ?>%</td>
                                 <?php if($akt->SEMESTER_SEKARANG>1){ ?>
                                 <td><a href="<?php echo base_url().'C_subditSDM/detailMonevSDMIB/'.$akt->a;?>"
                                         class="btn btn-block btn-success btn-xs">Lihat Detail</a></td>
                                 <?php }else{?>
                                 <td>Masih Semester 1</td>
                                 <?php } ?>
                             </tr>
                             <?php $i++; } ?>
                         </tbody>
                     </table>
                 </div><!-- /.box-body -->
             </div>
         </div>

     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->