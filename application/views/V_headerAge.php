<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SEMESTA</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url().'assets/css/main.css?v=2' ?>" rel="stylesheet" />
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url().'assets/Admin/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet"
        type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <!-- <link href="<?php echo base_url().'assets/Admin/dist/css/AdminLTE.min.css'?>" rel="stylesheet" type="text/css" /> -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <!-- <link href="<?php echo base_url().'assets/Admin/dist/css/skins/_all-skins.min.css'?>" rel="stylesheet"
        type="text/css" /> -->
        <link href="<?php echo base_url().'assets/Argon/css/argon.css'?>" />
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="<?php echo base_url().'C_Age';?>" class="navbar-brand"><b>SEMESTA</b></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">SETNEG <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_Age/usulanSetneg';?>">Daftar Usulan SETNEG</a>
                                    </li>
                                    <li><a href="<?php echo base_url().'C_Age/dokumenSetnegAge';?>">Unggah SETNEG</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Perpanjangan SETNEG <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_Age/usulanPerpanjanganSetneg';?>">Daftar
                                            Perpanjangan SETNEG</a></li>
                                    <li><a href="<?php echo base_url().'C_Age/dokumenPerpanjanganSetnegAge';?>">Unggah
                                            Perpanjangan SETNEG</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url().'C_Age/riwayatAge';?>">Arsip Pengajuan</a></li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url().'C_Age';?>" class="navbar-brand">Hai, Admin AGE!</a></li>
                            <li><a href="<?php echo base_url().'C_loginStaff/logout';?>" class="navbar-brand">Keluar</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>