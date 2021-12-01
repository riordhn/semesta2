<div class="container">
    <div class="container-fluid">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <center>
                                <h3 class="box-title">Unggah Berkas Tubel Fakultas</h3>
                            </center>
                        </div><!-- /.box-header -->
                        <?php foreach($nik as $id){ ?>
                        <form role="form" action="<?php echo base_url().'C_fakultas/upload_file/'.$id->id_tubel  ?>"
                            method="POST" enctype="multipart/form-data">
                            <?php }?>
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr style="background-color:  #F0F0F0">
                                        <th>No.</th>
                                        <th>Nama Dokumen</th>
                                        <!-- <th>Template</th> -->
                                        <th>Unggah (Format PDF dengan ukuran maksimal 2 MB)</th>

                                    </tr>

                                    <tr style="background-color:  #F0F0F0">
                                        <td>1.</td>
                                        <td>Surat Rekomendasi Atasan</td>
                                        <td>
                                            <strong>Nomor Surat:</strong>
                                            <input type="text" class="form-control" name="NoSuratRek"
                                                placeholder="Nomor Surat" required><br>
                                            <strong>Tanggal Surat:</strong>
                                            <input type="date" class="form-control" name="TglSuratRek"
                                                placeholder="Tgl Surat" required><br>
                                            <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                            <input type="text" class="form-control" name="JabAtasanRek"
                                                placeholder="Jabatan Atasan" required><br>
                                            <strong>Unggah Surat Rekomendasi:</strong>
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file4" required></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>2.</td>
                                        <td>SK Kenaikan Jabatan Terakhir</td>
                                        <!-- <td></td> -->
                                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file15" required></td>

                                    </tr>
                                    <tr style="background-color:  #F0F0F0">
                                        <td>3.</td>
                                        <td>SK Kenaikan Pangkat Terakhir</td>
                                        <!-- <td></td> -->
                                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file16" required></td>

                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>SK PNS / SK PT</td>
                                        <!-- <td></td> -->
                                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file17" required></td>
                                    </tr>

                                    <tr style="background-color:  #F0F0F0">
                                        <td>5.</td>
                                        <td>SK CPNS / SK CPT</td>
                                        <!-- <td></td> -->
                                        <td>
                                            <strong>Nomor Surat:</strong>
                                            <input type="text" class="form-control" name="NoSuratCPNS"
                                                placeholder="Nomor Surat" required><br>
                                            <strong>Tanggal Surat:</strong>
                                            <input type="date" class="form-control" name="TglSuratCPNS"
                                                placeholder="Tgl Surat" required><br>
                                            <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                            <input type="text" class="form-control" name="JabAtasanCPNS"
                                                placeholder="Jabatan Atasan" required><br>
                                            <strong>Unggah berkas SK CPNS:</strong>
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file18" required></td>

                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Surat Permohonan SK Tugas Belajar dan Pembebasan Sementara dari Pimpinan
                                            Unit Kerja</td>
                                        <td>
                                            <strong>Nomor Surat:</strong>
                                            <input type="text" class="form-control" name="NoSuratPer"
                                                placeholder="Nomor Surat" required><br>
                                            <strong>Tanggal Surat:</strong>
                                            <input type="date" class="form-control" name="TglSuratPer"
                                                placeholder="Tgl Surat" required><br>
                                            <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                            <input type="text" class="form-control" name="JabAtasanPer"
                                                placeholder="Jabatan Atasan" required><br>
                                            <strong>Unggah Berkas Surat Permohonan SK:</strong>
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file19" required></td>

                                    </tr>

                                    <tr style="background-color:  #F0F0F0">
                                        <td>7.</td>
                                        <td width="700px">Surat keterangan dari pimpinan unit kerja mengenai bidang
                                            studi yang akan ditempuh mempunyai hubungan atau sesuai dengan tugas
                                            pekerjaannya (ttd. Kedep & Mengetahui Dekan Fak)</td>
                                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file5" required></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>8.</td>
                                        <td width="700px">Surat Pernyataan (9 Poin)</td>
                                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file7" required></td>
                                        <td></td>
                                    </tr>

                                    <tr style="background-color:  #F0F0F0">
                                        <td>9.</td>
                                        <td width="700px">Kartu Pegawai / ID Card (untuk PT) <br><i>*diharapkan untuk
                                                bisa mengunggah karpeg</i></td>
                                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file10" required></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>10.</td>
                                        <td width="700px">Konversi NIP <br><i><strong>*Tidak Wajib</strong>, Jika ada
                                                maka silahkan diunggah</i></td>
                                        <td><input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file65"></td>
                                        <td></td>
                                    </tr>

                                    <!-- <tr>
                                        <td>11.</td>
                                        <td width="700px">Surat Pengantar Pengajuan Tugas Belajar</td>
                                        <td>
                                            <strong>Nomor Surat:</strong>
                                            <input type="text" class="form-control" name="NoSuratPeng"
                                                placeholder="Nomor Surat" required><br>
                                            <strong>Tanggal Surat:</strong>
                                            <input type="date" class="form-control" name="TglSuratPeng"
                                                placeholder="Tgl Surat" required><br>
                                            <strong>Jabatan Pejabat Yang bertanda Tangan:</strong>
                                            <input type="text" class="form-control" name="JabAtasanPeng"
                                                placeholder="Jabatan Atasan" required><br>
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp"
                                                class="form-control" name="file67"></td>
                                        <td></td>
                                    </tr> -->
                                </table>

                                <div class="box-footer">
                                    <a href="<?php echo base_url().'C_fakultas/usulanTBFakultas/' ?>"
                                        class="btn btn-primary">Kembali</a>
                                    <button type="submit" class="btn btn-success" name="submit"
                                        value="Simpan">Simpan</button>
                                </div>
                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div>
</div><!-- /.content-wrapper -->