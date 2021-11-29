<div class="container">
    <div class="container-fluid">
        <section class="invoice">
            <!-- title row -->
            <?php 
            if (!empty($tubel) || !empty($tubel1) || !empty($aktif) || !empty($ibel) ) { ?>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                Ada File Pengajuan yang ditangguhkan! Silakan <a
                    href="<?php echo base_url().'C_dosen/fileDitangguhkan' ?>" class="btn btn-primary btn-xs">Klik di
                    sini</a> untuk upload ulang!
            </div>
            <?php } 

            if (!empty($this->session->userdata('cektb'))) {?>
            <div class="alert alert-danger alert-dismissable">
                <h4><i class="icon fa fa-warning"></i> PERHATIAN!</h4>
                Anda sekarang berada di semester <b><?php echo $this->session->userdata('semontb');?></b> dari
                <b><?php echo $this->session->userdata('setaltb');?></b> Tugas Belajar, diharapkan mengisi monitoring
                semester <?php echo $this->session->userdata('semontb');?> disini <a
                    href="<?php echo base_url().'C_dosen/cekMonitoring' ?>" class="btn btn-primary btn-xs">Klik
                    Disini</a>
            </div>

            <?php } 

           if (!empty($this->session->userdata('cekib'))) { ?>

            <div class="alert alert-danger alert-dismissable">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <h4><i class="icon fa fa-warning"></i> PERHATIAN!</h4>
                Anda sekarang berada di semester <b><?php echo $this->session->userdata('semonib');?> </b> dari
                <b><?php echo $this->session->userdata('setalib');?></b> Izin Belajar, diharapkan mengisi monitoring
                semester <?php echo $this->session->userdata('semonib');?> disini <a
                    href="<?php echo base_url().'C_dosen/cekMonitoringIB' ?>" class="btn btn-primary btn-xs">Klik
                    Disini</a>
            </div>
            <?php } ?>
            <?php foreach ($semester as $sem) {
            if ($sem->SEMESTER_SEKARANG==5 && $sem->TOTAL_SEMESTER==6) { ?>
            <div class="alert alert-danger alert-dismissable">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <h4><i class="icon fa fa-warning"></i> PERHATIAN!</h4>
                Anda sudah memasuki semester 5. Jika anda memerlukan perpanjangan silahkan <a
                    href="<?php echo base_url().'C_dosen/formPerpanjangan' ?>" class="btn btn-primary btn-xs">Klik
                    Disini</a> untuk mengajukan perpanjangan studi lanjut
            </div>
            <?php }} ?>
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Informasi Data Diri

                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <?php foreach($Biodata as $data) {
                   ?>
                            <tr>
                                <?php if ($data->FOTO1==NULL) { ?>
                                <td rowspan="16" width="10px"><i>*Foto Belum Diupload</i></td>
                                <?php } else {?>
                                <td rowspan="16" width="10px"><img src="<?php echo $data->FOTO1; ?>" width="300px"></td>
                                <?php }?>
                                <td><b>Gelar Depan</b></td>
                                <td>: <?php echo $data->GELAR_DEPAN ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama Lengkap</b></td>
                                <td>: <?php echo $data->NAMA ?></td>
                            </tr>
                            <tr>
                                <td><b>Gelar Belakang</b></td>
                                <td>: <?php echo $data->GELAR_BELAKANG ?></td>
                            </tr>
                            <tr>
                                <td><b>NIP/NIK</b></td>
                                <td>: <?php echo $data->NIK ?></td>
                            </tr>
                            <tr>
                                <td><b>Universitas</b></td>
                                <td>: Universitas Airlangga</td>
                            </tr>
                            <tr>
                                <td><b>Unit Kerja</b></td>
                                <td>: <?php echo $data->UNIT_KERJA ?></td>
                            </tr>
                            <tr>
                                <td><b>Tempat Lahir</b></td>
                                <td>: <?php echo $data->TEMPAT_LAHIR ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir</b></td>
                                <td>: <?php echo $data->TGL_LAHIR ?></td>
                            </tr>
                            <tr>
                                <td><b>No.HP</b></td>
                                <td>: <?php echo $data->HANDPHONE ?></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>: <?php echo $data->ALAMAT ?></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>: <?php echo $data->EMAIL ?></td>
                            </tr>
                            <tr>
                                <td><b>Pangkat/Gol</b></td>
                                <td>: <?php echo $data->PANGKAT_GOLONGAN ?></td>
                            </tr>
                            <tr>
                                <td><b>TMT PNS/PT</b></td>
                                <td>: <?php echo $data->TMT_PNS ?></td>
                            </tr>
                            <tr>
                                <td><b>Status Pegawai</b></td>
                                <td>: <?php echo $data->STATUS_PEGAWAI ?></td>
                            </tr>
                            <tr>
                                <td><b>Status Jabatan</td>
                                <td>: <?php echo $data->STATUS_JABATAN ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama Jabatan</b></td>
                                <td>: <?php echo $data->NAMA_JABATAN ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <!-- <td><a href="<?php echo base_url().'C_dosen/formtb' ?>"><button class="btn btn-primary">Lanjutkan Ke Formulir >></button></a></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div><!-- /.col -->
            </div><!-- /.row -->


            <!-- this row will not appear when printing -->

        </section>
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->