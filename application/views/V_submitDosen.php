<div class="content-wrapper">
        <div class="container-fluid">
<section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                  <center><h3 class="box-title">Konfirmasi Usulan Tugas Belajar</h3></center>
                </div>
                <div class="box-body">
                 <form action="<?php echo base_url().'C_dosen/ubahStatusTB'?>" method="post">
                  <input type="hidden" class="form-control" name="ID_tubels" value="<?php echo $data[1]; ?>" >
                  <input type="hidden" name="status" value="<?php echo $data[0]; ?>">
                  <input type="hidden" name="jenis" value="<?php echo $data[0]; ?>">
                  <input type="checkbox" name="simpan" value="1" required /> 
                      Dengan ini saya mengusulkan studi lanjut dan menjamin <strong>KEBENARAN dan KEASLIAN</strong> berkas yang telah dilampirkan<br><br>
                        <?php if ($data[0]==1) { ?>
                        <a href="<?php echo base_url().'C_dosen/uploadfile/' ?>" class="btn btn-primary" >Kembali</a>
                      <?php } else { ?>
                        <a href="<?php echo base_url().'C_dosen/uploadfileNon/' ?>" class="btn btn-primary" >Kembali</a> 
                      <?php } ?>
                        <button type="submit" class="btn btn-success" name="btsub">Ajukan</button>
                      

                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- this row will not appear when printing -->
         
        </section>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->