<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SISTEM INFORMASI BEASISWA SDM UNIVERSITAS AIRLANGGA</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="<?php echo base_url().'assets/login/style.css'?>">

  
</head>

<body>
<div class="container">
  <div class="info">
    <h1>SEMESTA</h1>
    <h2>(Sistem Monitoring Evaluasi Studi Lanjut)</h2> <br>
    <h1>UNIVERSITAS AIRLANGGA</h1>
  </div>
</div>
<div class="form">
  <div class="img"><img class="img" src="<?php echo base_url('assets/login/Logo.png')?>"/></div>
  <form class="login-form" action="<?php echo base_url().'C_loginDosen/authuser1';?>" method="post">
  	<p class="message">Perhatian! Masuk menggunakan username CC</p> <br>
  	<p class="message" style="color: red;"><?php echo $this->session->flashdata('er'); ?></p> <br>
    <input type="text" name="username" placeholder="NIP/NIK" required />
    <input type="password" name="password" placeholder="Password" />
    <button>Masuk</button>
    <p class="message"> Admin Fakultassss / SDM / AGE masuk<a href="<?php echo base_url().'C_loginStaff/'?>"> disini</a></p>
  </form>
</div>
<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="<?php echo base_url().'assets/login/script.js'?>"></script>




</body>

</html>
