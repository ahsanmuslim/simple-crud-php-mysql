<?php
include '../config/koneksi.php';

if(isset($_GET['id'])){
    //membuat variable $id untuk menampung data dari URL melalui fumgsi $GET['id']
    $id_pasien = $_GET['id'];

    //melakukan pengecekan data dengan $id / nama apakah terdapat di database
    $query_cek = "SELECT * FROM pasien WHERE id_pasien = '$id_pasien'";
    $cek = mysqli_query ($koneksi, $query_cek) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc ($cek);
    $nama_pasien = $data['nama_pasien'];

    if(mysqli_num_rows($cek) > 0){

        //membuat query untuk menghapus data dengan id yang di dapat dari $_GET[id]
        $query_hapus = "DELETE FROM pasien WHERE id_pasien = '$id_pasien'";
        $hapus = mysqli_query ($koneksi, $query_hapus) or die(mysqli_error($mysqli));

        //membuat pesan (alert) apakah proses berhasil
        if ($hapus){
            echo '<script>alert("Data dengan nama '.$nama_pasien.' berhasil dihapus !!"); window.location="data_pasien.php";</script>';
        } else {
            echo '<script>alert("Data dengan nama '.$nama_pasien.' Gagal dihapus !!"); window.location="data_pasien.php";</script>';
        }
    } else {
        echo '<script>alert("Data dengan nama '.$nama_pasien.' tidak ditemukan !!"); window.location="data_pasien.php";</script>';
    }
} 


?>