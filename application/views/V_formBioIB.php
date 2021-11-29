<!DOCTYPE html>
<html>

<body class="skin-blue">
    <div class="container">
        <div class="container-fluid">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header">
                        <h5 class="text-center"><b>Langkah 1 dari 4 Usulan Izin Belajar</b></h5><br>
                        <h4 class="text-center">Formulir Data Diri</h4>
                    </div>
                    <?php foreach($Biodata as $data) { ?>
                    <form action="<?php echo base_url().'C_dosen/simpanBiodataIB' ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="Hidden" class="form-control" name="NIK" placeholder="NIK"
                                    value="<?php echo $data->NIK ?>" />
                                <input type="Hidden" class="form-control" name="fotoname" placeholder="NIK"
                                    value="<?php echo $data->FOTO1 ?>" />
                            </div>

                            <div class="form-group"
                                <?php if($data->STATUS_PEGAWAI=='Tendik'){ echo 'style="display: none;"'; } ?>>
                                <label for="NIDN">NIDN</label>
                                <input type="text" readonly="" class="form-control" name="NIDN" placeholder="NIDN"
                                    value="<?php echo $data->NIDN ?>" required />
                            </div>

                            <div class="form-group">
                                <label>Gelar Depan:</label>
                                <input type="text" readonly="" class="form-control" name="gelardepan"
                                    placeholder="Gelar Depan" value="<?php echo $data->GELAR_DEPAN ?>" />
                            </div>

                            <div class="form-group">
                                <label for="Sektor">Nama Lengkap:</label>
                                <input type="text" readonly="" class="form-control" name="nama"
                                    placeholder="Nama Lengkap" value="<?php echo $data->NAMA ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Rumpun">Gelar Belakang</label>
                                <input type="text" readonly="" class="form-control" name="gelarbelakang"
                                    placeholder="Gelar Belakang" value="<?php echo $data->GELAR_BELAKANG ?>" />
                            </div>

                            <div class="form-group">
                                <label for="Rumpun">NIP</label>
                                <input type="text" readonly="" class="form-control" name="NIP" placeholder="NIP"
                                    value="<?php echo $data->NIK ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Rumpun">Unit Kerja</label><br>

                                <select name="unitfak" class="form-control" disabled>
                                    <option value="">------Pilih Unit Kerja-------</option>
                                    <?php foreach($unit as $uni){?>
                                    <option <?php if($data->ID_UNIT_KERJA == $uni->ID_UNIT_KERJA) { echo 'selected'; } ?> value="<?php echo $uni->ID_UNIT_KERJA;?>"><?php echo $uni->FAKULTAS;?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Rumpun">Tempat Lahir</label></br>
                                <input readonly="" type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir"
                                    value="<?php echo $data->TEMPAT_LAHIR ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Tanggal Lahir">Tanggal Lahir</label>
                                <input readonly="" type="date" class="form-control" name="tgllahir" placeholder="Tangggal Lahir"
                                    value="<?php echo $data->TGL_LAHIR ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="NoHp">Nomor Ponsel</label>
                                <input type="text" class="form-control" name="nomor" placeholder="No.HP"
                                    value="<?php echo $data->HANDPHONE ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Email">Surel</label>
                                <input readonly="" type="text" class="form-control" name="email" placeholder="Email"
                                    value="<?php echo $data->EMAIL ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                    value="<?php echo $data->ALAMAT ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Pangkat">Pangkat/Gol</label></br>
                                <!-- <select class="form-control" name="golongan" id="golongan" required>
                                    <?php if ($data->PANGKAT_GOLONGAN==NULL) {?>
                                    <option selected>Pilih Pangkat/Gol</option>
                                    <?php } else {?>
                                    <option value="<?php echo $data->PANGKAT_GOLONGAN ?>" selected>
                                        <?php echo $data->PANGKAT_GOLONGAN ?>
                                    </option>
                                    <?php } ?>

                                    <option value="Pembina Utama (Gol.IV/e)">Pembina Utama (Gol.IV/e)</option>
                                    <option value="Pembina Utama Muda (Gol.IV/c)">Pembina Utama Muda (Gol.IV/c)</option>
                                    <option value="Pembina Tk.I (Gol.IV/c)">Pembina Tk.I (Gol.IV/c)</option>
                                    <option value="Pembina (Gol.IV/a)">Pembina (Gol.IV/a)</option>
                                    <option value="Penata Tk.I (Gol.III/d)">Penata Tk.I (Gol.III/d)</option>
                                    <option value="Penata Tk.I (Gol.III/d)">Penata (Gol.III/c)</option>
                                    <option value="Penata Muda Tk. I (Gol.III/b)">Penata Muda Tk. I (Gol.III/b)</option>
                                    <option value="Penata Muda (Gol.III/a)">Penata Muda (Gol.III/a)</option>
                                    <option value="Pengatur Tk.I (Gol.II/d)">Pengatur Tk.I (Gol.II/d)</option>
                                    <option value="Pengatur (Gol.II/c)">Pengatur (Gol.II/c)</option>
                                    <option value="Pengatur Muda Tk.I (Gol.II/b)">Pengatur Muda Tk.I (Gol.II/b)</option>
                                    <option value="Pengatur Muda Tk.I (Gol.II/a)">Pengatur Muda Tk.I (Gol.II/a)</option>
                                    <option value="Juru Tk.I (Gol.I/d)">Juru Tk.I (Gol.I/d)</option>
                                    <option value="Juru (Gol.I/c)">Juru (Gol.I/c)</option>
                                    <option value="Juru Muda Tk.I (Gol.I/b)">Juru Muda Tk.I (Gol.I/b)</option>
                                    <option value="Juru Muda (Gol.I/a)">Juru Muda (Gol.I/a)</option>

                                </select> -->

                                <input type="text" readonly class="form-control" name="golongan" value="<?php echo $data->PANGKAT_GOLONGAN ?>" required/>
                            </div>

                            <div class="form-group">
                                <label for="TMT PNS/PT">TMT PNS/PT</label>
                                <input type="date" class="form-control" name="TMT" placeholder="TMT PNS"
                                    value="<?php echo $data->TMT_PNS ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="StatusPeg">Status Pegawai</label></br>
                                <input type="text" readonly class="form-control" name="StatusPeg" value="<?php echo $data->STATUS_PEGAWAI ?>" required/>
                            </div>

                            <div class="form-group">
                                <label for="StatusPeg">Jenis Kepegawaian</label></br>
                                <!-- <select class="form-control" name="JenisPeg" id="JenisPeg" required>
                                    <?php if ($data->STATUS_PEGAWAI==NULL) {?>
                                    <option selected>Pilih Jenis Kepegawaian Pegawai</option>
                                    <?php } else { ?>
                                    <option value="<?php echo $data->JENIS_KEPEGAWAIAN ?>" selected>
                                        <?php echo $data->JENIS_KEPEGAWAIAN ?>
                                    </option>
                                    <?php } ?>
                                    <option value="Calon Tetap NonPNS">Calon Tetap Non Pegawai Negeri Sipil</option>
                                    <option value="CPTNPNS">Calon Pegawai Tetap Non Pegawai Negeri Sipil</option>
                                    <option value="NonPNS">Tetap Non Pegawai Negeri Sipil</option>
                                    <option value="CPNS">Calon Pegawai Negeri Sipil</option>
                                    <option value="PNS">Pegawai Negeri Sipil</option> -->
                                    <!--<option value="GB EMIRITUS">GB EMIRITUS</option>-->
                                    <!--<option value="ASISTEN DOSEN">ASISTEN DOSEN</option>-->
                                    <!--<option value="LB">Lektor Besar</option>-->
                                    <!--<option value="HONORER">HONORER</option>-->
                                    <!--<option value="ASISTEN LB">ASISTEN Lektor Besar</option>-->
                                    <!--<option value="KONTRAK">KONTRAK</option>-->
                                    <!--<option value="DLB">DLB</option>-->
                                    <!--<option value="KHUSUS">KHUSUS</option>-->
                                    <!--<option value="LUAR BIASA">LUAR BIASA</option>-->
                                <!-- </select> -->
                                <input type="text" readonly class="form-control" name="JenisPeg" value="<?php echo $data->JENIS_KEPEGAWAIAN ?>" required/>
                            </div>

                            <div class="form-group">
                                <label for="StatusJab">Status Jabatan</label></br>
                                <select class="form-control" name="StatusJab" id="StatusJab" required>
                                    <?php if ($data->STATUS_JABATAN==NULL) {?>
                                    <option selected>Pilih Status Jabatan</option>
                                    <?php } else { ?>
                                    <option value="<?php echo $data->STATUS_JABATAN ?>" selected>
                                        <?php echo $data->STATUS_JABATAN ?>
                                    </option>
                                    <?php } ?>
                                    <option value="Fungsional">Fungsional</option>
                                    <option value="Struktural">Struktural</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Nama Jabatan">Nama Jabatan</label>
                                <input type="text" class="form-control" name="namaJab" placeholder="Nama Jabatan"
                                    value="<?php echo $data->NAMA_JABATAN ?>" required />
                            </div>

                            <?php if (empty($data->FOTO1)) { ?>
                            <div class="form-group">
                                <label>Unggah Pas Foto:</label></br>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="foto" required /></br>
                                format berkas jpg. dengan ukuran maksimal 2 MB
                            </div><!-- /.form group -->
                            <?php } else { ?>
                            <div class="form-group">
                                <p>Foto sudah terunggah. Lihat Foto Klik <a
                                        href="<?php echo $data->FOTO1; ?>"
                                        target="_blank"><?php echo $data->FOTO1 ?></a></p>
                                <p><strong>Jika ingin merubah</strong>, silahkan unggah kembali Pas Foto:</p></br>
                                <input type="file" accept=".png, .jpg, .jpeg, .pdf, .bmp" class="form-control" name="foto" /></br>
                                format berkas jpg. dengan ukuran maksimal 2 MB
                            </div><!-- /.form group -->
                            <?php } ?>


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="<?php echo base_url().'C_dosen' ?>" class="btn btn-primary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                    </form>
                    <?php } ?>


                </div><!-- /.box -->
            </div>
        </div>
    </div>



    <!-- InputMask -->
    <script src="<?php echo base_url().'assets/Admin/plugins/input-mask/jquery.inputmask.js" type="text/javascript'?>">
    </script>
    <script src="<?php echo base_url().'assets/Admin/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"
        type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/Admin/plugins/input-mask/jquery.inputmask.extensions.js'?>"
        type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url().'assets/Admin/plugins/daterangepicker/daterangepicker.js'?>"
        type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url().'assets/Admin/plugins/colorpicker/bootstrap-colorpicker.min.js'?>"
        type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url().'assets/Admin/plugins/timepicker/bootstrap-timepicker.min.js'?>"
        type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url().'assets/Admin/plugins/slimScroll/jquery.slimscroll.min.js'?>"
        type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url().'assets/Admin/plugins/iCheck/icheck.min.js'?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/Admin/"plugins/fastclick/fastclick.min.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/Admin/dist/js/app.min.js'?>" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url().'assets/Admin/dist/js/demo.js'?>" type="text/javascript"></script> -->