<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SISTEM INFORMASI BEASISWA SDM UNIVERSITAS AIRLANGGA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/login/style.css?v=2'?>">

</head>

<body>
    <div class="container">
        <div class="info">
            <h1>SEMESTA (Sistem Monitoring Evaluasi Studi Lanjut) UNIVERSITAS AIRLANGGA</h1>
        </div>
        <div class="info bg-login">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <div class="form">
                        <div class="img"><img class="img" src="<?php echo base_url('assets/login/Logo.png')?>" /></div>
                        <form class="login-form" action="<?php echo base_url().'C_loginDosen/authuser1';?>" method="post">
                            <p class="message" style="color: red;"><?php echo $this->session->flashdata('er'); ?></p>
                            <input type="text" name="username" placeholder="NIP/NIK" required />
                            <input type="password" name="password" placeholder="Password" />
                            <button>Masuk</button>
                            <p class="message"> Admin Fakultas / SDM / AGE masuk<a
                                    href="<?php echo base_url().'C_loginStaff/'?>">
                                    disini</a></p>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid"
                            src="<?php echo base_url().'assets/login/bg-login.png'?>" style="width: 500px;" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <div class="banner-text">
                                <h2>This is Heaven</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- <div class="container">
                <div class="info">
                    <h1>SEMESTA</h1>
                    <h2>(Sistem Monitoring Evaluasi Studi Lanjut)</h2> <br>
                    <h1>UNIVERSITAS AIRLANGGA</h1>
                </div>
            </div>
            <div class="form">
                <div class="img"><img class="img" src="<?php echo base_url('assets/login/Logo.png')?>" /></div>
                <form class="login-form" action="<?php echo base_url().'C_loginDosen/authuser1';?>" method="post">
                    <p class="message">Perhatian! Masuk menggunakan username CC</p> <br>
                    <p class="message" style="color: red;"><?php echo $this->session->flashdata('er'); ?></p> <br>
                    <input type="text" name="username" placeholder="NIP/NIK" required />
                    <input type="password" name="password" placeholder="Password" />
                    <button>Masuk</button>
                    <p class="message"> Admin Fakultas / SDM / AGE masuk<a
                            href="<?php echo base_url().'C_loginStaff/'?>">
                            disini</a></p>
                </form>
            </div>
            <video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
                <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4" />
            </video> -->




</body>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</html>