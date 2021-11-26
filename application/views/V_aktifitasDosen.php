
<div class="content-wrapper">
        
<section class="content-header">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Aktifitas Studi</h3><br><br>
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
                      
                    <tr><td width="30px"><a href="<?php echo base_url().'C_dosen/tambahAktifitas'?>" class="btn btn-block btn-social btn-instagram"><i class="fas fa-plus"></i>Tambah Aktifitas </a></td></tr>
                    <tr>
                      <th>No.</th>
                      <th>SKS Kredit</th>
                      <th>IPK</th>
                      <th>IPS</th>
                      <th>File KHS</th>
                      <th>File KRS</th>
                    </tr>
                    <?php// $a=0; foreach ($beasiswa as $data){ $a++ ?>
                    <tr>
                      <td>1. </td>
                      <td>24</td>
                      <td>3.58</td>
                      <td>3.72</td>
                      <td><a href="#">Lihat</a> </td>
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