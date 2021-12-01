<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SEMESTA - Sistem Informasi Pendaftaran, Monitoring dan Evaluasi Studi Lanjut</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="<?php echo base_url().'assets/login/bootstrap.min.css?v=2'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/login/style.css?v=6'?>">


</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">

    </header><!-- End #header -->
    <main id="main">
        <div class="container d-flex flex-column align-items-center">
            <img src="<?php echo base_url('assets/login/logo unair.png')?>" alt="Unair" width="100" height="100">
            <h2 align="center">SEMESTA<br><small>Universitas Airlangga</small></h2>
        </div>

        <section id="contact" class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form id="w0" class="php-email-form" action="<?php echo base_url().'C_loginDosen/authuser1';?>"
                            method="post">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="form-group field-loginform-username required">

                                        <input type="text" class="form-control" name="username" placeholder="NIP/NIK"
                                            aria-required="true">

                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="form-group field-loginform-password required">

                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" aria-required="true">

                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="login-button">Login</button>
                            </div>
                            <br>
                            <center> Admin Fakultas / SDM / AGE masuk<a
                                    href="<?php echo base_url().'C_loginStaff/'?>">
                                    disini</a></center>
                        </form>
                        <br>
                        <div class="credits" align="center">
                            &copy; <?php echo date("Y"); ?>. Direktorat Sumber Daya Manusia Universitas Airlangga.
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main><!-- End #main -->

</body>

</html>