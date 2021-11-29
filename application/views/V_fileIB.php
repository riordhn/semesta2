 <div class="container">
    <div class="container-fluid">
      <div class="row">
         <center><h3 class="box-title">Data Tugas Belajar</h3></center> <br>
            <div class="col-xs-12 table-responsive">
               <?php foreach($bio as $data) {
                   ?>
              <table class="table table-striped">
                <tbody>
                
                  <tr>
                    <?php if ($data->FOTO1==NULL) { ?>
                      <td rowspan="15" width="10px"><i>*Foto Belum Diupload</i></td>
                    <?php } else {?>
                    <td rowspan="15" width="10px"><img src="<?php echo $data->FOTO1; ?>" width="300px"></td>
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
              
                </tbody>
              </table>
              
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="box">
            <table  class="table table-bordered table-striped" >
                <thead>
                  <th>Perguruan Tinggi <br> Nama Bidang </th>
                  <th>Jenjang</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                </thead>
                <tbody>
                  <td><?php echo $data->PERGURUAN_TINGGI_PENYELENGGARA."<br>".$data->NAMA_BIDANG_PERGURUAN_TINGGI?></td>
                  <td><?php  echo $data->ID_JENJANG ?></td>
                  <td><?php  echo $data->MULAI_IB ?></td>
                  <td><?php  echo $data->SELESAI_IB ?></td>
                </tbody>
              </table>
                 <?php } ?>
          </div>
    	<div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Daftar Berkas Izin Belajar</h3></center> <br>
                  <center><h4 class="box-title"><?php foreach($bio as $bio){
                    echo $bio->NAMA."<br>";
                    echo $bio->STATUS_PEGAWAI." / ".$bio->JENIS_KEPEGAWAIAN." ".$bio->PANGKAT_GOLONGAN;
                  }?></h4></center>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Berkas</th>
                        <th width="150px" >Lihat atau Unduh</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=1; foreach($file as $file){ ?>
                        <tr>
                          <td><?php echo $a."."?></td>
                          <td><?php echo $file->NAMA_FILE_IB;?></td>
                          <td><a href="<?php echo base_url();?>file/tubel/<?php echo $file->ID_UP_FILE_IB?>" target="_blank">Lihat/Unduh</a></td>
                        </tr>
                      <?php $a++;}?>
                    </tbody>
                  </table><br>

                </div><!-- /.box-body -->
              </div>
    </div>
</div>
