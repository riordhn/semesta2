<div class="content-wrapper">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Dokumen SETNEG</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama <br> NIP <br> TTL</th>
                        <th>Unit Kerja Fakultas</th>
                        <th>Dokumen</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                        <th width="200px">Unduh File</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tubel as $data){ ?>
                      <tr>
                         <td>1. </td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td>Setneg</td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                         <td><a href="<?php echo base_url();?>file/tubel/<?php echo 'SETNEG_'.$data->NIK.'_'.$data->ID_TUBEL.'.pdf'?>" target="_blank">Lihat</a></td>
                      </tr>
                        <?php } ?>

                        <?php if($tubel1!=NULL){
                         foreach ($tubel as $data){  ?>
                      <tr>
                         <td>2. </td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td>Perpanjangan Setneg</td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                        <td><?php foreach ($tubel1 as $d){  ?>
                          <a href="<?php echo base_url();?>file/perpanjangan/<?php echo 'Perpanjangan SETNEG_'.$data->NIK.'_'.$d->ID_PERPANJANGAN.'.pdf'?>" target="_blank">Lihat</a>
                        <?php } ?>
                        </td>
                      </tr>
                        <?php }} ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>