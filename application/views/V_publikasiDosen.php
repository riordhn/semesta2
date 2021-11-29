
<div class="container">
        
<section class="content-header">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Publikasi</h3><br><br>
                  <td width="30%">
                        <form method="post"> 
                        <select name="idbeasiswa" id="idbeasiswa">
                         <option >----Pilih Semester----</option>
                          <?php //foreach ($beasiswa as $bea){?>
                          <option value="<?php //echo $bea->ID_BEASISWA;?>"><?php// echo $bea->NAMA_BEASISWA;?></option>
                          <?php //} ?>
                        </select>
                        <a href="<?php echo base_url().'homeStaff/penerimaan/'.'$_POST[idbeasiswa]' ?>"><button>Pilih</button></a>
                        </form>
                      </td>
                </div><!-- /.box-header -->
                
                <div class="box-body table-responsive no-padding">
                  <h5 class="box-title">Semester 1</h5>
                  <table class="table table-hover">
                      
                    <tr><td width="30px"><a href="<?php echo base_url().'C_dosen/tambahPublikasi'?>" class="btn btn-block btn-social btn-instagram"><i class="fas fa-plus"></i>Tambah Publikasi </a></td></tr>
                    <tr>
                      <th>No.</th>
                      <th>Judul Jurnal</th>
                      <th>Penerbit</th>
                      <th>ISS ISBN</th>
                      <th>Urutan Penulis</th>
                      <th>Tahun</th>
                      <th>File</th>
                    </tr>
                    <?php// $a=0; foreach ($beasiswa as $data){ $a++ ?>
                    <tr>
                      <td>1. </td>
                      <td>Buku 1</td>
                      <td>Erlangga</td>
                      <td>15465164165</td>
                      <td>3</td>
                      <td>2017</td>
                      <td><a href="#">Lihat</a> </td>
                   </tr>
                  <?php //} ?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->

        <section class="content-header">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Penghargaan</h3><br><br>
                  <td width="30%">
                        <form method="post"> 
                        <select name="idbeasiswa" id="idbeasiswa">
                         <option >----Pilih Semester----</option>
                          <?php //foreach ($beasiswa as $bea){?>
                          <option value="<?php //echo $bea->ID_BEASISWA;?>"><?php// echo $bea->NAMA_BEASISWA;?></option>
                          <?php //} ?>
                        </select>
                        <a href="<?php echo base_url().'homeStaff/penerimaan/'.'$_POST[idbeasiswa]' ?>"><button>Pilih</button></a>
                        </form>
                      </td>
                </div><!-- /.box-header -->
                
                <div class="box-body table-responsive no-padding">
                  <h5 class="box-title">Semester 1</h5>
                  <table class="table table-hover">
                      
                    <tr><td width="30px"><a href="<?php echo base_url().'C_dosen/tambahPenghargaan'?>" class="btn btn-block btn-social btn-instagram"><i class="fas fa-plus"></i>Tambah Penghargaan </a></td></tr>
                    <tr>
                      <th>No.</th>
                      <th>Nama Penghargaan</th>
                      <th>Pemberi Penghargaan</th>
                      <th>Tahun</th>
                      <th>File</th>
                    </tr>
                    <?php// $a=0; foreach ($beasiswa as $data){ $a++ ?>
                    <tr>
                      <td>1. </td>
                      <td>Nobel</td>
                      <td>Nobel</td>
                      <td>2017</td>
                      <td><a href="#">Lihat</a> </td>
                   </tr>
                  <?php //} ?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
