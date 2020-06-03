<?php
require_once '../config/koneksi.php';

include '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// Generate a version 1 (time-based) UUID object
$uuid1 = Uuid::uuid1()->toString();

//proses jika tombol simpan
if(isset($_POST['simpan'])){
    $nama_pasien = trim(mysqli_real_escape_string ($koneksi, $_POST['namapasien']));
    $noidentitas = trim(mysqli_real_escape_string ($koneksi, $_POST['noidentitas']));
    $alamat = trim(mysqli_real_escape_string ($koneksi, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string ($koneksi, $_POST['notelp']));
    $jk = $_POST['jk'];

    $cek = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nomor_identitas = '$noidentitas'") or die(mysqli_error($koneksi));
        
    if(mysqli_num_rows($cek) == 0){
        $sql_simpan = mysqli_query($koneksi, "INSERT INTO pasien (id_pasien, nama_pasien, nomor_identitas, jenis_kelamin, alamat, no_telp) VALUES ('$uuid1', '$nama_pasien', '$noidentitas', '$jk', '$alamat', '$no_telp')") or die(mysqli_error($koneksi));
        
        if($sql_simpan){
            echo '<script>alert("Berhasil menambahkan '.$nama_pasien.'"); document.location="data_pasien.php";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal menambahkan jenis pasien baru.</div>';
        }
    }else{
        echo '<script>alert("Gagal !! no identitas sudah pernah di input."); document.location="add_pasien.php";</script>';   
    }
//proses jika tombol update di klik   
} else if(isset($_POST['update'])){
    $id_pasien        = $_POST['id_pasien'];
    $nama_pasien      = $_POST['namapasien'];
    $noidentitas      = $_POST['noidentitas'];
    $alamat           = $_POST['alamat'];
    $no_telp          = $_POST['notelp'];
    $jk               = $_POST['jk'];


    $cek_data = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien = '$id_pasien'") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek_data) > 0){

        $query_update = "UPDATE pasien SET nama_pasien='$nama_pasien', nomor_identitas='$noidentitas', jenis_kelamin='$jk', alamat='$alamat', no_telp='$no_telp' WHERE id_pasien='$id_pasien'";

        $proses_update = mysqli_query ($koneksi, $query_update) or die (mysqli_error($koneksi));

        if($proses_update){
            echo '<script>alert("Berhasil update data '.$nama_pasien.'"); document.location="data_pasien.php";</script>';
        } else {
            header('location:data_pasien.php?page=update&id='. $id_pasien .'&status=false');
        }
    } else {
        echo '<script>alert("Gagal update data '.$nama_pasien.'"); document.location="data_pasien.php";</script>';
    }
} else if (isset($_POST['import'])){

    $file           = $_FILES['file_import']['name'];
    $ekstensi       = explode(".",$file);
    $file_name      = "file-".round(microtime(true)).".".end($ekstensi);
    $sumber_file    = $_FILES['file_import']['tmp_name'];
    $target_dir     = "../file/";
    $target_file    = $target_dir.$file_name;
    $upload         = move_uploaded_file($sumber_file, $target_file);

    $objek          = PHPExcel_IOFactory::load($target_file);
    $all_data       = $objek->getActiveSheet()->toArray(null,true,true,true);

    //insert data dari file excel ke database mySQL
    $query_data = "INSERT INTO pasien (id_pasien, nama_pasien, nomor_identitas, jenis_kelamin, alamat, no_telp) VALUES ";
    for ($i=3 ; $i <= count($all_data) ; $i++){
        $uuid1          = Uuid::uuid1()->toString();
        $noidentitas    = $all_data [$i]['A'];
        $nama_pasien    = $all_data [$i]['B'];
        $jenis_kelamin  = $all_data [$i]['C'];
        $alamat         = $all_data [$i]['D'];
        $no_telp        = $all_data [$i]['E'];

        $query_data .= "('$uuid1', '$nama_pasien', '$noidentitas', '$jenis_kelamin', '$alamat', '$no_telp'),";
    }

    $query_data = substr ($query_data, 0, -1);
    //echo $query_data;
    mysqli_query ($koneksi, $query_data) or die (mysqli_error($koneksi));

    unlink($target_file);
    echo '<script>alert("Berhasil import data ke Database"); document.location="data_pasien.php";</script>';


}

?>
