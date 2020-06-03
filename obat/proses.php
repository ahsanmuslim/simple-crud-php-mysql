<?php
require_once '../config/koneksi.php';

include '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// Generate a version 1 (time-based) UUID object
$uuid1 = Uuid::uuid1()->toString();

//proses jika tombol simpan
if(isset($_POST['simpan'])){
    $nama_obat = trim(mysqli_real_escape_string ($koneksi, $_POST['nama_obat']));
    $ket_obat = trim(mysqli_real_escape_string ($koneksi, $_POST['ket_obat']));

    $cek = mysqli_query($koneksi, "SELECT * FROM obat WHERE nama_obat = '$nama_obat'") or die(mysqli_error($koneksi));
        
    if(mysqli_num_rows($cek) == 0){
        $sql_simpan = mysqli_query($koneksi, "INSERT INTO obat (id_obat, nama_obat, ket_obat) VALUES ('$uuid1', '$nama_obat', '$ket_obat')") or die(mysqli_error($koneksi));
        
        if($sql_simpan){
            echo '<script>alert("Berhasil menambahkan '.$nama_obat.'"); document.location="data_obat.php";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal menambahkan jenis obat baru.</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Gagal, Jenis obat sudah ada di database.</div>';
        echo "<script>window.location='add_obat.php';</script>";        
    }
//proses jika tombol update di klik   
} else if(isset($_POST['update'])){
    $id_obat        = $_POST['id_obat'];
    $nama_obat      = $_POST['nama_obat'];
    $ket_obat       = $_POST['ket_obat'];

    $cek_data = mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat = '$id_obat'") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek_data) > 0){

        $query_update = "UPDATE obat SET nama_obat='$nama_obat', ket_obat='$ket_obat' WHERE id_obat='$id_obat'";

        $proses_update = mysqli_query ($koneksi, $query_update) or die (mysqli_error($koneksi));

        if($proses_update){
            echo '<script>alert("Berhasil update data '.$nama_obat.'"); document.location="data_obat.php";</script>';
        } else {
            header('location:data_obat.php?page=update&id='. $id_obat .'&status=false');
        }
    } else {
        echo '<script>alert("Gagal update data '.$nama_obat.'"); document.location="data_obat.php";</script>';
    }
}

?>
