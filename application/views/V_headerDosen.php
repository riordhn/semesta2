<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SEMESTA - Sistem Informasi Pendaftaran, Monitoring dan Evaluasi Studi Lanjut</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css' />
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
    <!-- <link href="<?php echo base_url().'assets/Admin/dist/css/AdminLTE.min.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets/Admin/dist/css/skins/_all-skins.min.css'?>" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="<?php echo base_url().'assets/css/footer.css'?>" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url().'assets/Argon/css/argon.css'?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/favicon.png')?>">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="<?php echo base_url().'C_dosen';?>" class="navbar-brand"><img height="30" src="<?php echo base_url('assets/login/logo-semesta-black.jpg?v=3')?>" /></a>
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
                                    <li><a href="<?php echo base_url().'C_dosen/formtb' ?>">Pendaftaran Tugas
                                            Belajar
                                            <?php if($this->session->userdata('tugas_belajar_active') && !in_array($this->session->userdata('tugas_belajar_active')->ID_STATUS_SL, [7])){ ?>
                                                (Proses pengajuan)
                                            <?php } else if($this->session->userdata('tugas_belajar_active') && in_array($this->session->userdata('tugas_belajar_active')->ID_STATUS_SL, [7])){ ?>
                                                (Sudah diajukan)
                                            <?php } ?>
                                        </a>
                                    </li>
                                    <?php if($this->session->userdata('tugas_belajar_active') && in_array($this->session->userdata('tugas_belajar_active')->ID_STATUS_SL, [5,6,7])){ ?>
                                    <li><a href="<?php echo base_url().'C_dosen/cekMonitoring' ?>">Monitoring</a></li>
                                    <li><a href="<?php echo base_url().'C_dosen/formPerpanjangan' ?>">Perpanjangan Tugas
                                            Belajar</a></li>
                                    <li><a href="<?php echo base_url().'C_dosen/formPengaktifan' ?>">Pengaktifan Kembali
                                            Tugas Belajar</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Izin Belajar <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_dosen/formBioIb' ?>"> 
                                            Pendaftaran Izin Belajar
                                            <?php if($this->session->userdata('izin_belajar_active') && !in_array($this->session->userdata('izin_belajar_active')->ID_STATUS_SL, [7])){ ?>
                                                (Proses pengajuan)
                                            <?php } else if($this->session->userdata('izin_belajar_active') && in_array($this->session->userdata('izin_belajar_active')->ID_STATUS_SL, [7])){ ?>
                                                (Sudah diajukan)
                                            <?php } ?>
                                        </a>
                                    </li>
                                    <?php if($this->session->userdata('izin_belajar_active') && in_array($this->session->userdata('izin_belajar_active')->ID_STATUS_SL, [5,6,7])){ ?>
                                    <li><a href="<?php echo base_url().'C_dosen/cekMonitoringIB' ?>">Monitoring</a></li>

                                    <!-- <li><a href="<?php echo base_url().'C_dosen/formPerpanjangan' ?>">Perpanjangan Izin Belajar</a></li> -->
                                    <li><a href="<?php echo base_url().'C_dosen/formLaporan' ?>">Laporan Selesai Izin
                                            Belajar</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url().'C_dosen/dokumenSetnegUser' ?>">Dokumen SETNEG</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Arsip Pengajuan <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url().'C_dosen/riwayatDosen' ?>">Arsip Pengajuan Tugas
                                            Belajar</a></li>
                                    <li><a href="<?php echo base_url().'C_dosen/riwayatDosenIB' ?>">Arsip Pengajuan Izin
                                            Belajar</a></li>
                                    <!-- <li><a href="<?php echo base_url().'C_dosen/riwayatPerpanjangan' ?>">Arsip Pengajuan Perpanjangan</a></li>
                  <li><a href="<?php echo base_url().'C_dosen/riwayatPengaktifan' ?>">Arsip Pengajuan Pengaktifan Kembali</a></li> -->
                                </ul>
                                <?php //if ($this->session->userdata('nav')=='monitor') { ?>
                                <!--  <li class="dropdown user user-menu open"> -->

                                <?php //} else { ?>
                                <!-- <li> -->
                                <?php //} ?>

                                <!-- <a href="<?php echo base_url().'C_dosen/tabelMonitoringDosen' ?>">Monitoring</a> -->
                                <!-- <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url().'C_dosen/tabelAktifitasDosen' ?>">Aktifitas Studi</a></li>
                  <li><a href="<?php echo base_url().'C_dosen/tabelPublikasiDosen' ?>">Publikasi & Penghargaan</a></li>
                  <li><a href="<?php echo base_url().'C_dosen/tabelSeminarDosen' ?>">Seminar & Pelatihan</a></li>
                </ul> -->
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url().'C_dosen';?>" class="navbar-brand">Hai,
                                    <?php echo $this->session->userdata('name');?></a></li>
                            <li><a href="<?php echo base_url().'C_loginDosen/logout';?>" class="navbar-brand">Keluar</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>