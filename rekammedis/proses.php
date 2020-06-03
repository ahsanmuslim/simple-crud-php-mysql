<?php
require_once '../config/koneksi.php';

include '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;



//proses jika tombol simpan
if(isset($_POST['simpan'])){
    $uuid1 = Uuid::uuid1()->toString();
    $id_pasien      = trim(mysqli_real_escape_string ($koneksi, $_POST['pasien']));
    $id_poli        = trim(mysqli_real_escape_string ($koneksi, $_POST['poli']));
    $id_dokter      = trim(mysqli_real_escape_string ($koneksi, $_POST['dokter']));
    $tanggal        = trim(mysqli_real_escape_string ($koneksi, $_POST['tanggal']));
    $keluhan        = trim(mysqli_real_escape_string ($koneksi, $_POST['keluhan']));
    $diagnosa       = trim(mysqli_real_escape_string ($koneksi, $_POST['diagnosa']));
    //deklrasi variable obat array
    $detail_obat    = $_POST['obat'];

    //menyimpan data rekam medis
    $sql_simpan = mysqli_query($koneksi, "INSERT INTO medis (id_medis, id_pasien, id_dokter, id_poli, keluhan, diagnosa, tgl_periksa) VALUES ('$uuid1', '$id_pasien', '$id_dokter', '$id_poli', '$keluhan', '$diagnosa', '$tanggal')") or die(mysqli_error($koneksi));

    //menyimpan detail obat ke table detail_obat
    foreach ($detail_obat as $obat){
        $simpan_obat = "INSERT INTO detail_obat (id_medis, id_obat) VALUES ('$uuid1', '$obat')";
        mysqli_query ($koneksi, $simpan_obat) or die (mysqli_error($koneksi));
    }
    
    if($sql_simpan && $simpan_obat){
        echo '<script>alert("Berhasil menambahkan data baru"); document.location="data_medis.php";</script>';
    }else{
        echo '<div class="alert alert-warning">Gagal menambahkan data baru.</div>';
    }

//proses jika tombol update di klik   
} else if(isset($_POST['update'])){
    $id_medis       = trim(mysqli_real_escape_string ($koneksi, $_POST['id_medis']));
    $id_pasien      = trim(mysqli_real_escape_string ($koneksi, $_POST['pasien']));
    $id_poli        = trim(mysqli_real_escape_string ($koneksi, $_POST['poli']));
    $id_dokter      = trim(mysqli_real_escape_string ($koneksi, $_POST['dokter']));
    $tanggal        = trim(mysqli_real_escape_string ($koneksi, $_POST['tanggal']));
    $keluhan        = trim(mysqli_real_escape_string ($koneksi, $_POST['keluhan']));
    $diagnosa       = trim(mysqli_real_escape_string ($koneksi, $_POST['diagnosa']));

    //deklrasi variable obat array
    $detail_obat    = $_POST['obat'];


    //update data rekam medis
    $update_medis = mysqli_query($koneksi, "UPDATE medis SET 
        id_pasien ='$id_pasien', 
        id_poli ='$id_poli', 
        id_dokter ='$id_dokter', 
        keluhan ='$keluhan', 
        diagnosa ='$diagnosa' ,
        tgl_periksa = '$tanggal'
        WHERE id_medis ='$id_medis'") or die(mysqli_error($koneksi));


    //membuat query untuk menghapus data lama dari detail obat untuk di ganti dengan data baru
    $query_hapus = "DELETE FROM detail_obat WHERE id_medis = '$id_medis'";
    $hapus = mysqli_query ($koneksi, $query_hapus) or die(mysqli_error($mysqli));


    //update ( insert ) detail obat ke table detail_obat dengan data baru
    foreach ($detail_obat as $obat){
        $update_obat = "INSERT INTO detail_obat (id_medis, id_obat) VALUES ('$id_medis', '$obat')";
        mysqli_query ($koneksi, $update_obat) or die (mysqli_error($koneksi));
    }
    
    
    if($update_medis && $update_obat){
        echo '<script>alert("Berhasil update data rekam medis"); document.location="data_medis.php";</script>';
    }else{
        echo '<div class="alert alert-warning">Gagal menambahkan data baru.</div>';
    }
}

?>
