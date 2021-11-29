<div class="container">
<section class="content">
          <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="container" align="center">

    </div>
            <div class="col-lg-6 col-xs-6">
             <div class="small-box bg-red">
                <div class="inner">
                  <center>
                  <h3> <?php foreach($baru as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan SETNEG Baru</p>
                  </center>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <center>
                  <h3> <?php foreach($selesai as $smt){ echo $smt->NUM;}?></h3>
                  <p>Dokumen SETNEG Selesai</p>
                </center>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-check-circle-o"></i>
                </div>
              </div>
            </div><!-- ./col -->
              <!-- small box -->
             <div class="col-lg-6 col-xs-6">
             <div class="small-box bg-maroon">
                <div class="inner">
                  <center>
                  <h3> <?php foreach($baruP as $smt){ echo $smt->NUM;}?></h3>
                  <p>Usulan Perpanjangan SETNEG Baru</p>
                  </center>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
              </div>
            </div>
        
          <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <center>
                  <h3> <?php foreach($selesaiP as $smt){ echo $smt->NUM;}?></h3>
                  <p>Dokumen Perpanjangan SETNEG Selesai</p>
                </center>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-check-circle-o"></i>
                </div>
              </div>
            </div><!-- ./col -->
</div>
        <div class="container" align="center">

</div>
    </div>
</section>
</div>
