<div class="container">
<div class="container-fluid">
    <div class="box">
        <div class="box-header">
            <center>
                <h3 class="box-title">Riwayat Usulan Izin Belajar</h3>
            </center> <br>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Referensi</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Unit Kerja Fakultas</th>
                        <th>Tanggal Mulai IB</th>
                        <th>Status</th>
                        <th>Detail Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a=0; foreach ($tubel as $data){ $a++ ?>
                    <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->ID_IB ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br>
                            <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->UNIT_KERJA ?></td>
                        <td><?php echo $data->MULAI_IB ?></td>
                        <td><?php 
                    if ($data->STATUS_SL=="Usulan Ditolak") {
                        echo $data->STATUS_SL;
                        echo "| Tidak diterima" ;
                    }elseif($data->STATUS_SL=="Selesai"){
                        echo $data->STATUS_SL;
                        echo " | Disetujui" ;
                    }elseif($data->STATUS_SL=="Submit dari Fakultas" && $data->ID_FAKULTAS >= 16){
                        echo "Submit dari Dosen/Tendik non-fakultas" ;
                    }else{
                        echo $data->STATUS_SL;
                    }
                    ?></td>
                        <td align="center"><a
                                href="<?php echo base_url().'C_dosen/detailIbel/'.$data->ID_IB;?>"><button
                                    class="btn btn-primary btn-xs">Lihat Detail</button></a></td>
                        <td><a href="<?php echo base_url().'C_dosen/unduhDosen2/'.$data->ID_IB;?>">Lihat/Unduh</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->

        <div class="box-header">
            <center>
                <h3 class="box-title">Riwayat Lapor Kelulusan dari Izin Belajar</h3>
            </center> <br>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Referensi</th>
                        <th>Nama | NIP | TTL</th>
                        <th>Tanggal Pengajuan Pengaktifan Izin Belajar</th>
                        <th>Tanggal Lulus Izin Belajar</th>
                        <th>Status</th>
                        <th>Detail Ibel</th>
                        <th>File Ijazah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a=0; foreach ($tubel1 as $data){ $a++ ?>
                    <tr>
                        <td><?php echo $a.'.' ?></td>
                        <td><?php echo $data->ID_IB ?></td>
                        <td><?php echo $data->NAMA ?><br> <?php echo $data->NIK ?><br>
                            <?php echo $data->TEMPAT_LAHIR ?>, <?php echo $data->TGL_LAHIR ?></td>
                        <td><?php echo $data->TANGGAL_SUBMIT_PK_IB ?></td>
                        <td><?php echo $data->TGL_LULUS_IB ?></td>
                        <?php if(!empty($data->APPROVAL_DATE)){ ?>
                        <td>Izin Belajar Selesai</td>
                        <?php } else { ?>
                        <td>Menunggu Persetujuan SDM</td>
                        <?php }?>
                        <td align="center"><a
                                href="<?php echo base_url().'C_dosen/detailIbel/'.$data->ID_IB;?>"><button
                                    class="btn btn-primary btn-xs">Lihat Detail</button></a></td>
                        <td><a href="<?php echo base_url();?>file/laporan/<?php echo $data->FILE_IJAZAH?>"
                                target="_blank">Lihat/Unduh</a></td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->


    </div>
</div>
</div>