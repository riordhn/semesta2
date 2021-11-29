
<div class="container">
        <div class="container-fluid">
        <section class="content-header">
          <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                        <h5 align="center"><b>Langkah 3 dari 4 Usulan Tugas Belajar</b></h5><br>
                          <h4 class="text-center"><b>Unggah Berkas</b></h4>
                        </div><!-- /.box-header --><br><br>
                        <?php foreach($idTubel as $id){ ?>
                        <!-- <form role="form" action="<?php echo base_url().'C_dosen/upload_file/'.$id->id_tubel  ?>" method="POST" enctype="multipart/form-data"> -->
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>No.</th>
                              <th>Dokumen</th>
                              <th>Template</th>
                              <th>Status Berkas</th>
                              <th>Upload(Format: pdf max size 2mb)</th>
                            </tr>
                            


                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="1">
                              <input type="hidden" name="namajenis" value="Surat Jaminan Pembiayaan Studi">
                            <tr>
                              
                              <td>1. </td>
                              <td>Surat Jaminan Memperoleh Beasiswa/Keterangan Pembiayaan Studi</td>
                              <td>-</td>
                             
                              <td><?php foreach ($file as $key) { 
                                if ($key->FILE_A==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                            </form>



                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="2">
                              <input type="hidden" name="namajenis" value="LOA">
                              <td>2. </td>
                              <td>Surat Keterangan Lulus dari Tempat Melaksanakan Studi (LoA)</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_B==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                            </form>



                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="3">
                              <input type="hidden" name="namajenis" value="Surat Keterangan Sehat">
                              <td>3.. </td>
                              <td>Surat Keterangan Sehat Jasmani dan Rohani dari Rumah Sakit</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_C==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>



                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="4">
                              <input type="hidden" name="namajenis" value="Surat Rekomendasi Pimpinan">
                              <td>4. </td>
                              <td>Surat Rekomendasi dari pimpinan unit kerja</td>
                              <td><a href="<?php echo base_url().'C_dosen/outputRekom/'.$id->id_tubel; ?>">Unduh Template Surat</a></td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_D==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>


                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="5">
                              <input type="hidden" name="namajenis" value="Surat Keterangan Linier">
                              <td>5. </td>
                              <td>Surat keterangan dari atasan langsung mengenai bidang studi yang akan<br> di tempuh mempunyai hubungan atau sesuai dengan tugas pekerjaan nya<br> (mengetahui pimpinan unit kerja)</td>
                              <td><a href="<?php echo base_url().'C_dosen/outputSuket/'.$id->id_tubel; ?>">Unduh Template Surat</a></td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_E==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="6">
                            <input type="hidden" name="namajenis" value="SKP 2 tahun Terakhir">
                            <tr>
                              <td>6. </td>
                              <td>Sasaran Kinerja Pegawai (SKP) 2 tahun terakhir sebelum studi</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_F==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="7">
                            <input type="hidden" name="namajenis" value="Surat Pernyataan Bermaterai(9)">
                            <tr>
                              <td>7. </td>
                              <td>Surat Pernyataan Bermaterai (9 Poin Pernyataan)<br><i>*Silahkan Lihat Template</i></td>
                              <td><a href="<?php echo base_url().'C_dosen/outputPernyataan/'.$id->id_tubel; ?>">Unduh Template Surat</a></td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_G==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              }} ?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="8">
                            <input type="hidden" name="namajenis" value="Bukti Akreditas Prodi dan Instansi">
                            <tr>
                              <td>8. </td>
                              <td>Bukti Akreditasi Prodi dan Instansi tempat studi (bagi dalam negeri, minimal B)</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                               if ($key->FILE_H==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="9">
                            <input type="hidden" name="namajenis" value="Akta Nikah">
                            <tr>
                              <td>9. </td>
                              <td>Akta Nikah<br><i>*(jika sudah menikah jika tidak ada silahkan upload file kosongan)</i></td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_I==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              }} ?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="10">
                            <input type="hidden" name="namajenis" value="KARPEG">
                            <tr>
                              <td>10. </td>
                              <td>KARPEG</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_J==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="11">
                            <input type="hidden" name="namajenis" value="Scan KTP">
                            <tr>
                              <td>11. </td>
                              <td>Scan KTP</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_K==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="12">
                            <input type="hidden" name="namajenis" value="Scan CV">
                            <tr>
                              <td>12. </td>
                              <td>Scan CV / Riwayat Hidup</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_L==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="13">
                            <input type="hidden" name="namajenis" value="PASPOR">
                            <tr>
                              <td>13. </td>
                              <td>Scan Paspor<br><i>*(Jika tubel luar negeri, jika tidak ada cukup unggah file kosong)</i></td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_M==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="15">
                            <input type="hidden" name="namajenis" value="SK Kenaikan Jabatan Terakhir">
                            <tr>
                              <td>14. </td>
                              <td>SK Kenaikan Jabatan Terakhir<br></td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_M==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="16">
                            <input type="hidden" name="namajenis" value="SK Kenaikan Pangkat Terakhir">
                            <tr>
                              <td>15. </td>
                              <td>SK Kenaikan Pangkat Terakhir<br></td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_M==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="17">
                            <input type="hidden" name="namajenis" value="SK PNS">
                            <tr>
                              <td>15. </td>
                              <td>SK PNS<br></td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_M==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="18">
                            <input type="hidden" name="namajenis" value="SK CPNS">
                            <tr>
                              <td>15. </td>
                              <td>SK CPNS<br></td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_M==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form>

                            <!-- <tr>
                              <td>14. </td>
                              <td>Surat Perjanjian TB</td>
                              <td>-</td>
                              <td>Dokumen belum diupload</td>
                              <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file14"></td>
                            </tr> -->
                          </table>

                          <div class="box box-solid box-primary">
                            <div class="box-header">
                              <center><h3 class="box-title">Konfirmasi Usulan Tugas Belajar</h3></center>
                            </div>
                            <div class="box-body">
                               
                              <center>Harap lengkapi seluruh dokumen diatas untuk menyelesaikan pengajuan tugas belajar. Jika seluruh berkas lengkap tombol <b>SUBMIT</b> akan muncul dibawah ini. Jika masih ada berkas yang belum lengkap, anda dapat menyimpan data dengan tombol simpan dibawah.<br> </center><br><br>
                            <?php foreach ($count as $hitung) {
                              ?>
                            <div class="form-group">
                              <?php if ($hitung->jumlah!=13) { ?>
                              <form action="<?php echo base_url().'C_dosen/ubahStatusTB'?>" method="post">
                              <input type="hidden" class="form-control" name="ID_tubels" value="<?php echo $id->id_tubel; ?>" >
                              <input type="hidden" name="status" value="11">
                              <center><button type="submit" class="btn btn-primary" name="btsub">Simpan</button></center>
                            <?php } elseif ($hitung->jumlah==13) { ?>
                             <form action="<?php echo base_url().'C_dosen/ubahStatusTB'?>" method="post">
                              <input type="hidden" class="form-control" name="ID_tubels" value="<?php echo $id->id_tubel; ?>" >
                              <input type="hidden" name="status" value="1">
                              <center><button type="submit" class="btn btn-primary" name="btsub">Submit</button></center>
                            <?php }}?>
                            </div>
                                     
                              

                            </form>
                            </div><!-- /.box-body -->
                          </div>

                          <div class="box-footer" >
                          <!-- <a href="<?php echo base_url().'C_dosen' ?>" class="btn btn-primary">Kembali</a>
                          <button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button> -->
                          </div>
                        </div><!-- /.box-body -->
                      <?php }?>
                        <!-- </form> -->
                        <?php ?>
                      </div><!-- /.box -->
                    <?php ?>
                    </div>
                  </div>
                </section><!-- /.content -->
                </div>
              </div><!-- /.content-wrapper -->