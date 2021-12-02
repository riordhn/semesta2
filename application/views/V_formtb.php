<!DOCTYPE html>
<html>

<body class="skin-blue">
    <div class="container">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h5 class="text-center"><b>Langkah 1 dari 4 Usulan Tugas Belajar</b></h5><br>
                        <h4 class="text-center">Formulir Data Diri</h4>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($Biodata as $data) { ?>
                    <form action="<?php echo base_url().'C_dosen/saveBioTb' ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="box-body">


                            <div class="form-group">
                                <!-- <label for="Rumpun">NIK</label> -->
                                <input type="Hidden" class="form-control" name="fotoname"
                                    value="<?php echo $data->FOTO1 ?>" />
                            </div>

                            <div class="form-group"
                                <?php if($data->STATUS_PEGAWAI=='Tendik'){ echo 'style="display: none;"'; } ?>>
                                <label for="NIDN">NIDN</label>
                                <input type="text" readonly="" class="form-control" name="NIDN" placeholder="NIDN"
                                    value="<?php echo $data->NIDN ?>" />
                            </div>

                            <div class="form-group">
                                <label for="Rumpun">NIP</label>
                                <input type="text" readonly="" class="form-control" name="NIP" placeholder="NIP"
                                    value="<?php echo $data->NIK ?>" required />
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gelar Depan:</label>
                                        <input type="text" readonly="" class="form-control" name="gelardepan"
                                        placeholder="Gelar Depan" value="<?php echo $data->GELAR_DEPAN ?>" />
                                    </div><!-- /.form group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Sektor">Nama Lengkap:</label>
                                        <input type="text" readonly="" class="form-control" name="nama"
                                        placeholder="Nama Lengkap" value="<?php echo $data->NAMA ?>" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Rumpun">Gelar Belakang</label>
                                        <input type="text" readonly="" class="form-control" name="gelarbelakang"
                                            placeholder="Gelar Belakang" value="<?php echo $data->GELAR_BELAKANG ?>" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Rumpun">Tempat Lahir</label></br>
                                        <input type="text" readonly class="form-control" name="tempatlahir"
                                            placeholder="Tempat Lahir" value="<?php echo $data->TEMPAT_LAHIR ?>" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Tanggal Lahir">Tanggal Lahir</label>
                                        <input type="date" readonly class="form-control" name="tgllahir"
                                            placeholder="Tangggal Lahir" value="<?php echo $data->TGL_LAHIR ?>" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Unit Kerja</label><br>
                                <!-- <input type="text" class="form-control" name="unitfak" placeholder="Unit Kerja" value="<?php echo $data->UNIT_KERJA ?>"/> -->
                                <!--  <input list="unitfak" placeholder="Pilih Unit Kerja" name="unitfak" value="<?php echo $data->UNIT_KERJA ?>"><i style="size: 9px">*ketik untuk mencari</i> -->
                                <!-- <datalist name="unitfak" id="unitfak" required>
                          <option value="<?php echo $data->UNIT_KERJA ?>" selected><?php echo $data->UNIT_KERJA ?></option>
                          <?php foreach($unit as $uni){?>
                          <option value="<?php echo $uni->FAKULTAS;?>"><?php echo $uni->FAKULTAS;?></option>

                          <?php } ?>
                        </datalist> -->

                                <select name="unitfak" class="form-control" disabled>
                                    <option value="">------Pilih Unit Kerja-------</option>
                                    <?php foreach($unit as $uni){?>
                                    <option
                                        <?php if($data->ID_UNIT_KERJA == $uni->ID_UNIT_KERJA) { echo 'selected'; } ?>
                                        value="<?php echo $uni->ID_UNIT_KERJA;?>"><?php echo $uni->FAKULTAS;?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="NoHp">Nomor Ponsel</label>
                                <input type="text" class="form-control" name="nomor" placeholder="No.HP" minlength=7
                                    value="<?php echo $data->HANDPHONE ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" readonly class="form-control" name="email" placeholder="Email"
                                    value="<?php echo $data->EMAIL ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="Alamat">Alamat</label>
                                <textarea class="form-control" rows=3 name="alamat" placeholder="Alamat"><?php echo $data->ALAMAT ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="Pangkat">Pangkat/Gol</label></br>
                                <input type="text" readonly class="form-control" name="golongan"
                                    value="<?php echo $data->PANGKAT_GOLONGAN ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="TMT PNS/PT">TMT PNS/PT</label>
                                <input type="date" class="form-control" name="TMT" placeholder="TMT PNS"
                                    value="<?php echo $data->TMT_PNS ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="StatusPeg">Status Pegawai</label></br>
                                <input type="text" readonly class="form-control" name="StatusPeg"
                                    value="<?php echo $data->STATUS_PEGAWAI ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="StatusPeg">Jenis Kepegawaian</label></br>
                                <input type="text" readonly class="form-control" name="JenisPeg"
                                    value="<?php echo $data->JENIS_KEPEGAWAIAN ?>" required />
                            </div>

                            <?php if($data->STATUS_PEGAWAI == 'Dosen'){ ?>
                                <div class="form-group">
                                    <label for="StatusJab">Status Jabatan</label></br>
                                    <input type="text" class="form-control" name="StatusJab" readonly="" value="Fungsional" required />
                                </div>
    
                                <div class="form-group">
                                    <label for="Nama Jabatan">Nama Jabatan</label>
                                    <select class="form-control" name="namaJab" id="namaJab" required="">
                                        <option value="">Pilih Jabatan</option>
                                        <option value="Asisten Ahli" <?php if($data->NAMA_JABATAN =='Asisten Ahli') echo 'selected'; ?> >Asisten Ahli</option>
                                        <option value="Lektor" <?php if($data->NAMA_JABATAN =='Lektor') echo 'selected'; ?> >Lektor</option>
                                        <option value="Lektor Kepala" <?php if($data->NAMA_JABATAN =='Lektor Kepala') echo 'selected'; ?> >Lektor Kepala</option>
                                        <option value="Guru Besar" <?php if($data->NAMA_JABATAN =='Guru Besar') echo 'selected'; ?> >Guru Besar</option>
                                    </select>
                                </div>
                            <?php } else{ ?>
                                <div class="form-group">
                                    <label for="StatusJab">Status Jabatan</label></br>
                                    <select class="form-control" name="StatusJab" id="StatusJab" required="">
                                        <option>Pilih Status Jabatan</option>
                                        <option <?php if($data->STATUS_JABATAN == 'Jabatan Fungsional Umum') echo 'selected'; ?>
                                            value="Fungsional">Jabatan Fungsional Umum</option>
                                        <option <?php if($data->STATUS_JABATAN == 'Jabatan Fungsional Umum') echo 'selected'; ?>
                                            value="Struktural">Jabatan Fungsional Umum</option>
                                    </select>
                                </div>
    
                                <div class="form-group">
                                    <label for="Nama Jabatan">Nama Jabatan</label>
                                    <input type="text" class="form-control" name="namaJab" value="<?php echo $data->NAMA_JABATAN; ?>" required />
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <label for="Nama Jabatan">Foto (*Get dari cyber)</label>
                                <p><img style="width: 350px;" src="<?php echo $data->FOTO1; ?>" /></p>
                            </div><!-- /.form group -->

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