<?php
include 'config/koneksi.php';

    if(isset($_SESSION['username'])){
        echo "<script>window.location='".base_url('dashboard/index.php')."';</script>";
    } else {
        echo "<script>window.location='".base_url('auth/login.php')."';</script>";
        }
    
?>



