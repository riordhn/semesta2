<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SEMESTA</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url().'assets/css/main.css?v=3' ?>" rel="stylesheet" />
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="../../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../../https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="<?php echo base_url().'C_subditSDM';?>" class="navbar-brand"><b>SEMESTA</b></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tugas Belajar <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_subditSDM/usulanTBSubdit' ?>">Daftar Usulan
                                            Tugas Belajar</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/uploadFileSp' ?>">Unggah Surat
                                            Perjanjian & Tugas Belajar</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/uploadSKPembebasan' ?>"> Unggah SK
                                            Tugas Belajar & Pembebasan</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Izin Belajar <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_subditSDM/usulanIBSubdit' ?>">Daftar Usulan
                                            Izin Belajar</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/uploadFileIBSubdit' ?>">Unggah SK
                                            IBEL</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/laporanIBSubdit' ?>">Laporan
                                            IBEL</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Perpanjangan <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_subditSDM/perpanjanganSubdit' ?>">Daftar
                                            Usulan Perpanjangan</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/uploadSP_perpanjanganSubdit' ?>">Unggah
                                            Surat Perjanjian</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/uploadSKPerpanjangan' ?>">Unggah SK
                                            Perpanjangan</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Monitoring <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_subditSDM/monitoringSubdit' ?>">Tugas
                                            Belajar</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/monitoringSubditIB' ?>">Izin
                                            Belajar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaktifan Kembali <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_subditSDM/pengaktifanSubdit' ?>">Daftar
                                            Pengaktifan</a></li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/uploadPengaktifanSubdit' ?>">Unggah
                                            SK Pengaktifan</a></li>
                                </ul>
                            </li>

                            <li><a href="<?php echo base_url().'C_subditSDM/dokumenSetnegSubdit' ?>">Dokumen SETNEG</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Arsip Pengajuan <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_subditSDM/arsipTubel' ?>">Tugas Belajar</a>
                                    </li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/arsipIbel' ?>">Izin Belajar</a></li>
                                    <li><a
                                            href="<?php echo base_url().'C_subditSDM/arsipPerpanjangan' ?>">Perpanjangan</a>
                                    </li>
                                    <li><a href="<?php echo base_url().'C_subditSDM/arsipPengaktifan' ?>">Pengaktifan
                                            Kembali</a></li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url().'C_subditSDM';?>" class="navbar-brand">Hai, admin
                                    SDM!</a></li>
                            <li><a href="<?php echo base_url().'C_loginStaff/logout';?>" class="navbar-brand">Keluar</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>