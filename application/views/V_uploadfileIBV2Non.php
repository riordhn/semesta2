<div class="container">
    <div class="container-fluid">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h5 align="center"><b>Langkah 3 dari 4 Usulan Izin Belajar</b></h5><br>
                            <h4 class="text-center"><b>Unggah Berkas</b></h4>
                        </div><!-- /.box-header --><br><br>
                        <?php foreach($idIbel as $id){ ?>
                        <!-- <form role="form" action="<?php //echo base_url().'C_dosen/upload_file/'.$id->id_tubel  ?>" method="POST" enctype="multipart/form-data"> -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>No.</th>
                                    <th>Dokumen</th>
                                    <th>Status Berkas</th>
                                    <th>Upload(Format: pdf/image max size 2mb)</th>
                                </tr>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="42">
                                    <input type="hidden" name="namajenis"
                                        value="Surat Pernyataan Tidak Meninggalkan Tugas">
                                    <td>1. </td>
                                    <td>surat pernyataan tidak meninggalkan tugas kedinasan dan atau tugas pekerjaan
                                        sehari-hari dari yang bersangkutan (materai)</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_A==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>



                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <input type="hidden" name="idjenis" value="43">
                                <input type="hidden" name="namajenis"
                                    value="Bukti akreditasi prodi dan instansi minmal B">
                                <tr>

                                    <td>2. </td>
                                    <td>Bukti akreditasi prodi dan instansi minmal B</td>
                                    <!-- <td><a href="<?php echo base_url().'C_dosen/outputPernyataanIB/'.$id->id_ib; ?>">Unduh Template Surat</a></td> -->

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_B==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>



                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="44">
                                    <input type="hidden" name="namajenis" value="DP3 dalam 2 tahun terakhir">
                                    <td>3. </td>
                                    <td>DP3 dalam 2 tahun terakhir saat mulai tugas belajar</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_C==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>



                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="45">
                                    <input type="hidden" name="namajenis" value="surat keterangan sehat">
                                    <td>4. </td>
                                    <td>Surat keterangan sehat jasmani dan rohani pada saat sebelum berangkat</td>
                                    <!-- <td><a href="<?php echo base_url().'C_dosen/outputLinierIB/'.$id->id_ib; ?>">Unduh Template Surat</a></td> -->
                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_D==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>


                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="47">
                                    <input type="hidden" name="namajenis"
                                        value="surat pernyataan biaya pendidikan ditanggung ybs">
                                    <td>5. </td>
                                    <td>Surat pernyataan biaya pendidikan dan fasilitas penunjang lainnya ditanggung
                                        oleh yang bersangkutan (materai), mengetahui Dekan Fak</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_E==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="48">
                                    <input type="hidden" name="namajenis"
                                        value="surat pernyataan tidak menuntut kenaikan pangkat">
                                    <td>6. </td>
                                    <td>Surat pernyataan tidak menuntut kenaikan pangkat penyesuian ijazah dari yang
                                        bersangkutan (materai), mengetahui Dekan Fak</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_F==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="46">
                                    <input type="hidden" name="namajenis"
                                        value="Surat Keterangan studi Linear dengan pekerjaan">
                                    <td>7. </td>
                                    <td>Surat Keterangan studi Linear dengan pekerjaan</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_G==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="49">
                                    <input type="hidden" name="namajenis" value="SK CPNS_Calon Pegawai tetap">
                                    <td>8. </td>
                                    <td>SK CPNS / SK Calon Pegawai tetap</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_H==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="50">
                                    <input type="hidden" name="namajenis" value="SK PNS_Pegawai Tetap">
                                    <td>9. </td>
                                    <td>SK PNS / SK Pegawai Tetap</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_I==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="51">
                                    <input type="hidden" name="namajenis" value="SK Kenaikan Pangkat terakhir">
                                    <td>10. </td>
                                    <td>SK Kenaikan Pangkat terakhir</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_J==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="52">
                                    <input type="hidden" name="namajenis" value="SK Kenaikan Jabatan terakhir">
                                    <td>11. </td>
                                    <td>SK Kenaikan Jabatan terakhir</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_K==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file"></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                                <form role="form"
                                    action="<?php echo base_url().'C_dosen/upload_fileIBV2/'.$id->id_ib; ?>"
                                    method="POST" enctype="multipart/form-data" />
                                <tr>
                                    <input type="hidden" name="idjenis" value="70">
                                    <input type="hidden" name="namajenis"
                                        value="Surat Pengantar Pengajuan Izin Belajar">
                                    <td>12. </td>
                                    <td>Surat Pengantar Pengajuan Izin Belajar</td>

                                    <?php foreach ($file as $key) {
                                 if ($key->FILE_L==NULL) {?>
                                    <td>Berkas belum diunggah</td>
                                    <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="file" required></td>
                                    <td><button type='submit' class="btn btn-primary" name="submit"
                                            value="Simpan">Simpan</button></td>
                                    <?php } else { ?>
                                    <td><strong>Berhasil diunggah</strong></td>
                                    <td align="center">&#9989;</td>
                                    <td></td>
                                    <?php } }?>
                                </tr>
                                </form>

                            </table>

                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <center>
                                        <h3 class="box-title">Konfirmasi Usulan Tugas Belajar</h3>
                                    </center>
                                </div>
                                <div class="box-body">

                                    <center>Harap lengkapi seluruh dokumen diatas untuk menyelesaikan pengajuan izin
                                        belajar. Jika seluruh berkas lengkap tombol <b>SUBMIT</b> akan muncul dibawah
                                        ini. Jika masih ada berkas yang belum lengkap, anda dapat menyimpan data dengan
                                        tombol simpan dibawah.<br> </center><br><br>
                                    <?php foreach ($count as $hitung) {
                              ?>
                                    <div class="form-group">
                                        <?php if ($hitung->jumlah<12) { ?>
                                        <form action="<?php echo base_url().'C_dosen/ubahStatusIB'?>" method="post">
                                            <input type="hidden" class="form-control" name="ID_tubels"
                                                value="<?php echo $id->id_ib; ?>">
                                            <input type="hidden" name="status" value="11">
                                            <input type="hidden" name="jenis" value="1">
                                            <center><button type="submit" class="btn btn-primary"
                                                    name="btsub">Simpan</button></center>
                                        </form>
                                        <?php } elseif ($hitung->jumlah>=12) { ?>
                                        <center><a
                                                href="<?php echo base_url().'C_dosen/SubmitIB/2/'. $id->id_ib; ?>"><button
                                                    class="btn btn-success">Ajukan</button></a></center>
                                        <?php }}?>
                                    </div>

                                </div><!-- /.box-body -->
                            </div>

                            <div class="box-footer">
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