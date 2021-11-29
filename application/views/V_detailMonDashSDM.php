<div class="container">
<div class="container-fluid">
       <div class="box"> 
                <div class="box-header">
                  <center><h3 class="box-title">Daftar Monitoring</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">No.</th>
                        <th>Nama</th>
                        <th style="width: 15px">Semester</th>
                        <th>Universitas Sekarang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Progres Tesis/Disertasi</th>
                        <th style="width: 10px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($tubel as $akt){?>
                                <tr>
                                  <td><?php echo $i."."; ?></td>
                                  <td><?php echo $akt->NAMA; ?></td>
                                  <td><?php echo $akt->SEMESTER_SEKARANG; ?></td>
                                  <td><?php echo $akt->PERGURUAN_TINGGI_PENYELENGGARA; ?></td>
                                  <td><?php echo $akt->MULAI_TUBEL; ?></td>
                                  <td><?php echo $akt->SELESAI_TUBEL; ?></td>
                                  <td><?php echo $akt->PROGRES_DISERTASI; ?>%</td>
                                  <td><a href="<?php echo base_url().'C_subditSDM/detailMonevSDM/'.$akt->a;?>" class="btn btn-block btn-success btn-xs" >Lihat Detail</a></td>
                                </tr>
                        <?php $i++; } ?>                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
    </div>