 <style>
     .small-box .icon {
         font-size: 50px !important;
     }
 </style>
 <div class="container">
     <section class="content">
         <!-- Small boxes (Stat box) -->
         TUGAS BELAJAR
         <div class="row">
             <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-aqua">
                     <div class="inner">
                         <h3><?php foreach($tubel1 as $smt){ echo $smt->NUM;}?></h3>
                         <p>Usulan Tugas Belajar <br> Dalam Proses Fakultas</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailDashboard/1' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-green">
                     <div class="inner">
                         <h3><?php foreach($tubel2 as $smt){ echo $smt->NUM;}?></h3>
                         <p>Usulan Tugas Belajar <br> Dalam Proses SDM</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailDashboardSDM/' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-yellow">
                     <div class="inner">
                         <h3><?php foreach($tubel3 as $smt){ echo $smt->NUM;}?></h3>
                         <p>Usulan Tugas Belajar <br> Dalam Proses AGE</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailDashboard/5' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-red">
                     <div class="inner">
                         <h3><?php foreach($tubel4 as $smt){ echo $smt->NUM;}?></h3>
                         <p>Usulan Tugas Belajar <br> Selesai</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailDashboard/7' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div>
        </div>
        IZIN BELAJAR
        <div class="row">
            <!-- IBEL -->
            <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-aqua">
                     <div class="inner">
                         <h3><?php foreach($ibel1 as $smt){ echo $smt->NUM;}?></h3>
                         <p>Usulan Izin Belajar <br> Dalam Proses Fakultas</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailDashboardIB/1' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-green">
                     <div class="inner">
                         <h3><?php foreach($ibel2 as $smt){ echo $smt->NUM;}?></h3>
                         <p>Usulan Izin Belajar <br> Dalam Proses SDM</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailDashboardSDMIB/' ?>"
                         class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
             <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-red">
                     <div class="inner">
                         <h3><?php foreach($ibel4 as $smt){ echo $smt->NUM;}?></h3>
                         <p>Usulan Izin Belajar <br> Selesai</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/detailDashboardIB/7' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div>
        </div>
        TUGAS BELAJAR (Lanjutan)
        <div class="row">
             <!-- IBEL -->
             <div class="col-lg-2 col-xs-6">
                 <div class="small-box bg-purple">
                     <div class="inner">
                        <h3><?php foreach($pp as $smt){ echo $smt->NUM;}?></h3>
                        <p>Perpanjangan Tugas Belajar</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/perpanjanganSubdit' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div>

             <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-maroon">
                     <div class="inner">
                        <h3><?php foreach($pk as $smt){ echo $smt->NUM;}?></h3>
                        <p>Pengaktifan Kembali dari Tugas Belajar</p>
                     </div>
                     <div class="icon">
                         <i class="fa fa-fw fa-user"></i>
                     </div>
                     <a href="<?php echo base_url().'C_subditSDM/pengaktifanSubdit' ?>" class="small-box-footer">Lihat
                         Detail <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
         </div>

         <div class="container-fluid">
             <div class="box">
                 <div class="box-header">
                     <center>
                         <h3 class="box-title">Daftar Usulan Studi Lanjut</h3>
                     </center> <br>
                 </div><!-- /.box-header -->
                 <div class="box-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 <th colspan="5"></th>
                                 <th><a href="<?php echo base_url().'C_subditSDM/excel_register/';?>"
                                         class="btn btn-block btn-primary btn-sm">Ekspor ke Excel</a></th>
                             </tr>
                             <tr>
                                 <th>No.</th>
                                 <th>Nama | NIP | TTL</th>
                                 <th>Unit Kerja</th>
                                 <th>Tanggal Submit</th>
                                 <th>Status</th>
                                 <th>Lokasi Data</th>

                             </tr>
                         </thead>
                         <tbody>
                             <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                             <tr>
                                 <td><?php echo $a.'.' ?></td>
                                 <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br>
                                     <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                                 <td><?php echo $data->UNIT_KERJA ?></td>
                                 <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                                 <td><?php echo $data->STATUS_SL?></td>
                                 <td><?php echo $data->LOKASI_DATA?></td>
                             </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div><!-- /.box-body -->
             </div>
         </div>


     </section>
 </div>