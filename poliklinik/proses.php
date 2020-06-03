<?php
require_once '../config/koneksi.php';

include '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;



//proses jika tombol simpan
if(isset($_POST['addpoli'])){
    $totaldata = $_POST['totaldata'];
    for ($i=1; $i<=$totaldata; $i++){
        // Generate a version 1 (time-based) UUID object
        $uuid1    = Uuid::uuid1()->toString();
        $namapoli = trim(mysqli_real_escape_string ($koneksi, $_POST['namapoli-'.$i]));
        $gedung   = trim(mysqli_real_escape_string ($koneksi, $_POST['gedung-'.$i]));

        //query untuk mengecek apakah data sudah ada ?
        $cek_data = mysqli_query($koneksi, "SELECT * FROM poliklinik WHERE nama_poli = '$namapoli'") or die(mysqli_error($koneksi));

        //query untuk menyimpan semua data jika data belum ada
        if(mysqli_num_rows($cek_data) == 0) {
            $sql_simpan = mysqli_query($koneksi, "INSERT INTO poliklinik (id_poli, nama_poli, gedung) VALUES ('$uuid1', '$namapoli', '$gedung')") or die(mysqli_error($koneksi));
        }
    }

    //alert jika penyimpanan berhasil / gagal
    if($sql_simpan){
        echo "<script>alert('Berhasil menambahkan $totaldata data baru'); window.location='data_poli.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data baru');window.location='data_poli.php';</script>";
    }
} else if(isset($_POST['editpoli'])){
    $jmledit = count($_POST['id_poli']);

    for ($i=0; $i<$jmledit; $i++){
        //deklarasi variable dari POST
        $idpoli = trim(mysqli_real_escape_string ($koneksi, $_POST['id_poli'][$i]));
        $namapoli = trim(mysqli_real_escape_string ($koneksi, $_POST['nama'][$i]));
        $gedung   = trim(mysqli_real_escape_string ($koneksi, $_POST['gedung'][$i]));

        $sql_edit = mysqli_query ($koneksi, "UPDATE poliklinik SET nama_poli = '$namapoli', gedung = '$gedung' WHERE id_poli = '$idpoli'");
    }

    //alert jika penyimpanan berhasil / gagal
    if($sql_edit){
        echo "<script>alert('Berhasil update $jmledit data'); window.location='data_poli.php';</script>";
    } else {
        echo "<script>alert('Gagal update data');window.location='data_poli.php';</script>";
    }
}

?>