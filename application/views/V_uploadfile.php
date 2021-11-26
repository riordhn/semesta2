
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
                        <?php foreach($idTubel as $id){ ?>
                        <form role="form" action="<?php echo base_url().'C_dosen/upload_file/'.$id->id_tubel  ?>" method="POST" enctype="multipart/form-data">
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
                              <td>Surat Jaminan memperoleh beasiswa/pembiayaan Tubel</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file1"></td>
                            </tr>

                            <tr>
                              <td>2. </td>
                              <td>LOA</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file2"></td>
                            </tr>

                            <tr>
                              <td>3.. </td>
                              <td>Surat Keterangan Sehat</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file3"></td>
                            </tr>

                            <tr>
                              <td>4. </td>
                              <td>Surat Rekomendasi Pimpinan</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file4"></td>
                            </tr>

                            <tr>
                              <td>5. </td>
                              <td>Surat Keterangan Linear</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file5"></td>
                            </tr>

                            <tr>
                              <td>6. </td>
                              <td>SKP 2 Tahun Terakhir</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file6"></td>
                            </tr>

                            <tr>
                              <td>7. </td>
                              <td>Surat Pernyataan Bermaterai (9 Poin Pernyataan)</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file7"></td>
                            </tr>

                            <tr>
                              <td>8. </td>
                              <td>Bukti Akreditasi Prodi dan Instansi</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file8"></td>
                            </tr>

                            <tr>
                              <td>9. </td>
                              <td>Akta Nikah</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file9"></td>
                            </tr>

                            <tr>
                              <td>10. </td>
                              <td>KARPEG</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file10"></td>
                            </tr>

                            <tr>
                              <td>11. </td>
                              <td>Scan KTP</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file11"></td>
                            </tr>

                            <tr>
                              <td>12. </td>
                              <td>Scan CV / Riwayat Hidup</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file12"></td>
                            </tr>

                            <tr>
                              <td>13. </td>
                              <td>Scan Paspor</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file13"></td>
                            </tr>

                            <!-- <tr>
                              <td>14. </td>
                              <td>Surat Perjanjian TB</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" class="form-control" name="file14"></td>
                            </tr> -->
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