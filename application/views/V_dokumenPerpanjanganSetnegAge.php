 <div class="content-wrapper">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Dokumen Perpanjangan SETNEG</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama <br> NIP <br> TTL</th>
                        <th>Unit Kerja Fakultas</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Unggah Berkas Perpanjangan SETNEG
                        (format PDF, maks.2MB)</th>
                        <th width="100px"></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $a=0; foreach ($usulan as $data){ $a++ ?>
                      <tr>
                         <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                        <form role="form" action="<?php echo base_url().'C_Age/uploadfile_PPsetneg/'.$data->ID_PERPANJANGAN;?>"class="form-group" method="POST" enctype="multipart/form-data">
                          <td>
                             <input type="hidden" class="form-control" name="nik" value="<?php echo $data->NIK; ?>" >
                              <label>Tanggal & Nomor SETNEG</label><br>

                               <input type="text" class="form-control" name="nomor_surat" placeholder="nomor surat" required="required">

                               <input type="date" class="form-control" name="tgl_surat" placeholder="tanggal surat" required="required"><br><br>
                              <label>Perpanjangan SETNEG</label>
                              <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="<?php echo $data->ID_PERPANJANGAN;?>"> <br>
                          </td>
                          <td><button type="submit" class="btn btn-primary" name="btsub">Simpan</button></td>
                        </form>
                      </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
    </div>
</div>