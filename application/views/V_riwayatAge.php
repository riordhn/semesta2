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
                        <th>Unit Kerja</th>
                         <th>Pangkat Golongan</th>
                        <th>Status Pegawai</th>
                        <th>Jenis Kepegawaian</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                        <th width="200px">File SETNEG</th>
                        <th width="200px">File Perpanjangan SETNEG</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                         <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                         <td><?php echo $data->PANGKAT_GOLONGAN?></td>
                        <td><?php echo $data->STATUS_PEGAWAI?></td>
                        <td><?php echo $data->JENIS_KEPEGAWAIAN?></td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                         <?php          if($data->A==null){
                                          echo "<td>-</td>";
                                        }else{
                                          echo "<td><a href=".base_url()."file/tubel/".$data->A." target='_blank'>Lihat SETNEG</a></td>";
                                        }
                                        if($data->B==null){
                                          echo "<td>-</td>";
                                        }else{
                                          echo "<td><a href='".base_url()."file/perpanjangan/".$data->B."' target='_blank'>Lihat Perpanjangan SETNEG</a></td>";
                                        }
                                  ?>
                      </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>