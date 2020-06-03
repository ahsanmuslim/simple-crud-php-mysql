<?php
include ("config/koneksi.php");


if(!isset($_SESSION['username'])){
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rumah Sakit Asyifa - Home</title>

    <!-- favicon-->
    <link rel="icon" href="<?=base_url('assets/icon/hospital.png');?>">
    <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/simple-sidebar.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/libs/DataTables/datatables.min.css')?>" rel="stylesheet">

        
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <script type="text/javascript" src="<?=base_url('assets/libs/DataTables/datatables.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/libs/vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?=base_url('/index.php')?>">
                        <span class="text-primary"><b>Rumah Sakit Assyifa</b></span>  
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('dashboard/index.php')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?=base_url('pasien/data_pasien.php')?>">Data Pasien</a>
                </li>
                <li>
                    <a href="<?=base_url('dokter/data_dokter.php')?>">Data Dokter</a>
                </li>
                <li>
                    <a href="<?=base_url('poliklinik/data_poli.php')?>">Data Poliklinik</a>
                </li>
                <li>
                    <a href="<?=base_url('obat/data_obat.php')?>">Data Obat</a>
                </li>
                <li>
                    <a href="<?=base_url('rekammedis/data_medis.php')?>">Rekam Medis</a>
                </li>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>" onClick="return confirm('Apakah Anda yakin ingin keluar ?')"> <span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">