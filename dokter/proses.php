<?php
require_once '../config/koneksi.php';

include '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// Generate a version 1 (time-based) UUID object
$uuid1 = Uuid::uuid1()->toString();

//proses jika tombol simpan
if(isset($_POST['simpan'])){
    $nama_dokter = trim(mysqli_real_escape_string ($koneksi, $_POST['namadokter']));
    $spesialis = trim(mysqli_real_escape_string ($koneksi, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string ($koneksi, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string ($koneksi, $_POST['notelp']));
    

    $cek = mysqli_query($koneksi, "SELECT * FROM dokter WHERE nama_dokter = '$nama_dokter'") or die(mysqli_error($koneksi));
        
    if(mysqli_num_rows($cek) == 0){

        
        $sql_simpan = mysqli_query($koneksi, "INSERT INTO dokter (id_dokter, nama_dokter, spesialis, alamat, no_telp) VALUES ('$uuid1', '$nama_dokter', '$spesialis', '$alamat', '$no_telp')") or die(mysqli_error($koneksi));

        //menyimpan data detail obat
        
        
        if($sql_simpan){
            echo '<script>alert("Berhasil menambahkan '.$nama_dokter.'"); document.location="data_dokter.php";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal menambahkan jenis dokter baru.</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Gagal, Jenis dokter sudah ada di database.</div>';
        echo "<script>window.location='add_dokter.php';</script>";        
    }
//proses jika tombol update di klik   
} else if(isset($_POST['update'])){
    $id_dokter        = $_POST['id_dokter'];
    $nama_dokter      = $_POST['namadokter'];
    $spesialis        = $_POST['spesialis'];
    $alamat           = $_POST['alamat'];
    $no_telp          = $_POST['notelp'];


    $cek_data = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter = '$id_dokter'") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek_data) > 0){

        $query_update = "UPDATE dokter SET nama_dokter='$nama_dokter', spesialis='$spesialis', alamat='$alamat', no_telp='$no_telp' WHERE id_dokter='$id_dokter'";

        $proses_update = mysqli_query ($koneksi, $query_update) or die (mysqli_error($koneksi));

        if($proses_update){
            echo '<script>alert("Berhasil update data '.$nama_dokter.'"); document.location="data_dokter.php";</script>';
        } else {
            header('location:data_dokter.php?page=update&id='. $id_dokter .'&status=false');
        }
    } else {
        echo '<script>alert("Gagal update data '.$nama_dokter.'"); document.location="data_dokter.php";</script>';
    }
}

?>
