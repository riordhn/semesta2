<div class="container">
        <div class="container-fluid">
        <section class="content-header">
          <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                        <h5 align="center"><b>Halaman Berkas Ditangguhkan</b></h5><br>
                          <h4 class="text-center"><b>Unggah Ulang Berkas Ditangguhkan</b></h4>
                        </div><!-- /.box-header --><br><br>
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>No.</th>
                              <th>Dokumen</th>
                              <th>Jenis Pengajuan</th>
                              <th>Tanggal ditangguhkan</th>
                              <th>Keterangan Kesalahan</th>
                              <th>Unggah (format PDF, maks. 5 MB)</th>
                            </tr>
                            

                            <?php $a=1; foreach($tubel as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileTBulang/'.$id->ID_TUBEL; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_T ?>">
                            <tr>
                              
                              <td style="vertical-align: middle;"><?php echo $a; ?>. </td>
                              <td style="vertical-align: middle;"><?php echo $id->NAMA_FILE_T ?></td>
                              <td style="vertical-align: middle;">Tugas Belajar</td>
                              <td style="vertical-align: middle;"><?php echo $id->TGL_UPDATE?></td>
                              <td style="vertical-align: middle;"><?php echo $id->KETERANGAN_REVISI_TUBEL?></td>
                              <?php $ids=array('1','2','3','6','9','11','12','13','62','63','64');                              
                               if(in_array($id->ID_JENIS,$ids)) { ?>

                              <?php if($id->ID_JENIS == 2) { ?>
                              <td><strong>Nomor Surat:</strong>
                              <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                              <strong>Tanggal Surat:</strong>
                              <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                              <input type="hidden" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" value="">
                              <strong>Unggah Surat Rekomendasi:</strong>
                              <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <td></td>
                              <?php }} else { ?>
                                <td><i><b>Berkas Diunggah Oleh Fakultas</b></i></td>
                              <td></td>
                              <?php } ?> 
                            </tr>
                            </form>
                            <?php $a++; }?>

                            <?php $a=1; foreach($tubel1 as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_dosen/upload_filepanjangulang/'.$id->ID_PERPANJANGAN; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_PJG ?>">
                            <tr>
                              
                              <td><?php echo $a; ?>. </td>
                              <td><?php echo $id->NAMA_FILE_PJG ?></td>
                              <td>Perpanjangan Tugas Belajar</td>
                              <td><?php echo $id->TGL_UPDATE?></td>
                              <td><?php echo $id->KETERANGAN_REVISI_PERPANJANGAN?></td>
                              <?php if($id->ID_JENIS == 26 || $id->ID_JENIS == 27 || $id->ID_JENIS == 28) { ?>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><i><b>Berkas Diunggah Oleh Fakultas</b></i></td>
                              <td></td>
                              <?php } ?> 
                            </tr>
                            </form>
                            <?php $a++; }?>

                            <?php $a=1; foreach($aktif as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileAktifulang/'.$id->ID_PENGAKTIFAN; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_AKT ?>">
                            <tr>
                              
                              <td><?php echo $a; ?>. </td>
                              <td><?php echo $id->NAMA_FILE_AKT ?></td>
                              <td>Pengaktifan Kembali Dari Tugas Belajar</td>
                              <td><?php echo $id->TGL_UPDATE?></td>
                              <td><?php echo $id->KETERANGAN_REVISI_PENGAKTIFAN?></td>
                              <?php if($id->ID_JENIS == 33) { ?>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><i><b>Berkas Diunggah Oleh Fakultas</b></i></td>
                              <td></td>
                              <?php } ?> 
                            </tr>
                            </form>
                            <?php $a++; }?>

                            <?php $a=1; foreach($ibel as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileIbelulang/'.$id->ID_IB; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_IB ?>">
                            <tr>
                              
                              <td><?php echo $a; ?>. </td>
                              <td><?php echo $id->NAMA_FILE_IB ?></td>
                              <td>Izin Belajar</td>
                              <td><?php echo $id->TGL_UPDATE?></td>
                              <td><?php echo $id->KETERANGAN_REVISI_IB?></td>
                              <?php if($id->ID_JENIS == 42 || $id->ID_JENIS == 43 || $id->ID_JENIS == 44 || $id->ID_JENIS == 45 || $id->ID_JENIS == 47 || $id->ID_JENIS == 48) { ?>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><i><b>Berkas Diunggah Oleh Fakultas</b></i></td>
                              <td></td>
                              <?php } ?> 
                            </tr>
                            </form>
                            <?php $a++; }?>
                          </table>

                        

                          <div class="box-footer" >
                          <!-- <a href="<?php echo base_url().'C_dosen' ?>" class="btn btn-primary">Kembali</a>
                          <button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button> -->
                          </div>
                        </div><!-- /.box-body -->
                      
                        <!-- </form> -->
                      </div><!-- /.box -->
                    </div>
                  </div>
                </section><!-- /.content -->
                </div>
              </div><!-- /.content-wrapper -->