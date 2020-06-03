<?php
include '../config/koneksi.php';

if(isset($_GET['id'])){
    //membuat variable $id untuk menampung data dari URL melalui fumgsi $GET['id']
    $nama_obat = $_GET['id'];

    //melakukan pengecekan data dengan $id / nama apakah terdapat di database
    $query_cek = "SELECT * FROM obat WHERE nama_obat = '$nama_obat'";
    $cek = mysqli_query ($koneksi, $query_cek) or die(mysqli_error($koneksi));;

    if(mysqli_num_rows($cek) > 0){

        //membuat query untuk menghapus data dengan id yang di dapat dari $_GET[id]
        $query_hapus = "DELETE FROM obat WHERE nama_obat = '$nama_obat'";
        $hapus = mysqli_query ($koneksi, $query_hapus) or die(mysqli_error($mysqli));

        //membuat pesan (alert) apakah proses berhasil
        if ($hapus){
            echo '<script>alert("Data dengan nama '.$nama_obat.' berhasil dihapus !!"); window.location="data_obat.php";</script>';
        } else {
            echo '<script>alert("Data dengan nama '.$nama_obat.' Gagal dihapus !!"); window.location="data_obat.php";</script>';
        }
    } else {
        echo '<script>alert("Data dengan nama '.$nama_obat.' tidak ditemukan !!"); window.location="data_obat.php";</script>';
    }
} 


?>