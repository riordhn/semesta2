
<div class="content-wrapper">
        <div class="container-fluid">
        <section class="content-header">
          <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                        <h5 align="center"><b>Langkah 3 dari 4 Usulan Tugas Belajar</b></h5><br>
                          <h4 class="text-center"><b>Formulir Unggah Berkas Pengajuan Tugas Belajar</b></h4>
                        </div><!-- /.box-header --><br><br>
                        <?php foreach($idTubel as $id){ ?>
                        <!-- <form role="form" action="<?php echo base_url().'C_dosen/upload_file/'.$id->id_tubel  ?>" method="POST" enctype="multipart/form-data"> -->
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>No.</th>
                              <th>Dokumen</th>
                              <!-- <th>Template</th> -->
                              <th width="250px">Status Berkas</th>
                              <th colspan="2">Unggah(format PDF, maks. 2 MB)</th>
                            </tr>
                            


                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                              <input type="hidden" name="idjenis" value="1">
                              <input type="hidden" name="namajenis" value="Surat Jaminan Pembiayaan Studi">
                            <tr>
                              
                              <td>1. </td>
                              <td>Surat Jaminan Memperoleh Beasiswa/Keterangan Pembiayaan Studi</td>
                             <!--  <td>-</td> -->
                              <?php foreach ($file as $key) { 
                                if ($key->FILE_A==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                              
                            </tr>
                            </form>



                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="2">
                              <input type="hidden" name="namajenis" value="LOA">
                              <td>2. </td>
                              <td>
                                Surat Bukti Diterima oleh Tempat Pelaksanakan Studi (LoA)</td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_B==NULL) { ?>
                              <td>    
                                Berkas belum diunggah
                              </td>
                              <td>
                                <strong>Nomor Surat LOA:</strong>
                                <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat LOA" required><br>
                                <strong>Tanggal Surat LOA:</strong>
                                <input type="Date" class="form-control" name="TglSruat" placeholder="Tanggal Surat LOA" required><br>
                                <strong>Unggah LOA:</strong>
                                <input type="file" class="form-control" name="file" required><br>
                              </td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                              <td><strong>Berhasil diunggah</strong></td>
                              <td align="center">&#x2705;</td>
                              <?php } }?>
                              
                            </tr>
                            </form>

                            

                            <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="3">
                              <input type="hidden" name="namajenis" value="Surat Keterangan Sehat">
                              <td>3. </td>
                              <td>Surat Keterangan Sehat Jasmani dan Rohani dari Rumah Sakit</td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_C==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>



                           <!--  <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="4">
                              <input type="hidden" name="namajenis" value="Surat Rekomendasi Pimpinan">
                              <td>4. </td>
                              <td>Surat Rekomendasi dari Pimpinan Unit Kerja</td>
                              <td><a href="<?php echo base_url().'C_dosen/outputRekom/'.$id->id_tubel; ?>">Unduh Template Surat</a></td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_D==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form> -->


                            <!-- <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <tr>
                              <input type="hidden" name="idjenis" value="5">
                              <input type="hidden" name="namajenis" value="Surat Keterangan Linier">
                              <td>4. </td>
                              <td>Surat Keterangan Atasan Langsung (Mengetahui Pimpinan Unit Kerja) yang Menyatakan Keterkaitan Bidang Studi Pilihan dengan Tugas Pekerjaan</td>
                              <td><a href="<?php echo base_url().'C_dosen/outputSuket/'.$id->id_tubel; ?>">Unduh Template Surat</a></td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_E==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form> -->


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="6">
                            <input type="hidden" name="namajenis" value="SKP 2 tahun Terakhir">
                            <tr>
                              <td>4. </td>
                              <td>Sasaran Kinerja Pegawai (SKP) 2 tahun terakhir sebelum studi</td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_F==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>


                          <!-- <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
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
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form> -->


                          <!-- <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="8">
                            <input type="hidden" name="namajenis" value="Bukti Akreditas Prodi dan Instansi">
                            <tr>
                              <td>5. </td>
                              <td>Bukti Akreditasi Prodi dan Instansi tempat studi (minimal B untuk lembaga pendidikan dalam negeri)</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                               if ($key->FILE_H==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form> -->

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="9">
                            <input type="hidden" name="namajenis" value="Akta Nikah">
                            <tr>
                              <td>5. </td>
                              <td>Akta Nikah<br><i>*(apabila belum menikah, tidak perlu diisi)</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_I==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>


                          <!-- <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="10">
                            <input type="hidden" name="namajenis" value="KARPEG">
                            <tr>
                              <td>7. </td>
                              <td>Kartu Pegawai (Karpeg)</td>
                              <td>-</td>
                              <td><?php foreach ($file as $key) {
                                if ($key->FILE_J==NULL) {
                                echo "Berkas belum diunggah";
                              } else {
                                echo "&#9989; Berkas sudah diunggah";
                              } }?></td>
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                            </tr>
                          </form> -->


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="11">
                            <input type="hidden" name="namajenis" value="Scan KTP">
                            <tr>
                              <td>6. </td>
                              <td>Pindaian (Scan) Kartu Tanda Penduduk</td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_K==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>


                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="12">
                            <input type="hidden" name="namajenis" value="Scan CV">
                            <tr>
                              <td>7. </td>
                              <td>Pindaian (Scan) Daftar Riwayat Hidup</td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_L==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="13">
                            <input type="hidden" name="namajenis" value="PASPOR">
                            <tr>
                              <td>8. </td>
                              <td>Pindaian (Scan) Paspor <br><i>*(khusus pengajuan tugas belajar luar negeri) *untuk pengajuan tugas belajar dalam negeri tidak wajib diisi</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_M==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                           <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="62">
                            <input type="hidden" name="namajenis" value="SWAB">
                            <tr>
                              <td>9. </td>
                              <td>Hasil SWAB PCR <br><i><strong>*Selama Pandemi COVID-19 Wajib melampirkan</strong></i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_D==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                           <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="63">
                            <input type="hidden" name="namajenis" value="SuratKedutaan">
                            <tr>
                              <td>10. </td>
                              <td>Email/Surat dari Kedutaan <br><i><strong>*Selama Pandemi COVID-19 Wajib melampirkan</strong></i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_E==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                           <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="64">
                            <input type="hidden" name="namajenis" value="AGENDA">
                            <tr>
                              <td>11. </td>
                              <td>Agenda Kegiatan selama Studi <br><i><strong>*Selama Pandemi COVID-19 Wajib melampirkan</strong></i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_G==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

<!-- ---------------------------------Berkas yang ada di fakultas--------------------------- -->

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="4">
                            <input type="hidden" name="namajenis" value="Surat Rekomendasi Pimpinan">
                            <tr>
                              <td>12. </td>
                              <td>Surat Rekomendasi Pimpinan</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_N==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><strong>Nomor Surat:</strong>
                                  <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" required><br>
                                  <strong>Tanggal Surat:</strong>
                                  <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" required><br>
                                  <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                  <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" required><br>
                                  <strong>Unggah Surat Rekomendasi:</strong>
                                  <input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="15">
                            <input type="hidden" name="namajenis" value="SK Kenaikan Jabatan Terakhir">
                            <tr>
                              <td>13. </td>
                              <td>SK Kenaikan Jabatan Terakhir</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_O==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="16">
                            <input type="hidden" name="namajenis" value="SK Kenaikan Pangkat Terakhir">
                            <tr>
                              <td>14. </td>
                              <td>SK Kenaikan Pangkat Terakhir</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_P==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="17">
                            <input type="hidden" name="namajenis" value="SK PNS">
                            <tr>
                              <td>15. </td>
                              <td>SK PNS/SK PT</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_Q==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="18">
                            <input type="hidden" name="namajenis" value="SK CPNS">
                            <tr>
                              <td>16. </td>
                              <td>SK CPNS/SK CPT</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_R==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><strong>Nomor Surat:</strong>
                                  <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" required><br>
                                  <strong>Tanggal Surat:</strong>
                                  <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" required><br>
                                  <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                  <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" required><br>
                                  <strong>Unggah berkas SK CPNS:</strong>
                                  <input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="19">
                            <input type="hidden" name="namajenis" value="Surat Permohonan SK TB">
                            <tr>
                              <td>17. </td>
                              <td>Surat Permohonan SK Tugas Belajar dan Pembebasan Sementara dari Pimpinan Unit Kerja</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_S==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><strong>Nomor Surat:</strong>
                                  <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" required><br>
                                  <strong>Tanggal Surat:</strong>
                                  <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" required><br>
                                  <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                  <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" required><br>
                                  <strong>Unggah Berkas Surat Permohonan SK:</strong>
                                  <input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="5">
                            <input type="hidden" name="namajenis" value="Surat Keterangan Linier">
                            <tr>
                              <td>18. </td>
                              <td>Surat keterangan dari pimpinan unit kerja mengenai bidang studi yang akan ditempuh mempunyai hubungan atau sesuai dengan tugas pekerjaannya (ttd. Kedep & Mengetahui Dekan Fak)</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_T==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="7">
                            <input type="hidden" name="namajenis" value="Surat Pernyataan Bermaterai(9)">
                            <tr>
                              <td>19. </td>
                              <td>Surat Pernyataan Bermaterai(9 poin)</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_U==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file" required></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="10">
                            <input type="hidden" name="namajenis" value="KARPEG">
                            <tr>
                              <td>20. </td>
                              <td>Kartu Pegawai / ID Card (untuk PT) <br><i>*diharapkan untuk bisa mengunggah karpeg/ID Card</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_V==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="65">
                            <input type="hidden" name="namajenis" value="Konversi NIP">
                            <tr>
                              <td>21. </td>
                              <td>Konversi NIP <br><i><strong>*Tidak Wajib</strong>, Jika ada maka silahkan diunggah</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_W==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          <form role="form" action="<?php echo base_url().'C_dosen/upload_fileV2/'.$id->id_tubel; ?>" method="POST" enctype="multipart/form-data"/>
                            <input type="hidden" name="idjenis" value="67">
                            <input type="hidden" name="namajenis" value="Surat Pengantar Pengajuan Tugas Belajar">
                            <tr>
                              <td>22. </td>
                              <td>Surat Pengantar Pengajuan Tugas Belajar</i></td>
                              <!-- <td>-</td> -->
                              <?php foreach ($file as $key) {
                                if ($key->FILE_X==NULL) {?>
                              <td>Berkas belum diunggah</td>
                              <td><strong>Nomor Surat:</strong>
                                  <input type="text" class="form-control" name="NoSurat" placeholder="Nomor Surat" required><br>
                                  <strong>Tanggal Surat:</strong>
                                  <input type="date" class="form-control" name="TglSurat" placeholder="Tgl Surat" required><br>
                                  <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                  <input type="text" class="form-control" name="JabAtasan" placeholder="Jabatan Atasan" required><br>
                                  <input type="file" class="form-control" name="file"></td>
                              <td><button type='submit' class="btn btn-primary" name="submit" value="Simpan">Simpan</button></td>
                              <?php } else { ?>
                                <td><strong>Berhasil diunggah</strong></td>
                                <td align="center">&#9989;</td>
                              <?php } }?>
                            </tr>
                          </form>

                          </table>

                          <div class="box box-solid box-primary">
                            <div class="box-header">
                              <center><h3 class="box-title">Konfirmasi data Tugas Belajar</h3></center>
                            </div>
                            <div class="box-body">
                               
                              <center>Harap lengkapi seluruh dokumen diatas untuk menyelesaikan pengajuan tugas belajar. Pilihan <b>AJUKAN</b> akan muncul apabila unggahan berkas lengkap Konfirmasi data tugas belajar. Jika masih ada berkas yang belum lengkap, anda dapat menyimpan data dengan tombol simpan dibawah.<br> </center><br><br>
                           
                            <div class="form-group">
                              <?php  foreach($file as $k){
                          if ($count==19 && $k->FILE_M==NULL && $k->FILE_I==NULL && $k->FILE_W==NULL || $count==22 && $k->FILE_M!=NULL && $k->FILE_I!=NULL && $k->FILE_W!=NULL || $count==21 && $k->FILE_M==NULL && $k->FILE_I!=NULL && $k->FILE_W!=NULL || $count==21 && $k->FILE_M!=NULL && $k->FILE_I==NULL && $k->FILE_W!=NULL || $count==21 && $k->FILE_M!=NULL && $k->FILE_I!=NULL && $k->FILE_W==NULL || $count==20 && $k->FILE_M!=NULL && $k->FILE_I==NULL && $k->FILE_W==NULL || $count==20 && $k->FILE_M==NULL && $k->FILE_I!=NULL && $k->FILE_W==NULL || $count==20 && $k->FILE_M==NULL && $k->FILE_I==NULL && $k->FILE_W!=NULL) { ?>
                              <form action="<?php echo base_url().'C_dosen/ubahStatusTB'?>" method="post">
                              <input type="hidden" class="form-control" name="ID_tubels" value="<?php echo $id->id_tubel; ?>" >
                              <input type="hidden" name="status" value="11">
                              <input type="hidden" name="jenis" value="1">
                              <center><button type="submit" class="btn btn-primary" name="btsub">Simpan</button></center>
                              </form>
                              <br>
                              <center><a href="<?php echo base_url().'C_dosen/SubmitTB/2/'. $id->id_tubel; ?>"><button class="btn btn-success">Ajukan</button></a></center>
                            <?php } else { ?>
                             <form action="<?php echo base_url().'C_dosen/ubahStatusTB'?>" method="post">
                              <input type="hidden" class="form-control" name="ID_tubels" value="<?php echo $id->id_tubel; ?>" >
                              <input type="hidden" name="status" value="11">
                              <input type="hidden" name="jenis" value="1">
                              <center><button type="submit" class="btn btn-primary" name="btsub">Simpan</button></center>
                              </form>
                            <?php }}?>
                            </div>
                                     
                              

                            
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