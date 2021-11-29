 <div class="container">
    <div class="container-fluid">
      <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Verifikasi Usulan Pengaktifan Kembali</h3></center> <br>
                  <center><h4 class="box-title"><?php foreach($bio as $bio){
                    echo $bio->NAMA."<br>";
                    echo $bio->STATUS_PEGAWAI." / ".$bio->JENIS_KEPEGAWAIAN." ".$bio->PANGKAT_GOLONGAN;
                  }?></h4></center>
                </div><!-- /.box-header -->
                  <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th colspan="3"><center><b>File Tugas Belajar</b></center></th>
                      </tr>
                      <tr>
                        <th width="50px">No.</th>
                        <th>Nama Dokumen</th>
                        <th width="150px" >Lihat atau Unduh</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $b=1;
                        foreach($filelama as $files){?>
                      <tr>
                        <td><?php echo $b.".";?></td>
                        <td><?php echo $files->ID_UP_FILE_T;?></td>
                        <td><a href="<?php echo base_url();?>file/tubel/<?php echo $files->ID_UP_FILE_T?>" target="_blank">Lihat</a></td>
                      </tr>
                     <?php $b++; }?>
                    </tbody>
                  </table><br>
                </div><!-- /.box-body -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Dokumen</th>
                        <th width="150px" >Lihat atau Unduh</th>
                        <th>Keterangan Revisi</th>
                        <th width="200px">Status</th>
                        <th width="100px">Simpan</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php $a=1;
                        foreach($file as $file){?>
                      <tr> 
                        <td><?php echo $a.".";?></td>
                        <td><?php echo $file->ID_UP_FILE_AKT;?></td>
                        <td><a href="<?php echo base_url();?>file/pengaktifan/<?php echo $file->ID_UP_FILE_AKT?>" target="_blank">Lihat</a></td>
                        <form method="post" action="<?php echo base_url().'C_subditSDM/prosesFilePengaktifan'?>">
                          <input type="hidden" class="form-control" name="ID_PENGAKTIFAN" value="<?php echo $file->ID_PENGAKTIFAN?>" id="ID_UP_FILE_AKT">
                          <input type="hidden" class="form-control" name="ID_UP_FILE_AKT" value="<?php echo $file->ID_UP_FILE_AKT?>" id="ID_UP_FILE_AKT">
                          <td><?php if($file->KETERANGAN_REVISI_PENGAKTIFAN==null && $file->STATUS_FILE_PENGAKTIFAN==2){?><textarea name="memo" placeholder="Masukkan keterangan revisi bila perlu"></textarea><?php } else { echo $file->KETERANGAN_REVISI_PENGAKTIFAN; ?><input type="hidden" name="memo" value="<?php echo $file->KETERANGAN_REVISI_PENGAKTIFAN;?>"><?php }?></td>
                          <td><div class="form-group">
                                  <div class="radio">
                                    <?php if($file->STATUS_FILE_PENGAKTIFAN==2){ ?>
                                      <label>
                                      <input type="hidden" class="form-control" name="STATUS_FILE_PENGAKTIFAN" value="2">
                                      <input type="radio" name="STATUS_FILE_PENGAKTIFAN" id="optionsRadios1" value="0">
                                      Diterima
                                    </label>
                                    <label>
                                      <input type="radio" name="STATUS_FILE_PENGAKTIFAN" id="optionsRadios2" value="1">
                                      Ditangguhkan
                                    </label>

                                    <?php } else {
                                      if($file->STATUS_FILE_PENGAKTIFAN==1){ 
                                          echo '<small class="label pull-right bg-red"><center>Ditangguhkan</center></small>';
                                      }else{
                                         echo '<small class="label pull-right bg-green"><center>Diterima</center></small>';
                                      }
                                    }?>
                                    
                                  </div>
                              </div>
                          </td>
                          <td>
                            <?php if($file->STATUS_FILE_PENGAKTIFAN==2){?>
                            <button class="btn btn-block btn-primary btn-sm">Simpan</button>
                          <?php } ?>
                          </td>
                        </form>
                      </tr>
                     <?php $a++; }?>
                    </tbody>
                  </table><br>

                    <?php foreach($tub as $tub) { 
                      if($tub->ID_STATUS_SL==2){ 
                        if($confirm[0]->NUM==0){?>
          <div class="box box-solid box-primary">
                  <div class="box-header">
                    <center><h3 class="box-title">Konfirmasi Penerimaan Usulan Perpanjangan Tugas Belajar</h3></center>
                  </div>
                  <div class="box-body">
                     <form action="<?php echo base_url().'C_subditSDM/finalDokumenPengaktifan'?>" method="post">
                    <center>Apakah usulan pengaktifan kembali diterima?<br> </center>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="ID_PENGAKTIFAN" value="<?php echo $tub->ID_PENGAKTIFAN; ?>" >
                      <div class="radio"><center>
                        <label>

                          <input type="radio" name="status_pengaktifan" id="optionsRadios1" value="3">
                          YA
                        </label>
                     &emsp;
                        <label>
                          <input type="radio" name="status_pengaktifan" id="optionsRadios2" value="9">
                          TIDAK
                        </label>
                    </center>
                      </div>
                    </div>
                          <center>
                          <button type="submit" class="btn btn-primary" name="btsub">Ajukan</button>
                          </center>
                  </form>
                  </div><!-- /.box-body -->
                </div>
              <?php } } }?>
                </div><!-- /.box-body -->
              </div>
    </div>
</div> 
