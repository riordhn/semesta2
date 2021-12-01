 <div class="container">
    <div class="container-fluid">
       <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Unggah Surat Keputusan Perpanjangan</h3></center> <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Unit Kerja Fakultas</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>Pangkat Golongan</th>
                        <th>Status Pegawai</th>
                        <th>Jenis Kepegawaian</th>
                        <th>Unduh Template</th>
                        <th width="200px">Unggah File (pdf, max.5MB)</th>
                        <th width="100px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                      <tr>
                         <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br> <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td><?php echo $data->TGL_SUBMIT_TB ?></td>
                        <td><?php echo $data->STATUS_SL?></td>
                        <td><?php if($data->LOKASI_TUBEL==1) echo "Luar Negeri"; else echo "Dalam Negeri"; ?></td>
                         <td><?php echo $data->PANGKAT_GOLONGAN?></td>
                        <td><?php echo $data->STATUS_PEGAWAI?></td>
                        <td><?php echo $data->JENIS_KEPEGAWAIAN?></td>
                         <td><a href="<?php echo base_url().'C_SubditSDM/outputSKPTB/'.$data->ID_TUBEL;?>">Unduh SKPTB</a></td>
                         <form role="form" action="<?php echo base_url().'C_subditSDM/uploadfile_SKPP/'.$data->ID_PERPANJANGAN;?>"class="form-group" method="POST" enctype="multipart/form-data">
                          <td>
                             <input type="hidden" class="form-control" name="nik" value="<?php echo $data->NIK; ?>" >
                             <input type="hidden" class="form-control" name="lokasi" value="<?php echo $data->LOKASI_TUBEL; ?>" >
                              <label>SK Perpanjangan Tugas Belajar</label>
                              <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="<?php echo $data->ID_PERPANJANGAN?>">
                              
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