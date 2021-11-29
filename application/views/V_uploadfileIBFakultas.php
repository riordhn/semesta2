
<div class="container">
        <div class="container-fluid">
        <section class="content-header">
          <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="text-center">Unggah Berkas Izin Belajar Fakultas</h3>
                        </div><!-- /.box-header -->
                        
                        <form role="form" action="<?php echo base_url().'C_fakultas/upload_fileIB/'.$id  ?>" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>No.</th>
                              <th>Dokumen</th>
                              <th>Unggah (format PDF/image, maks. 2 MB)</th>
                            </tr>
                            <tr>
                              <td>1. </td>
                              <td>Surat Keterangan dari pimpinan unit kerja mengenai bidang studi<br> yang akan ditempuh mempunyai hubungan atau sesuai dengan tugas pekerjaannya <br>(ttd. Kedep & Mengetahui Dekan Fak)</td>
<!--                               <td><a href="<?php echo base_url().'C_fakultas/outputPermohonanIB/'.$id; ?>">Unduh Template Surat</a></td> -->
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file46"  required></td>
                            </tr>
                            <tr>
                              <td>2. </td>
                              <td>SK CPNS / Calon Pegawai tetap</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file49"  required></td>
                            </tr>

                            <tr>
                              <td>3. </td>
                              <td>SK PNS / Pegawai Tetap</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file50" required></td>
                            </tr>

                            <tr>
                              <td>4. </td>
                              <td>SK Kenaikan Pangkat Terakhir</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file51" required></td>
                            </tr>

                            <tr>
                              <td>5. </td>
                              <td>SK Kenaikan Jabatan Terakhir</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file52" required></td>
                            </tr>
                            <tr>
                              <td>6. </td>
                              <td>Surat Pengantar Pengajuan Izin Belajar</td><br>
                              <td><label><b>Tanggal Surat:</b></label><br>
                                <input type="date" class="form-control" name="tglsurat" required><br>
                                <label><b>Nomor Surat:</b></label><br>
                                <input type="text" class="form-control" name="nosurat" required><br>
                                <label><b>Jabatan Pejabat Yang bertanda Tangan:</b></label><br>
                                <input type="text" class="form-control" name="jabatan" required><br>
                                <label>Unggah Berkas Pengantar:</label>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file70" required></td>
                            </tr>

                          </table>

                          <div class="box-footer" >
                          <a href="<?php echo base_url().'C_dosen' ?>" class="btn btn-primary">Kembali</a>
                          <button type='submit' class="btn btn-success" name="submit" value="Simpan">Simpan</button>
                          </div>
                        </div><!-- /.box-body -->
                        </form>
                      </div><!-- /.box -->
                    </div>
                  </div>
                </section><!-- /.content -->
                </div>
              </div><!-- /.content-wrapper -->