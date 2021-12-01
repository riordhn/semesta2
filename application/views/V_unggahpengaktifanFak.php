
<div class="container">
        <div class="container-fluid">
        <section class="content-header">
          <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <center><h3 class="box-title">Unggah Berkas Pengaktifan Fakultas</h3></center>
                        </div><!-- /.box-header -->
                        <?php// foreach ($id as $key) { ?>
                        <form role="form" action="<?php echo base_url().'C_fakultas/upload_Pengaktifan/'.$id  ?>" method="POST" enctype="multipart/form-data">
                          
                        <?php //}?>
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                                <th>No.</th>
                                <th>Nama Dokumen</th>
                                <!-- <th>Template</th> -->
                                <th>Unggah (Format: pdf maxsize 5MB)</th>
                                <!-- <th>Status</th> -->
                            </tr>

                      <tr>
                        <td>1.</td>
                        <td>Berita Acara Pemeriksan (bagi pegawai pelajar yang melebihi ketentuan studi/tidak segera melakukan pengaktifan ketika kembali)</td>
                        <!-- <td></td> -->
                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file0"></td>
                        <!-- <td></td> -->
                      </tr>

                      <tr>
                        <td>2.</td>
                        <td>DP-3 Tahun Terakhir</td>
                        <!-- <td></td> -->
                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file1"></td>
                        <!-- <td></td> -->
                      </tr>
                      <!-- <tr>
                        <td>4.</td>
                        <td>Surat Permohonan SK Pengaktifan Kembali</td>
                        <td><a href="<?php echo base_url().'C_fakultas/outputSKAktif/'.$id?>">Unduh Template</a></td>
                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file3" required></td>
                        <td></td>
                      </tr> -->
                      <tr>
                        <td>3.</td>
                        <td>Surat Keterangan Melaksanakan Tugas dan Mata Kuliah Yang Dibina (SPMT)</td>
                        <td><label><b>Tanggal SPMT:</b></label><br>
                          <input type="date" class="form-control" name="spmt" required><br>
                          <label>Unggah Berkas SPMT:</label>
                          <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file2" required></td>
                        <!-- <td></td> -->
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Surat Pengantar Pengajuan Pengaktifan Kembali dari Tugas Belajar</td>
                        <td><label><b>Tanggal Surat:</b></label><br>
                          <input type="date" class="form-control" name="tglsurat" required><br>
                          <label><b>Nomor Surat:</b></label><br>
                          <input type="text" class="form-control" name="nosurat" required><br>
                          <label><b>Jabatan Pejabat Yang bertanda Tangan:</b></label><br>
                          <input type="text" class="form-control" name="jabatan" required><br>
                          <label>Unggah Berkas:</label>
                          <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file3" required></td>
                        <!-- <td></td> -->
                      </tr>

                      <tr>
                        <td>5.</td>
                        <td>SK Kenaikan Pangkat Terakhir</td>
                        <!-- <td></td> -->
                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file4"></td>
                        <!-- <td></td> -->
                      </tr>

                      <tr>
                        <td>6.</td>
                        <td>SK Kenaikan Jabatan Terakhir</td>
                        <!-- <td></td> -->
                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file5"></td>
                        <!-- <td></td> -->
                      </tr>
                          </table>

                          <div class="box-footer" >
                          <a href="<?php echo base_url().'C_fakultas/usulanPengaktifan/' ?>" class="btn btn-primary">Kembali</a>
                          <button type="submit" class="btn btn-success" name="submit" value="Simpan">Simpan</button>
                          </div>
                        </div><!-- /.box-body -->
                        </form>
                      </div><!-- /.box -->
                    </div>
                  </div>
                </section><!-- /.content -->
                </div>
              </div><!-- /.content-wrapper -->