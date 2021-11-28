
<div class="content-wrapper">
        <div class="container-fluid">
        <section class="content-header">
          <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                        <h5 align="center"><b>Step 3 dari 4</b></h5><br>
                          <h3 class="box-title">Upload File</h3>
                        </div><!-- /.box-header -->
                        <?php foreach($idIbel as $id){ ?>
                        <form role="form" action="<?php echo base_url().'C_dosen/upload_fileIB/'.$id->id_ib  ?>" method="POST" enctype="multipart/form-data">
                        <?php }?>
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>No.</th>
                              <th>Dokumen</th>
                              <th>Template</th>
                              <th>File Upload</th>
                              <th>Upload(Format: pdf/image maxsize 2mb)</th>
                            </tr>
                            <tr>
                              <td>1. </td>
                              <td>Surat Pernyataan Bermaterai (3 Poin Pernyataan)</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file42"  required></td>
                            </tr>

                            <tr>
                              <td>2. </td>
                              <td>Bukti Akreditasi Prodi dan Instansi Izin Belajar</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file43" required></td>
                            </tr>

                            <tr>
                              <td>3.. </td>
                              <td>SKP 2 Tahun Terakhir</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file44" required></td>
                            </tr>

                            <tr>
                              <td>4. </td>
                              <td>Surat Keterangan Sehat</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file45" required></td>
                            </tr>

                            <tr>
                              <td>5. </td>
                              <td>Surat Keterangan Prodi yang ditempuh Linier</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file46" required></td>
                            </tr>

                            <tr>
                              <td>6. </td>
                              <td>Bukti Penerimaan di Perguruan Tinggi tujuan Izin belajar</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file47" required></td>
                            </tr>
                          </table>

                          <div class="box-footer" >
                          <a href="<?php echo base_url().'C_dosen' ?>" class="btn btn-primary">Kembali</a>
                          <button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button>
                          </div>
                        </div><!-- /.box-body -->
                        </form>
                      </div><!-- /.box -->
                    </div>
                  </div>
                </section><!-- /.content -->
                </div>
              </div><!-- /.content-wrapper -->