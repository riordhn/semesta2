 <div class="container">
    <div class="container-fluid">
      <div class="box">
                <div class="box-header">
                  <center><h3 class="box-title">Daftar Dokumen Verifikasi Usulan</h3></center> <br>
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
                        <td><?php echo $file->ID_UP_FILE_T;?></td>
                        <td><a href="<?php echo base_url();?>file/tubel/<?php echo $file->ID_UP_FILE_T?>" target="_blank">Lihat</a></td>
                        <form method="post" action="<?php echo base_url().'C_subditSDM/prosesFileTB'?>">
                          <input type="hidden" class="form-control" name="ID_TUB" value="<?php echo $file->ID_TUBEL?>" id="ID_UP_FILE_T">
                          <input type="hidden" class="form-control" name="ID_UP_FILE_T" value="<?php echo $file->ID_UP_FILE_T?>" id="ID_UP_FILE_T">
                          <td><?php if($file->KETERANGAN_REVISI_TUBEL==null && $file->STATUS_FILE_TUBEL==2){?><textarea name="memo" placeholder="Masukkan keterangan revisi bila perlu"></textarea><?php } else { echo $file->KETERANGAN_REVISI_TUBEL;?><input type="hidden" name="memo" value="<?php echo $file->KETERANGAN_REVISI_TUBEL;?>"><?php }?></td>
                          <td><div class="form-group">
                                  <div class="radio">
                                    <?php if($file->STATUS_FILE_TUBEL==2){ ?>
                                      <label>
                                      <input type="hidden" class="form-control" name="STATUS_FILE_TUBEL" value="2">
                                      <input type="radio" name="STATUS_FILE_TUBEL" id="optionsRadios1" value="0">
                                      Diterima
                                    </label>
                                    <label>
                                      <input type="radio" name="STATUS_FILE_TUBEL" id="optionsRadios2" value="1">
                                      Ditangguhkan
                                    </label>

                                    <?php } else {
                                       if($file->STATUS_FILE_TUBEL==1){ 
                                          echo '<small class="label pull-right bg-red"><center>Ditangguhkan</center></small>';
                                      }else{
                                         echo '<small class="label pull-right bg-green"><center>Diterima</center></small>';
                                      }
                                    }?>
                                    
                                  </div>
                              </div>
                          </td>
                          <td>
                            <?php if($file->STATUS_FILE_TUBEL==2){?>
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
                    <center><h3 class="box-title">Konfirmasi Penerimaan Usulan Tugas Belajar</h3></center>
                  </div>
                  <div class="box-body">
                     <form action="<?php echo base_url().'C_subditSDM/finalDokumen'?>" method="post">
                    <center>Apakah usulan tugas belajar diterima?<br> </center>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="ID_tubels" value="<?php echo $tub->ID_TUBEL; ?>" >
                      <div class="radio"><center>
                        <label>

                          <input type="radio" name="status_tub" id="optionsRadios1" value="3">
                          YA
                        </label>
                     &emsp;
                        <label>
                          <input type="radio" name="status_tub" id="optionsRadios2" value="9">
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
