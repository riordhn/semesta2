
<div class="content-wrapper">
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
                              <th>NIK</th>
                              <th>Nama Pemohon</th>
                              <th>Jenis Pengajuan</th>
                              <th>Dokumen</th>
                              <th>Keterangan Kesalahan</th>
                              <th>Upload(Format: pdf max size 2mb)</th>
                            </tr>
                            

                            <?php $a=1; foreach($tubel as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_fakultas/upload_fileTBulang/'.$id->ID_TUBEL; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_T ?>">
                              <input type="hidden" name="NIK" value="<?php echo $id->NIK ?>">
                            <tr>
                              
                              <td style="vertical-align: middle;"><?php echo $a; ?>. </td>
                              <td style="vertical-align: middle;"><?php echo $id->NIK ?></td>
                              <td style="vertical-align: middle;"><?php echo $id->NAMA ?></td>
                              <td style="vertical-align: middle;">Tugas Belajar</td>
                              <td style="vertical-align: middle;"><?php echo $id->NAMA_FILE_T ?></td>
                              <td style="vertical-align: middle;"><?php echo $id->KETERANGAN_REVISI_TUBEL?></td>
                              <?php $ids=array('4','15','16','17','18','19','5','7','10','65','67');                              
                               if(in_array($id->ID_JENIS,$ids)) { ?>
                              <?php if($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN != NULL || $id->NOMOR_SURAT != NULL && $id->TGL_SURAT != "0000-00-00" && $id->JABATAN_PIMPINAN != NULL) { ?><!-- jika upload ada inputan 3 -->
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="1">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" value="<?php echo $id->JABATAN_PIMPINAN ?>" required><br>
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } elseif ($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN == NULL || $id->NOMOR_SURAT != NULL && $id->TGL_SURAT != "0000-00-00" && $id->JABATAN_PIMPINAN == NULL) { ?> <!-- jika inputan tgl & no saja -->
                                <td>
                                <input type="hidden" class="form-control" name="kode" value="2">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <input type="hidden" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan">
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>

                              <?php }else{ ?>
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="3">
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php }} else { ?>
                                <td><i><b>Berkas Diunggah Oleh Fakultas</b></i></td>
                              <td></td>
                              <?php } ?> 
                            </tr>
                            </form>
                            <?php $a++; }?>


                            <?php $a=1; foreach($tubel1 as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_fakultas/upload_filePanjangulang/'.$id->ID_PERPANJANGAN; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_PJG ?>">
                              <input type="hidden" name="NIK" value="<?php echo $id->NIK ?>">
                            <tr>
                              
                              <td><?php echo $a; ?>. </td>
                              <td><?php echo $id->NIK ?></td>
                              <td><?php echo $id->NAMA ?></td>
                              <td>Perpanjangan Tugas Belajar</td>
                              <td><?php echo $id->NAMA_FILE_PJG ?></td>
                              <td><?php echo $id->KETERANGAN_REVISI_PERPANJANGAN?></td>
                              <?php if($id->ID_JENIS = 30 || $id->ID_JENIS = 56 || $id->ID_JENIS = 57 || $id->ID_JENIS = 68 ) { ?>
                               <?php if($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN != NULL) { ?><!-- jika upload ada inputan 3 -->
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="1">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" value="<?php echo $id->JABATAN_PIMPINAN ?>" required><br>
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } elseif ($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN == NULL) { ?> <!-- jika inputan tgl & no saja -->
                                <td>
                                <input type="hidden" class="form-control" name="kode" value="2">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <input type="hidden" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan">
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>

                              <?php }else{ ?>
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="3">
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } ?> 
                              <?php } else { ?>
                                <td><i><b>Berkas Diunggah Oleh Fakultas</b></i></td>
                              <td></td>
                              <?php } ?> 
                            </tr>
                            </form>
                            <?php $a++; }?>

                            <?php $a=1; foreach($takt as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_fakultas/upload_fileAktifulang/'.$id->ID_PENGAKTIFAN; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_AKT ?>">
                              <input type="hidden" name="NIK" value="<?php echo $id->NIK ?>">
                            <tr>
                              
                              <td><?php echo $a; ?>. </td>
                              <td><?php echo $id->NIK ?></td>
                              <td><?php echo $id->NAMA ?></td>
                              <td>Pengaktifan kembali dari Tugas Belajar</td>
                              <td><?php echo $id->NAMA_FILE_AKT ?></td>
                              <td><?php echo $id->KETERANGAN_REVISI_PENGAKTIFAN?></td>
                              <?php if($id->ID_JENIS == 35 || $id->ID_JENIS == 66 || $id->ID_JENIS == 37 || $id->ID_JENIS == 69 ) { ?>
                                <?php if($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN != NULL) { ?><!-- jika upload ada inputan 3 -->
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="1">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" value="<?php echo $id->JABATAN_PIMPINAN ?>" required><br>
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } elseif ($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN == NULL) { ?> <!-- jika inputan tgl & no saja -->
                                <td>
                                <input type="hidden" class="form-control" name="kode" value="2">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <input type="hidden" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan">
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>

                              <?php } elseif ($id->NOMOR_SURAT == NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN == NULL) { ?> <!-- jika inputan tgl & no saja -->
                                <td>
                                <input type="hidden" class="form-control" name="kode" value="3">
                                <strong>Tanggal SPMT:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>

                              <?php }else{ ?>
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="4">
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } ?> 
                              <?php } else { ?>
                                <td><i><b>Berkas Diunggah Oleh Fakultas</b></i></td>
                              <td></td>
                              <?php } ?> 
                            </tr>
                            </form>
                            <?php $a++; }?>

                            <?php $a=1; foreach($ibel as $id){ ?>
                            <form role="form" action="<?php echo base_url().'C_fakultas/upload_fileIbelulang/'.$id->ID_IB; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="<?php echo $id->ID_JENIS ?>">
                              <input type="hidden" name="namajenis" value="<?php echo $id->NAMA_FILE_IB ?>">
                              <input type="hidden" name="NIK" value="<?php echo $id->NIK ?>">
                            <tr>
                              
                              <td><?php echo $a; ?>. </td>
                              <td><?php echo $id->NIK ?></td>
                              <td><?php echo $id->NAMA ?></td>
                              <td>Izin Belajar</td>
                              <td><?php echo $id->NAMA_FILE_IB ?></td>
                              <td><?php echo $id->KETERANGAN_REVISI_IB?></td>
                              <?php if($id->ID_JENIS == 49 || $id->ID_JENIS == 46 || $id->ID_JENIS == 50 || $id->ID_JENIS == 51 || $id->ID_JENIS == 52 || $id->ID_JENIS == 70 ) { ?>
                                 <?php if($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN != NULL) { ?><!-- jika upload ada inputan 3 -->
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="1">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" value="<?php echo $id->JABATAN_PIMPINAN ?>" required><br>
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } elseif ($id->NOMOR_SURAT != NULL && $id->TGL_SURAT != NULL && $id->JABATAN_PIMPINAN == NULL) { ?> <!-- jika inputan tgl & no saja -->
                                <td>
                                <input type="hidden" class="form-control" name="kode" value="2">
                                <strong>Nomor Surat:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" value="<?php echo $id->NOMOR_SURAT ?>" required><br>
                                <strong>Tanggal Surat:</strong>
                                <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" value="<?php echo $id->TGL_SURAT ?>" required><br>
                                <input type="hidden" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan">
                                <strong>Unggah Berkas:</strong>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>

                              <?php }else{ ?>
                              <td>
                                <input type="hidden" class="form-control" name="kode" value="3">
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } ?> 
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