<div class="content-wrapper">
    <div class="container-fluid">
    	 <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Usulan Izin Belajar</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama <br> NIP <br> TTL</th>
                        <th>Unit Kerja</th>
                        <th>Status</th>
                        <th>Lokasi Data</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                        <td><?php echo $data->LOKASI_DATA?></td>
                      </tr>
                       <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>